<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\OrganizationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class AboutUsController extends BaseController
{
    private $abtRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AboutUsRepo $abtRepo)
    {
        $this->middleware('auth');
        $this->abtRepo = $abtRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $aboutInfo                = $this->abtRepo->getAboutInfo();
        return view('backend.about.about_us')->with('about_info', $aboutInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                           = array();
        $validation                     = $this->abtRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['about_us_title']         = $request->input('about_us_title');
            $data['about_us_details']       = $request->input('about_us_details');
            $data['mission_title']          = $request->input('mission_title');
            $data['mission_details']        = $request->input('mission_details');
            $data['chairman_profile_title']= $request->input('chairman_profile_title');
            $data['chairman_profile']        = $request->input('chairman_profile');
//            $data['vision_title']           = $request->input('vision_title');
//            $data['vision_details']         = $request->input('vision_details');
           //======================= about us image ===========
            $about_img1                 = $request->input('about_image1');
            // Handle 'about_image' upload
            $data['about_us_image'] = $this->handleImageUpload($request, 'about_image', 'about_us', $about_img1);
            //======================= mission image ===========
            $mission_img1                 = $request->input('mission_image1');
            $data['mission_image'] = $this->handleImageUpload($request, 'mission_image', 'mission', $mission_img1);

            //======================= chairman image ===========
            $chairman_image1                 = $request->input('chairman_image1');
            $data['chairman_image'] = $this->handleImageUpload($request, 'chairman_image', 'chairman_image', $chairman_image1);


            //======================= vision image ===========
            $vision_img1                 = $request->input('vision_image1');
            $data['vision_image'] = $this->handleImageUpload($request, 'vision_image', 'vision', $vision_img1);
            (!empty($id)) ? $this->abtRepo->update($id, $data) : $this->abtRepo->save($data);
            return Redirect::to('about');
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
        $aboutInfo = $this->abtRepo->findById($id);
        echo json_encode($aboutInfo);
    }

    public function active($id)
    {
        $this->abtRepo->update($id, ['status' => 1]);
        return redirect('about');
    }

    public function inActive($id)
    {
        $this->abtRepo->update($id, ['status' => 0]);
        return redirect('about');
    }

    public function delete($id)
    {
        $this->abtRepo->update($id, ['status' => 9]);
        return redirect('about');
    }
}
