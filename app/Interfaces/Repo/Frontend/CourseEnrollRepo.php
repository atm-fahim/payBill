<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface CourseEnrollRepo extends EloquentRepositoryInterface
{

    public function courselimitData($limit);
    public function courseDetailsById($id);
}
