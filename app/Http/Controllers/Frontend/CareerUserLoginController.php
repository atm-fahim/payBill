<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

class CareerUserLoginController extends Controller
{
    use AuthenticatesUsers;
    use FileUploadTraits;
    use UserAccessTraits;
    use CommonTraits;

    private $stdRepo;
    private $crsRepo;
    private $crsLogRepo;

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

    public function __construct(StudentUserRepo $stdRepo)
    {
        $this->stdRepo = $stdRepo;
//        $this->middleware('student');
    }



    public function loginCareerUser(Request $request){

        $tracking = json_decode($this->encyptInfoByToken($this->getEmpToken(),$request->tracking_id));
        $password = json_decode($this->encyptInfoByToken($this->getEmpToken(),$request->password));
        try{
            $careerInfo = $this->careerUserInfo($tracking->encryptedKey,$password->encryptedKey);
            if(isset($careerInfo) && !empty($careerInfo) && $careerInfo->id > 1) {
                $existInfo = $this->stdRepo->existUserInfo($careerInfo->email_address);
                if(empty($existInfo)){
                    $this->createStudentAdUser($careerInfo,$request->password,$id=null);
                }else{
                    $this->createStudentAdUser($careerInfo,$request->password,$existInfo['id']);
                }
                //login auth

                if (!Auth::guard('student')->attempt(['email' => $careerInfo->email_address, 'password' => $request->password])) {
                    try {
                        return Redirect::to('frontend/signin')->withFail('You have entered an invalid username or password..!');
                    } catch (Exception $e) {
                        return Redirect::to('frontend/signin')->withFail('You have entered an invalid username or password..!');
                    }
                } else {
                    return Redirect::to('assessment');
                }
            }
        }catch (Exception $e){
            return Redirect::to('frontend/signin')->withFail('You have entered an invalid username or password..!');
        }
    }
    private function createStudentAdUser($careerInfo,$password,$id)
    {
        $data = array();
        try {
            $data['student_id'] = $careerInfo->tracking_id;
            $data['name'] = $careerInfo->full_name;
            $data['email'] = $careerInfo->email_address;
            $data['user_types'] = 'student';
            $data['access_type'] = 'non-emp';
            $data['branch_id'] = 1;
            $data['contact_no'] = explode("88",$careerInfo->mobile_number)[1];
            $data['password'] = Hash::make($password);
            $data['active_code'] = $this->generateRandomString('PBS', 4);
            (!empty($id)) ? $this->stdRepo->update($id, $data) : $this->stdRepo->save($data);
            return 1;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getEmpToken(){
        $url    = env('APP_HR_BASE_URL')."/api/login";
        $header = array(
            "Content-Type" => "application/json"
        );
        $body = array(
            "user_name" => "pbl_lms",
            "password"=>"123pbl!@#"
        );
        $getData = $this->postApiResponse($url,$body,$header);
        return json_decode($getData)->access_token;
    }

    private function encyptInfoByToken($token,$value){
        $url    = env('APP_HR_BASE_URL')."/api/v3/pass-encrypt/".$value;
        $header = [
            "Authorization: bearer ".$token
        ];
        $body = "";
        return $this->getApiResponse($url,$body,$header);
    }




    private function careerUserInfo($tracking,$password){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('APP_CAREER_BASE_URL').'/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('user_name' => $tracking,'password' => $password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

}
