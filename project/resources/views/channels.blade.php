@extends('includes.master')

@section('content')

    <section class="go-section">
        <div class="row">
            <div class="container">
                <h2 class="text-center">{{$pagename}}</h2>
                <hr>
                <div class="col-md-12 up">
                @foreach($channels as $channel)
                    <div class="col-md-6 ftv">
                        <div class="singletv">
                            <a href="{{url('/tv')}}/{{$channel->id}}">
                                @if($channel->live == "yes")
                                <h5 class="red-break"><i class="fa fa-circle fa-fw"></i>Live</h5>
                                @endif
                                <img src="{{url('/assets/images/tv')}}/{{$channel->featured_image}}" alt="" class="thumb tvcatumb">

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
    </section>

@stop

@section('footer')

@stop