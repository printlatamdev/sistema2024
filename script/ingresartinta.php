<?php
  session_start();
  $base=$_SESSION['base'];
  $anio=$_SESSION['year'];
  $bd=$base.$anio;
  $host="localhost";
  $database=$bd;
  $username="root";
  $password="";

  $mysqli = new mysqli($host,$username,$password,$database);

  $codigo= $_POST["codigo"];
  $nombre=$_POST["nom_material"];
  $medida=$_POST["medida"];
  $estado=1;


  // Check connection
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }

  $res = $mysqli->query("INSERT INTO tinta_tipo(tipo, medida,codigo, estado) VALUES ('$nombre','$medida','$codigo','$estado')");

  if($res === true){
    echo'<script type="text/javascript">
    alert("Tinta Ingresada Correctamente");
    window.location.href="../suministros.reporte.tintas2.php";
    </script>';
  }else{
    var_dump($mysqli->connect_errno);
    var_dump($mysqli->use_result());
  /*   echo"<script type='text/javascript'>
    alert('No se ejecuto la solicitud');
    window.location.href='../suministros.ingreso.nuevo.tinta2.php';
    </script>"; */
  }

  $mysqli -> close();

?>