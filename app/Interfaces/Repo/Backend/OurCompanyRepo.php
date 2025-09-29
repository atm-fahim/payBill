<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface OurCompanyRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function getCompanyInfo($slug);
}
