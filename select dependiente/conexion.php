<?php
$con = new mysqli("localhost", "admin","", "esa20");
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
?>
