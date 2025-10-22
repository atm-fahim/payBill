<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\CustomerPaymentRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Interfaces\Repo\Backend\PaymentMethodRepo;
use App\Interfaces\Repo\Backend\PaymentOrderRepo;
use App\Interfaces\Repo\Backend\PaymentReportsRepo;
use App\Interfaces\Repo\Backend\RateRepo;
use App\Interfaces\Repo\Backend\SupplierPaymentRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class PaymentReportsController extends BaseController
{
    private $cusRepo;
    private $suppRepo;
    private $rateRepo;
    private $ordPmtRepo;
    private $pmtMtdRepo;
    private $payRptRepo;

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
        PaymentReportsRepo $payRptRepo,
        PaymentMethodRepo $pmtMtdRepo,
    )
    {
        $this->middleware('auth');
        $this->cusRepo = $cusRepo;
        $this->suppRepo = $suppRepo;
        $this->rateRepo = $rateRepo;
        $this->ordPmtRepo = $ordPmtRepo;
        $this->payRptRepo = $payRptRepo;
        $this->pmtMtdRepo = $pmtMtdRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customerReports()
    {
        $userAccessData         = $this->userAccessFunction();
        $customerInfo           = $this->cusRepo->withoutDeletingData();
        $rateInfo               = $this->rateRepo->withoutDeletingData();
        $paymentMethodInfo      = $this->pmtMtdRepo->withoutDeletingData();
        return view('backend.reports.customer_reports')
            ->with('customer_info', $customerInfo)
            ->with('method_info', $paymentMethodInfo)
            ->with('rate_info', $rateInfo)
            ->with('user_access',$userAccessData);
    }


    public function search_customer_data(Request $request)
    {
//        'orgId' => auth()->user()->org_id ?? 1,
//                'branchId' => $request->input('branch_id', auth()->user()->branch_id),
        $userAccessData = $this->userAccessFunction(24);
        $customerInfo           = $this->cusRepo->withoutDeletingData();
        $rateInfo               = $this->rateRepo->withoutDeletingData();
        $paymentMethodInfo      = $this->pmtMtdRepo->withoutDeletingData();
        try {
            $params = [
                'customerId' => $request->input('customer_id'),
                'fromDate' => $request->input('from_date', '0000-00-00'),
                'toDate' => $request->input('to_date', '0000-00-00'),
            ];
            $searchInfo = $this->payRptRepo->paymentCustomerOrderInfo($params);
            return view('backend.reports.customer_reports')
                ->with('customer_info', $customerInfo)
                ->with('method_info', $paymentMethodInfo)
                ->with('rate_info', $rateInfo)
                ->with('user_access',$userAccessData);
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function supplierReports()
    {
        $userAccessData         = $this->userAccessFunction();
        $supplierInfo           = $this->suppRepo->withoutDeletingData();
        $rateInfo               = $this->rateRepo->withoutDeletingData();
        $paymentMethodInfo      = $this->pmtMtdRepo->withoutDeletingData();
        $orderPaymentInfo    = $this->ordPmtRepo->paymentOrderInfo();
        return view('backend.reports.supplier_reports')
            ->with('supplier_info', $supplierInfo)
            ->with('method_info', $paymentMethodInfo)
            ->with('order_info', $orderPaymentInfo)
            ->with('rate_info', $rateInfo)
            ->with('user_access',$userAccessData);
    }


}
