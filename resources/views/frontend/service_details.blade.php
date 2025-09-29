@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">Service <span>Details</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.all-services')}}">All Service</a></li>
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
                                <img src="{{asset($service_info->service_image)}}" alt="">
                            </figure>
                            {{--                            <a href="#" class="lightbox-image overlay-box"><span class="flaticon-play-button"></span></a>--}}
{{--                            <a href="#" class="lightbox-image overlay-box"></a>--}}
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>{{$service_info->service_title}}</h3>
                        <div class="text" style="text-align: justify">
                            <?php
                            echo $service_info->service_details ?? null;
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
