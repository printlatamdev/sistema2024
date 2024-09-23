<?php

require_once("../dompdf_config.inc.php");

// We check wether the user is accessing the demo locally
$local = array("::1", "127.0.0.1");
$is_local = in_array($_SERVER['REMOTE_ADDR'], $local);

if ( isset( $_POST["html"] ) && $is_local ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

  exit(0);
}

?>
<?php include("head.inc"); ?>

<a name="demo"> </a>
<h2>Demo</h2>

<?php if ($is_local) { ?>

<p>Enter your html snippet in the text box below to see it rendered as a
PDF: (Note by default, remote stylesheets, images &amp; inline PHP are disabled.)</p>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<p>Paper size and orientation:
<select name="paper">
<?php
foreach ( array_keys(CPDF_Adapter::$PAPER_SIZES) as $size )
  echo "<option ". ($size == "letter" ? "selected " : "" ) . "value=\"$size\">$size</option>\n";
?>
</select>
<select name="orientation">
  <option value="portrait">portrait</option>
  <option value="landscape">landscape</option>
</select>
</p>

<textarea name="html" cols="60" rows="20">
&lt;html&gt;
&lt;head&gt;
&lt;style&gt;

/* Type some style rules here */

&lt;/style&gt;
&lt;/head&gt;

&lt;body&gt;
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


table{
	border-collapse: collapse;
	
}


td{
	border-collapse: collapse;
	border:#000000 1px solid;
}

th{
	border-collapse: collapse;
	border:#000000 1px solid;
}

p.c1 { background-image: url(images/logo_barra.jpg); background-position:center; background:no-repeat;  }

.Estilo1 {font-size: 9px}
.Estilo2 {font-size: 9}
</style>






</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
          
       <? 
      if(isset($_REQUEST['id'])){
		
		    $ano=date("y"); //Saco el año para agregarle al numero de la cotizacion
			
			include("../../data.php");
			$id=trim($_REQUEST['id']);
			$sql="SELECT * FROM cotizacion WHERE id_cotizacion='$id'";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
			
			     $id_empresa=$row['id_empresa'];
				 $contacto=$row['contacto'];
				 $telefono=$row['telefono'];
				 $email=$row['email'];
			     $ciudad=$row['ciudad'];
				 $fecha=$row['fecha'];
			     $nota=$row['nota'];
				 $id_vendedor=$row['id_vendedor'];
	
			}
			
			//----------------------------------------------------------------
			if($id_empresa==9)
			{
				$year= date("Y");
			    $month= date("m");
			    $day= date("d"); 
			    $fech= $year."-".$month."-".$day."" ;
				
				$sqlupdate="UPDATE cotizacion SET fecha='$fech' WHERE  id_cotizacion=$id"; 
			    mysql_query($sqlupdate);
				
				$fecha=$fech;  	
			}
			
			//---------------------------------------------------------------
			
			$sql="SELECT * FROM empleado WHERE id_empleado='$id_vendedor'";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
				 $vendedor=$row['Nombre'];		 
			}
			
			include("../../data2.php");
			$sql="SELECT * FROM empresa WHERE id_empresa='$id_empresa'";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
			
			     $cliente=$row['nombre'];		
			}
	        include("data.php");
			
			
			
		 }
        ?>

                 
                    <table  width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000"  >
                     <tr>
                        <td height="65" colspan="5" align="center">&nbsp;&nbsp;
                          <p class="c1"><br><br><br><br><br><br><br><br></p></td>
                      </tr>


                      <tr>
                        <td width="15%"  align="left" ><font size="2"><strong>CLIENTE :</strong></font>
                        
                        </td>
                       
                       
                        <td width="44%" style="border-left:thin;" ><font size="2">&nbsp;<?=$cliente; ?></font></td>
                      
                        <td  colspan="3" align="center"><font size="2"><strong>No. C O T I Z A C I &Oacute; N </strong></font></td>
                      </tr>
                      
                      <tr>
                        <td align="left" ><font size="2"><strong >ATENCI&Oacute;N :</strong></font>
                        
                        </td> 
                        
                        <td style=" border-left:thin;" ><font size="2">&nbsp;<?=$contacto; ?></font></td>
                        <td colspan="3" rowspan="2"  align="center" ><font size="3"><b><?=$id."-".$ano; ?>&nbsp;</b></font></td>  
                      </tr>
                     
                      
                      <tr>
                        <td align="left" ><font size="2"><strong >TEL :</strong></font>
                        
                        </td>
                      
                        <td style="border-right:thin;"><font size="2">&nbsp;<?=$telefono; ?></font></td>
                        
                      </tr>
                     
                    
                     
                      <tr>
                        <td align="left" ><font size="2"><strong >E-MAIL :</strong></font>
                        
                        </td>
                       
                        <td style=" border-left:thin; border-right:thin;"><font size="2">&nbsp;<?=$email; ?></font></td>
                      
                        <td colspan="3" rowspan="3"><strong>Nota :</strong> <?=$nota; ?>&nbsp;</td>
                      </tr>
                     
                      <tr>
                        <td align="left" ><font size="2"><strong >CIUDAD :</strong></font>
                        
                        </td>
                       
                       <td style=" border-left:thin; border-right:thin;"><font size="2">&nbsp;<?=$ciudad; ?></font></td>
                      </tr>
                      
                      <tr>
                        <td align="left" ><font size="2"><strong >FECHA :</strong></font>
                        
                        </td>
                       
                       <td style=" border-left:thin; border-right:thin;"><font size="2">
                       
                       
                       <? 
					    list($año, $mes, $dia) = split('[/.-]', $fecha);
						
						if($mes=="01"){
							
							$mes="Enero";
							
						}else if ($mes=="02"){
							
							$mes="Febrero";
						
						}else if ($mes=="03"){
							
							$mes="Marzo";
						
						}else if ($mes=="04"){
							
							$mes="Abril";
						
						}else if ($mes=="05"){
							
							$mes="Mayo";
						
						}else if ($mes=="06"){
							
							$mes="Junio";
						
						}else if ($mes=="07"){
							
							$mes="Julio";
						
						}else if ($mes=="08"){
							
							$mes="Agosto";
						
						}else if ($mes=="09"){
							
							$mes="Septiembre";
						
						}else if ($mes=="10"){
							
							$mes="Octubre";
						
						}else if ($mes=="11"){
							
							$mes="Noviembre";
						
						}else if ($mes=="12"){
							
							$mes="Diciembre";
						}


						echo "&nbsp;$dia de $mes del $año";
					   ?>
                       
                       
                       </font></td>
                      </tr>
                      
                      
                      
                      
                     <tr>
                        <td colspan="2"  align="left">
                        <br>
                        <center><strong>
                        <font size="2">DESCRIPCION DE TRABAJOS O SERVICIOS</font></strong>
                        <br>
                        <font size="-2">&nbsp;&nbsp;Atentamente enviamos cotizaci&oacute;n de los siguiente trabajos:</font>
                        
                        </center><br>
                        
                        </td>
                        <td width="14%"  align="center"><strong><font size="1">CANTIDAD</font></strong></td>
                        <td width="14%"  align="center"><strong><font size="1">PRECIO UNITARIO</font></strong></td>
                        <td width="13%"  align="center"><strong><font size="1">COSTO TOTAL</font></strong></td> 
                      </tr>
 				 
							  	 
			<?
					  $total=0;
					  $sql="SELECT * FROM detalle_cotizacion WHERE id_cotizacion='$id'  ORDER BY id_detalle_cotizacion";
			$rs=mysql_query($sql);
			while($row=mysql_fetch_array($rs)){
			
			     
				 $cantidad=$row['cantidad'];
				 $ivas=$row['iva'];
				 $precio=$row['precio'];
				 $costo_total=$row['costo_total'];
	             $total=$total+$costo_total;	
				
				 
				 
				 
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
				 $detalle=$row['detalle']; 
				    
				 
				  echo "<tr><td colspan='2' ><font size='2'>".$detalle."</font></td><td align='center' width='14%' ><font size='2'>".$cantidad."</font></td><td align='center'   ><font size='2'>$".$precio."</font></td><td width='13%' align='center'><font size='2'><strong>$".number_format($costo_total, 2, '.', ',')."</strong></font></td></tr> ";

              }
                     if($ivas==0){
 					 $sub_total=number_format($total, 2, '.', '');
					 $iva=0.00;
					 $tf=$total;  
					 $total_oferta=number_format($tf, 2, '.', '');	 
						 
					 }else{
					 $sub_total=number_format($total, 2, '.', '');
                     $iv=0.13*$total;
					 $iva=number_format($iv, 2, '.', '');
					 $tf=$total + $iva;
					 $total_oferta=number_format($tf, 2, '.', '');
					 }
                      ?> 
							   
			
                      

</tr>                      
                      
                      </table>
                       <table  width="100%" style="border:thin !important" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000"  > 
                      <tr>
                        <td width="20%"  valign="top" ><font size="-4"><strong>&nbsp;&nbsp;CONDICIONES DE PAGO:</strong></font></td>
                       
                        <td colspan="4" style="border-left:hidden"  >
                        No se iniciara ning&uacute;n proyecto sin antes recibir el 60% respectivo del anticipo. 
                         El 40% restante  deber&aacute; ser cancelado estrictamente contra entrega del trabajo. 
                        </td>
                       
                     </tr>
                    
                     
                 
                     
                     <tr>
                        <td style="border-top:hidden;" valign="top" ><font size="-4"><strong>&nbsp;&nbsp;ACEPTACION DEL CLIENTE:</strong></font></td>
                       
                        <td  colspan="4" style="border-top:hidden; border-left:hidden;">
                        Se da por entendido que al autorizar la presente cotizaci&oacute;n, el cliente esta de acuerdo con los
                        Costos detallados, siendo el documento legal para su correspondiente cobro.
                          
                        </td>
                       
                     </tr>
                     
                     <tr>
                        <td style="border-top:hidden;" valign="top" ><font size="-4"><strong>&nbsp;&nbsp;OBSERVACI&Oacute;N:</strong></font></td>
                       
                        <td  colspan="4" style="border-top:hidden; border-left:hidden;" >
                       Para La fabricaci&oacute;n de r&oacute;tulos luminosos u otros trabajos relacionados se necesita que el cliente 
                       deje salida de enrg&iacute;a de 120 V a un metro del lugar de la instalaci&oacute;n, debido a que el material
                       adicional a utilizar tendr&aacute; un costo adicional.
                        
                        </td>
                       
                     </tr>
                     
                   
                      
                      
                      <tr>
                        <td colspan="3" align="center" ><strong >A  U  T  O  R  I  Z  A  D  O</strong></td>
                        <td colspan="2" align="center"><strong >TOTALIZACION DE COSTOS</strong></td>
                      </tr>
                      <tr>
                        <td colspan="3"  >
                      
                       <p>&nbsp;&nbsp;<?=$vendedor; ?></p>
                        <p>&nbsp;&nbsp;Atencion al Cliente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma Cliente</p></td>
                        
                             
                                <td width="25%" colspan="1" >
                                  <font size="2"> 
                                  &nbsp;&nbsp;Sub-Total...................<br>
                                  &nbsp;&nbsp;M&aacute;s el 13% IVA........<br>
                                  &nbsp;&nbsp;Total de Oferta...........<br>
                                  </font>
                                  </td>
                                <td width="18%" align="center">
                                
                                <font size="2">  
                                 <strong>$<?=number_format($sub_total, 2, '.', ','); ?></strong><br>
                                 <strong>$<?=number_format($iva, 2, '.', ','); ?></strong><br>
                                 <strong>$<?=number_format($total_oferta, 2, '.', ','); ?></strong><br>
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




&lt;!-- Type some HTML here --&gt;

&lt;/body&gt;
&lt;/html&gt;
</textarea>

<div style="text-align: center; margin-top: 1em;">
  <button type="submit">Download</button>
</div>

</form>
<p style="font-size: 0.65em; text-align: center;">(Note: if you use a KHTML
based browser and are having difficulties loading the sample output, try
saving it to a file first.)</p>

<?php } else { ?>

  <p style="color: red;">
    User input has been disabled for remote connections.
  </p>
  
<?php } ?>

<?php include("foot.inc"); ?>