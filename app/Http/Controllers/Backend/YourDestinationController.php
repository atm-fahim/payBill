<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use App\Interfaces\Repo\Backend\YourDestinationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class YourDestinationController extends BaseController
{
    private $yrDesRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(YourDestinationRepo $yrDesRepo)
    {
        $this->middleware('auth');
        $this->yrDesRepo = $yrDesRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $destinationInfo                = $this->yrDesRepo->withoutDeletingData();
        return view('backend.destination.destination')->with('destination_info', $destinationInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                               = array();
        $validation                         = $this->yrDesRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                             = $request->input('id');
            $data['destination_name']       = $request->input('destination_name');
            $data['destination_details']    = $request->input('destination_details');
            $data['slug']                   = Str::slug($data['destination_name']);
           //======================= about us image ===========
            $destination_image1                 = $request->input('destination_map_image1');
            // Handle 'about_image' upload
            $data['destination_map_image']  = $this->handleImageUpload($request, 'destination_map_image', 'destination_image', $destination_image1);
           (!empty($id)) ? $this->yrDesRepo->update($id, $data) : $this->yrDesRepo->save($data);
            return Redirect::to('your-destination');
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
        $upcomingInfo = $this->yrDesRepo->findById($id);
        echo json_encode($upcomingInfo);
    }

    public function active($id)
    {
        $this->yrDesRepo->update($id, ['status' => 1]);
        return redirect('your-destination');
    }

    public function inActive($id)
    {
        $this->yrDesRepo->update($id, ['status' => 0]);
        return redirect('your-destination');
    }

    public function delete($id)
    {
        $this->yrDesRepo->update($id, ['status' => 9]);
        return redirect('your-destination');
    }
}
