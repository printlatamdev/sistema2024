<?php




//*****************************************************************************
$curl = curl_init();



//cerfiticado ssl
$ubicación_certificado = 'C:\xampp_exit\perl\vendor\lib\Mozilla\CA\cacert.pem';
curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, $ubicación_certificado);
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, $ubicación_certificado);
//$pais=$_REQUEST['pais'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pay.davivienda.com.sv:8766/easypay-jwt-service/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('grant_type' => 'password','username' => 'COLOR_EN_LINEA2','password' => 'pQF@Q1XQnK'),
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


list($user, $token, $uid, $gid, $gecos, $home, $shell,$expi,$expi2) = explode(":", $response);
/*echo "PRIMERO: ".$user."<BR>";
echo "TOKEN: ".$pass."<BR>";
echo "TERCERO: ".$uid."<BR>";
echo "CUARTO: ".$gid."<BR>";
echo "QUINTO: ".$gecos."<BR>";
echo "SEXTO: ".$home."<BR>";
echo "SEPTIMO: ".$shell."<BR>";
echo "expiracion: ".$expi.$expi2."<BR>";*/
  
}
/*
$token2='eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOlsiVVNFUl9EQl9SRVNPVVJDRSIsIlVTRVJfQ0xJRU5UX1JFU09VUkNFIiwiVVNFUl9BRE1JTl9SRVNPVVJDRSJdLCJ1c2VyX25hbWUiOiJDT0xPUl9FTl9MSU5FQTIiLCJzY29wZSI6WyJyb2xlX3NlcnZpY2UiXSwiY29tcGFueSI6MzQxLCJleHAiOjE2MjY5MDAxODAsImV4cGlyYXRpb25fZGF0ZSI6IldlZCBKdWwgMjEgMTQ6NDM6MDAgQ1NUIDIwMjEiLCJhdXRob3JpdGllcyI6WyJyb2xlX3NlcnZpY2UiLCJjYW5fYWNjZXNzX3NlcnZpY2UiXSwianRpIjoiMjdmYTUwNjQtMjg1NC00YjQ5LWE1ZTItNmFjYTkwYTJkMzlmIiwiZW1haWwiOm51bGwsImNsaWVudF9pZCI6IkNPTE9SX0VOX0xJTkVBMSJ9.QL1kMLo5p9NoDYjc0_LznGOehm46zWii6ABEf3eB3qxMqn4vJcwGErCJUVXAmKWCs4TM9Yecs7XhVqgaNA9gsD4Ng_1QZ6ieIH1zTukYUIJ_r0orq0BNnj5PORxKbl5I1u_8fg5magZYYzRbdWHHR93sJrNfOBdcUeJrdE_cHlskEB6XAbHw3ConP4GmclaG2ZqtWvJ8z--v9LauVke1qQ86EtSb0UVtICBmv-QV_81wnddjorFFfsfJxsAPsWKrZV03pmEP5XnI-mI9RSWW3mnhTcK9t55OGf0W-GFsdyJSdsr9O-uuycJ1mR3TSet5GBGQO-xUi7sO-1CN7ec0Aw';

echo'<script type="text/javascript">
   
    window.location.href="recibe.php?token='.$token.'";
    </script>';




//echo $token;
/*
echo'<script type="text/javascript">
         window.location.href="recibe.php?token="'.$token.'"";
       </script>';  */


$token2=substr($token, 0, strrpos( $token, ','));


//$mainstr = "This is a sim'ple text;";

$token3 = str_replace('"', '', str_replace("'", "", $token2));

//echo $token3;

/*
echo'<script type="text/javascript">
   
    window.location.href="recibe.php?token='.$token3.'";
    </script>';
*/

echo $token3;














?>