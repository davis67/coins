@extends('layouts.app')
@section('content')

<div class="text-gray-700 mb-2">
    <edit-contact :data-contact="{{$contact}}" :data-countries="{{json_encode($countries)}}"></edit-contact>
</div>

@endsection
