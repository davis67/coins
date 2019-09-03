@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card shadow mt-4">
                <div class="header">
                    <h4 class="title text-center mt-3">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Staff ID Number:</label>
                            <div class="col-md-8">
                                <input type="text" name="staffId" id="staffId" class="form-control"
                                    value="{{$user->staffId}}" placeholder="AHC/000/00" maxlength="10">
                                <input type="hidden" id="user_id" name="user_id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Staff name:</label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}"
                                    placeholder="Staff Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Gender:</label>
                            <div class="col-md-8">
                                <select type="text" name="gender" id="gender" class="form-control">
                                    <option value="Female" @if($user->gender == 'Female') selected @endif>Female
                                    </option>
                                    <option value="Male" @if($user->gender == 'Male') selected @endif>Male</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email address:</label>
                            <div class="col-md-8">
                                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}"
                                    placeholder="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Mobile Phone:</label>
                            <div class="col-md-8">
                                <input type="text" name="mobilePhone" value="{{$user->mobilePhone}}" id="mobilePhone"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Alternative Phone:</label>
                            <div class="col-md-8">
                                <input type="text" name="alternativePhone" id="alternativePhone"
                                    value="{{$user->alternativePhone}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Team:</label>
                            <div class="col-md-8">
                                <select name="user_team_id" id="user_team_id" class="form-control">
                                    @foreach(App\Team::all() as $team)
                                    <option value="{{$team->id}}" @if($user->user_team_id == $team->id) selected
                                        @endif>{{$team->team_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Title:</label>
                            <div class="col-md-8">
                                <select name="title_id" id="the_title_id" class="form-control">

                                    @foreach(App\Title::all() as $title)
                                    <option value="{{$title->id}}" @if($user->title_id == $title->id) selected
                                        @endif>{{$title->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Reporting to:</label>
                            <div class="col-md-8">
                                <select name="reportsTo" id="reportsTo" class="form-control">

                                    @foreach(App\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-info">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card shadow mt-4">
                <div class="header">
                    <h4 class="title text-center mt-3">Change Password</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.change_password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Old Password:') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password"
                                    class="form-control @error('old') is-invalid @enderror" name="old" required
                                    autocomplete="new-password">

                                @error('old')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection