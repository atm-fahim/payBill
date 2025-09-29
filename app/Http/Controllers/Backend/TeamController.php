<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\TeamRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\FileUploadTraits;

class TeamController extends BaseController
{
    private $tmRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeamRepo $tmRepo)
    {
        $this->middleware('auth');
        $this->tmRepo = $tmRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData         = $this->userAccessFunction();
        $teamInfo                = $this->tmRepo->withoutDeletingData();
        return view('backend.team.team')->with('team_info', $teamInfo)
                                                            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data                           = array();
        $validation                     = $this->tmRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['member_name']           = $request->input('member_name');
            $data['profile']            = $request->input('profile');

           //======================= about us image ===========
            $photo1                 = $request->input('photo1');
            // Handle 'photo' upload
            $data['photo'] = $this->handleImageUpload($request, 'photo', 'service_image', $photo1);
           (!empty($id)) ? $this->tmRepo->update($id, $data) : $this->tmRepo->save($data);
            return Redirect::to('team-member');
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
        $teamInfo = $this->tmRepo->findById($id);
        echo json_encode($teamInfo);
    }

    public function active($id)
    {
        $this->tmRepo->update($id, ['status' => 1]);
        return redirect('team-member');
    }

    public function inActive($id)
    {
        $this->tmRepo->update($id, ['status' => 0]);
        return redirect('team-member');
    }

    public function delete($id)
    {
        $this->tmRepo->update($id, ['status' => 9]);
        return redirect('team-member');
    }
}
