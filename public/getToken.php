<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => '172.31.10.97:5162/api/auth/GetToekn',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('userId' => 'PBL_DAS','password' => 'Pbl@1234'),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic QzBDNEE1MEEtNzY1QS00NjI4LTlCM0EtMTQ1RUJFNERCRDZEOmZsb3JhQDIwMjA='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

