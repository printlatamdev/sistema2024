 <?$carpeta_envio = "caja_nica20";
 $com="caja_nica20/comprobante/";
  $re="caja_nica20/recibos/";
   $tra="caja_nica20/tranfer/";
    if (!file_exists($carpeta_envio)) {
    mkdir($carpeta_envio, 0777, true);
 mkdir($com, 0777, true);
mkdir($re, 0777, true);
mkdir($tra, 0777, true);}

    ?>