<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface YourDestinationRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);

    public function getDestinationDetailsBySlug($slug);
}
