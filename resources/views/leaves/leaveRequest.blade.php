@extends('layouts.app')
    @section('content')
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">leaves</li>
                    </ol>
                </nav>
                  
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title float-left m-t-20 m-l-20 m-r-20 align-self-center tasks statistics text-uppercase">{{$leave->leavesetting->leave_type}} details</h5>
                            <a href="" class="btn btn-primary float-right m-t-20 m-l-20 m-r-20"></i>Back</a>
                            <div class="clearfix"></div>
                            <div class="m-t-20 p-20 no-block">
                            <div class="row font-16">
                                <div class="col-lg-3 col-md-3 col-sm-12"> <span class="weight-500 text-dark m-3">Description</span> </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                <p class="m-2 p-3"> {{$leave->leave_detail}} </p>
                                </div>
                            </div>
                            <div class="d-flex font-16">
                                <div class="col-lg-6 p-0 row col-md-12">
                                <div class="col-lg-4 col-md-3 col-sm-12"> <span class="weight-500 text-dark">Status </span> </div>
                                <div class="col-lg-8 col-md-4 col-sm-12 p-l-20 ">
                                    <p class=" badge badge-primary"> {{$leave->leave_status}} </p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-4 col-md-3 col-sm-12"> <span class="weight-500 text-dark">Start date</span> </div>
                                <div class="col-lg-8 col-md-4 col-sm-12 p-l-20 ">
                                    <p > {{$leave->leave_start}} </p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-4 col-md-3 col-sm-12"> <span class="weight-500 text-dark">Due date</span> </div>
                                <div class="col-lg-8 col-md-4 col-sm-12 p-l-20 ">
                                    <p> {{$leave->leave_end}}  </p>
                                </div>
                                <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-6 row block col-md-12 members-projects">
                                <div class="col-lg-12 col-md-12 col-sm-12 p-0 m-b-15"> <span class="weight-500 text-dark">Members</span> </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                    <ul class="members-list">
                                    <li class="badge badge-success">Duration:{{$leave->duration}} days </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="container-fluid p-0">
                                    <form method="post" action="{{route('updateLeaveRequest')}}">
                                        @csrf
                                    <input type="hidden" name="leave_id" value="{{$leave->id}}"/>
                                    <input type="hidden" name="notification_id" value="{{$notification->id}}" />
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Leave Status</label>
                                                <select class="form-control" name="status">
                                                   <option value="" >Choose...</option>
                                                   <option value="Accept">Accept</option>
                                                   <option value="Decline">Decline</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Comments</label>
                                                <textarea type="text" name="comment" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Confirm the response</button>
                                        </div>
                                     </form> 
                                </div>
                        </div>
                        </div>
                    </div>
                  </div>
                 </div>
            </div>
        </div>
        
    @endsection