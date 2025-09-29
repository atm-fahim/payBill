<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\CourseEnrollRepo;
use App\Models\CourseModel;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-30
 */
class CourseEnrollRepoImpl extends EloquentBaseRepository implements CourseEnrollRepo
{

    protected $model;
    public function __construct(CourseModel $model)
    {
        $this->model = $model;
    }




    public function courseDetailsById($id){
        return $this->model::select('lms_courses.*','category.category as category_title','users.name as instructor_name')
            ->leftJoin('category','category.id','lms_courses.category_id')
            ->leftJoin('users','users.id','lms_courses.instructor_id')
            ->where('lms_courses.status','<>',9)
            ->where('lms_courses.id',$id)
            ->first();
    }


}
