<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface SliderRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getSliderInfoById($id);
    public function getSliderInfo();
}
