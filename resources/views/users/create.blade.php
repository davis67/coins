<!-- Extend Main layout -->
@extends('layouts.app')
@section('content')
<div class="text-gray-700 mb-2">
    <create-users :data-titles="{{$titles}}" :data-teams="{{$teams}}" :data-users="{{$users}}"></create-users>
</div>
@endsection
