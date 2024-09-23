<?php
session_start();

// Ensure 'base' is set in session
if (!isset($_SESSION['base'])) {
  die('Session base is not set.');
}

// Database configuration
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Create connection
$conexion = new mysqli('localhost', 'root', '', $bd);

// Check connection
if ($conexion->connect_error) {
  die('Connection failed: ' . $conexion->connect_error);
}

// Define queries
$queries = [
  'proyecto' => "SELECT * FROM pop_proyecto",
  'cliente' => "SELECT * FROM empresa",
  'pais' => "SELECT * FROM pais",
  'vendedores' => "SELECT * FROM vendedores WHERE estado = 1",
  'mueble' => "SELECT * FROM tipo_mueble WHERE estado = '1'"
];

// Execute queries and fetch results
$results = [];
foreach ($queries as $key => $query) {
  $result = $conexion->query($query);
  if (!$result) {
    die('Query failed for ' . $key . ': ' . $conexion->error);
  }
  $results[$key] = $result;
}

// Close connection
$conexion->close();

// Access query results
$proyecto = $results['proyecto'];
$cliente = $results['cliente'];
$pais = $results['pais'];
$vendedores = $results['vendedores'];
$mueble = $results['mueble'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Color Digital | 2023</title>
  <!-- SELECT CON BUSCADOR-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <!-- Scripts -->
    <script src="assets/admin/pages/scripts/form-samples.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="form/nueva_pop/script.js"></script>


  <!-- buscador-->




  <script src="assets/admin/pages/scripts/form-samples.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="form/css/index.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />

  <link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="add_pop/style.css">

  <style type="text/css">
    .image-upload>input {
      display: none;
    }
    /* Ajustes básicos para selectpicker */
.selectpicker {
  width: 100%; /* Ajusta el ancho del selectpicker */
}

/* Puedes añadir estilos específicos para mejorar la apariencia */
.bootstrap-select .dropdown-menu {
  max-height: 200px; /* Ajusta la altura máxima del dropdown */
  overflow-y: auto; /* Permite el desplazamiento si hay muchas opciones */
}

  </style>


</head>

<body>

  <div id="msform">
  <form action="form/nueva_pop/insertar.php" method="POST" enctype="multipart/form-data">

<!-- fieldsets -->
<fieldset>
  <!-- Primer form -->
  <div class="row">
    <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Datos Orden</div>
    <table class="table" style="margin-left: -35px;">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th align="left">
            <p align="left">PROYECTO
              <select class="selectpicker" data-live-search="true" name="proyecto" required="required">
                <option value="">PROYECTO</option>
                <?php while ($filas = mysqli_fetch_array($proyecto)) { ?>
                  <option value="<?php echo $filas[0]; ?>" style="width: 200px;"> <?php echo $filas[1]; ?></option>
                <?php } ?>
              </select>
            </p>
          </th>
          <th align="left" width="20">
            <p align="left">CLIENTE
              <select id="cliente" class="selectpicker form-control" data-live-search="true" name="cliente"
                required="required" style="width: 200px;">
                <option value="">Seleccione el Cliente</option>
                <?php while ($empresa = mysqli_fetch_array($cliente)) { ?>
                  <option value="<?php echo $empresa[0]; ?>"> <?php echo $empresa[1]; ?></option>
                <?php } ?>
              </select>
            </p>
          </th>
          <td align="left" width="20">
            <p>VENDEDOR
              <select id="vendedor" name="vendedor" class="selectpicker" data-live-search="true"
                required="required">
                <option value="">Seleccione Vendedor</option>
                <?php while ($filasv = mysqli_fetch_array($vendedores)) { ?>
                  <option value="<?php echo $filasv[1]; ?>"> <?php echo $filasv[1]; ?></option>
                <?php } ?>
              </select>
            </p>
          </td>
        </tr>
        <tr>
          <th align="left" width="20">
            <p align="left">CONTACTO
              <select id="contacto" name="contacto" class="form-control" data-live-search="true" required="required">
                <option value="">SELECCIONE EL CONTACTO</option>
              </select>
            </p>
          </th>

          <th align="left" width="20">
            <p align="left">PAIS
              <select id="pais" name="pais" class="form-control" data-live-search="true" required="required">
                <option value="">Seleccione País</option>
                <?php while ($filasp = mysqli_fetch_array($pais)) { ?>
                  <option value="<?php echo $filasp['siglas']; ?>"> <?php echo $filasp['nombre']; ?></option>
                <?php } ?>
              </select>
            </p>
          </th>
          <?php $fecha = date('Y-m-d'); ?>
          <td align="left">Fecha entrega
            <?php
            // Obtener el año actual
            $anio_actual = date('Y');
            $fecha_actual = date('Y-m-d'); // Obtiene la fecha actual en formato YYYY-MM-DD
            ?>

            <input id="fecha" name="fecha" type="date" value="<?php echo $fecha; ?>" 
                  min="<?php echo $anio_actual; ?>-01-01" 
                  max="<?php echo $anio_actual; ?>-12-31" 
                  style="height: 20px;" 
                  required="required">
          </td>
        </tr>
        <!-- Nueva fila para Orden de Compra -->
        <tr>
          <th align="left" width="20">
            <p align="left">ORDEN DE COMPRA
              <input id="orden_compra" name="orden_compra" type="text" class="form-control"
                placeholder="Ingrese la Orden de Compra" required="required">
            </p>
          </th>
          <th align="left" width="20" style="display:none;">
          <span>Adjuntar Orden de Compra </span><br>
            <p align="left">
              <input type="file" id="orden_compra_file" name="orden_compra_file" style="display: none;" onchange="updateImage(this)">
              <img id="file_image" src="images/icon/uploadoc.png" alt="Adjuntar Archivo" style="cursor: pointer; width: 100px;" onclick="document.getElementById('orden_compra_file').click();">
            </p>
          </th>
        </tr>
        
        
      </tbody>
    </table>
  </div>

  <input type="submit" name="next" class="next action-button" value="Siguiente" />
</fieldset>
<!-- ********************************************************************MUEBLE**************************************************************************-->

</form>

<script>
function updateImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('file_image').src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>


  </div>


  <script type="text/javascript">
$(document).ready(function () {
  // Cargar los contactos cuando el cliente cambia
  $('#cliente').on('change', function () {
    var id = $(this).val();
    console.log('Cliente ID:', id); // Verifica el ID del cliente

    if (id) {
      $.ajax({
        type: 'POST',
        url: 'carga_select/cargar_contacto.php',
        data: { id: id },
        success: function (response) {
          console.log('Response:', response); // Verifica la respuesta del servidor
          $('#contacto').html(response); // Reemplaza el contenido del <select> con nuevas opciones

          // Si estás usando selectpicker, asegúrate de actualizarlo
          if ($().selectpicker) {
            $('#contacto').selectpicker('refresh');
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error('Error: ' + textStatus + ' - ' + errorThrown);
          alert('Hubo un error al cargar los contactos');
        },
        complete: function () {
          $('#loading').hide(); // Oculta el spinner de carga
        }
      });
    } else {
      $('#contacto').html('<option value="">SELECCIONE EL CONTACTO</option>');
      if ($().selectpicker) {
        $('#contacto').selectpicker('refresh');
      }
    }
  });
});
</script>

  <!-- Handle file input and image preview -->
  <script type="text/javascript">
    $(window).on('load', function () {
      $('#file-input').on('change', function (e) {
        var file = e.target.files[0],
          imageType = /image.*/;

        if (!file.type.match(imageType)) return;

        var reader = new FileReader();
        reader.onload = function (e) {
          $('#imgSalida').attr("src", e.target.result);
        };
        reader.readAsDataURL(file);
      });
    });
  </script>



  <!-- Handle form submission -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('#btnguardar').on('click', function () {
        var datos = $('#frmajax').serialize();
        $.ajax({
          type: "POST",
          url: "form/nueva_pop/insertar.php",
          data: datos,
          success: function (response) {
            if (response == 1) {
              // Success handling
            } else {
              // Error handling
            }
          }
        });
        return false;
      });

      $('#btnguardar2').on('click', function () {
        var datos = $('#frmajax').serialize();
        $.ajax({
          type: "POST",
          url: "form/nueva_pop/insertar_mueble.php",
          data: datos,
          success: function (response) {
            if (response == 1) {
              console.log(response);
            } else {
              console.log(response);
            }
          }
        });
        return false;
      });
    });
  </script>
</body>


</html>