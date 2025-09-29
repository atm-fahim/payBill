<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface ServiceRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function getServiceDetailsBySlug($slug);
}
