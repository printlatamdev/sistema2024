<?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                  

                                    $status=$row['status'];
                                    $id=$row['id_orden'];
                                    $data3='esa';
                                      $data='#'.$id.$data3;
                                      $data2=$id.$data3;


                                    $ext=".png";

                                   ?>
                                     <div id="accordion">
      
                                <?echo '<tr>';?>
                               
                                <td align="left" >  <?php echo $row[   'numorden_compra'  ];    ?>  </td>
                                <td align="left" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                <td align="left" > 
                                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['origen'];?></td>
                                <td align="left" > 
                                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['destino'];?></td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td align="left" >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td align="left">  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td align="left" >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td><a  class="fa fa-file-archive-o" aria-hidden="true" href="../sistema/zip/index.php?idorden=<?php echo $row['id_orden']; ?>"> </a>  </td>
                                <?
                                  

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?php //  echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                           <!--<td><?php //echo $row['id_orden']; ?></td>-->
                                   
                                   <td align="center">
                                    <a href="#">  <i class='fas fa-angle-double-down'></i></a>

                                   </td>
                               


                               
                            </tr>


<div >

<? echo' <tr>';?>
          <td width="10%"></td> <td >                
      <div class="card-body">

       <b><span>STATUS </span> </b><br>



  <table class="table" border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>
<br>
  </thead>
  <tbody>
    <?$consulta2019 = mysqli_query($conexion,"select status, f_hora from bitacora_s where id_orden='".$row['id_orden']."'");
?>
     <?php  while ($row2019 = mysqli_fetch_array($consulta2019)){?>
    <tr>
      
      <td class="text-left">  
        <?php if (($row2019['status'])=="PROCESO"):?>
          <i class="fa fa-cog fa-spin"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="TRANSITO"):?>
          <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="CARGANDO"):?>
          <i class="fa fa-users"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="DESPACHO"):?>
          <i class="fa fa-book" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE SALIDA"):?>
          <i class="fa fa-flag-checkered"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE DESTINO"):?>
          <i class="fa fa-building" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ENTREGADO"):?>
          <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>
        <?php if (($row2019['status'])=="PROBLEMA"):?>
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'];  ?><?php endif ?>  </td>
          <td width="" class="text-left">  <?php echo $row2019['f_hora'];  ?>  </td>
    </tr>
        <?php } ?>



















 
  
  </tbody>
</table>

      </div>
    </div>
  </div>

</td>

<td width="10%"></td>



 <!--Bloque para dar separacion --> <!-- FIN BLOQUE SEPARACION -->
<td> <!--AQUI COMIENZA LAS TABLAS DE DOCUMENTOS-->


<b><span>DOCUMENTOS </span></b>
<b>


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
<br><br>
<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  

  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"){ ?>

  <tr>
         <td class="text-left">Cotizacion_aereo1</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" class="fancybox"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
      
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox"  >

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
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" class="fancybox" >
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
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
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
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" class="fancybox" >
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



    <?php if ($destino=="GT"||$destino=="HN"||$destino=="CR"){ ?>
      <tr>
        <td class="text-left">Cotizacion_gt_hn</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
      </tr>
      
      <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="fancybox" >

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
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="fancybox" >

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
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox"  >

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
     
      </tr>
    
<?php } ?>


















   <?php if ($destino=="SV"){ ?>
             <td class="text-left">Cotizacion_sv</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
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
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
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

</td><!-- TERMINA BLOQUE DE DOCUMENTOS   -->


<td width="10%"></td>




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


<?php if ($destino=="HN"||$destino=="GT"||$destino=="CR"){ ?>
<td> <!--AQUI COMIENZA LAS TABLAS DE DOCUMENTOS-->


<b><span>DOCUMENTOS </span></b>
<b>


  <table class="table" border="1">
<thead class="bg-black">
<br><br>
<tr  border="1">

<th class="text-left">Documento </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  


<!--TERMINA EL MENU PARA AEREO-->













  



<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->


      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="fancybox" >

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
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
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
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
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



















   <?php if ($destino=="SV"){ ?>
             <td class="text-left">Cotizacion_sv</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" class="fancybox" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="fancybox" >
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
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="fancybox" >
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
</table>  <? } ?></b>

</td><!-- TERMINA BLOQUE DE DOCUMENTOS   -->



<!-- BUSCANDO LAS FOTOS QUE PERTENECEN A LA ORDEN DENTRO DEL WHILE-->









  






 <!--Bloque para dar separacion --> <td width="1%">
   



 </td><!-- FIN BLOQUE SEPARACION -->
<td><!--INICIO DE BLOQUE PARA FOTOS-->

  <br><br>








 
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
 
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&&x=cargando" ><img src="assets/images/cargando.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&&x=evento" ><img src="assets/images/evento.png"  width="100"></a>
    <a data-fancybox data-type="iframe" href="fotos_nuevo.php?id_orden=<? echo $row['id_orden'];?>&&x=entrega" ><img src="assets/images/entrega.png"  width="100"></a>
    <a href="#"><img src="assets/images/instructivo.png" width="100"></a>

 

</div>


</td>
           















</tr> 

</div>
</div>

<?php
                                 }
                               ?>