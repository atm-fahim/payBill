@extends('frontend.index')
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">Chairman <span>Profile</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li>Chairman Profile</li>
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
                                <img src="{{asset($about_info[0]->chairman_image)}}" alt="">
                            </figure>

                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>{{$about_info[0]->chairman_profile_title}}</h3>
                        <div class="text" style="text-align: justify">
{{--                            <img src="{{asset($about_info[0]->chairman_image)}}" alt="" >--}}
                            <?php echo $about_info[0]->chairman_profile ?? null;?>
                         </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
