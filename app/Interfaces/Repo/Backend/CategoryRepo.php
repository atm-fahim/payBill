<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface CategoryRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);

    public function getCategory();

    public function getCategoryInfoById($id);
}
