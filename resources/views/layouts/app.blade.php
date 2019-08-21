<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AH Consulting Ltd</title>

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
    {{-- <link href="{{ asset("css/dashboard.css") }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset("css/fontawesome-all.min.css") }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset("/files/ahlogo.png") }}" type="image/png">
    <!-- Bootstrap Core CSS --> --}}
    <link href="{{asset('plugins/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    {{-- <link href="{{asset('plugins/vendors/morrisjs/morris.css')}}" rel="stylesheet"> --}}
    <!--c3 CSS -->
    {{-- <link href="{{asset('plugins/vendors/c3-master/c3.min.css')}}" rel="stylesheet"> --}}
    <!--Toaster Popup message CSS -->
    <link href="{{asset('/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('assets/css/pages/tab-page.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/css/timeline-vertical-horizontal.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/vendors/bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet"
        type="text/css">
</head>

<body class="fix-header fix-sidebar card-no-border">
        <div id="main-wrapper">
            <header class="topbar">
                <div class="container">
                    <nav class="navbar top-navbar navbar-expand-md navbar-light">
                        <div class="navbar-header"> <a class="navbar-brand" href="">
                                <!-- Logo icon -->
                                <b>
                                    <img src="{{ asset("/files/ahlogo.png") }}" alt="AH Consulting Ltd"
                                        class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src='{{ asset("/files/ahlogo.png") }}' alt="AH Consulting Ltd"
                                        class="light-logo" />
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
                                        <input type="text" class="form-control float-left"
                                            placeholder="Type for search...">
                                    </li>
                                </ul>
                            </div>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <div class="float-right pr-3">
                                <ul class="navbar-nav my-lg-0 float-right">

                                    <li aria-haspopup="true" aria-expanded="false" class="nav-item"><a href="{{ route('leaves.index')}}" class="nav-link">Leave</a></li>
                                    <li aria-haspopup="true" aria-expanded="false" class="nav-item"><a href="{{route('teams.index')}}" class="nav-link">Teams</a></li>
                                <li aria-haspopup="true" aria-expanded="false" class="nav-item"><a href="" class="nav-link">Help</a></li>
                                    {{-- <li class="nav-item dropdown"> <a
                                            class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                                class="mdi mdi-bell"></i>
                                            <div class="notify"> <span class="heartbit"></span> <span
                                                    class="point"></span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right mailbox animated fadeIn">
                                            <ul>
                                                <li>
                                                    <div class="drop-title">You have <span class="highlighted">3
                                                            new</span>
                                                        Notifications</div>
                                                </li>
                                                <li>
                                                    <div class="message-center">
                                                        <!-- Message -->
                                                        <a href="#">
                                                            <div class="mail-content"> <i class="fas fa-envelope"></i> 2
                                                                new
                                                                messages <span
                                                                    class="float-right text-light">15:07</span>
                                                            </div>
                                                        </a>
                                                        <!-- Message -->
                                                        <!-- Message -->
                                                        <a href="#">
                                                            <div class="mail-content"> <i class="fas fa-comment"></i> 1
                                                                new
                                                                comment <span
                                                                    class="float-right text-light">11.08.2018</span>
                                                            </div>
                                                        </a>
                                                        <!-- Message -->
                                                        <a href="#">
                                                            <div class="mail-content"> <i
                                                                    class="fas fa-calendar-alt"></i> 2
                                                                Events Soon <span
                                                                    class="float-right text-light">10.08.2018</span>
                                                            </div>
                                                        </a> </div>
                                                </li>
                                                <li> <a class="nav-link text-center" href="javascript:void(0);">See all
                                                        notifications </a> </li>
                                            </ul>
                                        </div>
                                    </li> --}}
                                    <!-- Profile -->
                                    <!-- ============================================================== -->
                                    <li class="nav-item dropdown u-pro"> <a
                                            class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                                src="{{ asset("assets/imgs/users/download.jpeg") }}" alt="user"
                                                class="" /><span class="circle-status"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right animated fadeIn">
                                            <ul class="dropdown-user">
                                                <li><a href="#"><i class="fas fa-user mr-1"></i> My Profile</a></li>
                                                <li><a href="#"><i class="fas fa-cog mr-1"></i> Settings</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="#"><i class="fas fa-sign-in-alt mr-1"></i> Logout</a></li>
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
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="clearfix"></li>
                            <li class="nav-item"><a class="nav-link" href="{{route("home")}}"><i
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
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <div class="page-wrapper">
                <main role="main" class="container-fluid">
                    {{-- Content for all the pages --}}
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            @yield("content")
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <footer>
        <p class="text-center">@copyright 2019 AH Consulting Ltd</p>
    </footer>
    <!-- Scripts -->

     <script src="{{ asset("js/app.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.21.0/feather.min.js"></script>
    {{-- <script src="{{ asset("js/jquery.js") }}"></script> --}}
    {{-- <script src="{{ asset("js/script.js") }}"></script> --}}
    <script>
        feather.replace()
    </script>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('plugins/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('/js/app.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('plugins/vendors/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{asset('plugins/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        function toggleIcon(e) {
      $(e.target)
        .prev('.card-link')
        .find(".more-less")
        .toggleClass('fa-plus fa-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    </script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('plugins/vendors/ps/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--c3 JavaScript -->
    <script src="{{asset('plugins/vendors/d3/d3.min.js') }}"></script>
    <script src="{{asset('plugins/vendors/c3-master/c3.min.js') }}"></script>
    <!--jquery knob -->
    <script src="{{asset('plugins/vendors/knob/jquery.knob.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{asset('plugins/vendors/raphael/raphael-min.js') }}"></script>
    <script src="{{asset('plugins/vendors/morrisjs/morris.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.') }}"></script>
    <!-- Dashboard JS -->
    <script src="{{asset('assets/js/dashboard-projects.js') }}"></script> 
    <script>
    $('#example23').DataTable();
    </script>
</body>

</html>