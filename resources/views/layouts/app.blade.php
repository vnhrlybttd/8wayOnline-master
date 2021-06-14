<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mercancías</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/image/logofav.png')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/pace.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/dataTable.js') }}" defer></script>
  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js" defer></script>
    <!-- --------------------------- -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"
        defer>
    </script>
    <script src="{{ asset('js/layoutJS/script.min.js')}}" defer></script> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.css') }}" rel="stylesheet" defer>

    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css" defer>

    <script src="https://kit.fontawesome.com/3dec9cf0b9.js" crossorigin="anonymous"></script>

      <!-- Scripts in Bootstrap Studio -->
      <script src="{{ asset('js/layoutJS/jquery.min.js')}}" ></script>
      <script src="{{ asset('js/layoutJS/bs-init.js')}}" ></script>
      <script src="{{ asset('js/layoutJS/theme.js')}}" ></script> 
     

</head>

<style>
    body {
        width: 100%;
        overflow-x: hidden;

    }

    .back-to-top {
        position: fixed;
        bottom: 25px;
        right: 25px;
        display: none;
    }

    .headers {
        position: fixed;
        top: 0;
        z-index: 1;
        width: 100%;
        background-color: #f1f1f1;

    }

    .progress-container {
        width: 100%;
        height: 4px;
        background: #ccc;
    }

    .progress-bar {
        height: 4px;
        background: #8b0000;
        width: 0%;
    }

</style>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i
                class="fas fa-chevron-up"></i></a>



        <div id="wrapper">

            @can('admin')

            <div class="headers">
                <div class="progress-container">
                    <div class="progress-bar" id="myBar"></div>
                </div>
            </div>

            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                        href="{{ route('home') }}">
                        <div class="sidebar-brand-icon"><i class="fas fa-user-secret"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>Admin</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}" href="{{ route('home') }}">
                                <i class="fas fa-tachometer-alt">
                                </i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'units' ? 'active' : null }}" href="{{ route('units.index') }}"><i
                                    class="fas fa-balance-scale"></i><span>Units</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'categories' ? 'active' : null }}" href="{{ route('categories.index') }}"><i
                                    class="fas fa-sitemap"></i><span>Categories</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'products' ? 'active' : null }}" href="{{ route('products.index') }}"><i
                                    class="fas fa-boxes"></i><span>Products</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'pending_order' ? 'active' : null }}" href="{{ route('pending_order.index') }}"><i
                                    class="fas fa-business-time"></i><span>Orders</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'pending_payments' ? 'active' : null }}" href="{{ route('pending_payments.index') }}"><i
                                    class="fas fa-money-check"></i><span>Payments</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'delivery' ? 'active' : null }}" href="{{ route('delivery.index') }}"><i
                                    class="fas fa-truck"></i><span>Deliveries</span></a>
                        </li>
                        {{-- <a class="nav-link"><s><i
                                    class="far fa-chart-bar"></i><span>Reports</span></s> <span class="text-danger"><i class="fas fa-info-circle text-danger"></i> (Under Construction)</span></a> --}}

                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'orders' ? 'active' : null }}" href="{{route('orders.create')}}"><i
                                    class="fas fa-shopping-cart"></i><span>
                                    Cart</span></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ Request::segment(1) === 'users' ? 'active' : null }}" href="{{route('users.index')}}"><i
                                    class="fas fa-user-friends"></i><span>Users</span></a>
                        </li>
                        </li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            @endcan
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    @can('admin')
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid">

                            <img src="{{asset('image/logo.png')}}"
                            alt="No Image" style="height: 40px">
                            <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
                                type="button"><i class="fas fa-bars"></i></button>

                            <ul class="nav navbar-nav flex-nowrap ml-auto">
                                {{--  <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    data-toggle="dropdown" aria-expanded="false" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"><span
                                            class="badge badge-danger badge-counter">3+</span><i
                                            class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i
                                                        class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i
                                                        class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i
                                                        class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your
                                                    account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"><i
                                            class="fas fa-envelope fa-fw"></i><span
                                            class="badge badge-danger badge-counter">7</span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                        help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last
                                                        month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am
                                                        very happy with the progress so far, keep up the good
                                                        work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                    src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is
                                                        because someone told me that people say this to all dogs, even
                                                        if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All
                                            Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                    aria-labelledby="alertsDropdown"></div>
                            </li> 
                            <div class="d-none d-sm-block topbar-divider"></div>--}}


                                <li class="nav-item dropdown no-arrow" role="presentation">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            data-toggle="dropdown" aria-expanded="false" href="#"><span
                                                class="d-none d-lg-inline mr-2 text-gray-600 small">{{ Auth::user()->name }}</span>{{-- <img
                                            class="border rounded-circle img-profile"
                                            src="assets/img/avatars/avatar5.jpeg"> --}}<i
                                                class="fas fa-user-circle h3 text-primary"></i></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                            role="menu">
                                            {{--  <a class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                                                class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                            <a class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity
                                                log</a>
                                            <div class="dropdown-divider"></div> --}}

                                            <a class="dropdown-item" role="presentation" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </nav>
                    @endcan
                    <div class="container-fluid mt-4 pb-5 mb-5">
                        @yield('content')
                        @include('cookieConsent::index')
                    </div>
                    
                </div>










                <div class="mt-5"></div>
                <div class="mt-5"></div>
                <div class="mt-5"></div>

                @can('admin')
                <footer class="bg-white sticky-footer mt-5">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>mercancías ©  2020 | Made by: Vin 
                                Battad</span></div>
                    </div>
                </footer>
                @endcan


            </div>
        </div>






        
      

       

        <script>
            // When the user scrolls the page, execute myFunction 
            window.onscroll = function () {
                myFunction()
            };

            function myFunction() {
                var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                var scrolled = (winScroll / height) * 100;
                //document.getElementById("myBar").style.width = scrolled + "%";
            }


        </script>



</body>

</html>
