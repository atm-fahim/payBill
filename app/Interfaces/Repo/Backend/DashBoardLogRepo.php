<?php

namespace App\Interfaces\Repo\Backend;

use App\Interfaces\EloquentRepositoryInterface;

interface DashBoardLogRepo extends EloquentRepositoryInterface{
public function totalCourse();
public function totalLesson();
public function totalCourseEnrolled();
public function totalFail();
public function totalPass();
public function totalFinalExam();
public function totalMockTest();
public function totalStudent();
}
