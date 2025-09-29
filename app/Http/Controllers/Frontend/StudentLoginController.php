<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\Repo\Backend\BatchRepo;
use App\Interfaces\Repo\Backend\BranchRepo;
use App\Interfaces\Repo\Frontend\CourseLogRepo;
use App\Interfaces\Repo\Frontend\CourseRepo;
use App\Interfaces\Repo\Frontend\StudentUserRepo;
use App\Traits\CommonTraits;
use App\Traits\FileUploadTraits;
use App\Traits\UserAccessTraits;
use Exception;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class StudentLoginController extends Controller
{
    use AuthenticatesUsers;
    use FileUploadTraits;
    use UserAccessTraits;
    use CommonTraits;

    private $stdRepo;
    private $crsRepo;
    private $crsLogRepo;
    private $branchRepo;
    private $batchRepo;

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
        CourseRepo $crsRepo,
        BatchRepo $batchRepo,
        StudentUserRepo $stdRepo,
        CourseLogRepo $crsLogRepo,
        BranchRepo $branchRepo)

    {
        $this->stdRepo    = $stdRepo;
        $this->crsRepo    = $crsRepo;
        $this->crsLgRepo  = $crsLogRepo;
        $this->branchRepo = $branchRepo;
        $this->batchRepo  = $batchRepo;
//        $this->middleware('student');
    }

    public function signup()
    {
        $branchData = $this->branchRepo->withoutDeletingData();
        $batchData     = $this->batchRepo->withoutDeletingData();
        return view('frontend.signup')->with('batch', $batchData)
            ->with('branch_info', $branchData);
    }

    public function myProfile()
    {
        $totalCourse = $this->crsLgRepo->courseCompleteCountId(student()->id);
        $my_course_list = $this->crsRepo->findCourseByLearnerId(student()->id);
        return view('frontend.profile')->with('my_course_list', $my_course_list)
            ->with('total_course', $totalCourse);
    }


    public function assignStudentInfo($empId)
    {
        return $this->assignStudentInfoByToken($this->getEmpToken(), $empId);
    }

    private function getEmpToken()
    {
        $url = "http://192.168.200.132/padma_hrm/public/api/login";
        $header = array(
            "Content-Type" => "application/json"
        );
        $body = array(
            "user_name" => "pbl_lms",
            "password" => "123pbl!@#"
        );
        $getData = $this->postApiResponse($url, $body, $header);
        return json_decode($getData)->access_token;
    }

    private function assignStudentInfoByToken($token, $empId)
    {
        $url = "http://192.168.200.132/padma_hrm/public/api/v3/user-info-padmaportal?emp_id=" . $empId;
        $header = [
            "Authorization: bearer " . $token
        ];
        $body = "";
        return $this->getApiResponse($url, $body, $header);
    }

    public function createStudentUser(Request $request)
    {
        $data = array();
        $validation = $this->stdRepo->checkRequestValidity($request);
        if (!$validation["isValidationSuccess"]) {
            return response()->json(['status' => false, 'message' => 'Validation failed', 'error' => $validation["error"]], 400);
        }
        try {
            $id = $request->input('id');

            $data['branch_id'] = (!empty($request->input('branch_id'))) ? $request->input('branch_id') : 1;
            $data['batch_id'] = (!empty($request->input('batch_id'))) ? $request->input('batch_id') : 0;
            $data['student_id'] = $this->generateRandomString('BR_' . $data['branch_id'] . '_', 4);
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['user_types'] = 'student';
            $data['access_types'] = 'emp';
            $data['contact_no'] = $request->input('phone_no');
            $data['password'] = Hash::make($request->password);
            $data['active_code'] = $this->generateRandomString('LRN', 4);
            $user_img1 = $request->input('image1');
            $image = $request->file('image');
            if (isset($image)):
                $imgPutPath = public_path('uploads/student');
                $imgReadPath = 'uploads/student';
                $data['image'] = $this->thumbnailImage($imgPutPath, $image, $imgReadPath);
            else:
                $data['image'] = $user_img1;
            endif;

            (!empty($id)) ? $this->stdRepo->update($id, $data) : $this->stdRepo->save($data);
            return (!empty($id)) ? redirect()->back()->withSuccess('your account has been successfully updated..!') : redirect()->back()->withSuccess('Congratulations, your account has been successfully created..!');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function login()
    {
        $uri_path = url()->previous();

        $storedUrl = Session::get('login_redirect_url');
        $linkUrl = Session::get('link');

        if (isset($storedUrl) && !empty($storedUrl)) {
            $uri_segments = explode('/', $storedUrl);
        }
        if (isset($uri_segments[4]) && !empty($uri_segments[4])):
            session(['url_segments' => $uri_segments[4]]);
        elseif (isset($uri_segments[3]) && !empty($uri_segments[3])):
            session(['url_segments' => $uri_segments[3]]);

        else:
            (!empty($linkUrl)) ? $linkUrl : session(['link' => url()->previous()]);
        endif;

        return view('frontend.login');
    }


    private function r_url()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
//        return $protocol . "://" . $_SERVER['HTTP_HOST'];
        return view('frontend.login');
    }

    public function loginCheck(Request $request)
    {
        //$ldapInfo = $this->adauth($request->user_email,$request->password);
        //if(isset($ldapInfo['status']) && !empty($ldapInfo['status']) && $ldapInfo['status']=='ok') {
        $existInfo = $this->stdRepo->existUserInfo($request->user_email);
//           if(empty($existInfo)){
//               $this->createStudentAdUser($ldapInfo,$request->password,$id=null);
//           }else{
//               $this->createStudentAdUser($ldapInfo,$request->password,$existInfo['id']);
//           }
        if (!Auth::guard('student')->attempt(['email' => $request->user_email, 'password' => $request->password])) {
            try {
                return Redirect::to('frontend/signin')->withFail('You have entered an invalid username or password..!');
            } catch (Exception $e) {
                echo $e;
            }
        } else {

            if (session('url_segments') == 'signin') {
//                       return Redirect::to('frontend/home');
                return Redirect::to('assessment');
            } elseif (session('url_segments') == 'assessment') {
                return Redirect::to('assessment');
            } else {
                return Redirect::to('assessment');
//                   return redirect(session('link'));
            }
            // }
        }
//           else{
//           return Redirect::to('frontend/signin')->withFail('You have entered an invalid username or password..!');
//       }
    }

    private function createStudentAdUser($ldapInfo, $password, $id)
    {

        $data = array();
        try {
            $data['student_id'] = $ldapInfo['student_id'];
            $data['name'] = $ldapInfo['user_name'];
            $data['full_name'] = $ldapInfo['user_full_name'];
            $data['email'] = $ldapInfo['user_email'];
            $data['user_types'] = 'student';
            $data['access_type'] = 'emp';
            $data['branch_id'] = 1;
            $data['contact_no'] = $ldapInfo['phone_number'];
            $data['password'] = Hash::make($password);
            $data['active_code'] = $this->generateRandomString('PBS', 4);
            (!empty($id)) ? $this->stdRepo->update($id, $data) : $this->stdRepo->save($data);
            //$this->stdRepo->save($data);
            return 1;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function adauth($ad_name, $ad_password)
    {
        $adServer = "192.168.200.36";
        $ldap = ldap_connect($adServer);
        $username = $ad_name;
        $password = $ad_password;
        $ldaprdn = 'padma\\' . $username;
        try {
            ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
            ldap_bind($ldap, $ldaprdn, $password);
            return $this->ldap_info($username, $ldap);
        } catch (Exception $e) {
            return 'You have entered an invalid username or password..!';
        }
    }

    public function studentTest(Request $request)
    {
        $this->guard('student')->logout();

        $request->session()->invalidate();

//        return $this->loggedOut($request) ?: redirect('/frontend/home');
        return $this->loggedOut($request) ?: redirect('/');
    }


    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
    }
}
