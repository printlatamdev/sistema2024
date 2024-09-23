

<div class="contenido">
   <div class="card-body">
          <table border="0" >
                                        <tr><td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td><td><? echo $row['vendedor']?></td>
                                          <td width="100"></td><td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td><td>Color Digital El Salvador</td></tr>
                                        <tr><td><b>Direccion de Entrega:</b>&nbsp;&nbsp;&nbsp;</td><td><? echo $row['direccion_entrega'];?></td></tr>
                                      </table><br>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#direccion" data-whatever="@mdo">Directorio</button>-->



                                      <table>
                                        <tr><td><b>ITEMS EN ESTA ORDEN</b></td>
                                      </tr>
                                      </table><br>
  <div class="modal fade" id="direccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name" value="cloaro que si">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" value="cloaro que no"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>




<?
session_start();
$nivel=$_SESSION['nivel'];

if ($nivel==5) {

  $obteniendo2 = mysqli_query($con,"select * from pop_detalle where id_orden='".$row['id_orden']."' and impresion=1");
 
}
elseif($nivel==15){

 $obteniendo2 = mysqli_query($con,"select * from pop_detalle where id_orden='".$row['id_orden']."' and corte=1");

}

else
{

  $obteniendo2 = mysqli_query($con,"select * from pop_detalle where id_orden='".$row['id_orden']."'");
}



$i=1;
$n_item=1;
$num_item=0;
   while ($filas = mysqli_fetch_assoc($obteniendo2)){
     
                            if ($i > 4) {?>
                              <div class="row"><?php echo '<br><br>'; ?></div>

                            <? $i=0;}$i++;  
                            
                                      $id_detalle=$filas['id_detalle_orden'];
                                      $nombre=$filas['trabajo'];
                                      $id_detalle_orden=$filas['id_detalle_orden'];?>


<?$n_funcion='s'.$row['id_orden'].'(this.value)';
 $button='boton'.$id_detalle;
  $button2='#boton'.$id_detalle;

            echo '

 <img src="imagenes/item4.png" width="20">&nbsp;&nbsp;
 <button  type="button" id="'.$button.'" class="btn btn-success" data-toggle="collapse" data-target='.$dataa.' aria-expanded="false" aria-controls='.$dataa2.' value='.$id_detalle.' onclick='.$n_funcion.' >ITEM # '.$n_item.": ".$nombre.'</button>&nbsp;&nbsp;';  


            $n_item++;
            $num_item++;?>




<script type="text/javascript">
  $("<? echo $button2;?>").click(function(){
  $(this).toggleClass("btn-success btn-danger");
});
</script>



<? } ?>


  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
