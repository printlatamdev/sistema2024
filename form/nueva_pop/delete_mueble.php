<?php 
	//$conexion=mysqli_connect('localhost','root','','esa19');

 session_start();

    $base=$_SESSION['base'];
$anio='22';
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


$id_detalle_orden=$_REQUEST['id'];
   
        $estado=0;



                                       $pop22  =$mysqli->query("SELECT id_orden from pop_detalle where id_detalle_orden='".$id_detalle_orden."' ");
                        while ($row122 = mysqli_fetch_array($pop22))
                                   {   
                                       $id_orden=$row122[0];
                                    
                                    }
//$id_orden=$_REQUEST['id'];
//$id_detalle=$_REQUEST['id_detalle'];



 $res2 = $mysqli->query("UPDATE pop_detalle SET estado='".$estado."' where id_detalle_orden='".$id_detalle_orden."'");



if ($res2==true) {

  echo'<script type="text/javascript">
   
    window.location.href="../../form3.php?delete=01&&id_orden='.$id_orden.'";
    </script>';
     
}
else{
echo'<script type="text/javascript">
   
    window.location.href="../../form3.php";
    </script>';
     
}
	



	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>