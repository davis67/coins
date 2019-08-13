@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row container">
            <div class="col-md-12 mb-2 shadow-sm">
                {{var_dump($errors)}}
                <form class="form" method="post" action="{{route('opportunities.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="opportunity_name">Opportunity Name:</label>
                        <textarea name="opportunity_name" class="form-control form-control-sm" rows="2"
                            placeholder="Enter opportunity" value="{{old('opportunity_name')}}"></textarea>
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
                                class="form-control {{ $errors->has('business_number') ? ' is-invalid' : '' }} form-control-sm">
                                <option value="">Choose...</option>
                                <option value="0 {{old('business_number')}}">Existing Business</option>
                                <option value="1 {{old('business_number')}}">New Business</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputClient">Client Name</label>
                            <input type="text"
                                class="form-control {{ $errors->has('client_name') ? ' is-invalid' : '' }} form-control-sm"
                                name="client_name" placeholder="Enter Client name" value="{{old('client_name')}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCountry">Country</label>
                            <input type="text"
                                class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }} form-control-sm "
                                name="country" placeholder="Enter country name" value="{{old('country')}}">
                        </div>
                    </div>

                    <div class="form-row ">

                        <div class="form-group col-md-4">
                            <label for="inputDate">External Deadline</label>
                            <input type="date" name="external_deadline"
                                class="form-control {{ $errors->has('external_deadline') ? ' is-invalid' : '' }} form-control-sm "
                                value="{{old('external_deadline')}}">
                        </div>
                        <div class="form-group col-4">
                            <label for="inputRef">Revenue</label>
                            <input type="number" class="form-control form-control-sm " name="revenue" id="inputRevenue"
                                placeholder="Enter Revenue.">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputClient">Leads Source</label>
                            <select id="inputSalesStage"
                                class="form-control {{ $errors->has('lead_source') ? ' is-invalid' : '' }} form-control-sm "
                                name="lead_source">
                                <option value="">Choose...</option>
                                @foreach(['Cold call', 'Existing customer', 'Self Generated', 'Employee', 'Partner',
                                'Public Relations',
                                'Direct Mail', 'Conference', 'Trade Show', 'website', 'word of mouth', 'Email',
                                'Compaign', 'other'] as
                                $value => $item)
                                <option value="{{$value}}" {{old('lead_source')==$item ? 'selected':''}}>{{$item}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip">Internal Deadline</label>
                            <input type="date"
                                class="form-control {{ $errors->has('internal_deadline') ? ' is-invalid' : '' }} form-control-sm "
                                name="internal_deadline" id="inputZip" value="{{old('internal_deadline')}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTeam">Team </label>
                            <select id="inputTeam"
                                class="form-control {{ $errors->has('team') ? ' is-invalid' : '' }} form-control-sm"
                                name="team_id">
                                <option value="">Choose...</option>
                                @foreach(
                                $teams as $team)
                                <option value="{{$team->id}}">{{$team->team_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <label for="inputRef">Probability(%)</label>
                            <input type="number"
                                class="form-control {{ $errors->has('probability') ? ' is-invalid' : '' }} form-control-sm"
                                name="probability" id="inputRevenue" placeholder="Enter Probability in %."
                                value="{{old('probability')}}">
                        </div>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputProject">Funded By</label>
                            <input type="text"
                                class="form-control {{ $errors->has('funder') ? ' is-invalid' : '' }} form-control-sm "
                                name="funder" placeholder="Enter Funder's name" value="{{old('funder')}}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="assignees">Assigned To: </label>
                        <select multiple="multiple" name="assigned_to[]"
                            class="form-control {{ $errors->has('assigned_to') ? ' is-invalid' : '' }} form-control-sm"
                            id="assignees">
                            <option value="">Choose...</option>
                            @foreach(
                            $users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pull-left">
                        <button type="submit" class="btn btn-outline-danger ">Save Opportunity</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endSection