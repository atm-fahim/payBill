@extends('frontend.index')
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">Companies <span>details</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li>Companies details</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">
                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <ul class="blog-cat">
                                <li><a href="#">All Company</a></li>
                                @foreach($company_info as $v_company)
                                <li class="{{($slug==$v_company->slug)?'active':''}}"><a href="{{ route('frontend.company-info',$v_company->slug) }}">{{$v_company->company_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Contact Widget-->
                        <div class="sidebar-widget contact-widget">
                            <div class="sidebar-title">
                                <h4>Contact</h4>
                            </div>
                            <ul>
                                <li><span class="icon flaticon-map-1"></span> {{$company_details->address}}</li>
                                <li><span class="icon flaticon-phone-receiver"></span> {{$company_details->contact_number}} </li>
                                <li><span class="icon flaticon-comment"></span> {{$company_details->email}}</li>
                            </ul>
                        </div>



{{--                        <!-- Banner Widget-->--}}
{{--                        <div class="sidebar-widget banner-widget">--}}
{{--                            <div class="widget-content" style="background-image:url(images/resource/service-15.jpg)">--}}
{{--                                <div class="logo">--}}
{{--                                    <img src="images/icons/widget-logo.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="title">Securied Business with</div>--}}
{{--                                <h2>Financ</h2>--}}
{{--                                <a href="contact.html" class="theme-btn btn-style-seventen">Let’s start now <span class="icon flaticon-link"></span></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </aside>
                </div>

                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="services-single">
                        <h4>Welcome to Our {{$company_details->company_name}} Company</h4>
                        <div class="text">
                            <?php echo $company_details->details ?? null;?>
                        </div>

                        </div>
                    </div>
                    </div>
                </div>
    </div>
    <!--End Sidebar Page Container-->


@endsection
