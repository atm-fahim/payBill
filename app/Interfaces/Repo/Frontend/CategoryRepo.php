<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface CategoryRepo extends EloquentRepositoryInterface
{

    public function getCategory();

}
