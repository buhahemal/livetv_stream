@extends('includes.master')
@section('content')

<section class="home-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 up">
                <div class="title-section">
                    <h1><span>{{$tvinfo->title}}</span></h1>
                    @if($tvinfo->live == "yes")
                        <span class="tvlive"><i class="fa fa-circle fa-fw"></i>Live</span>
                    @endif
                </div>
                <div class="showtv">
                    {!! $tvinfo->embed !!}
                </div>

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
                <div class="descriptions">
                    <h3>Description</h3><hr>
                    {!!$tvinfo->description!!}
                </div>

                <div class="descriptions">
                    <div class="fb-comments" data-width="100%" data-href="{{url('/tv')}}/{{$tvinfo->id}}" data-numposts="5"></div>
                </div>

            </div>
            <div class="col-md-3 tv-side">
                <div class="sidebar-nav">
                    <div class="tvcats" style="margin-top: 20px">
                        <h3>Categories</h3>
                        <ul class="nav nav-list categories">
                            @foreach($categories as $category)
                                <li><a href="{{url('/channels')}}/{{$category->slug}}"> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>


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
</section>

@stop

@section('footer')
<script>

</script>
@stop