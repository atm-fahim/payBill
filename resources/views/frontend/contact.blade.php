@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h1>Contact <span>us</span></h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    <section class="contact-page-section">

        <div class="auto-container">
            <div class="inner-container">
                <h2>Contact our support guys or make appointment <br> with <span>our consultan</span></h2>
                <div class="row clearfix">

                    <!-- Info Column -->
                    <div class="info-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="text">Please contact us using the information below. For additional information on our management consulting services, please visit the appropriate page on our site.</div>
                            <ul class="list-style-five">
                                <li><span class="icon fa fa-building"></span><?php if(isset($contact_info[0]->address) && !empty($contact_info[0]->address)) {echo $contact_info[0]->address;}else{echo Null;}?> <br> {{$contact_info[0]->city}} <br> {{$contact_info[0]->zip_code}}</li>
                                <li><span class="icon fa fa-fax"></span> {{$contact_info[0]->contact_number}}</li>
                                <li><span class="icon fa fa-fax"></span> {{$contact_info[0]->hotline_number}}</li>
                                <li><span class="icon fa fa-envelope-o"></span>{{$contact_info[0]->email}}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <!--Contact Form-->
                            <div class="contact-form">
                                <form method="post" action="#" id="contact-form">

                                    <div class="form-group">
                                        <input type="text" name="firstname" value="" placeholder="Full name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="email" value="" placeholder="Email" required>
                                    </div>


                                    <div class="form-group">
                                        <textarea name="message" placeholder="write.."></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="theme-btn">Submit</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Team Page Section -->
    <!-- Contact Info Section -->
    <section class="contact-info-section" style="background-image:url({{asset('frontend/assets/images/background/10.jpg')}})">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach($branch_info as $v_branch)

                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <h4>{{$v_branch->branch_name}}</h4>
                    <ul class="list-style-six">
                        <li><span class="icon flaticon-map-1"></span> {{$v_branch->address}}</li>
                        <li><span class="icon flaticon-phone-receiver"></span> {{$v_branch->contact_number}}</li>
                        <li><span class="icon flaticon-e-mail-envelope"></span>{{$v_branch->email}}</li>
                    </ul>
                </div>
                @endforeach


            </div>
        </div>
    </section>

@endsection
