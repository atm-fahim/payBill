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
                        <th>Destination Name</th>
                        <th>Destination Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($destination_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->destination_name }}</td>
                            <td><?php  echo Str::limit($value->destination_details,30); ?></td>
                            <td><img style="width: 30px;" src="{{ asset($value->destination_map_image) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('your-destination-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1  && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('your-destination-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('your-destination-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Destination Info') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('your-destination-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="branch"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Destination Name') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input id="destination_name" type="text" class="form-control" name="destination_name" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="destination_details"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Destination Details') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="destination_details" class="form-control tynyDetails" name="destination_details">{{ old('product_details') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="banner"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="destination_map_image1" type="hidden" name="destination_map_image1"/>
                                        <input id="destination_map_image" type="file" class="form-control" name="destination_map_image" >
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
                url: "<?= URL::to('/your-destination-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#destination_name").val(response.destination_name);
                    tinyMCE.activeEditor.setContent(response.destination_details);
                    $("#destination_details").val(response.destination_details);
                    $("#destination_map_image1").attr('value', '' + response.destination_map_image);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Destination Info");
                    }
                }
            });
        }
    </script>
@endsection
