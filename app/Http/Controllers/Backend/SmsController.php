<?php

namespace App\Http\Controllers\Backend;

use App\Interfaces\Repo\Backend\FaqRepo;
use App\Traits\CommonTraits;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

class SmsController extends BaseController
{
    private $faqRepo;
    use FileUploadTraits;
    use UserAccessTraits;
    use CommonTraits;
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
//        $faq     = $this->faqRepo->withoutDeletingData();
        return view('backend.sms.sms')->with('user_access',$userAccessData);
    }

    public function send_sms(Request $request)
    {
        try {
            $numbers = $request->input('number');
            $msg = $request->input('message');

            $numbers_array = explode(",", $numbers);
            foreach ($numbers_array as $number) {
                $formattedNumber = '88' . trim($number);
                $msgResponse = $this->sendMsg($formattedNumber, $msg);
                $decodedResponse = json_decode($msgResponse);
                if (!$decodedResponse || !isset($decodedResponse->error)) {
                    return redirect()->back()->with('message', "Failed to decode response.");
                }
                if ($decodedResponse->error == 0) {
                    continue;
                } else {
                    return redirect()->back()->with('message', "Failed " . $decodedResponse->message);
                }
            }

            return redirect()->back()->with('message', "All messages sent successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->with('message', "Failed to send messages: " . $e->getMessage());
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
