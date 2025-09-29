<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class OurClientController extends BaseController
{
    private $ocRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UpcomingRepo $ocRepo)
    {
        $this->middleware('auth');
        $this->ocRepo = $ocRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $upcomingInfo                = $this->ocRepo->withoutDeletingData();
        return view('backend.upcoming.upcoming')->with('upcoming_info', $upcomingInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                           = array();
        $validation                     = $this->ocRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['upcoming_title']           = $request->input('upcoming_title');
            $data['upcoming_details']            = $request->input('upcoming_details');

           //======================= about us image ===========
            $upcoming_image1                 = $request->input('upcoming_image1');
            // Handle 'about_image' upload
            $data['upcoming_image'] = $this->handleImageUpload($request, 'upcoming_image', 'upcoming_image', $upcoming_image1);
           (!empty($id)) ? $this->ocRepo->update($id, $data) : $this->ocRepo->save($data);
            return Redirect::to('upcoming-project');
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
        $upcomingInfo = $this->ocRepo->findById($id);
        echo json_encode($upcomingInfo);
    }

    public function active($id)
    {
        $this->ocRepo->update($id, ['status' => 1]);
        return redirect('upcoming-project');
    }

    public function inActive($id)
    {
        $this->ocRepo->update($id, ['status' => 0]);
        return redirect('upcoming-project');
    }

    public function delete($id)
    {
        $this->ocRepo->update($id, ['status' => 9]);
        return redirect('upcoming');
    }
}
