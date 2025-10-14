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
                        <th>Supplier Name</th>
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
                    @foreach($supplier_payment_info as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->supplier_name }}</td>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Supplier') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                            <form class="row g-3" method="POST" action="{{ route('supplier-save-update') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" class="id" value="">
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">{{ __('Supplier Name') }}</label>
                                    <select class="form-control" name="supplier_id">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($supplier_info as $v_supplier)
                                            <option value="{{$v_supplier->id}}">{{$v_supplier->supplier_name}}</option>
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
                                    <label class="form-label">{{ __('Account No') }}</label>
                                    <input id="account_no" type="text" class="form-control" name="account_no" value="{{ old('account_no') }}">
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
        $(document).ready(function() {
            // Calculate the total BDT amount when BDT Rate or Total Ringgit changes
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

            // Clear all form fields when Clear button is clicked
            $('#add_button').on('click', function() {
                $('form')[0].reset();  // Reset form fields
                // Clear all input fields and selects
                $('input[type="text"], input[type="number"], input[type="hidden"], select').val('');

                // Clear the readonly fields (Total BDT Amount and Due Amount)
                $('#total_bdt_amount').val('');
                $('#due_amount').val('');
            });

        });
    </script>
@endsection
