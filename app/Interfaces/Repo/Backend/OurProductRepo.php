<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface OurProductRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function getProductDetailsBySlug($slug);
}
