<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\CustomerPaymentRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Interfaces\Repo\Backend\PaymentOrderRepo;
use App\Models\CustomerModel;
use App\Models\CustomerPaymentModel;
use App\Models\PaymentOrderModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of customer  for the customer model.
 * they are customer membership info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-10-11
 */
class PaymentOrderRepoImpl extends EloquentBaseRepository implements PaymentOrderRepo
{


    protected $model;

    public function __construct(PaymentOrderModel $model)
    {
        $this->model = $model;
    }
    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'customer_id' => 'required|integer'
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }



    public function paymentOrderInfo()
    {
        return $this->model::select(
            'supplier.supplier_name',
            'customer.customer_name',
            'payment_order.*',
            'customer_payment.method_name as customer_method_name',
            'supplier_payment.method_name as supplier_method_name'
        )
            ->leftJoin('customer', 'payment_order.customer_id', '=', 'customer.id')
            ->leftJoin('supplier', 'payment_order.supplier_id', '=', 'supplier.id')
            ->leftJoin('payment_method as customer_payment', 'payment_order.customer_payment_method_id', '=', 'customer_payment.id')
            ->leftJoin('payment_method as supplier_payment', 'payment_order.supplier_payment_method_id', '=', 'supplier_payment.id')
            ->where('payment_order.status', '<>', 9)  // Filter the status
            ->get(); // Fetch the data
    }

}
