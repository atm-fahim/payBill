<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface DiscountOfferLabelRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
