<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");

$status       = $_POST["status"];
$id_cliente = $_POST["id_cliente"];
$id_orden = $_POST["id_orden"];
$nombre_cliente=$_POST["nombre"];
$destino = $_POST["destino"];
$marca=  $_POST["destino"];
$correo=  $_POST["correo"];

$origen=  $_POST["origen"];



//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

if($origen=="sv"){


	 include ('../connect3.php');


	$fecha =date('d/m/Y h:i:s a');
$res2 = $mysqli->query("INSERT INTO bitacora_s (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");

$res = $mysqli->query("update logitica SET status='".$status."' where id_orden='".$id_orden."'");

if($res==true && $correo=="Si" && $res2==true){

 require 'PHPMailer/PHPMailerAutoload.php';
	//require 'conexion.php';
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";//Modificar
	$mail->Host = "smtp.gmail.com";//Modificar
	$mail->Port = 465;//Modificar
	$mail->Username = "infocd.dontreply@gmail.com";  //Modificar
	$mail->Password = "Inf@Color10";  //Modificar
	
	$mail->setFrom('infocd.dontreply@gmail.com', 'Aviso Importante!');//Modificar
	
	$mail->addAddress('produccion@vyasal.com', 'sistemas');//Modificar
	
	$mail->Subject = 'Envio de Producto';//Modificar
	if ($status=="Cargando") {
		$mail->Body = "Color Digital le informa a nuestro cliente : ".$nombre_cliente." que su pedido con destino a ".$destino." en este momento  se encuentra ".$status;
		# code...
	}
	else{

	$mail->Body = "Color Digital le informa a nuestro cliente : ".$nombre_cliente." que su pedido con destino a ".$destino." en este momento  se encuentra en ".$status;	
	}

	$mail->IsHTML(true);
	
	if($mail->send()){


		echo'<script type="text/javascript">
    alert("Correo Enviado al CLiente notificandole el nuevo status");
    window.location.href="../editar_logistica.php";
    </script>';
}}
	elseif ($res==true && $correo=="No" && $res2==true) {


		echo'<script type="text/javascript">
    alert("Status Actualizado, No se envio correo al cliente");
    window.location.href="../editar_logistica.php";
    </script>';
		# code...
	}


	 //Modificar
	
		
		else {
		echo 'Error';
	}

}


else{

 include ('../connect2.php');
$fecha =date('d/m/Y h:i:s a');
$res2 = $mysqli->query("INSERT INTO bitacora_s (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");

$res = $mysqli->query("update logitica SET status='".$status."' where id_orden='".$id_orden."'");

if($res==true && $correo=="Si" && $res2==true){

 require 'PHPMailer/PHPMailerAutoload.php';
	//require 'conexion.php';
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";//Modificar
	$mail->Host = "smtp.gmail.com";//Modificar
	$mail->Port = 465;//Modificar
	$mail->Username = "infocd.dontreply@gmail.com";  //Modificar
	$mail->Password = "Inf@Color10";  //Modificar
	
	$mail->setFrom('infocd.dontreply@gmail.com', 'Aviso Importante!');//Modificar
	
	$mail->addAddress('produccion@vyasal.com', 'sistemas');//Modificar
	
	$mail->Subject = 'Envio de Producto';//Modificar
	if ($status=="Cargando") {
		$mail->Body = "Color Digital le informa a nuestro cliente : ".$nombre_cliente." que su pedido con destino a ".$destino." en este momento  se encuentra ".$status;
		# code...
	}
	else{

	$mail->Body = "Color Digital le informa a nuestro cliente : ".$nombre_cliente." que su pedido con destino a ".$destino." en este momento  se encuentra en ".$status;	
	}

	$mail->IsHTML(true);
	
	if($mail->send()){


		echo'<script type="text/javascript">
    alert("Correo Enviado al CLiente notificandole el nuevo status");
    window.location.href="../editar_logistica_ni.php";
    </script>';
}}
	elseif ($res==true && $correo=="No" && $res2==true) {


		echo'<script type="text/javascript">
    alert("Status Actualizado, No se envio correo al cliente");
    window.location.href="../editar_logistica_ni.php";
    </script>';
		# code...
	}


	 //Modificar
	
		
		else {
		echo 'Error';
	}



















}







?>