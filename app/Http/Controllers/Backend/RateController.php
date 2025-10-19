<?php

namespace App\Http\Controllers\Backend;


use App\Interfaces\Repo\Backend\CategoryRepo;
use App\Interfaces\Repo\Backend\RateRepo;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class RateController extends BaseController
{
    private $rtRepo;
    use FileUploadTraits;
    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RateRepo $rtRepo)
    {
        $this->middleware('auth');
        $this->rtRepo = $rtRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $rateData        = $this->rtRepo->withoutDeletingData();
        return view('backend.rate.rate')
            ->with('rate_info', $rateData)
            ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->rtRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['bdt_rate']           = $request->input('bdt_rate');
            $data['other_rate']         = $request->input('other_rate');
            $data['status']             = 1;
            (!empty($id))?$this->rtRepo->update($id,$data):$this->rtRepo->save($data);
            return Redirect::to('add-rate');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
      $rateData=$this->rtRepo->findById($id);
      echo json_encode($rateData);
    }

    public function active($id)
    {
        $this->rtRepo->update($id,['status'=>1]);
        return redirect('add-rate');
    }

    public function inActive($id)
    {
        $this->rtRepo->update($id,['status'=>0]);
        return redirect('add-rate');
    }

    public function delete($id)
    {
        $this->rtRepo->update($id,['status'=>9]);
        return redirect('add-rate');
    }
}
