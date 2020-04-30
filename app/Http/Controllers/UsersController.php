<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Team;
use Auth;
use App\Http\Requests\UserRequest;
use App\Http\Resources\TeamsCollection;
use App\Http\Resources\TeamsResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UsersCollection;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view("users.index");
    }

    public function getAllUsers()
    {
        return new UsersCollection(User::all());
    }

    public function create()
    {
        $users = User::all();
        $teams = Team::all();
        return view('users.create', compact('users', 'teams'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        $data->recordActivity('added_user');
        return $user;
    }

    public function show($id)
    {
        $user = new UserResource(User::findOrFail($id));

        return view('users.show', compact('user'));
    }

    public function deletedUsers()
    {
        $users = User::onlyTrashed()->get();
        return view('users.restore_users', compact('users'));
    }
    public function restoreUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        if ($user->restore()) {
            return redirect()->back()->with("success", "You have Successfully Restored a User", "Good Luck!");
        }
        return redirect()->back()->with("success", "Error occurred while Restoring A User");
    }
    public function permanentDestroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with("success", "You have Permanently Deleted a User", "Bye Bye!");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        //validate the received data
        $data = $request->validate([
            'staffId' => 'required|string|max:10',
            'name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'email' => 'required|string|email|max:255',
            'mobilePhone' => 'required|string|max:20',
            'alternativePhone' => 'required|string|max:20',
            'user_team_id' => 'required|integer|max:50',
            'role_id' => 'required|integer',
            'level_id' => 'required|integer',
            'reportsTo' => 'required|string',
            'userStatus' => 'nullable|string|max:20',
        ]);

        //save the validated data
        $user->update(
            [
                'staffId' => $data['staffId'],
                'name' => $data['name'],
                'gender' => $data['gender'],
                'email' => $data['email'],
                'mobilePhone' => $data['mobilePhone'],
                'alternativePhone' => $data['alternativePhone'],
                'team_id' => $data['user_team_id'],
                'role_id' => $data['role_id'],
                'level_id' => $data['level_id'],
                'reportsTo' => $data['reportsTo'],
                'userStatus' => $data['userStatus'],
                'updated_by' => Auth::user()->id
            ]
        );

        return ['User Updated Successfully'];
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
