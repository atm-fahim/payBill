<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface StudentUserRepo extends EloquentRepositoryInterface{
    public function checkRequestValidity($request);
    public function instructorInfo();
    public function existUserInfo($email);
}
