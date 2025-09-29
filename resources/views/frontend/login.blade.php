@extends('frontend.index')
@section('content')
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ========================== SignUp Elements ============================= -->
        <section class="log-space">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11 col-md-11">
                        <div class="row no-gutters position-relative log_rads">
                            <div class="col-lg-6 col-md-7 position-static p-4 mx-auto">
                                <div class="log_wraps">



                                    @if(Session::has('fail'))
                                        <div class="alert alert-danger">
                                            {{Session::get('fail')}}
                                            {{session::forget('fail')}}
                                        </div>
                                    @endif



                                    <ul class="nav nav-tabs nav-justified" role="tablist">
{{--                                        <li class="nav-item" role="presentation">--}}
{{--                                            <a class="nav-link active" id="justified-tab-0" data-bs-toggle="tab" href="#justified-tabpanel-0" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true"> Sign In</a>--}}
{{--                                        </li>--}}
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="justified-tab-1" data-bs-toggle="tab" href="#justified-tabpanel-1" role="tab" aria-controls="justified-tabpanel-1" aria-selected="false"> User Sign In</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-5" id="tab-content">
{{--                                        <div class="tab-pane active" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0" style="margin-top: -12%;">--}}
{{--                                            <form method="post" action="{{ route('student.login-check') }}"--}}
{{--                                                  enctype="multipart/form-data">--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label style="font-size: 16px;padding: 5px;">Enter Your Domain Username *</label>--}}
{{--                                                    <input name="email" type="text" class="form-control" value="">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label style="font-size: 16px;padding: 5px;">Enter Your Domain Password*</label>--}}
{{--                                                    <input name="password" type="password" class="form-control" value="">--}}
{{--                                                </div>--}}
{{--                                                <hr>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <button style="background-color: #e56131; color:#FFF;" class="btn btn_apply w-100">Sign--}}
{{--                                                        In--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                            <div class="form-group text-center mb-0 mt-3">--}}
{{--                                                Don’t have an account? <a href="{{route('student.signup')}}" class="theme-cl">SignUp</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="tab-pane active" id="justified-tabpanel-1" role="tabpanel" aria-labelledby="justified-tab-1" style="margin-top: -12%;">
                                            <form method="post" action="{{ route('student.login-check') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Enter Email*</label>
                                                    <input name="user_email" type="text" class="form-control" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Enter Password*</label>
                                                    <input name="password" type="password" class="form-control" value="">
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <button style="background-color: #e56131; color:#FFF;" class="btn btn_apply w-100">Sign
                                                        In
                                                    </button>
                                                </div>
                                            </form>

                                            <div class="form-group text-center mb-0 mt-3">
                                                Don’t have an account? <a href="{{route('student.signup')}}" class="theme-cl">SignUp</a>
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
        <!-- ========================== Login Elements ============================= -->
    </div>
@endsection
