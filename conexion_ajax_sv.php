<?php
	
    // DB credentials.
    session_start();
    $base=$_SESSION['base'];
     //$anio=$_SESSION['year'];
    $anio=22;
    $bd=$base.$anio;

	define('DB_HOST','localhost');
	define('DB_USER','admin');
	define('DB_PASS','AG784512');
	define('DB_NAME','esa21');
	# conectare la base de datos
    $conexion=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$conexion){
        die("imposible conectarse: ".mysqli_error($conexion));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
