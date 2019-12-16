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
        <div>
            <div class="bg-blue-700">
                <div class="container mx-auto px-4">
                    <div class="flex items-center md:justify-between py-4">
                        <div class="w-1/4 md:hidden">
                            <svg class="fill-current text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                            </svg>
                        </div>
                        <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                            COINS
                        </div>
                        <div class="w-1/4 md:w-auto md:flex text-right">
                            <div>
                                <img class="inline-block h-8 w-8 rounded-full"
                                    src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                            </div>
                            <div class="hidden md:block md:flex md:items-center ml-2">
                                <span class="text-white text-sm mr-1">DAVIS AGABA</span>
                                <div>
                                    <svg class="fill-current text-white h-4 w-4 block opacity-50"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden bg-blue-700 md:block md:bg-white md:border-b">
                <div class="container mx-auto px-4">
                    <div class="md:flex">
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('home')}}"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center {{ Nav::isRoute('home', NULL, $activeClass= 'text-blue-700 border-b border-blue-700') }} py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z" />
                                </svg> Dashboard
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('opportunities.index')}}"
                                class="no-underline {{ Nav::isResource('opportunities', NULL, $activeClass = 'text-blue-700 border-b border-blue-700') }} text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path d="M8 7h10V5l4 3.5-4 3.5v-2H8V7zm-6 8.5L6 12v2h10v3H6v2l-4-3.5z"
                                        fill-rule="nonzero" /></svg> Opportunities
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('documents.index')}}"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                        fill-rule="nonzero" /></svg> Documents
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('teams.index')}}"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                        fill-rule="nonzero" /></svg> Teams
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('users.index')}}"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                        fill-rule="nonzero" /></svg> Users
                            </a>
                        </div>
                        <div class="flex -mb-px mr-8">
                            <a href="{{route('contacts.index')}}"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M11 12h2v2h9s-.149-4.459-.2-5.854C21.75 6.82 21.275 6 19.8 6h-3.208l-1.197-2.256C15.064 3.121 14.951 3 14.216 3H9.783c-.735 0-.847.121-1.179.744-.165.311-.7 1.318-1.196 2.256H4.199c-1.476 0-1.945.82-2 2.146C2.145 9.473 2 14 2 14h9v-2zM9.649 4.916c.23-.432.308-.516.817-.516h3.067c.509 0 .588.084.816.516L14.924 6h-5.85l.575-1.084zM13 17h-2v-2H2.5s.124 1.797.199 3.322c.031.633.218 1.678 1.8 1.678H19.5c1.582 0 1.765-1.047 1.8-1.678.087-1.568.2-3.322.2-3.322H13v2z"
                                        fill-rule="nonzero" /></svg> Contacts
                            </a>
                        </div>
                        <div class="flex -mb-px">
                            <a href="#"
                                class="no-underline text-white opacity-50 md:text-gray-700 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-700">
                                <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M18.783 12c0-1.049.646-1.875 1.617-2.443a8.932 8.932 0 0 0-.692-1.672c-1.089.285-1.97-.141-2.711-.883-.741-.74-.968-1.621-.683-2.711a8.732 8.732 0 0 0-1.672-.691c-.568.97-1.595 1.615-2.642 1.615-1.048 0-2.074-.645-2.643-1.615-.58.172-1.14.403-1.671.691.285 1.09.059 1.971-.684 2.711-.74.742-1.621 1.168-2.711.883A8.797 8.797 0 0 0 3.6 9.557c.97.568 1.615 1.394 1.615 2.443 0 1.047-.645 2.074-1.615 2.643.173.58.404 1.14.691 1.672 1.09-.285 1.971-.059 2.711.682.741.742.969 1.623.684 2.711.532.288 1.092.52 1.672.693.568-.973 1.595-1.617 2.643-1.617 1.047 0 2.074.645 2.643 1.617a8.963 8.963 0 0 0 1.672-.693c-.285-1.088-.059-1.969.683-2.711.741-.74 1.622-1.166 2.711-.883.287-.532.52-1.092.692-1.672-.973-.569-1.619-1.395-1.619-2.442zM12 15.652a3.653 3.653 0 1 1 0-7.306 3.653 3.653 0 0 1 0 7.306z"
                                        fill-rule="nonzero" /></svg> Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield("content")
        {{-- <div id="main-wrapper">
        <header class="topbar">
            <div class="container">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <div class="navbar-header"> <a class="navbar-brand" href="">

                            <b>
                                <img src="{{ asset("/files/ahlogo.png") }}" alt="AH Consulting Ltd" class="dark-logo"
        />

        <img src='{{ asset("/files/ahlogo.png") }}' alt="AH Consulting Ltd" class="light-logo" />
        </b>
        AH Consulting Ltd
        </a>
    </div>
    <div class="top-bar-main">
        <div class="float-left">
            <ul class="navbar-nav">
                <li class="nav-item "><a
                        class="nav-link navbar-toggler sidebartoggler waves-effect waves-dark float-right"
                        href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a></li>
                <li class="nav-item hidden-xs-down app-search">
                    <input type="text" class="form-control float-left" placeholder="Type for search...">
                </li>
            </ul>
        </div>

        <div class="float-right pr-3">
            <ul class="navbar-nav my-lg-0 float-right">

                <li aria-haspopup="true" aria-expanded="false" class="nav-item"><a href="{{route('teams.index')}}"
                        class="nav-link {{ Nav::isResource('teams') }}">Teams</a></li>
                <li aria-haspopup="true" aria-expanded="false" class="nav-item"><a href="" class="nav-link">Help</a>
                </li>
                <li class="nav-item dropdown u-pro"> <a
                        class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                            src="{{ asset("assets/imgs/users/download.jpeg") }}" alt="user" class="" /><span
                            class="circle-status"></span></a>
                    <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                        <ul class="dropdown-user">
                            <li><a href="{{route('users.show', auth()->user()->id)}}"><i class="fas fa-user mr-1"></i>
                                    My Profile</a></li>
                            <li><a href="{{route('users.show', auth()->user()->id)}}"><i class="fas fa-cog mr-1"></i>
                                    Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="fas fa-sign-in-alt mr-1"></i> Logout</a>
                                @include('partials.logout')</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    </nav>
    </div>
    </header>
    <div class="container">
        <aside class="left-sidebar">
            <ul class="nav-bar navbar-inverse">
                <li class="nav-item"> <a
                        class="nav-link navbar-toggler sidebartoggler hidden-sm-down waves-effect waves-dark float-right"
                        href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a> </li>
            </ul>

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="clearfix"></li>
                        <li class="nav-item {{ Nav::isRoute('home') }}"><a class="nav-link" href="{{route("home")}}"><i
                                    class="flaticon-desktop-computer-screen-with-rising-graph"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="flaticon-calendar"></i><span class="hide-menu">Opportunities</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('opportunities.index')}}">Show All</a></li>
                                <li><a href="{{route('opportunities.create')}}">Create </a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('projects.index')}}"><i class="flaticon-mail"></i> <span
                                    class="hide-menu"></span>Projects</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="flaticon-speech"></i><span class="hide-menu">Contacts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('contacts.index')}}">view contacts</a></li>
                                <li><a href="{{route('contacts.create')}}">Add New</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="flaticon-forms"></i><span class="hide-menu">Associates</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('associates.index')}}">view associates</a></li>
                                <li><a href="{{route('associates.create')}}">Add New</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="flaticon-restaurant"></i><span class="hide-menu">Saved Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="demo-admin/minton/ecommerce-dashboard.html">Current Month</a></li>
                                <li><a href="demo-admin/minton/ecommerce-pro-list.html">Quarter Year</a></li>
                                <li><a href="demo-admin/minton/ecommerce-add-new.html">Full Year</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="flaticon-restaurant"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li class="{{ Nav::isResource('users') }}"><a href="{{route('users.create')}}">Add</a>
                                </li>
                                <li><a href={{route('users.index')}}>View
                                        Users</a></li>
                                <li><a href="{{ route('users.frozen')}}">restore/delete
                                        users</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>
        <div class="page-wrapper">
            <main role="main" class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        @yield("content")
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div> --}}
    </div>
    <footer>
        <div class="bg-white border-t">
            <div class="container mx-auto px-4">
                <div class="md:flex justify-between items-center text-sm">
                    <div class="text-center md:text-left py-3 md:py-4 border-b md:border-b-0">
                        <a href="#" class="no-underline text-grey-700 mr-4">Home</a>
                        <a href="#" class="no-underline text-grey-700 mr-4">User Manual</a>
                        <a href="#" class="no-underline text-grey-700">Developers Manual</a>
                    </div>
                    <div class="md:flex md:flex-row-reverse items-center py-4">
                        <div class="text-center mb-4 md:mb-0 md:flex">
                            <div class="w-48 inline-block relative mb-4 md:mb-0 md:mr-4">
                                <select
                                    class="leading-tight block appearance-none w-full bg-white border border-grey-light px-3 py-2 pr-8 rounded">
                                    <option>English</option>
                                </select>
                                <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <a href="#"
                                    class="inline-block leading-tight bg-blue-700 border border-blue-700 hover:bg-blue-700 px-3 py-2 text-white no-underline rounded">Need
                                    help?</a>
                            </div>
                        </div>
                        <div class="text-grey-700 text-center md:mr-4">&copy; 2019 Coins</div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </footer>
    <!-- Scripts -->

    <script src="{{ asset("js/app.js") }}"></script>
</body>

</html>
