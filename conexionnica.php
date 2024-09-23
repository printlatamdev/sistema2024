<?php 
function getConn(){
  $mysqli = mysqli_connect('localhost', 'admin', 'AG784512', "nica22");
  if (mysqli_connect_errno($mysqli))
    echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
  $mysqli->set_charset('utf8');
  return $mysqli;
}