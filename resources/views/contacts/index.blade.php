@extends('layouts.app')
@section('content')
<div class="text-gray-700 mb-2">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="w-11/12 py-8 mx-auto">
            <index-contacts :data-contacts="{{$contacts}}"></index-contacts>
        </div>
    </div>
</div>
{{-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @can('isAdmin')
                <button class="btn btn-outline-danger mb-3 btn-sm" data-toggle="modal" data-target="#addContact"><i
                        class="fas fa-plus"></i> Add contacts</button>
                @endcan
                <div class="table-responsive">
                    <table class="table table-sm table-striped" id="example23">
                        <thead>
                            <tr>
                                <th>Contact Name</th>
                                <th>Full Address</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Phone</th>
                                @if(Gate::check('isAdmin'))
                                <th>Actions</th>
                                @else
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->account_name}}</td>
<td>{{$contact->full_address}}</td>
<td>{{$contact->contact_email}}</td>
<td>{{$contact->country}}</td>
<td>{{$contact->contact_phone}}</td>
@if(Gate::check('isAdmin'))
<td>
    <a href="/contacts/{{$contact->id}}"><i class="fa fa-eye" title="View contact"></i></a>
    <a href="#"><i class="fa fa-edit editContact" id="{{$contact->id}}" title="Edit contact"></i></a>
    <a href="#"><i class="fas fa-cart-plus contactOpportunity text-danger" id="{{$contact->id}}"
            title="Add Opportunity"></i></a>
</td>
@else
@endif
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
