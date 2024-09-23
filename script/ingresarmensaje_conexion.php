<?php

 include ("../connect.php");
//$con = conexion();
 include("../session.php");

//$id       = $_POST["id"];
 $receptor=$_POST["usuarios"];
 
 $ip=$_SERVER["REMOTE_ADDR"];
 $mensaje=$_POST["mensaje"];
 $emisor=$_SESSION['username'];
 $fechaenvio=date('d/m/Y h:i:s a');

$estado=1;
echo $receptor;
				   
$rsx=$mysqli->query("SELECT  nivel FROM usuarios where nombre='".$receptor."' ");

while ($fila = $rsx->fetch_row()) { $nivel=$fila[0];  }
																
																 




 
	//include ("../connect.php");

$res = $mysqli->query("INSERT INTO anuncio (receptor,emisor,ip,fecha_envio,anuncio,estado,nivel) VALUES ('".$receptor."','".$emisor."','".$ip."','".$fechaenvio."','".$mensaje."','".$estado."','".$nivel."')");







if($res==true){
  echo'<script type="text/javascript">
    alert("Mensaje Ingresado Correctamente");
    window.location.href="../ingresar_mensaje.php";
    </script>';
}



else{

//echo $codigo.$nombre.$medida;

}

















?>