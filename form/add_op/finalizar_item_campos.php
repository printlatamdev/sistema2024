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

$opeq =$mysqli->query("  SELECT  id_orden from campos_detalle where id_detalle_orden='".$id_detalle_orden."' ");
                        while ($roweq = mysqli_fetch_array($opeq))
                                   {   
                                       $id_orden=$roweq[0];
                                       
                                 
                                    }
                                    

  
if ($opcion=="diseno") {
   
   $res2 = $mysqli->query("UPDATE campos_detalle SET computo='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");


}
if ($opcion=="impresion") {
  
   $res2 = $mysqli->query("UPDATE campos_detalle SET impresion='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");
}


      
$conimpreo=0;
$concompuo=0;
$conimpreod=0;
$concompuod=0;
$fin=0;

$impre =$mysqli->query("  SELECT  computo, impresion from campos_detalle where id_orden='".$id_orden."' ");
                        while ($rowim = mysqli_fetch_array($impre))
                                   {   
                                       $compu_od=$rowim[0];
                                       $impres_od=$rowim[1];
                                       if ( $impres_od=="PENDIENTE") {
                                         $conimpreod++;
                                       }
                                       if ($compu_od=="PENDIENTE") {
                                        $concompuod++;
                                       }
                                 
                                    }
$compu =$mysqli->query("  SELECT  computo, impresion from campos where id_orden='".$id_orden."' ");
                        while ($rowim = mysqli_fetch_array($compu))
                                   {   
                                       $impres_o=$rowim[1];
                                       $compu_o=$rowim[0];
                                       if ( $impres_o==0) {
                                         $conimpreo++;
                                       }
                                       if ($compu_o==0) {
                                        $concompuo++;
                                       }
                                 
                                    }

if ($concompuod==0) {
   
   $resx = $mysqli->query("UPDATE campos SET computo='".$fin."' where id_orden='".$id_orden."'");


}
if ($conimpreod==0) {
  
   $resy = $mysqli->query("UPDATE campos SET impresion='".$fin."' where id_orden='".$id_orden."'");
}





if ($conimpreod==0 && $concompuod==0  ) {
  $res3 = $mysqli->query("UPDATE campos SET estado='".$fin."' where id_orden='".$id_orden."'");
  $res4 = $mysqli->query("UPDATE campos_detalle SET estado='FINALIZADA' where id_detalle_orden='".$id_detalle_orden."'");
}

if ($res2==true) {

        echo'<script type="text/javascript">
         
          window.location.href="../../ordenesop_activas_campos.php";
          </script>';
           
      }
      else{
              echo'error';
               
          }


 
  




	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>