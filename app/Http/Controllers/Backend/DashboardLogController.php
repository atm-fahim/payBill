<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\DashBoardLogRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class DashboardLogController extends BaseController
{
    private $dblRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashBoardLogRepo $dblRepo)
    {
        $this->middleware('auth');
        $this->dblRepo = $dblRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function dashBoardTotalLog()
    {
      $totalCourse                  = $this->dblRepo->totalCourse();
      $totalLesson                  = $this->dblRepo->totalLesson();
      $totalCourseEnrolled          = $this->dblRepo->totalCourseEnrolled();
      $totalFail                    = $this->dblRepo->totalFail();
      $totalPass                    = $this->dblRepo->totalPass();
      $totalFinalExam               = $this->dblRepo->totalFinalExam();
      $totalMockTest                = $this->dblRepo->totalMockTest();
      $totalStudent                 = $this->dblRepo->totalStudent();
      $countData = array(
        'totalCourse'               => $totalCourse,
        'totalLesson'               => $totalLesson,
        'totalCourseEnrolled'       => $totalCourseEnrolled,
        'totalPass'                 => $totalPass,
        'totalFail'                 => $totalFail,
        'totalFailExam'             => $totalFinalExam,
        'totalMockTest'             => $totalMockTest,
        'totalStudent'             => $totalStudent,
      );
      echo json_encode($countData);

    }

}
