<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\OurCompanyRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class OurCompanyController extends BaseController
{
    private $cmpnyRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        OurCompanyRepo $cmpnyRepo
    )
    {
        $this->middleware('auth');
        $this->cmpnyRepo = $cmpnyRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $companyData     = $this->cmpnyRepo->withoutDeletingData();
        return view('backend.company.company')->with('company', $companyData)
                                                ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->cmpnyRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $data['company_name']   = $request->input('company_name');
            $data['contact_number'] = $request->input('phone_number');
            $data['city']           = $request->input('city');
            $data['zip_code']       = $request->input('zip_code');
            $data['email']          = $request->input('email');
            $data['address']        = $request->input('address');
            $data['details']        = $request->input('details');
            $data['slug']           = Str::slug($data['company_name']);
            $banner_img1            = $request->input('banner_img1');
            $image = $request->file('banner_img');
            if(isset($image)):
                $imgPutPath         = public_path('uploads/thumbnail/' . $data['slug']);
                $imgReadPath        = 'uploads/thumbnail/' . $data['slug'];
                $data['banner']     = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
            else:
                $data['banner']     =$banner_img1;
            endif;
            (!empty($id))?$this->cmpnyRepo->update($id,$data):$this->cmpnyRepo->save($data);
            return Redirect::to('company');
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function edit($id)
    {
      $companyData=$this->cmpnyRepo->findById($id);
      echo json_encode($companyData);
    }

    public function active($id)
    {
        $this->cmpnyRepo->update($id,['status'=>1]);
        return redirect('company');
    }

    public function inActive($id)
    {
        $this->cmpnyRepo->update($id,['status'=>0]);
        return redirect('company');
    }

    public function delete($id)
    {
        $this->cmpnyRepo->update($id,['status'=>9]);
        return redirect('company');
    }
}
