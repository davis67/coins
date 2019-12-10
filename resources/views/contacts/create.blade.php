@extends('layouts.app')
@section('content')

<div class="text-gray-700 mb-2">
    <create-contacts :data-countries="{{json_encode($countries)}}"></create-contacts>
</div>

@endsection
