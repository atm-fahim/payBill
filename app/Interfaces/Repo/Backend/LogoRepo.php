<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface LogoRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getLogoInfoById($id);
    public function getLogoInfo();
}
