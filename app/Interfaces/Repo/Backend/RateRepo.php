<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface RateRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getRateInfoById($id);
}
