<?php
// session_start();

// Initialize necessary session variables
$base = $_SESSION['base'];
$year = $_SESSION['year'];
$nivel = $_SESSION['nivel'];

// $year = 22; // Hardcoded year as per the original code

// Determine the planta based on the base session variable
$planta = ($base == "nica") ? "Color Digital Nicaragua" : "Color Digital El Salvador";

// Set the query based on the user's level
$query = "SELECT * FROM orden_detalle WHERE id_orden='" . $row['id_orden'] . "'";
if ($nivel == 4) {
    $query .= " AND computo=1";
} elseif ($nivel == 5) {
    $query .= " AND impresion=1";
}
$query .= " ORDER BY id_detalle_orden ASC";

// Execute the query
$obteniendo2 = mysqli_query($con, $query);

?>

<div class="contenido">
    <div class="card-body">
        <table>
            <tr>
                <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo htmlspecialchars($row['vendedor']); ?></td>
                <td width="100"></td>
                <td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo htmlspecialchars($planta); ?></td>
            </tr>
        </table>
        <br>

        <table>
            <tr>
                <td><b>ITEMS EN ESTA ORDEN</b></td>
            </tr>
        </table>

        <table>
            <tr>
                <?php
                $i = 1;
                $n_item = 1;
                $count = 0;

                while ($filas = mysqli_fetch_assoc($obteniendo2)) {
                    $count++;
                    $id_detalle = $filas['id_detalle_orden'];
                    $nombre = $filas['trabajo'];
                    $dataa = "#".$id_detalle; // Assuming $dataa is related to the collapse target, should be defined based on your requirements
                    $dataa2 = $id_detalle; // Assuming $dataa2 is related to the collapse control, should be defined based on your requirements
                    $n_funcion = 's' . $row['id_orden'] . '(this.value)';

                    if ($count > 4) {
                        echo "<tr></tr>";
                        $count = 1;
                    }

                    echo '<td><img src="" width="20">&nbsp;&nbsp;
                          <button id="' . htmlspecialchars($id_detalle) . '" 
                                  type="submit"  
                                  class="btn btn-success" 
                                  data-toggle="collapse" 
                                  data-target="' . htmlspecialchars($dataa) . '" 
                                  aria-expanded="false" 
                                  aria-controls="' . htmlspecialchars($dataa2) . '" 
                                  value="' . htmlspecialchars($id_detalle) . '" 
                                  onclick="' . htmlspecialchars($n_funcion) . '" 
                                  style="width:200px;">
                              <font size="1.7">ITEM # ' . $n_item . ': ' . htmlspecialchars($nombre) . '</font>
                          </button>
                          </td>';

                    $n_item++;
                }
                ?>
            </tr>
        </table>
    </div>
</div>
