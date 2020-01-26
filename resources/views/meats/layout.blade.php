<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AH Consulting Ltd</title>
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="font-sans bg-gray-200 flex flex-col min-h-screen w-full">
        <div class="h-screen flex">
            <div class="w-64 px-8 py-3 bg-gray-100 border-r overflow-auto">
                <span class="font-bold flex justify-center">
                    <div class="relative">
                        <select
                            class="block appearance-none w-full border border-gray-400 text-gray-700 py-2 px-3 pr-8 bg-white leading-tight focus:outline-none focus:bg-white focus:border-gray-600">
                            <option>2020</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </span>
                <nav class="mt-8">
                    <h2 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">PARTS</h2>
                    <div class="mt-2 -mx-3">
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg bg-gray-200">
                            <span class="text-sm font-medium text-gray-900">Part 1</span>
                            <span class="text-xs font-semibold text-gray-700">36</span>
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Part 2/Part 3/ Part 4</span>
                            <span class="text-xs font-semibold text-gray-700">1</span>
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Part 5 /Part 6</span>
                            <!-- <span class="text-xs font-semibold text-gray-700">14</span> -->
                        </a>
                    </div>
                </nav>
                <nav class="mt-8">
                    <h2 class="text-xs font-semibold text-gray-600 uppercase tracking-wide">WEEKS</h2>
                    <div class="mt-2 -mx-3">
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Week 1</span>
                            <!-- <span class="text-xs font-semibold text-gray-700">2</span> -->
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Week 2</span>
                            <!-- <span class="text-xs font-semibold text-gray-700">2</span> -->
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Week 3</span>
                            <!-- <span class="text-xs font-semibold text-gray-700">1</span> -->
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Week 4</span>
                            <!-- <span class="text-xs font-semibold text-gray-700">14</span> -->
                        </a>
                    </div>
                    <button class="-ml-1 flex mt-2 items-center text-sm font-medium text-gray-600">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M12 7v10m5-5H7" />
                        </svg>
                        <span class="ml-1">Feedback about this page?</span>
                    </button>
                </nav>

            </div>

            <div class="flex-1 min-w-0 flex flex-col bg-white">
                <div class="flex-shrink-0 border-b-2 border-gray-200">
                    <header class="px-6">
                        <div class="flex justify-between py-3 items-center border-b border-gray-200">

                            <button
                                class="flex px-4  py-2 items-center text-sm text-white font-medium bg-red-800 rounded-md hover:bg-red-600">
                                Back to COINS
                            </button>

                            <div class="flex items-center">
                                <button class="text-sm">
                                    Welcome back, <span class="italic text-red-800 text-md">Consultant</span>
                                </button>


                            </div>
                        </div>
                        <div class="border-b px-6">
                            <div class="flex justify-between -mb-px">
                                <div class="lg:hidden text-blue-700 py-4 text-lg">
                                    Price Charts
                                </div>
                                <div class="hidden lg:flex">
                                    <button type="button"
                                        class="appearance-none py-4 text-blue-700 border-b border-blue-700 mr-4">
                                        Jan
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Feb
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Mar
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Apri
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        May
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Jun
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Jul
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Aug
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Sept
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Oct
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Nov
                                    </button>
                                    <button type="button"
                                        class="appearance-none py-4 text-grey-700 border-b border-transparent hover:border-grey-700 mr-4">
                                        Dec
                                    </button>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="flex-1 ">
                    <main class="p-3 h-full overflow-hidden">
                        <div class="flex  justify-center ">
                            @yield("meat-content")
                        </div>
                    </main>
                </div>
            </div>
        </div>

    </div>
    <!-- Scripts -->

    <script src="{{ asset("js/app.js") }}"></script>
</body>

</html>
