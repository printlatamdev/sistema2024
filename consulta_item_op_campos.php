<div class="contenido">
  <div class="card-body">
    <!--<div class="col-md-10"></div>
    <div class="col-md-2">
      <a class="fas fa-angle-double-up" data-toggle="collapse" data-target="<? echo $data; ?>" aria-expanded="false" aria-controls="<? echo $data2; ?>" ></a>
    </div>-->


    <table>
      <tr>
        <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td>
        <td><? echo $row['vendedor'] ?></td>
        <td width="100"></td>
        <td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td>
        <td>Color Digital El Salvador.</td>
      </tr>
    </table><br>


    <table>
      <tr>
        <td><b>ITEMS EN ESTA ORDEN</b></td>
      </tr>
    </table>




    <table>

      <tr>


        <?php
        $nivel = $_SESSION['nivel'];

        if ($nivel == 5) {
          // $obteniendo2 = mysqli_query($con,"select * from campos_detalle where id_orden='".$row['id_orden']."' and impresion=1 order by id_detalle_orden asc ");
          $obteniendo2 = mysqli_query($con, "select * from campos_detalle where id_orden='" . $row['id_orden'] . "' order by id_detalle_orden asc ");
        } else
          if ($nivel == 15) {
            $obteniendo2 = mysqli_query($con, "select * from campos_detalle where id_orden='" . $row['id_orden'] . "' order by id_detalle_orden asc ");
          } elseif ($nivel == 4) {
            $obteniendo2 = mysqli_query($con, "select * from campos_detalle where id_orden='" . $row['id_orden'] . "' and computo=1 order by id_detalle_orden asc ");
          } else {
            $obteniendo2 = mysqli_query($con, "select * from campos_detalle where id_orden='" . $row['id_orden'] . "' order by id_detalle_orden asc  ");
          }


        $i = 1;
        $n_item = 1;
        $num_item = 0;
        $count = 0;

        while ($filas = mysqli_fetch_assoc($obteniendo2)) {
          $count++;
          if ($i > 4) { ?>
            <div class="row"><?php echo ''; ?></div>
            <?php $i = 0;
          }
          $i++;
          $id_detalle = $filas['id_detalle_orden'];
          $nombre = $filas['trabajo'];
          $id_detalle_orden = $filas['id_detalle_orden'];
          $x = "#" . $filas['id_detalle_orden']; ?>






          <?php $n_funcion = 's' . $row['id_orden'] . '(this.value)';

          $button = 'boton' . $id_detalle;
          $button2 = '#boton' . $id_detalle;
          if ($count > 4) {
            echo "</tr><tr>";
            $count = 1;
          }
          echo '<td>
           <button id=' . $id_detalle . ' type="submit"  class="btn btn-success" data-toggle="collapse" data-target=' . $dataa . ' aria-expanded="false" aria-controls=' . $dataa2 . ' value=' . $id_detalle . ' onclick=' . $n_funcion . ' style="width:200px;" ><font size="1.7">ITEM # ' . $n_item . ": " . $nombre . '</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';

          $n_item++;
          $num_item++; ?>
        <?php } ?>
      <tr>
    </table>

  </div>
</div>