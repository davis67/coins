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
                          class="block appearance-none w-full border border-gray-400 text-gray-700 py-2 px-3 pr-8 bg-gray-200 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-600"
                        >
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
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg">
                            <span class="text-sm font-medium text-gray-700">Part 2</span>
                            <span class="text-xs font-semibold text-gray-700">2</span>
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Part 3 && Part 4</span>
                            <span class="text-xs font-semibold text-gray-700">1</span>
                        </a>
                        <a href="#" class="flex justify-between items-center px-4 py-1 rounded-lg ">
                            <span class="text-sm font-medium text-gray-700">Part 5 && Part 6</span>
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
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M12 7v10m5-5H7"/>
                            </svg>
                            <span class="ml-1">Feedback about this page?</span>
                        </button>
                </nav>

            </div>

                <div class="flex-1 min-w-0 flex flex-col bg-white">
                    <div class="flex-shrink-0 border-b-2 border-gray-200">
                        <header class="px-6">
                            <div class="flex justify-between py-3 items-center border-b border-gray-200">

                                    <button class="flex px-4  py-2 items-center text-sm text-white font-medium bg-gray-600 rounded-md hover:bg-gray-700">
                                        Back to COINS
                                    </button>

                                <div class="flex items-center">
                                        <button>
                                            <svg class="h-6 w-6 text-gray-500" fill="none">
                                                <path d="M12 22a3 3 0 100-6 3 3 0 000 6z" fill="currentColor"/>
                                                <path d="M10.02 4.28L10 4a2 2 0 113.98.28A7 7 0 0119 11v5a1 1 0 001 1 1 1 0 110 2H4a1 1 0 010-2 1 1 0 001-1v-5a7 7 0 015.02-6.72z" fill="currentColor" />
                                            </svg>
                                        </button>
                                        <button class="ml-4">
                                            <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="Your profile Image">
                                        </button>
                                    </div>
                            </div>
                            <div class="flex flex-center justify-between py-2">
                                    <div class="flex items-center">
                                        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">Welcome to the (MEAT) Page.</h2>
                                    </div>
                                    <div class="flex">
                                        <span class="inline-flex p-1 rounded-md">
                                            <label for="demo1" class="ml-4 flex items-center cursor-pointer">
                                                <!-- toggle -->
                                                <div class="relative">
                                                    <!-- input -->
                                                    <input id="demo1" type="checkbox" checked class="hidden" />
                                                    <!-- line -->
                                                    <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                    <!-- dot -->
                                                    <div class="toggle__dot_meats absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0">
                                                    </div>
                                                </div>
                                                <div class="ml-3 text-gray-600 text-lg font-large">
                                                    dark mode
                                                </div>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                        </header>
                    </div>
                    <div class="flex-1 ">
                        <main class="p-3 flex h-full overflow-hidden">
                            <div class="flex-shrink-0 p-3 w-80 bg-gray-100 rounded-md">
                                <h3 class="text-sm font-medium text-gray-900">Backlog</h3>
                                <ul class="mt-2">
                                    <li>
                                        <a href="#" class="block p-5 bg-white rounded-md shadow">
                                            <div class="flex justify-between">
                                               <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                               <span>
                                                   <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                               </span>
                                            </div>
                                           <div class="mt-2 flex justify-between items-baseline">
                                               <div class="text-sm text-gray-600">
                                                   <time datetime="2019-09-14">Sep 14</time>
                                                </div>
                                               <div>
                                                   <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                       <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                           <circle cx="4" cy="4" r="3"/>
                                                       </svg>
                                                       <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                   </span>
                                               </div>
                                           </div>
                                        </a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#" class="block p-5 bg-white rounded-md shadow">
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                                <span>
                                                    <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                                </span>
                                            </div>
                                            <div class="mt-2 flex justify-between items-baseline">
                                                <div class="text-sm text-gray-600">
                                                    <time datetime="2019-09-14">Sep 14</time>
                                                </div>
                                                <div>
                                                    <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                        <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                            <circle cx="4" cy="4" r="3"/>
                                                        </svg>
                                                        <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mt-3">
                                        <a href="#" class="block p-5 bg-white rounded-md shadow">
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                                <span>
                                                    <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                                </span>
                                            </div>
                                            <div class="mt-2 flex justify-between items-baseline">
                                                <div class="text-sm text-gray-600">
                                                    <time datetime="2019-09-14">Sep 14</time>
                                                </div>
                                                <div>
                                                    <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                        <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                            <circle cx="4" cy="4" r="3"/>
                                                        </svg>
                                                        <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                                <div class="flex-shrink-0 p-3 w-80 bg-gray-100 rounded-md">
                                        <h3 class="text-sm font-medium text-gray-900">Backlog</h3>
                                        <ul class="mt-2">
                                            <li>
                                                <a href="#" class="block p-5 bg-white rounded-md shadow">
                                                    <div class="flex justify-between">
                                                       <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                                       <span>
                                                           <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                                       </span>
                                                    </div>
                                                   <div class="mt-2 flex justify-between items-baseline">
                                                       <div class="text-sm text-gray-600">
                                                           <time datetime="2019-09-14">Sep 14</time>
                                                        </div>
                                                       <div>
                                                           <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                               <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                                   <circle cx="4" cy="4" r="3"/>
                                                               </svg>
                                                               <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                           </span>
                                                       </div>
                                                   </div>
                                                </a>
                                            </li>
                                            <li class="mt-3">
                                                <a href="#" class="block p-5 bg-white rounded-md shadow">
                                                    <div class="flex justify-between">
                                                        <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                                        <span>
                                                            <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="mt-2 flex justify-between items-baseline">
                                                        <div class="text-sm text-gray-600">
                                                            <time datetime="2019-09-14">Sep 14</time>
                                                        </div>
                                                        <div>
                                                            <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                                    <circle cx="4" cy="4" r="3"/>
                                                                </svg>
                                                                <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mt-3">
                                                <a href="#" class="block p-5 bg-white rounded-md shadow">
                                                    <div class="flex justify-between">
                                                        <p class="text-sm font-medium leading-snug text-gray-900">Add a discount code to checkout page.</p>
                                                        <span>
                                                            <img class="ml-2 rounded-full h-6 w-6 " src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&facepad=2.25&fit=facearea&w=144&h=144&q=80" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="mt-2 flex justify-between items-baseline">
                                                        <div class="text-sm text-gray-600">
                                                            <time datetime="2019-09-14">Sep 14</time>
                                                        </div>
                                                        <div>
                                                            <span class="px-2 py-1 inline-flex items-center bg-teal-100 rounded">
                                                                <svg class="h-2 w-2 text-teal-500" viewBox="0 0 8 8" fill="currentColor">
                                                                    <circle cx="4" cy="4" r="3"/>
                                                                </svg>
                                                                <span class="text-sm font-medium text-teal-900">Feature Request</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>

                                        </ul>
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
