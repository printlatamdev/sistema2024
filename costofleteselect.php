<?php 
require_once 'conexion.php';

function getListasRep(){
  $id = $_POST['id'];
  $peso = $_POST['peso'];

  $mysqli = getConn();
  $query = "SELECT * FROM  flete where destino='".$id."' and peso='".$peso."'";
  $result = $mysqli->query($query);
  $pais = '<option value="0">SELECCIONE EL VALOR DEL FLETE</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $pais .= "<option value='$row[flete]'>$row[flete]</option>";
  }
  return $pais;
}

echo getListasRep();