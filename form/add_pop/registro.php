<?php
 session_start(); 
 

    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
	$host="localhost";

	$database=$bd;

	$username="admin";  

	$password="AG784512";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}


//variables POST
$proyecto=$_POST['proyecto'];
$cliente=$_POST['cliente'];
//$vendedor=$_REQUEST['vendedor'];
$vendedor=$_POST['vendedor'];
//$pais=$_REQUEST['pais'];
//$fecha=$_REQUEST['fecha'];


//registra los datos del empleados
//$sql="INSERT INTO empleados (nombres, departamento, sueldo) VALUES ('$nom','$dep',$suel)";

//mysqli_query($sql,$con);
$sql = $mysqli->query("INSERT INTO ajax(proyecto, cliente, contacto) VALUES ('$proyecto','$cliente','$vendedor')");




include('consulta.php');
?>