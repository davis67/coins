@extends('layouts.app')
    @section('content')
    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                <div class="card">
                    <div class="card-body pd-1">
                            <table class="table color-table table-sm table-hover" id="example23">
                                    <thead>
                                        <tr>
                                            <th>StaffID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Title</th>
                                            <th>Supervisor</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->staffId}}</td>
                                            <td title="View leave">{{$user->name}}</td>
                                            <td>{{$user->gender}}</td>
                                             <td>{{$user->email}}</td>
                                            <td>{{$user->title->name}}</td>
                                        <td class="text-center text-light-blue"><span class="mr-3"><a href="">{{$user->reportsTo}}</a></span><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a class="dropdown-item" data-toggle="modal" href="" data-target=".edit-member">Edit</a> <a class="dropdown-item" href="{{ route('teams.show', $team->id)}}">View</a> <a class="dropdown-item text-light-danger" href="#">Delete</a> </div></td>
                    
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        
    </div>
   
@endsection