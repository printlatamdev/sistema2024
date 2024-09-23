<table>
  
    <tr>
       <td width="150"></td>
      <td><!-- inicio de status -->
        <div class="card-body">
  <table class="table" border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>

  </thead>
  <tbody>
    <?  $consultaa = mysqli_query($conexion2," select status, f_hora from bitacora_s where id_orden='".$row['id_orden']."'");
    $idorden=$row['id_orden'];


?>
     <?php  while ($row2019 = mysqli_fetch_array($consultaa)){

                                   ?>
    <tr >
      
      <td class="text-left">  
        <?php if (($row2019['status'])=="PROCESO"):?>
          <i class="fa fa-cog fa-spin"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="TRANSITO"):?>
          <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="CARGANDO"):?>
          <i class="fa fa-users"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="DESPACHO"):?>
          <i class="fa fa-book" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE SALIDA"):?>
          <i class="fa fa-flag-checkered"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE DESTINO"):?>
          <i class="fa fa-building" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ENTREGADO"):?>
          <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="PROBLEMA"):?>
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>  </td>
          <td width="" class="text-left">  <?php echo $row2019[   'f_hora'     ];  ?>  </td>
    </tr>
        <?php
                                 }
                               ?>

  </tbody>
</table>

      </div>
    </div>
  </div>
      </td><!-- FIN DE STATUS -->
      <td VALIGN="TOP"><!-- INICIO DOCUMENTOS SECCION 1 -->
        <div class="card-body">
        


<?
    $consultadocumentos = mysqli_query($conexion2,"select * from pop_documentos where orden='".$row['id_orden']."'");

while($docs = mysqli_fetch_assoc($consultadocumentos)){
   $tipodoc = $docs['tipo'];

   if ($tipodoc=="GUIA AEREA") {
     $guia_aerea=$docs['documento'];
   }elseif ($tipodoc=="FACTURA") {
     $factura=$docs['documento'];

     
   }elseif ($tipodoc=="CARTA DE PORTE") {
     $carta_porte=$docs['documento'];
   }elseif ($tipodoc=="DUCA F") {
     $duca_f=$docs['documento'];
   }elseif ($tipodoc=="DUCA T") {
     $duca_t=$docs['documento']; 
   }elseif ($tipodoc=="REMISION HH") {
     $remision_hh_global=$docs['documento'];
   }elseif ($tipodoc=="ORDEN COMPRA") {
     $orden_compra=$docs['documento'];
   }elseif ($tipodoc=="NOTA ENVIO") {
    $nota_envio=$docs['documento'];
    $comprobante_entrega=$docs['documento'];
    
   }elseif ($tipodoc=="PACKING LIST") {
     $pack_list=$docs['documento'];
   }elseif ($tipodoc=="MANIFIESTO DE CARGA") {
     $manifiesto==$docs['documento'];
   }elseif ($tipodoc=="POLIZA EXPORTACION") {
     $scan_poliza=$docs['documento'];
   }elseif ($tipodoc=="REMISION HH") {
     $remision_hh=$docs['documento'];
   }
}

$sql58 = mysqli_query($conexion2, "select DISTINCT id_orden, cot from pop_detalle where id_orden='".$row['id_orden']."'");
                  while($row52 = mysqli_fetch_assoc($sql58)){
                    $cot=$row52['cot'];

                    //echo $cot;       
                      $query233 = mysqli_query($conexion2,"select*from cotizacion where id_cotizacion='".$cot."'");
                           while($row9 = mysqli_fetch_assoc($query233)){
                              $archivo=$row9['archivo'];

                                
                            }
                  
                  }

$conlogistica = mysqli_query($conexion2, "select a.id_orden, a.destino,  a.id_marca, b.id_marca, b.nombre from logitica a inner join pop_marca b on a.id_marca=b.id_marca where a.id_orden='".$row['id_orden']."'");
while($rowlog = mysqli_fetch_assoc($conlogistica)){
  $empresa=$rowlog['nombre'];
  $destino=$rowlog['destino'];
}


?>




  <table class="table" border="1">
<thead class="bg-black">

<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
 




  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"){ ?>

  <tr>
         <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/cotizaciones_nica20/<?php echo $archivo; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
      
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $factura; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{ ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php } ?>
         </td>
        </tr>
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $guia_aerea; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- GUIA AEREA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
                
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">Comprobante de Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $comprobante_entrega; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>        
      <?php }else{ ?>
        <!-- comprobante de entrega -->
            
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>          
               
             

        
      <?php } ?></td>
      </tr>

      

       <?php } ?>


<!--TERMINA EL MENU PARA AEREO-->

<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->


    
    <?php if ($destino=="GT"||$destino=="HN"||$destino=="CR"||$destino=="PN"){ ?>
      
      
      <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $manifiesto; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php } else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"   alt=""> 
              </div>
          
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $carta_porte; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div>
          
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $duca_f; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $nota_envio; ?>" data-fancybox="preview" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      
       <tr>   
        <td class="text-left">Packing List</td>
        <td class="text-left"><?php if ($pack_list!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $pack_list; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr>           
    
     
      </tr>
    
<?php } ?>


















   <?php if ($destino=="NI"){ ?>
             <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/cotizaciones_nica20/<?php echo $archivo; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $nota_envio; ?>" data-fancybox="preview" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
</td>
      </tr> 
                 



  <? } ?>





</tbody>
</table></b>
</div>
      </td>
      <td VALIGN="TOP">


        <div class="card-body">


        <? ?>
                                   <!--<?php if ($nota_envio_cd==null) {
                                     $nota_envio=$nota_enviox;
                                   } else {
                                     $nota_envio=$nota_envio_cd;
                                   }
                                    ?>-->


<?php if ($destino=="HN"||$destino=="GT"||$destino=="CR"||$destino=="PN"){ ?>


<table class="table" border="1">
<thead class="bg-black">

<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  


<!--TERMINA EL MENU PARA AEREO-->
<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->


      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $factura; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
             <?php } ?>
         </td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
    </td></tr>
    <tr>
        <td class="text-left">Scan de Poliza</td>
        <td class="text-left"><?php if ($scan_poliza!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $scan_poliza; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
             <?php } ?>

         </td>
      </tr>

      <tr>
        <td class="text-left">Cotizacion</td>
        <td class="text-left"><?php if ($archivo!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/cotizaciones_nica20/<?php echo $archivo; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php } else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"   alt=""> 
              </div>
          
        <?php } ?></td>
      </tr>




</tbody>
</table>  <? } ?></b>
<?php if ($destino=="NI"){ ?>
  <table class="table" border="1">
<thead class="bg-black">

<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
         <tr>   
        <td class="text-left">Packing List</td>
        <td class="text-left"><?php if ($pack_list!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $pack_list; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr> 
      <tr>
        <td class="text-left">Scan de Poliza</td>
        <td class="text-left"><?php if ($scan_poliza!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema2020/ORDENES_POP/NICARAGUA/<? echo $row['id_orden']?>/DOCUMENTOS_ORDEN_<? echo $row['id_orden']?>/<?php echo $scan_poliza; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
             <?php } ?>

         </td>
      </tr>            


  </tbody>
  </table>
  <? } ?>

</div>
      </td>
      

<td VALIGN="TOP"><!--INICIO DE BLOQUE PARA FOTOS-->
  <div class="card-body">

<div class="col-lg-3 col-md-4 col-xs-6 thumb">
 
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=cargando&&p=NI" ><img src="cargando.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=evento&&p=NI" ><img src="evento.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $idorden;?>&&x=entrega&&p=NI" ><img src="entrega.png"  width="100"></a>
    <a href="#"><img src="instructivo.png" width="100"></a>

 

</div>
</div>


</td>
      

    </tr>
   </table>