@extends('layouts.app')
    @section('content')
        <div class="card h-100 shadow-sm">
            <div class="card-body pd-1">
                <div class="row">
                        <table class="table color-table table-sm table-hover" id="example23">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Team Name</th>
                                        <th>Team Code</th>
                                        <th>Team Leader</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->id}}</td>
                                        <td title="View leave">{{$team->team_name}}</td>
                                        <td>{{$team->team_code}}</td>
                                        @if($team->team_leader == null)
                                             <td>None</td>
                                        @else
                                             <td>{{$team->team_leader}}</td>
                                        @endif
                                
                                    <td class="text-center text-light-blue"><span class="mr-3"><a href="{{ route('teams.show', $team->id)}}">Consultants</a></span><a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fas fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu"> <a class="dropdown-item" data-toggle="modal" href="" data-target=".edit-member">Edit</a> <a class="dropdown-item" href="{{ route('teams.show', $team->id)}}">View</a> <a class="dropdown-item text-light-danger" href="#">Delete</a> </div></td>
                
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
@endsection