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
                        <th>Course Name</th>
                        <th>Course Details</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->destination_name }}</td>
                            <td>{{ $value->university_name }}</td>
                            <td>{{ $value->course_name }}</td>
                            <td><?php  echo Str::limit($value->course_details,30); ?></td>
                            <td><img style="width: 30px;" src="{{ asset($value->course_image) }}"/></td>
                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('course-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1  && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('course-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('course-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Course Info') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('course-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Destination Name') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <select class="form-control" onchange="destination(this)" name="destination_id" id="destination_id">
                                            <option value="">--select any one --</option>
                                            @foreach($destination_info as $v_destination)
                                                <option value="{{$v_destination->id}}">{{$v_destination->destination_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Select University') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="university_id" id="university_id">
                                            <option value="">--select any one --</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="branch"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Course Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="course_name" type="text" class="form-control" name="course_name" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="course_details"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Course Details') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="course_details" class="form-control tynyDetails" name="course_details">{{ old('product_details') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="banner"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="course_image1" type="hidden" name="course_image1"/>
                                        <input id="course_image" type="file" class="form-control" name="course_image" >
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
        function destination(element) {
            var destination_id = $(element).val();

            if (destination_id) {
                $.ajax({
                    url: "{{ route('university-list') }}",
                    method: 'GET',
                    data: { destination_id: destination_id },
                    success: function(response) {
                        var universitySelect = $('#university_id');
                        universitySelect.empty();
                        universitySelect.append('<option value="">--select any one--</option>');

                        if (response.universities && response.universities.length > 0) {
                            $.each(response.universities, function(index, university) {
                                universitySelect.append('<option value="' + university.id + '">' + university.university_name + '</option>');
                            });
                        } else {
                            universitySelect.append('<option value="">No universities found</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while loading universities: ' + (xhr.responseJSON?.error || 'Unknown error'));
                    }
                });
            } else {
                $('#university_id').empty().append('<option value="">--select any one--</option>');
            }
        }

        function edit(id) {
            $.ajax({
                url: "<?= URL::to('/course-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#course_name").val(response.course_name);
                    $("#destination_id").val(response.destination_id);
                    tinyMCE.activeEditor.setContent(response.course_details);
                    $("#course_details").val(response.course_details);
                    $("#course_image1").attr('value', '' + response.course_image);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update course Info");
                    }
                }
            });
        }
    </script>
@endsection
