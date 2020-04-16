@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto h-full sm:px-4 pt-2 lg:pt-6 pb-2 lg:pb-6">
    <div class="bg-white border-t border-b sm:border-l sm:border-r  shadow mb-6">
        <div class="border-b px-6">
            <div class="flex justify-between -mb-px">
                <dd class="mt-1 p-4  lg:w-2/4 sm:text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2" style="text-align:left;">
                    {{$opportunity->opportunity_name}}
                </dd>
                <div class=" hidden lg:flex">

                    <a href="{{route('opportunities.index')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.index') }} mr-6">
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
        <div class="text-gray-700">
            <show-oppportunity :data-opportunity="{{json_encode($opportunity)}}">
                </show-opportunity>
        </div>
    </div>
</div>
@endSection
