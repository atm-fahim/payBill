<?php

namespace App\Http\Controllers;

use App\Interfaces\Repo\Backend\AboutUsRepo;
use App\Interfaces\Repo\Backend\ClientRepo;
use App\Interfaces\Repo\Backend\DashBoardLogRepo;
use App\Interfaces\Repo\Backend\FaqRepo;
use App\Interfaces\Repo\Backend\LogoRepo;
use App\Interfaces\Repo\Backend\NoticeRepo;
use App\Interfaces\Repo\Backend\OurCompanyRepo;
use App\Interfaces\Repo\Backend\OurProductRepo;
use App\Interfaces\Repo\Backend\ServiceRepo;
use App\Interfaces\Repo\Backend\SliderRepo;
use App\Interfaces\Repo\Backend\UpcomingRepo;
use App\Repository\Backend\ContactUsRepoImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FrontendHomeController extends Controller
{
//    private $dblRepo;
    private $cntRepo;
    private $sldRepo;
    private $noticeRepo;
    private $faqRepo;
    private $upcRepo;
    private $svcRepo;
    private $oCmpnyRepo;
    private $abtRepo;
    private $prRepo;
    private $clntRepo;

    public function __construct(
//        ContactUsRepoImpl $cntRepo,
//        DashBoardLogRepo $dblRepo,
//        ClientRepo $clntRepo,
        SliderRepo $sldRepo,
        NoticeRepo $noticeRepo,
        ServiceRepo $svcRepo,
        FaqRepo $faqRepo,
        OurCompanyRepo $oCmpnyRepo,
        UpcomingRepo $upcRepo,
        AboutUsRepo         $abtRepo,
        OurProductRepo         $prRepo,
    )
    {
//        $this->clntRepo      = $clntRepo;
//        $this->cntRepo      = $cntRepo;
//        $this->dblRepo      = $dblRepo;
        $this->sldRepo      = $sldRepo;
        $this->noticeRepo   = $noticeRepo;
        $this->faqRepo      = $faqRepo;
        $this->upcRepo      = $upcRepo;
        $this->svcRepo      = $svcRepo;
        $this->oCmpnyRepo      = $oCmpnyRepo;
        $this->abtRepo = $abtRepo;
        $this->prRepo = $prRepo;
    }

    public function index()
    {
        $data = array();
        $sliderInfo             = $this->sldRepo->getSliderInfo();
        $isContinueNoticeInfo   = $this->noticeRepo->customiseIsContinueNoticeBoard();
        $dateNoticeInfo         = $this->noticeRepo->customiseNoticeBoard();
        $upcomingInfo           = $this->upcRepo->withoutDeletingDataByLimit(4);
        $faq                    = $this->faqRepo->withoutDeletingDataByLimit(3);
        $serviceInfo            = $this->svcRepo->withoutDeletingDataByLimit(6);
        $companyInfo            = $this->oCmpnyRepo->withoutDeletingDataByLimit(6);
        $productInfo            = $this->prRepo->withoutDeletingDataByLimit(10);
        $noticeInfo             = array_merge($isContinueNoticeInfo,$dateNoticeInfo);
        $aboutInfo             = $this->abtRepo->withoutDeletingData();
//        $clientInfo             = $this->clntRepo->withoutDeletingData();
//        $contactInfo           = $this->cntRepo->withoutDeletingData();
        return view('frontend.home')
            ->with('slider_info', $sliderInfo)
            ->with('notice_info', $noticeInfo)
            ->with('about_info',$aboutInfo)
            ->with('product_info',$productInfo)
            ->with('service_info', $serviceInfo)
            ->with('company_info', $companyInfo)
//            ->with('client_info', $clientInfo)
            ->with('upcoming_info', $upcomingInfo)
            ->with('faq_info', $faq);
    }

}
