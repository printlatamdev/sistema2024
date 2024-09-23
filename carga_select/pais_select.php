<?php 
require_once 'conexion.php';

function getCliente(){
  $mysqli = getConn();
  $query = 'SELECT * FROM empresa';
  $result = $mysqli->query($query);
  $cliente = '<option value="">SELECCIONE EL CLIENTE</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $cliente .= "<option value='$row[id_empresa]'>$row[nombre]</option>";
  }
  return $cliente;
}

echo getCliente();