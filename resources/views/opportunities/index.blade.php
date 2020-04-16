
@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto h-full sm:px-4 pt-6 pb-8">
    <div class="bg-white border-t border-b sm:border-l sm:border-r  shadow mb-6">
        <div class="border-b px-6">
            <div class="flex justify-between -mb-px">
                <div class="text-gray-900 py-4 text-lg">View all Opportunity</div>
                <div class="lg:flex">

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
        <div class="w-11/12 py-8 mx-auto">
            <index-opportunities></index-opportunities>
        </div>
    </div>
</div>
@endSection

