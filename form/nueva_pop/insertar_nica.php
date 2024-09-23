<?php 
  //$conexion=mysqli_connect('localhost','root','','esa19');
session_start();
//$base=$_SESSION['base'];
//$anio=$_SESSION['year'];
//$bd=$base.$anio;

$conexion = mysqli_connect('localhost','root','','nica22');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,'nica22');
      $host="localhost";

  $database=$bd;

  $username="root";  

  $password="";

$id_empresa=$_POST['cliente'];
$id_contacto=$_POST['contacto'];
$fecha=$_POST['fecha'];
$vendedor=$_POST['vendedor'];
$status_inicial=1;
$pais=$_POST['pais'];
$id_proyecto=$_POST['proyecto'];



  
  

  $mysqli = new mysqli($host, $username, $password, $database);

   $empresa =$mysqli->query("select nombre from empresa where id_empresa='".$id_empresa."' ");
                        while ($row1 = mysqli_fetch_array($empresa))
                                   {   
                                       $n_empresa=$row1[0];
                                 
                                    }

    $contacto =$mysqli->query("select nombre from contacto where id_contacto='".$id_contacto."' ");
                        while ($row2 = mysqli_fetch_array($contacto))
                                   {   
                                       $n_contacto=$row2[0];
                                 
                                    }


    $proyecto =$mysqli->query("select nombre, id_marca from pop_proyecto where id_proyecto='".$id_proyecto."' ");
                        while ($row3 = mysqli_fetch_array($proyecto))
                                   {   
                                       $n_proyecto=$row3[0];
                                       $id_marca=$row3[1];
                                 
                                    }

                             $pop =$mysqli->query("  SELECT  id_orden from pop order by id_orden desc LIMIT 1 ");
                        while ($row12 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row12[0];

                                       $id_orden_fin=$id_orden+1;
                                 
                                    }

  //$password=sha1($_POST['password']);


 $res = $mysqli->query("INSERT INTO pop (id_empresa,empresa,id_contacto,contacto,fecha_orden, fecha_entrega,vendedor,destino, usuario, id_proyecto, nombre_proyecto, fecha_proyecto)
      values ('$id_empresa','$n_empresa','$id_contacto','$n_contacto','$fecha','$fecha','$vendedor','$pais','','$id_proyecto','$n_proyecto','$fecha')");
 
 

if ($res==true) {


$carpeta="ORDEN_".$id_orden_fin;

  $carpeta_artes_orden = "../../ORDENES_POP/EL SALVADOR/".$id_orden_fin."/DOCUMENTOS_".$carpeta."/";
 if (!file_exists($carpeta_artes_orden)) {
 mkdir($carpeta_artes_orden, 0777, true);}
 $carpeta_orden_nica = "../../ORDENES_POP/NICARAGUA/".$id_orden_fin."/DOCUMENTOS_".$carpeta."/";
 if (!file_exists($carpeta_orden_nica)) {
 mkdir($carpeta_orden_nica, 0777, true);}
   

  echo'<script type="text/javascript">
   
    window.location.href="../../form3.php";
    </script>';
     
}
else{

}
  




  /*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
      values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
  echo mysqli_query($conexion,$sql);*/
 ?>