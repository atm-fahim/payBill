<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface SupplierRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getSupplierInfoById($id);
    
    public function supplierInfoByOrgId($org_id);
}
