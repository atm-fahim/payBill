<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface AboutUsRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);

    public function getAboutInfo();
}
