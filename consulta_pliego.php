<div class="contenido">
  <div class="card-body">
    <?php


$pliegosQuery = mysqli_query($con, "SELECT * FROM pop_pliego WHERE id_orden='" . $id_orden . "' AND id_detalle_orden='" . $detalleFilas['id_detalle_orden'] . "' AND estado=1 ORDER BY id_pliego ASC");
$n_pliego = 1;

while ($pliegoFilas = mysqli_fetch_assoc($pliegosQuery)) {
    $id_pliego = $pliegoFilas['id_pliego'];
    $nombre_pliego = $pliegoFilas['nombre_pliego']; // Asumiendo que tienes un campo para el nombre del pliego

    // Definición de los datos de collapse y botón
    $dataaPliego = '#collapsePliego' . $id_pliego;
    $dataaPliego2 = 'collapsePliego' . $id_pliego;
    $n_funcionPliego = 'p' . $id_orden . '(this.value)';
    $buttonPliego = 'botonPliego' . $id_pliego;
    ?>
    <button type="button" id="<?php echo $buttonPliego; ?>" class="btn btn-info" data-toggle="collapse"
            data-target="<?php echo $dataaPliego; ?>" aria-expanded="false" aria-controls="<?php echo $dataaPliego2; ?>"
            value="<?php echo $id_pliego; ?>" onclick="<?php echo $n_funcionPliego; ?>" style="width:235px;">
        <font size="1.5">PLIEGO # <?php echo $n_pliego; ?>: <?php echo $nombre_pliego; ?></font>
    </button>&nbsp;&nbsp;

    <div id="<?php echo $dataaPliego2; ?>" class="collapse">
        <br>
        <!-- Aquí va el contenido que se desplegará al hacer clic en el botón del pliego -->
        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="5" class="text-center">Detalles del Pliego</th>
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
                    echo '<tr>';
                    // echo '<td>' . $pliegoFilas['cantidad'] . '</td>';
                    // echo '<td>' . $pliegoFilas['trabajo'] . '</td>';
                    // echo '<td>' . $pliegoFilas['base'] . ' cm' . '</td>';
                    // echo '<td>' . $pliegoFilas['altura'] . ' cm' . '</td>';
                    // echo '<td>' . $pliegoFilas['fondo'] . ' cm' . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>

            <div class="text-center mb-3">
                <a class="fancybox" href="ORDENES_POP/<?php echo $carpeta_pais; ?>/ID_POP_<?php echo $id_orden; ?>/PLIEGOS/<?php echo $pliegoFilas['archivo_pliego']; ?>" data-fancybox="preview">
                    <img src="ORDENES_POP/<?php echo $carpeta_pais; ?>/ID_POP_<?php echo $id_orden; ?>/PLIEGOS/<?php echo $pliegoFilas['archivo_pliego']; ?>" alt="Pliego" style="width: 150px; height: auto;">
                </a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Detalle del Pliego</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo '<tr>';
                    echo '<td>' . $pliegoFilas['detalle'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    $n_pliego++;
}
?>
  </div>
</div>
