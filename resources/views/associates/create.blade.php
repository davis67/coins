@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('associates.index')}}" class="btn btn-outline-danger m-2 btn-sm"><i class="fas fas-eye"></i>
            View Associates</a>
        <div class="row">
            <form method="post" action="{{route('associates.store')}}">
                @csrf
                <p><b>General Info</b></p>
                <hr />
                <div class="container">
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <label>Fullname:</label>
                            <input type="text" name="associate_name" id="associate_name" class="form-control">
                            @if($errors->has('associate_name'))
                            <span class="text-danger">
                                {{$errors->first('associate_name')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email:</label>
                            <input type="text" name="associate_email" id="associate_email" class="form-control">
                            @if($errors->has('associate_email'))
                            <span class="text-danger">
                                {{$errors->first('associate_email')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <label>Gender:</label>
                            <select type="text" name="associate_gender" id="associate_gender" class="form-control">
                                <option>-- Select --</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                            @if($errors->has('associate_gender'))
                            <span class="text-danger">
                                {{$errors->first('associate_gender')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Country:</label>
                            <input list="assocCountry" name="associate_country" id="associate_country"
                                class="form-control">
                            <datalist id="assocCountry">
                                {{ getCountry() }}
                            </datalist>
                            @if($errors->has('associate_country'))
                            <span class="text-danger">
                                {{$errors->first('associate_country')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <p><b>Contacts Info</b></p>
                    <hr />
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <label>Mobile Phone:</label>
                            <input type="text" name="associate_phone" id="associate_phone" class="form-control">
                            @if($errors->has('associate_phone'))
                            <span class="text-danger">
                                {{$errors->first('associate_phone')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Office Phone:</label>
                            <input type="text" name="associate_phone1" id="associate_phone1" class="form-control">
                            @if($errors->has('associate_phone1'))
                            <span class="text-danger">
                                {{$errors->first('associate_phone1')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Date Enrolled:</label>
                            <input type="date" name="date_enrolled" id="date_enrolled" class="form-control">
                            @if($errors->has('date_enrolled'))
                            <span class="text-danger">
                                {{$errors->first('date_enrolled')}}
                            </span>
                            @endif
                        </div>
                    </div>

                    <p><b>Expertise info</b></p>
                    <hr />
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <label>Expertise:</label>
                            <select name="associate_expertise" id="associate_expertise"
                                class="form-control select-multiple getSpecilization">
                                <option>-- Choose --</option>
                                @foreach(App\Expertise::all() as $expertise)
                                <option value="{{$expertise->id}}">{{$expertise->field_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('associate_expertise'))
                            <span class="text-danger">
                                {{$errors->first('associate_expertise')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Specialization:</label>
                            <select type="text" name="associate_specialization" id="associate_specialization"
                                class="form-control select-multiple">
                                <option>-- Choose --</option>
                                @foreach(["public health experts", "Monitoring and Evaluation", "Economist", "Procument
                                Specialists", "Water & Sanitation Experts"] as $specialisation)

                                <option value="{{$specialisation}}">{{$specialisation}}</option>

                                @endforeach

                            </select>
                            @if($errors->has('associate_specialization'))
                            <span class="text-danger">
                                {{$errors->first('associate_specialization')}}
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label>Years of Experience:</label>
                            <input type="number" name="associate_experience" id="associate_experience"
                                class="form-control">
                            @if($errors->has('associate_experience'))
                            <span class="text-danger">
                                {{$errors->first('associate_experience')}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-4">
                        <button type="submit" class="btn btn-primary">Add Associate</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection