<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface FaqRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
