
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="contenido">
   <div class="card-body">



      
    <table >
     <tr>
       <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td><td><?php echo $row['vendedor']?></td>

       <?php $base=$_SESSION['base'];
       $nivel=$_SESSION['nivel'];
          // $anio=$_SESSION['year'];
           $anio=22;
        if ($base=="nica") {

          $planta="Color Digital Nicaragua";

          
        }else{
           $planta="Color Digital El Salvador";
        }


           ?>
       <td width="100"></td><td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td><td><?php echo $planta;?></td>
     </tr>
    </table><br>


    <table >
      <tr>
        <td><b>ITEMS EN ESTA ORDEN<?=$nivel;?></b></td>
      </tr>
    </table>
    <table>
      
    <tr>

  <?php
 if ($nivel==4) {
  $obteniendo2 = mysqli_query($con,"select * from orden_detalle where id_orden='".$row['id_orden']."' order by id_detalle_orden asc ");
 }
 elseif ($nivel==5) {
  $obteniendo2 = mysqli_query($con,"select * from orden_detalle where id_orden='".$row['id_orden']."' order by id_detalle_orden asc");
 }
 elseif ($nivel==15) {
 $obteniendo2 = mysqli_query($con,"select * from orden_detalle where id_orden='".$row['id_orden']."' order by id_detalle_orden asc ");
 }

 else{
 $obteniendo2 = mysqli_query($con,"select * from orden_detalle where id_orden='".$row['id_orden']."' order by id_detalle_orden asc ");
 }
   


  


  $i=1;
  $n_item=1;
  $num_item=0;
  $count=0;
  
   while ($filas = mysqli_fetch_assoc($obteniendo2)){
          $count++;
       
                      $id_detalle=$filas['id_detalle_orden'];
                      $nombre=$filas['trabajo'];
                      $id_detalle_orden=$filas['id_detalle_orden'];
                      $x="#".$filas['id_detalle_orden'];
                      ?>

                   

                      
    


        <?php $n_funcion='s'.$row['id_orden'].'(this.value)';

           $button='boton'.$id_detalle;
           $button2='#boton'.$id_detalle;
           if ($count > 4) {
             echo "</tr><tr></tr><tr>";
             $count=1;
           } 
             
             echo '<td>
          <button id='.$id_detalle.' type="submit"  class="btn btn-success" data-toggle="collapse" data-target='.$dataa.' aria-expanded="false" aria-controls='.$dataa2.' value='.$id_detalle.' onclick='.$n_funcion.' style="width:200px;" ><font size="1.7">ITEM # '.$n_item.": ".$nombre.'</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
           
           
           

          

            $n_item++;
            $num_item++;?>
    

        <?php } ?>
        <tr>
       </table>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

