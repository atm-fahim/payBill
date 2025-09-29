@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">Service <span>Details</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.all-notice-event')}}">All Notice & Event</a></li>
                    <li>Service Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- About Section Two -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Video Column -->
                <div class="video-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Video Box-->
                        <div class="video-box">
                            <figure class="image">
                                <img src="{{asset($notice_info->notice_title)}}" alt="">
                            </figure>
                            {{--                            <a href="#" class="lightbox-image overlay-box"><span class="flaticon-play-button"></span></a>--}}
{{--                            <a href="#" class="lightbox-image overlay-box"></a>--}}
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>{{$notice_info->notice_title}}</h3>
                        <div class="text" style="text-align: justify">
                            <ul class="post-meta">
                                <li><span class="fa fa-calendar">From:</span> {{ \Carbon\Carbon::parse($notice_info['notice_start'])->format('m/d/Y') . ' To ' . \Carbon\Carbon::parse($notice_info['notice_end'])->format('m/d/Y') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
