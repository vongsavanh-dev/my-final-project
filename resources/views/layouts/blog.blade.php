<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/page.css">
    {{--   <link rel="stylesheet" href="/css/page.min.css"> --}}
    <link rel="stylesheet" href="/css/style.css">

    <!-- Favicons -->
    {{-- <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
        <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="/">
                    {{-- <img class="logo-dark" src="/fontend/images/laovieng.png" alt="logo"
                        style="width: 50px;height:50px;"> --}}
                    <a class="btn btn-xs btn-round btn-success logo-dark" href="/">ກັບຄືນໜ້າຫຼັກ</a>

                    <img class="logo-light" src="/fontend/images/laovieng.png" alt="logo"
                        style="width: 120px;height:120px;">

                </a>
            </div>

        </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    @yield('header')

    <!-- Main Content -->
    @yield('content')

    <!-- Scripts -->
    <script src="{{asset('js/page.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>
