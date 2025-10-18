<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\CustomerPaymentRepo;
use App\Interfaces\Repo\Backend\CustomerRepo;
use App\Models\CustomerModel;
use App\Models\CustomerPaymentModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of customer  for the customer model.
 * they are customer membership info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-10-11
 */
class CustomerPaymentRepoImpl extends EloquentBaseRepository implements CustomerPaymentRepo
{


    protected $model;

    public function __construct(CustomerPaymentModel $model)
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

    public function customerPaymentInfoByOrgId($orgId)
    {
        if(auth()->user()->user_types=='super-admin'):
            return $this->model::where('org_id', $orgId)->where('status', '<>', 9)->get();
        else:
            return $this->model::where('org_id', $orgId)->where('branch_id', auth()->user()->branch_id)->where('status', '<>', 9)->get();
        endif;

    }

    public function customerPaymentInfo()
    {
        return $this->model::select('customer.customer_name','payment_method.method_name','customer_payment.*')
            ->leftJoin('customer','customer_payment.customer_id','customer.id')
            ->leftJoin('payment_method','customer_payment.payment_method_id','payment_method.id')
            ->where('customer_payment.status', '<>', 9)->get();
    }
}
