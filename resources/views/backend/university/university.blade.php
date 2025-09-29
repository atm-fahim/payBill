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
                        <th>Destination</th>
                        <th>University Name</th>
                        <th>University Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($university_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->destination_name }}</td>
                            <td>{{ $value->university_name }}</td>
                            <td><?php  echo Str::limit($value->university_details,30); ?></td>
                            <td><img style="width: 30px;" src="{{ asset($value->university_image) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('university-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1  && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('university-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('university-active',$value->id)}}">
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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('University Info') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('university-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="branch"
                                           class="col-md-4 col-form-label text-md-end">{{ __('University Name') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                       <select class="form-control" name="destination_id" id="destination_id">
                                           <option value="">--select any one --</option>
                                           @foreach($destination_info as $v_destination)
                                                <option value="{{$v_destination->id}}">{{$v_destination->destination_name}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="branch"
                                           class="col-md-4 col-form-label text-md-end">{{ __('University Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="university_name" type="text" class="form-control" name="university_name" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="university_details"
                                           class="col-md-4 col-form-label text-md-end">{{ __('University Details') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="university_details" class="form-control tynyDetails" name="university_details">{{ old('product_details') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="banner"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="university_image1" type="hidden" name="university_image1"/>
                                        <input id="university_image" type="file" class="form-control" name="university_image" >
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit"
                                                    class="btn btn-primary submit"> {{ __('Save') }}</button>
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
                url: "<?= URL::to('/university-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#university_name").val(response.university_name);
                    $("#destination_id").val(response.destination_id);
                    tinyMCE.activeEditor.setContent(response.university_details);
                    $("#university_details").val(response.university_details);
                    $("#university_image1").attr('value', '' + response.university_image);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update university Info");
                    }
                }
            });
        }
    </script>
@endsection
