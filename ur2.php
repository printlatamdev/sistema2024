<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.davivienda.com.sv:8766/easypay-jwt-service/oauth/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('grant_type' => 'password','username' => 'COLOR_EN_LINEA2','password' => 'pQF@Q1XQnK'),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Basic Q09MT1JfRU5fTElORUExOnBEMDVFQGQ0MTE=',
    'Cookie: session_pay=ffffffffaf111f5845525d5f4f58455e445a4a42140e'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>