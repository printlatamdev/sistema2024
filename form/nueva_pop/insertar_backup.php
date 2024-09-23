<?php 
  //$conexion=mysqli_connect('localhost','root','','esa19');
session_start();
$usuario=$_SESSION['vsNombre'];
$base=$_SESSION['base'];
$anio='22';
$bd=$base.$anio;


//crear carpetas segun los paises que se genera la orden op
    if ($_SESSION['base']=="esa") {
      $carpeta_pais="EL_SALVADOR";
    }else{
      $carpeta_pais="NICARAGUA";
    }
    
//

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}


mysqli_select_db($conexion,''.$bd.'');
  
  $host="localhost";

  $database=$bd;

  $username="root";  

  $password="";

$id_empresa=$_POST['cliente'];
$id_contacto=$_POST['contacto'];
$fecha=$_POST['fecha'];
$vendedor=$_POST['vendedor'];

$userQuery = mysqli_query($conexion, "select*from usuarios where nombre='$usuario'");
$userid = mysqli_fetch_array($userQuery);
//ID 115 USUARIO DE RITA PARA SOLICITAR PERMISOS DE AUTORIZACION
if($userid[0] === 115){
  $estado=2;
}else{
  $estado= 1;
}

// $status_inicial=1;
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


 $res = $mysqli->query("INSERT INTO pop (id_empresa,empresa,id_contacto,contacto,fecha_orden, fecha_entrega,vendedor,destino, usuario,estado,id_proyecto, nombre_proyecto, fecha_proyecto)
      values ('$id_empresa','$n_empresa','$id_contacto','$n_contacto','$fecha','$fecha','$vendedor','$pais','$usuario','$estado','$id_proyecto','$n_proyecto','$fecha')");
 
 var_dump($res);
 

if ($res==true) {

    $pop22 =$mysqli->query("  SELECT  id_orden from pop order by id_orden desc LIMIT 1 ");
                        while ($row122 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden2=$row122[0];                                     
                                 
                                    }


    $ip=$_SERVER["REMOTE_ADDR"]; 
                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
                    $detalle='<font color="blue">'.$_SESSION['vsNombre'].'</font> ha creado Orden Numero: <font color="red">'.$id_orden2.'</font>.</br>Detalles: Cliente: <b>'.$n_empresa.'</b>, Contacto: <b>'.$n_contacto.'</b>, Vendedor: <b>'.$vendedor.'</b> , Fecha de Orden: <b>'.$fecha.'</b> , Fecha de Entrega: <b>'.$fecha.'</b>.</br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';


                      $detalle23=''.$_SESSION['vsNombre'].' ha creado Nueva POP a las '.date('h:i:s a').' ';


                    $rs=$mysqli->query("INSERT INTO log_pop( usuario, ip, hora, detalle) VALUES ('$usuario', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");
                        
                        $nueva="as";
                     $rs22=$mysqli->query("INSERT INTO tbcomentario( titulo, comentario,fecha) VALUES ('$nueva','$detalle23','".date("Y-m-d h:i:s")."')");
   

  echo'<script type="text/javascript">
    window.location.href="../../form3.php";
    </scrip>';
}
else{
  echo'Hello world!';
}
  



  /*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
      values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
  echo mysqli_query($conexion,$sql);*/
 ?>