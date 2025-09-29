<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface BatchRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function getBranchInfo($slug);
}
