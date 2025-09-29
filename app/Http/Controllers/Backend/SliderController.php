<?php

namespace App\Http\Controllers\Backend;


use App\Interfaces\Repo\Backend\SliderRepo;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Routing\Controller as BaseController;

class SliderController extends BaseController
{
    private $sldRepo;
    use FileUploadTraits;
    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SliderRepo $sldRepo)
    {
        $this->middleware('auth');
        $this->sldRepo = $sldRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $sliderData        = $this->sldRepo->withoutDeletingData();
        return view('backend.slider.slider')->with('slider', $sliderData)
                                                     ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->sldRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $slider1                    = $request->input('slider_image1');
            $image                      = $request->file('slider_image');
            $data['status']             = 1;
            $data['slider_title']       = $request->input('slider_title');
            if(isset($image)):
                $imgPutPath           = public_path('uploads/slider/');
                $imgReadPath          = 'uploads/slider';
                $data['slider_image']  = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
            else:
            $data['slider_image'] =$slider1;
            endif;
            (!empty($id))?$this->sldRepo->update($id,$data):$this->sldRepo->save($data);
            return Redirect::to('add-slider');
        } catch (\Exception $e) {
            echo json_encode($e);
        }
    }

    public function edit($id)
    {
      $catData=$this->sldRepo->findById($id);
      echo json_encode($catData);
    }

    public function active($id)
    {
        $this->sldRepo->update($id,['status'=>1]);
        return redirect('add-slider');
    }

    public function inActive($id)
    {
        $this->sldRepo->update($id,['status'=>0]);
        return redirect('add-slider');
    }

    public function delete($id)
    {
        $this->sldRepo->update($id,['status'=>9]);
        return redirect('add-slider');
    }
}
