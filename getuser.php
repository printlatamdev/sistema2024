<?php

// Uncomment for debugging
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

// Retrieve required data from the session and request
$q = $_REQUEST['q'];
$base = $_SESSION['base'];
$anio = 22;
$nivel = $_SESSION['nivel'];
$bd = $base . $anio;

// Database connection
$con = new mysqli('localhost', 'root', '', $bd);
if ($con->connect_error) {
    die('Database connection failed: ' . $con->connect_error);
}

// Determine country-specific folder paths
$carpeta_pais = ($base === "esa") ? "EL_SALVADOR" : "NICARAGUA";
$origen = ($base === "esa") ? "SV" : "NI";

// Prepared statement to fetch pop_detalle
$stmt = $con->prepare("SELECT * FROM pop_detalle WHERE id_detalle_orden = ?");
$stmt->bind_param("i", $q);
$stmt->execute();
$pop_detalle = $stmt->get_result()->fetch_assoc();
$folderid = 'ID_POP_' . $pop_detalle['id_orden'];

// Prepared statement to fetch pop_pliego
$stmt2 = $con->prepare("SELECT * FROM pop_pliego WHERE id_detalle = ? AND estado = 1 ORDER BY id_detalle_pliego ASC");
$stmt2->bind_param("i", $q);
$stmt2->execute();
$result2 = $stmt2->get_result();

// Prepared statements for notas de corte and impresion
$area1 = "impresion";
$area2 = "corte";
$stmt3 = $con->prepare("SELECT * FROM bit_notas_corte_impresion WHERE id_orden = ? AND area = ?");
$stmt3->bind_param("is", $q, $area1);
$stmt3->execute();
$result3 = $stmt3->get_result();

$stmt4 = $con->prepare("SELECT * FROM bit_notas_corte_impresion WHERE id_orden = ? AND area = ?");
$stmt4->bind_param("is", $q, $area2);
$stmt4->execute();
$result4 = $stmt4->get_result();

// Determine the art path and fallback image
$base_path = 'ORDENES_POP/' . $carpeta_pais . '/' . $folderid . '/ARTES/';
$arte_path = $base_path . $pop_detalle['arte'];
$link_arte = (empty($pop_detalle['arte']) || !file_exists($arte_path)) ? $arte_path : $arte_path;

// Unique modal IDs
$modal_id = "modal_" . $pop_detalle['id_detalle_orden'];

?>

<!-- Modal for Finalizar Item -->
<div id="<?php echo $modal_id; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="form/finalizar_item.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">FINALIZAR ITEM</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Desea terminar este item?</p>
                    <input type="hidden" name="item" value="<?php echo $pop_detalle['id_detalle_orden']; ?>">
                    <input type="hidden" name="si_orden" value="<?php echo $pop_detalle['id_orden']; ?>">
                    <input type="hidden" name="nivel" value="<?php echo $nivel; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">FINALIZAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function final(str) {
    if (str === "") {
        document.getElementById("final").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("final").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "fin_pliego.php?q=" + str, true);
    xmlhttp.send();
}
</script>

<!-- Display Details -->
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="col-md-12">
                <label class="control-label"><strong>Mueble:</strong></label> <?php echo $pop_detalle['trabajo']; ?>
                <div class="clearfix"></div>
                <label class="control-label"><strong>Cantidad:</strong></label> <?php echo $pop_detalle['cantidad']; ?>
                <div class="clearfix"></div>
                <label class="control-label"><strong>Tamaño:</strong></label> <?php echo $pop_detalle['base']; ?> (base) X <?php echo $pop_detalle['altura']; ?> (altura) X <?php echo $pop_detalle['fondo']; ?> (fondo) CM.
                <div class="clearfix"></div>
            </div>
            <div class="col-md-12">
                <label class="control-label"><strong>Nota:</strong></label> <?php echo $pop_detalle['detalle']; ?>
            </div>
        </div>
        <div class="col-md-3">
            <center>
                <a href="<?php echo $link_arte; ?>" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%">
                    <img width="100px" src="<?php echo $link_arte; ?>">
                </a>
            </center>
        </div>
        <div class="col-md-3">
            <br>
            <label class="control-label"><strong>Notas de Corte:</strong></label>
            <a href="#" data-toggle="modal" data-target="#notacorte"> Ver Nota</a>
            <br><br>
            <label class="control-label"><strong>Notas de Impresion:</strong></label>
            <a href="#" data-toggle="modal" data-target="#ModalModificar"> Ver Nota</a>
            <br><br>
            <?php if (in_array($nivel, [1, 2, 4, 5, 15])) { ?>
                <a data-toggle="modal" data-target="#<?php echo $modal_id; ?>">
                    <span class="btn btn-warning"><strong>FINALIZAR PLIEGO</strong></span>
                </a>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Modal for Notas de Impresion -->
<form method="post" action="form/ingresarNota.php" enctype="multipart/form-data">
    <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">NOTAS DE IMPRESION</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="opcion" value="impresion">
                        <input id="id_item" type="hidden" class="form-control" name="id_item" value="<?php echo $pop_detalle['id_detalle_orden']; ?>" readonly required>
                    </div>
                    <div class="collapse" id="ejemploimpresion">
                        <div class="card card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result3->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['fecha']; ?></td>
                                            <td><?php echo $row['nota']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="nota" class="form-control"><?php echo $pop_detalle['mensaje']; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#ejemploimpresion" aria-expanded="false" aria-controls="ejemploimpresion">
                            <i class="fa fa-eye"></i> Ver historial de notas
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal for Notas de Corte -->
<form method="post" action="form/ingresarNota.php" enctype="multipart/form-data">
    <div class="modal fade" id="notacorte" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">NOTAS DE CORTE</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="opcion" value="corte">
                        <input id="id_item" type="hidden" class="form-control" name="id_item" value="<?php echo $pop_detalle['id_detalle_orden']; ?>" readonly required>
                    </div>
                    <div class="collapse" id="ejemplocorte">
                        <div class="card card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result4->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['fecha']; ?></td>
                                            <td><?php echo $row['nota']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="nota" class="form-control"><?php echo $pop_detalle['mensaje']; ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#ejemplocorte" aria-expanded="false" aria-controls="ejemplocorte">
                            <i class="fa fa-eye"></i> Ver historial de notas
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
// Close database connections
$stmt->close();
$stmt2->close();
$stmt3->close();
$stmt4->close();
$con->close();
?>
