<?php

namespace App\Http\Controllers;

use App\Meatpartone;
use Illuminate\Http\Request;

class MeatpartoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partonedata = Meatpartone::all();
        return view("meats.partone.index", compact("partonedata"));
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
        //
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
