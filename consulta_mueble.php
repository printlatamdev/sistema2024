 
  <? 
   //include('connect.php');
   //$conexion=conexion();

  

    $mueble = mysqli_query($conexion,"select a.id_orden, a.id_detalle_orden, a.empresa, a.cantidad, a.base, a.altura, a.trabajo, a.cot, a.detalle, b.id_orden, b.vendedor, b.fecha_orden, b.nombre_proyecto, b.id_proyecto from pop_detalle a inner join pop b on a.id_orden = b.id_orden  where  a.id_orden='".$row['id_orden']."' ");



   while ($row34 = mysqli_fetch_array($mueble)){
        
                     
                     $orden=$row34[0];
                     $id_detalle=$row34[1];
                     $empresa=$row34[2];
                     $cantidad=$row34[3];
                     $base=$row34[4];
                     $altura=$row34[5];
                     $trabajo=$row34[6];
                     $cot=$row34[7];
                     $detalle=$row34[8];
                     $vendedor=$row34[10];
                     $fecha_orden=$row34[11];
                     $proyecto=$row34[12];
                     $numproyecto=$row34[13];
                                                      
 }?>


<div class="contenido">
   <div class="card-body">

     <div class="row">
       <div class="col-md-12">
         <div class="col-md-4">
          
          <div class="row">
            <strong>Item <?echo $var;?> </strong><?echo $trabajo; ?>
          </div>
          <div class="row">
            <strong>Cantidad: <?echo $row['id_orden']; ?></strong>
          </div>
          <div class="row">
            <strong>Medida: </strong><?echo $cantidad; ?>
          </div>
          <div class="row">
            <strong>Arte: </strong><?echo $proyecto; ?>
          </div>
          <div class="row">
            <strong>OD: </strong><?echo $numproyecto; ?>
          </div>
           
         </div>
         <div class="col-md-4">
          
          <div class="row">
            <strong>Item: </strong>
          </div>
          <div class="row">
            <strong>Cantidad: </strong>
          </div>
          <div class="row">
            <strong>Medida: </strong>
          </div>
          <div class="row">
            <strong>Arte: </strong>
          </div>
          <div class="row">
            <strong>OD: </strong>
          </div>
           
         </div><div class="col-md-4">
          
          <div class="row">
            <strong>Item: </strong>
          </div>
          <div class="row">
            <strong>Cantidad: </strong>
          </div>
          <div class="row">
            <strong>Medida: </strong>
          </div>
          <div class="row">
            <strong>Arte: </strong>
          </div>
          <div class="row">
            <strong>OD: </strong>
          </div>
           
         </div>
       </div>
     </div>





        

   </div>
</div>
