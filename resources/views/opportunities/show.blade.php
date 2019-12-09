@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto h-full sm:px-4 pt-6 pb-8">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="border-b px-6">
            <div class="flex justify-between -mb-px">
                <div class="text-blue-700 py-4 text-lg">Opportunities</div>
                <div class="lg:flex">

                    <a href="{{route('opportunities.index')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.index', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} mr-6">
                        List Opportunities
                    </a>


                    <a href="{{route('opportunities.create')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.create', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} text-grey-700 border-b border-transparent hover:border-grey-700 mr-6">
                        Add New Opportunity
                    </a>


                    <a class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700">
                        Summary
                    </a>

                </div>
            </div>
        </div>
        <div class="mx-auto shadow-inset text-gray-700 mb-2">
            <div class="mx-auto py-4  pr-6 md:mr-10">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <div class=" block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="inline-full-name">
                            Opportunity Name:
                        </div>
                    </div>
                    <div class="md:w-2/4">
                        <div class="italic font-semibold">
                            {{$opportunity->opportunity_name}}
                        </div>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label class=" block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="inline-username">
                            OM Number:
                        </label>
                    </div>
                    <div class="md:w-3/4">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-blue-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-username" type="text" value="{{$opportunity->om_number}}" disabled />
                        <p class="text-red-500 text-xs italic"><span class="text-lg">☝</span> This is commonly written
                            as
                            OM-{{$opportunity->om_number}}.</p>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4"></div>
                    <div class="md:w-3/4 block  font-bold">
                        <span class="text-lg">
                            <span class=" text-blue-700">Country: </span> {{$opportunity->country}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="mx-auto  pr-6 md:mr-10">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <div class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="inline-full-name">
                            Name of the Client:
                        </div>
                    </div>
                    <div class="md:w-2/4">
                        <div>
                            {{$opportunity->clients_name}}
                        </div>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="inline-username">
                            Funded By
                        </label>
                    </div>
                    <div class="md:w-3/4">
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-username" type="text" value="{{$opportunity->funder}}" disabled />
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4"></div>
                    <div class="md:w-3/4 md:flex block  font-bold">
                        <div class="md:w-1/4">
                            <span>Sales Stage: <span
                                    class="italic text-xs text-blue-700 bg-gray-200 py-2 px-1 rounded">{{$opportunity->sales_stage}}</span></span>
                        </div>
                        <div class="md:w-1/4"><span>Leads Source:
                                <span class="italic text-xs text-blue-700 bg-gray-200 py-2 px-2 rounded">
                                    {{$opportunity->lead_source}}</span></div>
                        <div class="md:w-1/4"><span>Revenue:<span
                                    class="italic text-xs text-blue-700 bg-gray-200 py-2 px-2 rounded">
                                    {{$opportunity->revenue}}</span></span></div>
                        <div class="md:w-1/4"><span>Team: <span
                                    class="italic text-xs text-blue-700 bg-gray-200 py-2 px-2 rounded">{{$opportunity->team->team_name}}</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mx-auto pr-6 md:mr-10">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/4">
                        <label class="block text-blue-700 font-bold md:text-right mb-1 md:mb-0 pr-4"
                            for="inline-username">
                            Deadlines of the opportunity:
                        </label>
                    </div>
                    <div class="md:w-3/4 md:flex">
                        <div class="md:flex md:w-1/2 md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-blue-700 font-bold md:text-right md:text-sm mb-1 md:mb-0 pr-4"
                                    for="inline-username">
                                    Internal Deadline:
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-blue-700 leading-tight focus:outline-none italic focus:bg-white focus:border-purple-500"
                                    id="inline-username" type="text" value="{{$opportunity->internal_deadline}}"
                                    disabled />
                            </div>
                        </div>
                        <div class="md:flex  md:w-1/2 md:items-center mb-6">
                            <div class="md:w-1/4">
                                <label class="block text-blue-700 font-bold md:text-right md:text-sm mb-1 md:mb-0 pr-4"
                                    for="inline-username">
                                    External Deadline:
                                </label>
                            </div>
                            <div class="md:w-3/4">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-blue-700 italic leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-username" type="text" value="{{$opportunity->external_deadline}}"
                                    disabled />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/4"></div>
                    <div class="md:w-3/4 py-4">
                        <a class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4"
                            href="{{route("opportunities.edit", $opportunity->id)}}">
                            Edit Opportunity
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection
