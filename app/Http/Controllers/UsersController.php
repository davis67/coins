<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Leave;
use App\TaskUser;
use App\Timesheet;
use App\Team;
use App\Title;
use App\Assessment;
use Auth;
use DB;
use Gate;
use Alert;
use Session;

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
        $users = User::all();
        return $users;
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'staffId' => 'required|string|max:10',
            'name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobilePhone' => 'required|string|max:20',
            'alternativePhone' => 'required|string|max:20',
            'user_team_id' => 'required|integer',
            'role_id' => 'required|integer',
            'reportsTo' => 'required|string',
            'userStatus' => 'required|string|max:20',
        ]);
    }

    public function create()
    {

        $users = User::all();
        $teams = Team::all();
        $titles = Title::all();
        return view('users.create', compact('users', 'titles', 'teams'));
    }

    public function store(Request $data)
    {
        $this->validate($data, [
            'staffId' => "unique:users|required",
            'name' => "required",
            'gender' => "required",
            'email' => "required|unique:users",
            'mobilePhone' => "required|digits:10|regex:/07\d{8}/|unique:users",
            'alternativePhone' => "nullable|digits:10|regex:/07\d{8}/|unique:users",
            'team_id' => "required",
            'title_id' => "required",
            'reportsTo' => "required",
            'userStatus' => 'nullable',
        ]);
        $user = User::create([
            'staffId' => $data['staffId'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make('AHC@secret'),
            'mobilePhone' => $data['mobilePhone'],
            'alternativePhone' => $data['alternativePhone'],
            'team_id' => $data['team_id'],
            'reportsTo' => $data['reportsTo'],
            'userStatus' => 'registered',
            'created_by' => Auth::user()->id
        ]);
        return $user;
    }

    public function show($id)
    {
        // $year = $month = today();
        // $user = User::findOrFail($user->id);
        // $leaves = Leave::select('leaves.leave_start','leaves.leave_end','leavesetting_id','leaves.leave_status','leaves.leave_detail', DB::raw("SUM(leaves.duration) as duration"),'leavesettings.leave_type',)
        //             ->join('leavesettings','leaves.leavesetting_id','=','leavesettings.id')
        //             ->whereYear('leaves.leave_start', '=', $month)
        //             ->whereYear('leaves.created_at', '=', $month)
        //             ->where('leaves.user_id', $user->id)
        //             ->get();
        // $absent = $leaves->sum('duration');

        // //Timesheet
        // $opportunities = DB::table('users')
        //             ->join('task_user', 'task_user.user_id', '=', 'users.id')
        //             ->join('tasks', 'task_user.task_id', '=', 'tasks.id')
        //             ->join('deliverable_opportunity', 'tasks.deliverable_id', '=', 'deliverable_opportunity.deliverable_id')
        //             ->join('opportunities', 'deliverable_opportunity.opportunity_id', '=', 'opportunities.id')
        //             ->orderBy("opportunities.opportunity_name")
        //             ->where('task_user.user_id', $user->id)
        //             ->get();

        // $timesummary = Timesheet::select('beneficiary', DB::raw("SUM(duration) as duration"))
        //                         ->whereMonth('activity_date',now())
        //                         ->where(['user_id'=>$user->id])
        //                         ->groupBy('beneficiary')->get();

        // $worked = $timesummary->sum('duration');
        // $timesheets = Timesheet::where(['user_id'=>$user->id])->whereMonth('activity_date',now())->get();



        // $assessments = Assessment::selectRaw("targets.target_category AS category,assessments.assessment_score/targets.target_value*100 AS score")
        //                         ->join('targets', 'assessments.target_id', '=', 'targets.id')
        //                         ->where(['assessments.user_id'=>$user->id])
        //                         ->groupBy('targets.target_category')
        //                         ->get();
        // return view('users.show',compact('user','leaves','timesummary','timesheets','assessments','opportunities','worked','absent'));
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }
    /*
    * Custom search engine
    */

    // public function search(Request $request)
    // {
    //     $users = User::where(['team_id'=>$request->team_id])->get();
    //     return $users;
    // }

    // function getUsers(){
    //     $llusers = User::pluck('name');
    //     for($i=0; $i<sizeof($llusers); $i++)
    //     {
    //         echo '<option value="'.$llusers[$i].'">';
    //     }
    //     unset($llusers);
    // }

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
