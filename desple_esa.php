




<div class="contenido"><table>
  
    <tr>
      <td width="150"></td>
      <td><!-- inicio -->
        <div class="card-body">
        <table class="table" border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>

  </thead>
  <tbody>
    <? 
     $consulta2019 = mysqli_query($conexion," select status, f_hora from bitacora_s where id_orden='".$row['id_orden']."'");
      while ($row2019 = mysqli_fetch_array($consulta2019)){?>
        <tr >
      
      <td  VALIGN="TOP">  
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
    
       <? }?>
  

  
  </tbody>
</table>
</div>
      </td><!-- FIN TABLE 1 -->
      <td VALIGN="TOP"><!-- INICIO TABLE 2-->
        <div class="card-body">
        <?

$consulta2020 = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.p_vehiculo, t1.comprobante_entrega, t1.guia_aerea, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca ,t5.id_orden, t5.cot, t6.id_cotizacion, t6.archivo,t1.pack_lista,t1.scan_poliza from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner JOIN cotizacion t6
   on t5.cot=t6.id_cotizacion where t1.id_orden='".$row['id_orden']."'
 ");


                                while ($row2020 = mysqli_fetch_array($consulta2020))
                                   {
                                    $destino=$row2020[5];
                                    $manifiesto=$row2020[9];
                                    $carta_porte=$row2020[10];
                                    $factura=$row2020[11];
                                    $duca_f=$row2020[12];
                                    $duca_t=$row2020[13];  
                                    $nota_envio=$row2020[16];
                                    $orden_compra=$row2020[15];
                                    $p_vehiculo=$row2020[17];
                                    $comprobante_entrega=$row2020[18];
                                    $guia_aerea=$row2020[19];
                                    $cot=$row2020[35];
                                    $pack_list=$row2020[38];
                                    $scan_poliza=$row2020[39];
                                    
                                                              


                                   }?>





<table class="table" border="1" >
<thead class="bg-black" border="1">
<tr>

<th class="text-left">Documento <?php echo $destino; ?> </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  

  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"){ ?>

  <tr>
         <td class="text-left">Cotizacion_aereo</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
      
        
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" data-fancybox="preview" >
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
        <td class="text-left">Packing List</td>
        <td class="text-left"><?php if ($pack_list!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $pack_list; ?>" data-fancybox="preview" >

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
      <td class="text-left">Comprobante de Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" data-fancybox="preview" >
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



    <?php if ($destino=="GT" && $p_vehiculo!="Aereo" ||$destino=="HN" && $p_vehiculo!="Aereo" ||$destino=="CR" && $p_vehiculo!="Aereo" ||$destino=="PN" && $p_vehiculo!="Aereo" ||$destino=="NI" && $p_vehiculo!="Aereo" ){ ?>
      
      
      <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" data-fancybox="preview" >

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
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" data-fancybox="preview" >

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
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" data-fancybox="preview" >

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
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" data-fancybox="preview" >
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
                <a href="../sistema/artes_esa17/<?php echo $pack_list; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr>
    
<?php } ?>


















   <?php if ($destino=="SV"){ ?>
    <tr>
             <td class="text-left">Cotizacion_sv</td>
        
        <td class="text-left"><?php if ($cot!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview" >
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
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" data-fancybox="preview" >
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
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
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
      <tr>   
        <td class="text-left">Packing List</td>
        <td class="text-left"><?php if ($pack_list!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $pack_list; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php } ?></td>
      </tr>           



  <? } ?>





</tbody>
</table></b>
</div>
      </td>
      <td VALIGN="TOP">
        <div class="card-body">
        <?

$consulta2020 = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.p_vehiculo, t1.comprobante_entrega, t1.guia_aerea, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca ,t5.id_orden, t5.cot, t6.id_cotizacion, t6.archivo from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner JOIN cotizacion t6
   on t5.cot=t6.id_cotizacion where t1.id_orden='".$row['id_orden']."'
 ");


                                while ($row2020 = mysqli_fetch_array($consulta2020))
                                   {
                                    $destino=$row2020[5];
                                    $manifiesto=$row2020[9];
                                    $carta_porte=$row2020[10];
                                    $factura=$row2020[11];
                                    $duca_f=$row2020[12];
                                    $duca_t=$row2020[13];  
                                    $nota_envio=$row2020[16];
                                    $orden_compra=$row2020[15];
                                    $p_vehiculo=$row2020[17];
                                    $comprobante_entrega=$row2020[18];
                                    $guia_aerea=$row2020[19];
                                    $cot=$row2020[35];
                                    
                                    
                                                              


                                   }?>





<table class="table" border="1">
<thead class="bg-black">

<tr  border="1">



<!--DOCUMENTOS EN COMUN MENOS PARA EL SALVADOR-->


      
        <?php if ($destino!="SV") {?>
         <th align="top" class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1"> 
     
       <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview"  >

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
        <td class="text-left">Scan de Poliza</td>
        <td class="text-left"><?php if ($scan_poliza!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $scan_poliza; ?>" data-fancybox="preview"  >

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
        <td class="text-left">Cotizacion </td>
        <td class="text-left"><?php if ($cot!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview" >

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
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?>

        <? } ?>

      </td>
      </tr>

    
 
</tbody>
</table>
</div>
      
      
<td VALIGN="TOP"><!--INICIO DE BLOQUE PARA FOTOS-->

<div class="col-lg-3 col-md-4 col-xs-6 thumb">
 
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&& x=cargando" ><img src="cargando.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&&x=evento" ><img src="evento.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&&x=entrega" ><img src="entrega.png"  width="100"></a>
    <a href="#"><img src="instructivo.png" width="100"></a>

 

</div>


</td>
      <td width="100"></td>

    </tr>
   </table>
</div>