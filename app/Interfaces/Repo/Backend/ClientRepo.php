<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface ClientRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
