@extends('layouts.app')
@section('content')
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if($user_access->is_create==1)
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
                        <th>Name</th>
                        <th>Code</th>
                        <th>Slug</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->customer_name }}</td>
                            <td>{{ $value->code }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->phone_number }}</td>
                            <td>
                                @if($user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if($user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('customer-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1 && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('customer-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif($user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('customer-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Customer') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('customer-save-update') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="category"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>
                                    <div class="col-md-6">
                                        <input name="id" type="hidden" class="id" value="">
                                        <input name="code" type="hidden" class="code" value="">
                                        <input id="cus_membership" type="text"
                                               class="form-control @error('cus_membership') is-invalid @enderror"
                                               name="customer_name" value="{{ old('cus_membership') }}" required
                                               autocomplete="cus_membership" autofocus>

                                        @error('cus_membership')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone_number" type="text"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               name="phone_number" value="{{ old('phone_number') }}" required
                                               autocomplete="phone_number" autofocus>

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="address"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="address"
                                                  class="form-control @error('address') is-invalid @enderror"
                                                  name="address" required
                                                  autocomplete="address" autofocus>{{ old('phone_number') }}</textarea>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                url: "<?= URL::to('/customer-edit'); ?>/" + id,
                type: 'get',
                data: {},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleModal").modal("show");
                    $(".id").val(response.id);
                    $("#cus_membership").val(response.customer_name);
                    $("#phone_number").val(response.phone_number);
                    $("#address").val(response.address);
                    $(".code").val(response.code);
                    // $("#thumb_img").attr('src',''+response.thumb_image);
                    if(response.id){
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Customer");
                    }
                }
            });
        }
    </script>
@endsection
