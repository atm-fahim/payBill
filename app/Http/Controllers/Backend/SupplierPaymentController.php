<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\PaymentMethodRepo;
use App\Interfaces\Repo\Backend\SupplierPaymentRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class SupplierPaymentController extends BaseController
{
    private $suppRepo;
    private $spPmtRepo;
    private $pmtMtdRepo;

    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SupplierRepo $suppRepo,
        SupplierPaymentRepo $spPmtRepo,
        PaymentMethodRepo $pmtMtdRepo,
    )
    {
        $this->middleware('auth');
        $this->suppRepo = $suppRepo;
        $this->spPmtRepo = $spPmtRepo;
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
        $supplierInfo = $this->suppRepo->withoutDeletingData();
        $paymentMethodInfo = $this->pmtMtdRepo->withoutDeletingData();
        $supplierPaymentInfo = $this->spPmtRepo->supplierPaymentInfo();
        return view('backend.supplier.supplier_payment')
            ->with('supplier_info', $supplierInfo)
            ->with('method_info', $paymentMethodInfo)
            ->with('supplier_payment_info', $supplierPaymentInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {

        $data = array();
        $validation = $this->spPmtRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $code                   = $request->input('code');
            $data['supplier_name']  = $request->input('supplier_name');
            $data['branch_id']      = auth()->user()->branch_id;
            $data['address']        = $request->input('address');
            $data['phone_number']   = $request->input('phone_number');
            $data['slug']           = Str::slug($data['supplier_name']);
            $data['code']           = (!empty($code))?$code:$this->generateRandomString($data['supplier_name']);
            (!empty($id)) ? $this->spPmtRepo->update($id, $data) : $this->spPmtRepo->save($data);
            return Redirect::to('supplier-payment');
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
