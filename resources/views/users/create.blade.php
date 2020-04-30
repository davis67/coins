<!-- Extend Main layout -->
@extends('layouts.app')
@section('content')
    <div class="lg:pt-8">

            <div
                class="w-full mx-auto flex justify-between"
            >
                <div
                    class="mb-6"
                >
                    <nav
                        class="sm:hidden"
                    >
                        <a
                            href="#"
                            class="flex items-center text-sm leading-5 font-medium text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                        >
                            <svg
                                class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Back
                        </a>
                    </nav>
                    <nav
                        class="hidden sm:flex items-center text-sm leading-5 font-medium"
                    >
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >Home</a
                        >
                        <svg
                            class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >users</a
                        >
                        <svg
                            class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <a
                            href="#"
                            class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out"
                            >view
                            all
                            users</a
                        >
                    </nav>
                </div>
                <div
                    class="btn-group"
                    slot="icons"
                >
            <a href="{{route('users.index')}}"
                        class="inline-block leading-tight bg-red-800 border border-red-700 hover:bg-red-700 text-sm lg:text-md px-2 md:px-3 py-1 md:py-2 text-white no-underline shadow-md"
                    >
                        View all users
            </a>
                </div>
            </div>
            <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
        <div class="w-11/12 py-8 mx-auto">
        <create-users  :data-teams="{{json_encode($teams)}}" :data-users="{{$users}}"></create-users>
    </div>
</div>
    </div>
@endsection
