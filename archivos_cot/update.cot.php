<?php
  session_start();
include('../suministros/connect.php');
//$con = conexion();
// include("../session.php");

$id = $_POST["id"];
$id_empresa = $_POST["empresa"];
$id_contacto =  $_POST["contacto"];
$id_vendedor =  $_POST["vendedor"];

$consulta = $mysqli->query(" select*from empresa where id_empresa='" . $id_empresa . "'");

while ($row = mysqli_fetch_array($consulta)) {
  // echo "Entra";
  $empresa = $row['nombre'];
}


$consulta2 = $mysqli->query(" select*from contacto where id_contacto='" . $id_contacto . "'");


while ($row2 = mysqli_fetch_array($consulta2)) {

  $contacto = $row2['nombre'];
}


$consulta3 = $mysqli->query(" select*from vendedores where id='" . $id_vendedor . "'");


while ($row3 = mysqli_fetch_array($consulta3)) {

  $vendedor = $row3['nombre'];
}



//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";


$res = $mysqli->query("update cotizacion SET id_contacto='" . $id_contacto . "', contacto='" . $contacto . "',id_vendedor='" . $id_vendedor . "', vendedor='" . $vendedor . "',id_empresa='" . $id_empresa . "',empresa='" . $empresa . "' where id_cotizacion='" . $id . "'");
if ($res == true) {
  echo '<script type="text/javascript">
    alert("Actualizado Correctamente");
    window.location.href="../cot_detalle.php?orden=' . $id . '";
    </script>';
} else {
  echo 'error';
}
