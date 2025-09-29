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
                        <th>team member</th>
                        <th>Profile</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($team_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->member_name }}</td>
                            <td><?php  echo Str::limit($value->profile,30); ?></td>
                            <td><img style="width: 30px;" src="{{ asset($value->photo) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('team-member-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1  && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('team-member-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('team-member-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Service') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('team-member-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="branch"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Member Name') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input id="member_name" type="text" class="form-control" name="member_name" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="profile"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="profile" class="form-control tynyDetails" name="profile">{{ old('profile') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="banner"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                                    <div class="col-md-6">
                                        <input id="photo1" type="hidden" name="photo1"/>
                                        <input id="photo" type="file" class="form-control" name="photo" >
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
                url: "<?= URL::to('/team-member-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#member_name").val(response.member_name);
                    tinyMCE.activeEditor.setContent(response.profile);
                    $("#profile").val(response.profile);
                    $("#photo1").attr('value', '' + response.photo);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Team");
                    }
                }
            });
        }
    </script>
@endsection
