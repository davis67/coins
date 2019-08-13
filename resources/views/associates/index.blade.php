@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        @can('isAdmin')
        <a href="{{route('associates.create')}}" class="btn btn-outline-danger m-2 btn-sm"><i class="fas fa-plus"></i>
            Add Associates</a>
        @endcan
        <div class="table-responsive">
            <table class="table table-sm table-hover" id="example23">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Specialization</th>
                        <th>Experience</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($associates as $associate)
                    <tr>
                        <td><a href="/associates/{{$associate->id}}" class="text-primary"
                                title="View Associate">{{$associate->associate_name}}</a></td>
                        <td>{{$associate->associate_email}}</td>
                        <td>{{$associate->associate_phone}}</td>
                        <td>{{$associate->associate_country}}</td>
                        <td>{{$associate->associate_expertise}}</td>
                        <td>{{$associate->associate_experience}} Years</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection