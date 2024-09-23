<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
    <title>Color Digital | 2020</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" />
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN PAGE STYLES -->
    <link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->

    <link rel="shortcut icon" href="images/color.ico" />

    <!-- Additional Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
</head>

<body>
    <?php
    if (isset($_REQUEST['id'])) {
        include("connect.php");

        // Fetch order details
        $stmt = $mysqli->prepare("SELECT id_orden, empresa, contacto FROM pop WHERE id_orden = ?");
        $stmt->bind_param("i", $_REQUEST['id']);
        $stmt->execute();
        $stmt->bind_result($id_orden, $empresa, $contacto);
        $stmt->fetch();
        $stmt->close();

        if ($id_orden) {
            ?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="alert alert-info"><i class="fa fa-check-square"></i> <strong>SELECCIONE LUGAR DE IMPRESION</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form action="remision.pop.php" method="POST" target="_self">
                            <input id="btnLogC" class="btn btn-primary" name="area" type="submit" value="planta" />
                            <img id="planta" src="images/planta.png" width="200" height="150" alt="Planta" />

                            <input id="btnLogC" class="btn btn-primary" name="area" type="submit" value="admin" />
                            <img id="admin" src="images/admin.png" width="150" height="150" alt="Admin" />

                            <br><br>
                            <label for="cant">#Orden</label>
                            <input name="id" type="text" id="cant" value="<?= htmlspecialchars($id_orden) ?>" size="8" readonly />
                            <input type="hidden" name="base" value="<?= htmlspecialchars($base) ?>" />
                        </form>

                        <form action="remision.pop.php" method="POST" target="_self">
                            <br><br>
                            <input id="btnLogC" class="btn btn-primary" name="area" type="submit" value="develop" />
                            <img id="develop" src="../images/remision.png" width="125" height="125" alt="Develop" />
                            <input name="id" type="hidden" value="<?= htmlspecialchars($id_orden) ?>" />
                            <input type="hidden" name="base" value="<?= htmlspecialchars($base) ?>" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn green">Cerrar</button>
                    </div>
                </div>
            </div>

            <?php
        }

        // Fetch and display additional order details if necessary
        $stmt = $mysqli->prepare("SELECT id_orden, empresa, contacto, remision FROM orden WHERE id_orden = ?");
        $stmt->bind_param("i", $_REQUEST['id']);
        $stmt->execute();
        $stmt->bind_result($id_orden, $empresa, $contacto, $remision);
        $stmt->fetch();
        $stmt->close();

        if ($remision == 1) {
            ?>
            <div id="rem<?= $id_orden ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="alert alert-info"><i class="fa fa-check-square"></i> <strong>Impresion Nota de Remision - Orden <?= htmlspecialchars($id_orden) ?></strong></h4>
                        </div>
                        <div class="modal-body">
                            <form action="produccion.pop.remision.php" method="get" target="_self">
                                <input type="hidden" name="empresa" value="<?= htmlspecialchars($empresa) ?>" />
                                <input type="hidden" name="contacto" value="<?= htmlspecialchars($contacto) ?>" />

                                <?php
                                $stmt2 = $mysqli->prepare("SELECT do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden 
                                                           FROM orden o 
                                                           JOIN orden_detalle do ON o.id_orden = do.id_orden 
                                                           WHERE do.estado != 'ANULADA' AND o.id_orden = ? 
                                                           ORDER BY o.id_orden");
                                $stmt2->bind_param("i", $id_orden);
                                $stmt2->execute();
                                $stmt2->bind_result($cantidad, $base, $altura, $trabajo, $detalle, $iddetalle);
                                $num = 0;

                                while ($stmt2->fetch()) {
                                    $num++;
                                    ?>
                                    <input type="checkbox" name="item<?= $num ?>" value="<?= htmlspecialchars($iddetalle) ?>" />
                                    <strong>Cantidad:</strong>
                                    <input name="cant<?= $num ?>" type="text" id="cant" value="<?= htmlspecialchars($cantidad) ?>" size="8" />
                                    <br>
                                    <strong>Trabajo:</strong> <?= htmlspecialchars($trabajo) ?>
                                    <br>
                                    <strong>Material:</strong> <?= htmlspecialchars($base) ?>
                                    <br>
                                    <strong>Altura:</strong> <?= htmlspecialchars($altura) ?>
                                    <br>
                                    <strong>Detalle:</strong> <?= htmlspecialchars($detalle) ?>
                                    <br><br>
                                    <?php
                                }
                                $stmt2->close();
                                ?>
                                <input type="hidden" name="num" value="<?= $num ?>" />
                                <input type="hidden" name="orden" value="<?= htmlspecialchars($id_orden) ?>" />
                                <input id="btnLogC" class="btn btn-primary" name="area" type="submit" value="PRODUCCION" />
                                <input type="submit" name="Submit2" class="btn default red-stripe" value="CANCELAR" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn green">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>