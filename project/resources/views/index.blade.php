@extends('includes.master')
@section('content')

    <style>

    </style>
<section class="home-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 up">
                @foreach($channels as $channel)
                    <div class="col-md-6 ftv">
                        <div class="singletv">
                            <a href="{{url('/tv')}}/{{$channel->id}}">
                                @if($channel->live == "yes")
                                    <h5 class="red-break"><i class="fa fa-circle fa-fw"></i>Live</h5>
                                @endif
                                <img src="{{url('/assets/images/tv')}}/{{$channel->featured_image}}" alt="" class="thumb tvthumb">

                                <div class="post-content">
                                    <h3>{{$channel->title}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="sidebar-nav">
                    <div class="tvcats">
                        <h3>Categories</h3>
                        <ul class="nav nav-list categories">
                            @foreach($categories as $category)
                            <li><a href="{{url('/channels')}}/{{$category->slug}}"> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row tvsection">
    <div class="container">
    <hr>
            <div class="col-md-9">
                {{-- Advertisements Size: 728x90 --}}
                <div class="text-center">
                    <div class="desktop-advert">
                        @if(!empty($ads728x90))
                            @if($ads728x90->type == "banner")
                                <a class="ads" href="{{$ads728x90->redirect_url}}" target="_blank">
                                    <img class="banner-728x90" src="{{url('/')}}/assets/images/ads/{{$ads728x90->banner_file}}" alt="Advertisement">
                                </a>
                            @else
                                {!! $ads728x90->script !!}
                            @endif
                        @endif
                    </div>
                </div>

                <div class="wow fadeInUp row">
                        <div class="title-section">
                            <h1><span>Popular Channels</span></h1>
                        </div>
                    <div class="col-md-12" style="padding: 0">
                        @foreach($topchannels as $channel)
                            <div class="col-md-6 ftv">
                                <div class="singletv">
                                    <a href="{{url('/tv')}}/{{$channel->id}}">
                                        @if($channel->live == "yes")
                                            <h5 class="red-break"><i class="fa fa-circle fa-fw"></i>Live</h5>
                                        @endif
                                        <img src="{{url('/assets/images/tv')}}/{{$channel->featured_image}}" alt="" class="thumb tvthumb">

                                        <div class="post-content">
                                            <h3>{{$channel->title}}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="wow fadeInUp row">
                        <div class="title-section">
                            <h1><span>Latest Channels</span></h1>
                        </div>
                    <div class="col-md-12" style="padding: 0">
                        @foreach($latestchannels as $channel)
                            <div class="col-md-6 ftv">
                                <div class="singletv">
                                    <a href="{{url('/tv')}}/{{$channel->id}}">
                                        @if($channel->live == "yes")
                                            <h5 class="red-break"><i class="fa fa-circle fa-fw"></i>Live</h5>
                                        @endif
                                        <img src="{{url('/assets/images/tv')}}/{{$channel->featured_image}}" alt="" class="thumb tvthumb">

                                        <div class="post-content">
                                            <h3>{{$channel->title}}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>


            <div class="col-md-3">
                <div class="text-center">
                    <div class="desktop-advert">
                        @if(!empty($ads300x250))
                            @if($ads300x250->type == "banner")
                                <a class="ads" href="{{$ads300x250->redirect_url}}" target="_blank">
                                    <img class="banner-300x250" src="{{url('/')}}/assets/images/ads/{{$ads300x250->banner_file}}" alt="Advertisement">
                                </a>
                            @else
                                {!! $ads300x250->script !!}
                            @endif
                        @endif
                    </div>
                </div>

                <div class="side-socicon text-center">
                    @if($sociallinks[0]->f_status == "enable")
                        <a href="{{$sociallinks[0]->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if($sociallinks[0]->t_status == "enable")
                        <a href="{{$sociallinks[0]->twiter}}" class="twitter"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if($sociallinks[0]->g_status == "enable")
                        <a href="{{$sociallinks[0]->g_plus}}" class="google"><i class="fa fa-google"></i></a>
                    @endif
                    @if($sociallinks[0]->link_status == "enable")
                        <a href="{{$sociallinks[0]->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    @endif
                </div>


                <div class="text-center">
                    <div class="desktop-advert">
                        @if(!empty($ads300x600))
                            @if($ads300x600->type == "banner")
                                <a class="ads" href="{{$ads300x600->redirect_url}}" target="_blank">
                                    <img class="banner-300x600" src="{{url('/')}}/assets/images/ads/{{$ads300x600->banner_file}}" alt="Advertisement">
                                </a>
                            @else
                                {!! $ads300x600->script !!}
                            @endif
                        @endif
                    </div>
                </div>

            </div>

    </div>
</div>


@stop

@section('footer')
<script>

</script>
@stop