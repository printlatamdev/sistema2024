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

	$username="admin";  

	$password="";
	$mysqli = new mysqli($host, $username, $password, $database);


//$id_orden=$_REQUEST['id'];
//$id_detalle=$_REQUEST['id_detalle'];
$id_detalle_orden=$_REQUEST['id'];
   
        $estado=0;


 $res2 = $mysqli->query("UPDATE pop_detalle SET estado='".$estado."' where id_detalle_orden='".$id_detalle_orden."'");



if ($res2==true) {

  echo'<script type="text/javascript">
   
    window.location.href="../../form3.php?delete=01";
    </script>';
     
}
else{
echo'<script type="text/javascript">
   
    window.location.href="../../formop3.php";
    </script>';
     
}
	



	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>