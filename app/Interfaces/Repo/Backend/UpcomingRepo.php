<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface UpcomingRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
