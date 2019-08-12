@extends('layouts.app')
    @section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <form>
                <p><b>General Info</b></p>
                <hr/>
                <div class="container">
                    <div class="form-row m-2 d-flex justify-content-center">
                            <div class="form-group col-md-6">
                                <label>Fullname:</label>
                                <input type="text" name="associate_name" id="associate_name"  class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                <input type="text" name="associate_email" id="associate_email" class="form-control">
                            </div>
                        </div>
                        <div class="form-row m-2 d-flex justify-content-center">
                            <div class="form-group col-md-6">
                                <label>Gender:</label>
                                <select type="text" name="associate_gender" id="associate_gender" class="form-control">
                                    <option >-- Select --</option>
                                    <option value="Female" >Female</option>
                                    <option value="Male" >Male</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Country:</label>
                                <input list="assocCountry" name="associate_country" id="associate_country"  class="form-control">
                                <datalist id="assocCountry">
                                        {{ getCountry() }}                                   
                                </datalist>
                            </div>
                        </div>
                        <p><b>Contacts Info</b></p>
                        <hr/>
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <label>Mobile Phone:</label>
                            <input type="text" name="associate_phone" id="associate_phone"  class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                                <label>Office Phone:</label>
                                <input type="text" name="associate_phone1" id="associate_phone1"  class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                    <label>Date Enrolled:</label>
                                    <input type="date" name="date_enrolled" id="date_enrolled" class="form-control">
                            </div>
                    </div>

                    <p><b>Expertise info</b></p>
                    <hr/>
                    <div class="form-row m-2 d-flex justify-content-center">
                        <div class="form-group col-md-4">
                            <label>Expertise:</label>
                            <select name="associate_expertise" id="associate_expertise" class="form-control getSpecilization">
                                <option>-- Choose --</option>
                                @foreach(App\Expertise::all() as  $expertise)
                                <option value="{{$expertise->id}}">{{$expertise->field_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label>Specialization:</label>
                                <select type="text" name="associate_specialization" id="associate_specialization" class="form-control">
                                    <option>-- Choose --</option>
                                    
                                </select>
                            </div>
                        <div class="form-group col-md-4">
                            <label>Years of Experience:</label>
                            <input type="number" name="associate_experience" id="associate_experience" class="form-control">
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