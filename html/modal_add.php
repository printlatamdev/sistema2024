<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Orden de Diseño</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include('suministros/connect.php'); ?>

    <div id="addProductModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="add_product" id="add_product">
                    <div class="modal-header">
                        <h4 class="modal-title" id="addProductModalLabel">Agregar Nueva Orden de Diseño</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="cliente" id="cliente" class="selectpicker form-control" data-live-search="true" required>
                                <option value="">Seleccione Cliente</option>
                                <?php while ($filam = mysqli_fetch_array($cliente)) { ?>
                                    <option value="<?php echo htmlspecialchars($filam[0]); ?>"><?php echo htmlspecialchars($filam[1]); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="marca" id="marca" class="selectpicker form-control" data-live-search="true" required>
                                <option value="">Seleccione Marca</option>
                                <?php while ($filax = mysqli_fetch_array($marca)) { ?>
                                    <option value="<?php echo htmlspecialchars($filax[0]); ?>"><?php echo htmlspecialchars($filax[1]); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="proyecto">Nombre Proyecto</label>
                            <textarea maxlength="30" name="proyecto" id="proyecto" class="form-control" required placeholder="USE NOMBRES CORTOS, SOLO DISPONE DE 30 CARACTERES."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Guardar datos">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Reset form and remove error messages when modal is hidden
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $("label.error").remove();
        });
    </script>

</body>

</html>
