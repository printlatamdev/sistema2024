<?php
use chillerlan\QRCode\QRCode;
include './vendor/autoload.php';
$impresion_;
$corte_;
$ruta_imp;
$ruta_corte;

while ($general_data = mysqli_fetch_assoc($proyect_info)){
  $ruta_corte = urldecode($general_data['ruta_corte']);
  $ruta_imp = urldecode($general_data['ruta_impresion']);


    if (isset($ruta_imp) && !empty($ruta_imp)) {
    $impresion_ = (new QRCode())->render($ruta_imp);
}
if (isset($ruta_corte) && !empty($ruta_corte)) {
    $corte_ = (new QRCode())->render($ruta_corte);
}
}

?>
<div class="contenido">
  <div class="card-body">
    <table border="0" style="width: 100%;">
      <tr>
        <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td>
        <td><? echo $row['vendedor'] ?></td>


        <?
        $base = $_SESSION['base'];
        $anio = $_SESSION['year'];
       /*  if ($base == "nica") {
          $planta = "Color Digital Nicaragua";
        } else {
          $planta = "Color Digital El Salvador";
        } */
        $planta = $base == 'nica' ? 'RIM de Centro America':'Color Digital';
        ?>
        <td width="28"></td>
        <td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td>
        <td><? echo $planta; ?></td>
        <td style="text-align:center"><b>RUTA DE IMPRESION:</b></td>
        <td style="text-align:center"><b>RUTA DE CORTE:</b></td>
      </tr>
      <tr>
        <td><b>Direccion de Entrega:</b>&nbsp;&nbsp;&nbsp;</td>
        <td><? echo $row['direccion_entrega']; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="padding:0;text-align:center;">
                        <?php if (isset($impresion_) && !empty($impresion_)) : ?>
                            <img src="<?= $impresion_ ?>"  style='margin:0;padding: 0;width:110px;' />
                            <br>
                            <?php echo '<a class="btn btn-success" href="'.$ruta_imp.'">Ver Archivos</a>'?>
                        <?php endif; ?>
                    </td>
                    <td style="padding:0;text-align:center;">

                        <?php if (isset($corte_) && !empty($corte_)) : ?>
                            <img src="<?= $corte_ ?>" style='margin:0;padding: 0;width:110px;' />
                            <br>
                            <?php echo '<a class="btn btn-success" href="'.$ruta_corte.'">Ver Archivos</a>'?>
                        <?php endif; ?>
                    </td>
      </tr>
    </table><br>
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#direccion" data-whatever="@mdo">Directorio</button>-->



    <table>
      <tr>
        <td><b>ITEMS EN ESTA ORDEN</b></td>
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
    $nivel = $_SESSION['nivel'];

    if ($nivel == 5) {

      $obteniendo2 = mysqli_query($con, "select * from pop_detalle where id_orden='" . $row['id_orden'] . "' and estado=1  order by id_detalle_orden asc");
    } elseif ($nivel == 15) {

      $obteniendo2 = mysqli_query($con, "select * from pop_detalle where id_orden='" . $row['id_orden'] . "' and estado=1   order by id_detalle_orden asc");
    } elseif ($nivel == 4) {

      $obteniendo2 = mysqli_query($con, "select * from pop_detalle where id_orden='" . $row['id_orden'] . "' and estado=1   order by id_detalle_orden asc");
    } else {

      $obteniendo2 = mysqli_query($con, "select * from pop_detalle where id_orden='" . $row['id_orden'] . "' and estado=1 order by id_detalle_orden asc");
    }



    $i = 1;
    $n_item = 1;
    $num_item = 0;
    while ($filas = mysqli_fetch_assoc($obteniendo2)) {

      if ($i > 4) { ?>
        <div class="row"><?php echo '<br><br>'; ?></div>

      <? $i = 0;
      }
      $i++;

      $id_detalle = $filas['id_detalle_orden'];
      $nombre = $filas['trabajo'];
      $id_detalle_orden = $filas['id_detalle_orden']; ?>


      <? $n_funcion = 's' . $row['id_orden'] . '(this.value)';
      $button = 'boton' . $id_detalle;
      $button2 = '#boton' . $id_detalle;
      ?><style type="text/css">

      </style><?
              echo '<button  type="button" id="' . $button . '" class="btn btn-success" data-toggle="collapse" data-target=' . $dataa . ' aria-expanded="false" aria-controls=' . $dataa2 . ' value=' . $id_detalle . ' onclick=' . $n_funcion . ' style="width:235px;" ><font size="1.5">ITEM # ' . $n_item . ": " . $nombre . '</button>&nbsp;&nbsp;';


              $n_item++;
              $num_item++; ?>




      <script type="text/javascript">
        $("<? echo $button2; ?>").click(function() {
          $(this).toggleClass("btn-success btn-danger");
        });
      </script>



    <? } ?>


  </div>
</div>