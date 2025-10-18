<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\CustomerPaymentRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Interfaces\Repo\Backend\PaymentMethodRepo;
use App\Interfaces\Repo\Backend\SupplierPaymentRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class CustomerPaymentController extends BaseController
{
    private $cusRepo;
    private $cusPmtRepo;
    private $pmtMtdRepo;

    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CustomerRepo $cusRepo,
        CustomerPaymentRepo $cusPmtRepo,
        PaymentMethodRepo $pmtMtdRepo,
    )
    {
        $this->middleware('auth');
        $this->cusRepo = $cusRepo;
        $this->cusPmtRepo = $cusPmtRepo;
        $this->pmtMtdRepo = $pmtMtdRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $customerInfo = $this->cusRepo->withoutDeletingData();
        $paymentMethodInfo = $this->pmtMtdRepo->withoutDeletingData();
        $customerPaymentInfo = $this->cusPmtRepo->customerPaymentInfo();
        return view('backend.customer.customer_payment')
            ->with('customer_info', $customerInfo)
            ->with('method_info', $paymentMethodInfo)
            ->with('customer_payment_info', $customerPaymentInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->cusPmtRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $data['customer_id']  = $request->input('customer_id');
            $data['other_amount']  = $request->input('total_other_amount');
            $data['bdt_rate']  = $request->input('bdt_rat');
            $data['bdt_amount']  = $request->input('total_bdt_amount');
            $data['paid_amount']  = $request->input('paid_amount');
            $data['due_amount']  = $request->input('due_amount');
            $data['payment_method_id']  = $request->input('payment_method');
            $data['ac_no']  = $request->input('account_no');
            $data['invoice_no']  = $this->random_token();
            $data['branch_id']      = auth()->user()->branch_id;

           // $data['code']           = (!empty($code))?$code:$this->generateRandomString($data['supplier_name']);
            (!empty($id)) ? $this->cusPmtRepo->update($id, $data) : $this->cusPmtRepo->save($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Payment has been successfully saved.',
                'redirect_url' => route('customer-payment') // Example URL you want to redirect to
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
        $supplierData = $this->suppRepo->findById($id);
        echo json_encode($supplierData);
    }

    public function active($id)
    {
        $this->spPmtRepo->update($id, ['status' => 1]);
        return redirect('supplier-payment');
    }

    public function inActive($id)
    {
        $this->spPmtRepo->update($id, ['status' => 0]);
        return redirect('supplier-payment');
    }

    public function delete($id)
    {
        $this->spPmtRepo->update($id, ['status' => 9]);
        return redirect('supplier-payment');
    }
}
