@extends('frontend.index')
@section('content')
    <!-- Main Sllider Start -->
    <section class="main-slider">
        <div class="main-slider__carousel owl-carousel owl-theme">

            <div class="item">
                <div class="main-slider__bg"
                     style="background-image: url({{asset('frontend/assets/images/backgrounds/slider-1-1.jpg');}}">
                </div><!-- /.slider-one__bg -->
                <div class="main-slider__overly"></div>
                <div class="main-slider__shape-1">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-1.png')}}" alt="" class="img-bounce">
                </div>
                <div class="main-slider__shape-2">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-2.png')}}" alt="" class="float-bob-y">
                </div>
                <div class="main-slider__shape-3">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-3.png')}}" alt="">
                </div>
                <div class="main-slider__shape-4">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-4.png')}}" alt="">
                </div>
                <h1 class="main-slider__name">Tedlife</h1>
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <div class="main-slider__sub-title-shape"></div>
                            <p class="main-slider__sub-title">Tedlife The Best agency</p>
                            <div class="main-slider__sub-title-shape"></div>
                        </div>
                        <h2 class="main-slider__title">Where business <br> come to grow</h2>
                        <p class="main-slider__text">We honestly want our clients to succeed online in their fields.
                            We create them high-end websites <br> that stand out on their market, be seen and
                            memorized
                            as a benchmark in what they do.</p>
                        <div class="main-slider__btn-box">
                            <a href="about.html" class="thm-btn main-slider__btn"><span></span>Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="main-slider__bg"
                     style="background-image: url({{asset('frontend/assets/images/backgrounds/slider-1-2.jpg');}}">
                </div><!-- /.slider-one__bg -->
                <div class="main-slider__overly"></div>
                <div class="main-slider__shape-1">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-1.png')}}" alt="" class="img-bounce">
                </div>
                <div class="main-slider__shape-2">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-2.png')}}" alt="" class="float-bob-y">
                </div>
                <div class="main-slider__shape-3">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-3.png')}}" alt="">
                </div>
                <div class="main-slider__shape-4">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-4.png')}}" alt="">
                </div>
                <h1 class="main-slider__name">Tedlife</h1>
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <div class="main-slider__sub-title-shape"></div>
                            <p class="main-slider__sub-title">Tedlife The Best agency</p>
                            <div class="main-slider__sub-title-shape"></div>
                        </div>
                        <h2 class="main-slider__title">Where business <br> come to grow</h2>
                        <p class="main-slider__text">We honestly want our clients to succeed online in their fields.
                            We create them high-end websites <br> that stand out on their market, be seen and
                            memorized
                            as a benchmark in what they do.</p>
                        <div class="main-slider__btn-box">
                            <a href="about.html" class="thm-btn main-slider__btn"><span></span>Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="main-slider__bg"
                     style="background-image: url({{asset('frontend/assets/images/backgrounds/slider-1-3.jpg');}}">
                </div><!-- /.slider-one__bg -->
                <div class="main-slider__overly"></div>
                <div class="main-slider__shape-1">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-1.png')}}" alt="" class="img-bounce">
                </div>
                <div class="main-slider__shape-2">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-2.png')}}" alt="" class="float-bob-y">
                </div>
                <div class="main-slider__shape-3">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-3.png')}}" alt="">
                </div>
                <div class="main-slider__shape-4">
                    <img src="{{asset('frontend/assets/images/shapes/main-slider-shape-4.png')}}" alt="">
                </div>
                <h1 class="main-slider__name">Tedlife</h1>
                <div class="container">
                    <div class="main-slider__content">
                        <div class="main-slider__sub-title-box">
                            <div class="main-slider__sub-title-shape"></div>
                            <p class="main-slider__sub-title">Tedlife The Best agency</p>
                            <div class="main-slider__sub-title-shape"></div>
                        </div>
                        <h2 class="main-slider__title">Where business <br> come to grow</h2>
                        <p class="main-slider__text">We honestly want our clients to succeed online in their fields.
                            We create them high-end websites <br> that stand out on their market, be seen and
                            memorized
                            as a benchmark in what they do.</p>
                        <div class="main-slider__btn-box">
                            <a href="about.html" class="thm-btn main-slider__btn"><span></span>Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--Main Sllider Start -->
    <!--Services One Sec Start-->
    <section class="services-one-sec">
        <div class="services-one-sec__bg float-bob-y"
             style="background-image: url({{asset('frontend/assets/images/shapes/services-one-sec-bg.jpg');}}"></div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape"></div>
                    <span class="section-title__tagline">Our Services</span>
                    <div class="section-title__tagline-shape"></div>
                </div>
                <h2 class="section-title__title title-animation">We help to achieve Success<br> in short time
                </h2>
            </div>
            <ul class="list-unstyled services-one-sec__box">
                <li class="services-one-sec__single wow fadeInLeft" data-wow-delay="100ms">
                    <div class="services-one-sec__top">
                        <div class="services-one-sec__icon">
                            <span class="icon-marketing-1"></span>
                        </div>
                        <h3 class="services-one-sec__title"><a href="digital-marketing.html">Digital Marketing</a>
                        </h3>
                        <div class="services-one-sec__img"
                             style="background-image: url({{asset('frontend/assets/images/services/services-one-img-1-1.jpg');}}"></div>
                    </div>
                    <div class="services-one-sec__content">
                        <div class="services-one-sec__content-inner">
                            <p class="services-one-sec__text">Lorem ipsum dolor sit amet, consectetur ipsum</p>
                            <div class="services-one-sec__content-hover">
                                <h3 class="services-one-sec__content-title"><a href="digital-marketing.html">Digital
                                        Marketing</a></h3>
                            </div>
                        </div>
                        <div class="services-one-sec__count"></div>
                    </div>
                </li>
                <li class="services-one-sec__single wow fadeInLeft" data-wow-delay="300ms">
                    <div class="services-one-sec__top">
                        <div class="services-one-sec__icon">
                            <span class="icon-ui-ux"></span>
                        </div>
                        <h3 class="services-one-sec__title"><a href="ui-ux-design.html">UI / UX Design</a></h3>
                        <div class="services-one-sec__img"
                             style="background-image: url({{asset('frontend/assets/images/services/services-one-img-1-2.jpg');}}"></div>
                    </div>
                    <div class="services-one-sec__content">
                        <div class="services-one-sec__content-inner">
                            <p class="services-one-sec__text">Lorem ipsum dolor sit amet, consectetur ipsum</p>
                            <div class="services-one-sec__content-hover">
                                <h3 class="services-one-sec__content-title"><a href="ui-ux-design.html">UI / UX
                                        Design</a></h3>
                            </div>
                        </div>
                        <div class="services-one-sec__count"></div>
                    </div>
                </li>
                <li class="services-one-sec__single wow fadeInRight" data-wow-delay="500ms">
                    <div class="services-one-sec__top">
                        <div class="services-one-sec__icon">
                            <span class="icon-graphic-designing"></span>
                        </div>
                        <h3 class="services-one-sec__title"><a href="motion-graphics.html">Motion Graphics</a></h3>
                        <div class="services-one-sec__img"
                             style="background-image: url({{asset('frontend/assets/images/services/services-one-img-1-3.jpg');}}"></div>
                    </div>
                    <div class="services-one-sec__content">
                        <div class="services-one-sec__content-inner">
                            <p class="services-one-sec__text">Lorem ipsum dolor sit amet, consectetur ipsum</p>
                            <div class="services-one-sec__content-hover">
                                <h3 class="services-one-sec__content-title"><a href="motion-graphics.html">Motion
                                        Graphics</a></h3>
                            </div>
                        </div>
                        <div class="services-one-sec__count"></div>
                    </div>
                </li>
                <li class="services-one-sec__single wow fadeInRight" data-wow-delay="700ms">
                    <div class="services-one-sec__top">
                        <div class="services-one-sec__icon">
                            <span class="icon-concept"></span>
                        </div>
                        <h3 class="services-one-sec__title"><a href="website-development.html">Website
                                Development</a></h3>
                        <div class="services-one-sec__img"
                             style="background-image: url({{asset('frontend/assets/images/services/services-one-img-1-4.jpg');}}"></div>
                    </div>
                    <div class="services-one-sec__content">
                        <div class="services-one-sec__content-inner">
                            <p class="services-one-sec__text">Lorem ipsum dolor sit amet, consectetur ipsum</p>
                            <div class="services-one-sec__content-hover">
                                <h3 class="services-one-sec__content-title"><a
                                        href="website-development.html">Website Development</a></h3>
                            </div>
                        </div>
                        <div class="services-one-sec__count"></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Services One Sec End-->

{{--    <!--Sliding Text Start-->--}}
{{--    <section class="sliding-text">--}}
{{--        <div class="sliding-text__inner">--}}
{{--            <ul class="sliding-text__list marquee_mode-1 list-unstyled">--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Cretive Agency</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Digital Marketing</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Design & Development Craft</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Transofrm Ideas Into Reality</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>It Consulting</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{asset('frontend/assets/images/resources/sliding-text-img-1.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Seo Optimization</p>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--Sliding Text End-->



    <!--Vission Mission Sec Start-->
    <section class="vission-mission-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="vission-mission__left">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                                <div class="vission-mission__single">
                                    <div class="vission-mission__icon">
                                        <span class="icon-checked"></span>
                                    </div>
                                    <h3 class="vission-mission__title"><a href="about.html">Our Vission</a></h3>
                                    <p class="vission-mission__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 wow fadeInLeft" data-wow-delay="300ms">
                                <div class="vission-mission__single">
                                    <div class="vission-mission__icon">
                                        <span class="icon-checked"></span>
                                    </div>
                                    <h3 class="vission-mission__title"><a href="about.html">Our mission</a></h3>
                                    <p class="vission-mission__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="vission-mission__video-box">
                        <div class="vission-mission__video-box-img">
                            <img src="{{asset('frontend/assets/images/resources/vission-mission-video-img.jpg')}}" alt="">
                            <div class="vission-mission__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="vission-mission__video-icon">
                                        <span class="icon-play-2"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Vission Mission Sec End-->

    <!--Brand One Start-->
    <section class="brand-one">
        <div class="brand-one__bg" style="background-image: url({{asset('frontend/assets/images/shapes/brand-one-bg.jpg');}}"></div>
        <div class="container">
            <div class="brand-one__carousel owl-theme owl-carousel">
                <!--Brand One Single Start-->
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{asset('frontend/assets/images/brand/brand-1-1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Brand One Single End-->
                <!--Brand One Single Start-->
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{asset('frontend/assets/images/brand/brand-1-1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Brand One Single End-->
                <!--Brand One Single Start-->
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{asset('frontend/assets/images/brand/brand-1-1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Brand One Single End-->
                <!--Brand One Single Start-->
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{asset('frontend/assets/images/brand/brand-1-1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Brand One Single End-->
                <!--Brand One Single Start-->
                <div class="item">
                    <div class="brand-one__single">
                        <div class="brand-one__img">
                            <img src="{{asset('frontend/assets/images/brand/brand-1-1.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <!--Brand One Single End-->
            </div>
        </div>
    </section>
    <!--Brand One End-->

    <!--Why Choose One Sec Start-->
    <section class="why-choose-one-sec">
        <div class="why-choose-one-sec-shape-1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2000ms">
            <img src="{{asset('frontend/assets/images/shapes/why-choose-one-shape-1.png')}}" alt="" class="float-bob-y">
        </div>
        <div class="why-choose-one-sec-shape-2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{{asset('frontend/assets/images/shapes/why-choose-one-shape-2.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="why-choose-one-sec__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">Why Choose Us</span>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation">Why
                                choose Tedlife?</h2>
                        </div>
                        <p class="why-choose-one-sec__text">When you work with us, you deal directly with the
                            marketing superstars who are advice executing
                            the plan. It’s a model we’re really proud of and produces amazing results.</p>
                        <div class="why-choose-one-sec__progress-box">
                            <div class="progress-box">
                                <div class="bar-title">Digital marketing</div>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="70%">
                                        <div class="count-box">
                                            <span class="count-text" data-stop="70" data-speed="1500">0</span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="why-choose-one-sec__btn-box">
                            <a href="about.html" class="thm-btn">Learn More<span></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 wow fadeInRight" data-wow-delay="300ms">
                    <div class="why-choose-one-sec__right">
                        <div class="why-choose-one-sec__tab-box tabs-box">
                            <ul class="tab-buttons clearfix list-unstyled">
                                <li data-tab="#think" class="tab-btn active-btn"><span>We Think With You</span></li>
                                <li data-tab="#envision" class="tab-btn"><span>We Envision With You</span></li>
                                <li data-tab="#build" class="tab-btn"><span>We Build With You</span></li>
                            </ul>
                            <div class="tabs-content">
                                <!--tab-->
                                <div class="tab active-tab" id="think">
                                    <div class="tabs-content__inner">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-left">
                                                    <p class="tabs-content__inner-text">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Quis ipsum
                                                        suspendisse ultrices gravida. Risus commodo viverra maecenas
                                                        accumsan lacus vel facilisis.</p>
                                                    <ul class="tabs-content__inner-points list-unstyled ">
                                                        <li>Innovation Strategy</li>
                                                        <li>Digital product Strategy</li>
                                                        <li>Technology Architecture</li>
                                                        <li>Information Architecture</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-right">
                                                    <div class="tabs-content__inner-img">
                                                        <img src="{{asset('frontend/assets/images/resources/tabs-content-inner-img-1.jpg')}}"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab-->
                                <div class="tab " id="envision">
                                    <div class="tabs-content__inner">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-left">
                                                    <p class="tabs-content__inner-text">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Quis ipsum
                                                        suspendisse ultrices gravida. Risus commodo viverra maecenas
                                                        accumsan lacus vel facilisis.</p>
                                                    <ul class="tabs-content__inner-points list-unstyled ">
                                                        <li>Innovation Strategy</li>
                                                        <li>Digital product Strategy</li>
                                                        <li>Technology Architecture</li>
                                                        <li>Information Architecture</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-right">
                                                    <div class="tabs-content__inner-img">
                                                        <img src="{{asset('frontend/assets/images/resources/tabs-content-inner-img-2.jpg')}}"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab-->
                                <div class="tab " id="build">
                                    <div class="tabs-content__inner">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-left">
                                                    <p class="tabs-content__inner-text">Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Quis ipsum
                                                        suspendisse ultrices gravida. Risus commodo viverra maecenas
                                                        accumsan lacus vel facilisis.</p>
                                                    <ul class="tabs-content__inner-points list-unstyled ">
                                                        <li>Innovation Strategy</li>
                                                        <li>Digital product Strategy</li>
                                                        <li>Technology Architecture</li>
                                                        <li>Information Architecture</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-6 col-md-6">
                                                <div class="tabs-content__inner-right">
                                                    <div class="tabs-content__inner-img">
                                                        <img src="{{asset('frontend/assets/images/resources/tabs-content-inner-img-3.jpg')}}"
                                                             alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One Sec End-->



    <!--Feature One End-->

    <!--CTA One Sec Start-->
    <section class="cta-one-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta-one-sec__inner wow fadeInUp" data-wow-delay="300ms">
                        <div class="cta-one-sec__shape float-bob-y"
                             style="background-image: url({{asset('frontend/assets/images/shapes/cta-one-sec-shape.png');}}"></div>
                        <h2 class="cta-one-sec__title">Let’s work together</h2>
                        <p class="cta-one-sec__text">We're passionate about innovation, brilliant ideas and the
                            execution that brings it all together in one <br> beautiful experience. If you are too,
                            call or send us an email to get started.</p>
                        <div class="cta-one-sec__btn-box">
                            <a href="about.html" class="thm-btn cta-one-sec__btn"><span></span>Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CTA One Sec End-->

    <!--Portfolio One Sec Start-->
    <section class="portfolio-one-sec">
        <div class="portfolio-one-sec__shape-1 rotate-me">
            <img src="{{asset('frontend/assets/images/shapes/portfolio-one-sec-shape-1.png')}}" alt="">
        </div>
        <div class="portfolio-one-sec__shape-2 float-bob-x">
            <img src="{{asset('frontend/assets/images/shapes/portfolio-one-se-shape-2.png')}}" alt="">
        </div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape"></div>
                    <span class="section-title__tagline">OUR gALLeRY</span>
                    <div class="section-title__tagline-shape"></div>
                </div>
                <h2 class="section-title__title title-animation">Discover Our Work</h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="project-filter style1 post-filter list-unstyled">
                        <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                        <li data-filter=".digital"><span class="filter-text">DIGITAL MARKETING</span></li>
                        <li data-filter=".eco"><span class="filter-text">ECOMMERCE</span></li>
                        <li data-filter=".social"><span class="filter-text">SOCIAL MEDIA MANAGEMENT</span></li>
                        <li data-filter=".non"><span class="filter-text last-pd-none">NON PROFIT</span></li>
                    </ul>
                </div>
            </div>
            <div class="row filter-layout masonary-layout">
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item digital social">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-1.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-1.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item digital eco non">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-2.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-2.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item digital non social">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-3.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-3.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item  eco">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-4.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-4.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item non">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-5.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-5.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item digital social">
                    <div class="portfolio-one-sec__single">
                        <div class="portfolio-one-sec__img">
                            <img src="{{asset('frontend/assets/images/project/portfolio-1-6.jpg')}}" alt="">
                            <div class="portfolio-one-sec__hover">
                                <h4 class="portfolio-one-sec__hover-title"><a href="portfolio-details.html">Social
                                        Advertising</a></h4>
                                <p class="portfolio-one-sec__hover-sub-title">Social media managment</p>
                            </div>
                            <div class="portfolio-one-sec__arrow">
                                <a href="{{asset('frontend/assets/images/project/portfolio-1-6.jpg')}}" class="img-popup"><span
                                        class="icon-right-arrow-1"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Portfolio One Sec End-->

    <!--Divider One Sec Start-->
    <section class="divider-one-sec">
        <div class="divider-one-sec-back-box">
            <div class="divider-one-sec-back jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                 style="background-image: url({{asset('frontend/assets/images/backgrounds/divider-one-sec-bg.png')}}"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <div class="divider-one-sec__left wow fadeInLeft" data-wow-delay="100ms">
                        <h2 class="divider-one-sec__title">We break <br> boundaries to craft <br> extraordinary
                            experiences</h2>
                        <div class="divider-one-sec__points-box">
                            <ul class="list-unstyled divider-one-sec__points clearfix">
                                <li class="divider-one-sec__single">
                                    <h4 class="divider-one-sec__points-title"><a href="about.html">Know how</a></h4>
                                    <p class="divider-one-sec__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing
                                    </p>
                                </li>
                                <li class="divider-one-sec__single">
                                    <h4 class="divider-one-sec__points-title"><a href="about.html">Communication</a>
                                    </h4>
                                    <p class="divider-one-sec__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing
                                    </p>
                                </li>
                            </ul>
                            <ul class="list-unstyled divider-one-sec__points divider-one-sec__points-two clearfix">
                                <li class="divider-one-sec__single">
                                    <h4 class="divider-one-sec__points-title"><a href="about.html">Expertise</a>
                                    </h4>
                                    <p class="divider-one-sec__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing
                                    </p>
                                </li>
                                <li class="divider-one-sec__single">
                                    <h4 class="divider-one-sec__points-title"><a href="about.html">Value</a></h4>
                                    <p class="divider-one-sec__text">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="divider-one-sec__right wow slideInRight" data-wow-delay="100ms"
                         data-wow-duration="2500ms">
                        <div class="divider-one-sec__runing-business">
                            <div class="divider-one-sec__runing-business-icon">
                                <span class="icon-marketing-1"></span>
                            </div>
                            <h4 class="divider-one-sec__runing-business-title">We’re runing business since</h4>
                            <h3 class="divider-one-sec__runing-business-year">1981</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Divider One Sec End-->

    <!--Team One Sec Start-->
    <section class="team-one-sec">
        <div class="team-one-sec__shape-1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{{asset('frontend/assets/images/shapes/team-one-shape-1.png')}}" alt="" class="float-bob-y">
        </div>
        <div class="team-one-sec__shape-2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{{asset('frontend/assets/images/shapes/team-one-shape-2.png')}}" alt="" class="float-bob-x">
        </div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape"></div>
                    <span class="section-title__tagline">Expert Team</span>
                    <div class="section-title__tagline-shape"></div>
                </div>
                <h2 class="section-title__title title-animation">Our Professtional Expert
                    <br> Members</h2>
            </div>
            <div class="row">
                <!--Team One Sec Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="team-one-sec__single">
                        <div class="team-one-sec__img">
                            <img src="{{asset('frontend/assets/images/team/team-one-img-1.jpg')}}" alt="">
                            <div class="team-one-sec__social">
                                <a href="#"><i class="icon-facebook"></i></a>
                                <a href="#"><i class="icon-linkedin"></i></a>
                                <a href="#"><i class="icon-twitter"></i></a>
                                <a href="#"><i class="icon-google-plus-logo"></i></a>
                            </div>
                        </div>
                        <div class="team-one-sec__content">
                            <h3 class="team-one-sec__name"><a href="team-details.html">Ben hirons</a></h3>
                            <p class="team-one-sec__title">Founder & Head Engineer</p>
                        </div>
                    </div>
                </div>
                <!--Team One Sec Single End-->
                <!--Team One Sec Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="team-one-sec__single">
                        <div class="team-one-sec__img">
                            <img src="{{asset('frontend/assets/images/team/team-one-img-2.jpg')}}" alt="">
                            <div class="team-one-sec__social">
                                <a href="#"><i class="icon-facebook"></i></a>
                                <a href="#"><i class="icon-linkedin"></i></a>
                                <a href="#"><i class="icon-twitter"></i></a>
                                <a href="#"><i class="icon-google-plus-logo"></i></a>
                            </div>
                        </div>
                        <div class="team-one-sec__content">
                            <h3 class="team-one-sec__name"><a href="team-details.html">Andrew Marcus</a></h3>
                            <p class="team-one-sec__title">Senior Developer</p>
                        </div>
                    </div>
                </div>
                <!--Team One Sec Single End-->
                <!--Team One Sec Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="team-one-sec__single">
                        <div class="team-one-sec__img">
                            <img src="{{asset('frontend/assets/images/team/team-one-img-3.jpg')}}" alt="">
                            <div class="team-one-sec__social">
                                <a href="#"><i class="icon-facebook"></i></a>
                                <a href="#"><i class="icon-linkedin"></i></a>
                                <a href="#"><i class="icon-twitter"></i></a>
                                <a href="#"><i class="icon-google-plus-logo"></i></a>
                            </div>
                        </div>
                        <div class="team-one-sec__content">
                            <h3 class="team-one-sec__name"><a href="team-details.html">Carly Beitzel</a></h3>
                            <p class="team-one-sec__title">Technical Engineer</p>
                        </div>
                    </div>
                </div>
                <!--Team One Sec Single End-->
                <!--Team One Sec Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="team-one-sec__single">
                        <div class="team-one-sec__img">
                            <img src="{{asset('frontend/assets/images/team/team-one-img-4.jpg')}}" alt="">
                            <div class="team-one-sec__social">
                                <a href="#"><i class="icon-facebook"></i></a>
                                <a href="#"><i class="icon-linkedin"></i></a>
                                <a href="#"><i class="icon-twitter"></i></a>
                                <a href="#"><i class="icon-google-plus-logo"></i></a>
                            </div>
                        </div>
                        <div class="team-one-sec__content">
                            <h3 class="team-one-sec__name"><a href="team-details.html">Trent Felter</a></h3>
                            <p class="team-one-sec__title">SEO Engineer</p>
                        </div>
                    </div>
                </div>
                <!--Team One Sec Single End-->
            </div>
        </div>
    </section>
    <!--Team One Sec End-->

    <!--Testimonial One Sec Start-->
    <section class="testimonial-one-sec">
        <div class="testimonial-one-sec__bg float-bob-x"
             style="background-image: url({{asset('frontend/assets/images/shapes/testimonial-one-shape-bg.png');}}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="testimonial-one-sec__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">Testimonials</span>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation">What our client's says about our
                                best work.</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="testimonial-one-sec__right">
                        <div class="testimonial-one__carousel owl-carousel owl-theme">
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one-sec__single">
                                <p class="testimonial-one-sec__text">"I am really satisfied with it. I'm good to go.
                                    It
                                    really saves me time and effort. Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. It's is exactly what our business has been
                                    lacking. "</p>
                                <div class="testimonial-one-sec__client-info-and-img">
                                    <div class="testimonial-one-sec__client-img">
                                        <img src="{{asset('frontend/assets/images/testimonial/testimonial-1-1.jpg')}}" alt="">
                                    </div>
                                    <div class="testimonial-one-sec__client-info">
                                        <h5><a href="testimonials.html">Jacob Jones</a></h5>
                                        <p>President of Sales</p>
                                    </div>
                                </div>
                                <div class="testimonial-one-sec__rating">
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                </div>
                            </div>
                            <!--Testimonial One Single End-->
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one-sec__single">
                                <p class="testimonial-one-sec__text">"I am really satisfied with it. I'm good to go.
                                    It
                                    really saves me time and effort. Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. It's is exactly what our business has been
                                    lacking. "</p>
                                <div class="testimonial-one-sec__client-info-and-img">
                                    <div class="testimonial-one-sec__client-img">
                                        <img src="{{asset('frontend/assets/images/testimonial/testimonial-1-2.jpg')}}" alt="">
                                    </div>
                                    <div class="testimonial-one-sec__client-info">
                                        <h5><a href="testimonials.html">Micle Deno</a></h5>
                                        <p>President of Sales</p>
                                    </div>
                                </div>
                                <div class="testimonial-one-sec__rating">
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                </div>
                            </div>
                            <!--Testimonial One Single End-->
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one-sec__single">
                                <p class="testimonial-one-sec__text">"I am really satisfied with it. I'm good to go.
                                    It
                                    really saves me time and effort. Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. It's is exactly what our business has been
                                    lacking. "</p>
                                <div class="testimonial-one-sec__client-info-and-img">
                                    <div class="testimonial-one-sec__client-img">
                                        <img src="{{asset('frontend/assets/images/testimonial/testimonial-1-1.jpg')}}" alt="">
                                    </div>
                                    <div class="testimonial-one-sec__client-info">
                                        <h5><a href="testimonials.html">Jacob Jones</a></h5>
                                        <p>President of Sales</p>
                                    </div>
                                </div>
                                <div class="testimonial-one-sec__rating">
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                </div>
                            </div>
                            <!--Testimonial One Single End-->
                            <!--Testimonial One Single Start-->
                            <div class="testimonial-one-sec__single">
                                <p class="testimonial-one-sec__text">"I am really satisfied with it. I'm good to go.
                                    It
                                    really saves me time and effort. Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. It's is exactly what our business has been
                                    lacking. "</p>
                                <div class="testimonial-one-sec__client-info-and-img">
                                    <div class="testimonial-one-sec__client-img">
                                        <img src="{{asset('frontend/assets/images/testimonial/testimonial-1-2.jpg')}}" alt="">
                                    </div>
                                    <div class="testimonial-one-sec__client-info">
                                        <h5><a href="testimonials.html">Micle Deno</a></h5>
                                        <p>President of Sales</p>
                                    </div>
                                </div>
                                <div class="testimonial-one-sec__rating">
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                    <span class="icon-star-1"></span>
                                </div>
                            </div>
                            <!--Testimonial One Single End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial One Sec End-->

    <!--Contact Two Start-->
    <section class="contact-two">
        <div class="contact-two__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
             style="background-image: url({{asset('frontend/assets/images/backgrounds/contact-two-bg.jpg');}}">
        </div>
        <div class="contact-two__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{{asset('frontend/assets/images/resources/contact-two-img-1.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="contact-two__left">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <span class="section-title__tagline">contact us</span>
                                <div class="section-title__tagline-shape"></div>
                            </div>
                            <h2 class="section-title__title title-animation">We create online success Together
                                <br> with you.</h2>
                        </div>
                        <form class="contact-form-validated contact-two__form" action=""
                              method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <input type="text" name="name" placeholder="Your Name" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <input type="email" name="Email" placeholder="Email Address" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <input type="text" name="Phone" placeholder="Phone Number" required="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact-two__input-box">
                                        <div class="select-box">
                                            <select class="selectmenu wide">
                                                <option selected="selected">Service Type
                                                </option>
                                                <option>Type Of Service 01</option>
                                                <option>Type Of Service 02</option>
                                                <option>Type Of Service 03</option>
                                                <option>Type Of Service 04</option>
                                                <option>Type Of Service 05</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-two__input-box text-message-box">
                                        <textarea name="message" placeholder="Messege"></textarea>
                                    </div>
                                    <div class="contact-two__btn-box">
                                        <button type="submit" class="thm-btn contact-two__btn"> <span></span> send a
                                            message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Two End-->

    <!--News One Sec Start-->
    <section class="news-one-sec">
        <div class="news-one-sec__shape-1 float-bob-y">
            <img src="{{asset('frontend/assets/images/shapes/news-one-sec-shape-1.png')}}" alt="">
        </div>
        <div class="news-one-sec__shape-2 float-bob-x">
            <img src="{{asset('frontend/assets/images/shapes/news-one-sec-shape-2.png')}}" alt="">
        </div>
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <div class="section-title__tagline-shape"></div>
                    <span class="section-title__tagline">Our Updates</span>
                    <div class="section-title__tagline-shape"></div>
                </div>
                <h2 class="section-title__title title-animation">News & insights</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                    <!--News One Sec Single-->
                    <div class="news-one-sec__single">
                        <div class="news-one-sec__img">
                            <img src="{{asset('frontend/assets/images/blog/news-1-1.jpg')}}" alt="">
                            <a href="news-details.html">
                                <span class="news-one-sec__plus"></span>
                            </a>
                        </div>
                        <div class="news-one-sec__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-user-circle"></i> Jemmy Sam</a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 8 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one-sec__title">
                                <a href="news-details.html">Is It Time to Kill SEO?</a>
                            </h3>
                            <p class="news-one-sec__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do</p>
                            <a href="news-details.html" class="news-one-sec__btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <!--News One Sec Single-->
                    <div class="news-one-sec__single">
                        <div class="news-one-sec__img">
                            <img src="{{asset('frontend/assets/images/blog/news-1-2.jpg')}}" alt="">
                            <a href="news-details.html">
                                <span class="news-one-sec__plus"></span>
                            </a>
                        </div>
                        <div class="news-one-sec__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-user-circle"></i> Jemmy Sam</a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 8 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one-sec__title">
                                <a href="news-details.html">Tips for Top Customer Service</a>
                            </h3>
                            <p class="news-one-sec__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do</p>
                            <a href="news-details.html" class="news-one-sec__btn">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInRight" data-wow-delay="300ms">
                    <!--News One Sec Single-->
                    <div class="news-one-sec__single">
                        <div class="news-one-sec__img">
                            <img src="{{asset('frontend/assets/images/blog/news-1-3.jpg')}}" alt="">
                            <a href="news-details.html">
                                <span class="news-one-sec__plus"></span>
                            </a>
                        </div>
                        <div class="news-one-sec__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="news-details.html"><i class="far fa-user-circle"></i> Jemmy Sam</a>
                                </li>
                                <li><a href="news-details.html"><i class="far fa-comments"></i> 8 Comments</a>
                                </li>
                            </ul>
                            <h3 class="news-one-sec__title">
                                <a href="news-details.html">The Power of Google Ads</a>
                            </h3>
                            <p class="news-one-sec__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do</p>
                            <a href="news-details.html" class="news-one-sec__btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News One Sec End-->

    <!--Two Section Start-->
    <section class="two-section">
        <div class="two-section__wrapper">
            <div class="two-section__left">
                <div class="two-section__bg"
                     style="background-image: url({{asset('frontend/assets/images/backgrounds/two-section-left-bg.jpg');}}"></div>
                <div class="two-section__content-box">
                    <p class="two-section__sub-title">We Provide Best Services</p>
                    <h2 class="two-section__title">Experience the Power of <br> business best Advice</h2>
                    <a href="about.html" class="thm-btn two-section__btn-1"> <span></span>Discover More</a>
                </div>
            </div>
            <div class="two-section__right">
                <div class="two-section__bg"
                     style="background-image: url({{asset('frontend/assets/images/backgrounds/two-section-right-bg.jpg');}}"></div>
                <div class="two-section__content-box">
                    <p class="two-section__sub-title">We Provide Best Services</p>
                    <h2 class="two-section__title">Get more of what you want <br> from your business</h2>
                    <a href="about.html" class="thm-btn two-section__btn-2"> <span></span>Discover More</a>
                </div>
            </div>
        </div>
    </section>
    <!--Two Section Start-->
@endsection
