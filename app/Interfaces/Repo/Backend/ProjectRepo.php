<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface ProjectRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
