<!DOCTYPE html>
<html lang="en">
@include('Common.header')

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Laovieng Collage</a><button
            class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button><!-- Navbar Search-->



        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                        {{ __('ອອກຈາກລະບົບ') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            </div>
            </li>
        </ul>
    </nav>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img src="/fontend/images/laovieng.png" style="width: 100px; height:100px; margin-left:50px">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class='fas fa-folder-open' style='font-size:24px'></i>
                            </div>
                            ຈັດການຂໍ້ມູນຫຼັກ
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('student.index')}}">ຂໍ້ມູນນັກສຶກສາ</a>
                                <a class="nav-link"
                                    href="{{-- {{route('studentregister.index')}} --}}">ຂໍ້ມູນການລົງທະບຽນ</a>
                                <a class="nav-link" href="{{route('teacher.index')}}">ຂໍ້ມູນອາຈານ</a>
                                <a class="nav-link" href="{{route('subject.index')}}">ຂໍ້ມູນວິຊາ</a>
                                <a class="nav-link" href="{{route('major.index')}}">ຂໍ້ມູນສາຂາ</a>
                                <a class="nav-link" href="{{route('academic.index')}}">ຂໍ້ມູນສົກຮຽນ</a>
                                <a class="nav-link" href="{{route('year.index')}}">ຂໍ້ມູນປີຮຽນ</a>
                                <a class="nav-link" href="{{route('session.index')}}">ຂໍ້ມູນພາກຮຽນ</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa fa-edit" style="font-size:24px"></i></div>
                            ຈັດການກິດຈະກຳ
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('category.index')}}">ປະເພດແຈ້ງການ</a>
                                <a class="nav-link" href="{{route('post.index')}}">ເເຈ້ງການ</a>
                                <a class="nav-link" href="{{route('tag.index')}}">ແຈ້ງການທີ່ກ່ຽວຂ້ອງ</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class='fas fa-address-card' style='font-size:24px'></i>
                            </div>
                            ຜົນການຮຽນ
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="">ກວດສອບຫ້ອງ</a>
                                <a class="nav-link" href="">ຂໍ້ມູນນັກສຶກສາ</a>
                                <a class="nav-link" href="">ບັນທຶກຄະແນນ</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class='fas fa-graduation-cap' style='font-size:24px'></i>
                            </div>
                            ເລື່ອນຊັ້ນຮຽນ
                        </a>

                        @if(auth()->user()->IsAdmin())
                        <a class="nav-link" href="{{route('users.index')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle" style="font-size:24px"></i>
                            </div>
                            ຜູ້ໃຊ້ລະບົບ
                        </a>
                        @endif

                        <a class=" nav-link" href="{{ route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <div class="sb-nav-link-icon">
                                <i class='fas fa-sign-in-alt' style='font-size:24px'></i>
                            </div>
                            ອອກຈາກລະບົບ
                        </a>



                    </div>
                </div>
            </nav>

        </div>
        {{-- content --}}
        <div id="layoutSidenav_content">
            @yield('content')
        </div>
        {{-- end-content --}}
    </div>


    @include('sweetalert::alert')

    {{-- link script --}}

    <script src="/js/scripts.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('script')


    {{-- end link script --}}


</body>

</html>
