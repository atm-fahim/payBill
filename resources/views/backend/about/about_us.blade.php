@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0 text-primary courseDetailsTitle">About us Details</h5>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                        {{session::forget('success')}}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('about-save-update') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input class="id" type="hidden" name="id" value="<?php if(isset($about_info->id) && !empty($about_info->id)){ echo $about_info->id;} ?>"/>
                                    <div class="form-group">
                                        <label for="inputTitle">About Us Title</label>
                                        <input type="text" name="about_us_title" class="form-control courseTitle" value="<?php if(isset($about_info->about_us_title) && !empty($about_info->about_us_title)){ echo $about_info->about_us_title;} ?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputOutline">About Us Details</label>
                                        <textarea style="height: 400px;"  name="about_us_details" class="form-control outLine tynyDetails"><?php if(isset($about_info->about_us_details) && !empty($about_info->about_us_details)){ echo $about_info->about_us_details;} ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">About us Image</label>
                                        <input class="form-control" type="file" name="about_image" value="">
                                        <input class="image1" type="hidden" name="about_image1" value="<?php if(isset($about_info->about_us_image) && !empty($about_info->about_us_image)){ echo $about_info->about_us_image;} ?>">
                                        <img style="width: 80px" src="{{asset($about_info->about_us_image)}}"/>
                                    </div>
<hr/>

                                    <hr/>
                                    <div class="form-group">
                                        <label for="inputTitle">Mission & Vision Title</label>
                                        <input type="text" name="mission_title" class="form-control courseTitle" value="<?php if(isset($about_info->mission_title) && !empty($about_info->mission_title)){ echo $about_info->mission_title;} ?>" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputOutline">Mission & Vision Details</label>
                                        <textarea style="height: 400px;"  name="mission_details" class="form-control outLine tynyDetails"><?php if(isset($about_info->mission_details) && !empty($about_info->mission_details)){ echo $about_info->mission_details;} ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">Mission & Vision Image</label>
                                        <input class="form-control" type="file" name="mission_image" value="">
                                        <input class="image1" type="hidden" name="mission_image1" value="<?php if(isset($about_info->mission_image) && !empty($about_info->mission_image)){ echo $about_info->mission_image;} ?>">
                                        <img style="width: 80px" src="{{asset($about_info->mission_image)}}"/>

                                    </div>
{{--                                    <hr/>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="inputTitle">Vision Title</label>--}}
{{--                                        <input type="text" name="vision_title" class="form-control courseTitle" value="<?php if(isset($about_info->vision_title) && !empty($about_info->vision_title)){ echo $about_info->vision_title;} ?>" required/>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="inputOutline">Vision Details</label>--}}
{{--                                        <textarea style="height: 400px;"  name="vision_details" class="form-control outLine tynyDetails"><?php if(isset($about_info->vision_details) && !empty($about_info->vision_details)){ echo $about_info->vision_details;} ?></textarea>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group">--}}
{{--                                        <label for="inputImage">Vision Image</label>--}}
{{--                                        <input class="form-control" type="file" name="vision_image" value="">--}}
{{--                                        <input class="image1" type="hidden" name="vision_image1" value="<?php if(isset($about_info->vision_image) && !empty($about_info->vision_image)){ echo $about_info->vision_image;} ?>">--}}
{{--                                        <img style="width: 80px" src="{{asset($about_info->vision_image)}}"/>--}}

{{--                                    </div>--}}
                                    <hr>
                                    <div class="form-group">
                                        <label for="inputTitle">Chairman Title</label>
                                        <input type="text" name="chairman_profile_title" class="form-control courseTitle" value="<?php if(isset($about_info->chairman_profile_title) && !empty($about_info->chairman_profile_title)){ echo $about_info->chairman_profile_title;} ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputOutline">Chairman Details</label>
                                        <textarea style="height: 400px;"  name="chairman_profile" class="form-control outLine tynyDetails"><?php if(isset($about_info->chairman_profile) && !empty($about_info->chairman_profile)){ echo $about_info->chairman_profile;} ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputImage">Chairman Image</label>
                                        <input class="form-control" type="file" name="chairman_image" value="">
                                        <input class="image1" type="hidden" name="chairman_image1" value="<?php if(isset($about_info->chairman_image) && !empty($about_info->chairman_image)){ echo $about_info->chairman_image;} ?>">
                                        <img style="width: 80px" src="{{asset($about_info->chairman_image)}}"/>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                        @if(isset($user_access->is_create) && !empty($user_access->is_create) && $user_access->is_create==1 && $user_access->status==1)
                                            <input class="btn btn-success submit" type="submit" value="<?php if(isset($about_info->id) && !empty($about_info->id)){ echo 'Update';}else{echo 'Submit';} ?>"/>
                                        @else
                                            <div class="btn btn-info">Please Contact Admin</div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <hr>

                        </div>
                        <!-- .panel-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
