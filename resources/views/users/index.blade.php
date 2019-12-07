<!-- Extend Main layout -->

@extends('layouts.app')
@section('content')
<div class="text-gray-700 mb-2">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="w-11/12 py-8 mx-auto">
            <index-users></index-users>
        </div>
    </div>
</div>
{{-- <div class="card">
    <div class="card-body">
        @if(Gate::check('isAdmin') || Gate::check('isDirector'))
        <a href="#" class="btn btn-outline-danger mb-2 btn-sm" data-toggle="modal" data-target="#addUser"><i
                class="fas fa-user-plus"></i> Add User</a>
        @endif
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
</div>
@endif
<div class="table-responsive">
    <table class="table color-table table-bordered table-striped" id="example23">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Team</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->staffId}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobilePhone}}</td>
                <td>{{$user->team->team_code}}</td>
                <td>Title</td>
                <td>{{$user->userStatus}}</td>
                @if(Gate::check('isAdmin'))
                <td>
                    <a href="/users/{{$user->id}}"><i class="fa fa-eye" title="View user"></i></a>
                    <a href="#"><i class="fa fa-edit editUser" id="{{$user->id}}" title="Edit user"></i></a>
                </td>
                @endif
                <td class="text-center text-light-blue"><a href="" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu"> <a class="dropdown-item text-center text-primary"
                            href="{{route('users.edit', $user->id)}}"><i class="p-2 fa fa-pencil"></i>Edit</a> <a
                            class="dropdown-item text-center" href="{{route('users.show', $user->id)}}"><i
                                class="p-2 fas fa-eye"></i>View</a>
                        <div class="dropdown-item text-danger">
                            <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger">
                                    <i class="p-2 fas fa-trash"></i>Suspend</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div> --}}
</div>
@endsection
