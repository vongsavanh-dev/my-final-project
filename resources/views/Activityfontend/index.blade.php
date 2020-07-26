<!DOCTYPE html>
@extends('layouts.blog')
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    @section('title')
    laovieng
    @endsection

</head>

<body>

    @section('header')
    <!-- Header -->
    <header class="header text-center text-white" style="background-image:url('fontend/images/laovieng2.jpg');>
        <div class=" container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>ວິທະຍາໄລລາວວຽງ</h1>
                <p class="lead-2 opacity-90 mt-3">Laovieng Colleage</p>
            </div>
        </div>

        </div>
    </header><!-- /.header -->
    @endsection

    @section('content')
    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                            @forelse ($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block" style="height:450px">
                                    <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top"
                                            style="height:300px" src="storage/{{$post->image}}"
                                            alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                href="{{route('blog.show',$post->id)}}">{{$post->category->name}}</a>
                                        </p>
                                        <h5 class="mb-0"><a class="text-dark"
                                                href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h2 class="text-center"> ບໍ່ພົບຂໍ້ມູນ <stong>{{request()->query('search')}} ທີ່ທ່ານຄົ້ນຫາ
                                </stong>
                            </h2>
                            @endforelse
                        </div>
                        {{$posts->appends(['search'=>request()->query('search')])->links()}}
                    </div>

                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">
                            <h6 class="sidebar-title">ຄົ້ນຫາຂໍ້ມູນ</h6>
                            <form class="input-group" action="{{route('activity')}}" method="GET">
                                <input type="text" class="form-control" name="search" placeholder="Search">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                            </form>
                            <hr>
                            <h6 class="sidebar-title">ປະເພດແຈ້ງການ</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach ($categorys as $category)
                                <div class="col-6"><a
                                        href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
                                @endforeach
                            </div>
                            <hr>
                            <h6 class="sidebar-title">ແຈ້ງການທີ່ກ່ຽວຂ້ອງ</h6>
                            <div class="gap-multiline-items-1">
                                @foreach ($tags as $tag)
                                <a class="badge badge-secondary"
                                    href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    @endsection
    <!-- Scripts -->
    <script src="{{asset('js/page.js')}}"></script>
    <script src="{{asset('js/page.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>
