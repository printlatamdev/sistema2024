<?
   session_start();


$id_orden = $_REQUEST['id_orden'];



 include ('suministros/connect.sticker.esa.php');

 $rs=$mysqli->query("SELECT * FROM stickers where id_orden='".$id_orden."'");
 

 /**$rs=$mysqli->query("INSERT INTO stickers( empresa, id_orden, fecha, hora, telefono, email, origen, destino, proveedor, campania, categoria, bultos, unipbultos, peso, imagen) VALUES ('".$empresa."', '".$op."', '".$fecha."', '".$hora."', '".$tel."', '".$email."', '".$origen."', '".$destino."', '".$pro."', '".$camp."', '".$cat."', '".$bultos."', '".$unp."', '".$peso."', '".$imagen."')");**/
 
 /**$rs=$mysqli->query("INSERT INTO stickers( empresa, id_orden, fecha, hora, telefono, email, origen, destino, proveedor, campania, categoria, bultos, unipbultos, peso, imagen) VALUES ('".$empresa."', '".$op."', '".$fecha."', '".$hora."', '".$tel."', '".$email."', '".$origen."', '".$destino."', '".$pro."', '".$camp."', '".$cat."', '".$bultos."', '".$unp."', '".$peso."', '".$imagen."')");**/
   
?>
<html>
<head>
<title>.:: SISTEMA COLOR DIGITAL ::.</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
<?
   while ($fila = $rs->fetch_assoc()) {
    //$estado = $fila['estado'];
    $empresa = $fila['empresa'];
  $op = $fila['id_orden'];
  $fecha = $fila['fecha'];
  $hora = $fila['hora'];
  $tel = $fila['telefono'];
  $email = $fila['email'];
  $origen = $fila['origen'];
  $destino = $fila['destino'];
  $pro = $fila['proveedor'];
  $camp = $fila['campania'];
  $cat = $fila['categoria'];
  $bultos = $fila['bultos'];
  $unp = $fila['unipbultos'];
  $peso = $fila['peso'];
  $imagen = $fila['imagen'];

 ?>
<style>
@page { margin: 15px,15px,15px,15px; }

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


.table1{
	border-collapse: collapse;
  
	
}

.table2{
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


p{
	margin-top: : 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
}


.br1 {
        line-height: 20px;
     }


.br2 {
        line-height: 22px;
     }




p.c1 { background-image: url(images/color_print.jpg); background-position:center; background:no-repeat;  }


.Estilo1 {font-size: 9px}
.Estilo2 {font-size: 9}
</style>
</head>

<body bgcolor="#FFFFFF"  >


<table class="table1"  width="100%"  style="border:thin !important"   align="center" cellpadding="0" cellspacing="0" bordercolor="#000000"  >
                    
   
    <tr>
    <td style=" border-right:thin; ">
    
    <p style = "background-image: url(images/stickers/<?=$imagen?>); background-position:center; background:no-repeat; "><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CLIENTE:</b></font> <font  size="14px"><?=strtoupper($empresa)?></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;OP:</b></font> <font   size="14px"><?=strtoupper($op)?></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;FECHA:</b></font> <font  size="14px"><?=strtoupper($fecha)?></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;HORA:</b></font> <font  size="14px"><?=strtoupper($hora)?></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;TEL:</b></font> <font  size="14px"><?=$tel?></font><br class="br1">
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;E-mail:</b></font> <font  size="14px"><?=$email?></font>
    </td> 
    <td style=" border-left:thin;"   > 
    <p class="c1"><br><br><br><br><br><br><br><br><br></p>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE ORIGEN:</b></font> <font  size="14px"><?=strtoupper($origen)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PAIS DE DESTINO:</b></font> <font   size="14px"><?=strtoupper($destino)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PROVEEDOR:</b></font> <font  size="14px"><?=strtoupper($pro)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CAMPAÑA:</b></font> <font  size="14px"><?=strtoupper($camp)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;CATEGORIA:</b></font> <font  size="14px"><?=strtoupper($cat)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;TOTAL BULTOS:</b></font> <font   size="14px"><?=strtoupper($bultos)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;UNIDADES POR BULTOS:</b></font>  <font  size="14px"><?=strtoupper($unp)?></font><br><br>
    <font face="verdana,arial,sans-serif" size="14px"><b>&nbsp;PESO DE BULTO EN KG:</b></font> <font  size="14px"><?=strtoupper($peso)?></font>
    </td> 
  
    </tr> 
    
    
  
    
    </table>

    
<? } ?>

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

                    
          
        
         <? 
      

		for ($x = 1; $x <= $bultos; $x++) {


		?>
		

		
		

		<?	
		   
		} 

  
        ?>
                 
</body>
</html>