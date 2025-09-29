@extends('layouts.app')
@section('content')
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if(isset($user_access->is_create) && !empty($user_access->is_create) && $user_access->is_create==1)
                    <button type="button" class="btn btn-primary addSlider" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="float: right;">
                        Add +
                    </button>
                @endif
            </div>
            <hr/>
            <div class="col-lg-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Slider Title</th>
                        <th>Slider</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slider as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->slider_title }}</td>
                            <td><img style="width: 30px;" src="{{ asset($value->slider_image) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('slider-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if(isset($user_access->is_approved) && !empty($user_access->is_approved) && $value->status==1 && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('slider-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('slider-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-x" data-feather="x-square"></i>
                                        </a>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Slider') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('slider-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="slider image" class="col-md-4 col-form-label text-md-end">{{ __('Slider Title') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control slider_title" type="text" name="slider_title" value="<?php if(isset($editInfo->slider_title) && !empty($editInfo->slider_title)){ echo $editInfo->slider_title;} ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="slider image" class="col-md-4 col-form-label text-md-end">{{ __('Slider Image') }}</label>

                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input id="imageInput" class="form-control" type="file" name="slider_image" value="">
                                        <input class="slider_image1" type="hidden" name="slider_image1" value="<?php if(isset($editInfo->slider_image) && !empty($editInfo->slider_image)){ echo $editInfo->slider_image;} ?>">
                                    </div>
                                </div>
                                <div id="imagePreview">
                                    <p>No image selected.</p>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary submit"> {{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <style>
        #imagePreview {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            /*width: 300px;*/
            /*height: 300px;*/
            text-align: center;
            /*line-height: 280px;*/
            border-radius: 8px;
            background-color: #f4f4f4;
        }

        #imagePreview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            $('.addSlider').on('click',function(){
                $('#imagePreview').html('');
                $('.slider_title').val('');
            });
            // When an image file is selected from the input
            $('#imageInput').on('change', function(event) {
                $('#imagePreview').html('');
                var file = event.target.files[0];

                // Check if the selected file is an image
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    // When the file is successfully loaded
                    reader.onload = function(e) {
                        // Set the image inside the preview div
                        $('#imagePreview').html('<img src="' + e.target.result + '" alt="Selected Image" />');
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);
                } else {
                    // If the selected file is not an image, show a message
                    $('#imagePreview').html('<p>Please select a valid image file.</p>');
                }
            });
        });



        function edit(id) {
            $('#imagePreview').html('');
            $('.slider_title').val('');
            $.ajax({
                url: "<?= URL::to('/slider-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $(".slider_image1").attr('value',''+response.slider_image);
                    $(".slider_title").val(response.slider_title);
                     // Insert the image into the #imageContainer div
                    $('#imagePreview').html('<img src="' + response.slider_image + '" alt="Loaded Image">');
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Slider");
                    }

                }
            });
        }
    </script>
@endsection
