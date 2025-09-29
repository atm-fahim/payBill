@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">All <span>Notice & Event</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li>All Notice & Event</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Services Section Ten -->
    <section class="testimonial-section-five">
        <div class="auto-container">
            <!-- Sec Title Two -->
            <div class="sec-title-two centered">
                <h2>Our latest <span>Notice & Events</span></h2>
            </div>

            <div class="two-item-carousel owl-carousel owl-theme">
                <!-- Testimonial Block Four -->
                @foreach($notice_info as $v_notice)
                    <div class="testimonial-block-four">
                        <div class="inner-box">
                            <div class="quote-icon flaticon-double-quotes"></div>
                            <div class="image-outer">
                                <div class="image">
                                    <img style="width: 180px;" src="@if(isset($v_notice['notice_file'])){{ asset($v_notice['notice_file']) }}@endif" alt="" />
                                </div>
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li><span class="fa fa-calendar">From:</span> {{ \Carbon\Carbon::parse($v_notice['notice_start'])->format('m/d/Y') . ' To ' . \Carbon\Carbon::parse($v_notice['notice_end'])->format('m/d/Y') }}</li>
                                </ul>
                                <h5><a href="#">{{$v_notice['notice_title']}}</a></h5>
                                <a href="{{route('frontend.notice-event-details',$v_notice['slug'])}}" class="theme-btn btn-style-four">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


@endsection
