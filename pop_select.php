<?php 


session_start();

function getVideos(){
  
  $id = $_POST['id'];
  
  if ($id=="NI") {
    require 'conexionnica.php';
    $mysqli = getConn();
   $query = "select t1.id_orden, t1.id_empresa, t1.empresa, t1.id_proyecto, t2.id_proyecto, t1.estado, t2.nombre, t2.id_marca, t2.marca from pop t1 inner join pop_proyecto t2 on t1.id_proyecto=t2.id_proyecto 
      order by t1.id_orden desc";
    $result = $mysqli->query($query);
    $pop = '<option value="0">SELECCIONE LA ORDEN</option>';
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $pop .= "<option value='$row[id_orden]'>$row[id_orden]</option>";
   
    

  }
  
  return $pop;
  } 
  if($id=="SV"){
    require 'conexion.php';
    $mysqli = getConn();
    $query = "select t1.id_orden, t1.id_empresa, t1.empresa, t1.id_proyecto, t2.id_proyecto, t1.estado, t2.nombre, t2.id_marca, t2.marca from pop t1 inner join pop_proyecto t2 on t1.id_proyecto=t2.id_proyecto 
      order by t1.id_orden desc";
    $result = $mysqli->query($query);
    $pop = '<option value="0">SELECCIONE LA ORDEN</option>';
    
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $pop .= "
     
      <option value='$row[id_orden]'>$row[id_orden]</option>";
   
    

  }
  
  return $pop;
  }
  
  	
}

echo getVideos();