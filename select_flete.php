<?php 


session_start();

function getVideos(){
  
  $id = $_POST['id'];
  
 
    require 'conexion.php';
    $mysqli = getConn();
   $query = "select distinct peso from flete where destino='".$id."'";
    $result = $mysqli->query($query);
    $pop = '<option value="0">SELECCIONE EL PESO DEL CAMION</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $pop .= "<option value='$row[peso]'>$row[peso] TONELADAS</option>";
  }
  
  return $pop;
  } 
  

echo getVideos();