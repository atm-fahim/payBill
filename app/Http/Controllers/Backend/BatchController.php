<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\BatchRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class BatchController extends BaseController
{
    private $batchRepo;
    private $branchRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BatchRepo $batchRepo,BranchRepo $branchRepo)
    {
        $this->middleware('auth');
        $this->batchRepo = $batchRepo;
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
        $branchData     = $this->branchRepo->withoutDeletingData();
        return view('backend.batch.batch')->with('batch', $batchData)
                                                ->with('branch_info', $branchData)
                                                ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->batchRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $data['batch_name']     = $request->input('batch_name');
            $data['branch_id']      = $request->input('branch_id');
            $branchInfo             = $this->branchRepo->findById($data['branch_id']);
            $data['batch_code']     = $this->generateRandomString($branchInfo->branch_name,4);
            $data['slug']           = Str::slug($data['batch_name']);
            (!empty($id))?$this->batchRepo->update($id,$data):$this->batchRepo->save($data);
            return Redirect::to('batch');
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
