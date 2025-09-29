<?php

namespace App\Interfaces\Repo\Frontend;

use App\Interfaces\EloquentRepositoryInterface;

interface LearnerLogRepo extends EloquentRepositoryInterface
{
public function findByLessonSessionId($cid,$sessionId,$luId);
}
