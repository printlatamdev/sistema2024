<?php 
  //$conexion=mysqli_connect('localhost','root','','esa19');
     session_start(); 
 

$base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
  $host="localhost";

  $database=$bd;

  $username="root";  

  $password="";
$orderid=$_REQUEST["id_orden"];

  $mysqli = new mysqli($host, $username, $password, $database);
   if (trim($orderid==false)) {
     $op =$mysqli->query("  SELECT  id_orden from campos order by id_orden desc LIMIT 1 ");
                        while ($row1 = mysqli_fetch_array($op))
                                   {   
                                       $id_orden=$row1[0];
                                       
                                 
                                    }
     
   } else {
     $op =$mysqli->query("  SELECT  id_orden from campos  where id_orden='".$orderid."' ");
                        while ($row1 = mysqli_fetch_array($op))
                                   {   
                                       $id_orden=$row1[0];
                                       
                                 
                                    }
   }
   
   

$op =$mysqli->query(" SELECT * FROM campos where id_orden='".$id_orden."'");
                        while ($row1 = mysqli_fetch_array($op))
                                   {   
                                       $id_empresa=$row1['id_empresa'];
                                       $empresa=$row1['empresa'];
                                 
                                    }





$aleatorio=rand(1, 100);
$trabajo=$_POST['trabajo'];
$id_equipo=$_POST['equipo'];
$tiro=$_POST['impresion'];
$id_material=$_POST['material'];
$id_laminado=$_POST['laminado'];
$id_rigido=$_POST['rigido'];

$cantidad=$_POST['cantidad'];
$base=$_POST['base'];
$altura=$_POST['altura'];

$cotizacion=$_POST['cotizacion'];
$nota=$_POST['nota'];
$acabados=$_POST['acabados'];
//$origen="SV";
//$status="PROCESO";


if ($id_equipo==0) {
 $equipo="CORTE";
}else{


$opeq =$mysqli->query("  SELECT  nombre from equipo  where id_equipo='".$id_equipo."' ");
                        while ($roweq = mysqli_fetch_array($opeq))
                                   {   
                                       $equipo=$roweq[0];
                                       
                                 
                                    }

}




if ($id_material==0) {
  $material="Ninguno";
} else {
  $opm =$mysqli->query("  SELECT  tipo from material  where id='".$id_material."' ");
                        while ($rowm = mysqli_fetch_array($opm))
                                   {   
                                       $material=$rowm[0];
                                       
                                 
                                    }
}
if ($id_rigido==0) {
  $rigido="Ninguno";
} else {
  $opr =$mysqli->query("  SELECT  tipo from material  where id='".$id_rigido."' ");
                        while ($rowr = mysqli_fetch_array($opr))
                                   {   
                                       $rigido=$rowr[0];
                                       
                                 
                                    }
}
if ($id_laminado==0) {
  $laminado="Ninguno";
} else {
  $opl =$mysqli->query("  SELECT  tipo from material  where id='".$id_laminado."' ");
                        while ($rowl = mysqli_fetch_array($opl))
                                   {   
                                       $laminado=$rowl[0];
                                       
                                 
                                    }
}



$computo_estado=1;
$impresion_estado=1;
$estado=1;

//VALIDACION DE IMAGEN

    $artes=$_FILES['artes']['name'];
      

      if ($trabajo=='CORTE') {
        $arte='no_disponible.png';
      }else{
      $arte="ARTEOP_".$id_orden."_".$aleatorio.".jpg";}
      $ruta=$_FILES['artes']['tmp_name'];
      $extension=$_FILES['artes']['type'];
   

//TERMINA VALIDACION 


//$arte_final=$id_orden."_".$empresa.$arte;
/**$carpeta="ARTES_".$id_orden;
echo $id_orden."-".$id_empresa."-".$empresa."-".$trabajo."-".$equipo."-".$tiro."-".$id_material."-".$id_laminado."-".$id_rigido."-".$cantidad."-".$base."-".$altura."-".$cotizacion."-".$nota."-".$acabados."-".$material."-".$rigido."-".$laminado.'-'.$arte;**/

$carpeta_artes = "../../ORDENES_OP/CAMPOS/".$id_orden."/ARTES/";
if (!file_exists($carpeta_artes)) {
mkdir($carpeta_artes, 0777, true);}
$destino="../../ORDENES_OP/CAMPOS/".$id_orden."/ARTES/".$arte;
copy($ruta, $destino);


        

  //$password=sha1($_POST['password']);


 $res = $mysqli->query("INSERT INTO campos_detalle (id_orden,id_empresa,empresa,cantidad,base, altura,trabajo,cot, id_equipo, equipo, id_material, material, id_rigido, rigido, id_laminado, laminado, tiro, detalle, arte, computo, impresion, estado, acabado)
    values ('".$id_orden."','".$id_empresa."','".$empresa."','".$cantidad."','".$base."','".$altura."','".$trabajo."','".$cotizacion."','".$id_equipo."','".$equipo."','".$id_material."','".$material."','".$id_rigido."','".$rigido."','".$id_laminado."','".$laminado."','".$tiro."','".$nota."','".$arte."','".$computo_estado."','".$impresion_estado."','".$estado."','".$acabados."')");
 /**echo $id_orden."///-".$id_empresa."///-".$empresa."///-".$cantidad."///-".$base."///-".$altura."///-".$trabajo."///-".$cotizacion."///-".$id_equipo."///-".$equipo."///-".$id_material."///-".$material."///-".$id_rigido."///-".$rigido."///-".$id_laminado."///-".$laminado."///-".$tiro."///-".$nota.'///-'.$arte.'///-'.$computo_estado.'///-'.$impresion_estado.'///-'.$estado.'///-'.$acabados;**/

 

 
 

if ($res==true ) {

  echo'<script type="text/javascript">
   
    window.location.href="../../formop3_campos.php?id_orden='.$orderid.'";
    </script>';


      /* $archive='documentos_pop/'.$id_orden."/";;
     if (!file_exists($archive)) {   mkdir($archive, 0777, true);    } */


      
     
}
else{
  echo "error";

}
  



  /*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
      values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
  echo mysqli_query($conexion,$sql);*/
 ?>