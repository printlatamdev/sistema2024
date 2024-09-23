<?php
session_start();
date_default_timezone_set('America/El_Salvador');

$base = $_SESSION['base'];


if ($base == 'esa') {
	include("esa_db.php");
} else {
	include('nica_db.php');
}


$bandera = $_REQUEST['bandera'];


if ($bandera == 1) {
	$codigo = trim( $_POST['codigo'] ); // Copian y pegan el codigo, y este trae espacios en blanco, enter, caracteres extraños al inicio y final del texto
	$empresa_tinta = $_POST['empresa_tinta'];
	$fecha = date("Y-m-d H:i:s");

	$rs = $mysqli->query("SELECT * FROM tinta WHERE codigo='" . $codigo . "'");

	$rowcount = mysqli_num_rows($rs);

	if ($rowcount == '' || $rowcount == 0) {

		echo '2';
	} else {

		while ($fila = $rs->fetch_assoc()) {
			$estado = $fila['estado'];
			$nombre_tinta = $fila['tipo'];
		}



		if ($estado == 'Bodega') {

			if ($empresa_tinta == 'nicaragua') {

				$rs = $mysqli->query("UPDATE tinta set salida='" . $fecha . "', estado='Nicaragua' WHERE codigo='" . $codigo . "'");
			} else {


				$rs = $mysqli->query("UPDATE tinta set salida='" . $fecha . "', estado='Produccion' WHERE codigo='" . $codigo . "'");
			}




			//****Bitacora del Sistema*******
			$ip = $_SERVER["REMOTE_ADDR"];
			$username = $_SESSION['vsNombre'];

			$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
			$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

			if ($empresa_tinta == 'nicaragua') {

				$detalle = "El usuario " . $_SESSION['vsNombre'] . " a descargado la tinta <font color=red>" . $codigo . "</font> para nicaragua  a las " . date('h:i:s a') . ".";
			} else {

				$detalle = "El usuario " . $_SESSION['vsNombre'] . " a descargado de bodega la tinta <font color=red>" . $codigo . "</font>  a las " . date('h:i:s a') . ".";
			}

			$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$nombre_tinta', '$detalle')");

			//************************************
			echo '1';
		} else {
			echo '0';
		}
	} // Fin de if rowcount


} elseif ($bandera == 2) {


	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];

	$material = trim( $_POST['material'] );
	$cantidad = $_POST['cantidad'];
	$orden = $_POST['orden'];
	$comprobante = $_POST['comprobante'];
	$entrega = $_POST['entrega'];
	$nota = $_POST['nota'];
	$empresa = $_POST['empresa'];
	$scan = $_POST['arte'];

	$pop = $_POST['pop'];
	$op = $_POST['op'];

	if ($pop == 1) {

		$pop_det = "- POP";
	} elseif ($op == 1) {
		$pop_det = "- OP";
	} else {

		$pop_det = "";
	}





	$rs = $mysqli->query("SELECT * FROM material WHERE id='" . $material . "'");
	//$rowcount=mysqli_num_rows($rs);

	while ($fila = $rs->fetch_row()) {
		$existencia = $fila[3];
		$nombre_material = $fila[2];
		$tipo = $fila[1];
	}

	if ($existencia >= $cantidad) {
		$prueba = 55;
		$nueva_existencia = $existencia - $cantidad;
		$rs = $mysqli->query("UPDATE material set cantidad='" . $nueva_existencia . "' WHERE id='" . $material . "'");

		//****Bitacora del Sistema*******
		$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
		$detalle = "El usuario " . $_SESSION['vsNombre'] . " a descargado la cantidad <font color=red>" . $cantidad . "</font> del material <b>" . $tipo . " - " . $nombre_material . "</b> a las " . date('h:i:s a') . ".<br><br>Detalles:<br> Existencia anterior: <font color=red>" . $existencia . "</font><br> Cantidad Descargada: <font color=red>" . $cantidad . "</font><br>Existencia actual: <font color=blue>" . $nueva_existencia . "</font><br> Orden: <font color=red>" . $orden . " " . $pop_det . "</font><br>Comprobante: <font color=red>" . $comprobante . "</font><br>Entrega: <font color=red>" . $entrega . "</font><br>Comentarios: <font color=red>" . $nota . "</font><br>Empresa: <font color=red>" . $empresa . "</font><br> ";



		$rs2 = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle, salida, cantidad, orden, scan, pop) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo - $nombre_material', '$detalle', '$comprobante', '$cantidad', '$orden', '$scan', '$pop')");

		//************************************




		echo '1';
	} else {
		echo '0';
	}
} elseif ($bandera == 3) {


	$codigo = $_POST['codigo'];
	$equipo = $_POST['nom_equipo'];
	//$empresa_tinta=$_POST['empresa_tinta'];
	$fecha = date("Y-m-d H:i:s");

	$rs = $mysqli->query("SELECT * FROM tinta WHERE codigo='" . $codigo . "'");

	while ($fila = $rs->fetch_assoc()) {
		$estado = $fila['estado'];
		$nombre_tinta = $fila['tipo'];
	}



	if ($estado == 'Produccion') {



		$username = $_SESSION['vsNombre'];
		$rs = $mysqli->query("UPDATE tinta set usuario_produccion='" . $username . "', fecha_uso='" . $fecha . "', estado='Finalizada', equipo='" . $equipo . "' WHERE codigo='" . $codigo . "'");






		//****Bitacora del Sistema*******
		$ip = $_SERVER["REMOTE_ADDR"];


		$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";


		$detalle = "El usuario " . $_SESSION['vsNombre'] . " a finalizado la tinta <font color=red>" . $codigo . "</font>  a las " . date('h:i:s a') . ".";



		$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$nombre_tinta', '$detalle')");

		//************************************
		echo '1';
	} else {

		echo '0';
	}
} elseif ($bandera == 4) {


	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];

	$material = $_POST['material'];
	$cantidad = $_POST['cantidad'];

	$rs = $mysqli->query("SELECT * FROM material WHERE id='" . $material . "'");
	//$rowcount=mysqli_num_rows($rs);

	while ($fila = $rs->fetch_row()) {
		$existencia = $fila[3];
		$nombre_material = $fila[2];
		$tipo = $fila[1];
	}



	$nueva_existencia = $existencia + $cantidad;
	$rs = $mysqli->query("UPDATE material set cantidad='" . $nueva_existencia . "' WHERE id='" . $material . "'");

	//****Bitacora del Sistema*******
	$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
	$detalle = $_SESSION['vsNombre'] . " - Ingreso cantidad:<font color=red>" . $cantidad . "</font><br> Cantidad Anterior:" . $existencia . "<br> Cantidad Actual: <font color=blue> " . $nueva_existencia . "</font>";
	$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo - $nombre_material', '$detalle')");

	//************************************


	echo '1';
} elseif ($bandera == 5) {


	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];
	$tipo_tinta = $_POST['tipo_tinta'];
	$color_tinta = $_POST['color_tinta'];
	$cantidad_tinta = $_POST['cantidad_tinta'];

	//------------------------------Para reducir foto

	function compress($source, $destination, $quality)
	{

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}



	$source_img = $_FILES['compro_1']['tmp_name'];
	if ($source_img == '' || empty($source_img)) {
		$link_OC = 'Imagen no disponible.';
	} else {

		$num = rand(0000, 9999);
		$nombre = 'COMPRO_' . $stud_p[0] . '_' . $num . '.jpg';
		$destination_img = 'bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;
		$d = compress($source_img, $destination_img, 25);
		$link_OC = '<a href="bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre . '" target="_blank">Ver</a>';
	}


	$source_img2 = $_FILES['compro_2']['tmp_name'];
	if ($source_img2 == '' || empty($source_img2)) {
		$link_FAC = 'Imagen no disponible.';
	} else {

		$num = rand(0000, 9999);
		$nombre2 = 'FAC_' . $stud_p[0] . '_' . $num . '.jpg';
		$destination_img = 'bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre2;
		$d = compress($source_img2, $destination_img, 25);
		$link_FAC = '<a href="bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre2 . '" target="_blank">Ver</a>';
	}






	//------------------------------------Fin Para reducir foto


	$rs = $mysqli->query("SELECT * FROM `tinta` WHERE `tipo`='" . $tipo_tinta . "' AND color='" . $color_tinta . "' ORDER BY id DESC LIMIT 1");
	//$rowcount=mysqli_num_rows($rs);




	while ($fila = $rs->fetch_row()) {
		$codigo = $fila[3];
	}


	$numbers = preg_replace('/[^0-9]/', '', $codigo);
	$letters = preg_replace('/[^a-zA-Z]/', '', $codigo);

	if (empty($letters)) {
		$rs1 = $mysqli->query("SELECT * FROM tinta_tipo where tipo='" . $tipo_tinta . "' ");
		while ($fila = $rs1->fetch_row()) {
			$abreviacion = $fila[3];
		}

		$mayus = strtoupper($color_tinta[0]);
		$letters = $abreviacion . $mayus;
	}

	$log_code = "";
	//*****************MODIFICACION PARA TINTA NUTEC*****************/
	/*if  ($tipo_tinta=="NUTEC") {
	           	   $numbers = 0;
	           	   $mayus = strtoupper($color_tinta[0]);
	           	   $abreviacion="NTCT";
		   	       $letters=$abreviacion.$mayus;
	         }*/
	//********************FIN DE LA MODIFIACION**********************/

	for ($x = 1; $x <= $cantidad_tinta; $x++) {

		$numbers = $numbers + 1;
		$numbers2 = str_pad($numbers, 5, "0", STR_PAD_LEFT);
		$cod = $letters . $numbers2;
		$rs2 = $mysqli->query("INSERT INTO tinta( tipo, color, codigo, ingreso, estado) VALUES ('$tipo_tinta', '$color_tinta', '$cod', '" . date("Y-m-d h:i:s") . "', 'Bodega')");
		$log_code .= $tipo_tinta . " - " . $color_tinta . " - " . $cod . "<br>";
	}

	//****Bitacora del Sistema*******
	$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
	$detalle = $_SESSION['vsNombre'] . " - Ingreso los siguientes codigos de tinta:<br> " . $log_code . "<br>Comprobante 1: " . $link_OC . "<br>Comprobante 2: " . $link_FAC . " ";
	$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo_tinta', '$detalle')");

	//************************************

	$log_code = "";
	// echo '1';
	header("Location: suministros.ingreso.bodega2.php");
} elseif ($bandera == 6) {


	$codigo = $_POST['codigo'];
	$equipo = $_POST['nom_equipo'];
	$fecha = date('Y-m-d h:i:s', strtotime($_REQUEST['fecha']));
	//$empresa_tinta=$_POST['empresa_tinta'];
	//$fecha=date("Y-m-d H:i:s");

	$rs = $mysqli->query("SELECT * FROM tinta WHERE codigo='" . $codigo . "'");

	while ($fila = $rs->fetch_assoc()) {
		$estado = $fila['estado'];
		$nombre_tinta = $fila['tipo'];
	}



	if ($estado == 'Produccion') {



		$username = $_SESSION['vsNombre'];
		$rs = $mysqli->query("UPDATE tinta set usuario_produccion='" . $username . "', fecha_uso='" . $fecha . "', estado='Finalizada', equipo='" . $equipo . "' WHERE codigo='" . $codigo . "'");

		//****Bitacora del Sistema*******
		/*
				           $ip=$_SERVER["REMOTE_ADDR"]; 
		      
				            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
				            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				            $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
				            
                                $detalle= "El usuario ".$_SESSION['username']." a finalizado la tinta <font color=red>".$codigo."</font>  a las ".date('h:i:s a').".";

							$rs=$mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$nombre_tinta', '$detalle')");

						*/
		//************************************
		echo '1';
	} else {

		echo '0';
	}
} elseif ($bandera == 7) {

	//PROCESO DE ENVIO DE NUEVOS MATERIALES CREADOS

	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];


	$material_tipo = $_POST['material_tipo'];
	$material_cat = $_POST['material_cat'];
	$nom_material = $_POST['nom_material'];

	$rs = $mysqli->query("INSERT INTO material( material, tipo, medicion, estado) VALUES ('$material_tipo', '$nom_material', '$material_cat', '1')");


	//****Bitacora del Sistema*******
	$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
	$detalle = $username . " Creo un nuevo material: <font color=red>" . $material_tipo . " - " . $nom_material . "</font><br>";
	$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$material_tipo - $nom_material', '$detalle')");

	//************************************


	echo '1';
} elseif ($bandera == 8) {


	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];

	$id_material = $_POST['id_material'];
	$precio = $_POST['precio'];


	$rs = $mysqli->query("UPDATE material set precio='" . $precio . "' WHERE id='" . $id_material . "'");

	header("Location: suministros.precio.php");
} elseif ($bandera == 9) {



	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];
	$material = $_REQUEST['material'];
	$cantidad = $_REQUEST['cantidad'];
	$compra = $_REQUEST['compra'];
	$stud_p = explode("_", $_POST['proveedor']);
	$nota = $_REQUEST['nota'];


	//------------------------------Para reducir foto

	function compress($source, $destination, $quality)
	{

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}



	$source_img = $_FILES['compra_imagen']['tmp_name'];
	if ($source_img == '' || empty($source_img)) {
		$orden_compra = '';
		$link_OC = 'Imagen no disponible.';
	} else {

		$num = rand(0000, 9999);
		$nombre = 'OC_' . $stud_p[0] . '_' . $num . '.jpg';
		$destination_img = 'bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;
		$d = compress($source_img, $destination_img, 25);
		$orden_compra = $nombre;
		$link_OC = '<a href="bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $orden_compra . '" target="_blank">Ver</a>';
	}


	$source_img2 = $_FILES['factura_imagen']['tmp_name'];
	if ($source_img2 == '' || empty($source_img2)) {
		$factura = '';
		$link_FAC = 'Imagen no disponible.';
	} else {

		$num = rand(0000, 9999);
		$nombre2 = 'FAC_' . $stud_p[0] . '_' . $num . '.jpg';
		$destination_img = 'bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre2;
		$d = compress($source_img2, $destination_img, 25);
		$factura = $nombre2;
		$link_FAC = '<a href="bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $factura . '" target="_blank">Ver</a>';
	}






	//------------------------------------Fin Para reducir foto



	$rs = $mysqli->query("SELECT * FROM material WHERE id='" . $material . "'");
	//$rowcount=mysqli_num_rows($rs);

	while ($fila = $rs->fetch_row()) {
		$existencia = $fila[3];
		$nombre_material = $fila[2];
		$tipo = $fila[1];
		$medicion = $fila[6];
	}



	$nueva_existencia = $existencia + $cantidad;
	$rs = $mysqli->query("UPDATE material set cantidad='" . $nueva_existencia . "' WHERE id='" . $material . "'");

	$rs = $mysqli->query("INSERT INTO material_ingreso( id_compra, id_proveedor, proveedor, material, tipo, cantidad, medicion, orden_compra, factura, fecha, nota, metodo) VALUES ('$compra', '" . $stud_p[0] . "', '" . $stud_p[1] . "', '$nombre_material', '$tipo', '$cantidad', '$medicion', '$orden_compra', '$factura', '" . date("Y-m-d h:i:s") . "', '$nota', 'Manual')");


	//****Bitacora del Sistema*******
	$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
	$detalle = $_SESSION['vsNombre'] . " - Ingreso cantidad:<font color=red>" . $cantidad . "</font><br> Cantidad Anterior:" . $existencia . "<br> Cantidad Actual: <font color=blue> " . $nueva_existencia . "</font><br>Orden Compra: " . $link_OC . "&nbsp;&nbsp;   Factura: " . $link_FAC . "<br>Nota: " . $nota;
	$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo - $nombre_material', '$detalle')");

	//************************************


	header("Location: suministros.ingreso.bodega2.php");
} elseif ($bandera == 10) {



	$username = $_SESSION['vsNombre'];
	$tipo_tinta = $_POST['tipo_tinta'];
	$cantidad_des = $_POST['cantidad_des'];

	$rs2 = $mysqli->query("INSERT INTO tinta_desperdicio ( tipo, cantidad, usuario, fecha) VALUES ('$tipo_tinta', '$cantidad_des', '$username', '" . date("Y-m-d h:i:s") . "')");

	echo '1';
} elseif ($bandera == 11) {




	$matt = $_REQUEST['matt'];


	//$material=$_REQUEST['material'];
	//$nom_material=$_REQUEST['nom_material'];

	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['username'];
	$cantidad = $_REQUEST['cantidad'];
	$compra = $_REQUEST['compra'];
	$empresa = $_REQUEST['empresa'];
	$id_empresa = $_REQUEST['id_empresa'];
	$nota = $_REQUEST['nota'];
	$orden_compra = $_REQUEST['oc_imagen'];
	$link_OC = '<a target="_blank" href="ordenes_compra_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $orden_compra . '"><b><font>Ver</font></b></a>';
	$factura = $_REQUEST['fac_imagen'];
	$link_FAC = '<a target="_blank" href="ordenes_compra_fac_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $factura . '"><b><font>Ver</font></b></a>';
	$idc = $_REQUEST['idc'];

	//------------------------------------------------------------------------------------------------------------------------------------Para reducir foto

	function compress($source, $destination, $quality)
	{

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}



	$source_img = $_FILES['compra_imagen']['tmp_name'];
	if ($source_img == '' || empty($source_img)) {
		$compra_imagen = '';
		$link_CI = 'Imagen no disponible.';
	} else {

		$num = rand(0000, 9999);
		$nombre = 'OC_' . $id_empresa . '_' . $num . '.jpg';
		$destination_img = 'bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;
		$d = compress($source_img, $destination_img, 25);
		$compra_imagen = $nombre;
		$link_CI = '<a href="bodega_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $orden_compra . '" target="_blank">Ver</a>';
	}

	//----------------------------------------------------------------------------------------------------------------------------------Fin Para reducir foto


	//----------------------------------------------------------
	$findme   = 'Tinta';
	$pos = strpos($matt, $findme);
	if ($pos === false) {

		$stud_m = explode("_", $_REQUEST['mat']); //este es el valor que viene del select
		$material = $stud_m[0];
		$nom_material = $stud_m[1];
		$rs = $mysqli->query("SELECT * FROM material WHERE id='" . $material . "'");
		//$rowcount=mysqli_num_rows($rs);

		while ($fila = $rs->fetch_row()) {
			$existencia = $fila[3];
			$nombre_material = $fila[2];
			$tipo = $fila[1];
			$medicion = $fila[6];
		}
		$nueva_existencia = $existencia + $cantidad;
		$rs = $mysqli->query("UPDATE material set cantidad='" . $nueva_existencia . "' WHERE id='" . $material . "'");
		//==========================ESPACIO PARA PROMOTOR DE ADHERENCIA===================================
		//***************************************************************************************         
		if ($nombre_material == "Promotor de Adherencia") {

			$rsx = $mysqli->query("SELECT * FROM tablapromotor");
			while ($filax = $rsx->fetch_row()) {
				$codigo = $filax[2];
			}

			$nums = preg_replace('/[^0-9]/', '', $codigo);
			//$letters = preg_replace('/[^a-zA-Z]/', '', $codigo);
			$letras = "PROM";
			$log_code = "";
			$fechaa = date("Y-m-d h:i:s");

			for ($x = 1; $x <= $cantidad; $x++) {
				$nums = $nums + 1;
				$nums2 = str_pad($nums, 5, "0", STR_PAD_LEFT);
				$cod = $letras . $nums2;
				echo $cod . "<br>";
				$mat = "PROMOTOR DE ADHESIVO";
				$est = "ACTIVO";
				//$rs2=$mysqli->query("INSERT INTO tinta( tipo, color, codigo, ingreso, estado) VALUES ('$tipo_tinta', '$color_tinta', '$cod', '".date("Y-m-d h:i:s")."', 'Bodega')");
				//$log_code.=$tipo_tinta." - ".$color_tinta." - ".$cod."<br>";

				//INSERTANDO CODIGOS 
				$rsi = $mysqli->query("INSERT INTO tablapromotor(material, codigo, estado,fechaingreso) VALUES ('" . $mat . "', '" . $cod . "','" . $est . "', '" . $fechaa . "')");
			}
		}


		//================FIN DEL ESPACIO DEL PROMOTOR DE ADHERENCIA======================================
		$rs = $mysqli->query("INSERT INTO material_ingreso( id_compra, id_proveedor, proveedor, material, tipo, cantidad, medicion, orden_compra, factura, fecha, nota, metodo, adicional) VALUES ('$compra', '" . $id_empresa . "', '" . $empresa . "', '$nombre_material', '$tipo', '$cantidad', '$medicion', '$orden_compra', '$factura', '" . date("Y-m-d h:i:s") . "', '$nota', 'Sistema', '$compra_imagen')");
		//****Bitacora del Sistema*******
		$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
		$detalle = $_SESSION['vsNombre'] . " - Ingreso cantidad:<font color=red>" . $cantidad . "</font><br> Cantidad Anterior:" . $existencia . "<br> Cantidad Actual: <font color=blue> " . $nueva_existencia . "</font><br>Orden Compra: " . $link_OC . "&nbsp;&nbsp;   Factura: " . $link_FAC . "<br>Nota: " . $nota;
		$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo - $nombre_material', '$detalle')");
		//************************************

	} else {

		$tipo_tinta = $_REQUEST['tipo_tinta'];
		$color_tinta = $_REQUEST['color_tinta'];
		//$stud_e = explode("-",$nom_material);
		//$tipo_tinta=$stud_e[1];
		//$color_tinta=strtolower($stud_e[2]);

		if ($color_tinta == 'solvente') {
			$color_tinta = 'flush';
		}
		$cantidad_tinta = $cantidad;

		$rs3 = $mysqli->query("SELECT * FROM `tinta` WHERE `tipo`='" . $tipo_tinta . "' AND color='" . $color_tinta . "' ORDER BY id DESC LIMIT 1");
		//$rowcount=mysqli_num_rows($rs);

		while ($fila3 = $rs3->fetch_row()) {
			$codigo = $fila3[3];
		}

		$numbers = preg_replace('/[^0-9]/', '', $codigo);
		$letters = preg_replace('/[^a-zA-Z]/', '', $codigo);
		$log_code = "";

		for ($x = 1; $x <= $cantidad_tinta; $x++) {

			$numbers = $numbers + 1;
			$numbers2 = str_pad($numbers, 5, "0", STR_PAD_LEFT);
			$cod = $letters . $numbers2;
			$rs2 = $mysqli->query("INSERT INTO tinta( tipo, color, codigo, ingreso, estado) VALUES ('$tipo_tinta', '$color_tinta', '$cod', '" . date("Y-m-d h:i:s") . "', 'Bodega')");
			$log_code .= $tipo_tinta . " - " . $color_tinta . " - " . $cod . "<br>";
		}
		$rs4 = $mysqli->query("INSERT INTO material_ingreso( id_compra, id_proveedor, proveedor, material, tipo, cantidad, medicion, orden_compra, factura, fecha, nota, metodo, adicional) VALUES ('$compra', '" . $tipo_tinta . "', '" . $empresa . "', '$nom_material', 'Tinta', '$cantidad', 'Tinta', '$orden_compra', '$factura', '" . date("Y-m-d h:i:s") . "', '$nota', 'Sistema', '$compra_imagen')");

		//****Bitacora del Sistema*******
		$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
		$detalle = $_SESSION['vsNombre'] . " - Ingreso los siguientes codigos de tinta:<br> " . $log_code . "<br>Orden Compra: " . $link_OC . "&nbsp;&nbsp;   Factura: " . $link_FAC . "<br>Nota: " . $nota;
		$rs5 = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$tipo_tinta', '$detalle')");

		//************************************

		$log_code = "";
	}
	//----------------------------------------------------------




	$rs2 = $mysqli->query("UPDATE compra_detalle set estado='0' WHERE id_detalle_compra='" . $idc . "'");
	header("Location: compra.control.iframe.php?idorden=" . $compra . "");
} elseif ($bandera == 12) {


	$ip = $_SERVER["REMOTE_ADDR"];
	$username = $_SESSION['vsNombre'];


	$material_tipo = $_REQUEST['material_tipo'];
	$material_cat = $_REQUEST['material_cat'];
	$nom_material = $_REQUEST['nom_material'];
	$compra = $_REQUEST['compra'];


	$rs = $mysqli->query("INSERT INTO material( material, tipo, medicion, estado) VALUES ('$material_tipo', '$nom_material', '$material_cat', '1')");

	if ($material_tipo == 'Varios' && $material_cat = 'accesorios') {
	} else {

		//****Bitacora del Sistema*******
		$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
		$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
		$detalle = $username . " Creo un nuevo material: <font color=red>" . $material_tipo . " - " . $nom_material . "</font><br>";
		$rs = $mysqli->query("INSERT INTO log_bodega( usuario, ip, hora, material, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$material_tipo - $nom_material', '$detalle')");

		//************************************
	}





	header("Location: compra.detalle.php?compra=" . $compra . "");
} else {




	//------------------------------Para reducir foto

	function compress($source, $destination, $quality)
	{

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg')
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif')
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png')
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}


	$nombre = $_POST['nombre'];
	$source_img = $_FILES['archivo']['tmp_name'];

	//$destination_img = 'artes/'. $nombre;
	$destination_img = 'artes_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;
	$d = compress($source_img, $destination_img, 25);
}



$mysqli->close();
