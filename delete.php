<?php
include('./conect2.php');
$mode = $_POST['mode'];

if($mode == 'schedule'){
    $sql = "DELETE FROM printers_maintenance WHERE id_printer='".$_POST['id']."'";
    if ($result = $mysqli->query($sql)) {
      // success message or further processing
      echo "Registro Eliminado Exitosamente";
    } else {
      // error message
      echo "Error deleting record: " . $mysqli->error;
    }
}else if($mode == 'addEquipo'){
    $sql = "DELETE FROM equipos_produccion WHERE id_equipo='".$_POST['id']."'";
    if ($result = $mysqli->query($sql)) {
      // success message or further processing
      echo "Registro Eliminado Exitosamente";
    } else {
      // error message
      echo "Error deleting record: " . $mysqli->error;
    }
}
