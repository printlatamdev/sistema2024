<?php 
	//$conexion=mysqli_connect('localhost','admin','AG784512','esa19');
     session_start(); 
 

    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
  $host="localhost";

	$database=$bd;

	$username="admin";  

	$password="AG784512";

$id_detalle_orden=$_REQUEST['id_detalle'];
$opcion=$_REQUEST['proc'];

$mysqli = new mysqli($host, $username, $password, $database);

$opeq =$mysqli->query("  SELECT  id_orden from orden_detalle where id_detalle_orden='".$id_detalle_orden."' ");
                        while ($roweq = mysqli_fetch_array($opeq))
                                   {   
                                       $id_orden=$roweq[0];
                                       
                                 
                                    }

	
if ($opcion=="diseno") {
   $res = $mysqli->query("UPDATE orden SET computo='0' where id_orden='".$id_orden."'");
   $res2 = $mysqli->query("UPDATE orden_detalle SET computo='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");



      if ($res==true && $res2==true) {

        echo'<script type="text/javascript">
         
          window.location.href="../../ordenesop_activas.php";
          </script>';
           
      }
      else{
              echo'error';
               
          }
}
if ($opcion=="impresion") {
  $res = $mysqli->query("UPDATE orden SET impresion='0' where id_orden='".$id_orden."'");
   $res2 = $mysqli->query("UPDATE orden_detalle SET impresion='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");



      if ($res==true && $res2==true) {

        echo'<script type="text/javascript">
         
          window.location.href="../../ordenesop_activas.php";
          </script>';
           
      }
      else{
              echo'error';
               
          }
}

$conimpreo=0;
$concompuo=0;
$conimpreod=0;
$concompuod=0;

$impre =$mysqli->query("  SELECT  computo, impresion from orden_detalle where id_orden='".$id_orden."' ");
                        while ($rowim = mysqli_fetch_array($impre))
                                   {   
                                       $impres_od=$rowim[0];
                                       $compu_od=$rowim[1];
                                       if ( $impres_od=="PENDIENTE") {
                                         $conimpreod++;
                                       }
                                       if ($compu_od=="PENDIENTE") {
                                        $concompuod++;
                                       }
                                 
                                    }
$compu =$mysqli->query("  SELECT  computo, impresion from orden where id_orden='".$id_orden."' ");
                        while ($rowim = mysqli_fetch_array($compu))
                                   {   
                                       $impres_o=$rowim[0];
                                       $compu_o=$rowim[1];
                                       if ( $impres_o=="PENDIENTE") {
                                         $conimpreo++;
                                       }
                                       if ($compu_o=="PENDIENTE") {
                                        $concompuo++;
                                       }
                                 
                                    }


if ($conimpreod==0 && $conimpreo==0 && $concompuod==0 && $concompuo==0 ) {
  $res = $mysqli->query("UPDATE orden SET estado='0' where id_orden='".$id_orden."'");
  $res2 = $mysqli->query("UPDATE orden_detalle SET estado='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");
}



 
  




	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>