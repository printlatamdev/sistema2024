
<?
include("session.php");

?>
<?php

//error_reporting(E_ALL); 
//ini_set("display_errors", 1); 

// include autoloader

require_once 'dompdf/autoload.inc.php';
require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


// reference the Dompdf namespace
use Dompdf\Dompdf;
?>
<?php ob_start();?>


<html>
<head>
<style type="text/css">



body {
  /*
    font-family: Arial;
    font-size: 12px;
    font-style: normal;
    line-height: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
*/
  


  /*font-family: "Consolas, Menlo, Monaco, Lucida Console, Courier New, monospace, serif" !important;*/
  font-family: Arial, Helvetica, Verdana;
  /*font-family: Verdana;*/
  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  

    background-color: #FFFFFF;
    margin-left: -3px;
    margin-top: 52px;
    margin-right: 0px;
    margin-bottom: 0px;
 
} 

#note {


  /*font-family: "Consolas, Menlo, Monaco, Lucida Console, Courier New, monospace, serif" !important;*/
  /*font-family: Verdana;*/
  font-family: Arial, Helvetica, Verdana;
  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  

 
} 


#details {


  /*font-family: "Consolas, Menlo, Monaco, Lucida Console, Courier New, monospace, serif" !important;*/
  /*font-family: Verdana;*/
  font-family: Arial, Helvetica, Verdana;
  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  

 
} 




* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    font-family: Arial, Helvetica, Verdana;
    font-weight: bold;
    /*font-family: "Gill Sans Extrabold";*/
    font-size: 14px;
    float: left;
    width: 40%;
    padding: 10px;
    height: -5px; 
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}






</style>
</head>
<body >

   

    <?
    $ruta_im=$_POST["ruta"];
   
    $carpeta_envio = "../DOCUMENTOS/ENVIOS/ ";
    if (!file_exists($carpeta_envio)) {
    mkdir($carpeta_envio, 0777, true);}


		include ('../esa_db.php');

    $id=$_REQUEST['idorden'];
    $empresa=$_REQUEST['empresa'];
    $contacto=$_REQUEST['contacto'];

  
    $sql="SELECT distinct o.id_orden, o.empresa, o.fecha_orden, o.fecha_entrega, o.contacto FROM orden as o, orden_detalle as do WHERE o.id_orden=do.id_orden AND o.id_orden=$id order by o.id_orden";
   
     $rs=$mysqli->query($sql);
                            

    while($row2=$rs->fetch_assoc()){                      

		$id_orden=$row2['id_orden'];


		//$empresa=$row2['empresa'];
		
		//$contacto=$row2['contacto'];
		
			
	  ?>
      
  

  <? 
  if ($ruta_im=='Administracion') {
    # code...
  


  ?>
     
   <div class="row">
      <br><br>
      <div class="column" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$empresa?></div>
      <div class="column">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <? echo date ( "j /n /Y" ); ?>
      <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?=ucwords($contacto)?></div>
   </div>

   <?}
   elseif ($ruta_im=='planta') {
     # code...
   
   ?>
    <div class="row">
      <table>
        <tr>
          <br><br><br>
          <td style="width:525px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$empresa?></td>
          <td style="width:50px;"><? echo date ( "j /n /Y" ); ?></td>
        </tr>
        <tr>
          <td style="width:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td style="width:50px;"><?=ucwords($contacto)?></td>
        </tr>
      </table>
      
      
   </div><?}?>
      
      
      
        <!--   <table border="0" width="95%" align="center" cellpadding="0" cellspacing="0">
             
            <tr><td width="70%"><? //$empresa?></td><td width="30%"><? //echo date ( "j /n /Y" ); ?></td></tr>
            <tr><td></td><td><? //ucwords($contacto)?></td></tr>

            </table>-->

            <!--
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? //$empresa?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <? //echo date ( "j /n /Y" ); ?><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <? //ucwords($contacto)?>
      -->

          <br><br><br><br>





          

          

  
 <table id="details" border="0" width="100%" align="left" cellpadding="0" cellspacing="0">

                 <?
include ('../esa_db.php');
		  
$numero=$_POST['numero'];		  
for ( $i = 1 ; $i <= $numero ; $i ++) {
$item="item".$i;
$cant="cant".$i;
$det="det".$i;
	if(isset($_POST[$item])){
		 
    
    $sql="SELECT do.base, do.altura, do.trabajo FROM orden_detalle as do WHERE do.id_detalle_orden='$_POST[$item]'";

     $registro=$mysqli->query($sql);  

    while($dato=$registro->fetch_assoc()){  

		  ?>

        <?if ($ruta_im=='Administracion') {
          # code...
        ?>

         <tr>

          <td width="5%"><b><?=$_POST[$cant]?></b><br></td>

          <td width="85%"><b>&nbsp;&nbsp;<?=$dato['trabajo']?></b>, <?=$_POST[$det]?>, Medida: <?=$dato['base']?>&nbsp;(base)&nbsp;x&nbsp;<?=$dato['altura']?>&nbsp;(altura) CM<br></td>
          <td width="10%"></td>
                
         </tr>
         <tr><td></td></tr>  
         <br><br>


         <?}elseif($ruta_im=='planta'){?>


   
          <tr>
     
          <td width="5%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$_POST[$cant]?><br></td>
          
          <td width="85%"><?=$dato['trabajo']?>, <?=$_POST[$det]?>, Medida: <?=$dato['base']?>&nbsp;(base)&nbsp;x&nbsp;<?=$dato['altura']?>&nbsp;(altura) CM<br></td>
          <td width="10%"></td>
                
         </tr>
         <tr><td></td></tr>   
         <br><br>




          <?}?>
        

        
         <?
          }
}
            }

		  }
       $mysqli->close();
		  ?>
</table>
    <br><br><br><br>

<?

if ($ruta_im=='Administracion') {

  



?>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# Orden :<?=$_POST['idorden']?>&nbsp;&nbsp;ENVIA: <?=$_POST['envia']?>
          &nbsp;&nbsp;&nbsp;<?=ucwords($_POST['note'])?> 
<?}elseif($ruta_im=='planta'){?>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;# Orden :<?=$_POST['idorden']?>&nbsp;&nbsp;ENVIA: <?=$_POST['envia']?>
          &nbsp;&nbsp;&nbsp;<?=ucwords($_POST['note'])?>
<?}?>




  
	  <table id="note" width="85%" border="0"  align="center" cellpadding="0" cellspacing="0">
}
	  
<tr>
<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 
</tr>    

<tr>
<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 
</tr>

<?if ($ruta_im=='Administracion') {
  # code...
?>
<!-- para las firmas -->
<!--<tr>
 
<td align="left" >F._________________</td>
<td align="left">F.___________________</td>

</tr>-->
<?}elseif($ruta_im=='planta'){?>

  <!--<tr>
 
<td align="left" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F._________________</td>
<td align="left">F.___________________</td>

</tr>-->
<?}?>
<!-- para las firmas -->

<!--<tr>
 
<td align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=ucwords($_POST['motorista'])?> </td>
<td align="left">&nbsp;&nbsp;&nbsp;Nombre y Firma Cliente</td>

</tr>-->

<tr>
<?if($ruta_im=='Administracion') {
?>
<!--<td>cantidad</td>
<td>
 

Nota: Para los motoristas solicitar al cliente que escriba hora y fecha que recibe el envi&oacute;.
Si el cliente se niega a firmar y poner fecha con hora. Notificar al encargado del &aacute;rea.
</td>-->
<?}elseif ($ruta_im=='planta') {?>



<!--<td>
 

&nbsp;&nbsp;&nbsp;Nota: Para los motoristas solicitar al cliente que escriba hora y fecha que recibe el envi&oacute;.<br>
&nbsp;&nbsp;&nbsp;Si el cliente se niega a firmar y poner fecha con hora. Notificar al encargado del &aacute;rea.
</td>-->
 
<?}?>

</tr>
</table>


</body>
</html>

<?php

$num=rand(0000,9999);
$html = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();

$pdf_gen = $dompdf->output();



//se envia la impresion al impresor epson

if($ruta_im=='Administracion'){
file_put_contents("../DOCUMENTOS/ENVIOS/envio.pdf", $pdf_gen);
//--echo "<br><br><center><h1>IMPRESION ENVIADA EN ADMINISTRACION.</center></h1>";
//--echo'<center><td><img src="images/imp.gif"></td></tr></center>';  COMENTARIADA PARA MOSTRAR PDF EN LA PANTALLA
//echo "<img type=image src="images/admin.png" width="150" height="150" />"  COMENTARIADA PARA MOSTRAR PDF EN LA PANTALLA 

exec('lpr -P EPSON /mnt/htdocs/html/sistema/documentos/envios/envio.pdf');

     

}
elseif($ruta_im=='planta'){

file_put_contents("../DOCUMENTOS/ENVIOS/envio.pdf", $pdf_gen);
//--echo "<br><br><center><h1>IMPRESION ENVIADA EN PLANTA.</h1></center>";
//--echo'<center><td><img src="images/imp.gif"></td></tr></center>';

exec('lpr -P produccion /mnt/htdocs/html/sistema2020/DOCUMENTOS/ENVIOS/envio.pdf');

//echo $ruta_im;

}

else{

echo "<br><br><h1>NO SE GENERO LA IMPRESION.</h1>";
//echo $ruta_im;

}

$dompdf->stream('../DOCUMENTOS/ENVIOS/envio.pdf',array('Attachment'=>0));









//$dompdf->stream("envio.pdf"); 
 

?>