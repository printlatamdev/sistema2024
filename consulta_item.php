<style>
    .btn-normal {
    opacity: 1;
    transition: opacity 0.3s;
}

.btn-selected {
    opacity: 0.5;
    transition: opacity 0.3s;
}

</style>
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
    <button type="button" id="<?php echo $button; ?>" class="btn btn-success btn-normal" data-toggle="collapse"
        data-target="<?php echo $dataa; ?>" aria-expanded="false" aria-controls="<?php echo $dataa2; ?>"
        value="<?php echo $id_detalle; ?>" onclick="toggleButton(this)" style="width:235px;">
    <font size="1.5">ITEM # <?php echo $n_item; ?>: <?php echo $nombre; ?></font>
    </button>&nbsp;&nbsp;

<script>
    function toggleButton(button) {
        // Remove the 'btn-normal' class and add the 'btn-selected' class
        if (button.classList.contains('btn-normal')) {
            button.classList.remove('btn-normal');
            button.classList.add('btn-selected');
        } else {
            // Otherwise, remove the 'btn-selected' class and add the 'btn-normal' class
            button.classList.remove('btn-selected');
            button.classList.add('btn-normal');
        }
    }
</script>


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
          <!-- Sección de pliegos relacionados -->
<div class="pliegos">
    <?php
    // Consulta para obtener los pliegos relacionados con este ítem
    $pliegosQuery = mysqli_query($con, "SELECT * FROM pop_pliego WHERE id_orden='$id_orden' AND id_detalle='$id_detalle'");

    $n_pliego = 1; // Contador para numerar los pliegos

    // Generar botones para cada pliego
    while ($pliego = mysqli_fetch_assoc($pliegosQuery)) {
        $id_pliego = $pliego['id_detalle_pliego'];
        $dataaPliego = 'pliego' . $id_pliego;

        ?>
        <button type="button" id="botonPliego<?php echo $id_pliego; ?>" class="btn btn-info btn-normal" 
        style="width:200px;" onclick="togglePliego(this, '<?php echo $dataaPliego; ?>')">
            <font size="1.5">PLIEGO # <?php echo $n_pliego; ?>: <?php echo htmlspecialchars($pliego['pliego']); ?></font>
        </button>
        &nbsp;&nbsp;
        <div id="<?php echo $dataaPliego; ?>" class="pliego-detalle" style="display: none; margin-top: 10px;">
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Base</th>
            <th>Altura</th>
            <th>Tiro</th>
            <th>Equipo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mostrar los detalles del pliego en tres filas
        echo '<tr>';
        echo '<td>' . htmlspecialchars($pliego['cantidad']) . '</td>';
        echo '<td>' . htmlspecialchars($pliego['base']) . ' cm</td>';
        echo '<td>' . htmlspecialchars($pliego['altura']) . ' cm</td>';
        echo '<td>' . htmlspecialchars($pliego['tiro']) . '</td>';
        echo '<td>' . htmlspecialchars($pliego['equipo']) . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td colspan="5" class="text-center">';
        if (!empty($pliego['arte'])) {
            echo '<a href="ORDENES_POP/' . htmlspecialchars($carpeta_pais) . '/ID_POP_' . htmlspecialchars($id_orden) . '/ARTES/' . htmlspecialchars($pliego['arte']) . '" data-fancybox="preview">';
            echo '<img src="ORDENES_POP/' . htmlspecialchars($carpeta_pais) . '/ID_POP_' . htmlspecialchars($id_orden) . '/ARTES/' . htmlspecialchars($pliego['arte']) . '" alt="Arte" style="width: 150px; height: auto;">';
            echo '</a>';
        }
        echo '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td colspan="2"><strong>Material:</strong> ' . htmlspecialchars($pliego['material']) . '</td>';
        echo '<td colspan="3"><strong>Nota:</strong> ' . htmlspecialchars($pliego['detalle']) . '</td>';
        echo '</tr>';
        ?>
    </tbody>
</table>

        </div>
        <?php
        $n_pliego++; // Incrementar el contador de pliegos
    }
    ?>
</div>

    </div>
    
    <?php
    $n_item++;
    $num_item++;
}
?>



<!-- Script para mostrar/ocultar pliegos -->
<script>
  function togglePliego(button, id) {
        // Toggle opacity of the button
        if (button.classList.contains('btn-normal')) {
            button.classList.remove('btn-normal');
            button.classList.add('btn-selected');
        } else {
            button.classList.remove('btn-selected');
            button.classList.add('btn-normal');
        }

        // Toggle visibility of the element based on the provided id
        var element = document.getElementById(id);
        if (element.style.display === "none" || element.style.display === "") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }
</script>