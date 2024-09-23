<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes de Producción</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="contenido">
   <div class="card-body">

    <table>
        <tr>
            <td><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp;</td>
            <td><?= htmlspecialchars($row['vendedor']) ?></td>
            <td width="100"></td>
            <td><b>Planta:</b>&nbsp;&nbsp;&nbsp;</td>
            <td>Color Digital El Salvador.</td>
        </tr>
    </table>
    <br>

    <table>
        <tr>
            <td><b>ITEMS EN ESTA ORDEN</b></td>
        </tr>
    </table>
    <br>

    <table>
        <tr>
        <?php
        $nivel = $_SESSION['nivel'];
        $idOrden = htmlspecialchars($row['id_orden']);
        $query = "SELECT * FROM campos_detalle WHERE id_orden='$idOrden'";

        $obteniendo2 = mysqli_query($con, $query);

        $i = 1;
        $n_item = 1;
        $count = 0;

        while ($filas = mysqli_fetch_assoc($obteniendo2)) {
            $count++;
            if ($i > 4) {
                echo '<div class="row"><br><br></div>';
                $i = 0;
            }
            $i++;

            $id_detalle = htmlspecialchars($filas['id_detalle_orden']);
            $nombre = htmlspecialchars($filas['trabajo']);
            $n_funcion = 's' . $row['id_orden'] . '(this.value)';
            $buttonId = 'boton' . $id_detalle;
            $dataa = "#$id_detalle";

            if ($count > 5) {
                echo "</tr><tr><td><br></td></tr><tr>";
                $count = 0;
            } else {
                echo '<td>
                    <button id="' . $buttonId . '" type="submit" class="btn btn-success" data-toggle="collapse" data-target="' . $dataa . '" aria-expanded="false" aria-controls="' . $dataa . '" value="' . $id_detalle . '" onclick="' . $n_funcion . '" style="width:150px;">
                        <font size="1.7">ITEM # ' . $n_item . ": " . $nombre . '</font>
                    </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>';
            }

            $n_item++;
        }
        ?>
        </tr>
    </table>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>
