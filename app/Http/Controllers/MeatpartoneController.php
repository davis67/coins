<?php

namespace App\Http\Controllers;

use App\Meatpartone;
use App\Models\User;
use App\Partoneassessment;
use Illuminate\Http\Request;
use App\Http\Resources\Partone as PartoneResource;
use App\Http\Resources\PartoneCollection as PartoneResourceCollection;

class MeatpartoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $partonedata = response()->json(PartoneResource::collection(Meatpartone::all()))->getData();
        // return ($partonedata);
        return view("meats.partone.index", compact("partonedata", "user"));
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
    public function store(Request $request, $id, $partone, $dimension)
    {

        $self_assessment = "self_assessment" . $partone . $dimension;
        $supervisor_assessment = "supervisor_assessment" . $partone . $dimension;
        $this->validate($request, [
            $self_assessment  => "required|integer|between:0,5",
            $supervisor_assessment => "required|integer|between:0,5"
        ]);


        $part = Partoneassessment::create([
            'self_assessment' => $request->$self_assessment,
            'supervisor_assessment' => $request->$supervisor_assessment,
            "performance_metrics_details_id" => $request->performance_metrics_id,
            "user_id" => $request->user_id
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meatpartone  $meatpartone
     * @return \Illuminate\Http\Response
     */
    public function show(Meatpartone $meatpartone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meatpartone  $meatpartone
     * @return \Illuminate\Http\Response
     */
    public function edit(Meatpartone $meatpartone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meatpartone  $meatpartone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meatpartone $meatpartone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meatpartone  $meatpartone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meatpartone $meatpartone)
    {
        //
    }
}
