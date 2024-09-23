<?php
    // session_start(); 
    
	$host="localhost";

	$database="esa22";

	$username="root";  

	$password="";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}


?>