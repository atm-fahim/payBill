@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">All <span>Services</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li>All Service</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Services Section Ten -->
    <section class="services-section-ten style-two">
        <div class="auto-container">
            <!-- Sec Title -->

            <div class="row clearfix">

                <!-- Services Block Fifteen -->
                @foreach($service_info as $v_service)
                <div class="services-block-fifteen col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow bounceIn" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img style="height: 250px;" src="{{asset($v_service->service_image)}}" alt="">
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <div class="icon flaticon-{{$v_service->service_icon}}"></div>
                                <h5><a href="{{route('frontend.services-details',$v_service->slug)}}">{{$v_service->service_title}}</a></h5>
                            </div>
                            <div class="text">

                                <?php
                                  echo $service =Str::limit($v_service->service_details,80)??null;
                                    if(isset($service) && strlen($service) > 80){
                                        echo '<a href="'.route('frontend.services-details',$v_service->slug).'">Details</a>';
                                    }
                                  ?>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>


@endsection
