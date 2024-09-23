<?php
$q = $_REQUEST['q'];




session_start();

    $base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;

$con = mysqli_connect('localhost','root','',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
$sql="SELECT * FROM pop_detalle WHERE id_orden = '".$q."'";
$sql2="SELECT * FROM pop_pliego WHERE id_detalle = '".$q."'";
$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);





while($row = mysqli_fetch_array($result)) {
   
    $empresa=$row['empresa'];
  $cantidad=$row['cantidad'];
  $base=$row['base'];
   $altura=$row['altura'];
      $fondo=$row['fondo'];
   $trabajo=$row['trabajo'];
   $detalle=$row['detalle'];
     $arte=$row['arte'];
    
}

echo $empresa;
//echo "</table>";
mysqli_close($con);
?>