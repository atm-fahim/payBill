<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\UniversityRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use App\Interfaces\Repo\Backend\YourDestinationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class UniversityController extends BaseController
{
    private $yrDesRepo;
    private $unvRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        YourDestinationRepo $yrDesRepo,
        UniversityRepo $unvRepo,
    )
    {
        $this->middleware('auth');
        $this->yrDesRepo = $yrDesRepo;
        $this->unvRepo = $unvRepo;
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
        $universityInfo                = $this->unvRepo->getUniversityDetails();
        return view('backend.university.university')
            ->with('destination_info', $destinationInfo)
            ->with('university_info', $universityInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                               = array();
        $validation                         = $this->unvRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                             = $request->input('id');
            $data['destination_id']       = $request->input('destination_id');
            $data['university_name']    = $request->input('university_name');
            $data['university_details']    = $request->input('university_details');
            $data['slug']                   = Str::slug($data['university_name']);
           //======================= about us image ===========
            $university_image1                 = $request->input('university_image1');
            // Handle 'about_image' upload
            $data['university_image']  = $this->handleImageUpload($request, 'university_image', 'university', $university_image1);
           (!empty($id)) ? $this->unvRepo->update($id, $data) : $this->unvRepo->save($data);
            return Redirect::to('add-university');
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
        $upcomingInfo = $this->unvRepo->findById($id);
        echo json_encode($upcomingInfo);
    }

    public function active($id)
    {
        $this->unvRepo->update($id, ['status' => 1]);
        return redirect('add-university');
    }

    public function inActive($id)
    {
        $this->unvRepo->update($id, ['status' => 0]);
        return redirect('add-university');
    }

    public function delete($id)
    {
        $this->unvRepo->update($id, ['status' => 9]);
        return redirect('add-university');
    }
}
