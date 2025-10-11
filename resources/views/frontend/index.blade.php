<!DOCTYPE html>
<html>
<?php
$orgCtn = DB::select("SELECT t1.* FROM contact_us t1 WHERE t1.status=1 and t1.branch_id=0 || t1.branch_id=null");

$logo = DB::select("SELECT t1.logo_image,t1.small_logo,t1.favicon FROM logo t1 WHERE t1.status=1");//                        dd($logo[0]->logo_image);
$destination = DB::select("SELECT t1.destination_name,t1.slug,t1.id FROM your_destination t1 WHERE t1.status=1");//                        dd($logo[0]->logo_image);

//                        $firstLogo = $logo[0]->logo_image ?? null; // Use null-safe access
//exit;
?>
<head>
    <meta charset="utf-8">
    <title>.::Org::.</title>
    <!-- Stylesheets -->
    <link href="{{asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset($logo[0]->favicon)}}" type="image/x-icon">
    <link rel="icon" href="{{asset($logo[0]->favicon)}}" type="image/x-icon">


    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!--[if lt IE 9]><script src="asset('frontend/assets/js/html5shiv.js')}}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('frontend/assets/js/respond.js')}}"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
{{--    <div class="preloader"></div>--}}

    <!-- Main Header-->
    <header class="main-header header-style-two">

        <!--Header-Upper-->
        <div class="header-upper">
            <div class="auto-container">
                <div class="upper-inner clearfix">

                    <div class="pull-left logo-box">

                        <div class="logo"><a href="{{route('home')}}"><img  src="{{asset($logo[0]->logo_image) ?? null}}" alt="" title=""></a></div>

                    </div>

                    <div class="upper-right clearfix">

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-e-mail-envelope"></span></div>
                            <ul>
                                <li>{{$orgCtn[0]->email ?? null}}</li>
                            </ul>
                        </div>

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-phone-receiver"></span></div>
                            <ul>
                                <li>{{$orgCtn[0]->hotline_number ?? null}}</li>
                            </ul>
                        </div>

                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="fa fa-map-marker"></span></div>
                            <ul>
                                <li><?php echo $orgCtn[0]->address ?? null; ?></li>
                            </ul>
                        </div>

                        <div class="social-box">
                            <ul class="social-icon-one">
                                <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
{{--                                <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>--}}
                                <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>

                                <li><img width="45"  src="{{asset('frontend/assets/images/icons/company-certificate-iso.jpg')}}" alt="" title=""></li>
{{--                                <li><a href="#"><span class="fa fa-rss-square"></span></a></li>--}}

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Header Lower  -->
        <div class="header-lower">
            <div class="auto-container">
                <div class="outer-container clearfix">
                    <div class="nav-outer clearfix">

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="dropdown"><a href="{{route('frontend.about-us')}}">About Us</a>
                                        <ul>
                                            <li><a href="{{route('frontend.about-us')}}">About Us</a></li>
                                            <li><a href="{{route('frontend.mission-vision')}}">Our Mission & Vision</a></li>
                                            <li><a href="{{route('frontend.chairman-profile')}}">Chairman  Profile</a></li>
                                            <li><a href="{{route('frontend.branch')}}">Branch</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Destination</a>
                                        <ul>
                                            @foreach($destination as $v_destination)
                                            <li><a href="{{route('frontend.destination',$v_destination->slug)}}">{{$v_destination->destination_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{route('frontend.all-services')}}">Services</a></li>
                                    <li><a href="{{route('frontend.all-notice-event')}}">News & Event</a></li>
                                    <li><a href="{{route('frontend.album')}}">Gallery</a></li>
                                    <li><a href="{{route('frontend.contact-us')}}">Contact us</a></li>
                                </ul>
                            </div>

                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{route('home')}}" class="img-responsive"><img style="width: 150px; height: 60px;" src="{{asset($logo[0]->small_logo) ?? null}}" alt="" title=""></a>
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="#">Home</a></li>
                                <li class="dropdown"><a href="{{route('frontend.about-us')}}">About Us</a>
                                    <ul>
                                        <li><a href="{{route('frontend.about-us')}}">About Us</a></li>
                                        <li><a href="{{route('frontend.mission-vision')}}">Our Mission & Vision</a></li>
                                        <li><a href="{{route('frontend.chairman-profile')}}">Chairman  Profile</a></li>
                                        <li><a href="{{route('frontend.branch')}}">Branch</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Destination</a>
                                    <ul>
                                        @foreach($destination as $v_destination)
                                            <li><a href="{{route('frontend.destination',$v_destination->slug)}}">{{$v_destination->destination_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('frontend.all-services')}}">Services</a></li>
                                <li><a href="{{route('frontend.all-notice-event')}}">News & Event</a></li>
                                <li><a href="{{route('frontend.album')}}">Gallery</a></li>

                                {{--                                <li><a href="#">Blog</a></li>--}}
                                <li><a href="{{route('frontend.contact-us')}}">Contact us</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!--End Main Header -->

@yield('content')
    <!--Main Footer-->
    <footer class="main-footer">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="{{route('home')}}"><img src="{{asset($logo[0]->small_logo) ?? null}}" alt="" /></a>
                                    </div>
                                    <div class="text"></div>
                                    <ul class="list-style-two">
                                        <li><span class="icon fa fa-phone"></span> {{$orgCtn[0]->hotline_number ?? null}}</li>
                                        <li><span class="icon fa fa-envelope"></span> {{$orgCtn[0]->email ?? null}}</li>
                                        <li><span class="icon fa fa-home"></span><?php echo $orgCtn[0]->address ?? null; ?></li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Links</h4>
                                    <ul class="list-link">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{route('frontend.all-services')}}">Services</a></li>
                                        <li><a href="{{route('frontend.about-us')}}">About us</a></li>
                                        <li><a href="{{route('frontend.all-product')}}">Our Product</a></li>
                                        <li><a href="{{route('frontend.all-notice-event')}}">News & Event</a></li>
                                        <li><a href="{{route('frontend.album')}}">Gallery</a></li>
                                        <li><a href="{{route('frontend.company')}}">Companies</a></li>
                                        <li><a href="{{route('frontend.branch')}}">Branch</a></li>
                                        <li><a href="{{route('frontend.contact-us')}}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
<script>
    // URL you want to hit
    const url = "https://kohinurit.com/";

    // Send GET request using fetch
    fetch(url)
        .then(response => {
            if (response.ok) {
                console.log(`Successfully hit the website: ${url}`);
            } else {
                throw new Error(`Failed to access ${url}. Status code: ${response.status}`);
            }
        })
        .then(data => {
            console.log("Response Content (first 500 characters):", data.slice(0, 500)); // Print the first 500 characters
        })
        .catch(error => {
            console.error("Error:", error);
        });

</script>
                    <!--Column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4>Support</h4>
                                    <ul class="list-link">
                                        <li><a href="{{route('frontend.contact-us')}}">Contact Us</a></li>
{{--                                        <li><a href="#">Submit a Ticket</a></li>--}}
{{--                                        <li><a href="#">Visit Knowledge Base</a></li>--}}
{{--                                        <li><a href="#">Support System</a></li>--}}
{{--                                        <li><a href="#">Privacy & Policy</a></li>--}}
                                        <li><a href="{{route('frontend.all-services')}}">Services</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget gallery-widget">
                                    <h4>Gallery</h4>
                                    <div class="widget-content">
                                        <div class="images-outer clearfix">
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/1.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-1.jpg')}}" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/2.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-2.jpg')}}" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/3.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-3.jpg')}}" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/4.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-4.jpg')}}" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/5.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-5.jpg')}}" alt=""></a></figure>
                                            <!--Image Box-->
                                            <figure class="image-box"><a href="{{asset('frontend/assets/images/gallery/6.jpg')}}" class="lightbox-image" data-fancybox="footer-gallery" title="Image Title Here" data-fancybox-group="footer-gallery"><img src="{{asset('frontend/assets/images/gallery/footer-gallery-thumb-6.jpg')}}" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Copyright Column -->
                    <div class="copyright-column col-lg-6 col-md-6 col-sm-12">
                        <div class="copyright"><?php echo date("Y");?> &copy; All rights reserved by <a href="https://www.alhudatechbd.com/">Al-Huda</a></div>
                    </div>

                    <!-- Social Column -->
                    <div class="social-column col-lg-6 col-md-6 col-sm-12">
                        <ul>
                            <li class="follow">Follow us: </li>
                            <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
{{--                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>--}}
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
{{--                            <li><a href="#"><span class="fa fa-google-plus-square"></span></a></li>--}}
{{--                            <li><a href="#"><span class="fa fa-rss-square"></span></a></li>--}}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</div>
<!--End pagewrapper-->

<script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
<script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/sticky.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('frontend/assets/js/appear.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>

</body>
</html>
