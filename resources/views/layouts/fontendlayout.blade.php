<html class="no-js" lang="">
@include('Common.headerfontend')

<body data-spy="scroll" data-target=".navbar-collapse">
    @include('Common.nav')

    @yield('content')


    @include('Common.footerfont')


    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>

    <script src="/fontend/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="/fontend/js/vendor/bootstrap.min.js"></script>
    <script src="/fontend/js/plugins.js"></script>
    <script src="/fontend/js/main.js"></script>

</body>

</html>
