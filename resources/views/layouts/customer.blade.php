<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>8wayOnline</title>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/pace.js') }}" defer></script>
     <script src="{{ asset('js/script.js') }}" defer></script>
     <script src="{{ asset('js/dataTable.js') }}" defer></script>
     <!-- Scripts in Bootstrap Studio -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"
        defer>
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.css') }}" rel="stylesheet">

    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script src="https://kit.fontawesome.com/3dec9cf0b9.js" crossorigin="anonymous"></script>

    

</head>

<style>
    body {
        width: 100%;
        overflow-x: hidden;

    }

    .back-to-top {
        position: fixed;
        bottom: 65px;
        right: 40px;
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
            <div class="container mt-4 pb-5 mb-5">
                @yield('content')
            </div>
        </div>
    </div>


    <footer class="footer mt-auto py-3" style="background-color: black">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <small class="text-white">8wayonline © 2020</small>
                </div>
                <div>
                    <a class="text-white" href="https://www.facebook.com/8wayonline/" rel="noopener noreferrer" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a class="text-white" href="https://www.messenger.com/t/8wayonline"  rel="noopener noreferrer" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                    <a class="text-white" href="https://www.instagram.com/8wayonline/" rel="noopener noreferrer" target="_blank"><i class="fab fa-instagram-square"></i></a>
                </div>
            </div>
        </div>
    </footer>





    

    <script>
        // When the user scrolls the page, execute myFunction 
        window.onscroll = function () {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            //document.getElementById("wrapper").style.width = scrolled + "%";
        }

    </script>



</body>

</html>
