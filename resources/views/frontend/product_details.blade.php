@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">Product <span>Details</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('frontend.all-product')}}">All Product</a></li>
                    <li>Product Details</li>
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
                                <img src="{{asset($product_info->product_image)}}" alt="">
                            </figure>
                            {{--                            <a href="#" class="lightbox-image overlay-box"><span class="flaticon-play-button"></span></a>--}}
{{--                            <a href="#" class="lightbox-image overlay-box"></a>--}}
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>{{$product_info->product_title}}</h3>
                        <div class="text" style="text-align: justify">
                            <?php
                            echo $product_info->product_details ?? null;
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
