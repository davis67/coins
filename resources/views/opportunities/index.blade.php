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
            <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                <div class="flex items-center px-6 lg:hidden">
                    <div class="flex-grow flex-no-shrink py-6">
                        <div class="text-grey-700er mb-2">
                            <span class="text-2xl align-top">CA$</span>
                            <span class="text-3xl">21,404</span>
                            <span class="text-2xl align-top">.74</span>
                        </div>
                        <div class="text-green-light text-sm">
                            &uarr; CA$12,955.35 (154.16%)
                        </div>
                    </div>
                    <div class="flex-shrink w-32 inline-block relative">
                        <select
                            class="block appearance-none w-full bg-white border border-grey-light px-4 py-2 pr-8 rounded">
                            <option>BTC</option>
                            <option>ETH</option>
                            <option>LTC</option>
                        </select>
                        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-gray">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex">
                    <div class="w-1/3 text-center py-8">
                        <div class="border-r">
                            <div class="text-gray-700er mb-2">
                                <span class="text-3xl">04</span>
                            </div>
                            <div class="text-sm uppercase text-gray tracking-wide">
                                Weekly
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 text-center py-8">
                        <div class="border-r">
                            <div class="text-gray-700er mb-2">
                                <span class="text-3xl">198</span>
                            </div>
                            <div class="text-sm uppercase text-gray tracking-wide">
                                Monthly
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 text-center py-8">
                        <div>
                            <div class="text-gray-700er mb-2">
                                <span class="text-3xl">14</span>
                            </div>
                            <div class="text-sm uppercase text-gray tracking-wide">
                                Last Six(6) Months
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-11/12 py-8 mx-auto">
                    <table class="table-auto w-full shadow-md rounded" id="example23">
                        <thead>
                            <tr class="text-left bg-gray-300 border-b border-grey uppercase">
                                <th class="px-2 py-6">OM Number</th>
                                <th class="text-sm text-gray-700">Opportunity Name</th>
                                <th class="hidden md:table-cell  text-sm text-gray-700">
                                    Country
                                </th>
                                <th class="hidden md:table-cell text-sm text-gray-700">
                                    Team
                                </th>
                                <th class="hidden md:table-cell text-sm text-gray-700">
                                    Internal Deadline
                                </th>
                                <th class="hidden md:table-cell text-sm text-gray-700">
                                    External Deadline
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($opportunities as $opportunity)
                            <tr class="accordion border-b border-grey-light hover:bg-gray-100">
                                <td class="px-3 py-4">
                                    <span>
                                        {{$opportunity->om_number}}
                                    </span>
                                </td>
                                <td class="px-3 py-4">
                                    <span>
                                        {{$opportunity->opportunity_name}}
                                    </span>
                                    
                                </td>
                                <td class="hidden md:table-cell">
                                    <p class="text-sm text-gray-700 font-medium"> {{$opportunity->country}}</p>
                                </td>

                                <td class="hidden md:table-cell">
                                    <p class="text-xs text-gray-500 font-medium">
                                            {{$opportunity->team->team_code}}
                                    </p>
                                </td>
                                <td class="hidden md:table-cell">
                                    <p class="text-xs text-gray-500 font-medium">
                                            {{$opportunity->internal_deadline}}
                                    </p>
                                </td>
                                <td class="hidden md:table-cell">
                                        <p class="text-xs text-gray-500 font-medium">
                                                {{$opportunity->external_deadline}}
                                        </p>
                                    </td>

                                <td>
                                    <svg class="mr-3 md:mr-1 h-12 w-6 fill-current text-grey-dark"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M4 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                    </svg>
                                </td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-2">
                <a href="{{route('opportunities.create')}}" class="btn btn-outline-danger mb-2 btn-sm"
id="create_opportunity" style="@if(Gate::check('isConsultant')) display:none @endif">
<i class="fa fa-plus"></i> Create Opportunity
</a>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5 id="summaries"></h5>
        <div id="records-list">
            <button type="button" class="btn btn-outline-success" id="export_opportunities"
                style="float:right; display:none">Export <i class="fa fa-file-excel"></i></button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        @include('partials/flash-message')
    </div>
    <div class="table-responsive col-md-12 col-lg-12">

        <table class="table color-table table-hover" id="example23">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Opportunity</th>
                    <th>Country</th>
                    <th>Team</th>
                    <th>Internal Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($opportunities as $opportunity)
                <tr>
                    <td>
                        @if(Gate::check('isAdmin') || Gate::check('isDirector'))
                        <a href="/opportunities/{{$opportunity->id}}" class="text-primary"
                            title="View Opportunity">{{$opportunity->om_number}}</a>
                        @else
                        {{$opportunity->om_number}}
                        @endif
                    </td>
                    <td>{{$opportunity->opportunity_name}}</td>
                    <td>{{$opportunity->country}}</td>
                    <td>{{$opportunity->team->team_code}}</td>
                    <td>{{$opportunity->internal_deadline}}</td>
                    <td class="text-center text-light-blue"><a href="" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu"> <a class="dropdown-item" data-toggle="modal" href=""
                                data-target=".edit-member">Edit</a> <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item text-light-danger" href="#">Delete</a> </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div> --}}
@endSection
