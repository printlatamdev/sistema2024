<?php
session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 2023</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="indes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="indes/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="indes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="indes/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script src="/includes/js/jquery-1.6.4.min.js" type="text/javascript"></script>
  <script src="/includes/js/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
  <!-- ESTEEE -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>







  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

  <link rel="stylesheet" href="css/custom.css">




  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />




  <script>
    $(function() {
      //run plugin dependent code

      $(".fancyOther").fancybox({
        width: '100%',
        height: '100%',
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
      });

    });
  </script>
  <style>
    * {
      margin: 0;
    }

    header {
      height: 170px;
      color: #FFF;
      font-size: 20px;
      font-family: Sans-serif;
      background: #009688;
      padding-top: 30px;
      padding-left: 50px;
    }

    .contenedor {
      width: 90px;
      height: 240px;
      position: absolute;
      right: 0px;
      bottom: 0px;
    }

    .botonF1 {
      width: 60px;
      height: 60px;
      border-radius: 100%;
      background: #00b594;
      right: 0;
      bottom: 0;
      position: absolute;
      margin-right: 32px;
      margin-bottom: 16px;
      border: none;
      outline: none;
      color: #FFF;
      font-size: 36px;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
      transition: .3s;
    }

    span {
      transition: .5s;
    }

    .botonF1:hover span {
      transform: rotate(360deg);
    }

    .botonF1:active {
      transform: scale(1.4);
    }

    .select2-container .select2-choice .select2-arrow {
      display: none;
    }

    .select2-container .select2-choice {
      border: 0;
    }
            /**** */
  .tags-a a {
    color: #0a3a75 !important;
    text-decoration: none;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <? if ($nivel != 50) { ?><img src="images/logo_color.png" alt="COLOR DIGITAL" style="opacity: .8;margin-left:10%" width="150"><? } ?>
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <? if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <? }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <? } ?>
          <div class="info">
            <a href="#" class="d-block"><? echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">
        <!-- pegar aqui el contenido-->

        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2><b>Generador de Guia Tecnica</b></h2>
              </div>
            </div>
          </div>
          <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tags-a" role="tablist">
              <li role="presentation"><a href="#lista" aria-controls="lista" role="lista" data-toggle="tab">Lista de Guias</a></li>
              <li role="presentation" class="active"><a href="#generar" aria-controls="generar" role="tab" data-toggle="tab">Generar Guia</a></li>
            </ul>
          </div>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="generar">
              <div class="row">
                <div class="col-sm">
                  <div class="card">
                    <div class="card-header">
                      <h3>Especificaciones Generales</h3>
                    </div>
                    <!-- <form action='guia_tec_pdf.php' enctype="multipart/form-data"> -->
                    <form id="form_guia" action='guia_tec_pdf.php' enctype="multipart/form-data" method="post">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="empresa">Cliente</label>
                          <br>
                          <select id="empresa" name="empresa" class="select2_category form-control" tabindex="1" required>
                            <option value="N/A">Seleccione Cliente</option>
                            <?php
                            include($base . "_db.php");
                            $rs = $mysqli->query("SELECT * FROM empresa");
                            while ($fila = $rs->fetch_row()) {
                              echo '<option value="' . $fila[1] . '">' . $fila[1] . '</option>';
                            }
                            $mysqli->close();
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="cantidad">Cantidad</label>
                          <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad(Unidades)">
                        </div>
                        <div class="form-group">
                          <label for="pais">Pais</label>
                          <br>
                          <!-- Selector de pais -->
                          <textarea type="text" class="form-control" name="pais" id="pais" placeholder="El Salvador - 200 Unidadades , Nicaragua - 100 Unidades"></textarea>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="material">Material</label>
                          <textarea type="text" class="form-control" name="material" id="material" placeholder="CARTON"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="maquina">Maquina</label>
                          <input type="text" class="form-control" name="maquina" id="maquina" placeholder="VUTEK">
                        </div>
                        <div class="form-group">
                          <label for="accesorios">Accesorios</label>
                          <textarea type="text" class="form-control" name="accesorios" id="accesorios" placeholder="2 TORNILLOS PLASTICOS"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="cierre">Cierre</label>
                          <input type="text" class="form-control" name="cierre" id="cierre" placeholder="paiz , walmart">
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="card">
                    <div class="card-header">
                      <h3>Dimenciones</h3>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="frente">Frente</label>
                        <input type="number" class="form-control" name="frente" id="frente" placeholder="Cm">
                      </div>
                      <div class="form-group">
                        <label for="profundidad">Profundidad</label>
                        <input type="number" class="form-control" name="profundidad" id="profundidad" placeholder="Cm">
                      </div>
                      <div class="form-group">
                        <label for="altura">Altura</label>
                        <input type="number" class="form-control" name="altura" id="altura" placeholder="Cm">
                      </div>
                      <div class="card-header">
                        <h3>Rutas de archivos</h3>
                        <div class="form-group">
                          <label for="ruta1">Impresion</label>
                          <textarea type="text" class="form-control" name="impresion" id="impresion" >\\192.168.0.114\Artes\impresion\</textarea>
                        </div>
                        <div class="form-group">
                          <label for="ruta1">Corte</label>
                          <textarea type="text" class="form-control" name="corte" id="impresion">\\192.168.0.114\Artes\impresion\</textarea>
                        </div>
                        <div id='preview1'></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm" style="text-align:center">
                  <div class="card">
                    <div class="card-header">
                      <h3>Cargar Imagenes</h3>
                    </div>
                    <div class="card-body">
                      <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="upload__btn">
                            <label for="file_data">
                              <img width='75' src="./imgs/photo.png" />
                            </label>
                            <input type="file" multiple="multiple" data-max_length="20" class="upload__inputfile" name="files[]" id="file_data" style="display:none;">
                          </label>
                          <a id="clear" class="btn btn-danger" style="border-radius: 25px;">Limpiar</a>
                        </div>
                        <div class="upload__img-wrap"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="contenedor">
                  <button class="botonF1" type="submit" data-toggle="tooltip" data-placement="left" title="Generar Guia">
                    <span>+</span>
                  </button>
                </div>
                </form>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="lista">
              <?php
              /* Connect To Database*/
              require_once("./conexion_ajax.php");
              session_start();
              $base = $_SESSION['base'];
              $anio = $_SESSION['year'];
              $bd = $base . $anio;

              $tables = "guia_de_impresion";
              include 'pagination.php'; //include pagination file
              //pagination variables
              $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
              $per_page = intval($_REQUEST['per_page']); //how much records you want to show
              $adjacents  = 4; //gap between pages after number of adjacents
              $offset = ($page - 1) * $per_page;
              //Count the total number of row in your table*/
              $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables");
              if ($row = mysqli_fetch_array($count_query)) {
                $numrows = $row['numrows'];

                $total_pages = ceil($numrows / $per_page);
                //main query to fetch the data
                $query = mysqli_query($con, "SELECT *  FROM  $tables");
                //loop through fetched data

                if ($numrows > 0) {
              ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" style="font-size:10pt;text-align:center !important;">
                      <thead class="bg-primary">
                        <tr>
                          <th>N°</th>
                          <th>Cliente </th>
                          <th>Cantidad </th>
                          <th>Pais</th>
                          <th>Material</th>
                          <th>Impresora</th>
                          <th>Accesorios</th>
                          <th>Cierre</th>
                       <!--    <th>Frente</th>
                          <th>Profundidad</th>
                          <th>Altura</th> -->
                          <th>Detalles</th>
                        <!--   <th>Ruta de Corte</th>
                          <th>Ruta de Impresion</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $finales = 0;
                        while ($row = mysqli_fetch_array($query)) {
                          $id_guia = $row['id_guia'];
                          $cliente = $row['cliente'];
                          $cantidad = $row['cantidad'];
                          $pais = $row['pais'];
                          $material = $row['material'];
                          $impresora = $row['impresora'];
                          $accesorios = $row['accesorios'];
                          $cierre = $row['cierre'];
                          $frente = $row['frente'];
                          $profundidad = $row['profundidad'];
                          $altura = $row['altura'];
                          $imagenes = $row['imagenes'];
                          $ruta_corte = urldecode($row['ruta_corte']);
                          $ruta_impresion = urldecode($row['ruta_impresion']);
                          $finales++;
                        ?>
                          <tr>
                            <td><?= $id_guia ?></td>
                            <td><?= $cliente; ?></td>
                            <td><?=$cantidad; ?></td>
                            <td><?=$pais; ?></td>
                            <td><?=$material; ?></td>
                            <td><?=$impresora; ?></td>
                            <td><?= $accesorios ?></td>
                            <td><?= $cierre; ?></td>
                        <!--     <td><?=$frente; ?></td>
                            <td><?=$profundidad; ?></td>
                            <td><?=$altura; ?></td> -->
                            <td><i class="fas fa-info-circle"></i></td>
                     <!--        <td><?=$ruta_corte; ?></td>
                            <td><?=$ruta_impresion; ?></td> -->
                          </tr>
                        <?php } ?>
                     <!--    <tr>
                          <td colspan='6'>
                            <?php
                            $inicios = $offset + 1;
                            $finales += $inicios - 1;
                            echo "Mostrando $inicios al $finales de $numrows registros";
                            echo paginate($page, $total_pages, $adjacents);
                            ?>
                          </td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>

              <?php
                }
              }
              ?>
            </div>
          </div>

          <div id="loader"></div><!-- Carga de datos ajax aqui -->
          <div id="resultados"></div><!-- Carga de datos ajax aqui -->
          <div class='outer_div'></div><!-- Carga de datos ajax aqui -->


          <?php include("html/modal_add.php"); ?>
          <!-- Edit Modal HTML -->
          <?php include("html/modal_edit.php"); ?>
          <!-- Delete Modal HTML -->
          <?php include("html/modal_delete.php"); ?>
          <!-- FINALIZA PEGADO DE CONTENIDO -->
        </div>

      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="#">Sistema Produccion</a>.</strong>
    Color Digital 2023
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- AdminLTE App -->
  <script src="indes/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="indes/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="indes/dist/js/demo.js"></script>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
  <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="ajax2/ajax.js" type="text/javascript"></script>

</body>

</html>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>

<script>
  $("#empresa").select2({
    allowClear: true
  });
</script>
<script>
  $('#clear').hide();
  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
      if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();
          reader.onload = function(event) {
            $('#clear').show();

            $($.parseHTML('<img style="width:150px;margin:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
          }
          reader.readAsDataURL(input.files[i]);
        }
      }

    };

    $('#file_data').on('change', function() {
      imagesPreview(this, 'div.upload__img-wrap');
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#clear').on('click', function(e) {
      document.getElementById("file_data").value = "";
    });
  });
</script>

<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>