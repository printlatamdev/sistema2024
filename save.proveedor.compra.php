<?

include("esa_db.php");

$nombre = trim($_POST['nombre']);

$nombre = str_replace(".", "", $nombre);

$nombre = str_replace(",", "", $nombre);

$nombre = str_replace("-", "", $nombre);

$upername = strtoupper($nombre);

$credito = trim($_POST['credito']);

$rs2 = $mysqli->query("SELECT *  FROM proveedor WHERE nombre='$upername' ");
$rowcount = mysqli_num_rows($rs2);
if ($rowcount == 0) {



	$rs = $mysqli->query("INSERT INTO proveedor (nombre, credito) VALUES ('" . strtoupper($nombre) . "', '$credito')");
	$num = $mysqli->affected_rows;


	if ($num == 1) {
		/*
									           //****Bitacora del Sistema*******
									        	 $userid=$_COOKIE['userid'];
												 $username=$_COOKIE['username'];
												 $ip=$_SERVER["REMOTE_ADDR"];
									             $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
									             $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									             $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
									             $detalle= "El usuario ".$username." a ingresado al sistema la empresa ".$nombre."  el dia ".$date_log." a las ".date('h:i:s a').".";
									             $id_sesion=$_COOKIE['session'];
												 $rs=$mysqli->query("INSERT INTO log (id_usuario, nombre_usuario, ip, hora, detalle, id_sesion) VALUES('$userid', '$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle', '$id_sesion')");
											  //************************************ 
									            */
		$mysqli->close();

?>
		<script>
			window.parent.location = 'orden.comprass2.php?empresa=<?= base64_encode($nombre) ?>';
		</script>
	<?


	} else {

		/*
									            //****Bitacora del Sistema*******
									        	 $userid=$_COOKIE['userid'];
												 $username=$_COOKIE['username'];
												 $ip=$_SERVER["REMOTE_ADDR"];
									             $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
									             $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									             $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
									             $detalle= "Error - El usuario ".$username." a intentado ingresar la empresa ".$nombre." y ha fallado, el dia ".$date_log." a las ".date('h:i:s a').".";
									             $id_sesion=$_COOKIE['session'];
												 $rs=$mysqli->query("INSERT INTO log (id_usuario, nombre_usuario, ip, hora, detalle, id_sesion) VALUES('$userid', '$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle', '$id_sesion')");
											  //************************************
									            */
		$mysqli->close();

	?>
		<script>
			window.parent.location = 'orden.comprass2.php?error=<?= base64_encode("Ha fallado el ingreso de la empresa. Intentelo de nuevo.") ?>';
		</script>
	<?


	}
} else {

	$mysqli->close();


	?>
	<script>
		window.parent.location = 'orden.comprass2.php?error=<?= base64_encode("La empresa ya existe.") ?>';
	</script>
<?

}

?>