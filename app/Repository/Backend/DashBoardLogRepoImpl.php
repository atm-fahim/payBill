<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\DashBoardLogRepo;
use App\Models\CourseModel;
use App\Models\Frontend\CourseLogModel;
use App\Models\Frontend\StudentLoginInfo;
use App\Models\LessonModel;
use App\Models\QuizResultModel;

/**
 * Repository implementation of dashboard log report.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-10-16
 */
class DashBoardLogRepoImpl extends EloquentBaseRepository implements DashBoardLogRepo
{
    protected $model;

    public function __construct()
    {

    }
public function totalCourse(){
    return CourseModel::where('status', 1)->count('id');
}
public function totalLesson(){
    return LessonModel::where('status', 1)->count('id');
}
public function totalCourseEnrolled(){
    return CourseLogModel::where('status', 1)->count('id');
}
public function totalFail(){
    return QuizResultModel::where('result_status', 'Fail')->count('id');
}
public function totalPass(){
    return QuizResultModel::where('result_status', 'Pass')->count('id');
}
public function totalFinalExam(){
    return QuizResultModel::where('exam_type', 'final-exam')->count('id');
}
public function totalMockTest(){
    return QuizResultModel::where('exam_type', 'mock-test')->count('id');
}
public function totalStudent(){
    return StudentLoginInfo::where('status', '1')->count('id');
}



}
