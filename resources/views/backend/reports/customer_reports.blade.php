@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Customer Reports</h5>
            <form id="paymentForm" class="row g-3" method="POST" action="{{ route('customer-payment-save-update') }}" enctype="multipart/form-data">
                @csrf
            <div class="row row-cols-1 g-3 row-cols-lg-auto align-items-center">
                <div class="col">
                    <label class="form-label">{{ __('select Customer') }}</label>
                    <select class="form-control" name="customer_id">
                        <option selected value="0">-- select Customer--</option>
                        @foreach($customer_info as $v_cus)
                            <option value="{{$v_cus->id}}">{{$v_cus->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('Payment') }}</label>
                    <select class="form-control" name="payment">
                        <option selected value="0">-- select Payment--</option>
                        <option value="paid">Paid</option>
                        <option value="due">Due</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('Payment Method') }}</label>
                    <select class="form-control" name="payment_method">
                        <option value="0"> -- Select Payment Method--</option>
                        @foreach($method_info as $v_method)
                            <option value="{{$v_method->id}}">{{$v_method->method_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('From Date') }}</label>
                    <input name="from_date" type="date" class="form-control"  placeholder="Date">
                </div>
                <div class="col">
                    <label class="form-label">{{ __('To Date') }}</label>
                    <input name="to_date" type="date" class="form-control"  placeholder="Date">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary px-4"><i class="fadeIn animated bx bx-search-alt"></i></button>
                </div>
            </div><!--end row-->
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <table  class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>SL</th>
                <th>Customer Name</th>
                <th>Invoice No</th>
                <th>Account No</th>
                <th>BDT Rate</th>
                <th>BDT Amount</th>
                <th>Ringgit Rate</th>
                <th>Ringgit Amount</th>
                <th>Customer Pad Amount</th>
                <th>Customer Due Amount</th>
                <th>Customer Payment Method</th>
            </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
@endsection
