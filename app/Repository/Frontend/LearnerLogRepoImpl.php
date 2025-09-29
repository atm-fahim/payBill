<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\LearnerLogRepo;
use App\Models\Frontend\LearnerLogModel;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-09-18
 */
class LearnerLogRepoImpl extends EloquentBaseRepository implements LearnerLogRepo
{

    protected $model;

    public function __construct(LearnerLogModel $model)
    {
        $this->model = $model;
    }

    public function findByLessonSessionId($cid,$sessionId,$luId){
        return $this->model::where('course_id',$cid)
            ->where('session_id',$sessionId)
            ->where('learner_id',$luId)
            ->first();
    }
}
