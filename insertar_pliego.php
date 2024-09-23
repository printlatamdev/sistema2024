<?php
	//$conexion=mysqli_connect('localhost','root','','esa19');
    	$host="localhost";

	$database="esa20";

	$username="root";

	$password="";

$pliego=$_FILES['pliego']['name'];
$ruta=$_FILES['pliego']['tmp_name'];
$extension=$_FILES['pliego']['type'];
$destino="../../../sistema/artes_esa17/".$pliego;
copy($ruta, $destino);




$id_detalle=$_POST['id_detalle'];
$id_orden=$_POST['id_orden'];
$tipo_pliego=$_POST['tipo_pliego'];
$id_material=$_POST['material'];
$id_equipo=$_POST['equipo'];
$impresion=$_POST['impresion'];
$base=$_POST['base'];
$altura=$_POST['altura'];
$cantidad=$_POST['cantidad'];
$nota=$_POST['nota'];




	$mysqli = new mysqli($host, $username, $password, $database);

	/* $pop =$mysqli->query("  SELECT  id_orden from pop order by id_orden desc LIMIT 1 ");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row1[0];
                                 
                                    }
*/
$pop =$mysqli->query("  select*from pop where id_orden='".$id_orden."'");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_empresa=$row1['id_empresa'];
                                       $empresa=$row1['empresa'];
                                 
                                    }
$equipos =$mysqli->query("  select*from equipo where id_equipo='".$id_equipo."'");
                        while ($row14 = mysqli_fetch_array($equipos))
                                   {   
                                    
                                       $n_equipo=$row1['nombre'];
                                 
                                    }

   $material =$mysqli->query("  select*from material where id='".$id_material."'");
                        while ($row14 = mysqli_fetch_array($equipos))
                                   {   
                                    
                                       $n_material=$row1['tipo'];
                                 
                                    }                                 





   
        

	//$password=sha1($_POST['password']);


 $res = $mysqli->query("INSERT INTO pop_pliego (id_orden,id_detalle, id_empresa,empresa,cantidad,base, altura,id_equipo, equipo, id_material, material, detalle, arte, pliego)
			values ('$id_orden','$id_detalle','$id_empresa','$empresa','$cantidad','$base','$altura','$id_equipo','$n_equipo','$id_material','$n_material','$nota','$pliego','$tipo_pliego')");


if ($res==true) {

  echo'<script type="text/javascript">
   
    window.location.href="../../form4.php";
    </script>';
     
}
else{

}
	



	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>