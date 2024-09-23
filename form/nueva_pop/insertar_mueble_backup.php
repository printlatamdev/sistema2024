<?php 
	//$conexion=mysqli_connect('localhost','root','','esa19');
  session_start();
  $base=$_SESSION['base'];
  $anio='22';
  $bd=$base.$anio;
  $orderid=$_REQUEST['id_recibido'];
  
//crear carpetas segun los paises que se genera la orden op
    if ($_SESSION['base']=="esa") {
echo'<script type="text/javascript">console.log("IF SESSION ESA");</script>';

      $carpeta_pais="EL_SALVADOR";
      $origen="SV";
    }else{
      $carpeta_pais="NICARAGUA";
      $origen="NI";
    }
    
//

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
  $host="localhost";

	$database=$bd;

	$username="admin";  

	$password="";


  $mysqli = new mysqli($host, $username, $password, $database);
   if (trim($orderid==0)) {
    echo'<script type="text/javascript">console.log("NEW POP QUERY");</script>';

     $pop =$mysqli->query("  SELECT  id_orden, destino, id_proyecto from pop order by id_orden desc LIMIT 1 ");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row1[0];
                                       $dest=$row1[1];
                                       $proyecto=$row1[2];
                                 
                                    }
     
   } else {
     $pop =$mysqli->query("  SELECT  id_orden, destino,id_proyecto from pop where id_orden='".$orderid."' ");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row1[0];
                                       $dest=$row1[1];
                                       $proyecto=$row1[2];
                                 
                                    }
   }
   
   

$pop =$mysqli->query("  select*from pop where id_orden='".$id_orden."'");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_empresa=$row1['id_empresa'];
                                       $empresa=$row1['empresa'];
                                 
                                    }




//Anterior mente se usaba la funcion Ran para generar numeros aleatorios pero estaba definido hasta 100.
//Se cambio a una funcion con un algoritmo mas rapido y un numero limite mas amplio.
$aleatorio=mt_rand(0,99000);
$mueble=$_POST['mueble'];
$cantidad=$_POST['cantidad'];
$base=$_POST['base'];
$altura=$_POST['altura'];
$fondo=$_POST['fondo'];
$cotizacion=$_POST['cotizacion'];
$nota=$_POST['nota'];

$status="PROCESO";


$artes=$_FILES['artes']['name'];
$arte="mueble_".$id_orden."_".$aleatorio.".jpg";
$ruta=$_FILES['artes']['tmp_name'];
$extension=$_FILES['artes']['type'];

//$arte_final=$id_orden."_".$empresa.$arte;
$carpeta="ARTES_".$id_orden;
$carpetalog="FOTOSLOG_".$id_orden;


$carpeta_orden="ORDEN_".$id_orden;

echo'<script type="text/javascript">console.log("CREACION DE CARPETAS NIVEL 1");</script>';

  $carpeta_artes_orden = "../../ORDENES_POP/".$carpeta_pais."/".$id_orden."/DOCUMENTOS_".$carpeta_orden."/";
 if (!file_exists($carpeta_artes_orden)) {
 mkdir($carpeta_artes_orden, 0777, true);}

 echo'<script type="text/javascript">console.log("CREACION DE CARPETAS NIVEL 2");</script>';

$carpeta_artes = "../../ORDENES_POP/".$carpeta_pais."/".$id_orden."/".$carpeta."/";

echo'<script type="text/javascript">console.log("CREACION DE CARPETAS NIVEL 3");</script>';

$carpeta_artes_log = "../../ORDENES_POP/".$carpeta_pais."/".$id_orden."/".$carpetalog."/";
if (!file_exists($carpeta_artes)) {
mkdir($carpeta_artes, 0777, true);
mkdir($carpeta_artes_log, 0777, true);
}

/*
$caja="caja_nica19/";

$com = "caja_nica19/comprobante/";
$re = "caja_nica19/recibos/";
$tra = "caja_nica19/transfer/";


if (!file_exists($caja)) {
mkdir($caja, 0777, true);
mkdir($com, 0777, true);
mkdir($re, 0777, true);
mkdir($tra, 0777, true);
}
*/
echo'<script type="text/javascript">console.log("CREACION DE CARPETAS NIVEL 4");</script>';

$destino="../../ORDENES_POP/".$carpeta_pais."/".$id_orden."/".$carpeta."/".$arte;
  
echo'<script type="text/javascript">console.log("somethig happen...");</script>';

copy($ruta, $destino);


        

	//$password=sha1($_POST['password']);

// $userQuery = mysqli_query($conexion, "select*from usuarios where nombre='$nombre'");
// $userid = mysqli_fetch_array($userQuery);
// //ID 115 USUARIO DE RITA PARA SOLICITAR PERMISOS DE AUTORIZACION
// if($userid[0] === 115){
//   $estado=2;
// }else{
  $estado=1;
// }

 $res = $mysqli->query("INSERT INTO pop_detalle (id_orden,id_empresa,empresa,cantidad,base, altura,trabajo,cot, detalle, arte,estado,  fondo)
			values ('$id_orden','$id_empresa','$empresa','$cantidad','$base','$altura','$mueble','$cotizacion','$nota','$arte','$estado','$fondo')");

 $pop =$mysqli->query("  SELECT  id_orden from logitica where id_orden='".$id_orden."'");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_ordenn=$row1[0];
                                 
                                    }
  if (empty($id_ordenn)) {
    //CREANDO LA LOGISTICA
      $res2 = $mysqli->query("INSERT INTO logitica(id_orden,id_marca, origen,destino,status,estado)
      values ('$id_orden.','$proyecto','$origen','$dest','$status','$estado')");
  }
  

 
 

if ($res==true ) {

echo'<script type="text/javascript">console.log("CREACION DE CARPETAS NIVEL CREACION");</script>';

 $ip=$_SERVER["REMOTE_ADDR"]; 
                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";   

   $detalle='<font color="blue">'.$_SESSION['vsNombre'].'</font> ha ingresado un nuevo mueble a la Orden: <font color="red">'.$id_orden.'</font>, el dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
              $detalle=$detalle."</br></br>";
              $detalle=$detalle.' <div class="row"><div id="fms0" class="col-md-12"> <div id="fms" class="col-md-6">
                                  <div id="fmsd1" class="col-md-12">

                                    <label class="control-label"><strong>Detalles:</strong></label><br>
                                    

                                    <label class="control-label"><strong>Tipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                      '.$mueble.'

                                      <div class="clearfix"></div>


                                      <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                      '.$cantidad.'


                                      <div class="clearfix"></div>
                                  

                                      <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                      '.$base.' (base) X '.$altura.' (altura) X '.$fondo.' (fondo) Metros.

                                      <div class="clearfix"></div>


                                      <label class="control-label"><strong>Cotizacion&nbsp;&nbsp;:</strong></label>
                                      '.$cotizacion.'


                                  
                          </div>

                          <div id="fmsd3" class="col-md-12">
                           <label class="control-label "><strong>Nota</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                           '.$nota.'              
                          </div>
                           </div>  
                          <div id="fms3" class="col-md-6">   
                          <center>
                           <a href="ORDENES_POP/EL SALVADOR/'.$id_orden.'/ARTES_'.$id_orden.'/'.$arte.'" target="_blank"><img width="210px"   src="ORDENES_POP/EL SALVADOR/'.$id_orden.'/ARTES_'.$id_orden.'/'.$arte.'"></a>
                          </center></div></div> </div><br>';


  $date=date("Y-m-d h:i:s");

  $rs=$mysqli->query("INSERT INTO log_pop( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '$date', '$detalle')");

if ($rs==true) {

  
  echo'<script type="text/javascript">
  console.log("somethig happen...");
    window.location.href="../../form3.php?modificado=01&&id_orden='.$id_orden_si.'";
    </script>';
}

 

      /* $archive='documentos_pop/'.$id_orden."/";;
     if (!file_exists($archive)) {   mkdir($archive, 0777, true);    } */


      
     
}


else{

  /* echo'<script type="text/javascript">
          window.location.href="../../form3.php?modificado=01&&id_orden='.$id_orden_si.'";
        </script>'; */ 

  /*
 echo "hola";
  echo $username."<br>";
  echo $ip."<br>";
  echo $detalle."<br>";*/
}
	



	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>