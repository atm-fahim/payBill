<?php

namespace App\Repository\Backend;

use App\Interfaces\EloquentBaseRepository;
use App\Interfaces\Repo\Backend\CourseRepo;
use App\Models\CourseModel;
use App\Models\YourDestinationModel;
use Illuminate\Support\Facades\Validator;

/**
 * Repository implementation of branch for the branch model.
 * they are branch info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2025-08-22
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
            'course_name' => 'required|string',
        ]);
        return $validStatus->fails() ? array('isValidationSuccess' => false, 'error' => $validStatus->errors())
            : array('isValidationSuccess' => true);
    }

    public function getCourseDetailsBySlug($slug)
    {
        return $this->model::where('slug', $slug)->first();
    }

    public function getCourseDetails()
    {
        return $this->model::select('courses.*','your_destination.destination_name','universitys.university_name')
            ->leftJoin('your_destination','your_destination.id','courses.destination_id')
            ->leftJoin('universitys','universitys.id','courses.university_id')
            ->where('courses.status', '<>',9)->get();
    }
}
