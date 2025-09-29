<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface ContactUsRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function contactInformation();
}
