<?php
session_start();
include ('../connectin.php');

$n_orden= $_REQUEST["n_orden"];
$fecha =date('d/m/Y h:i:s');
$estado = 0;

$res = $mysqli->query("update solicitud_despacho SET estado='".$estado."', fecha_anulado='".$fecha."' where n_orden='".$n_orden."'");

if($res==true){
    echo 
    '<script type="text/javascript">
    alert("SOLICITUD ANULADA CON EXITO");
    window.location.href="../solicitudes_elsalvador.php";
    </script>';
}else{ echo "ha ocurrido un error";}
	

?>