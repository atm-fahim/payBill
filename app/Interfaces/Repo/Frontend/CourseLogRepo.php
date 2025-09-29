<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface CourseLogRepo extends EloquentRepositoryInterface
{
public function findByCourseLogId($cid,$luId);
public function courseCompleteCountId($luId);
//public function lessonCompleteCountId($luId);
}
