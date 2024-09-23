<?php 
	//$conexion=mysqli_connect('localhost','root','','esa19');
     session_start(); 
 

    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
  $host="localhost";

	$database=$bd;

	$username="root";  

	$password="";

  $mysqli = new mysqli($host, $username, $password, $database);


   $id_detalle_orden=$_REQUEST['id_detalle_orden'];

  //PARAMETROS NUEVOS PARA OP
    $aleatorio=rand(1, 100);
    $trabajo=$_POST['trabajo'];
    $id_equipo=$_POST['equipo'];
    $tiro=$_POST['impresion'];
    $id_material=$_POST['material'];
    $id_laminado=$_POST['laminado'];
    $id_rigido=$_POST['rigido'];

    $cantidad=$_POST['cantidad'];
    $base=$_POST['base'];
    $altura=$_POST['altura'];

    $cotizacion=$_POST['cotizacion'];
    $nota=$_POST['nota'];
    $acabados=$_POST['acabados'];
      //FIN PARAMETROS OP

    //CONSULTAS PARA SACAR APARTADOS
    $opeq =$mysqli->query("  SELECT  nombre from equipo  where id_equipo='".$id_equipo."' ");
                        while ($roweq = mysqli_fetch_array($opeq))
                                   {   
                                       $equipo=$roweq[0];
                                       
                                 
                                    }
if ($id_material==0) {
  $material="Ninguno";
} else {
  $opm =$mysqli->query("  SELECT  tipo from material  where id='".$id_material."' ");
                        while ($rowm = mysqli_fetch_array($opm))
                                   {   
                                       $material=$rowm[0];
                                       
                                 
                                    }
}
if ($id_rigido==0) {
  $rigido="Ninguno";
} else {
  $opr =$mysqli->query("  SELECT  tipo from material  where id='".$id_rigido."' ");
                        while ($rowr = mysqli_fetch_array($opr))
                                   {   
                                       $rigido=$rowr[0];
                                       
                                 
                                    }
}
if ($id_laminado==0) {
  $laminado="Ninguno";
} else {
  $opl =$mysqli->query("  SELECT  tipo from material  where id='".$id_laminado."' ");
                        while ($rowl = mysqli_fetch_array($opl))
                                   {   
                                       $laminado=$rowl[0];
                                       
                                 
                                    }
}
    
    






//$mueble=$_POST['mueble'];
// $cantidad=$_POST['cantidad'];
//$base=$_POST['base'];
//$altura=$_POST['altura'];
//$fondo=$_POST['fondo'];
//$cotizacion=$_POST['cotizacion'];
//$nota=$_POST['nota'];




	

	 $op=$mysqli->query("  SELECT  id_orden from campos_detalle where id_detalle_orden='".$id_detalle_orden."'");
                        while ($row1 = mysqli_fetch_array($op))
                                   {   
                                       $id_orden=$row1[0];
                                 
                                    }


  $artes=$_FILES['artes']['name'];
    $arte="ARTE_UPDATE_".$id_orden."_".$aleatorio.".jpg";
    $ruta=$_FILES['artes']['tmp_name'];
    $extension=$_FILES['artes']['type'];
    $destino="../../ORDENES_OP/CAMPOS/".$id_orden."/ARTES/".$arte;
    copy($ruta, $destino);




   
        

	//$password=sha1($_POST['password']);


 /*$res = $mysqli->query("INSERT INTO pop_detalle (id_orden,id_empresa,empresa,cantidad,base, altura,trabajo,cot, detalle, arte, fondo)
			values ('$id_orden','$id_empresa','$empresa','$cantidad','$base','$altura','$mueble','$cotizacion','$nota','$arte','$fondo')");

*/
      

//PARAMETROS NUEVOS PARA OP
    $aleatorio=rand(1, 100);
    $trabajo=$_POST['trabajo'];
    $id_equipo=$_POST['equipo'];
    $tiro=$_POST['impresion'];
    $id_material=$_POST['material'];
    $id_laminado=$_POST['laminado'];
    $id_rigido=$_POST['rigido'];

    $cantidad=$_POST['cantidad'];
    $base=$_POST['base'];
    $altura=$_POST['altura'];

    $cotizacion=$_POST['cotizacion'];
    $nota=$_POST['nota'];
    $acabados=$_POST['acabados'];

 $res2 = $mysqli->query("UPDATE campos_detalle SET cantidad='".$cantidad."', base='".$base."', altura='".$altura."', trabajo='".$trabajo."', cot='".$cotizacion."', id_equipo='".$id_equipo."', equipo='".$equipo."', id_material='".$id_material."', material='".$material."', id_rigido='".$id_rigido."', rigido='".$rigido."', id_laminado='".$id_laminado."',laminado='".$laminado."', tiro='".$tiro."', detalle='".$nota."', arte='".$arte."', acabado='".$acabados."' where id_detalle_orden='".$id_detalle_orden."'");

 



if ($res2==true) {

  echo'<script type="text/javascript">
   
    window.location.href="../../formop3_campos.php?modificado=01&&id_orden='.$id_orden.'";
    </script>';
     
}
else{

  echo'error';

     
}
  




	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>