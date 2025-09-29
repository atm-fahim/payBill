@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl-9 mx-auto">
            <div class="col-lg-12">
                @if(isset($user_access->is_create) && !empty($user_access->is_create) && $user_access->is_create==1)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="float: right;">
                        Add +
                    </button>
                @endif
            </div>
        </div>
        <hr>
        <div class="col-lg-12">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Album Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($album_info as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->album_name }}</td>
                        <td>{{ $value->slug }}</td>
                        {{--                            <td><img style="width: 30px;" src="{{ asset($value->thumb_image) }}"/></td>--}}
                        <td>
                            @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                <button onclick="edit({{$value->id}})">
                                    <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                </button>
                            @endif
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                <button title="Upload Image" >
                                    <a href="{{route('album.show',$value->id)}}">
                                        <i class="fadeIn animated bx  bxs-cloud-upload" data-feather="upload"></i></a>
                                </button>
                            @endif
                            @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                <button>
                                    <a href="{{route('category-delete',$value->id)}}">
                                        <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                </button>
                            @endif
                            @if(isset($user_access->is_approved) && !empty($user_access->is_approved) && $value->status==1 && $user_access->is_approved==1)
                                <button>
                                    <a href="{{route('category-in-active',$value->id)}}">
                                        <i class="fadeIn animated bx bx-comment-check"
                                           data-feather="check-square"></i>
                                    </a>
                                </button>
                            @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                <button>
                                    <a href="{{route('category-active',$value->id)}}">
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Album') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('album-save-update') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="input17" class="form-label">Album Name</label>
                                <div class="position-relative input-icon">
                                    <input class="id" type="hidden" name="id" value="">
                                    <input id="albumName" class="form-control" type="text" name="album_name" placeholder="Album Name" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button class="btn btn-primary px-4" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <script>
        function edit(id) {
            $.ajax({
                url: "<?= URL::to('/album-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#albumName").val(response.album_name);
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Album");
                    }

                }
            });
        }
    </script>
@endsection
