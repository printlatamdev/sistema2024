<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; " />
<title>.::IMPRESION | SISTEMA DE PRODUCCION - COLOR DIGITAL::.</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-size: 8pt;
}

-->

body {
    font-family: Verdana;
    font-size: 10px;
    font-style: normal;
    line-height: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
}
</style>
</head>
<body onload="window.print()">

<table width="100%" height="425" align="center" cellpadding="0" cellspacing="0">

<tr> 
 
  <td valign="top"  height="24">

<table width="100%" border="0"  align="left" cellpadding="0" cellspacing="0">

          <?

		include ('connect_reportes.php');

    $id=$_GET['idorden'];

  
    $sql="SELECT distinct o.id_orden, o.empresa, o.fecha_orden, o.fecha_entrega, o.contacto FROM campos as o, campos_detalle as do WHERE o.id_orden=do.id_orden AND o.id_orden=$id order by o.id_orden";
   
     $rs=$mysqli->query($sql);
                            

    while($row2=$rs->fetch_assoc()){                      

		$id_orden=$row2['id_orden'];


		$empresa=$row2['empresa'];
		
		$contacto=$row2['contacto'];
			
			
	  ?>

          

          <tr>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

          </tr>

         
		 
		 
		      <tr>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

          </tr>

          <tr>

            <td width="1%" height="12" align="left">&nbsp;</td>

            <td width="6%" align="left">&nbsp;</td>

            <td width="6%" align="left">&nbsp;</td>

            <td width="53%" align="left">&nbsp;</td>

            <td width="32%" align="left">&nbsp;</td>

        </tr>

          <tr>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

          </tr>

          <tr>

            <td align="left"></td>

             

            

            <td align="left" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>

              <?=strtoupper(utf8_decode($empresa))?>

            </b></td>

            <td align="left">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo date ( "j /n /Y" ); ?>&nbsp;</td>

          </tr>

          <tr>

            <td align="left">&nbsp;</td>

             

          

            <td align="left" colspan="3" width="auto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

			
			
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=ucwords($contacto)?></td>
			
          </tr>

          <tr>

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>
	    <td align="left">&nbsp;</td>


            <td align="left">&nbsp;&nbsp;&nbsp;</td>

        

          </tr>

          <tr>

            <td align="left">&nbsp;</td>

          

            <td align="left">&nbsp;</td>

            <td align="left">&nbsp;</td>

            <td align="left"></td>

          </tr>

      
   <tr>            <td align="left">&nbsp;</td>                      <td align="left">&nbsp;</td>            <td align="left">&nbsp;</td>            <td align="left"></td>          </tr>

          <tr>

            <td align="left"><span style="border-bottom: solid 1px #999999">

            

            </span></td>

          

          </tr>

  

                 <?
include ('connect.php');
		  
$numero=$_GET['numero'];		  
for ( $i = 1 ; $i <= $numero ; $i ++) {
$item="item".$i;
$cant="cant".$i;
$det="det".$i;
	if(isset($_GET[$item])){
		 
    
    $sql="SELECT do.base, do.altura, do.trabajo FROM campos_detalle as do WHERE do.id_detalle_orden='$_GET[$item]'";

     $registro=$mysqli->query($sql);  

    while($dato=$registro->fetch_assoc()){  

		  ?>

        <tr>
                   <td align="left"> <b> <?=$_GET[$cant]?><b></td>
                    
                       <td align="right">&nbsp; </td>
                   <td align="left" colspan="2"><b><?=strtoupper(utf8_decode($dato['trabajo']))?></b></td>
                   <td align="left">&nbsp;</td>

				<!--
						asi estaba antes firma madrid
				<td align="left"> &nbsp;  </td>
                   <td align="right"><?=$_GET[$cant]?>x</td>
                   <td align="left">&nbsp;</td>
                   <td align="left"><b><?=strtoupper(utf8_decode($dato['trabajo']))?></b></td>
                   <td align="left">&nbsp;</td>-->
        </tr>
        <tr>

          <td align="left">&nbsp;</td>

            <td align="right">&nbsp;</td>

        

          <td align="left" colspan="2"><?=strtoupper(utf8_decode($_GET[$det]))?></td>

          <td align="left">&nbsp;</td>

        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="right">&nbsp;</td>
 
          <td align="left" colspan="2"><?=$dato['base']?>
&nbsp;(base)&nbsp;x&nbsp;
<?=$dato['altura']?>
&nbsp;(altura) Metros </td>
          <td align="left">&nbsp;</td>
        </tr>          

 

          

          <tr>
            <td>&nbsp;</td>
            <td >          
            <td colspan="2" >          
            <td >&nbsp;</td>
          </tr>
         <?
          }
}
            }?>
          <tr>

         

            <td >
            <td colspan="3" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# Orden :<?=$_GET['idorden']?>&nbsp;&nbsp;ENVIA: <?=$_GET['envia']?>
          &nbsp;&nbsp;&nbsp;<?=ucwords($_GET['note'])?>  <td >&nbsp;</td>

          </tr>
		 
          

          <? 

		  }
       $mysqli->close();
		  ?>

      </table>

  
	  <table width="100%" border="0"  style="   font-family: Verdana;
    font-size: 12px;
    font-style: normal;
    line-height: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;"  align="center" cellpadding="0" cellspacing="0">
	  
	    <tr>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;</td>  
</tr>    <tr>
<td>&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;</td>  
</tr>
<!-------para las firmas--->
	<tr>
 
<td colspan="3">F._________________ &nbsp; </td>
<td>F.___________________________ </td>
<td>F.___________________________</td>
</tr>
<!-------para las firmas--->
	  <tr>
 
<td colspan="3"> &nbsp;&nbsp;&nbsp;<?=ucwords($_GET['motorista'])?> </td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre y Firma Cliente</td>
<td> &nbsp;&nbsp;&nbsp;Nombre y Firma Despacha Envio</td>
</tr>

<tr>
 
<td colspan="5">

<b>Nota:</b> Para los motoristas solicitar al cliente que escriba hora y fecha que recibe el envi&oacute;.<br> Si el cliente se niega a firmar y poner fecha con hora. Notificar al encargado del &aacute;rea.
</td>
</tr>
</table>
</td>

</tr>       
 

</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">

<tr >

  <td height="24"  >&nbsp;</td>

  <td >&nbsp;</td>

  <td >&nbsp;</td>

  <td >&nbsp;</td>

  <td>&nbsp; </td>

</tr>

 <!--<tr>

  <td>&nbsp;</td>

</tr>

<tr>

  <td>&nbsp;</td>

</tr>-->

<tr>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

</tr>

</table>

</body>

</html>

