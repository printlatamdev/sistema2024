<?php 
require_once 'conexion.php';

function getListasRep(){
  $mysqli = getConn();
  $query = 'SELECT * FROM  pais where siglas="SV" or siglas="NI"';
  $result = $mysqli->query($query);
  $pais = '<option value="0">SELECCIONE PAIS DE ORIGEN</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $pais .= "<option value='$row[siglas]'>$row[siglas]</option>";
  }
  return $pais;
}

echo getListasRep();