<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\SupplierPaymentRepo;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Models\SupplierModel;
use App\Models\SupplierPaymentModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of supplier for the supplier model.
 * they are supplier info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-01-27
 */
class SupplierPaymentRepoImpl extends EloquentBaseRepository implements SupplierPaymentRepo
{


    protected $model;

    public function __construct(SupplierPaymentModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'total_amount' => 'required|string'
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getSupplierPaymentInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function supplierPaymentInfoByOrgId($orgId)
    {
        return $this->model::where('org_id', $orgId)->where('status', '<>', 9)->get();
    }
    public function supplierPaymentInfo()
    {
        return $this->model::select('supplier.supplier_name','payment_method.method_name','supplier_payment.*')
            ->leftJoin('supplier','supplier_payment.supplier_id','supplier.id')
            ->leftJoin('payment_method','supplier_payment.payment_method_id','payment_method.id')
            ->where('supplier_payment.status', '<>', 9)->get();
    }
}
