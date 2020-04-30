@extends('layouts.app')
@section('content')
 <div class="bg-white border-t mt-6 border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
    <div class="w-11/12 py-8 mx-auto">
    	<edit-contact :data-contact="{{$contact}}" :data-countries="{{json_encode($countries)}}"></edit-contact>
    </div>
</div>

@endsection
