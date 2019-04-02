<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Associate;
use App\User;
use App\Team;
use App\ProjectUser;
use App\AssociateProject;
use App\Notifications\ProjectAssigned;
use App\Notifications\ProjectCompleted;
use Session;
use Auth;
use DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $projects = Project::all();
        return view('projects.index',['projects'=>$projects,]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Project $project)
    {
        $project = Project::find($project->id);   
        return view('projects.show',compact('project'));
    }
    
    /**
     * Show the form for editing the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return $project;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //validate the received data
        $data = $request->validate([
            "project_status"    => "required",
            "project_stage"  => "required",
            "initiation_date"  => "required|date",
            "completion_date"  => "required|date",
        ]);
        //save the validated data
        $run = $project->update([
            'project_status' => $data['project_status'],
            'project_stage' => $data['project_stage'],
            'initiation_date' => $data['initiation_date'],
            'completion_date' => $data['completion_date'],
            'updated_by'=>Auth::user()->id
        ]);

        $project = Project::find($request->id);
        $team_leader = Team::where('id','=',$request->team_id)->pluck('team_leader')->first();

        $receiver = User::find($team_leader);
        if( !$receiver){
        }else{
            User::find($team_leader)->notify(new OpportunityCreated($opportunity));
        }

        if(!$run){
            return ['message' => 'Project has not been updated'];;
        }else{
            return ['message' => 'Project has been successfully updated'];
        }
    }
    /**
     * Assign an associate to a project
     *
     */
    public function addAssociates(Request $request, Project $project){
        $associate = AssociateProject::create(request()->validate([
            'project_id' => 'required',
            'associate_id' =>'required|unique:associate_project',
            'initiation_date' =>'required',
            'completion_date' =>'required',
            'created_by'=>Auth::user()->id]));

        $associate = Associate::find($request->associate_id);
        $project = Project::find($request->project_id);
        $associate->notify(new ProjectAssigned($project));
        return ['Associate added successfully'];
        
    }
    
        /*
     * Remove an associate from a project
     */
    public function removeAssociate(Request $request){
        $associate = AssociateProject::where('associate_id',$request->associate_id)->first();
        $associate->delete();
        return NULL;
    }

    /**
     * Assign a consultant to a project
     *
     */

    public function addConsultants(Request $request){
        $data = $request->validate([
            "project_id"    => "required",
            "user_id"  => "required|unique:project_user",
        ]);
        ProjectUser::create([
            'project_id' => $data['project_id'],
            'user_id' => $data['user_id'],
            'created_by'=>Auth::user()->id
        ]);

        $user = User::find($request->user_id);
        $project = Project::find($request->project_id);
        if( $user != NULL) $user->notify(new ProjectAssigned($project));
        return ['Cosulntant added successfully'];

    }

    /*
     * Remove consultant from a project
     */
    public function removeConsultant(Request $request){
        $user = ProjectUser::where('user_id',$request->user_id)->first();
        $user->delete();
        return ['You have sucessfully removed a consultant'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterProjects(Request $request){

        $project_status = $request->project_status;
        $project_stage = $request->project_stage;
        $start_date = $request->projectStart." 00:00:00";
        $stopDate = $request->projectEnd." 00:00:00";
        $country = $request->projectCountry;
        
        $projects = [];

        if( $project_status == 'NULL' && $project_stage  == 'NULL' && $country == 'All Countries'){
        
            $projects = Project::whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage == 'NULL' && $country != 'All Countries'){
        
            $projects = Project::where('country',$country)->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage != 'NULL' && $country == 'All Countries'){
        
            $projects = Project::where('project_stage',$project_stage)->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage != 'NULL' && $country != 'All Countries'){

            $projects = Project::where(['project_stage'=>$project_stage,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();
        
        }elseif( $project_status != 'NULL' && $project_stage  == 'NULL' && $country == 'All Countries'){
        
            $projects = Project::where('project_status',$project_status)->whereBetween('created_at', [$start_date, $stopDate])->get();
        
        }elseif( $project_status != 'NULL' && $project_stage  == 'NULL' && $country != 'All Countries' ){

            $projects = Project::where(['project_status'=>$project_status,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();
    
        }elseif( $project_status != 'NULL' && $project_stage != 'NULL' && $country == 'All Countries'){

            $projects = Project::where(['project_status'=> $project_status,'project_stage'=>$project_stage])->whereBetween('created_at', [$start_date, $stopDate])->get();
        
        }elseif( $project_status != 'NULL' && $project_stage != 'NULL' && $country != 'All Countries'){

            $projects = Project::where(['project_status'=> $project_status,'project_stage'=>$project_stage,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage  == 'NULL' && $country == 'All Countries'){
            
            $projects = Project::where('team_id', $team_id)->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage  == 'NULL' && $country != 'All Countries'){

            $projects = Project::where(['team_id'=>$team_id,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage != 'NULL' && $country == 'All Countries'){

            $projects = Project::where(['project_stage'=>$project_stage])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status == 'NULL' && $project_stage != 'NULL' && $country != 'All Countries'){

            $projects = Project::where(['project_stage'=>$project_stage,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status != 'NULL' && $project_stage  == 'NULL' && $country == 'All Countries'){

            $projects = Project::where(['project_status'=>$project_status])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status != 'NULL' && $project_stage == 'NULL' && $country != 'All Countries'){

            $projects = Project::where(['project_status'=>$project_status,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();

        }elseif( $project_status != 'NULL' && $project_stage != 'NULL' && $country == 'All Countries'){

            $projects = Project::where(['project_status'=>$project_status,'project_stage'=>$project_stage])->whereBetween('created_at', [$start_date, $stopDate])->get();
        
        }
        else{
            $projects = Project::where(['project_status'=>$project_status,'project_stage'=>$project_stage,'country'=>$country])->whereBetween('created_at', [$start_date, $stopDate])->get();
        }

        $results = [];

        foreach($projects as $data){
            array_push($results,[
                'id'=>$data->id,
                'name'=>$data->opportunity_name,
                'om_number'=>$data->om_number,
                'project_status'=>$data->type,
                'country'=>$data->country,
                'project_stage'=>$data->sales_stage,
                'revenue'=>$data->revenue,
                'external_deadline' => $data->external_deadline,
                'internal_deadline' => $data->internal_deadline,
            ]); 
        }
        
        return  $results;
    }
}