<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface CourseRepo extends EloquentRepositoryInterface
{
    public function checkRequestValidity($request);
    public function courselimitData($limit);
    public function courseSearchData($request);
    public function courseDetailsById($id);
    public function findByCategoryId($id);
    public function courseEnrollById($id);
    public function totalLesson($id);

    public function findCourseByLearnerId($lid);
}
