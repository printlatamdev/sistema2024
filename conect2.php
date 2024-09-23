<?php
    session_start();

	$host="localhost";
	$database=$_SESSION['base'];
	$year = $_SESSION['year'];
	$db = $database.$year;

	$username="admin";
	$password="AG784512";

	$mysqli = new mysqli($host, $username, $password, $db);
	if ($mysqli->connect_errno) {
		echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}


?>