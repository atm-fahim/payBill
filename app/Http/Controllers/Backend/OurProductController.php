<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class OurProductController extends BaseController
{
    private $opRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OurProductRepo $opRepo)
    {
        $this->middleware('auth');
        $this->opRepo = $opRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $productInfo                = $this->opRepo->withoutDeletingData();
        return view('backend.product.product')->with('product_info', $productInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                           = array();
        $validation                     = $this->opRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['product_name']           = $request->input('product_name');
            $data['product_details']            = $request->input('product_details');
            $data['slug']            = Str::slug($data['product_name']);
           //======================= about us image ===========
            $product_image1                 = $request->input('product_image1');
            // Handle 'about_image' upload
            $data['product_image'] = $this->handleImageUpload($request, 'product_image', 'product_image', $product_image1);
           (!empty($id)) ? $this->opRepo->update($id, $data) : $this->opRepo->save($data);
            return Redirect::to('our-product');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function handleImageUpload(Request $request, $fieldName, $folderName, $defaultImage)
    {
        $image = $request->file($fieldName);

        if (isset($image)) {
            // If image is uploaded, process it
            $imgPutPath = public_path("uploads/{$folderName}/");
            $imgReadPath = "uploads/{$folderName}";

            return $this->displayImage($imgPutPath, $image, $imgReadPath);
        } else {
            // If no image is uploaded, return the default image
            return $defaultImage;
        }
    }
    public function edit($id)
    {
        $upcomingInfo = $this->opRepo->findById($id);
        echo json_encode($upcomingInfo);
    }

    public function active($id)
    {
        $this->opRepo->update($id, ['status' => 1]);
        return redirect('our-product');
    }

    public function inActive($id)
    {
        $this->opRepo->update($id, ['status' => 0]);
        return redirect('our-product');
    }

    public function delete($id)
    {
        $this->opRepo->update($id, ['status' => 9]);
        return redirect('our-product');
    }
}
