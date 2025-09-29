<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class NoticeController extends BaseController
{
    private $noticeRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NoticeRepo $noticeRepo)
    {
        $this->middleware('auth');
        $this->noticeRepo = $noticeRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $noticeData    = $this->noticeRepo->withoutDeletingData();
        return view('backend.notice.notice')->with('notice_info', $noticeData)
                                                ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->noticeRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }

        try {
            $id                      = $request->input('id');
            $data['notice_title']    = $request->input('notice_title');
            $data['notice_start']    = $request->input('notice_start_date');
            $data['notice_end']      = $request->input('notice_end_date');
            $data['slug']            = Str::slug($data['notice_title']);
            $data['is_continue']     = $request->input('is_continue',true);
            $file1                              = $request->input('notice_file1');
            $file                               = $request->file('file');
            if(isset($file)):
                $filePutPath                    = public_path('uploads/notice/');
                $fileReadPath                   = 'uploads/notice';
                $data['notice_file']          = $this->fileUpload($filePutPath, $file, $request, $fileReadPath);
            else:
                $data['notice_file']          = $file1;
            endif;
            (!empty($id))?$this->noticeRepo->update($id,$data):$this->noticeRepo->save($data);
            return Redirect::to('add-notice-event');
        } catch (\Exception $e) {
            dd($e);
        }
    }
    //**** Find Location with Latitude and Longitude


    public function edit($id)
    {
      $brandData=$this->noticeRepo->findById($id);
      echo json_encode($brandData);
    }

    public function active($id)
    {
        $this->noticeRepo->update($id,['status'=>1]);
        return redirect('add-notice-event');
    }

    public function inActive($id)
    {
        $this->noticeRepo->update($id,['status'=>0]);
        return redirect('add-notice-event');
    }

    public function delete($id)
    {
        $this->noticeRepo->update($id,['status'=>9]);
        return redirect('add-notice-event');
    }
}
