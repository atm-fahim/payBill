<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface OurClientRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
}
