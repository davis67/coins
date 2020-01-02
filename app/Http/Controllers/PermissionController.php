<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {

        return view("users.permission", compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permissions = collect($request->permission);
        $permission->update([
            "canCreateOpportunity" =>($permissions->contains("canCreateOpportunity"))?1:0,
            "canEditOpportunity" =>($permissions->contains("canEditOpportunity"))?1:0,
            "canIndexOpportunity" =>($permissions->contains("canIndexOpportunity"))?1:0,
            "canDeleteOpportunity" =>($permissions->contains("canDeleteOpportunity"))?1:0,
            "canCreateContact"=>($permissions->contains("canCreateContact"))?1:0,
            "canEditContact"=>($permissions->contains("canEditContact"))?1:0,
            "canIndexContact"=>($permissions->contains("canIndexContact"))?1:0,
            "canDeleteContact"=>($permissions->contains("canDeleteContact"))?1:0,

        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
