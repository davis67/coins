@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto md:px-4 pt-6 pb-8">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="border-b md:px-6 py-4 px-4 lg:pb-0">
            <div class="flex justify-between -mb-px">
                <div class="hidden text-blue-700 py-4 text-lg">Opportunities</div>
                <div class="lg:flex">
                    <a href="{{route('opportunities.index')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.index', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} mr-6 lg:hidden">
                        List 
                    </a>
                    <a href="{{route('opportunities.index')}}"
                        class="hidden appearance-none py-4 {{ Nav::isRoute('opportunities.index', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} mr-6 lg:block">
                        List Opportunities
                    </a>

                    {{-- @can('create', App\Opportunity::class) --}}
                    <a href="{{route('opportunities.create')}}"
                        class="appearance-none py-4 {{ Nav::isRoute('opportunities.create', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} text-grey-700 border-b border-transparent hover:border-grey-700 mr-6 lg:hidden">
                        Add 
                    </a>
                    <a href="{{route('opportunities.create')}}"
                        class="hidden appearance-none py-4 {{ Nav::isRoute('opportunities.create', NULL, $activeClass= 'text-blue-700 border-blue-700 border-b ') }} text-grey-700 border-b border-transparent hover:border-grey-700 mr-6 lg:block">
                        Add New Opportunity
                    </a>
                    {{-- @endcan --}}


                    <a class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700">
                        Summary
                    </a>
                    

                </div>
            </div>
        </div>
        <div class="text-gray-700 mb-2">
            <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                {{-- <div class="flex items-center px-6 lg:hidden">
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
                </div> --}}
                {{-- <div class="hidden lg:flex">
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
                </div> --}}
                <div class="w-11/12 py-8 mx-auto">
                    <index-opportunities :data-opportunities="{{json_encode($opportunities) }}"></index-opportunities>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection
