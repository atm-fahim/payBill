<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\CourseRepo;
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

class CourseController extends BaseController
{
    private $yrDesRepo;
    private $unvRepo;
    private $crcRepo;
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
        CourseRepo $crcRepo,
    )
    {
        $this->middleware('auth');
        $this->yrDesRepo = $yrDesRepo;
        $this->unvRepo = $unvRepo;
        $this->crcRepo = $crcRepo;
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
        $courseInfo                = $this->crcRepo->getCourseDetails();
        return view('backend.course.course')
            ->with('destination_info', $destinationInfo)
            ->with('course_info', $courseInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                               = array();
        $validation                         = $this->crcRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                             = $request->input('id');
            $data['destination_id']       = $request->input('destination_id');
            $data['university_id']       = $request->input('university_id');
            $data['course_name']    = $request->input('course_name');
            $data['course_details']    = $request->input('course_details');
            $data['slug']                   = Str::slug($data['course_name']);
           //======================= about us image ===========
            $course_image1                 = $request->input('course_image1');
            // Handle 'about_image' upload
            $data['course_image']  = $this->handleImageUpload($request, 'course_image', 'course', $course_image1);
           (!empty($id)) ? $this->crcRepo->update($id, $data) : $this->crcRepo->save($data);
            return Redirect::to('add-course');
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

    public function getUniversityListByDestinationId(Request $request)
    {
        if ($request->ajax()) {
            $destination_id = $request->input('destination_id');

            if (empty($destination_id)) {
                return response()->json(['error' => 'Destination ID is required.'], 400);
            }

            $universityInfo = $this->unvRepo->getUniversityListByDestinationId($destination_id);

            return response()->json(['universities' => $universityInfo]); // ✅ Wrap in a key
        }

        return response()->json(['error' => 'Invalid request.'], 400);
    }
    public function edit($id)
    {
        $upcomingInfo = $this->crcRepo->findById($id);
        echo json_encode($upcomingInfo);
    }

    public function active($id)
    {
        $this->crcRepo->update($id, ['status' => 1]);
        return redirect('add-course');
    }

    public function inActive($id)
    {
        $this->crcRepo->update($id, ['status' => 0]);
        return redirect('add-course');
    }

    public function delete($id)
    {
        $this->crcRepo->update($id, ['status' => 9]);
        return redirect('add-course');
    }
}
