<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface DesignationRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
