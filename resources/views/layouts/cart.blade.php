<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="description" content="We serve what you deserve." />
    <meta name="keywords" content="mercancias" />
    <meta name="author" content="Vin" />
    <meta property="og:url" content="https://mercancias.online">


    <meta property="og:title" content="mercancias" />
    <meta property="og:description" content="We serve what you deserve." />
    <meta property="og:image" content="{{asset('image/logo.png')}}" />
    <meta property="og:type" content="article">
    <meta property="fb:app_id" content="572968336979308" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>mercancías</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('/image/logofav.png')}}">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/pace.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/dataTable.js') }}" defer></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"
        defer>
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet"
        type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/pace.css') }}" rel="stylesheet">

    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script src="https://kit.fontawesome.com/3dec9cf0b9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" defer />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" defer>
    <link href="{{asset('hover/css/hover-min.css')}}" rel="stylesheet">

</head>


<style>
    html {
        max-width: 100%;
        overflow-x: hidden;
    }

    body {

        overflow-x: hidden;
        overflow-y: auto;
        margin: 0px;
        padding: 0px;
        font-family: 'Montserrat', sans-serif;
    }

    body::-webkit-scrollbar {
        width: 12px;
        /* width of the entire scrollbar */
    }

    body::-webkit-scrollbar-track {
        background: white;
        /* color of the tracking area */
    }

    body::-webkit-scrollbar-thumb {
        background-color: #7BD33F;
        /* color of the scroll thumb */
        border-radius: 20px;
        /* roundness of the scroll thumb */
        border: 3px solid white;
        /* creates padding around scroll thumb */
    }

</style>




<body>
    @include('sweetalert::alert')

    <div id="app">




        {{--  <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i
                class="fas fa-chevron-up"></i></a> --}}

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg p-2 bg-white rounded sticky-top">
            <a class="navbar-brand d-lg-none d-xl-none pl-2" href="{{route('order.products')}}"> <img
                    src="{{asset('image/logo.png')}}" alt="No Image" style="height: 40px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand d-none d-lg-block d-xl-block" href="{{route('home.home')}}">
                        <img src="{{asset('image/logo.png')}}" alt="No Image" style="height: 40px">
                    </a>
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase {{ Request::is('/') ? 'text-success' : '' }}"
                                href="{{route('home.home')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-uppercase" href="#">Contacts</a>
                        </li> --}}

                    </ul>

                    <span
                        class="{{Request::is('order/products') ? 'd-none' : '' }} {{Request::is('order/products/payment') ? 'd-none' : '' }} ">
                        <a href="{{route('order.products')}}" style="text-decoration: none"
                            class="btn btn-outline-success text-uppercase d-lg-block d-xl-block rounded-pill">
                            Order Now
                        </a>
                    </span>

                </div>
            </div>
        </nav>







        <div id="wrapper">



            @yield('content')
            @include('cookieConsent::index')
        </div>







        <footer class="footer mt-auto py-3" style="background-color: black">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div>
                        <small class="text-white">mercancías © 2020</small>
                    </div>
                    <div>
                        <small class="text-muted"></small>
                        <a class="text-white" href="https://www.facebook.com/Mercanciasonline" rel="noopener noreferrer"
                            target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a class="text-white" href="https://www.messenger.com/t/Mercanciasonline"
                            rel="noopener noreferrer" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                        <a class="text-white" href="https://www.instagram.com/Mercanciasonline/"
                            rel="noopener noreferrer" target="_blank"><i class="fab fa-instagram-square"></i></a>
                    </div>
                </div>
            </div>
        </footer>


       



    </div>








 






</body>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

</script>

<script>
    var div = document.createElement('div');
    div.className = 'fb-customerchat';
    div.setAttribute('page_id', '110126177381951');
    div.setAttribute('ref', '');
    document.body.appendChild(div);
    window.fbMessengerPlugins = window.fbMessengerPlugins || {
      init: function () {
        FB.init({
          appId            : '1678638095724206',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v3.3'
        });
      }, callable: []
    };
    window.fbAsyncInit = window.fbAsyncInit || function () {
      window.fbMessengerPlugins.callable.forEach(function (item) { item(); });
      window.fbMessengerPlugins.init();
    };
    setTimeout(function () {
      (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) { return; }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    }, 0);
  </script>

</html>
