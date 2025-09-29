<?php

namespace App\Repository\Frontend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Frontend\CourseRepo;
use App\Models\CourseModel;

use App\Models\Frontend\CourseLogModel;
use App\Models\LessonModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of category for the category model.
 * they are category info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2023-08-27
 */
class CourseRepoImpl extends EloquentBaseRepository implements CourseRepo
{


    protected $model;

    public function __construct(CourseModel $model)
    {
        $this->model = $model;
    }

    public function checkRequestValidity($request): array
    {
        $validStatus = Validator::make($request->all(), [
            'title' => 'required|string',
//            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:200',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function courselimitData($limit){
        return $this->model::select('lms_courses.*','category.category as category_title','users.name as instructor_name')
            ->leftJoin('category','category.id','lms_courses.category_id')
            ->leftJoin('users','users.id','lms_courses.instructor_id')
            ->where('lms_courses.status','<>',9)
            ->orderBy("lms_courses.id","DESC")
            ->take($limit)
            ->get();
    }
    public function courseDetailsById($id){
        return $this->model::select('lms_courses.*','category.category as category_title','users.name as instructor_name')
            ->leftJoin('category','category.id','lms_courses.category_id')
            ->leftJoin('users','users.id','lms_courses.instructor_id')
            ->where('lms_courses.status','<>',9)
            ->where('lms_courses.id',$id)
            ->first();
    }
    public function findByCategoryId($id){
        return $this->model::select('lms_courses.title','lms_courses.id','lms_courses.slug',
            'lms_courses.image','category.category as category_title')
            ->leftJoin('category','category.id','lms_courses.category_id')
            ->where('lms_courses.category_id',$id)
            ->get();
    }
    public function findCourseByLearnerId($lid){
        return $this->model::select('lms_courses.title','lms_courses.id','lms_courses.slug',
            'lms_courses.image','lms_courses.overview')
            ->leftJoin('course_log','lms_courses.id','course_log.course_id')
            ->where('course_log.learner_id',$lid)
            ->get();
    }

    public function courseSearchData($request){
        $value = $request->course_name;
       return DB::table('lms_courses')
            ->select('*')
            ->where(DB::raw('lower(title)'), 'like', '%' . strtolower($value) . '%')
            ->get();
//        return $this->model::whereRaw("UPPER({'title'}) LIKE '%'". strtoupper($value)."'%'");
    }

    public function courseEnrollById($id){
        return CourseLogModel::where('status', 1)->where('course_id',$id)->count('id');
    }

    public function totalLesson($id){
        return LessonModel::where('status', 1)->where('course_id',$id)->count('id');
    }


}
