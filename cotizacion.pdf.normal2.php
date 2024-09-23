<html>

<head>
	<title>.:: SISTEMA DE COTIZACIONES ::.</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
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
			border: #d3d3d3 1px solid;
		}

		th {
			border-collapse: collapse;
			border: #d3d3d3 1px solid;
		}

		p.c1 {
			background-image: url(images/new_barra.jpg);
			background-position: center;
			background: no-repeat;
		}

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
	include('suministros/connect.php');
	if (isset($_REQUEST['id'])) {

		$ano = 20;


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



	<table width="100%" style="border:hidden !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
		<tr>
			<td height="65" colspan="5" align="center">&nbsp;&nbsp;
				<p class="c1"><br><br><br><br><br><br><br><br></p>
			</td>
		</tr>



		<tr>
			<td style=" border-bottom:hidden;" height="35" colspan="5" align="center">&nbsp;&nbsp;</td>
		</tr>







		<tr>
			<td style=" border:hidden;" align="left">
				<font size="3"><strong><?= $cliente; ?></strong></font>
			</td>

			<td style=" border:hidden;"></td>

			<td style=" border:hidden;" colspan="3" align="right">

				<font size="4"><strong> COTIZACI&Oacute;N&nbsp;<?= $id . "-" . $ano; ?></strong></font>


			</td>
		</tr>






		<tr>
			<td style=" border:hidden;" align="left"></td>

			<td style=" border:hidden;"></td>

			<td style=" border:hidden;" colspan="3"></td>
		</tr>




		<tr>
			<td style=" border:hidden;" align="left"></td>

			<td style=" border:hidden;"></td>

			<td style=" border:hidden;" colspan="3" align="right">
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
			<td style=" border:hidden;" align="left">


				<font size="2">
					<!--<strong >E-MAIL :</strong>-->
				</font>

			</td>

			<td style=" border:hidden; border-right:hidden;">
				<!--<font size="2">&nbsp;<?= $email; ?></font>-->
			</td>
			<td style=" border:hidden;" colspan="3" rowspan="3">
				<!--<strong>Nota :</strong> <?= $nota; ?>&nbsp;-->
			</td>

		</tr>

		<tr>
			<td style=" border:hidden;" align="left">


				<font size="2">
					<!--<strong >CIUDAD :</strong>-->
				</font>

			</td>

			<td style=" border:hidden; border-right:hidden;">
				<!--<font size="2">&nbsp;<?= $ciudad; ?></font>-->
			</td>
		</tr>

		<tr>
			<td style=" border:hidden;" align="left">


				<font size="2">
					<!--<strong >FECHA :</strong>-->
				</font>

			</td>

			<td style=" border:hidden; border-right:hidden;"></td>
		</tr>



		<tr>
			<td style=" border:hidden;" height="35" colspan="5" align="center">&nbsp;&nbsp;</td>
		</tr>





		<tr>
			<td style=" border:hidden;" colspan="2" align="left">

				<strong>
					<font size="2">Descripci&oacute;n</font>
				</strong>

			</td>
			<td style=" border-left:hidden; border-top:hidden;" width="14%" align="center"><strong>
					<font size="2">Cantidad</font>
				</strong></td>
			<td style=" border-left:hidden; border-top:hidden;" width="14%" align="center"><strong>
					<font size="2">Precio Unit.</font>
				</strong></td>
			<td style=" border-left:hidden; border-top:hidden;" width="13%" align="right"><strong>
					<font size="2">Costo Total</font>
				</strong></td>
		</tr>

		<tr>
			<td colspan="5" height="0" valign='top'>
				<table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top:hidden; border-left:hidden; border-right:hidden; ">

					<?
					$total = 0;
					$total = 0;
					$rs = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id'  ORDER BY id_detalle_cotizacion");


					while ($row = $rs->fetch_assoc()) {

						$cantidad = $row['cantidad'];
						$ivas = $row['iva'];
						$precio = $row['precio'];
						$costo_total = $row['costo_total'];
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






						echo "<tr><td valign='top' colspan='2'  width='64%'><br><font size='2'>" . $detalle . "</font></td>
						<td valign='top' style='border-left:hidden;'  align='center' width='14%' ><br><font size='2'>" . $cantidad . "</font></td>
						<td style='border-left:hidden;' valign='top' align='center' width='14%'  ><br><font size='2'>$" . $precio . "</font></td>
						<td valign='top' style='border-left:hidden;' width='13%' align='right'><br><font size='2'><strong>$" . number_format($costo_total, 2, '.', ',') . "</strong></font></td></tr> ";
					}
					if ($ivas == 0) {
						$sub_total = number_format($total, 2, '.', '');
						$iva = 0.00;
						$tf = $total;
						$total_oferta = number_format($tf, 2, '.', '');
					} else {
						$sub_total = number_format($total, 2, '.', '');
						$iv = 0.13 * $total;
						$iva = number_format($iv, 2, '.', '');
						$tf = $total + $iva;
						$total_oferta = number_format($tf, 2, '.', '');
					}
					$mysqli->close();
					?>

				</table>
			</td>
		</tr>





		<tr>
			<td colspan="3" style=" border-top:hidden; border-left:hidden; border-right:hidden;">

			</td>

			<td align="right" style=" border-top:hidden; border-left:hidden; border-right:hidden;">
				<font size="2">
					&nbsp;&nbsp;Sub-Total:<br>
					&nbsp;&nbsp;M&aacute;s el 13% IVA:<br>
					&nbsp;&nbsp;Total de Oferta:<br>
				</font>
			</td>


			<td align="right" style=" border-top:hidden; border-left:hidden; border-right:hidden;">
				<font size="2">
					<strong>$<?= number_format($sub_total, 2, '.', ','); ?></strong><br>
					<strong>$<?= number_format($iva, 2, '.', ','); ?></strong><br>
					<strong>$<?= number_format($total_oferta, 2, '.', ','); ?></strong><br>
				</font>
			</td>


		</tr>



		<tr>
			<td colspan="3" style=" border-top:hidden; border-left:hidden; border-right:hidden;"></td>

			<td align="right"></td>

			<td align="center"></td>


		</tr>


		<tr>
			<td colspan="2" style=" border-top:hidden; border-left:hidden; border-right:hidden;">

				<p align="justify">
					<font size="2"><strong>Nota :</strong> <?= $nota; ?></font>
				</p>

			</td>

			<td colspan="2" style=" border-top:hidden; border-left:hidden; border-right:hidden;" align="right"></td>

			<td style=" border-top:hidden; border-left:hidden; border-right:hidden;" align="center"></td>


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