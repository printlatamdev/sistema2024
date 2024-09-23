<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");

$id_orden = $_POST["id"];

//INSERTANDO FOTO EN LA TABLA foto_log
if(isset($_FILES['file_array'])){

    //almacenamos las propiedades de las imagenes
    $name_array = $_FILES['file_array']['name'];
    $tmp_name_array = $_FILES['file_array']['tmp_name'];
    $type_array = $_FILES['file_array']['type'];
    $size_array = $_FILES['file_array']['size'];
    $error_array = $_FILES['file_array']['error'];

    //recorremos el array de imagenes para subirlas al simultaneo

    for($i = 0; $i < count($tmp_name_array); $i++){


            
        //almacenandolo en la carpeta artes_esa17
        
        if(move_uploaded_file($tmp_name_array[$i], "../artes_esa17/".$name_array[$i])){


           //$foto=$name_array[0];
           // $id=74;
            $estado=1;
            $evento="entrega";

            //guardamos en la base de datos el nombre
               $res= $mysqli->query("insert into foto_log (id_orden,foto,estado,evento) values ('".$id_orden."','".$name_array[$i]."','".$estado."','".$evento."')");



            //echo $o;
           

                
                
        }
      
        
    }

    
}



$nota_envio=$_FILES['nota_envio']['name'];
$ruta=$_FILES['nota_envio']['tmp_name'];
$extension=$_FILES['nota_envio']['type'];
$destino="../artes_esa17/".$nota_envio;

$estado=0;

//echo $id_orden, $f_entrega, $nota_envio;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";
$status="ENTREGADO";
$fechafin=date('d/m/Y h:i:s a');

//ACTUALIZANDO DOCUMENTOS
$res = $mysqli->query("update logitica SET comprobante_entrega='".$nota_envio."' , status='".$status."' ,  fo_entrega='".$f_entrega."' ,  estado='".$estado."'  where id_orden='".$id_orden."'");
//INSERTANDO ESTATUS ENTREGADO EN LA TABLA bitacora_s
$resn = $mysqli->query("INSERT INTO bitacora_s (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fechafin."')");









if($res==true && $resn==true){

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
	
	$mail->Subject = 'Entrega Finalizada';//Modificar
	
		$mail->Body = "Nueva Logistica Terminada Orden No.'".$id_orden."'";
		# code...
	

	 //Modificar
	$mail->IsHTML(true);
	
	if($mail->send()){

  echo'<script type="text/javascript">
    alert("Correo Enviado al cliente notificandole el cierre de su envio");
    window.location.href="../editar_logistica.php";
    </script>';
		
		} else {
		echo 'Error';
	}



}

else{
	echo "ha ocurrido un error";
}



?>