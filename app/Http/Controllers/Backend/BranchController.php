<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\BranchRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class BranchController extends BaseController
{
    private $branchRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BranchRepo $branchRepo)
    {
        $this->middleware('auth');
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
        $branchData     = $this->branchRepo->withoutDeletingData();
        return view('backend.branch.branch')->with('branch', $branchData)
                                                ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->branchRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $data['branch_name']    = $request->input('branch_name');
            $data['contact_number'] = $request->input('phone_number');
            $data['city']           = $request->input('city');
            $data['zip_code']       = $request->input('zip_code');
            $data['email']          = $request->input('email');
            $data['address']        = $request->input('address');
            $data['details']        = $request->input('details');
            $data['slug']           = Str::slug($data['branch_name']);
            $banner_img1            = $request->input('banner_img1');
            $image = $request->file('banner_img');
            if(isset($image)):
                $imgPutPath         = public_path('uploads/thumbnail/' . $data['slug']);
                $imgReadPath        = 'uploads/thumbnail/' . $data['slug'];
                $data['banner']     = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
            else:
                $data['banner']     =$banner_img1;
            endif;
            (!empty($id))?$this->branchRepo->update($id,$data):$this->branchRepo->save($data);
            return Redirect::to('branch');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    //**** Find Location with Latitude and Longitude
    public function radians(Request $request) {

        $latitude = LATTITUDE_GOES_HERE;
        $longtitude = LONGITUDE_GOES_HERE;

        $showResult = DB::table("users")
            ->select("users.id"
                ,DB::raw("55555 * acos(cos(radians(" . $latitude . "))
                * cos(radians(users.lat))
                * cos(radians(users.lon) - radians(" . $longtitude . "))
                + sin(radians(" .$latitude. "))
                * sin(radians(users.lat))) AS distance"))
            ->groupBy("users.id")
            ->get();

        dd($showResult);
    }

    public function edit($id)
    {
      $branchData=$this->branchRepo->findById($id);
      echo json_encode($branchData);
    }

    public function active($id)
    {
        $this->branchRepo->update($id,['status'=>1]);
        return redirect('outlet-branch');
    }

    public function inActive($id)
    {
        $this->branchRepo->update($id,['status'=>0]);
        return redirect('outlet-branch');
    }

    public function delete($id)
    {
        $this->branchRepo->update($id,['status'=>9]);
        return redirect('outlet-branch');
    }
}
