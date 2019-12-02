<!-- Extend Main layout -->
@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <form class="form-group" action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <h5><b>Staff Details</b></h5>
            <hr />
            <div class="row">
                <div class="col-md-5">
                    <label>Staff ID Number</label>
                    <input type="text" name="staffId" id="staffId" class="form-control" value="{{$user->staffId}}"
                        placeholder="AHC/000/00" maxlength="10">
                    <input type="hidden" id="user_id" name="user_id">
                </div>
                <div class="col-md-5">
                    <label>Staff name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}"
                        placeholder="Staff Name">
                </div>
                <div class="col-md-2">
                    <label>Gender</label>
                    <br>
                    <select type="text" name="gender" id="gender" class="form-control">
                        <option value="Female" @if($user->gender == 'Female') selected @endif>Female
                        </option>
                        <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
                    </select>
                </div>
            </div>
            <h5 class="mt-2"><b>Personal Details</b></h5>
            <hr />
            <div class="row">
                <div class="col-md-5">
                    <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}"
                        placeholder="email">
                </div>
                <div class="col-md-3">
                    <label>Mobile Phone</label>
                    <input type="text" name="mobilePhone" value="{{$user->mobilePhone}}" id="mobilePhone"
                        class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Alternative Phone</label>
                    <input type="text" name="alternativePhone" id="alternativePhone" value="{{$user->alternativePhone}}"
                        class="form-control">
                </div>
            </div>
            <h5 class="mt-2"><b>Other Details</b></h5>
            <hr />
            <div class="row">
                <div class="col-md-4">
                    <label>Team</label>
                    <select name="user_team_id" id="user_team_id" class="form-control">
                        @foreach(App\Team::all() as $team)
                        <option value="{{$team->id}}" @if($user->user_team_id == $team->id) selected
                            @endif>{{$team->team_code}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Title</label>
                    <select name="title_id" id="the_title_id" class="form-control">

                        @foreach(App\Title::all() as $title)
                        <option value="{{$title->id}}" @if($user->title_id == $title->id) selected
                            @endif>{{$title->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Reporting to</label>
                    <select name="reportsTo" id="reportsTo" class="form-control">
                        @foreach(App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary mt-2 btn-sm"><i class="fas fa-plus"></i> Update a
                User </button>
    </div>
    </form>
</div>
</div>
@endsection