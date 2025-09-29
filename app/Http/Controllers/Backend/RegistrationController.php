<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\BatchRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Frontend\StudentUserRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class RegistrationController extends BaseController
{
    private $batchRepo;
    private $branchRepo;
    private $stdRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentUserRepo $stdRepo,BatchRepo $batchRepo,BranchRepo $branchRepo)
    {
        $this->middleware('auth');
        $this->batchRepo = $batchRepo;
        $this->stdRepo = $stdRepo;
        $this->branchRepo = $branchRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $batchData     = $this->batchRepo->withoutDeletingData();
        $branchData = $this->branchRepo->withoutDeletingData();
        return view('backend.registration.registration')
                                        ->with('branch_info', $branchData)
                                        ->with('batch', $batchData)
                                        ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->stdRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $data['branch_id'] = (!empty($request->input('branch_id'))) ? $request->input('branch_id') : 1;
            $data['batch_id'] = (!empty($request->input('batch_id'))) ? $request->input('batch_id') : 0;
            $data['student_id'] = $this->generateRandomString('BR_' . $data['branch_id'] . '_', 4);
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['user_types'] = 'student';
            $data['access_types'] = 'emp';
            $data['contact_no'] = $request->input('phone_no');
            $data['password'] = Hash::make('12345678');
            $data['active_code'] = $this->generateRandomString('LRN', 4);
            $user_img1 = $request->input('image1');
            $image = $request->file('image');
            if (isset($image)):
                $imgPutPath = public_path('uploads/student');
                $imgReadPath = 'uploads/student';
                $data['image'] = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
            else:
                $data['image'] = $user_img1;
            endif;

            (!empty($id)) ? $this->stdRepo->update($id, $data) : $this->stdRepo->save($data);
            return Redirect::to('new-registration');
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function edit($id)
    {
      $brandData=$this->batchRepo->findById($id);
      echo json_encode($brandData);
    }

    public function active($id)
    {
        $this->batchRepo->update($id,['status'=>1]);
        return redirect('batch');
    }

    public function inActive($id)
    {
        $this->batchRepo->update($id,['status'=>0]);
        return redirect('batch');
    }

    public function delete($id)
    {
        $this->batchRepo->update($id,['status'=>9]);
        return redirect('batch');
    }
}
