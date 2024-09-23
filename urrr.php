<?php




//*****************************************************************************
$curl = curl_init();


C:\xampp_exit\perl\vendor\lib\Mozilla\CA

$ubicación_certificado = 'C:\xampp_exit\perl\vendor\lib\Mozilla\CA\cacert.pem';
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, $ubicación_certificado);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, $ubicación_certificado);
//$pais=$_REQUEST['pais'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pay.davivienda.com.sv:8766/easypay-jwt-service/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => array('grant_type' => 'password','username' => 'COLOR_EN_LINEA2','password' => 'Q1XQnK'),
  CURLOPT_HTTPHEADER => array(
    "Accept: application/json",
    "Authorization: Basic Q09MT1JfRU5fTElORUExOnBEMDVFQGQ0MTE",
    "Cookie: session_pay=ffffffffaf111f5845525d5f4f58455e445a4a42140e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $objeto = json_decode($response);

echo $response;
  
}



















?>