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
                        <th>Logo</th>
                        <th>Small Logo</th>
                        <th>Favicon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logo_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img style="width: 30px;" src="{{ asset($value->logo_image) }}"/></td>
                            <td><img style="width: 30px;" src="{{ asset($value->small_logo) }}"/></td>
                            <td><img style="width: 30px;" src="{{ asset($value->favicon) }}"/></td>
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
                                    <label for="slider image"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Logo Image') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input class="form-control" type="file" name="logo_image" value="" >
                                        <input class="logo_image1" type="hidden" name="logo_image1" value="<?php if(isset($editInfo->logo_image) && !empty($editInfo->logo_image)){ echo $editInfo->logo_image;} ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="favicon image"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Small Logo') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="small_logo" value="" >
                                        <input class="small_logo1" type="hidden" name="small_logo1" value="<?php if(isset($editInfo->small_logo) && !empty($editInfo->small_logo)){ echo $editInfo->small_logo;} ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="favicon image" class="col-md-4 col-form-label text-md-end">{{ __('Favicon Image') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="favicon" value="" >
                                        <input class="favicon1" type="hidden" name="favicon1" value="<?php if(isset($editInfo->favicon) && !empty($editInfo->favicon)){ echo $editInfo->favicon;} ?>">
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
        function edit(id) {
            $.ajax({
                url: "<?= URL::to('/logo-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $(".logo_image1").attr('value',''+response.logo_image);
                    $(".favicon1").attr('value',''+response.favicon);
                    $(".small_logo1").attr('value',''+response.small_logo);
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Logo");
                    }

                }
            });
        }
    </script>
@endsection
