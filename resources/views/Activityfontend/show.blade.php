<!DOCTYPE html>
@extends('layouts.blog')
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    @section('title')
    {{$post->title}}
    @endsection

</head>

<body>

    @section('header')
    <header class="header text-white h-fullscreen pb-80"
        style="background-image: url('../../storage/{{$post->image}}');" data-overlay="8">
        <div class="container text-center">

            <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">

                    <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
                    <h1 class="display-4 mt-7 mb-8">{{$post->title}}</h1>
                    <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">Hossein Shams</a></p>
                    <p><img class="avatar avatar-sm" src="{{-- ../assets/img/avatar/2.jpg --}}" alt="..."></p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
                </div>

            </div>

        </div>
    </header><!-- /.header -->
    @endsection

    @section('content')
    <div class="section" id="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    {!!$post->content!!}
                    <div class="gap-xy-2 mt-6">
                        @foreach ($post->tags as $tag)
                        <a class="badge badge-pill badge-secondary"
                            href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                        @endforeach
                    </div>

                    {{-- comment show --}}
                    <hr>
                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                        this.page.url = "{{config('app.url')}}/blog/posts/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier ="{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                            (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://http-localhost-8000-t0qhbvpey3.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by
                            Disqus.</a>
                    </noscript>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- Scripts -->
    <script src="{{asset('js/page.js')}}"></script>
    <script src="{{asset('js/page.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <!-- Scripts -->
</body>

</html>
