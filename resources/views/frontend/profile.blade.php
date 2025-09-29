@extends('frontend.index')
@section('content')

    <section class="gray pt-5">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="dashboard-navbar">

                        <div class="d-user-avater">
                            <img src="{{asset(''.student()->image.'')}}" class="img-fluid avater" alt="">
                            <h4>{{student()->name}}</h4>
                        </div>

                        <div class="d-navigation">
                            <ul id="side-menu">

                                <li><a href="{{route('my-course',student()->id)}}"><i class="ti-crown"></i>My Course</a></li>
                                <li><a href="{{route('my-assign-course',student()->student_id)}}"><i class="ti-crown"></i>Assign Course</a></li>
                                <li><a href="{{route('result')}}"><i class="ti-cup"></i>Course Exam Result</a></li>
                                <li><a href="{{route('assessment-result')}}"><i class="ti-cup"></i>Assessment Result</a></li>
                                <li><a href="{{route('result')}}"><i class="ti-cup"></i>Result</a></li>
                                <li><a href="{{route('sign-out')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="ti-power-off"></i>Sign Out</a></li>
                            </ul>
                        </div>

                    </div>


                </div>

                <div class="col-lg-9 col-md-9 col-sm-12">
                      <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashboard_container">
                                <div class="dashboard_container_body p-4">
                                    <div class="viewer_detail_wraps">
                                        <div class="viewer_detail_thumb">
                                            <img src="{{asset(''.student()->image.'')}}" class="img-fluid" alt="" />
{{--                                            <div class="viewer_status">pro</div>--}}
                                        </div>
                                        <div class="caption">
                                            <div class="viewer_header">
                                                <h4>{{student()->name}}</h4>
                                                <ul>
                                                    <li><strong>{{$total_course}}</strong> Classes Completed</li>
{{--                                                    <li><strong>0</strong> Lessions Completed</li>--}}
                                                </ul>
                                            </div>
{{--                                            <div class="viewer_header">--}}
{{--                                                <ul class="badge_info">--}}
{{--                                                    <li class="started"><i class="ti-rocket"></i></li>--}}
{{--                                                    <li class="medium"><i class="ti-cup"></i></li>--}}
{{--                                                    <li class="platinum"><i class="ti-thumb-up"></i></li>--}}
{{--                                                    <li class="elite unlock"><i class="ti-medall"></i></li>--}}
{{--                                                    <li class="power unlock"><i class="ti-crown"></i></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->


                    <!-- Row -->

                    <!-- /Row -->
                </div>
            </div>
            <!-- Row -->
        </div>
    </section>

@endsection
