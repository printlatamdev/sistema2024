<?
session_start();
?>
<html>

<head>
	<title>.:: SISTEMA DE SUMINISTROS ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
	<style>
		body {
			margin-top: -20px;
			margin-bottom: -10px;
			font-family: Verdana;
			font-size: 10px;
			font-style: normal;
			line-height: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			color: #000000;
			table-layout: fixed;
		}


		table {
			border-collapse: collapse;

		}


		td {
			border-collapse: collapse;
			border: #000000 1px solid;
		}

		th {
			border-collapse: collapse;
			border: #000000 1px solid;
		}







		<?
		if ($_REQUEST['bss'] == 'esa') {
			echo "p.c1 { background-image: url(images/logoordencompra.jpg); background-position:center; background:no-repeat;  }";
		} else {
			echo "p.c1 { background-image: url(images/logoordencompra_nica.jpg); background-position:center; background:no-repeat;  }";
		}
		?>.Estilo1 {
			font-size: 9px
		}

		.Estilo2 {
			font-size: 9
		}
	</style>
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">


	<?

	$host = "localhost";
	$database = $_REQUEST['bs'];
	$username = "root";
	$password = "CP784512";
	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
		echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}


	if (isset($_REQUEST['id'])) {

		$ano = date("y"); //Saco el ano para agregarle al numero de la cotizacion


		$id = trim($_REQUEST['id']);

		$rs = $mysqli->query("SELECT * FROM compra WHERE id_compra='$id'");


		while ($row = $rs->fetch_assoc()) {

			$id_empresa = $row['id_empresa'];
			$empresa = $row['empresa'];
			$solicita = $row['solicita'];
			$fecha = $row['fecha'];
			$op = $row['op'];
		}

		//Sacamos tipo de credito
		$rs_credito = $mysqli->query("SELECT * FROM proveedor WHERE id_proveedor='$id_empresa'");
		while ($row_credito = $rs_credito->fetch_assoc()) {
			$credito = $row_credito['credito'];
		}
		//-------------------	

	}
	?>


	<table width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
		<tr>
			<td width="65%" height="30" align="center">
				<p class="c1"><br><br><br><br></p>
			</td>
			</td>
			<td width="20%" align="center">
				<font size="2"><strong>ORDEN No. </strong></font>
			</td>
			<td width="15%" align="center">
				<font size="3"><strong><?= $id ?></strong></font>
			</td>
		</tr>
	</table>

	<br>
	<table width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
		<tr>
			<td width="10%" height="15" align="center">
				<font size="2"><strong>FECHA</strong></font>
			</td>
			<td width="35%" align="center">
				<font size="2"><strong>PROVEEDOR</strong></font>
			</td>
			<td width="40%" align="center">
				<font size="2"><strong>SOLICITADO POR</strong></font>
			</td>
			<td width="15%" align="center">
				<font size="2"><strong>OP</strong></font>
			</td>
		</tr>
		<tr>
			<td width="10%" height="15" align="center">
				<font size="2"><strong><?= $fecha ?></strong></font>
			</td>
			<td width="35%" align="center">
				<font size="1"><strong><?= $empresa ?></strong></font>
			</td>
			<td width="40%" align="center">
				<font size="2"><strong><?= $solicita ?></strong></font>
			</td>
			<td width="15%" align="center">
				<font size="2"><strong><?= $op ?></strong></font>
			</td>
		</tr>
	</table>

	<br>


	<table width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">

		<tr>
			<td width="55%" height="30" align="center">
				<font size="2"><strong>ESPECIFICACION DE MATERIAL</strong></font>
			</td>
			<td width="15%" align="center">
				<font size="2"><strong>CANTIDAD</strong></font>
			</td>
			<td width="15%" align="center">
				<font size="2"><strong>P. UNIT</strong></font>
			</td>
			<td width="15%" align="center">
				<font size="2"><strong>C. TOTAL</strong></font>
			</td>
		</tr>

		<?

		$total = 0;
		$lineas = 0;
		$sub = 0;
		$sub_total = 0;
		$moneda = $_REQUEST['moneda'];
		if ($moneda == 'dollar') {
			$mn = '$';
		} else {
			$mn = 'C$';
		}
		$ivv = $_REQUEST['iva'];
		$ir = $_REQUEST['ir'];
		$rs = $mysqli->query("SELECT * FROM compra_detalle WHERE id_compra='$id'  ORDER BY id_detalle_compra");


		while ($row = $rs->fetch_assoc()) {

			$cantidad = $row['cantidad'];
			$precio = $row['precio'];
			$str = $row['material'];
			$material = str_replace("Varios -", "", $str);



			$sub = $cantidad * $precio;
			$sub_total = $sub_total + $sub;



			if (strlen($material) >= 57) {
				echo "<tr><td height='15' width='55%'><font size='1'>&nbsp;" . $material . "</font></td>";
			} else {
				echo "<tr><td height='15' width='55%'><font size='2'>&nbsp;" . $material . "</font></td>";
			}

			echo "
				        <td align='center' width='15%' ><font size='2'>" . $cantidad . "</font></td>
				        <td align='center' width='15%'  ><font size='2'>" . $mn . $precio . "</font></td>
				        <td width='15%' align='center'><font size='2'><strong>" . $mn . number_format($sub, 2, '.', ',') . "</strong></font></td></tr> ";

			$costo_t = "";
			$costo_total = "";
			$sub = 0;


			$lineas = $lineas + 1;
		}

		//**************************************************************************************************
		$lineas_faltan = 10 - $lineas;
		if ($lineas_faltan == 0) {
		} else {

			for ($i = 1; $i <= $lineas_faltan; $i++) {

				echo "<tr><td height='15' width='55%'><font size='2'></font></td>
	     			        <td align='center' width='15%' ><font size='2'></font></td>
	 			            <td align='center' width='15%'  ><font size='2'></font></td>
				            <td width='15%' align='center'><font size='2'><strong></strong></font></td></tr> ";
			}
		}
		//**************************************************************************************************     
		if ($ivv == 15) {
			$iv = 0.15 * $sub_total;
		} else {
			$iv = 0.0 * $sub_total;
		}


		$iva = number_format($iv, 2, '.', '');
		$tf = $sub_total + $iva;
		$total_oferta = number_format($tf, 2, '.', '');


		if ($ir == 0) {

			echo "<tr><td valign='top' colspan='2' rowspan='3' height='15'>
										<font size='1'><b>Nota:</b> La orden de compra solo es válida con firma y sello.</font><br>
										<font size='1'><b>Forma de pago:</b>&nbsp;" . $credito . "</font><br>
										</td>
											<td align='center' width='15%'  ><font size='2'><strong>Subtotal</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . number_format($sub_total, 2, '.', '') . "</strong></font></td></tr> ";

			echo "<tr>
											<td align='center' width='15%'  ><font size='2'><strong>IVA</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . $iva . "</strong></font></td></tr> ";

			echo "<tr>
											<td align='center' width='15%'  ><font size='2'><strong>Total</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . $total_oferta . "</strong></font></td></tr> ";
		} else {

			$ire = 0.02 * $sub_total;
			$irev = number_format($ire, 2, '.', '');
			$tf2 = $total_oferta - $irev;
			$total_oferta = number_format($tf2, 2, '.', '');

			echo "<tr><td valign='top' colspan='2' rowspan='4' height='15'>
										<font size='1'><b>Nota:</b> La orden de compra solo es válida con firma y sello.</font><br>
										<font size='1'><b>Forma de pago:</b>&nbsp;" . $credito . "</font><br>
										</td>
											<td align='center' width='15%'  ><font size='2'><strong>Subtotal</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . number_format($sub_total, 2, '.', '') . "</strong></font></td></tr> ";

			echo "<tr>
											<td align='center' width='15%'  ><font size='2'><strong>IR</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . $irev . "</strong></font></td></tr> ";

			echo "<tr>
											<td align='center' width='15%'  ><font size='2'><strong>IVA</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . $iva . "</strong></font></td></tr> ";

			echo "<tr>
											<td align='center' width='15%'  ><font size='2'><strong>Total</strong></font></td>
											<td width='15%' align='center'><font size='2'><strong>" . $mn . $total_oferta . "</strong></font></td></tr> ";
		}

		$mysqli->close();
		?>

	</table>






</body>

</html>