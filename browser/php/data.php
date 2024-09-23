<?

	$host="localhost";
	$database="esa20";
	$username="admin";
	$password=""; 
	$dbh=mysql_connect ($host, $username, $password) or die ('No se puede conectar por: ' . mysql_error());
	mysql_select_db($database);
    //$database2="sistema_outcl_15";

?>