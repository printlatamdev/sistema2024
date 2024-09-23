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
  /*font-family: Verdana;*/
  font-family: Arial, Helvetica, Verdana;
  /*font-family:"Times New Roman", Times, serif;*/

  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  

    background-color: #FFFFFF;
    margin-left: -5px;
    margin-top: 35px;
    margin-right: 0px;
    margin-bottom: 0px;
 
} 

#note {


  /*font-family: "Consolas, Menlo, Monaco, Lucida Console, Courier New, monospace, serif" !important;*/
  /*font-family: Verdana;*/
  font-family: Arial, Helvetica, Verdana;
  /*font-family:"Times New Roman", Times, serif;*/
  font-size: 14px;
  font-style: normal;
  font-variant: normal;
  

 
} 


#details {


  /*font-family: "Consolas, Menlo, Monaco, Lucida Console, Courier New, monospace, serif" !important;*/
  /*font-family: Verdana;*/
  font-family: Arial, Helvetica, Verdana;
  /*font-family:"Times New Roman", Times, serif;*/
  font-size: 16px;
  font-style: normal;
  font-variant: normal;
  line-height : 25px;
  

 
} 



</style>
</head>
<body >



    <?
     
    $ruta_im=$_GET["ruta"];

    include('../esa_db.php');

    $id=$_GET['idorden'];

  
    $sql="SELECT distinct o.id_orden, o.empresa, o.fecha_orden, o.fecha_entrega, o.contacto, o.destino FROM pop as o, pop_detalle as do WHERE o.id_orden=do.id_orden AND o.id_orden=$id order by o.id_orden";
   
     $rs=$mysqli->query($sql);
                            

    while($row2=$rs->fetch_assoc()){                      

    $id_orden=$row2['id_orden'];


    $empresa=$row2['empresa'];
    $destini = $row2['destino'];
    
    $contacto=$row2['contacto'];
    if($destini=="SV"){
      $destino="EL SALVADOR";
    }else if($destini=="GT"){
      $destino="GUATEMALA";
    }else if($destini=="CR"){
      $destino="COSTA RICA";
    }else if($destini=="NI"){
      $destino="NICARAGUA";
    }else if($destini=="HN"){
      $destino="HONDURAS";
    }else if($destini=="PN"){
      $destino="PANAMA";
    }else if($destini=="RD"){
      $destino="R. DOMINICANA";
    }else if($destini=="TT"){
      $destino="T. Y TOBAGO";
    }else if($destini=="BH"){
      $destino="BAHAMAS";
    }
      
    ?>
            <br><br>
             <table border="0" width="95%" align="center" cellpadding="0" cellspacing="0" style="font-family: cursive; margin-top: 23px;">
            <tr><td width="70%"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$empresa?></b></td><td width="30%"><b><? echo date ( "j /n /Y" ); ?></b></td></td></tr>
            <tr><td td width="70%" ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$destino?></b> </td><td><b><?=ucwords($contacto)?></b></td></tr>



            </table>

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

          <br>





          
<?$numero=$_GET['numero']; ?>
          
 <?php if ($numero<3){ 
      $top=70;
  }else{$top=20;} ?>
  
 <table id="details" border="0" width="85%" align="margin-right" cellpadding="0" cellspacing="7" style="font-family: cursive;  text-align: justify; margin-top: <?echo $top."px;"?> " >

                 <?
include('../esa_db.php');
      
     
for ( $i = 1 ; $i <= $numero ; $i ++) {
$item="item".$i;
$cant="cant".$i;
$det="det".$i;
  if(isset($_GET[$item])){
     
    
    $sql="SELECT do.base, do.altura, do.fondo, do.trabajo FROM pop_detalle as do WHERE do.id_detalle_orden='$_GET[$item]'";

     $registro=$mysqli->query($sql);  

    while($dato=$registro->fetch_assoc()){  

      ?>

    

         <tr >

           
          <td width="2%" align="margin-right"><b><?=$_GET[$cant]?></b></td>
          <td width="5%"></td>


          <td width="150%"><b><?=$dato['trabajo']?></b>, <?=$_GET[$det]?>, Medida: <?=$dato['base']?>&nbsp;(base)&nbsp;x&nbsp;<?=$dato['altura']?>&nbsp;(altura)x&nbsp;&nbsp;<?=$dato['fondo']?>&nbsp;&nbsp;(fondo)CM.</td>
                
         </tr>  

        

       
         <?
          }
}
            }

      }
       $mysqli->close();
      ?>
      <tr style="inline:3px; ">

          <td width="2%" align="margin-right"></td>
          <td width="5%"></td>


          <td width="150%"><b ><br># Orden :<?=$_GET['idorden']?></b></td>
                
         </tr>
           
</table>
    <?$id=$_GET['idorden'];?>

     <!--<div style="margin-top: -90px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b ># Orden :<?=$_GET['idorden']?>&nbsp;&nbsp;ENVIA: <?=$_GET['envia']?></b>
          &nbsp;&nbsp;&nbsp;<?=ucwords($_GET['note'])?> </div>-->
  
 

  
    <table id="note" width="85%" border="0"  align="center" cellpadding="0" cellspacing="0" >
    
<tr>
<td colspan="3">&nbsp;&nbsp;&nbsp;</td>
 
</tr>    

<tr>
<td colspan="3">&nbsp;&nbsp;&nbsp;</td>
 
</tr>


<!-- para las firmas -->
<!--  <tr>
 
<td align="left" >&nbsp;&nbsp;F._________________</td>
<td align="left">F.___________________</td>

</tr>-->

<!--para las firmas -->

<!--<tr>
 
<td align="left"> &nbsp;&nbsp;&nbsp;<?=ucwords($_GET['motorista'])?> </td>
<td align="left">&nbsp;&nbsp;&nbsp;Nombre y Firma Cliente</td>

</tr>-->

<tr>
 
<!--<td colspan="2">

Nota: Para los motoristas solicitar al cliente que escriba hora y fecha que recibe el envi&oacute;.
Si el cliente se niega a firmar y poner fecha con  hora. Notificar al encargado del &aacute;rea.
</td>-->
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

/*
file_put_contents("../DOCUMENTOS/ENVIOS/envio6.pdf", $pdf_gen);
echo "<br><br><center><h1>IMPRESION ENVIADA EN PLANTA.</h1></center>";
echo'<center><td><img src="images/imp.gif"></td></tr></center>';

exec('lpr -P produccion /mnt/htdocs/html/sistema2020/DOCUMENTOS/ENVIOS/envio6.pdf');*/


if($ruta_im=='root'){
$aleatorio = mt_rand(0,1000);

  file_put_contents("../ORDENES_POP/EL_SALVADOR/".$id."/DOCUMENTOS_ORDEN_".$id."/envio".$aleatorio.".pdf", $pdf_gen);
  //--echo "<br><br><center><h1>IMPRESION ENVIADA EN ADMINISTRACION.</center></h1>";
  //--echo'<center><td><img src="images/imp.gif"></td></tr></center>';
  //echo "<img type=image src="images/admin.png" width="150" height="150" />"
  exec('lpr -P epson_envios /mnt/htdocs/html/sistema2023/DOCUMENTOS/ENVIOS/envio.pdf');
  $dompdf->stream('../DOCUMENTOS/ENVIOS/envio.pdf',array('Attachment'=>0));





}

elseif($ruta_im=='planta'){
  file_put_contents("../DOCUMENTOS/ENVIOS/envio.pdf", $pdf_gen);
  //--echo "<br><br><center><h1>IMPRESION ENVIADA EN PLANTA.</h1></center>";
  //--echo'<center><td><img src="images/imp.gif"></td></tr></center>';
  exec('lpr -P produccion /mnt/htdocs/html/sistema2023/DOCUMENTOS/ENVIOS/envio.pdf');
  //exec('');
//echo $ruta_im;
}

else{
  echo "<br><br><h1>NO SE GENERO LA IMPRESION.</h1>";
//echo $ruta_im;
}
$dompdf->stream('../DOCUMENTOS/ENVIOS/envio.pdf',array('Attachment'=>0));



?>