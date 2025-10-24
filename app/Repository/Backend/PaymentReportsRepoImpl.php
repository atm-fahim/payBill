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
        if(!empty($params)) {
            // Start with the basic query
            $query = $this->model::select(
                'customer.customer_name',
                'payment_order.*',
                'payment_method.method_name as customer_method_name',
            )
                ->leftJoin('customer', 'payment_order.customer_id', '=', 'customer.id')
                ->leftJoin('payment_method', 'payment_order.customer_payment_method_id', '=', 'payment_method.id')
                ->where('payment_order.status', '<>', 9); // Exclude status 9 from all queries

            // Apply filters based on parameters
            // Only filter by customer if a valid customer ID is provided (not null and not 0)
            if (isset($params['customerId']) && $params['customerId'] > 0) {
                $query->where('payment_order.customer_id', $params['customerId']);
            }

            if (!empty($params['fromDate']) && !empty($params['toDate'])) {
                $query->whereDate('payment_order.created_at', '>=', $params['fromDate'])
                    ->whereDate('payment_order.created_at', '<=', $params['toDate']);
            }

            // Handle the payment status filter
            if (!empty($params['payment'])) {
                $paymentCondition = $params['payment'] == 'paid' ? 0 : '>';
                $query->where('payment_order.customer_due_amount', $paymentCondition, 0);
            }

            // Handle the payment method filter
            if (!empty($params['payment_method'])) {
                $query->where('payment_order.customer_payment_method_id', $params['payment_method']);
            }

            // Execute the query and return the results
            return $query->get();
        }
    }





    public function paymentSupplierOrderInfo($params)
    {
        if(!empty($params)) {
            $query = $this->model::select(
                'supplier.supplier_name',
                'payment_order.*',
                'payment_method.method_name as supplier_method_name',
            )
                ->leftJoin('supplier', 'payment_order.supplier_id', '=', 'supplier.id')
                ->leftJoin('payment_method', 'payment_order.supplier_payment_method_id', '=', 'payment_method.id')
                ->where('payment_order.status', '<>', 9); // Exclude status 9 from all queries

            // Apply filters based on parameters
            // Only filter by supplier if a valid supplier ID is provided (not null and not 0)
            if (isset($params['supplierId']) && $params['supplierId'] > 0) {
                $query->where('payment_order.supplier_id', $params['supplierId']);
            }

            if (!empty($params['fromDate']) && !empty($params['toDate'])) {
                $query->whereDate('payment_order.created_at', '>=', $params['fromDate'])
                    ->whereDate('payment_order.created_at', '<=', $params['toDate']);
            }

            // Handle the payment status filter
            if (!empty($params['payment'])) {
                $paymentCondition = $params['payment'] == 'paid' ? 0 : '>';
                $query->where('payment_order.supplier_due_amount', $paymentCondition, 0);
            }

            // Handle the payment method filter
            if (!empty($params['payment_method'])) {
                $query->where('payment_order.supplier_payment_method_id', $params['payment_method']);
            }

            // Execute the query and return the results
            return $query->get();
        }
    }

}
