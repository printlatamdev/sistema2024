<?php
    include("session.php");

		include ('connect.php');

    $id=$_REQUEST['id'];

    $rs2=$mysqli->query("SELECT archivo FROM `compra` WHERE `id_compra` = '".$id."' ");

    while ($fila = $rs2->fetch_assoc()) {  
      echo  $nombre=$fila['archivo']; 
    }

    $destination = 'ordenes_compra_'.$_SESSION['base'].$_SESSION['year'].'/'. $nombre;
  
    
    $mysqli->close();
      
    exec('lpr /mnt/htdocs/html/sistema2024/documentos/envios/envio.pdf');

 
?>