@extends('layouts.app')
@section('content')
<div class="w-11/12 py-8 mx-auto">
    <table class="table-auto w-full shadow-md rounded" id="example23">
        <thead>
            <tr class="text-left bg-gray-300 border-b border-grey uppercase">
                <th class="px-2 py-6">ID</th>
                <th class="text-sm text-gray-700">Team Name</th>
                <th class="hidden md:table-cell  text-sm text-gray-700">
                        Team Code
                </th>
                <th class="hidden md:table-cell text-sm text-gray-700">
                        Team Leader
                </th>
                <th class="hidden md:table-cell text-sm text-gray-700">
                    Details
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($teams as $team)
            <tr class="accordion border-b border-grey-light hover:bg-gray-100">
                <td class="px-3 py-4" >
                    <span>
                            {{$team->id}}
                    </span>
                </td>
                <td class="px-3 py-4">
                    <span>
                        {{$team->team_name}}
                    </span>
                </td>
                <td class="px-3 py-4">
                    <span>
                        {{$team->team_code}}
                    </span>
                    
                </td>
                @if($team->team_leader == null)
                    <td class="hidden md:table-cell">
                            <p class="text-sm text-gray-700 font-medium">None</p>
                        </td>
                    @else
                    <td class="hidden md:table-cell">
                            <p class="text-sm text-gray-700 font-medium"> {{$team->team_leader}}</p>
                        </td>
                    @endif
                <td class="hidden md:table-cell">
                    <p class="text-xs text-gray-500 font-medium">
                            {{$team->team_code}}
                    </p>
                </td>
                <td>
                    <svg class="mr-3 md:mr-1 h-12 w-6 fill-current text-grey-dark"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M4 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                    </svg>
                </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
{{-- <div class="card h-100 shadow-sm">
    <div class="card-body">

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

                    <td class="text-center text-light-blue"><span class="mr-3"><a
                                href="{{ route('teams.show', $team->id)}}">Consultants</a></span><a href=""
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu"> <a class="dropdown-item" data-toggle="modal" href=""
                                data-target=".edit-member">Edit</a> <a class="dropdown-item"
                                href="{{ route('teams.show', $team->id)}}">View</a> <a
                                class="dropdown-item text-light-danger" href="#">Delete</a> </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div> --}}
@endsection