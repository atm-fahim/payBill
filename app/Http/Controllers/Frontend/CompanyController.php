<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Backend\OurCompanyRepo;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    private $cmpRepo;


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
        OurCompanyRepo          $cmpRepo,
    )
    {
        $this->cmpRepo = $cmpRepo;
    }

    public function index()
    {
        $company_info = $this->cmpRepo->withoutDeletingData();
        $slug = $company_info[0]->slug;
        $company_details = $this->cmpRepo->getCompanyInfo($slug);

        return view('frontend.company')
            ->with('company_info',$company_info)
            ->with('slug',$slug)
            ->with('company_details',$company_details);
    }

    public function companyInfo($slug)
    {
        $company_info = $this->cmpRepo->withoutDeletingData();
        $company_details = $this->cmpRepo->getCompanyInfo($slug);
        return view('frontend.company')
            ->with('company_info',$company_info)
            ->with('slug',$slug)
            ->with('company_details',$company_details);
    }



}
