<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\AssessmentExamSetRepo;
use App\Interfaces\Repo\Backend\AssessmentQuizResultRepo;
use App\Interfaces\Repo\Backend\AssignExamRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Backend\ContactUsRepo;
use App\Interfaces\Repo\Backend\FaqRepo;
use App\Interfaces\Repo\Frontend\StudentUserRepo;
use App\Traits\CommonTraits;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    use AuthenticatesUsers;
    use FileUploadTraits;
    use UserAccessTraits;
    use CommonTraits;
    private $brRepo;
    private $cntRepo;


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
        ContactUsRepo          $cntRepo,
        BranchRepo          $brRepo,

    )
    {
        $this->cntRepo = $cntRepo;
        $this->brRepo = $brRepo;

    }

    public function contactInfo()
    {
        $contactUsInfo = $this->cntRepo->withoutDeletingData();
        $branchInfo = $this->brRepo->withoutDeletingData();

        return view('frontend.contact')
            ->with('branch_info',$branchInfo)
            ->with('contact_info',$contactUsInfo);
    }



}
