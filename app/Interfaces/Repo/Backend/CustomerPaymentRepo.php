<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface CustomerPaymentRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function customerPaymentInfoByOrgId($orgId);
}
