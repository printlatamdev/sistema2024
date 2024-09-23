<?php
include("connect.php");
$conexion = conexion();

$cliente = mysqli_query($conexion, "SELECT * FROM empresa");
$vendedores = mysqli_query($conexion, "SELECT * FROM vendedores WHERE estado = 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Color Digital | <?= date('Y'); ?></title>
    <!-- SELECT CON BUSCADOR-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="form/css/index.css">
    <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
    <link rel="stylesheet" href="add_pop/style.css">

    <style type="text/css">
        .image-upload > input {
            display: none;
        }
    </style>
</head>
<body>

<div id="msform">
    <form action="form/nueva_op/insertar.php" method="POST" enctype="multipart/form-data">
        <!-- fieldsets -->
        <fieldset>
            <!-- Datos Orden -->
            <div class="row">
                <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Datos Orden</div>
                <div class="row">
                    <div class="col-md-4">
                        <p align="left">CLIENTE<br><br>
                            <select id="cliente" class="selectpicker form-control" data-live-search="true" name="cliente" required="required">
                                <option value="">Seleccione el Cliente</option>
                                <?php while ($empresa = mysqli_fetch_array($cliente)) { ?>
                                    <option value="<?php echo $empresa[0]; ?>"><?php echo $empresa[1]; ?></option>
                                <?php } ?>
                            </select>
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        <p align="left">CONTACTO<br><br>
                            <select id="contacto" name="contacto" class="form-control" data-live-search="true" style="height: 35px; width: 200px;" required="required">
                            </select>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p align="left">VENDEDOR<br><br>
                            <select id="vendedor" name="vendedor" class="selectpicker form-control" data-live-search="true" required="required">
                                <option value="">Seleccione Vendedor</option>
                                <?php while ($filasv = mysqli_fetch_array($vendedores)) { ?>
                                    <option value="<?php echo $filasv[1]; ?>"><?php echo $filasv[1]; ?></option>
                                <?php } ?>
                            </select>
                        </p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        <?php $fecha = date('Y-m-d'); ?>
                        <p align="left">FECHA ENTREGA<br><br>
                            <input id="fecha" name="fecha" type="date" value="<?php echo $fecha; ?>" min="2024-01-01" max="2024-12-31" style="height: 35px; width: 200px;" required="required">
                        </p>
                    </div>
                </div>
            </div>
            <input type="submit" name="next" class="next action-button btn btn-primary" value="Siguiente"/>
        </fieldset>
    </form>
</div>

<script src="assets/admin/pages/scripts/form-samples.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="form/nueva_pop/script.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#cliente').on('change', function () {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'carga_select/cargar_contacto.php',
                data: {'id': id},
                success: function (form) {
                    $('#contacto').html(form);
                },
                fail: function () {
                    alert('Hubo un error al cargar los contactos');
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#btnguardar').click(function () {
            var datos = $('#frmajax').serialize();
            $.ajax({
                type: "POST",
                url: "form/nueva_pop/insertar.php",
                data: datos,
                success: function (r) {
                    if (r == 1) {
                        // Success action
                    } else {
                        // Failure action
                    }
                }
            });

            return false;
        });
    });
</script>

</body>
</html>
