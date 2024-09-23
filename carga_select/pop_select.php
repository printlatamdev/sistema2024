<?php 


session_start();

function getContacto(){
  
  $id = $_POST['id'];
  
  
    require 'conexion.php';
    $mysqli = getConn();
    $query = "SELECT * FROM contacto where id_empresa='".$id."'";
    $result = $mysqli->query($query);
    $contact = '<option value="">SELECCIONE EL CONTACTO</option>';
    
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $contact .= "<option value='$row[nombre]'>$row[nombre]</option>";
   
    

  }
  
  return $contact;
  }
  
  	


echo getContacto();
?>