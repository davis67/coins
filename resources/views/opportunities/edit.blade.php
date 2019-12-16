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

                    @can('create', App\Opportunity::class)
                    <a href="{{route('opportunities.create')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.create', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} text-grey-700 border-b border-transparent hover:border-grey-700 mr-6">
                        Add New Opportunity
                    </a>
                    @endcan


                    <a class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700">
                        Summary
                    </a>

                </div>
            </div>
        </div>
        <div class="text-gray-700 mb-2">
            <edit-oppportunities :data-teams="{{$teams}}" :data-countries="{{json_encode($countries)}}"
                :data-opportunity="{{$opportunity}}">
                </edit-opportunities>
        </div>
    </div>
</div>
@endSection
