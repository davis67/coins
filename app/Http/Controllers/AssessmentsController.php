<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use Auth;
class AssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Assessment::where(['assessment_period'=>$request->assessment_period,'user_id'=>$request->user_id])->exists()) {
    
            return['error' => 'Assessment for this month already done for this user'];
        }
        else{
            $assessments = $request->except(['_token','user_id','assessment_period']);
            $user_info = $request->only(['user_id','assessment_period']);
            $timestamps = ['created_by'=>Auth::user()->id,'created_at'=>now()];
            foreach ($assessments as $key => $value){
                $data = [
                    'target_id' => $key, 
                    'assessment_score' =>  $value,
                ];
                $assessment = Assessment::insert($user_info+$data+$timestamps); 
            }
            return['success' => 'Assessment successfully recorded'];

        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
