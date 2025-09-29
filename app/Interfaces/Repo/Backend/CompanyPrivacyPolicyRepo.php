<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface CompanyPrivacyPolicyRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
