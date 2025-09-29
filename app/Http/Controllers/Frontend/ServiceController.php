<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\ServiceRepo;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    private $svcRepo;


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
        ServiceRepo $svcRepo,
    )
    {
        $this->svcRepo      = $svcRepo;
    }

    public function index()
    {
        $serviceInfo            = $this->svcRepo->withoutDeletingData();
        return view('frontend.service')
            ->with('service_info', $serviceInfo);
    }

    public function serviceDetails($slug)
    {
        $service_details = $this->svcRepo->getServiceDetailsBySlug($slug);
        return view('frontend.service_details')
            ->with('service_info',$service_details);
    }


}
