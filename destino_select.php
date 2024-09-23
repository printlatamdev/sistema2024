<?php 
require_once 'conexion.php';

function getListasRep(){
  $mysqli = getConn();
  $query = 'SELECT * FROM  pais ';
  $result = $mysqli->query($query);
  $pais = '<option value="0">SELECCIONE PAIS DE DESTINO</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $pais .= "<option value='$row[siglas]'>$row[siglas]</option>";
  }
  return $pais;
}

echo getListasRep();