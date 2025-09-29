<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface DiscountOfferingRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
