@extends('layouts.app')
@section('content')
    <style>
        .table-custom {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .table-custom thead,
        .table-custom thead tr,
        .table-custom thead th {
            background-color: #4facfe !important;
            background-image: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
            color: #ffffff !important;
            font-weight: 700 !important;
            text-align: center !important;
            vertical-align: middle !important;
            padding: 18px 12px !important;
            border: none !important;
            font-size: 14px !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            box-shadow: 0 4px 12px rgba(79, 172, 254, 0.3) !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2) !important;
            border-bottom: 3px solid #0dcaf0 !important;
        }
        .table-custom tbody td {
            vertical-align: middle;
            padding: 15px 12px;
            font-size: 13px;
            border-bottom: 1px solid #e9ecef;
        }
        .info-label {
            font-weight: 600;
            color: #6c757d;
            display: inline-block;
            min-width: 130px;
            font-size: 12px;
            text-transform: capitalize;
        }
        .info-value {
            color: #212529;
            font-weight: 500;
            font-size: 13px;
        }
        .data-row {
            line-height: 2.2;
            background: #ffffff;
        }
        .table-custom tbody tr {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .table-custom tbody tr:hover {
            background-color: #f0f4ff !important;
            transform: scale(1.01);
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }
        .table-custom tbody tr:active {
            transform: scale(0.99);
        }
        .table-custom tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .action-btn {
            border: none;
            background: #ffffff;
            padding: 8px 10px;
            margin: 0 3px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .action-btn a {
            text-decoration: none;
        }
        .badge-amount {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-paid {
            background-color: #d1f2e8;
            color: #198754;
        }
        .badge-due {
            background-color: #ffe5e5;
            color: #dc3545;
        }
        .invoice-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 12px;
            display: inline-block;
        }
        .sl-number {
            background: #e7f1ff;
            color: #0d6efd;
            font-weight: 700;
            font-size: 14px;
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        @media (max-width: 768px) {
            .info-label {
                min-width: 100px;
                font-size: 11px;
            }
            .info-value {
                font-size: 12px;
            }
        }
    </style>
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if($user_access->is_create==1)
                    <button id="add_button" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"
                            style="float: right;">
                        Add +
                    </button>
                @endif
            </div>
            <hr/>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-custom nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th style="white-space: nowrap;">SL</th>
                            <th style="white-space: nowrap;">Invoice<br>No</th>
                            <th style="white-space: nowrap;">Amount<br>Details</th>
                            <th style="white-space: nowrap;">Customer<br>Details</th>
                            <th style="white-space: nowrap;">Supplier<br>Details</th>
                            <th style="white-space: nowrap;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_info as $value)
                            <tr onclick="edit({{$value->id}})" data-id="{{$value->id}}" title="Click to edit">
                                <td style="text-align: center;">
                                    <span class="sl-number">{{ $loop->iteration }}</span>
                                </td>
                                <td style="text-align: center; white-space: nowrap;">
                                    <span class="invoice-badge">{{ $value->invoice_no }}</span>
                                </td>
                                <td class="data-row">
                                    <span class="info-label">💵 BDT Rate:</span> <span class="info-value">{{ $value->bdt_rate }}</span><br>
                                    <span class="info-label">💵 BDT Amount:</span> <span class="info-value badge-amount" style="background: #e3f2fd; color: #0277bd;">৳ {{ number_format($value->bdt_amount, 2) }}</span><br>
                                    <span class="info-label">💴 Ringgit Rate:</span> <span class="info-value">{{ $value->other_rate }}</span><br>
                                    <span class="info-label">💴 Ringgit Amount:</span> <span class="info-value badge-amount" style="background: #f3e5f5; color: #7b1fa2;">RM {{ number_format($value->other_amount, 2) }}</span>
                                </td>
                                <td class="data-row">
                                    <span class="info-label">👤 Customer Name:</span> <span class="info-value">{{ $value->customer_name }}</span><br>
                                    <span class="info-label">🏦 Account No:</span> <span class="info-value">{{ $value->customer_ac_no }}</span><br>

                                    <span class="info-label">✅ Paid Amount:</span> <span class="info-value badge-amount badge-paid">৳ {{ number_format($value->customer_paid_amount, 2) }}</span><br>
                                    <span class="info-label">⏳ Due Amount:</span> <span class="info-value badge-amount badge-due">৳ {{ number_format($value->customer_due_amount, 2) }}</span><br>
                                    <span class="info-label">💳 Payment Method:</span> <span class="info-value" style="color: #0d6efd;">{{ $value->customer_method_name }}</span>
                                </td>
                                <td class="data-row">
                                    <span class="info-label">🏢 Supplier Name:</span> <span class="info-value">{{ $value->supplier_name }}</span><br>
                                    <span class="info-label">🏦 Account No:</span> <span class="info-value">{{ $value->supplier_ac_no }}</span><br>

                                    <span class="info-label">✅ Paid Amount:</span> <span class="info-value badge-amount badge-paid">৳ {{ number_format($value->supplier_paid_amount, 2) }}</span><br>
                                    <span class="info-label">⏳ Due Amount:</span> <span class="info-value badge-amount badge-due">৳ {{ number_format($value->supplier_due_amount, 2) }}</span><br>
                                    <span class="info-label">💳 Payment Method:</span> <span class="info-value" style="color: #0d6efd;">{{ $value->supplier_method_name }}</span>
                                </td>
                                <td style="text-align: center; white-space: nowrap;" onclick="event.stopPropagation();">
                                @if($user_access->is_edit==1)
                                    <button class="action-btn" onclick="edit({{$value->id}}); event.stopPropagation();" title="Edit">
                                        <i class="fadeIn animated bx bx-edit-alt" data-feather="edit" style="color: #0d6efd;"></i>
                                    </button>
                                @endif
                                @if($user_access->is_delete==1)
                                    <button class="action-btn" title="Delete" onclick="event.stopPropagation();">
                                        <a href="{{route('payment-order-delete',$value->id)}}">
                                            <i class="fadeIn animated bx bx-trash-alt" data-feather="trash-2" style="color: #dc3545;"></i>
                                        </a>
                                    </button>
                                @endif
                                @if($value->status==1 && $user_access->is_approved==1)
                                    <button class="action-btn" title="Deactivate" onclick="event.stopPropagation();">
                                        <a href="{{route('payment-order-in-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-check" data-feather="check-square" style="color: #198754;"></i>
                                        </a>
                                    </button>
                                @elseif($user_access->is_approved==1)
                                    <button class="action-btn" title="Activate" onclick="event.stopPropagation();">
                                        <a href="{{route('payment-order-active',$value->id)}}">
                                            <i class="fadeIn animated bx bx-comment-x" data-feather="x-square" style="color: #ffc107;"></i>
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
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Payment Order Information') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="paymentOrderForm" class="row g-3" method="POST" action="{{ route('payment-order-save-update') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" class="id" value="">
                                <input name="invoice_no" type="hidden" class="invoice_no" value="">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('BDT Rate') }}</label>
                                    <select class="form-control bdt_rate" name="bdt_rate">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($rate_info as $v_rate)
                                            <option value="{{$v_rate->bdt_rate}}">{{$v_rate->bdt_rate}}</option>
                                        @endforeach
                                    </select>
                               </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Ringgit Rate') }}</label>
                                    <select class="form-control other_rate" name="other_rate">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($rate_info as $v_rate)
                                            <option value="{{$v_rate->other_rate}}">{{$v_rate->other_rate}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="input2" class="form-label">{{ __('Total Ringgit') }}</label>
                                    <input type="text" id="total_other_amount" class="form-control" name="total_other_amount" placeholder="Total Ringgit">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Total BDT Amount') }}</label>
                                    <input id="total_bdt_amount" type="text" class="form-control" name="total_bdt_amount" value="{{ old('total_bdt_amount') }}" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">{{ __('Select Customer') }}</label>
                                    <select class="form-control customer_id" name="customer_id">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($customer_info as $v_cus)
                                            <option value="{{$v_cus->id}}">{{$v_cus->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">{{ __('Select Supplier') }}</label>
                                    <select class="form-control supplier_id" name="supplier_id">
                                        <option selected value="0">-- select any one--</option>
                                        @foreach($supplier_info as $v_supplier)
                                            <option value="{{$v_supplier->id}}">{{$v_supplier->supplier_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Customer Paid Amount') }}</label>
                                    <input id="customer_paid_amount" type="text" class="form-control" name="customer_paid_amount" value="{{ old('paid_amount') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Supplier Paid Amount') }}</label>
                                    <input id="supplier_paid_amount" type="text" class="form-control" name="supplier_paid_amount" value="{{ old('paid_amount') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Customer Due Amount') }}</label>
                                    <input id="customer_due_amount" type="text" class="form-control" name="customer_due_amount" value="{{ old('due_amount') }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Supplier Due Amount') }}</label>
                                    <input id="supplier_due_amount" type="text" class="form-control" name="supplier_due_amount" value="{{ old('due_amount') }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Customer Payment Method') }}</label>
                                    <select class="form-control customer_payment_method" name="customer_payment_method">
                                        <option value="0"> -- select any one--</option>
                                        @foreach($method_info as $v_method)
                                            <option value="{{$v_method->id}}">{{$v_method->method_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Supplier Payment Method') }}</label>
                                    <select class="form-control supplier_payment_method" name="supplier_payment_method">
                                        <option value="0"> -- select any one--</option>
                                        @foreach($method_info as $v_method)
                                            <option value="{{$v_method->id}}">{{$v_method->method_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Customer Account/Mobile No') }}</label>
                                    <input id="customer_account_no" type="text" class="form-control" name="customer_account_no" value="{{ old('account_no') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Supplier Account/Mobile No') }}</label>
                                    <input id="supplier_account_no" type="text" class="form-control" name="supplier_account_no" value="{{ old('account_no') }}">
                                </div>
                                <div class="row mb-0">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary submit"> {{ __('Save') }}</button>
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
            $('#paymentOrderForm').on('submit', function(e) {
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
                            alert(response.message);
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


        });
        $(document).ready(function() {
            // Function to calculate amounts based on inputs
            function calculateAmounts() {
                var totalOtherAmount = parseFloat($('#total_other_amount').val()) || 0; // Get total_other_amount value
                var bdtRateId = $('select[name="bdt_rate"]').val(); // Get selected BDT rate ID

                // Get the selected BDT rate value
                var bdtRate = 0;
                $('select[name="bdt_rate"] option').each(function() {
                    if ($(this).val() == bdtRateId) {
                        bdtRate = parseFloat($(this).text()) || 0;
                    }
                });

                if (bdtRate > 0) {
                    // Calculate total BDT amount
                    var totalBdtAmount = totalOtherAmount * bdtRate;
                    $('#total_bdt_amount').val(totalBdtAmount.toFixed(2)); // Update total_bdt_amount

                    // Get the customer and supplier paid amounts
                    var customerPaidAmount = parseFloat($('#customer_paid_amount').val()) || 0;
                    var supplierPaidAmount = parseFloat($('#supplier_paid_amount').val()) || 0;

                    // Calculate customer and supplier due amounts
                    var customerDueAmount = totalBdtAmount - customerPaidAmount;
                    var supplierDueAmount = totalBdtAmount - supplierPaidAmount;

                    // Update customer and supplier due amounts
                    $('#customer_due_amount').val(customerDueAmount.toFixed(2));
                    $('#supplier_due_amount').val(supplierDueAmount.toFixed(2));
                }
            }

            // Event listener for changes in the total_other_amount input
            $('#total_other_amount').on('input', function() {
                calculateAmounts(); // Recalculate when total_other_amount changes
            });

            // Event listener for changes in the customer_paid_amount and supplier_paid_amount inputs
            $('#customer_paid_amount, #supplier_paid_amount').on('input', function() {
                calculateAmounts(); // Recalculate when paid amounts change
            });

            // Event listener for changes in the BDT rate selection
            $('select[name="bdt_rate"]').on('change', function() {
                calculateAmounts(); // Recalculate when the BDT rate changes
            });
        });


            function edit(id) {
            $.ajax({
                url: "<?= URL::to('/payment-order-edit'); ?>/" + id,
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                    $("#exampleExtraLargeModal").modal("show");
                    $(".id").val(response.id);
                    $(".bdt_rate").val(response.bdt_rate);
                    $(".other_rate").val(response.other_rate);
                    $(".customer_id").val(response.customer_id);
                    $(".supplier_payment_method").val(response.supplier_payment_method_id);
                    $(".customer_payment_method").val(response.customer_payment_method_id);
                    $(".invoice_no").val(response.invoice_no);
                    $("#customer_paid_amount").val(response.customer_paid_amount);
                    $("#customer_due_amount").val(response.customer_due_amount);
                    $("#customer_account_no").val(response.customer_ac_no);
                    $("#supplier_paid_amount").val(response.supplier_paid_amount);
                    $("#supplier_due_amount").val(response.supplier_due_amount);
                    $("#supplier_account_no").val(response.supplier_ac_no);
                    $(".supplier_id").val(response.supplier_id);
                    $("#total_other_amount").val(response.other_amount);
                    $("#total_bdt_amount").val(response.bdt_amount);
                    if (response.id) {
                        $('.submit').text("Update");
                        $('#exampleModalLabel').text("Update Payment Method");
                    }

                }
            });
        }
    </script>

    </script>
@endsection
