<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface CustomerRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function customerInfoByOrgId($orgId);
}
