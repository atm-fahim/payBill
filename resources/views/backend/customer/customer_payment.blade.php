@extends('layouts.app')
@section('content')
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if($user_access->is_create==1)
                    <button id="add_button" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
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
                        <th>Customer Name</th>
                        <th>Invoice No</th>
                        <th>Account No</th>
                        <th>BDT Rate</th>
                        <th>Ringgit Amount</th>
                        <th>BDT Amount</th>
                        <th>Pad Amount</th>
                        <th>Due Amount</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer_payment_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->customer_name }}</td>
                            <td>{{ $value->invoice_no }}</td>
                            <td>{{ $value->ac_no }}</td>
                            <td>{{ $value->bdt_rate }}</td>
                            <td>{{ $value->other_amount }}</td>
                            <td>{{ $value->bdt_amount }}</td>
                            <td>{{ $value->pad_amount }}</td>
                            <td>{{ $value->due_amount }}</td>
                            <td>{{ $value->due_pay_amount }}</td>
                            <td>{{ $value->method_name }}</td>
                            <td>
                                @if($user_access->is_edit==1)
                                    <button onclick="edit({{$value->id}})">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit"></i>
                                    </button>
                                @endif
                                @if($user_access->is_delete==1)
                                    <button>
                                        <a href="{{route('supplier-payment-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2"></i></a>
                                    </button>
                                @endif
                                @if($value->status==1 && $user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('supplier-payment-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check"
                                               data-feather="check-square"></i>
                                        </a>
                                    </button>
                                @elseif($user_access->is_approved==1)
                                    <button>
                                        <a href="{{route('supplier-payment-active',$value->id)}}">
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Customer Payment Information') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="paymentForm" class="row g-3" method="POST" action="{{ route('customer-payment-save-update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <input name="id" type="hidden" class="id" value="">
                                    <label for="input1" class="form-label">{{ __('Select Customer') }}</label>
                                    <select class="form-control" name="customer_id">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($customer_info as $v_cus)
                                            <option value="{{$v_cus->id}}">{{$v_cus->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="input2" class="form-label">{{ __('Total Ringgit') }}</label>
                                    <input type="text" id="total_other_amount" class="form-control" name="total_other_amount" placeholder="Total Ringgit">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('BDT Rate') }}</label>
                                    <input id="bdt_rat" type="text" class="form-control" name="bdt_rat" value="{{ old('bdt_rat') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Total BDT Amount') }}</label>
                                    <input id="total_bdt_amount" type="text" class="form-control" name="total_bdt_amount" value="{{ old('total_bdt_amount') }}" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Paid Amount') }}</label>
                                    <input id="paid_amount" type="text" class="form-control" name="paid_amount" value="{{ old('paid_amount') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Due Amount') }}</label>
                                    <input id="due_amount" type="text" class="form-control" name="due_amount" value="{{ old('due_amount') }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Payment Method') }}</label>
                                    <select class="form-control" name="payment_method">
                                        <option value="0"> -- select any one--</option>
                                        @foreach($method_info as $v_method)
                                            <option value="{{$v_method->id}}">{{$v_method->method_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Account/Mobile No') }}</label>
                                    <input id="account_no" type="text" class="form-control" name="account_no" value="{{ old('account_no') }}">
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission via AJAX
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form from submitting the normal way

                var formData = new FormData(this); // Get form data

                // Send an AJAX POST request
                $.ajax({
                    url: $(this).attr('action'), // URL for the form action
                    type: 'POST',
                    data: formData,
                    processData: false,  // Do not process the data
                    contentType: false,  // Do not set content type
                    success: function(response) {
                        // Handle success
                        if (response.status === 'success') {
                            alert('Payment saved successfully!');
                            // You can also clear the form or redirect here
                            $('form')[0].reset();
                            window.location.href = response.redirect_url;
                        } else {
                            alert('Error saving payment: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        alert('An error occurred: ' + error);
                    }
                });
            });

            // Calculate the Total BDT Amount dynamically
            $('#bdt_rat, #total_other_amount').on('input', function() {
                var totalOtherAmount = parseFloat($('#total_other_amount').val()) || 0;
                var bdtRate = parseFloat($('#bdt_rat').val()) || 0;

                // Calculate Total BDT Amount
                var totalBdtAmount = totalOtherAmount * bdtRate;
                $('#total_bdt_amount').val(totalBdtAmount.toFixed(2));

                // Calculate Due Amount
                var paidAmount = parseFloat($('#paid_amount').val()) || 0;
                var dueAmount = totalBdtAmount - paidAmount;
                $('#due_amount').val(dueAmount.toFixed(2));
            });

            // Calculate Due Amount when Paid Amount changes
            $('#paid_amount').on('input', function() {
                var totalBdtAmount = parseFloat($('#total_bdt_amount').val()) || 0;
                var paidAmount = parseFloat($(this).val()) || 0;

                var dueAmount = totalBdtAmount - paidAmount;
                $('#due_amount').val(dueAmount.toFixed(2));
            });
        });

    </script>
@endsection
