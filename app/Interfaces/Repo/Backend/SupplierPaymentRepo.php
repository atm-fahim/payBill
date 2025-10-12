<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface SupplierPaymentRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getSupplierPaymentInfoById($id);

    public function supplierPaymentInfoByOrgId($org_id);
    public function supplierPaymentInfo();
}
