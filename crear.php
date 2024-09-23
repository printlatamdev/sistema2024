<?


//$carpeta_artes1 = "firma/";
//$carpeta_artes2 = "DOCUMENTOS_TEMP/NI/";
//$carpeta_artes2 = "ci/respaldo_pagos/nica21/comprobantesServicios/";
/*$carpeta_artes2 = "SUCURSALES_COLGATE/31/";
$carpeta_artes3 = "SUCURSALES/58/";
$carpeta_artes4 = "SUCURSALES/59/";


if (!file_exists($carpeta_artes1)) {

mkdir($carpeta_artes1, 0777, true);
}
*/
for ($i = 1; $i <=146 ; $i++) {
   $carpeta_artes2 = "CAMPANAS/AXE_ICE/".$i."/";
   if (!file_exists($carpeta_artes2)) {
      mkdir($carpeta_artes2, 0777, true);
   }
}




/*
if (!file_exists($carpeta_artes1)) {

mkdir($carpeta_artes1, 0777, true);
}


/*if (!file_exists($carpeta_artes2)) {

mkdir($carpeta_artes2, 0777, true);
}


/*if (!file_exists($carpeta_artes3)) {

mkdir($carpeta_artes3, 0777, true);
}

if (!file_exists($carpeta_artes4)) {

mkdir($carpeta_artes4, 0777, true);
}*/




?>