@extends('layouts.app')
@section('content')
<div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="border-b px-6">
            <div class="flex justify-between -mb-px">
                <div class="lg:hidden text-blue-700 py-4 text-lg">
                    General
                </div>
                <div class="hidden lg:flex">
                    <button type="button" class="appearance-none py-4 text-blue-700 border-b border-blue-700 mr-4">
                        All
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                        TCS
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                        MCS
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                        CSS
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                        HCM
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                        DCS
                    </button>
                </div>
                <div class="flex text-sm">
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-3">
                        1M
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-3">
                        1D
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-3">
                        1W
                    </button>
                    <button type="button" class="appearance-none py-4 text-blue-700 border-b border-blue-700 mr-3">
                        1M
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-3">
                        1Y
                    </button>
                    <button type="button"
                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700">
                        ALL
                    </button>
                </div>
            </div>
        </div>
          <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Total Opportunities</h5>
                                    <h3 class="font-bold text-3xl">39 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-orange-600"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Total Consultants</h5>
                                    <h3 class="font-bold text-3xl">249 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">New Consultants</h5>
                                    <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-blue-600"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Teams</h5>
                                    <h3 class="font-bold text-3xl">152 days</h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Projects</h5>
                                    <h3 class="font-bold text-3xl">7</h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <!--Metric Card-->
                        <div class="bg-white border rounded shadow p-2">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded p-3 bg-red-600"><i class="fas fa-inbox fa-2x fa-fw fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-500">Issues</h5>
                                    <h3 class="font-bold text-3xl">3 <span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                        <!--/Metric Card-->
                    </div>
                </div>
    </div>
</div>
 <!--Console Content-->
<div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
    <!--Divider-->
    <hr class="border-b-2 border-gray-400 my-8 mx-4">
    <div class="flex flex-row flex-wrap flex-grow mt-2">
        <div class="w-full md:w-1/2 p-3">
            <!--Graph Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                    new Chart(document.getElementById("chartjs-7"), {
                        "type": "bar",
                        "data": {
                            "labels": ["January", "February", "March", "April"],
                            "datasets": [{
                                "label": "Page Impressions",
                                "data": [10, 20, 30, 40],
                                "borderColor": "rgb(255, 99, 132)",
                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                            }, {
                                "label": "Adsense Clicks",
                                "data": [5, 15, 10, 30],
                                "type": "line",
                                "fill": false,
                                "borderColor": "rgb(54, 162, 235)"
                            }]
                        },
                        "options": {
                            "scales": {
                                "yAxes": [{
                                    "ticks": {
                                        "beginAtZero": true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
                </div>
            </div>
            <!--/Graph Card-->
        </div>
    </div>
    <div class="w-full lg:w-1/2 px-4">
        <div class="bg-white border-t border-b sm:rounded sm:border shadow">
            <div class="border-b">
                <div class="flex justify-between px-6 -mb-px">
                    <h3 class="text-blue-700 py-4 font-normal text-lg">Recent Activity</h3>
                </div>
            </div>
            <div>
                <div class="text-center px-6 py-4">
                    <div class="py-8">
                        <div class="mb-4">
                            <svg class="inline-block fill-current text-gray h-16 w-16"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z" />
                            </svg>
                        </div>
                        <p class="text-2xl text-gray-700 font-medium mb-4">No buys or sells yet</p>
                        <p class="text-gray max-w-xs mx-auto mb-6">You've successfully linked a payment
                            method and can start buying digital currency.</p>
                        <div>
                            <button type="button"
                                class="bg-blue-700 hover:bg-blue-700 text-white border border-blue-700 rounded px-6 py-4">Buy
                                now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
@endsection
