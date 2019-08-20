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
                <div class="container-fluid">
                <p><a class="btn btn-danger btn-sm text-white" href="{{route('leaves.create')}}"><i class="fa fa-plus"></i>Request  for Leave</a></p>
                    <div class="table-responsive">
                        <table class="table color-table table-sm table-hover" id="example23">
                            <thead>
                                <tr>
                                    <th>leave Name</th>
                                    <th>Start Date</th>
                                    <th>End date</th>
                                    <th>Days Taken</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leaves as $leave)
                                <tr>
                                    <td><a href="" class="text-primary" title="View leave">{{$leave->leavesetting->leave_type}} leave</a></td>
                                    <td>{{$leave->leave_start}}</td>
                                    <td>{{$leave->leave_end}}</td>
                                    <td class="text-center">{{$leave->duration}} days</td>
                                    <td class="text-center text-light-blue"><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu"> <a class="dropdown-item" data-toggle="modal" href="" data-target=".edit-member">Edit</a> <a class="dropdown-item" href="{{route('leaves.show', $leave->id)}}">View</a> <a class="dropdown-item text-light-danger" href="#">Delete</a> </div></td>
            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    @endsection