<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <title>Sistema Color Digital</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
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
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <!-- END THEME STYLES -->

    <link rel="shortcut icon" href="images/color.ico" />
</head>

<body>
    <div class="clearfix"></div>
    <!-- BEGIN CONTAINER -->

    <?php
    function getOrderDetails($mysqli, $id_orden)
    {
        $sql = "SELECT o.id_orden, do.cantidad, do.base, do.altura, do.trabajo, do.detalle, do.id_detalle_orden as iddetalle 
                FROM pop as o
                JOIN pop_detalle as do ON o.id_orden = do.id_orden 
                WHERE do.estado != 0 AND o.id_orden = ?
                ORDER BY o.id_orden";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $id_orden);
        $stmt->execute();
        return $stmt->get_result();
    }

    function renderOrderModal($id_orden, $route, $num, $orderDetails)
    {
        echo '
        <div id="rem' . htmlspecialchars($id_orden) . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="alert alert-info"><i class="fa fa-check-square"></i> <strong>Impresión Nota de Remisión - Orden ' . htmlspecialchars($id_orden) . '</strong></h4>
                    </div>
                    <div class="modal-body">
                        <form id="remissionForm" action="produccion.pop.remision.php" method="get" target="_self">
                            <input type="hidden" name="idorden" value="' . htmlspecialchars($id_orden) . '">
                            <input type="hidden" name="ruta" value="' . htmlspecialchars($route) . '" size="15" readonly="readonly" />
                            <input type="hidden" name="numero" value="' . htmlspecialchars($num) . '">
        ';

        $num = 0;
        while ($row2 = $orderDetails->fetch_assoc()) {
            $num++;
            echo '
            <div class="form-group">
                <input type="checkbox" name="item' . $num . '" value="' . htmlspecialchars($row2['iddetalle']) . '"> &nbsp;
                <b>' . htmlspecialchars($row2['trabajo']) . '</b><br>
                <strong>Cantidad:</strong>
                <input name="cant' . $num . '" type="text" value="' . htmlspecialchars($row2['cantidad']) . '" size="8" /><br>
                <strong>Detalle:</strong><br>
                <textarea name="det' . $num . '" cols="70">' . htmlspecialchars($row2['detalle']) . '</textarea><br><hr>
            </div>
            ';
        }

        echo '
                            <button type="button" onclick="submitSelectedItems()">Imprimir</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn green">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

    if (isset($_REQUEST['id'])) {
        include("../iiodev_connect.php");

        $id_orden = $conexion->real_escape_string($_REQUEST['id']);
        $route = isset($_POST["area"]) ? htmlspecialchars($_POST["area"]) : '';

        $orderDetails = getOrderDetails($conexion, $id_orden);
        renderOrderModal($id_orden, $route, 0, $orderDetails);

        $conexion->close();
    }
    ?>
    <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->
    <script>
    function submitSelectedItems() {
        const form = document.getElementById('remissionForm');
        const formData = new FormData(form);
        const selectedItems = [];

        // Recorre todos los elementos del formulario
        for (const [key, value] of formData.entries()) {
            // Si el campo es un checkbox y está seleccionado
            if (key.startsWith('item') && value) {
                selectedItems.push(value);
            }
        }

        // Si hay ítems seleccionados
        if (selectedItems.length > 0) {
            // Construye la URL con los ítems seleccionados
            const queryParams = new URLSearchParams();
            selectedItems.forEach((item, index) => {
                queryParams.append(`item${index + 1}`, item);
            });
            
            // Añade el resto de los datos del formulario
            for (const [key, value] of formData.entries()) {
                if (key.startsWith('item')) continue; // Evita duplicar los ítems seleccionados
                queryParams.append(key, value);
            }
            
            const url = `${form.action}?${queryParams.toString()}`;
            
            // Redirige a la URL con los parámetros
            window.location.href = url;
        } else {
            alert('Por favor, selecciona al menos un ítem.');
        }
    }
</script>

</body>
</html>
