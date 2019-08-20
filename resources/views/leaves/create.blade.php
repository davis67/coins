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
                <div class="container-fluid mt-0">
                <p><a class="btn btn-danger btn-sm text-white" href="{{route('leaves.index')}}">My Leave Requests</a></p>
                    {{-- {{var_dump($errors)}} --}}
                    <form method="post" action="{{route('leaves.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Leave Type</label>
                                <select class="form-control" name="the_leavesetting" id="the_leavesetting">
                                    @foreach(App\Leavesetting::all() as  $leavesetting)
                                    <option value="{{$leavesetting->id}}" data-type="{{$leavesetting->leave_type}}">{{$leavesetting->leave_type}} Leave</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Start Date</label>
                                <input type="date" name="leave_start" id="leave_start" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label>End Date</label>
                                <input type="date" name="leave_end" id="leave_end" class="form-control"> 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Request Details</label>
                                <textarea type="text" name="leave_detail" id="leave_detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Request</button>
                        </div>
                     </form> 
                </div>
            </div>
        </div>
        
    @endsection