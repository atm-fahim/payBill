<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\CourseLogRepo;
use App\Models\Frontend\CourseLogModel;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-10-03
 */
class CourseLogRepoImpl extends EloquentBaseRepository implements CourseLogRepo
{

    protected $model;

    public function __construct(CourseLogModel $model)
    {
        $this->model = $model;
    }

    public function findByCourseLogId($cid,$luId){
        return $this->model::where('course_id',$cid)
            ->where('learner_id',$luId)
            ->first();
    }
    public function courseCompleteCountId($luId){
        return $this->model::where('learner_id', $luId)->count('id');
    }
//    public function lessonCompleteCountId($luId){
//        return $this->model::where('learner_id', $luId)->count('id');
//    }
}
