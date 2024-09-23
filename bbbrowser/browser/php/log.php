<?
include("data.php");
$flag=trim($_REQUEST['flag']);									               

if($flag==1){

            $id=trim($_REQUEST['id']);
            $sesion=$_COOKIE['session']; 
			$user=trim($_REQUEST['user']); 
			$ip=$_SERVER["REMOTE_ADDR"];
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
			$detalle='</br><font color="blue">'.$user.'</font><b> ha subido fotos a la  Orden Numero:</b> <font color="red">'.$id.'</font>.</br></br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
			$sql="INSERT INTO sesion_detalle (id_sesion, detalle, fechahora) VALUES('$sesion', '$detalle', '".date("Y-m-d h:i:s", time())."')";
			$rs=mysql_query($sql);

}

if($flag==2){

            $id=trim($_REQUEST['id']);
            $sesion=$_COOKIE['session']; 
			$user=trim($_REQUEST['user']); 
			$ip=$_SERVER["REMOTE_ADDR"];
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
			$detalle='</br><font color="blue">'.$user.'</font><b> ha borrado fotos de la Orden Numero:</b> <font color="red">'.$id.'</font>.</br></br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
			$sql="INSERT INTO sesion_detalle (id_sesion, detalle, fechahora) VALUES('$sesion', '$detalle', '".date("Y-m-d h:i:s", time())."')";
			$rs=mysql_query($sql);

}


									                
mysql_close();
?>