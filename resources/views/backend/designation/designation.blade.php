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
                        <th>Designation</th>
                        <th>Short Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($designation as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->designation }}</td>
                            <td>{{ $value->short_name }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('designation-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if(isset($user_access->is_approved) && !empty($user_access->is_approved) && $value->status==1 && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('designation-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('designation-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Designation') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('designation-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="category"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>

                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input id="designation" type="text"
                                               class="form-control @error('designation') is-invalid @enderror"
                                               name="designation" value="{{ old('designation') }}" required
                                               autocomplete="category_title" autofocus>

                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="short_name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Short Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="short_name" type="text"
                                               class="form-control"
                                               name="short_name" value="{{ old('short_name') }}" required
                                               autocomplete="short_name" autofocus>
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
                url: "<?= URL::to('/designation-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#designation").val(response.designation);
                    $("#short_name").val(response.short_name);
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update category");
                    }

                }
            });
        }
    </script>
@endsection
