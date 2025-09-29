<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\LessonRepo;
use App\Models\LessonModel;
use Illuminate\Support\Facades\Session;


/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-31
 */
class LessonRepoImpl extends EloquentBaseRepository implements LessonRepo
{

    protected $model;
    public function __construct(LessonModel $model)
    {
        $this->model = $model;
    }

    public function findByCourseId($id)
    {
        return $this->model::select('lms_lesson.*')
            ->where('lms_lesson.course_id', $id)
            ->orderBy('lms_lesson.id', 'ASC')
            ->get();
    }

    public function findByCourseIdAndLessonId($cid, $lid)
    {
        return $this->model::select('lms_lesson.*')
            ->where('lms_lesson.course_id', $cid)
            ->where('lms_lesson.id', $lid)
            ->orderBy('lms_lesson.id', 'ASC')
            ->get();
    }

    public function userCourseAndLessonLog($cid,$lid){
        $student_id = student()->student_id;
        $sessionId = Session::getId();
        return 0;
    }

    public function findByPreviousLesson($cid,$lid)
    {
        return $this->model::select('lms_lesson.id')
//            ->where('lms_lesson.id', $lid)
            ->where('id', '<', $lid)
            ->where('lms_lesson.course_id', $cid)
            ->max('id');
    }

    public function findByNextLesson($cid,$lid)
    {
        return $this->model::select('lms_lesson.id')
            ->where('lms_lesson.course_id', $cid)
            ->where('id', '>', $lid)
            ->min('id');
    }

}
