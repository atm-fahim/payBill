<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    private $abtRepo;


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct(
        AboutUsRepo         $abtRepo,
    )
    {
        $this->abtRepo = $abtRepo;
    }

    public function index()
    {
        $about_info = $this->abtRepo->withoutDeletingData();
        return view('frontend.about')
            ->with('about_info',$about_info);
    }
    public function missionVision()
    {
        $about_info = $this->abtRepo->withoutDeletingData();
        return view('frontend.mission_vision')
            ->with('about_info',$about_info);
    }

    public function chairmanProfile()
    {
        $about_info = $this->abtRepo->withoutDeletingData();
        return view('frontend.chairman')
            ->with('about_info',$about_info);
    }




}
