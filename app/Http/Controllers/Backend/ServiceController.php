<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\ServiceRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class ServiceController extends BaseController
{
    private $svcRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ServiceRepo $svcRepo)
    {
        $this->middleware('auth');
        $this->svcRepo = $svcRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $serviceInfo                = $this->svcRepo->withoutDeletingData();
        return view('backend.service.services')->with('service_info', $serviceInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                           = array();
        $validation                     = $this->svcRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['service_title']           = $request->input('service_title');
            $data['service_details']            = $request->input('service_details');
            $data['service_icon']            = $request->input('service_icon');
            $data['slug']            = Str::slug($data['service_title']);

           //======================= about us image ===========
            $service_image1                 = $request->input('service_image1');
            // Handle 'about_image' upload
            $data['service_image'] = $this->handleImageUpload($request, 'service_image', 'service_image', $service_image1);
           (!empty($id)) ? $this->svcRepo->update($id, $data) : $this->svcRepo->save($data);
            return Redirect::to('add-service');
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
        $serviceInfo = $this->svcRepo->findById($id);
        echo json_encode($serviceInfo);
    }

    public function active($id)
    {
        $this->svcRepo->update($id, ['status' => 1]);
        return redirect('add-service');
    }

    public function inActive($id)
    {
        $this->svcRepo->update($id, ['status' => 0]);
        return redirect('add-service');
    }

    public function delete($id)
    {
        $this->svcRepo->update($id, ['status' => 9]);
        return redirect('add-service');
    }
}
