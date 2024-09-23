<?php
   

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$empresa=base64_decode($_REQUEST['empresa']);
$op=base64_decode($_REQUEST['op']);
$fecha=base64_decode($_REQUEST['fecha']);
$hora=base64_decode($_REQUEST['hora']);
$tel=base64_decode($_REQUEST['tel']);
$email=base64_decode($_REQUEST['email']);
$origen=base64_decode($_REQUEST['origen']);
$destino=base64_decode($_REQUEST['destino']);
$pro=base64_decode($_REQUEST['pro']);
$camp=base64_decode($_REQUEST['camp']);
$cat=base64_decode($_REQUEST['cat']);
$ctbultos=base64_decode($_REQUEST['bultos']);
$unp=base64_decode($_REQUEST['unp']);
$peso=base64_decode($_REQUEST['peso']);
$imagen=base64_decode($_REQUEST['imagen']);
$bultos=1;

$display_im=file_get_contents('images/stickers/'. $imagen);
$image=base64_encode($display_im);
$src = 'data:image/jpeg;base64,' . $image;

$display_logo=file_get_contents('images/logo_color.png');
$imagelogo=base64_encode($display_logo);
$srcLogo = 'data:image/jpeg;base64,' . $imagelogo;

include ('suministros/connect.sticker.esa.php');
 
 $rs=$mysqli->query("INSERT INTO stickers( empresa, id_orden, fecha, hora, telefono, email, origen, destino, proveedor, campania, categoria, bultos, unipbultos, peso, imagen) VALUES ('".$empresa."', '".$op."', '".$fecha."', '".$hora."', '".$tel."', '".$email."', '".$origen."', '".$destino."', '".$pro."', '".$camp."', '".$cat."', '".$ctbultos."', '".$unp."', '".$peso."', '".$imagen."')");

   
?>
<html>
<head>
<title>.:: SISTEMA COLOR DIGITAL ::.</title>

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
@page { margin: 25px; }

body {
/*
	margin-top: : -55px;
	margin-bottom: -30px;
	margin-left: -30px;
	margin-right: -30px;
  font-family: "Times New Roman", Times, serif;

*/

	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size: 10px;  
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	color: #000000;
	
}
.div1{
  border: 2px solid black;
  border-radius: 10px;
  padding: 10px;
}

.table1{
	border-collapse: collapse; 
}

.table2{
	border-collapse: collapse;
}

td{
	border-collapse: collapse;
	/*border:#000000 10px solid;
  border-radius: 10px;*/
}

th{
	/*border-collapse: collapse;
	border:#000000 1px solid;*/
}


p{
	margin: 0px;
}


.br1 {
        line-height: 20px;
     }


.br2 {
        line-height: 22px;
     }

.mainflex{
  display: flex;
  justify-content: center;
}
p.c1 { background-image: url(images/color_print.jpg); background-position:center; background:no-repeat;  }
.c2 { background-image: url(images/stickers/<?=$image?>); background-position:center; background:no-repeat;  }

.Estilo1 {font-size: 9px}
.Estilo2 {font-size: 9}
</style>
</head>

<body bgcolor="#FFFFFF"  >
<div class="div1">
  <table style="width: 100%;" cellpadding="0" cellspacing="0">
    <tr style="">
      <td style="width: 50%;" align="center"><img src="<?php echo $src?>" style="width:35%; height:125px;"></td>
      <td width="50%" align="center"><img src="<?php echo $srcLogo?>" style="width:45%;"></td>
    </tr>
  </table>
  <table class=""  width="100%"  style="border:thin !important; ">
    <tr>
      <td width="50%">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CLIENTE:</b></font> <font  size="14px"><?php echo strtoupper($empresa)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;OP:</b></font> <font   size="14px"><?php echo strtoupper($op)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;FECHA:</b></font> <font  size="14px"><?php echo strtoupper($fecha)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;HORA:</b></font> <font  size="14px"><?php echo strtoupper($hora)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;TEL:</b></font> <font  size="14px"><?php echo $tel?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CORREO:</b></font> <font  size="14px"><?php echo $email?></font>
      </td> 
      <td width="50%"> 
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE ORIGEN:</b></font> <font  size="14px"><?php echo strtoupper($origen)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE DESTINO:</b></font> <font   size="14px"><?php echo strtoupper($destino)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PROVEEDOR:</b></font> <font  size="14px"><?php echo strtoupper($pro)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CAMPAÑA:</b></font> <font  size="14px"><?php echo strtoupper($camp)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CATEGORIA:</b></font> <font  size="14px"><?php echo strtoupper($cat)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;BULTOS:</b></font> <font   size="14px"><?php echo strtoupper($bultos)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;UNIDADES POR BULTOS:</b></font>  <font  size="14px"><?php echo strtoupper($unp)?></font><br class="br1">
      <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PESO DE BULTO EN KG:</b></font> <font  size="14px"><?php echo strtoupper($peso)?></font>
      </td> 
    </tr> 
  </table>
</div>

<!--
	  <table class="table1"  width="50%"  style="border:thin !important"   align="left" cellpadding="0" cellspacing="0" bordercolor="#000000"  >
                    
    <tr><td style="border-bottom:thin; border-right:thin;"   align="center" ><p class="c2"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p></td>  </tr> 
    <tr>
    <td style="border-top:thin; border-right:thin;" >
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CLIENTE: COLGATE PALMOLIVE</b></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;OP: 50</b></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;FECHA: 21/06/2019</b></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;HORA: 08:38 AM</b></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;TEL: (503) 2213-5501</b></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;E-mail: logistica@printlatam.com</b></font>
    </td> 
    </tr>

    </table>   


    
	  <table  class="table2" width="50%"  style="border:thin !important" align="right" cellpadding="0" cellspacing="0" bordercolor="#000000" >
                      
    <tr><td style="border-bottom:thin; border-left:thin;"  align="center" > <p class="c1"><br><br><br><br><br><br><br><br><br></p></td></tr>   
    <tr>
    <td  style="border-top:thin; border-left:thin;" >
    
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE ORIGEN:   EL SALVADOR</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE DESTINO:  COSTA RICA</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PROVEEDOR:  COLOR DIGITAL</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CAMPANA:   SUAVITEL ANTI  </b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CATEGORIA: EXHIBIRDOR</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;BULTOS:  1</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;UNIDADES POR BULTOS:   8</b></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PESO DE BULTO EN KG:  25.8 KG</b></font><br class="br2">
    </td> 
    </tr>
 
    
    </table>              
                     
-->




<!--

                      <tr >
                        <td  height="37px" align="left" width="32%" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;PAIS DE ORIGEN:</b></font></td> 
                        
                        <td width="35%" style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;EL SALVADOR</b></td>

                        <td  align="center" rowspan="3" > <p class="c1"><br><br><br><br><br><br><br></p></td>   


                         
                      </tr>


                       <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;PAIS DE DESTINO:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;COSTA RICA</b></td>

                         
                      </tr>


                       <tr>
                        <td  height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;PROVEEDOR:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;COLOR DIGITAL SA DE CV</b></td>
 
                      </tr>



                       <tr>
                        <td  height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;SOLICITADO POR:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;MARIA FERNANDA RENATA</b></td>

                           <td  align="center" rowspan="6" ><p class="c2"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p></td> 

                       
                      </tr>


                       <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;NOMBRE DE LA CAMPAÑA:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;DMBA Total & Luminous</b></td>

                       
                      </tr>


                       <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;DESCRIPCION MATERIAL:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;EXHIBIDOR DE PLASTICO RIGIDO</b></td>
 
                      </tr>


                      <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;CANTIDAD UNIDADES:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;3</b></td>

                          
                         

                      </tr>


                      <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;PESO EN KGS:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;25.85</b></td>

                      </tr>


                      <tr>
                        <td height="37px" align="left"  ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;NUMERO DE FACTURA:</b></font></td> 
                        
                        <td  style=" border-left:thin;" ><font face="verdana,arial,sans-serif" size="12px"><b>&nbsp;007845</b></td>

                      </tr>
                     
                   -->

                    
          
        
         <?php 
      

		for ($x = 1; $x <= $bultos; $x++) {


		?>
		

		
		

		<?php	
		   
		} 

  
        ?>
                 
</body>
</html>