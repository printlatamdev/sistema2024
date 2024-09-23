<?
session_start();
?>
<html>

<head>
	<title>.:: SISTEMA DE COTIZACIONES ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style>
		body {
			margin-bottom: 0px;
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
			echo "p.c1 { background-image: url(images/logo_barra2.jpg); background-position:center; background:no-repeat;  }";
		} else {
			echo "p.c1 { background-image: url(images/logo_barra_nica2.jpg); background-position:center; background:no-repeat;  }";
		}
		?>
		.Estilo1 {
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
	$ano = $_REQUEST['ano'];
	$username = "admin";
	$password = "AG784512";


	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
		echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}


	if (isset($_REQUEST['id'])) {


		$id = trim($_REQUEST['id']);

		$rs = $mysqli->query("SELECT * FROM cotizacion WHERE id_cotizacion='$id'");


		while ($row = $rs->fetch_assoc()) {

			$contacto = $row['contacto'];
			$id_contacto = $row['id_contacto'];
			$fecha = $row['fecha'];
			$nota = $row['nota'];
			$vendedor = $row['vendedor'];
			$cliente = $row['empresa'];
		}



		$rs4 = $mysqli->query("SELECT * FROM contacto WHERE id_contacto='$id_contacto'");

		while ($row4 = $rs4->fetch_assoc()) {

			$celular = $row4['celular'];
			$telefono = $row4['telefono'];
			$email = $row4['email'];
			$ciudad = $row4['ciudad'];
		}



		//----------------------------------------------------------------
		/*if($id_empresa==9)
			{
				$year= date("Y");
			    $month= date("m");
			    $day= date("d"); 
			    $fech= $year."-".$month."-".$day."" ;
				
				$sqlupdate="UPDATE cotizacion SET fecha='$fech' WHERE  id_cotizacion=$id"; 
			    mysql_query($sqlupdate);
				
				$fecha=$fech;  	
			}*/

		//---------------------------------------------------------------




	}
	?>


	<table width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
		<tr>
			<td height="65" colspan="5" align="center">&nbsp;&nbsp;
				<p class="c1"><br><br><br><br><br><br><br><br></p>
			</td>
		</tr>


		<tr>
			<td width="15%" align="left">
				<font size="2"><strong>CLIENTE :</strong></font>

			</td>


			<td width="44%" style="border-left:thin;">
				<font size="2">&nbsp;<?= $cliente; ?></font>
			</td>

			<td colspan="3" align="center">
				<font size="2"><strong>No. C O T I Z A C I &Oacute; N </strong></font>
			</td>
		</tr>

		<tr>
			<td align="left">
				<font size="2"><strong>ATENCI&Oacute;N :</strong></font>

			</td>

			<td style=" border-left:thin;">
				<font size="2">&nbsp;<?= $contacto; ?></font>
			</td>
			<td colspan="3" rowspan="2" align="center">
				<font size="3"><b><?= $id . "-" . date("y"); ?>&nbsp;</b></font>
			</td>
		</tr>


		<tr>
			<td align="left">
				<font size="2"><strong>TEL :</strong></font>

			</td>

			<td style="border-right:thin;">
				<font size="2">&nbsp;<?= $telefono; ?></font>
			</td>

		</tr>



		<tr>
			<td align="left">
				<font size="2"><strong>E-MAIL :</strong></font>

			</td>

			<td style=" border-left:thin; border-right:thin;">
				<font size="2">&nbsp;<?= $email; ?></font>
			</td>

			<td colspan="3" rowspan="3"><strong>Nota :</strong> <?= $nota; ?>&nbsp;</td>
		</tr>

		<tr>
			<td align="left">
				<font size="2"><strong>CIUDAD :</strong></font>

			</td>

			<td style=" border-left:thin; border-right:thin;">
				<font size="2">&nbsp;<?= $ciudad; ?></font>
			</td>
		</tr>

		<tr>
			<td align="left">
				<font size="2"><strong>FECHA :</strong></font>

			</td>

			<td style=" border-left:thin; border-right:thin;">
				<font size="2">


					<?
					list($dia, $mes, $ano) =  explode('-', $fecha);

					if ($mes == "01") {

						$mes = "Enero";
					} else if ($mes == "02") {

						$mes = "Febrero";
					} else if ($mes == "03") {

						$mes = "Marzo";
					} else if ($mes == "04") {

						$mes = "Abril";
					} else if ($mes == "05") {

						$mes = "Mayo";
					} else if ($mes == "06") {

						$mes = "Junio";
					} else if ($mes == "07") {

						$mes = "Julio";
					} else if ($mes == "08") {

						$mes = "Agosto";
					} else if ($mes == "09") {

						$mes = "Septiembre";
					} else if ($mes == "10") {

						$mes = "Octubre";
					} else if ($mes == "11") {

						$mes = "Noviembre";
					} else if ($mes == "12") {

						$mes = "Diciembre";
					}


					echo "&nbsp;$dia de $mes del $ano";
					?>


				</font>
			</td>
		</tr>




		<tr>
			<td colspan="2" align="left">
				<br>
				<center><strong>
						<font size="2">DESCRIPCION DE TRABAJOS O SERVICIOS</font>
					</strong>
					<br>
					<font size="-2">&nbsp;&nbsp;Atentamente enviamos cotizaci&oacute;n de los siguiente trabajos:</font>

				</center><br>

			</td>
			<td width="14%" align="center"><strong>
					<font size="1">CANTIDAD</font>
				</strong></td>
			<td width="14%" align="center"><strong>
					<font size="1">PRECIO UNITARIO</font>
				</strong></td>
			<td width="13%" align="center"><strong>
					<font size="1">COSTO TOTAL</font>
				</strong></td>
		</tr>


		<?
		$total = 0;
		$rs = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id'  ORDER BY id_detalle_cotizacion");


		while ($row = $rs->fetch_assoc()) {

			$cantidad = $row['cantidad'];
			//$ivas=$row['iva'];
			$precio = $row['precio'];
			//$costo_total=$row['costo_total'];
			$costo_t = $cantidad * $precio;
			$costo_total = number_format($costo_t, 2, '.', '');

			$total = $total + $costo_total;





			//---------------------------------------------------- 
			//----Parte q valua si el detalle viene con el string q se le agregaba para el programa de cotizaciones de escritorio 
			/*
				  $cant=$row['detalle'];
				 
				 if (strlen($cant)>475){
					 
					  $d=$row['detalle'];
				      $primera_parte=substr($d,470);
                      $detalle=substr($primera_parte,0 ,-201);
					 
					 }
					 else
					 {
						$detalle=$row['detalle'];	 
					 }
					 */
			//-----------------------------------------------------
			$subject = $row['detalle'];

			$search  = array('<div>', '</div>', '<span>', '</span>');
			$replace = array('', '', '', '');

			$detalle = str_replace($search, $replace, $subject);

			echo "<tr><td colspan='2' ><br><font size='2'>" . $detalle . "</font><br><br></td>
			<td align='center' width='14%' ><font size='2'>" . $cantidad . "</font></td>
			<td align='center' width='14%'><font size='2'>$" . $precio . "</font></td>
			<td width='13%' align='center'><font size='2'><strong>$" . number_format($costo_total, 2, '.', ',') . "</strong></font></td></tr> ";


			$costo_t = "";
			$costo_total = "";
		}

		$sub_total = number_format($total, 2, '.', '');
		$iv = 0.12 * $total;
		$iva = number_format($iv, 2, '.', '');
		$tf = $total + $iva;
		$total_oferta = number_format($tf, 2, '.', '');

		$mysqli->close();


		?>




		</tr>

	</table>
	<table width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">

		<tr>
			<td style="border-top:hidden;" valign="top"><br>
				<font size="-4"><strong>&nbsp;&nbsp;ACEPTACION DEL CLIENTE:</strong></font>
			</td>

			<td colspan="4" style="border-top:hidden; border-left:hidden;"><br>
				Se da por entendido que al autorizar la presente cotizaci&oacute;n, el cliente esta de acuerdo con los
				Costos detallados, siendo el documento legal para su correspondiente cobro.

			</td>

		</tr>

		<tr>
			<td style="border-top:hidden;" valign="top">
				<font size="-4"><strong>&nbsp;&nbsp;OBSERVACI&Oacute;N:</strong></font><br>
			</td>

			<td colspan="4" style="border-top:hidden; border-left:hidden;">
				Para La fabricaci&oacute;n de r&oacute;tulos luminosos u otros trabajos relacionados se necesita que el cliente
				deje salida de enrg&iacute;a de 120 V a un metro del lugar de la instalaci&oacute;n, debido a que el material
				adicional a utilizar tendr&aacute; un costo adicional.<br><br>

			</td>

		</tr>




		<tr>
			<td colspan="3" align="center"><strong>A U T O R I Z A D O</strong></td>
			<td colspan="2" align="center"><strong>TOTALIZACION DE COSTOS</strong></td>
		</tr>
		<tr>
			<td colspan="3">

				<p>&nbsp;&nbsp;<?= $vendedor; ?></p>
				<p>&nbsp;&nbsp;Atencion al Cliente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma Cliente</p>
			</td>


			<td width="28%" colspan="1">
				<font size="2">
					&nbsp;&nbsp;Sub-Total...................<br>
					&nbsp;&nbsp;M&aacute;s el 12% IVA........<br>
					&nbsp;&nbsp;Total de Oferta...........<br>
				</font>
			</td>
			<td width="13%" align="center">

				<font size="2">
					<strong>$<?= number_format($sub_total, 2, '.', ','); ?></strong><br>
					<strong>$<?= number_format($iva, 2, '.', ','); ?></strong><br>
					<strong>$<?= number_format($total_oferta, 2, '.', ','); ?></strong><br>
				</font>

			</td>

		</tr>


	</table>


	<script type="text/php">

		if ( isset($pdf) ) {

          $font = Font_Metrics::get_font("helvetica", "bold");
          $pdf->page_text(545, 760, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", $font, 6, array(0,0,0));

        }
 </script>

</body>

</html>