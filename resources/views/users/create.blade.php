<!-- Extend Main layout -->
@extends('layouts.app')
@section('content')
    <div class="lg:pt-8">
        <create-users :data-titles="{{$titles}}" :data-teams="{{$teams}}" :data-users="{{$users}}"></create-users>
    </div>
@endsection
