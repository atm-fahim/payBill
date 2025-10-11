@extends('layouts.app')
@section('content')
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if(isset($user_access->is_create) && !empty($user_access->is_create) && $user_access->is_create==1)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
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
                        <th>Frontend Logo</th>
                        <th>Frontend Small Logo</th>
                        <th>Frontend Favicon</th>
                        <th>Dashboard Logo</th>
                        <th>Dashboard User Logo</th>
                        <th>Dashboard Favicon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logo_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img style="width: 80px;" src="{{ asset($value->logo_image) }}"/></td>
                            <td><img style="width: 80px;" src="{{ asset($value->small_logo) }}"/></td>
                            <td><img style="width: 80px;" src="{{ asset($value->favicon) }}"/></td>
                            <td><img style="width: 80px;" src="{{ asset($value->dashboard_logo) }}"/></td>
                            <td><img style="width: 80px;" src="{{ asset($value->dashboard_user) }}"/></td>
                            <td><img style="width: 80px;" src="{{ asset($value->dashboard_favicon) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('logo-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if(isset($user_access->is_approved) && !empty($user_access->is_approved) && $value->status==1 && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('logo-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('logo-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Logo') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('logo-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="slider image" class="col-md-4 col-form-label text-md-end">{{ __('Logo Image') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input class="form-control" type="file" name="logo_image" id="logo_image" onchange="previewImage(event, 'logo_preview')" >
                                        <input class="logo_image1" type="hidden" name="logo_image1" value="{{ isset($editInfo->logo_image) ? $editInfo->logo_image : '' }}">
                                        <img id="logo_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Small Logo') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="small_logo" id="small_logo" onchange="previewImage(event, 'small_logo_preview')" >
                                        <input class="small_logo1" type="hidden" name="small_logo1" value="{{ isset($editInfo->small_logo) ? $editInfo->small_logo : '' }}">
                                        <img id="small_logo_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Favicon Image') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="favicon" id="favicon" onchange="previewImage(event, 'favicon_preview')" >
                                        <input class="favicon1" type="hidden" name="favicon1" value="{{ isset($editInfo->favicon) ? $editInfo->favicon : '' }}">
                                        <img id="favicon_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Dashboard Logo') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="dashboard_logo" id="dashboard_logo" onchange="previewImage(event, 'dashboard_logo_preview')" >
                                        <input class="dashboard_logo1" type="hidden" name="dashboard_logo1" value="{{ isset($editInfo->dashboard_logo) ? $editInfo->dashboard_logo : '' }}">
                                        <img id="dashboard_logo_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Dashboard User') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="dashboard_user" id="dashboard_user" onchange="previewImage(event, 'dashboard_user_preview')" >
                                        <input class="dashboard_user1" type="hidden" name="dashboard_user1" value="{{ isset($editInfo->dashboard_user) ? $editInfo->dashboard_user : '' }}">
                                        <img id="dashboard_user_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Dashboard Favicon') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="dashboard_favicon" id="dashboard_favicon" onchange="previewImage(event, 'dashboard_favicon_preview')" >
                                        <input class="dashboard_favicon1" type="hidden" name="dashboard_favicon1" value="{{ isset($editInfo->dashboard_favicon) ? $editInfo->dashboard_favicon : '' }}">
                                        <img id="dashboard_favicon_preview" src="" style="width: 100px; margin-top: 10px; display: none;" />
                                    </div>
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
    <script>
        function previewImage(event, previewId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewId);
                output.src = reader.result;
                output.style.display = 'block'; // Show the preview image
            };
            reader.readAsDataURL(event.target.files[0]); // Get the file as data URL
        }

        function edit(id) {
            $.ajax({
                url: "<?= URL::to('/logo-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    // Show the modal
                    $("#exampleModal").modal("show");

                    // Populate the form fields
                    $(".id").val(response.id);
                    $(".logo_image1").val(response.logo_image);
                    $(".favicon1").val(response.favicon);
                    $(".small_logo1").val(response.small_logo);
                    $(".dashboard_user1").val(response.dashboard_user);
                    $(".dashboard_logo1").val(response.dashboard_logo);
                    $(".dashboard_favicon1").val(response.dashboard_favicon);

                    // Set the default preview images if available
                    if (response.logo_image) {
                        $("#logo_preview").attr('src', response.logo_image).show();
                    }
                    if (response.small_logo) {
                        $("#small_logo_preview").attr('src', response.small_logo).show();
                    }
                    if (response.favicon) {
                        $("#favicon_preview").attr('src', response.favicon).show();
                    }
                    if (response.dashboard_logo) {
                        $("#dashboard_logo_preview").attr('src', response.dashboard_logo).show();
                    }
                    if (response.dashboard_user) {
                        $("#dashboard_user_preview").attr('src', response.dashboard_user).show();
                    }
                    if (response.dashboard_favicon) {
                        $("#dashboard_favicon_preview").attr('src', response.dashboard_favicon).show();
                    }

                    // Update modal button text for updating
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Logo");
                    }
                }
            });
        }
    </script>
@endsection
