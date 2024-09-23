<?php
	
    // DB credentials.
    session_start();
    $base=$_SESSION['base'];
    $anio=$_SESSION['year'];
    $bd=$base.$anio;

	define('DB_HOST','localhost');
	define('DB_USER','admin');
	define('DB_PASS','AG784512');
	define('DB_NAME','esa19');
	# conectare la base de datos
    $con2=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con2){
        die("imposible conectarse: ".mysqli_error($con2));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
