<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

// Verifica si la sesión 'base' está definida
if (!isset($_SESSION['base'])) {
  die("La sesión 'base' no está definida.");
}

// Configuración de base de datos
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'admin', 'AG784512', $bd);
if (!$conexion) {
  die('No se pudo conectar: ' . mysqli_connect_error());
}

// Selección de base de datos (redundante aquí porque ya se especifica en mysqli_connect)
mysqli_select_db($conexion, $bd);

// Obtención de parámetros de solicitud
$id_orden = isset($orderid) && trim($orderid) !== '' ? $orderid : $_REQUEST['id'] ?? null;
$id_detalle = $_REQUEST['id_detalle'] ?? null;
$id_detalle_pliego = $_REQUEST['id_detalle_pliego'] ?? null;
$id_pliego = $_REQUEST['id_pliego'] ?? null;

// Definición de variables para mensajes de estado
$modificado = isset($_REQUEST['modificado']) ? (int) $_REQUEST['modificado'] : 0;
$agregado = isset($_REQUEST['agregado']) ? (int) $_REQUEST['agregado'] : 0;
$eliminado = isset($_REQUEST['delete']) ? (int) $_REQUEST['delete'] : 0;

// Consultas a la base de datos
$proyecto = mysqli_query($conexion, "SELECT * FROM pop_proyecto");
$cliente = mysqli_query($conexion, "SELECT * FROM empresa");
$pais = mysqli_query($conexion, "SELECT * FROM pais");
$vendedores = mysqli_query($conexion, "SELECT * FROM vendedores WHERE estado = 1");
$pliego = mysqli_query($conexion, "SELECT * FROM tipo_pliego WHERE estado = 1");
$material = mysqli_query($conexion, "SELECT * FROM material WHERE estado = 1");
$equipo = mysqli_query($conexion, "SELECT * FROM equipo WHERE estado = 1");

// Inicialización de variables
$var = 0;
$var_detalle = 0;
$var_pliego = 0;
$no = '';
if (!!$id_detalle_pliego) {
  $action = 'form/nueva_pop/update_pliego.php';
  // /var/www/html/sistema2024/form/nueva_pop/update_pliego.php

} else {
  $action = 'form/nueva_pop/insertar_pliego.php';
}

// Verifica si $id_detalle_orden está definido y no está vacío
if (!empty($id_detalle_orden)) {
  $modificares = mysqli_query($conexion, "SELECT * FROM pop_detalle WHERE id_detalle_orden = '" . mysqli_real_escape_string($conexion, $id_detalle_orden) . "'");
  $var = 1;
} else {
  $no = 'Ingrese datos de Orden';
}

// Verifica si $id_detalle está definido
if (!!$id_detalle) {
  $id_detalle = mysqli_real_escape_string($conexion, $id_detalle);

  $query = "SELECT * FROM pop_pliego WHERE id_detalle = '$id_detalle' AND estado = 1";
  $show_pliegos = mysqli_query($conexion, $query);

  $var_detalle = 1;
} else {
  $no = 'Aún no se ha ingresado pliego.';
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Nueva POP</title>
  <!-- SELECT CON BUSCADOR-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

  <!-- buscador-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>



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

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



  <style type="text/css">
    .image-upload>input {
      display: none;
    }

    .table>thead>tr>th {
      padding: 8px;
      line-height: 1.42857143;
      vertical-align: top;
      border-top: 0px solid #ddd;
    }
  </style>



    <!-- jQuery (Only include once) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Select2 JS (Only include once) -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    // Initialize Select2 after the DOM is fully loaded
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select an option',  // Optional: Placeholder text
            allowClear: true                 // Optional: Allow clearing the selection
        });
    });
    </script>
</head>


<body>

  <div id="msform">
    <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data"
      style="margin-top: 10px;margin-left: -200px;width: 1300px; height: 2000px;" name="form4"
      onsubmit="return validateForm()" novalidate>
      <!-- ********************************************************************MUEBLE**************************************************************************-->
      <fieldset>
        <div class="row">
          <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Pliegos
            <?php echo $id_detalle_orden ?? null; ?></div>
          <?php
          if (!!$id_detalle) {
            // echo 'Hello world 1!';
            include('form/form_editar_pliego.php');
          } else {
            // echo 'Hello world 2!';
            include('form/nuevo_pliego.php');
          }
          ?>
        </div>

        <div style="margin-top: -50px; margin-left: 500px;">
          <a href="javascript: void(0);" onclick="parent.window.location='lista_pop_nueva.php'">
            <input type="submit" name="next" class="next action-button" value="Terminar Orden" style="width: 200px;" />
          </a>
        </div>
      </fieldset>
      <!-- ******************************************************************** FIN MUEBLE ********************************************************************-->
    </form>

    <script>
      function validateForm() {
        // Obtener todos los campos del formulario
        const form = document.forms['form4'];
        const inputs = form.querySelectorAll('input[required], select[required]');

        let isValid = true; // Flag para verificar la validez del formulario
        let errorMessage = ""; // Mensaje de error que se mostrará al usuario

        // Limpiar los estilos de error anteriores
        inputs.forEach(input => {
          input.style.border = ""; // Limpiar borde de error
          input.nextElementSibling?.remove(); // Eliminar mensaje de error anterior
        });

        // Verificar si todos los campos requeridos están llenos
        inputs.forEach(input => {
          if (input.value.trim() === "") {
            isValid = false;
            input.style.border = "2px solid red"; // Resaltar campo vacío

            // Mostrar mensaje de error al lado del campo
            const error = document.createElement("span");
            error.className = "error-message";
            error.textContent = "Este campo es obligatorio";
            error.style.color = "red";
            input.parentElement.appendChild(error);
          }
        });

        if (!isValid) {
          alert(`Por favor, complete todos los campos.`);
          return false; // Evita el envío del formulario
        }

        return true; // Permite el envío del formulario
      }
    </script>

    <style>
      .error-message {
        display: block;
        font-size: 0.9em;
        margin-top: 2px;
      }
    </style>


  </div>
  <!--

  <a id="vacio" href="#modal1" role="button"  data-toggle="modal"></a>


  <div id="anuncio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"> <i class="fa fa-warning"></i>  <strong>Exito!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Pliego Modificado Exitosamente</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>



  <a id="vacio" href="#modal1" role="button"  data-toggle="modal"></a>


  <div id="anuncio2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"> <i class="fa fa-warning"></i>  <strong>Exito!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Pliego Agregado Exitosamente</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>

-->
  <script src="assets/admin/pages/scripts/form-samples.js"></script>
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="form/nueva_pop/script.js"></script>


  <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- link para el modal -->




  <script type="text/javascript">

    $(document).ready(function () {
      // Initialize Select2 on all select elements with the 'select2' class
      $('.select2').select2();
    });



    $(window).load(function () {

      $(function () {
        $('#file-input').change(function (e) {
          addImage(e);
        });

        function addImage(e) {
          var file = e.target.files[0],
            imageType = /image.*/;


          if (!file.type.match(imageType))
            return;

          var reader = new FileReader();
          reader.onload = fileOnload;
          reader.readAsDataURL(file);
        }

        function fileOnload(e) {
          var result = e.target.result;
          $('#imgSalida').attr("src", result);
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $.ajax({
        type: 'POST',
        url: 'carga_select/cargar_cliente.php'

      })
        .done(function (form) {
          $('#cliente').html(form)
        })
        .fail(function () {
          alert('Hubo un errror al cargar las listas_rep')
        })

      $('#cliente').on('change', function () {
        var id = $('#cliente').val()
        $.ajax({
          type: 'POST',
          url: 'carga_select/cargar_contacto.php',
          data: {
            'id': id
          }
        })
          .done(function (form) {
            $('#contacto').html(form)
          })
          .fail(function () {
            alert('Hubo un error al cargar los vídeos')
          })
      })
      $('#contacto').on('change', function () {
        var id = $('#contacto').val()


      })

      $('#enviar').on('click', function () {
        var resultado = $('#pais option:selected').text()

        $('#resultado1').html(resultado)
      })
      $('#enviar').on('click', function () {
        var resultado1 = $('#pop option:selected').text()

        $('#resultado2').html(resultado1)
      })


    })
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

            } else {

            }
          }
        });

        return false;
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#btnguardar2').click(function () {
        var datos = $('#frmajax').serialize();
        // var datos = new FormData($("#frmajax"));

        $.ajax({
          type: "POST",


          url: "form/nueva_pop/insertar_mueble.php",
          data: datos,




          success: function (r) {
            if (r == 1) {

            } else {

            }
          }
        });

        return false;
      });
    });
  </script>

  </script>


  <?php


  if ($modal == 1) {
    ?>

    <script type="text/javascript">
      $(function () {
        $("#anuncio").modal();
      });
    </script>
  <?php } ?>


  <?php


  if ($modal2 == 1) {
    ?>

    <script type="text/javascript">
      $(function () {
        $("#anuncio2").modal();
      });
    </script>
  <?php } ?>
  <script>
    $(function () {
      $(document).on('click', '.closeFancybox', function () {
        $.fancybox.close();
      })
    })
  </script>
</body>

</html>