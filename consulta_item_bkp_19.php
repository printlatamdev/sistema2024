<div class="contenido">
  <div class="card-body">
    <table border="0">
      <tr>
        <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td>
        <td> <?php echo $row['vendedor'] ?></td>
        <?php
        $base = $_SESSION['base'];
        $anio = $_SESSION['year'];
        $planta = $base == 'nica' ? 'RIM de Centro America' : 'Color Digital';
        $carpeta_pais = $base == 'nica' ? 'NICARAGUA' : 'EL_SALVADOR';
        $id_orden = $row['id_orden'];
        ?>
        <td width="100"></td>
        <td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td>
        <td> <?php echo $planta; ?></td>
      </tr>
      <tr>
        <td><b>Direccion de Entrega:</b>&nbsp;&nbsp;&nbsp;</td>
        <td> <?php echo $row['direccion_entrega'] ?? ''; ?></td>
      </tr>
    </table>
    <br>
    <table>
      <tr>
        <td><b>ITEMS EN ESTA ORDEN</b></td>
      </tr>
    </table>
    <br>

    <?php
// Consulta inicial para obtener los detalles relacionados con la orden
$obteniendo2 = mysqli_query($con, "SELECT * FROM pop_detalle WHERE id_orden='" . $row['id_orden'] . "' AND estado=1 ORDER BY id_detalle_orden ASC");

$i = 1;
$n_item = 1;
$num_item = 0;

// Generación de botones para cada ítem relacionado con la orden
while ($filas = mysqli_fetch_assoc($obteniendo2)) {

    if ($i > 4) { ?>
        <div class="row"><?php echo '<br><br>'; ?></div>
        <?php
        $i = 0;
    }
    $i++;

    $id_detalle = $filas['id_detalle_orden'];
    $nombre = $filas['trabajo'];

    // Definición de los datos de collapse y botón
    $dataa = '#collapse' . $id_detalle;
    $dataa2 = 'collapse' . $id_detalle;
    $n_funcion = 's' . $row['id_orden'] . '(this.value)';
    $button = 'boton' . $id_detalle;
    $button2 = '#boton' . $id_detalle;
    ?>
    <button type="button" id="<?php echo $button; ?>" class="btn btn-success" data-toggle="collapse"
        data-target="<?php echo $dataa; ?>" aria-expanded="false" aria-controls="<?php echo $dataa2; ?>"
        value="<?php echo $id_detalle; ?>" onclick="<?php echo $n_funcion; ?>" style="width:235px;">
        <font size="1.5">ITEM # <?php echo $n_item; ?>: <?php echo $nombre; ?></font>
    </button>&nbsp;&nbsp;

    <div id="<?php echo $dataa2; ?>" class="collapse">
      <br>
        <!-- Aquí va el contenido que se desplegará al hacer clic en el botón -->
        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5" class="text-center">Detalles</th>
                    </tr>
                    <tr>
                        <th>Cantidad</th>
                        <th>Trabajo</th>
                        <th>Base</th>
                        <th>Altura</th>
                        <th>Fondo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener los detalles específicos de id_detalle_orden
                    $detalleQuery = mysqli_query($con, "SELECT * FROM pop_detalle WHERE id_detalle_orden='" . $id_detalle . "' AND estado=1 ORDER BY id_detalle_orden ASC");

                    // Recorrer todos los resultados de la consulta
                    while ($detalleFilas = mysqli_fetch_assoc($detalleQuery)) {
                        echo '<tr>';
                        echo '<td>' . $detalleFilas['cantidad'] . '</td>';
                        echo '<td>' . $detalleFilas['trabajo'] . '</td>';
                        echo '<td>' . $detalleFilas['base'] . ' cm' . '</td>';
                        echo '<td>' . $detalleFilas['altura'] . ' cm' . '</td>';
                        echo '<td>' . $detalleFilas['fondo'] . ' cm' . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <div class="text-center mb-3">
                <?php
                // Consulta para obtener los detalles específicos de id_detalle_orden para la imagen
                $detalleQuery = mysqli_query($con, "SELECT * FROM pop_detalle WHERE id_detalle_orden='" . $id_detalle . "' AND estado=1 ORDER BY id_detalle_orden ASC");

                // Recorrer todos los resultados para mostrar la imagen
                while ($detalleFilas = mysqli_fetch_assoc($detalleQuery)) {
                    ?>
                    <a class="fancybox" href="ORDENES_POP/<?php echo $carpeta_pais; ?>/ID_POP_<?php echo $id_orden; ?>/ARTES/<?php echo $detalleFilas['arte']; ?>" data-fancybox="preview">
                        <img src="ORDENES_POP/<?php echo $carpeta_pais; ?>/ID_POP_<?php echo $id_orden; ?>/ARTES/<?php echo $detalleFilas['arte']; ?>" alt="Arte" style="width: 150px; height: auto;">
                    </a>
                    <?php
                }
                ?>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener los detalles específicos de id_detalle_orden
                    $detalleQuery = mysqli_query($con, "SELECT * FROM pop_detalle WHERE id_detalle_orden='" . $id_detalle . "' AND estado=1 ORDER BY id_detalle_orden ASC");

                    // Recorrer todos los resultados para mostrar los detalles
                    while ($detalleFilas = mysqli_fetch_assoc($detalleQuery)) {
                        echo '<tr>';
                        echo '<td>' . $detalleFilas['detalle'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <br>
            
        </div>
    </div>
    
    <?php
    $n_item++;
    $num_item++;
}
?>
