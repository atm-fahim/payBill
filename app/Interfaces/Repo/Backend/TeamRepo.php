<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface TeamRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
