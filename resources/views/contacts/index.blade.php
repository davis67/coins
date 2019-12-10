@extends('layouts.app')
@section('content')
<div class="text-gray-700 mb-2">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="w-11/12 py-8 mx-auto">
            <index-contacts :data-contacts="{{$contacts}}"></index-contacts>
        </div>
    </div>
</div>
@endsection
