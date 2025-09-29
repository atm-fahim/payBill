@extends('frontend.index')
@section('content')

    <!--Main Slider-->
    <section class="main-slider style-two">
        <div class="main-slider-carousel owl-carousel owl-theme">
            @foreach($slider_info as $v_slider)
            <div class="slide" style="background-image:url('{{ asset($v_slider->slider_image) }}'); height: 420px; margin-top:74px;">
                <div class="auto-container">
                    <div class="content alternate">
                        <h1 class="alternate">{{$v_slider->slider_title}}</h1>
                    </div>
                </div>
            </div>
            @endforeach

{{--            <div class="slide" style="background-image:url({{asset('frontend/assets/images/main-slider/7.jpg')}})">--}}
{{--                <div class="auto-container">--}}
{{--                    <div class="content alternate">--}}
{{--                        <h1 class="alternate">We are happy to build <br> your best <span>business</span></h1>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </section>


    <!-- Welcome To About Us Section -->
    <section class="about-section-modern" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div class="bg-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <div class="auto-container" style="position: relative; z-index: 2;">
            <div class="row clearfix align-items-center">
                <!-- Image Column -->
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="about-image-wrapper">
                        <div class="about-image">
                            <img src="{{asset($about_info[0]->about_us_image)}}" alt="About Us" class="img-fluid">
                            <div class="image-overlay">
                                <div class="play-button">
                                    <i class="fa fa-play"></i>
                                </div>
                            </div>
                        </div>
                        <div class="floating-card">
                            <div class="card-content">
                                <h4>25+</h4>
                                <p>Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-content">
                        <div class="section-badge">
                            <i class="fa fa-star"></i>
                            Welcome To Our NexusIntuk
                        </div>
                        <h2 class="section-title">{{$about_info[0]->about_us_title}}</h2>
                        <div class="about-text">
                            <?php
                            echo $aboutText = Str::limit($about_info[0]->about_us_details,400)??null;
                            ?>
                        </div>

                        <!-- Features List -->
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Expert advice on university selection</h5>
                                    <p>Tailored guidance to help you choose the right university based on your academic and career goals.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Application assistance for UK universities</h5>
                                    <p>Support with completing and submitting university applications, including personal statements.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Visa and Immigration Support</h5>
                                    <p>Assistance with navigating the UK visa process and understanding immigration regulations.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Scholarship and Funding Guidance</h5>
                                    <p>Information on available scholarships and financial aid options to support your studies.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Pre-Departure Orientation and Support</h5>
                                    <p>Preparation sessions to help you understand life in the UK and what to expect upon arrival.</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>Post-Arrival Assistance and Guidance</h5>
                                    <p>Ongoing support to help you settle in, including housing, local services, and cultural integration.</p>
                                </div>
                            </div>
                        </div>

                        <?php
                        if(isset($aboutText) && strlen($aboutText) > 400){
                            echo '<a href="'.route('frontend.about-us').'" class="modern-btn">
                                <span>Learn More About Us</span>
                                <i class="fa fa-arrow-right"></i>
                            </a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our University Section -->
    <section class="company-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 80px 0; position: relative; overflow: hidden;">
        <!-- Background Pattern -->

        <div class="auto-container" style="position: relative; z-index: 2;">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title-badge">Our Companies</div>
                <h2 style="color: white; font-size: 42px; font-weight: 700; margin-bottom: 20px;">Our <span style="color: #ffd700;">Company</span> Portfolio</h2>
                <div class="text" style="color: rgba(255,255,255,0.9); font-size: 18px; max-width: 700px; margin: 0 auto; line-height: 1.6;">
                    Discover our diverse portfolio of companies, each contributing to our mission of excellence and innovation in their respective industries.
                </div>
            </div>

            <div class="row clearfix" style="margin-top: 60px;">
            @foreach($company_info as $v_company)
                <!-- Company Card -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="company-card wow fadeInUp" data-wow-delay="{{ $loop->index * 200 }}ms" data-wow-duration="1000ms">
                            <div class="company-image">
                                <img src="{{asset($v_company->banner)}}" alt="{{$v_company->company_name}}" />
                                <div class="company-overlay">
                                    <div class="overlay-content">
                                        <i class="fa fa-building" style="font-size: 30px; color: white; margin-bottom: 15px;"></i>
                                        <h6 style="color: white; font-weight: 600;">Learn More</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="company-content">
                                <h5 class="company-name">{{$v_company->company_name}}</h5>
                                <div class="company-description">
                                    <p>Discover our innovative solutions and services that drive business success.</p>
                                </div>
                                <a href="{{route('frontend.company-info',$v_company->slug)}}" class="company-btn">
                                    <span>View Details</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End University Section Five -->
    <!-- We Serve as the Best Services Section -->
    <section class="services-section-modern" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Background Elements -->
        <div class="services-bg-shapes">
            <div class="service-shape service-shape-1"></div>
            <div class="service-shape service-shape-2"></div>
            <div class="service-shape service-shape-3"></div>
        </div>

        <div class="auto-container" style="position: relative; z-index: 2;">
            <!-- Section Header -->
            <div class="services-header text-center">
                <div class="services-badge">
                    <i class="fa fa-cogs"></i>
                    Our Services
                </div>
                <h2 class="services-title">
                    We Serve as the <span style="color: #ff6b35;">Best</span> Services
                </h2>
                <p class="services-subtitle">
                    Delivering exceptional solutions with unmatched expertise and dedication to excellence in every project we undertake.
                </p>
            </div>

            <div class="row clearfix" style="margin-top: 60px;">
                @foreach($service_info as $v_service)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="service-card-modern wow fadeInUp" data-wow-delay="{{ $loop->index * 200 }}ms" data-wow-duration="1000ms">
                        <div class="service-image">
                            <img src="{{asset($v_service->service_image)}}" alt="{{$v_service->service_title}}" />
                            <div class="service-overlay">
                                <div class="overlay-content">
                                    <div class="service-icon">
                                        <span class="icon flaticon-{{$v_service->service_icon}}"></span>
                                    </div>
                                    <h6>{{$v_service->service_title}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-icon-top">
                                <span class="icon flaticon-{{$v_service->service_icon}}"></span>
                            </div>
                            <h4 class="service-title">{{$v_service->service_title}}</h4>
                            <p class="service-description">
                                <?php echo Str::limit($v_service->service_details,100); ?>
                            </p>
                            <a href="{{route('frontend.services-details',$v_service->slug)}}" class="service-btn">
                                <span>Learn More</span>
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="services-cta text-center" style="margin-top: 60px;">
                <a href="{{route('frontend.all-services')}}" class="cta-btn">
                    <span>Explore All Services</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- End Services Section Four-->

    <!-- Upcoming Intakes Section -->
    <section class="upcoming-project-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Background Pattern -->

        <div class="auto-container" style="position: relative; z-index: 2;">
            <div class="section-header text-center">
                <div class="project-badge">
                    <i class="fa fa-rocket"></i>
                    Upcoming Intakes
                </div>
                <h2 style="color: white; font-size: 48px; font-weight: 800; margin-bottom: 20px;">
                    Our <span style="color: #ffd700;">Upcoming</span> Intakes
                </h2>
                <p style="color: rgba(255,255,255,0.9); font-size: 18px; max-width: 600px; margin: 0 auto;">
                    Join top UK universities for the upcoming intake, offering a wide range of undergraduate and postgraduate programs. Don’t miss your chance to study in a world-class academic environment!
                </p>
            </div>
            {{--            @if(isset($upcoming_info) && count($upcoming_info) > 0)--}}
            {{--                @foreach($upcoming_info as $v_upcoming)--}}
            {{--                    <!-- Company Card -->--}}
            {{--                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">--}}
            {{--                    <div class="upcoming-item">--}}
            {{--                        <div class="project-card">--}}
            {{--                            <div class="project-image">--}}
            {{--                                <img src="@if(isset($v_upcoming->upcoming_image) && !empty($v_upcoming->upcoming_image)){{ asset($v_upcoming->upcoming_image) }}@else{{ asset('frontend/assets/images/default-project.jpg') }}@endif" alt="{{$v_upcoming->upcoming_title ?? 'Upcoming Project'}}" />--}}
            {{--                                <div class="project-overlay">--}}
            {{--                                    <div class="overlay-content">--}}
            {{--                                        <i class="fa fa-rocket" style="font-size: 30px; color: white; margin-bottom: 15px;"></i>--}}
            {{--                                        <h6 style="color: white; font-weight: 600;">View Project</h6>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="project-date-badge">--}}
            {{--                                    <i class="fa fa-calendar"></i>--}}
            {{--                                    <span>Coming Soon</span>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <div class="project-content">--}}
            {{--                                <div class="project-header">--}}
            {{--                                    <div class="project-icon">--}}
            {{--                                        <i class="fa fa-lightbulb"></i>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="project-category">--}}
            {{--                                        <span class="category-badge">Innovation</span>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <h4 class="project-title">{{$v_upcoming->upcoming_title ?? 'Innovation Project'}}</h4>--}}
            {{--                                <p class="project-description">--}}
            {{--                                    @if(isset($v_upcoming->upcoming_details) && !empty($v_upcoming->upcoming_details))--}}
            {{--                                        <?php echo Str::limit($v_upcoming->upcoming_details,120);?>--}}
            {{--                                    @else--}}
            {{--                                        Exciting new project coming soon. Stay tuned for more details!--}}
            {{--                                    @endif--}}
            {{--                                </p>--}}
            {{--                                <div class="project-footer">--}}
            {{--                                    <div class="project-status">--}}
            {{--                                        <span class="status-badge">--}}
            {{--                                            <i class="fa fa-clock"></i>--}}
            {{--                                            In Development--}}
            {{--                                        </span>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="project-progress">--}}
            {{--                                        <div class="progress-bar">--}}
            {{--                                            <div class="progress-fill" style="width: 75%;"></div>--}}
            {{--                                        </div>--}}
            {{--                                        <span class="progress-text">75% Complete</span>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                @endforeach--}}
            {{--            @else--}}
            {{--                @endif--}}
        </div>
    </section>
    <!-- End Upcoming Intakes Section -->

    <!-- Our Latest Notice & Events Section -->
    <section class="notice-events-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 120px 0; position: relative; overflow: hidden;">
        <!-- Enhanced Background Elements -->
         <div class="notice-bg-shapes">
            <div class="notice-shape notice-shape-1"></div>
            <div class="notice-shape notice-shape-2"></div>
            <div class="notice-shape notice-shape-3"></div>
            <div class="notice-shape notice-shape-4"></div>
        </div>

        <div class="auto-container" style="position: relative; z-index: 2;">
            <!-- Enhanced Section Header -->
            <div class="notice-header text-center">
                <div class="notice-badge">
                    <i class="fa fa-newspaper"></i>
                    Latest Updates
                </div>
                <h2 class="notice-title" style="color: white; font-size: 48px; font-weight: 800; margin-bottom: 20px;">
                    Our Latest <span style="color: #ffd700;">Notice & Events</span>
                </h2>
            </div>

            <div class="row clearfix" style="margin-top: 60px;">
            @if(isset($notice_info) && count($notice_info) > 0)
                @foreach($notice_info as $v_notice)
                <!-- Company Card -->
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">

                        <div class="notice-item">
                            <div class="notice-card-modern">
                                <div class="notice-image-modern">
                                    <img src="@if(isset($v_notice['notice_file']) && !empty($v_notice['notice_file'])){{ asset($v_notice['notice_file']) }}@else{{ asset('frontend/assets/images/default-event.jpg') }}@endif" alt="{{$v_notice['notice_title'] ?? 'Event'}}" />
                                    <div class="notice-overlay-modern">
                                        <div class="overlay-content-modern">
                                            <i class="fa fa-newspaper" style="font-size: 40px; color: white; margin-bottom: 20px;"></i>
                                            <h6 style="color: white; font-weight: 700; font-size: 16px;"><a href="{{route('frontend.notice-event-details',$v_notice['slug'] ?? '#')}}">View Details</a></h6>
                                        </div>
                                    </div>
                                    <div class="notice-date-badge-modern">
                                        <i class="fa fa-calendar"></i>
                                        <span>
                                            @if(isset($v_notice['notice_start']))
                                                {{ \Carbon\Carbon::parse($v_notice['notice_start'])->format('M d') }}
                                            @else
                                                TBA
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="notice-content-modern">
                                    <h4 class="notice-title-modern">{{$v_notice['notice_title'] ?? 'Upcoming Event'}}</h4>
                                    <!-- Enhanced Notice Info Display -->
                                    <div class="date-range-modern">
                                        <i class="fa fa-calendar"></i>
                                        <span>
                                                    @if(isset($v_notice['notice_start']) && isset($v_notice['notice_end']))
                                                {{ \Carbon\Carbon::parse($v_notice['notice_start'])->format('M d') }} - {{ \Carbon\Carbon::parse($v_notice['notice_end'])->format('M d, Y') }}
                                            @else
                                                Coming Soon
                                            @endif
                                                </span>
                                    </div>

                                    <div class="notice-footer-modern">
                                        <a href="{{route('frontend.notice-event-details',$v_notice['slug'] ?? '#')}}" class="notice-btn-modern">
                                            <span>Read More</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Enhanced Default content when no notices are available -->
                    <div class="notice-item">
                        <div class="notice-card-modern">
                            <div class="notice-image-modern">
                                <img src="{{ asset('frontend/assets/images/default-event.jpg') }}" alt="No Events Available" />
                                <div class="notice-overlay-modern">
                                    <div class="overlay-content-modern">
                                        <i class="fa fa-calendar-alt" style="font-size: 40px; color: white; margin-bottom: 20px;"></i>
                                        <h6 style="color: white; font-weight: 700; font-size: 16px;">Stay Tuned</h6>
                                    </div>
                                </div>
                                <div class="notice-date-badge-modern">
                                    <i class="fa fa-calendar"></i>
                                    <span>Coming Soon</span>
                                </div>
                                <div class="notice-status-indicator">
                                    <span class="status-dot"></span>
                                    <span class="status-text">Pending</span>
                                </div>
                            </div>
                            <div class="notice-content-modern">
                                <div class="notice-header-modern">
                                    <div class="notice-icon-modern">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <div class="notice-category-modern">
                                        <span class="category-badge-modern">Announcement</span>
                                    </div>
                                </div>
                                <h4 class="notice-title-modern">No Events Available</h4>
                                <p class="notice-excerpt-modern">
                                    We're working on exciting new events and announcements. Check back soon for updates!
                                </p>


                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- End Latest Notice & Events  Section  -->


    <!-- FAQ & Stats Section -->
    <section class="faq-stats-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 100px 0; position: relative; overflow: hidden;">
        <!-- Background Pattern -->

        <div class="auto-container" style="position: relative; z-index: 2;">
            <div class="row clearfix align-items-center">
                <!-- FAQ Column -->
                <div class="col-lg-6 col-md-12 col-sm-12 mb-4">
                    <div class="faq-content">
                        <div class="faq-badge">
                            <i class="fa fa-question-circle"></i>
                            FAQ
                        </div>
                        <h2 style="color: white; font-size: 42px; font-weight: 700; margin-bottom: 20px;">
                            Frequently Asked <span style="color: #ffd700;">Questions</span>
                        </h2>
                        <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin-bottom: 40px;">
                            Find answers to common questions about our services and solutions
                        </p>

                        <!-- Modern Accordion -->
                        <div class="modern-accordion">
                            @foreach($faq_info as $v_faq)
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h5>{{$v_faq->question}}</h5>
                                        <span class="accordion-icon">
                                            <i class="fa fa-plus"></i>
                                        </span>
                                    </div>
                                    <div class="accordion-content" style="display: none;">
                                        <?php echo $v_faq->answer;?>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Stats Column -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="stats-content">
                        <div class="stats-image">
                            <img src="{{asset('frontend/assets/images/resource/counter-img.jpg')}}" alt="Our Achievements" class="img-fluid">
                            <div class="stats-overlay">
                                <div class="overlay-text">
                                    <h4>Our Achievements</h4>
                                    <p>Numbers that speak for our excellence</p>
                                </div>
                            </div>
                        </div>

                        <div class="stats-grid">
                            <div class="stat-item wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
                                <div class="stat-icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number" data-count="1200">1000+</h3>
                                    <p class="stat-label">Completed File</p>
                                </div>
                            </div>

                            <div class="stat-item wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                                <div class="stat-icon">
                                    <i class="fa fa-trophy"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number" data-count="50">5+</h3>
                                    <p class="stat-label">Awards Won</p>
                                </div>
                            </div>

                            <div class="stat-item wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                                <div class="stat-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number" data-count="800">1000+</h3>
                                    <p class="stat-label">Happy Student</p>
                                </div>
                            </div>

                            <div class="stat-item wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                                <div class="stat-icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="stat-content">
                                    <h3 class="stat-number" data-count="25">25</h3>
                                    <p class="stat-label">Years Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq Section -->

    <link href="{{asset('frontend/assets/css/home_page.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the main slider carousel
        $(".main-slider-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: true,
            dots: true,
            // Add other options as needed
        });

        // Accordion functionality
        $('.accordion-header').click(function() {
            let $content = $(this).next('.accordion-content');
            let $icon = $(this).find('.accordion-icon i');

            // Close other open contents
            $('.accordion-content').not($content).slideUp();
            $('.accordion-icon i').not($icon).removeClass('fa-minus').addClass('fa-plus');

            // Toggle this one
            $content.slideToggle(300);
            $icon.toggleClass('fa-plus fa-minus');
        });

        // Counter Animation
        const counters = document.querySelectorAll('.stat-number');

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        };

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation to buttons
        document.querySelectorAll('.modern-btn, .cta-btn, .service-btn, .notice-btn, .company-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.href && !this.href.includes('#')) {
                    const originalText = this.querySelector('span').textContent;
                    this.querySelector('span').textContent = 'Loading...';
                    this.style.pointerEvents = 'none';

                    setTimeout(() => {
                        this.querySelector('span').textContent = originalText;
                        this.style.pointerEvents = 'auto';
                    }, 2000);
                }
            });
        });
    });
</script>

    <!--Sponsors Section-->
    @if(isset($client_info) && count($client_info>0))
    <section class="sponsors-section">
        <div class="auto-container">

            <div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    @foreach($client_info as $v_client)
                    <li><div class="image-box"><a href="#"><img src="{{asset('frontend/assets/images/clients/1.png')}}" alt=""></a></div></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </section>
    @endif
    <!--End Sponsors Section-->


@endsection
