<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

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

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">

        <?php

        if (isset($_REQUEST['flag'])) {

          echo "<script>alert('El documento fue agregado exitosamente.');</script>";

        }


        ?>


        <div class="row">

          <div class="col-md-6">

            <div id="contenedor2" class="portlet box yellow">
              <div class="portlet-title">
                <div class="caption">
                  <i class="icon-note"></i> Documentacion Ordenes de Compra
                </div>

              </div>





              <div class="portlet-body form">
                <!-- BEGIN FORM-->

                <div class="form-body">







                  <!--/row-->
                  <div class="row">
                    <div id="fms0" class="col-md-12">



                      <div id="fms" class="col-md-12">



                        <div class="clearfix"></div>





                        <div class="clearfix"></div>



                        <form id="fomr1" method="post" action="compra.sql.php" class="form-horizontal"
                          enctype="multipart/form-data">
                          <input type="hidden" name="bandera" value="4">

                          <label class="control-label "><strong>Orden de Compra:</strong></label>
                          <div class="input">

                            <select id="ord" name="ord" class="select2_category form-control" style="width:400px"
                              required>
                              <option value="0">Seleccione Orden Compra</option>
                              <?php

                              include("suministros/connect.php");


                              $rs = $mysqli->query("SELECT * FROM compra WHERE estado='0'  ORDER BY id_compra DESC");
                              while ($fila = $rs->fetch_assoc()) {
                                echo '<option value="' . $fila['id_compra'] . '">' . $fila['id_compra'] . ' - ' . $fila['empresa'] . ' - ' . $fila['fecha'] . '</option>';
                              }
                              $mysqli->close();
                              ?>


                            </select><br><br>
                          </div>

                          <div class="clearfix"></div>
                          <div class="clearfix"></div>

                          <label class="control-label "><strong>Mensaje:</strong></label>
                          <div class="input">
                            <textarea rows="8" cols="55" name="mensaje">Atentamente adjuntamos la siguiente orden de compra. Nota: Orden de Compra sin autorización, no procede el despacho. &#13;&#10;
                                            </textarea>
                          </div>

                          <div class="clearfix"></div>
                          <div class="clearfix"></div>

                          <label class="control-label"><strong>Archivo:</strong></label>
                          <div class="input">
                            <label class="custom-file-upload">
                              <input type="file" id="file" name="file" required />
                              Subir Archivo
                            </label>
                          </div>
                          <br><br>



                          <div class="clearfix"></div>
                          <div class="clearfix"></div>

                          <label class="control-label"><strong>Correo:</strong></label>
                          <?php
                          if ($_SESSION['base'] == 'nica') {

                            echo '<div class="input"><input size="35px" type="text" id="email1" name="email1" /></div><br>';

                          } else {

                            echo '<div class="input"><input size="35px" type="text" id="email1" name="email1" required /></div><br>';


                          }
                          ?>

                          <div class="input"><input size="35px" type="text" id="email2" name="email2" /></div><br>
                          <div class="input"><input size="35px" type="text" id="email3" name="email3" /></div>
                          <br><br>


                          <div class="input">
                            <input type="submit" name="eviar" value="Agregar Documento" class="btn yellow">
                          </div>
                        </form>






                      </div>



                    </div>
                  </div>


                  <!--/row-->









                  <!-- END FORM-->


                </div>
              </div>


            </div>













          </div>


          <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->





          <style>
            input[type="file"] {
              display: none;
            }


            .custom-file-upload {
              border: 1px solid #ccc;
              display: inline-block;
              padding: 3px 6px;
              cursor: pointer;
            }



            #cliente_color,
            #contacto_color,
            #orden_color {

              font-size: 18px !important;
              font-weight: bold;

            }




            #fms {


              border-style: solid;
              border-width: 1px;
              padding: 20px;
              height: 600px;

              margin-right: -1px;
              margin-bottom: -1px;



            }

            #fms2 {


              border-style: solid;
              border-width: 1px;
              padding: 20px;
              height: 225px;
              margin-right: -1px;
              margin-bottom: -1px;



            }


            #fms3 {


              border-style: solid;
              border-width: 1px;
              padding: 20px;
              height: 135px;
              margin-right: -1px;
              margin-bottom: -1px;
            }


            #detalle_color {


              width: 400px;
            }








            /* ********************************************** */

            #qw {


              border-style: solid;
              border-width: 1px;
              padding: 20px;

              padding: 0px;
              margin-right: -1px;
              margin-bottom: -1px;
              margin-top: -1px;

            }

            #qwd1 {

              /* height: 110px;*/
              border-bottom: thin solid #000000;
            }

            #qwd2 {

              /*height: 170px;*/
              border-bottom: thin solid #000000;
            }

            #qwd3 {

              /*height: 60px;*/
              /* border-bottom: thin solid #000000;  */
            }



            #qw3 {


              border-style: solid;
              border-width: 1px;
              padding: 20px;

              padding: 0px;
              margin-right: -1px;
              margin-bottom: -1px;
              margin-top: -1px;

            }

            #qw0 {

              display: flex;

            }


            /* ************************************* */
          </style>

        </div>
        <!-- END CONTENT -->


      </div>
      <!-- END CONTAINER -->








      <?php
      include("suministros/footer.php");
      ?>
      <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
      <!-- BEGIN CORE PLUGINS -->
      <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->





      <script>
        jQuery(document).ready(function () {
          Metronic.init(); // init metronic core componets
          Layout.init(); // init layout
          QuickSidebar.init(); // init quick sidebar
          FormSamples.init();




        });
      </script>



    </div>
  </div></span></a></li>
  </ul>
  </div>
  </nav>
  </header>
  </div>




  <?php include("html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php"); ?>
  <script src="script.js"></script>



  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
    type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
    type="text/javascript"></script>
  <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
  <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
  <script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


  <script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>




  <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>















</body>

</html>