<?php

 include ('../connect.php');
//$con = conexion();
 include("../session.php");

 $id_prueba= $_GET["id"];
/*
$capacidad= $_POST["capacidad"];
$id= $_POST["id"];
$origen=  $_POST["origen"];

*/

//echo $carta, $manifiesto, $duca_t, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

 $consulta =$mysqli->query("  SELECT id_prueba, id_empresa, id_marca, nombre,fecha,empresa,marca,estado from pop_prueba_proyecto WHERE id_prueba='".$id_prueba."'
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {


                                   	$id_prueba=$row[0];
                                   	$id_empresa=$row[1];
                                   	$id_marca=$row[2];
                                   	$nombre=$row[3];
                                   	//$fecha=$row[4];
                                   	$empresa=$row[5];
                                   	$marca=$row[6];

                                   	//$estado=$row[7];
                                   	


                                   }


	//include ('../connect.php');
     $estado=0;
               $fecha =date('Y-m-d ');
$res2 = $mysqli->query("UPDATE pop_prueba_proyecto SET estado='".$estado."' where id_prueba='".$id_prueba."'");

if($res2==true){

  
    

echo'<script type="text/javascript">
    alert("LA POD HA SIDO NEGADA");
    window.location.href="../pruebas_activas.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error".$id_prueba;
}






?>