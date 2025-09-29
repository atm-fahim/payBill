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
                        <th>Notice & Event title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Is continue</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($notice_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->notice_title }}</td>
                            <td>{{ $value->notice_start }}</td>
                            <td>{{ $value->notice_end }}</td>
                            <td>{{ $value->is_continue }}</td>
                            <td><a class="btn btn-outline-info" target="_blank" href="{{ asset($value->notice_file) }}"><i class="fadeIn animated bx bx-download" data-feather="download"></i></a></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
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
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Notice & Event') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('notice-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="Notice Title"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Notice & Event title') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input id="notice_title" type="text"
                                               class="form-control"
                                               name="notice_title" value="{{ old('notice_title') }}" required
                                               autocomplete="notice_title" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Notice Start Date"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Notice & Event Start Date') }}</label>
                                    <div class="col-md-6">
                                        <input id="notice_start_date" type="text"
                                               class="form-control datepicker flatpickr-input"
                                               name="notice_start_date" value="{{ old('notice_start_date') }}"
                                               autocomplete="notice_start_date" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Notice End Date"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Notice & Event End Date') }}</label>
                                    <div class="col-md-6">
                                        <input id="notice_end_date" type="text"
                                               class="form-control datepicker flatpickr-input"
                                               name="notice_end_date" value="{{ old('notice_end_date') }}"
                                               autocomplete="notice_end_date" autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Notice End Date"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Is Continue') }}</label>
                                    <div class="col-md-6">
                                        <input id="is_continue" type="checkbox"
                                               class="form-check-input is_continue"
                                               name="is_continue" value="1">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Notice End Date"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Notice & Event File') }}</label>
                                    <div class="col-md-6">
                                        <input id="notice_file1" type="hidden" name="notice_file1" value="">
                                        <input id="notice_file" type="file"
                                               class="form-control"
                                               name="file" value="{{ old('notice_file') }}">
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
                url: "<?= URL::to('/notice-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#notice_title").val(response.notice_title);
                    $("#notice_start_date").val(response.notice_start);
                    $("#notice_end_date").val(response.notice_end);
                    $(".is_continue").val(response.is_continue);
                    $("#notice_file1").attr('value',''+response.notice_file);
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Notice");
                    }

                }
            });
        }
    </script>
@endsection
