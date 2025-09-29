<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\FaqRepo;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class FaqController extends BaseController
{
    private $faqRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FaqRepo $faqRepo)
    {
        $this->middleware('auth');
        $this->faqRepo = $faqRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAccessData = $this->userAccessFunction();
        $faq     = $this->faqRepo->withoutDeletingData();
        return view('backend.faq.faq')->with('faq', $faq)
                                                ->with('user_access',$userAccessData);
    }

    public function saveUpdate(Request $request)
    {
        $data = array();
        $validation = $this->faqRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id                     = $request->input('id');
            $data['question']    = $request->input('question');
            $data['answer'] = $request->input('answer');
            $data['status'] = 1;
            (!empty($id))?$this->faqRepo->update($id,$data):$this->faqRepo->save($data);
            return Redirect::to('add-faq');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
      $faqInfo=$this->faqRepo->findById($id);
      echo json_encode($faqInfo);
    }

    public function active($id)
    {
        $this->faqRepo->update($id,['status'=>1]);
        return redirect('add-faq');
    }

    public function inActive($id)
    {
        $this->faqRepo->update($id,['status'=>0]);
        return redirect('add-faq');
    }

    public function delete($id)
    {
        $this->faqRepo->update($id,['status'=>9]);
        return redirect('add-faq');
    }
}
