<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\BranchRepo;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    private $brRepo;


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
        BranchRepo          $brRepo,
    )
    {
        $this->brRepo = $brRepo;
    }

    public function index()
    {
        $branch_info = $this->brRepo->withoutDeletingData();
        $slug = $branch_info[0]->slug;
        $branch_details = $this->brRepo->getBranchInfo($slug);

        return view('frontend.branch')
            ->with('branch_info',$branch_info)
            ->with('slug',$slug)
            ->with('branch_details',$branch_details);
    }

    public function branchInfo($slug)
    {
        $branch_info = $this->brRepo->withoutDeletingData();
        $branch_details = $this->brRepo->getBranchInfo($slug);
        return view('frontend.branch')
            ->with('branch_info',$branch_info)
            ->with('slug',$slug)
            ->with('branch_details',$branch_details);
    }



}
