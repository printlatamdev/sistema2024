<?php

 include ("../connect.php");
//$con = conexion();
 include("../session.php");

//$id       = $_POST["id"];
 $receptor=$_POST["usuarios"];
 $ip=$_SERVER["REMOTE_ADDR"];
 $mensaje=$_POST["mensaje"];

$estado=1;




 
	//include ("../connect.php");

$res = $mysqli->query("INSERT INTO anuncio (receptor,emisor,anuncio,estado) VALUES ('".$receptor."','".$ip."','".$mensaje."','".$estado."')");







if($res==true){
  echo'<script type="text/javascript">
    alert("Tinta Ingresada Correctamente");
    window.location.href="../ingresar_mensaje.php";
    </script>';
}



else{

//echo $codigo.$nombre.$medida;

}

















?>