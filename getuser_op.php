<?php
// Start session
session_start();

// Database connection settings
$base = $_SESSION['base'];
$anio = 22;
$nivel = $_SESSION['nivel'];
$bd = $base . $anio;

// Determine folder based on base
$carpeta_pais = ($base == "esa") ? "EL_SALVADOR" : "NICARAGUA";

// Database connection
$con = mysqli_connect('localhost', 'admin', 'AG784512', $bd);
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Get request parameter
$q = $_REQUEST['q'];

// Fetch order details
$sql = "SELECT * FROM orden_detalle WHERE id_detalle_orden = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $q);
$stmt->execute();
$result = $stmt->get_result();

// Fetch material details
$materialSql = "SELECT * FROM material WHERE id = ?";
$materialStmt = $con->prepare($materialSql);

while ($row2 = $result->fetch_assoc()) {
    $id_orden = $row2['id_orden'];
    $pliego = $row2['trabajo'];
    $cantidad = $row2['cantidad'];
    $altura = $row2['altura'];
    $base = $row2['base'];
    $coti = $row2['cot'];
    $trabajo = $row2['trabajo'];
    $nom_material = $row2['material'];
    $id_material = $row2['id_material'];
    $nom_rigido = $row2['rigido'];
    $nom_laminado = $row2['laminado'];
    $nom_equipo = $row2['equipo'];
    $impresion = $row2['tiro'];
    $nota = $row2['detalle'];
    $arte2 = $row2['arte'];
    $acabado = $row2['acabado'];
    $tiro = $row2['tiro'];
    $computo = $row2['computo'];
    $c_corte = $row2['completo_corte'];
    $c_imp = $row2['completo_imp'];
    $modal = "#a" . $q;
    $modal2 = "a" . $q;

    // Fetch material type
    $materialStmt->bind_param("s", $id_material);
    $materialStmt->execute();
    $materialResult = $materialStmt->get_result();
    $tipo_material = $materialResult->fetch_assoc()['material'] ?? '';

    // Determine link for arte
    $link_arte2 = ($arte2) ? "ORDENES_OP/COLOR/{$carpeta_pais}/{$id_orden}/ARTES/{$arte2}" : 'imagenes/no_disponible.png';

    // Determine color for pliego
    $color_pliego = ($pliego == "COMBINADO") ? "red" : "green";

    // Determine button value based on level
    $val = ($nivel == 5) ? $impresion : (($nivel == 4) ? $computo : '');

    // Display details
    echo '
    <div class="row">
        <div class="col-md-9">
            <div style="margin-bottom: 10px" class="portlet box ' . $color_pliego . '"></div>
            <div class="row">
                <div class="col-md-11">
                    <div id="fms0" class="col-md-12">
                        <div id="fms" class="col-md-12">
                            <div id="fmsd0" class="col-md-12">
                                <label class="control-label"><strong>Item:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>&nbsp;&nbsp;' . htmlspecialchars($pliego) . '
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                ' . htmlspecialchars($cantidad) . ' &nbsp;&nbsp;
                                <strong><font color="green">Impresiones:</font></strong> ' . htmlspecialchars($c_imp) . ' &nbsp;&nbsp;
                                <strong><font color="green">Corte:</font></strong> ' . htmlspecialchars($c_corte) . '
                                <div class="clearfix"></div>
                                <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                ' . htmlspecialchars($base) . ' (base) X ' . htmlspecialchars($altura) . ' (altura) CM.
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                ' . htmlspecialchars($tipo_material) . '-' . htmlspecialchars($nom_material) . '<div class="clearfix"></div>
                                <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                ' . htmlspecialchars($nom_equipo) . '<div class="clearfix"></div>
                                <label class="control-label"><strong>Impresion&nbsp;:</strong></label> ' . htmlspecialchars($tiro) . '
                                <div class="clearfix"></div>
                            </div>
                            <div id="fmsd3" class="col-md-12">
                                <label class="control-label "><strong>Nota:</strong></label> ' . htmlspecialchars($nota) . '
                            </div>
                        </div>
                        <div id="fms3" class="col-md-6">
                            <center>
                                <a href="' . htmlspecialchars($link_arte2) . '" target="_blank" data-fancybox="preview" data-width="100%" data-height="100%">
                                    <img width="150px" src="' . htmlspecialchars($link_arte2) . '">
                                </a>
                            </center>
                            <br><br>';

    // Display button based on level and value
    if (in_array($nivel, [1, 4, 5])) {
        if ($val == "1") {
            echo '<div class="col-md-12" style="margin-left:55px;">
                <a data-toggle="modal" data-target="' . htmlspecialchars($modal) . '">
                    <button type="submit" class="btn btn-warning"><strong>FINALIZAR ITEM</strong></button>
                </a>
            </div><br><br>';
        } elseif ($val == 0) {
            echo '<div class="col-md-12" style="margin-left:55px;">
                <button type="submit" class="btn btn-danger"><strong>FINALIZADO</strong></button>
            </div><br><br>';
        }
    }

    echo '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    $arte2 = "";
}
?>

<!-- Modal HTML -->
<div id="<?php echo htmlspecialchars($modal2); ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="form/finalizar_item_op.php" method="POST">
                <div class="modal-header">
                    <h2 class="modal-title">TERMINAR ITEM</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h4><p>Desea terminar este item?</p></h4>
                    <input type="hidden" name="si" value="<?php echo htmlspecialchars($q); ?>">
                    <input type="hidden" name="si_orden" value="<?php echo htmlspecialchars($id_orden); ?>">
                    <input type="hidden" name="nivel" value="<?php echo htmlspecialchars($nivel); ?>">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">
                    <button type="submit" class="btn btn-primary">FINALIZAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

    $(".zoom").hover(function() {
        $(this).addClass('transition');
    }, function() {
        $(this).removeClass('transition');
    });

    $(".rotate").fancybox({
        width: 600,
        height: 300,
        type: 'iframe'
    });
});
</script>
