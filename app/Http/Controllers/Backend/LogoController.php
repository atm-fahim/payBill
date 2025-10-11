<?php

namespace App\Http\Controllers\Backend;



use App\Interfaces\Repo\Backend\LogoRepo;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Routing\Controller as BaseController;

class LogoController extends BaseController
{
    private $logoRepo;
    use FileUploadTraits;
    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LogoRepo $logoRepo)
    {
        $this->middleware('auth');
        $this->logoRepo = $logoRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $logoData        = $this->logoRepo->withoutDeletingData();
        return view('backend.logo.logo')->with('logo_info', $logoData)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = [];
        $validation = $this->logoRepo->checkRequestValidity($request);

        if (!$validation["isValidationSuccess"]) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'error' => $validation["error"]
            ], 400);
        }

        try {
            $id = $request->input('id');
            $data['status'] = 1;

            $image = $request->file('logo_image');
            $favicon = $request->file('favicon');
            $small_logo = $request->file('small_logo');
            $dashboard_user = $request->file('dashboard_user');
            $dashboard_logo = $request->file('dashboard_logo');
            $dashboard_favicon = $request->file('dashboard_favicon');

            $uploadPath = public_path('uploads/logo/');
            $readPath = 'uploads/logo';

            if ($image) {
                $data['logo_image'] = $this->logoImage($uploadPath, $image, $readPath);
            } else {
                $data['logo_image'] = $request->input('logo_image1');
            }

            if ($favicon) {
                $data['favicon'] = $this->logoImage($uploadPath, $favicon, $readPath);
            } else {
                $data['favicon'] = $request->input('favicon1');
            }
            if ($small_logo) {
                $data['small_logo'] = $this->logoImage($uploadPath, $small_logo, $readPath);
            } else {
                $data['small_logo'] = $request->input('small_logo1');
            }

            if ($dashboard_user) {
                $data['dashboard_user'] = $this->logoImage($uploadPath, $dashboard_user, $readPath);
            } else {
                $data['dashboard_user'] = $request->input('dashboard_user1');
            }

            if ($dashboard_logo) {
                $data['dashboard_logo'] = $this->logoImage($uploadPath, $dashboard_logo, $readPath);
            } else {
                $data['dashboard_logo'] = $request->input('dashboard_logo1');
            }

            if ($dashboard_favicon) {
                $data['dashboard_favicon'] = $this->logoImage($uploadPath, $dashboard_favicon, $readPath);
            } else {
                $data['dashboard_favicon'] = $request->input('dashboard_favicon1');
            }

            (!empty($id)) ? $this->logoRepo->update($id, $data) : $this->logoRepo->save($data);

            return Redirect::to('logo');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function logoImage($path, $image, $readPath)
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $imageName);
        return $readPath . '/' . $imageName;
    }

    public function edit($id)
    {
        $catData=$this->logoRepo->findById($id);
        echo json_encode($catData);
    }

    public function active($id)
    {
        $this->logoRepo->update($id,['status'=>1]);
        return redirect('logo');
    }

    public function inActive($id)
    {
        $this->logoRepo->update($id,['status'=>0]);
        return redirect('logo');
    }

    public function delete($id)
    {
        $this->logoRepo->update($id,['status'=>9]);
        return redirect('logo');
    }
}
