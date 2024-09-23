<?php 
	//$conexion=mysqli_connect('localhost','root','','esa19');
     session_start(); 
 

$base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$nombre=$_SESSION['vsNombre'];
$bd=$base.$anio;


    	$host="localhost";

	$database=$bd;

	$username="root";  

	$password="";

$id_cliente=$_POST['cliente'];
$empre=$_POST['empre'];

$fecha=$_POST['fecha'];
$vendedor=$_POST['vendedor'];
$status_inicial=1;

$estado="1";
$computo="1";
$impresion="1";
//$pais=$_POST['pais'];
//$id_proyecto=$_POST['proyecto'];




	
	

	$mysqli = new mysqli($host, $username, $password, $database);

	 $empresa =$mysqli->query("select nombre from empresa where id_empresa='".$id_cliente."' ");
                        while ($row1 = mysqli_fetch_array($empresa))
                                   {   
                                       $n_cliente=$row1[0];
                                 
                                    }

    


    

                             $pop =$mysqli->query("  SELECT  id_orden from campos order by id_orden desc LIMIT 1 ");
                        while ($row12 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row12[0];
                                       if ($id_orden==null) {
                                         # code...
                                       }

                                       $id_orden_fin=$id_orden+1;
                                 
                                    }

$aleatorio=rand(1, 100);
$artes=$_FILES['artes']['name'];
$arte="SCAN_".$id_orden_fin."_".$aleatorio.".pdf";
$ruta=$_FILES['artes']['tmp_name'];
$extension=$_FILES['artes']['type'];

$carpeta_artes = "../../ORDENES_OP/CAMPOS/".$id_orden_fin."/DOCUMENTOS/";
$carpeta_editable = "../../ORDENES_OP/CAMPOS/".$id_orden_fin."/EDITABLE/";
$carpeta_impresion = "../../ORDENES_OP/CAMPOS/".$id_orden_fin."/IMPRESION/";
if (!file_exists($carpeta_artes)) {
    mkdir($carpeta_artes, 0777, true);
   mkdir($carpeta_impresion, 0777, true);
  mkdir($carpeta_editable, 0777, true);}
    $destino="../../ORDENES_OP/CAMPOS/".$id_orden_fin."/DOCUMENTOS/".$arte;
    copy($ruta, $destino);



	//$password=sha1($_POST['password']);


 $res = $mysqli->query("INSERT INTO campos (id_empresa,empresa,id_contacto,contacto,fecha_orden, fecha_entrega,vendedor, usuario, estado, computo, impresion,id_cliente,cliente,scan)
	
  values ('0','$empre','0','Oficina','$fecha','$fecha','$vendedor','$nombre','$estado','$computo','$impresion','$id_cliente','$n_cliente','$arte')");
 
 

if ($res==true) {
    $username = $_SESSION['vsNombre'];
  $ip=$_SERVER["REMOTE_ADDR"]; 
                      

                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";

                            $detalle= "El usuario ".$_SESSION['vsNombre']." a creado la Orden #<font color=red>".$order."</font> de Campos Peñate.<br>Cliente:<font color=red>".$nom_empresa."</font> <br>Contacto:<font color=red>".$nom_contacto."</font></br> El dia ".$date_log." a las ".date('h:i:s a')." desde la IP ".$ip.".";


              $rs=$mysqli->query("INSERT INTO log_produccion( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");








  echo'<script type="text/javascript">
   
    window.location.href="../../formop3_campos.php";
    </script>';
     
}
else{
  echo "error";

}
  




	/*$sql="INSERT into pop (proyecto,cliente,vendedor,contacto,pais,fecha)
			values ('$proyecto','$cliente','$vendedor','$contacto','$pais','$fecha')";
	echo mysqli_query($conexion,$sql);*/
 ?>