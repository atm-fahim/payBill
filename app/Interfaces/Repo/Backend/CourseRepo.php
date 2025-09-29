<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface CourseRepo extends EloquentRepositoryInterface{

    public function checkRequestValidity($request);

    public function getCourseDetailsBySlug($slug);

    public function getCourseDetails();
}
