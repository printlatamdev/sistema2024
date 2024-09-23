<?php require("db/session_esa.php"); ?>
<?php require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%" width="150">
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php } ?>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php include("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">


        <div class="table-responsive" align="center">


          </form>
          <br>
          <!--<div id="txtHint"><b>Person info will be listed here.</b></div>-->

          <!-- IFRAME 
  <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="form2.php"><i class="far fa-edit"></i></a>-->
          <div align="Left">
            <h3 class="page-header">

              REGISTRO DE LOGISTICA EL SALVADOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="imagenes/aereo.png"
                width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/aereoo.png"
                width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/ubicacion.png" width="40">
            </h3>

          </div>
          <form class="form-inline" method="get">

            <div class="form-group">

              <!-- <select name="filter" class="form-control" onchange="form.submit()">

            <option value="0">Filtro por estado de orden</option>
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
            <option value="1" <?php if ($filter == 'Tetap') {
              echo 'selected';
            } ?>>En espera</option>
            <option value="2" <?php if ($filter == 'Kontrak') {
              echo 'selected';
            } ?>>Impresion</option>
                        <option value="3" <?php if ($filter == 'Outsourcing') {
                          echo 'selected';
                        } ?>>Corte</option>
          </select> -->
            </div>
          </form>
          <br />
          <div class="table-responsive">

            <table class="table table-striped table-hover">
              <thead class="bg-primary">
                <tr>
                  <!--<th># id_log</th>-->
                  <th>#OP</th>
                  <th>Cot</th>
                  <th>OC</th>
                  <th>Cliente</th>
                  <th>Campaña</th>
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>ETD</th>
                  <th>ETA</th>
                  <th>Doc</th>
                  <th>Estado</th>
                  <th>Info</th>
                  <th>Fotos</th>
                  <th>Acciones</th>


                </tr>
              </thead>
              <?php
              $server = $_SERVER['SERVER_ADDR'];
              $year = "19";
              $nivel = "1";
              $tipo = "original";


              $sql = mysqli_query($conexion, "select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre, b.direccion_entrega from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=0 order by a.id_orden desc ");
              /* select distinct t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado, t1.vendedor ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra from pop t1 INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 */

              if (mysqli_num_rows($sql) == 0) {
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
              } else {
                $no = 1;
                while ($row = mysqli_fetch_assoc($sql)) {

                  $sql58 = mysqli_query($conexion, "select DISTINCT id_orden, cot from pop_detalle where id_orden='" . $row['id_orden'] . "'");
                  while ($row52 = mysqli_fetch_assoc($sql58)) {
                    $cot = $row52['cot'];
                  }

                  $cadena_de_texto = $cot;
                  $cadena_buscada = '-19';
                  $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                  $cadena_de_texto2 = $cot;
                  $cadena_buscada2 = '-NI';
                  $posicion_coincidencia2 = strpos($cadena_de_texto2, $cadena_buscada2);
                  //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                  if ($posicion_coincidencia === false) {
                    $encontrado = 0;
                    $datos = $cot;
                    //list($id_c, $anio) = explode("-", $datos);
                  } else {
                    $encontrado = 1;
                    $datos = $cot;
                    //list($id_c, $anio) = explode("-", $datos);
                    //echo $id; // foo
//echo $anio; // 
              
                  }

                  /*************************************************************/
                  if ($posicion_coincidencia2 === false) {

                    $encontrado2 = 0;

                    $datos2 = $cot;
                    //list($id_c2, $anio2) = explode("-", $datos2);

                  } else {

                    $encontrado2 = 1;

                    $dato2s = $cot;
                    //list($id_c2, $anio2) = explode("-", $datos2);
                    //echo $id; // foo
//echo $anio; // 
              
                  }


                  $query233 = mysqli_query($conexion, "select*from cotizacion where id_cotizacion='" . $cot . "'");

                  $data = '#' . $row['id_orden'];
                  $data2 = $row['id_orden'];
                  $dataa = '#1' . $row['id_orden'];
                  $dataa2 = '1' . $row['id_orden'];
                  $datab = '#2' . $row['id_orden'];
                  $datab2 = '2' . $row['id_orden'];


                  $datalog = '#2i' . $row['id_orden'];
                  $data2log = "2i" . $row['id_orden'];
                  $archive = "http://" . $server . "/browser/elfinder6.php?year=20" . $year . "&empresa=" . $row['empresa'] . "&marca=" . $row['marca'] . "&proyecto=" . $row['nombre'] . "&nivel=" . $nivel . "&tipo=" . $tipo;

                  echo '
            <tr style="font-size:85%;" >
              <td>' . $row['id_orden'] . '</td>';




                  if ($encontrado == 0 && $encontrado2 == 0) {

                    $query233 = mysqli_query($conexion, "select*from cotizacion where id_cotizacion='" . $cot . "'");
                    while ($row9 = mysqli_fetch_assoc($query233)) {
                      $cot_d = $row9['archivo'];

                      if (empty($cot_d)) {
                        $cot_d2 = "--";
                      }

                      echo '<td><div class="col-md-12"><a href="cotizaciones_esa20/' . $cot_d . '" data-fancybox="preview" style="font-size:15px;"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }


                  } elseif ($econtrado == 1 && $encontrado2 == 0) {
                    $con221 = mysqli_connect('localhost', 'root', '', 'esa19');
                    mysqli_select_db($con221, 'esa19');
                    $sql = "select*from cotizacion where id_cotizacion='" . $cot . "' ";

                    $result = mysqli_query($con221, $sql);
                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];
                      if (empty($cot_d)) {
                        $cot_d2 = "--";
                      }
                      echo '<td><div class="col-md-12"><b><h5><a href="cotizaciones_esa19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }


                  } elseif ($encontrado == 0 && $encontrado2 == 1) {
                    $con2233 = mysqli_connect('localhost', 'root', '', 'nica20');
                    
                    mysqli_select_db($con2233, 'nica20');
                    $sql1 = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $resultww = mysqli_query($con2233, $sql1);

                    $ordenes_activas = mysqli_num_rows($resultww);
                    while ($row92 = mysqli_fetch_assoc($resultww)) {
                      $cot_d2 = $row92['archivo'];
                      if (empty($cot_d)) {
                        $cot_d2 = "--";
                      }

                      echo '<td><div class="col-md-12"><b><h5><a href="cotizaciones_nica20/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }

                  } elseif ($encontrado == 1 && $encontrado2 == 1) {

                    $con225 = mysqli_connect('localhost', 'root', '', 'nica19');
                    mysqli_select_db($con225, 'nica19');
                    $sql25 = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $result2 = mysqli_query($con225, $sql25);

                    $ordenes_activas = mysqli_num_rows($result2);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];
                      if (empty($cot_d)) {
                        $cot_d2 = "--";
                      }

                      echo '<td><div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }

                  }
                  echo '
                    <td>' . $row['numorden_compra'] . '</td>
                    <td>' . $row['empresa'] . '</td>
                    <td>' . $row['nombre_proyecto'] . '</td>       
                    <td>' . $row['origen'] . '</td>
                    <td>' . $row['destino'] . '</td>
                    <td>' . $row['f_salida'] . '</td>
                    <td>' . $row['f_llegada'] . '</td>  <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target=' . $datalog . ' aria-expanded="false" aria-controls=' . $data2log . '></a> </td>

              <td> ';
                  if ($row['status'] == 'PROCESO') {
                    echo '<span class="label label-success">Proceso. </span>';
                  } else if ($row['status'] == 'IMPRESION') {
                    echo '<span class="label label-info">Impresion</span>';
                  } else if ($row['status'] == 'CORTE') {
                    echo '<span class="label label-warning">Corte </span>';
                  } else if ($row['status'] == 'ACABADO') {
                    echo '<span class="label label-warning"> Acabado</span>';
                  } else if ($row['status'] == 'DESPACHO') {
                    echo '<span class="label label-warning">Despacho </span>';
                  } else if ($row['status'] == 'TRANSITO') {
                    echo '<span class="label label-warning">Transito </span>';
                  } else if ($row['status'] == 'ADUANA DE SALIDA') {
                    echo '<span class="label label-warning">Aduana de Salida </span>';
                  } else if ($row['status'] == 'ENTREGADO') {
                    echo '<span class="label label-success"">ENTREGADO</span>';
                  }
                  //PRIMER DESPLEGABLE 
                  echo '
              </td>
              <td><a class="fa fa-info-circle" data-toggle="collapse" data-target=' . $data . ' aria-expanded="false" aria-controls=' . $data2 . ' ></a></td>'; ?>
                  <td><a data-fancybox
                      data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                      href="logistica/edit_fotos.php?id=<?php echo $row['id_orden']; ?>" class="btn bg-success"><i
                        class="fas fa-camera-retro"></i></a></td>
                  <td>
                    <a data-fancybox
                      data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                      href="logistica/edit.php?id=<?php echo $row['id_orden']; ?>" class="edit"><i
                        class="far fa-edit"></i></a>

                    <?php echo '<a href="logistica/terminar_log.php?id=' . $row['id_orden'] . '" title="FINALIZAR LOGISTICA" onclick="return confirm(\'Terminar Logistica?\')" class="delete"><span class="fas fa-sign-out-alt" aria-hidden="true"></span></a>
              </td>
            </tr>
            <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id=' . $data2 . ' style="width:100%" >
      <div class="card card-body"><br>';

                    include("consulta_item_log.php"); ?>

              </div>
            </div>
          </div>

          </td>
          </tr>
          <!-- SEGUNDO DESPLEGABLE -->

          <script>
            <? $n_funcion = 's' . $row['id_orden']; ?>
            function <?php echo $n_funcion; ?>(str) {
              if (str == "") {
                document.getElementById("<?php echo $n_funcion; ?>").innerHTML = "";
                return;
              }
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("<?php echo $n_funcion; ?>").innerHTML = this.responseText;
                }
              }
              xmlhttp.open("GET", "getuser.php?q=" + str, true);
              xmlhttp.send();
            }
          </script>
          <tr>
            <td colspan="15" class="zeroPadding">
              <div class="col">
                <div class="collapse multi-collapse" id="<?php echo $dataa2; ?>" style="width:100%">
                  <div class="card card-body">
                    <!--<?php  //include('consulta_mueble.php'); ?>-->
                    <div id="<?php echo $n_funcion; ?>"><b>sin registro<?php echo $n_funcion; ?></b></div>
                  </div>
                </div>
            </td>
          </tr>

          <!--TERCER DEPLEGABLE-->

          <tr>
            <td colspan="14" class="zeroPadding">
              <div class="col">
                <div class="collapse multi-collapse" id="<?php echo $data2log; ?>" style="width:100%">
                  <div class="card card-body"><br>
                    <?php $facturac = mysqli_query($conexion, "select * from pop_documentos where orden='" . $row['id_orden'] . "'"); ?>
                    <? include('logistica/documentos.php'); ?>
                  </div>
                </div>
              </div>
            </td>

          </tr>
          <!--FIN DE DESPLEGABLES-->
          <?php
          $no++;
                }
              }
              ?>
      </table>
    </div>
  </div>
  </div>
  <center>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    </form><br><br>

    <!--fin del div col-md-12  -->
    </div>










    </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong><a href="#">Sistema Produccion</a>.</strong>
      Color Digital 2020
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

    <!-- jQuery -->

    <!-- ChartJS -->
    <script src="indes/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="indes/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="indes/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="indes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="indes/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="indes/plugins/moment/moment.min.js"></script>
    <script src="indes/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="indes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="indes/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="indes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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