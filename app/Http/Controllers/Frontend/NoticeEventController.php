<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use Illuminate\Support\Facades\DB;

class NoticeEventController extends Controller
{
    private $noticeRepo;


    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct(
        NoticeRepo $noticeRepo,
    )
    {
        $this->noticeRepo   = $noticeRepo;
    }

    public function index()
    {
        $isContinueNoticeInfo   = $this->noticeRepo->customiseIsContinueNoticeBoard();
        $dateNoticeInfo         = $this->noticeRepo->customiseNoticeBoard();
        $noticeInfo             = array_merge($isContinueNoticeInfo,$dateNoticeInfo);
        return view('frontend.notice')
            ->with('notice_info', $noticeInfo);
    }

    public function noticeDetails($slug)
    {
        $notice_details = $this->noticeRepo->getNoticeDetailsBySlug($slug);
        return view('frontend.notice_details')
            ->with('notice_info',$notice_details);
    }


}
