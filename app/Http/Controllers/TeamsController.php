<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\User;
use App\Assessment;
use App\Http\Resources\TeamsCollection;
use DB;;

class TeamsController extends Controller
{
    /**
     * constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("teams.index");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllTeams()
    {
        return new TeamsCollection(Team::all());
    }

    /**
     * Persist a new team.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'team_name' => 'required',
            'team_code' => 'required',
            'team_leader' => 'nullable'
        ]);
        $data->recordActivity('created_team');
        Team::create($data);
    }

    /**
     * Display the team.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        $team = Team::findOrFail($team->id);
        $users = User::where('team_id', $team->id)->get();
        return view('teams.show', compact('team', 'users'));
    }

    /**
     * Edit the team.
     *
     * @param  Team $team
     * @return \Illuminate\Http\Response
     */

    public function edit(Team $team)
    {
        return response()->json($team);
    }
    /**
     * Update the team.
     *
     * @param  Team $team
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'team_name' => 'required',
            'team_code' => 'required',
            'team_leader' => 'nullable',
        ]);
        $data['updated_by'] = auth()->user()->id;

        $team->update($data);
        $team->recordActivity('updated_team');
        return $team;
    }

    public function getteamleader(Team $team)
    {
        if ($team->team_leader != null) {
            return [$team->team_leader];
        } else {
            return [];
        }
    }

    public function destroy(Team $team)
    {
        $team->recordActivity('deleted_team');
        $team->delete();
    }
}
