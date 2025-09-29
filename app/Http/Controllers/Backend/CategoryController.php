<?php

namespace App\Http\Controllers\Backend;


use App\Interfaces\Repo\Backend\CategoryRepo;
use App\Traits\FileUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UserAccessTraits;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class categoryController extends BaseController
{
    private $catRepo;
    use FileUploadTraits;
    use UserAccessTraits;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepo $catRepo)
    {
        $this->middleware('auth');
        $this->catRepo = $catRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $catData        = $this->catRepo->withoutDeletingData();
        return view('backend.category.category')->with('category', $catData)
                                                     ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->catRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                         = $request->input('id');
            $data['category']           = $request->input('category');
            $thumb_img1                 = $request->input('thumb_img1');
            $image                      = $request->file('thumb_img');
            $data['slug']               = Str::slug($data['category']);
            $data['status']             = 1;
//            if(isset($image)):
//                $imgPutPath           = public_path('uploads/thumbnail/' . $data['slug']);
//                $imgReadPath          = 'uploads/thumbnail/' . $data['slug'];
//                $data['thumb_image']  = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
//            else:
//            $data['thumb_image'] =$thumb_img1;
//            endif;
            (!empty($id))?$this->catRepo->update($id,$data):$this->catRepo->save($data);
            return Redirect::to('category');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
      $catData=$this->catRepo->findById($id);
      echo json_encode($catData);
    }

    public function active($id)
    {
        $this->catRepo->update($id,['status'=>1]);
        return redirect('category');
    }

    public function inActive($id)
    {
        $this->catRepo->update($id,['status'=>0]);
        return redirect('category');
    }

    public function delete($id)
    {
        $this->catRepo->update($id,['status'=>9]);
        return redirect('category');
    }
}
