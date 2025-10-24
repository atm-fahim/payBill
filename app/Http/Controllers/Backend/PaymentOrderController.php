<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\CustomerPaymentRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Interfaces\Repo\Backend\PaymentMethodRepo;
use App\Interfaces\Repo\Backend\PaymentOrderRepo;
use App\Interfaces\Repo\Backend\RateRepo;
use App\Interfaces\Repo\Backend\SupplierPaymentRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class PaymentOrderController extends BaseController
{
    private $cusRepo;
    private $suppRepo;
    private $rateRepo;
    private $ordPmtRepo;
    private $pmtMtdRepo;

    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CustomerRepo $cusRepo,
        SupplierRepo $suppRepo,
        RateRepo $rateRepo,
        PaymentOrderRepo $ordPmtRepo,
        PaymentMethodRepo $pmtMtdRepo,
    )
    {
        $this->middleware('auth');
        $this->cusRepo = $cusRepo;
        $this->suppRepo = $suppRepo;
        $this->rateRepo = $rateRepo;
        $this->ordPmtRepo = $ordPmtRepo;
        $this->pmtMtdRepo = $pmtMtdRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $customerInfo           = $this->cusRepo->withoutDeletingData();
        $supplierInfo           = $this->suppRepo->withoutDeletingData();
//        $rateBdtInfo               = $this->rateRepo->getRateInfoByCurrency('BDT');
        $rateInfo               = $this->rateRepo->withoutDeletingData();
        $paymentMethodInfo      = $this->pmtMtdRepo->withoutDeletingData();
        $orderPaymentInfo    = $this->ordPmtRepo->paymentOrderInfo();
        return view('backend.order.order_payment')
            ->with('customer_info', $customerInfo)
            ->with('supplier_info', $supplierInfo)
            ->with('method_info', $paymentMethodInfo)
            ->with('order_info', $orderPaymentInfo)
            ->with('rate_info', $rateInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
       // dd($request->all());
        $data = array();
        $validation = $this->ordPmtRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                             = $request->input('id');
            $data['customer_id']            = $request->input('customer_id');
            $data['supplier_id']            = $request->input('supplier_id');
            $data['other_rate']               = $request->input('other_rate')??0.00;
            $data['other_amount']           = $request->input('total_other_amount')??0.00;
            $data['bdt_rate']               = $request->input('bdt_rate')??0.00;
            $data['bdt_amount']             = $request->input('total_bdt_amount')??0.00;
            $data['customer_paid_amount']   = $request->input('customer_paid_amount')??0.00;
            $data['customer_due_amount']    = $request->input('customer_due_amount')??0.00;
            $data['customer_payment_method_id'] = $request->input('customer_payment_method');
            $data['customer_due_pay_amount']    = $request->input('customer_due_pay_amount')??0.00;
            $data['customer_ac_no']             = $request->input('customer_account_no');
            $data['supplier_paid_amount']       = $request->input('supplier_paid_amount')??0.00;
            $data['supplier_due_amount']        = $request->input('supplier_due_amount')??0.00;
            $data['supplier_due_pay_amount']    = $request->input('supplier_due_pay_amount')??0.00;
            $data['supplier_ac_no']             = $request->input('supplier_account_no');
            $data['supplier_payment_method_id'] = $request->input('supplier_payment_method');

            $data['invoice_no']                 = $this->random_token();
            $data['branch_id']                  = auth()->user()->branch_id;
            (!empty($id)) ? $this->ordPmtRepo->update($id, $data) : $this->ordPmtRepo->save($data);
            return response()->json([
                'status'    => 'success',
                'message'   => 'Payment has been successfully saved.',
                'redirect_url' => route('payment-order') // Example URL you want to redirect to
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
        $supplierData = $this->ordPmtRepo->findById($id);
        echo json_encode($supplierData);
    }

    public function active($id)
    {
        $this->ordPmtRepo->update($id, ['status' => 1]);
        return redirect('payment-order');
    }

    public function inActive($id)
    {
        $this->ordPmtRepo->update($id, ['status' => 0]);
        return redirect('payment-order');
    }

    public function delete($id)
    {
        $this->ordPmtRepo->update($id, ['status' => 9]);
        return redirect('payment-order');
    }
}
