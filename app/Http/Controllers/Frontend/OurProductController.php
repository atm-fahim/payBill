<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use Illuminate\Support\Facades\DB;

class OurProductController extends Controller
{
    private $prdRepo;


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
        OurProductRepo $prdRepo,
    )
    {
        $this->prdRepo      = $prdRepo;
    }

    public function index()
    {
        $productInfo            = $this->prdRepo->withoutDeletingData();
        return view('frontend.product')
            ->with('product_info', $productInfo);
    }

    public function productDetails($slug)
    {
        $product_details = $this->prdRepo->getProductDetailsBySlug($slug);
        return view('frontend.product_details')
            ->with('product_info',$product_details);
    }


}
