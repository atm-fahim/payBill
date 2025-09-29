<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Backend\ContactUsRepo;
use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class ContactUsController extends BaseController
{
    private $cont;
    private $branch;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContactUsRepo $cont,BranchRepo $branch)
    {
        $this->middleware('auth');
        $this->cont = $cont;
        $this->branch = $branch;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $contactInfo    = $this->cont->contactInformation();
        $branchInfo    = $this->branch->withoutDeletingData();
        return view('backend.contact.contact')
            ->with('contact_info', $contactInfo)
            ->with('branch_info', $branchInfo)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->cont->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }

        try {
            $id                      = $request->input('id');
            $data['branch_id']    = $request->input('branch_id')??0;
            $data['contact_number']    = $request->input('contact_number');
            $data['hotline_number']      = $request->input('hotline_no');
            $data['zip_code']     = $request->input('zip_code',true);
            $data['email']     = $request->input('email',true);
            $data['fb_link']     = $request->input('fb_link');
            $data['linkedin']     = $request->input('linkedin');
            $data['address']     = $request->input('address');

            (!empty($id))?$this->cont->update($id,$data):$this->cont->save($data);
            return Redirect::to('contact-us');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    //**** Find Location with Latitude and Longitude


    public function edit($id)
    {
      $brandData=$this->cont->findById($id);
      echo json_encode($brandData);
    }

    public function active($id)
    {
        $this->cont->update($id,['status'=>1]);
        return redirect('contact-us');
    }

    public function inActive($id)
    {
        $this->cont->update($id,['status'=>0]);
        return redirect('contact-us');
    }

    public function delete($id)
    {
        $this->cont->update($id,['status'=>9]);
        return redirect('contact-us');
    }
}
