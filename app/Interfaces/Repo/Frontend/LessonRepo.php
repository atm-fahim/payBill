<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface LessonRepo extends EloquentRepositoryInterface
{
    public function findByCourseId($id);

    public function findByCourseIdAndLessonId($cid, $lid);
    public function findByPreviousLesson($cid,$lid);
    public function findByNextLesson($cid,$lid);
    public function userCourseAndLessonLog($cid,$lid);

}
