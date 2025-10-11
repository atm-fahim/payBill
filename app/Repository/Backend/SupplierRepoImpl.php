<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\SupplierRepo;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of supplier for the supplier model.
 * they are supplier info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-01-27
 */
class SupplierRepoImpl extends EloquentBaseRepository implements SupplierRepo
{


    protected $model;

    public function __construct(SupplierModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'supplier_name' => 'required|string',
            'address' => 'required|string',
//            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:200',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getSupplierInfoById($id)
    {
        return $this->model::where('id', $id)->first();
    }
    public function supplierInfoByOrgId($orgId)
    {
        return $this->model::where('org_id', $orgId)->where('status', '<>', 9)->get();
    }
}
