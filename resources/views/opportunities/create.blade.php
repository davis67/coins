@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="border-b px-6">
            <div class="flex justify-between -mb-px">
                <div class="text-blue-700 py-4 text-lg">Opportunities</div>
                <div class="lg:flex">

                        <a href="{{route('opportunities.index')}}" class="appearance-none py-4 {{ Nav::isRoute('opportunities.index', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} mr-6">
                                List Opportunities
                            </a>
        
        
                            <a href="{{route('opportunities.create')}}" class="appearance-none py-4 {{ Nav::isRoute('opportunities.create', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} text-grey-700 border-b border-transparent hover:border-grey-700 mr-6">
                                Add New Opportunity
                            </a>
        
        
                            <a class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700">
                                Summary
                            </a>

                </div>
            </div>
        </div>
        <div class="text-gray-700 mb-2">
        <create-oppportunities :data-teams="{{$teams}}" :data-countries="{{json_encode($countries)}}"></create-opportunities>       
        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <form class="form" method="post" action="{{route('opportunities.store')}}">
@csrf
<div class="form-group">
    <label for="opportunity_name">Opportunity Name:</label>
    <textarea name="opportunity_name"
        class="form-control {{ $errors->has('opportunity_name') ? ' is-invalid' : '' }} form-control-sm" rows="2"
        placeholder="Enter opportunity">{{old('opportunity_name')}}</textarea>
    @if($errors->has('opportunity_name'))
    <span class="text-danger">
        {{$errors->first('opportunity_name')}}
    </span>
    @endif
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputType">Type</label>
        <select id="inputType" name="type"
            class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }} form-control-sm">
            <option value="">Choose...</option>
            @foreach(["Existing Business","New Business"] as $item )
            <option value="{{$item}}" {{old('type')==$item ? 'selected':''}}>{{$item}}</option>
            @endforeach
        </select>
        @if($errors->has('type'))
        <span class="text-danger">
            {{$errors->first('type')}}
        </span>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputClient">Client Name</label>
        <input type="text" class="form-control {{ $errors->has('clients_name') ? ' is-invalid' : '' }} form-control-sm"
            name="clients_name" placeholder="Enter Client name" value="{{old('clients_name')}}">
        @if($errors->has('clients_name'))
        <span class="text-danger">
            {{$errors->first('clients_name')}}
        </span>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputCountry">Country</label>
        <select class="form-control select-multiple {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm "
            name="country">
            <option value="">choose...</option>
            @foreach($countries as $country)
            <option value="{{$country}}" {{old('country')==$country ? 'selected':''}}>{{$country}}
            </option>
            @endforeach
        </select>
        @if($errors->has('country'))
        <span class="text-danger">
            {{$errors->first('country')}}
        </span>
        @endif
    </div>
</div>

<div class="form-row ">

    <div class="form-group col-md-4">
        <label for="inputDate">External Deadline</label>
        <input type="date" name="external_deadline"
            class="form-control {{ $errors->has('external_deadline') ? ' is-invalid' : '' }} form-control-sm "
            value="{{old('external_deadline')}}">
        @if($errors->has('external_deadline'))
        <span class="text-danger">
            {{$errors->first('external_deadline')}}
        </span>
        @endif
    </div>
    <div class="form-group col-4">
        <label for="inputRef">Revenue</label>
        <input type="number" class="form-control form-control-sm " name="revenue" id="inputRevenue"
            value="{{old('revenue')}}" placeholder="Enter Revenue.">
        @if($errors->has('revenue'))
        <span class="text-danger">
            {{$errors->first('revenue')}}
        </span>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputProject">Funded By</label>
        <input type="text" class="form-control {{ $errors->has('funder') ? ' is-invalid' : '' }} form-control-sm "
            name="funder" placeholder="Enter Funder's name" value="{{old('funder')}}">
        @if($errors->has('funder'))
        <span class="text-danger">
            {{$errors->first('funder')}}
        </span>
        @endif
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputClient">Leads Source</label>
        <select id="inputSalesStage"
            class="form-control select-multiple {{ $errors->has('lead_source') ? ' is-invalid' : '' }} form-control-sm "
            name="lead_source">
            <option value="">Choose...</option>
            @foreach(['Cold call', 'Existing customer', 'Self Generated', 'Employee', 'Partner',
            'Public Relations',
            'Direct Mail', 'Conference', 'Trade Show', 'website', 'word of mouth', 'Email',
            'Compaign', 'other'] as
            $value => $item)
            <option value="{{$item}}" {{old('lead_source')==$item ? 'selected':''}}>{{$item}}
            </option>
            @endforeach
        </select>
        @if($errors->has('lead_source'))
        <span class="text-danger">
            {{$errors->first('lead_source')}}
        </span>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputZip">Internal Deadline</label>
        <input type="date"
            class="form-control {{ $errors->has('internal_deadline') ? ' is-invalid' : '' }} form-control-sm "
            name="internal_deadline" id="inputZip" value="{{old('internal_deadline')}}">
        @if($errors->has('internal_deadline'))
        <span class="text-danger">
            {{$errors->first('internal_deadline')}}
        </span>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputTeam">Team </label>
        <select id="inputTeam"
            class="form-control select-multiple {{ $errors->has('team_id') ? ' is-invalid' : '' }} form-control-sm"
            name="team_id">
            <option value="">Choose...</option>
            @foreach(
            $teams as $team)
            <option value="{{$team->id}}" {{old('team_id')==$team->id ? 'selected':''}}>
                {{$team->team_name}}</option>
            @endforeach
        </select>
        @if($errors->has('team_id'))
        <span class="text-danger">
            {{$errors->first('team_id')}}
        </span>
        @endif
    </div>
    <div class="form-group col-3">
        <label for="inputRef">Probability(%)</label>
        <input type="number" class="form-control {{ $errors->has('probability') ? ' is-invalid' : '' }} form-control-sm"
            name="probability" id="inputRevenue" placeholder="Enter Probability in %." value="{{old('probability')}}">
        @if($errors->has('probability'))
        <span class="text-danger">
            {{$errors->first('probability')}}
        </span>
        @endif
    </div>
</div>
<div class="form-row ">

</div>
<div class="form-group ">
    <label for="assignees">Assigned To: </label>
    <select multiple="multiple" name="assigned_to[]"
        class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm select-multiple"
        id="assignees">
        <option value="">Choose...</option>
        @foreach(
        $users as $user)
        <option value="{{$user->id}}" {{old('assigned_to')==$user->id ? 'selected':''}}>
            {{$user->name}}</option>
        @endforeach
    </select>
    @if($errors->has('assigned_to'))
    <span class="text-danger">
        {{$errors->first('assigned_to')}}
    </span>
    @endif
</div>
<div class="form-group pull-left">
    <button type="submit" class="btn btn-outline-danger ">Save Opportunity</button>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div> --}}
@endSection
