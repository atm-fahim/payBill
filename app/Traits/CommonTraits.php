<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

/**
 * Traits implementation of menu for the backend model.
 * they are user access info
 * @develop by fahim
 * @author Kohinurit limited
 * @since 2024-02-04
 */
trait CommonTraits
{
//    private $smsUrl = 'http://192.168.200.109:8080/pb/insert-sms';
    private $smsUrl = 'http://172.31.30.52/sms-insert-api/api/sms/insert-sms';
    public function postApiResponse($url, $body, $header)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    public function postApiCareerResponse($url, $body, $header)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            //CURLOPT_SSLCERT => '/etc/nginx/ssl/wildcard/star_padmabankbd_com_crt.pem',
//            CURLOPT_SSLKEY  => base_path() . '/ssl/star_padmabankbd_com.key',

            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function getApiResponse($url, $body, $header)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => $header,
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function ldap_info($username, $ldap)
    {
        $filter = "(sAMAccountName=$username)";
        $result = ldap_search($ldap, "dc=padmabankbd,dc=COM", $filter);
        $info = ldap_get_entries($ldap, $result);
        $jsonData = json_encode($info);
        // Output JSON data
        $data = array(
            'student_id' => $info[0]["description"][0],
            'user_name' => $info[0]["samaccountname"][0],
            'user_full_name' => $info[0]["displayname"][0],
            'user_email' => $info[0]["userprincipalname"][0],
            'phone_number' => (!empty($info[0]["telephonenumber"][0]))?$info[0]["telephonenumber"][0]:'',
            'status' => 'ok',
        );
        return $data;
    }

    function encrypt($msg, $key)
    {
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);

        $ciphertext_raw = openssl_encrypt($msg, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);

        return $ciphertext;

    }

    function decrypt($ciphermsg, $key)
    {
        $c = base64_decode($ciphermsg);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

        if (function_exists('hash_equals')) {
            if (hash_equals($hmac, $calcmac)) return $original_plaintext;
        } else {
            if ($this->hash_equals_custom($hmac, $calcmac)) return $original_plaintext;
        }

    }

    function sendMsg($phn,$msg){
        $data=array(
            "unique_id" => "lms_",
            "msisdn"=>array($phn),
            "sms_body"=>$msg
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->smsUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($data),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }

    }

}
