<?php
session_start();

// Database connection
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$nivel = $_SESSION['nivel'];
$bd = $base . $anio;

$con = mysqli_connect('localhost', 'admin', 'AG784512', $bd);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, $bd);
$q = $_REQUEST['q'];

$sql = "SELECT * FROM campos_detalle WHERE id_detalle_orden = '$q'";
$result2 = mysqli_query($con, $sql);

// Fetch data
while ($row2 = mysqli_fetch_assoc($result2)) {
    $id_orden = $row2['id_orden'];
    $pliego = $row2['trabajo'];
    $cantidad = $row2['cantidad'];
    $altura = $row2['altura'];
    $base = $row2['base'];
    $c_imp = $row2['completo_imp'];
    $c_corte = $row2['completo_corte'];
    $nom_material = $row2['material'];
    $nom_equipo = $row2['equipo'];
    $tiro = $row2['tiro'];
    $nota = $row2['detalle'];
    $arte2 = $row2['arte'];
    $modal2 = "a" . $q;

    // Determine link for arte image
    $link_arte2 = ($arte2 == "no_disponible.png") ? 'imagenes/no_disponible.png' : "ORDENES_OP/CAMPOS/$id_orden/ARTES/$arte2";

    // Determine color for pliego
    $color_pliego = ($pliego == "COMBINADO") ? "red" : "green";
?>
    <div class="row">
        <div class="col-md-9">
            <div style="margin-bottom: 10px" class="portlet box <?= $color_pliego ?>"></div>
            <div class="row">
                <div class="col-md-11">
                    <div id="fms0" class="col-md-12">
                        <div id="fms" class="col-md-12">
                            <div id="fmsd0" class="col-md-12">
                                <label class="control-label"><strong>Item:</strong></label>&nbsp;&nbsp;<?= $pliego ?>
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Cantidad:</strong></label>&nbsp;&nbsp;<?= $cantidad ?>
                                &nbsp;&nbsp;<strong><font color="green">Impresiones:</font></strong>&nbsp;&nbsp;<?= $c_imp ?>
                                &nbsp;&nbsp;<strong><font color="green">Corte:</font></strong>&nbsp;&nbsp;<?= $c_corte ?>
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Tamaño:</strong></label>&nbsp;&nbsp;<?= $base ?> (base) X <?= $altura ?> (altura) CM.
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Material:</strong></label>&nbsp;&nbsp;<?= $nom_material ?>
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Equipo:</strong></label>&nbsp;&nbsp;<?= $nom_equipo ?>
                                <div class="clearfix"></div>
                                <label class="control-label"><strong>Impresion:</strong></label>&nbsp;&nbsp;<?= $tiro ?>
                                <div class="clearfix"></div>
                            </div>
                            <div id="fmsd3" class="col-md-12">
                                <label class="control-label"><strong>Nota:</strong></label>&nbsp;&nbsp;<?= $nota ?>
                            </div>
                        </div>
                        <div id="fms3" class="col-md-6 text-center">
                            <a href="<?= $link_arte2 ?>" target="_blank" data-fancybox="preview" data-width="300%" data-height="300%">
                                <img width="150px" src="<?= $link_arte2 ?>" alt="Arte">
                            </a>
                            <br><br>
                            <?php if (in_array($nivel, [1, 2, 4, 5])): ?>
                                <div class="col-md-12" style="margin-left:55px;">
                                    <a data-toggle="modal">
                                        <button type="submit" class="btn btn-danger"><strong>FINALIZADO</strong></button>
                                    </a>
                                </div>
                                <br><br>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="<?= $modal2; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="form/finalizar_item_op_campos.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">TERMINAR ITEM</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Desea terminar este item?</p>
                        <input type="hidden" name="si" value="<?= $q; ?>">
                        <input type="hidden" name="si_orden" value="<?= $id_orden; ?>">
                        <input type="hidden" name="nivel" value="<?= $nivel; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">FINALIZAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<!-- JavaScript -->
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
