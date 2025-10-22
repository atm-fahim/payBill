<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Backend\PaymentReportsRepo;
use App\Models\BranchModel;
use App\Models\PaymentOrderModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-10-23
 */
class PaymentReportsRepoImpl extends EloquentBaseRepository implements PaymentReportsRepo
{
    protected $model;

    public function __construct(PaymentOrderModel $model)
    {
        $this->model = $model;
    }


    public function paymentCustomerOrderInfo($params)
    {
        return $this->model::select(
            'supplier.supplier_name',
            'customer.customer_name',
            'payment_order.*',
            'payment_method.method_name as customer_method_name',
            'supplier_payment.method_name as supplier_method_name'
        )
            ->leftJoin('customer', 'payment_order.customer_id', '=', 'customer.id')
            ->leftJoin('supplier', 'payment_order.supplier_id', '=', 'supplier.id')
            ->leftJoin('payment_method', 'payment_order.customer_payment_method_id', '=', 'payment_method.id')
            ->leftJoin('payment_method as supplier_payment', 'payment_order.supplier_payment_method_id', '=', 'supplier_payment.id')
            ->where('payment_order.status', '<>', 9)  // Filter the status
            ->get(); // Fetch the data
    }

    public function paymentSupplierOrderInfo($params)
    {
        return $this->model::select(
            'supplier.supplier_name',
            'customer.customer_name',
            'payment_order.*',
            'payment_method.method_name as customer_method_name',
            'supplier_payment.method_name as supplier_method_name'
        )
            ->leftJoin('customer', 'payment_order.customer_id', '=', 'customer.id')
            ->leftJoin('supplier', 'payment_order.supplier_id', '=', 'supplier.id')
            ->leftJoin('payment_method', 'payment_order.customer_payment_method_id', '=', 'payment_method.id')
            ->leftJoin('payment_method as supplier_payment', 'payment_order.supplier_payment_method_id', '=', 'supplier_payment.id')
            ->where('payment_order.status', '<>', 9)  // Filter the status
            ->get(); // Fetch the data
    }

}
