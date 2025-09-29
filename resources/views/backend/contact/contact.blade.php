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
{{--                        <th>Branch</th>--}}
                        <th>Address</th>
                        <th>Zip Code</th>
                        <th>Contact No.</th>
                        <th>Hotline No.</th>
                        <th>Map Link</th>
                        <th>Fb Link</th>
                        <th>Linkedin</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
{{--                            <td>{{ $value->branch_name }}</td>--}}
                            <td><?php echo  $value->address; ?></td>
                            <td>{{ $value->zip_code }}</td>
                            <td>{{ $value->contact_number }}</td>
                            <td>{{ $value->hotline_number }}</td>
                            <td>{{ $value->map_link }}</td>
                            <td>{{ $value->fb_link }}</td>
                            <td>{{ $value->linkedin }}</td>

                            <td>
                                @if(isset($user_access->is_edit) && !empty($user_access->is_edit) && $user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if(isset($user_access->is_delete) && !empty($user_access->is_delete) && $user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('contact-us-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1  && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('contact-us-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif(isset($user_access->is_approved) && ($user_access->is_approved) && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('contact-us-active',$value->id)}}">
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
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Contact Information') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('contact-us-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <input name="id" type="hidden" class="id" value="">
{{--                                    <div class="col-12 col-lg-6">--}}
{{--                                        <label for="Branch" class="form-label">Branch</label>--}}
{{--                                        <select  class="form-control branch_id" name="branch_id">--}}
{{--                                            <option value="0">--select any one---</option>--}}
{{--                                            @foreach($branch_info as $v_value)--}}
{{--                                                <option value="{{$v_value->id}}">{{$v_value->branch_name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                   </div>--}}
                                    <div class="col-12 col-lg-6">
                                        <label for="PhoneNumber" class="form-label">Zip Code</label>
                                        <input name="zip_code" type="text" class="form-control zip_code" id="ZipCode" placeholder="Enter the Zip Code">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="PhoneNumber" class="form-label">Phone Number</label>
                                        <input name="contact_number" type="text" class="form-control contact_number"  placeholder="Phone Number">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="HotLine" class="form-label">Hotline Number</label>
                                        <input name="hotline_no" type="text" class="form-control hotline_no"  placeholder="Hotline Number">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="InputEmail" class="form-label">E-mail Address</label>
                                        <input name="email" type="text" class="form-control email"  placeholder="Enter Email Address">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="InputEmail" class="form-label">Facebook Link</label>
                                        <input name="fb_link" type="text" class="form-control fb_link"  placeholder="Enter Facebook link">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="InputEmail" class="form-label">Linkedin</label>
                                        <input name="linkedin" type="text" class="form-control linkedin" placeholder="Enter Linkedin">
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="Address" class="form-label">Address</label>
                                        <textarea id="address" name="address" class="form-control tynyDetails"></textarea>
                                    </div>
{{--                                <div class="row mb-3">--}}
{{--                                    <label for="branch"--}}
{{--                                           class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="id" type="hidden" class="id" value="">--}}
{{--                                        <input name="organization_id" type="hidden" class="organization_id" value="1">--}}
{{--                                        <input type="text" class="form-control city" name="city" value="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mb-3">--}}
{{--                                    <label for="branch"--}}
{{--                                           class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <input name="id" type="hidden" class="id" value="">--}}
{{--                                        <input name="organization_id" type="hidden" class="organization_id" value="1">--}}
{{--                                        <input type="text" class="form-control city" name="city" value="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mb-3">--}}
{{--                                    <label for="Address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <textarea name="address" class="form-control tynyDetails"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


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
                url: "<?= URL::to('/contact-us-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $(".branch_id").val(response.branch_id);
                    $(".zip_code").val(response.zip_code);
                    $(".contact_number").val(response.contact_number);
                    $(".hotline_no").val(response.hotline_number);
                    $(".email").val(response.email);
                    $(".fb_link").val(response.fb_link);
                    $(".linkedin").val(response.linkedin);

                    $("#address").val(response.address);
                    tinymce.get('address').setContent(response.address);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Contact Information");
                    }
                }
            });
        }
    </script>
@endsection
