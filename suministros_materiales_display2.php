<?php require("db/session.php"); ?>
<?php  require('assets/header.php'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
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
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">


        <!--pegar codigo-->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
          <div class="col-md-3">
            <p><b>
                <font size="4px">DISPLAYS</font>
              </b></p>
            <ul class="ver-inline-menu tabbable margin-bottom-10">

              <?php

              

              if($base == "esa"){
                include("suministros/connect.php");
              }else{
                include("suministros/connect2.php");
              }


              $rs = $mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='display'");
              $flag = 0;
              while ($fila = $rs->fetch_row()) {
                $material = $fila[0];
                $flag = $flag + 1;



                echo '<li style="height:40px;">
                           <a data-toggle="tab" href="#tab_' . $flag . '">
                           <img src="suministros/iconossuministros/mueble.png" width="30px" height="30px"><strong>         ' . $material . '</strong></a>
                             </li>';
              }

              $mysqli->close();


              ?>

            </ul>
          </div>
          <div class="col-md-8">
            <div class="tab-content">



              <?php



                if($base == "esa"){
                  include("suministros/connect.php");
                }else{
                  include("suministros/connect2.php");
                }


              $rs = $mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='display'");
              $flag = 0;
              while ($fila = $rs->fetch_row()) {
                $material = $fila[0];
                $flag = $flag + 1;

                if ($nivel == 4 or $nivel == 8 or $nivel == 1) {
                  echo '
                                  

                               <div id="tab_' . $flag . '" class="tab-pane">
                            <div id="accordion' . $flag . '" class="panel-group">
                                 
 



                                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fab fa-buffer"></i>Existencias ' . $material . '
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_' . $flag . '">
                            <thead>
                            <tr>
                                <th>
                                  Foto
                                </th>
                                <th>
                                  Info
                                </th>
                                <th>
                                   Tipo
                                </th>
                                <th align="center">
                                   <center>Cantidad (Unidades)</center>
                                </th >
                                
                                   
                            </tr>
                            </thead>
                            <tbody> ';
                  /*<th align="center">
                                     <center>Bodega</center>
                                </th>
                                <th align="center">
                                     <center>Estante</center>
                                </th>*/
                } else {
                  echo '
                                  

                               <div id="tab_' . $flag . '" class="tab-pane">
                            <div id="accordion' . $flag . '" class="panel-group">
                                 
 



                                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fab fa-buffer"></i>Existencias ' . $material . '
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_' . $flag . '">
                            <thead>
                            <tr>
                                   <th>
                                 Foto/Info.
                                </th>

                                
                               
                                <th>
                                   Tipo
                                </th>
                                <th align="center">
                                   <center>  Cantidad (Unidades) </center>
                                </th >
                                
                                   
                            </tr>
                            </thead>
                            <tbody> ';
                  /*<th align="center">
                                     <center>Bodega</center>
                                </th>
                                <th align="center">
                                     <center>Estante</center>
                                </th>*/
                }
                /*<th align="center">
                                     <center>Bodega</center>
                                </th>
                                <th align="center">
                                     <center>Estante</center>
                                </th>*/


                $rs2 = $mysqli->query("SELECT *  FROM `material` WHERE material='" . $material . "' AND estado='1' AND cantidad!='null'");
                while ($fila2 = $rs2->fetch_row()) {



                  $foto = $fila2[9];


                  $Tipo = $fila2[2];
                  $Cantidad = $fila2[3];
                  $Bodega = $fila2[4];
                  $Estante = $fila2[5];
                  $Bodega = $fila2[4];
                  $des = $fila2[10];
                  $med = $fila2[6];

                  $pie = $des;
                  if ($pie == null) {
                    $pie = "*No se ha ingresado descripcion para este material*";
                  } else {
                  }




                  $id = $fila2[0];
                  $no = 'asdas';
                  //$des=$fila2['descripcion'];

                  //echo $des;

                  if ($nivel == 4 or $nivel == 8 or $nivel == 1) {


                    if ($des == null && $foto == null) {

                      echo '

                            <tr class="odd gradeX">



                                <td>
                                <a  onclick=\'pasarDatos2(' . $fila2[0] . ',"' . $foto . '")\' href="#"" role="button" data-target="#nota" data-toggle="modal"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
                                     
                                </td>
                          
                                <td align="center">
                                    <a  onclick=\'pasarDatos(' . $id . ',"' . $des . '","' . $Tipo . '")\' href="#"" role="button" data-target="#ModalAgregar"  data-toggle="modal" aria-label="..."><i class="fas fa-ban" ></i></a>
                                </td>
                                <td>
                                  <storng>' . $Tipo . '</storng> 
                                </td>
                                <td align="center">
                                   <b> ' . $Cantidad . '</b>
                                </td>
                                
                             
                            </tr>';
                    }
                    /*<td align="center">
                                    '.$Bodega.'
                                </td>
                                <td align="center">
                                    '.$Estante.'
                                </td>*/ elseif (isset($des) && $foto == null) {
                      echo '

                            <tr class="odd gradeX">


                               <td>
                                <a  onclick=\'pasarDatos2(' . $fila2[0] . ',"' . $foto . '")\' href="#"" role="button" data-target="#nota" data-toggle="modal"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos(' . $id . ',"' . $des . '","' . $Tipo . '")\' href="#"" role="button"  data-target="#ModalModificar" data-toggle="modal" aria-label="..."><i class="fas fa-clipboard-check" ></i></a>
                                </td>
                                <td>
                                  <storng>' . $fila2[2] . '</storng> 
                                </td>
                                <td align="center">
                                   <b> ' . $fila2[3] . '</b>
                                </td>
                                
                          
                            </tr>';
                      /*<td align="center">
                                    '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>*/
                    } elseif ($des == null && isset($foto)) {
                      echo '

                            <tr class="odd gradeX">


                               <td>
                                <a  onclick=\'pasarDatos2(' . $fila2[0] . ',"' . $foto . '")\' href="#"" role="button" data-target="#nota2" data-toggle="modal"><i class="fa fa-image" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos(' . $id . ',"' . $des . '","' . $Tipo . '")\' href="#"" role="button"  data-target="#ModalAgregar" data-toggle="modal" aria-label="..."><i class="fas fa-ban" ></i></a>
                                </td>
                                <td>
                                  <storng>' . $fila2[2] . '</storng> 
                                </td>
                                <td align="center">
                                   <b> ' . $fila2[3] . '</b>
                                </td>
                                <td align="center">
                                 
                              
                            </tr>';
                      /*   '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>*/
                    } elseif ($des !== null && $foto !== null) {
                      echo '

                            <tr class="odd gradeX">

                            
                               <td>
                                <a  onclick=\'pasarDatos2(' . $fila2[0] . ',"' . $foto . '")\' href="#"" role="button" data-target="#nota2" data-toggle="modal"><i class="fa fa-image" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos(' . $id . ',"' . $des . '","' . $Tipo . '")\' href="#"" role="button"  data-target="#ModalModificar" data-toggle="modal" aria-label="..."><i class="fas fa-clipboard-check" ></i></a>
                                </td>
                                <td>
                                  <storng>' . $fila2[2] . '</storng> 
                                </td>
                                <td align="center">
                                   <b> ' . $fila2[3] . '</b>
                                </td>
                                
                              
                            </tr>';
                      /*<td align="center">
                                    '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>*/
                    }
                  } else {

                    echo '

                            <tr class="odd gradeX">

                                 <td>
  <a href="../sistema/artes_esa17/' . $foto . '" data-fancybox="preview" data-width="1500" data-height="1000" data-fancybox data-caption="' . $pie . '">
    <img src="../sistema/artes_esa17/' . $foto . '" class="zoom img-fluid "  alt="" height="30px" />
  </a></td>

                               
                                <td>
                                  <storng>' . $Tipo . '</storng> 
                                </td>
                                <td align="center">
                                   <b> ' . $Cantidad . '</b>
                                </td>
                                
                             
                            </tr>';
                    /*<td align="center">
                                    '.$Bodega.'
                                </td>
                                <td align="center">
                                    '.$Estante.'
                                </td>*/
                  }
                }

                echo ' 
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>










 
    
                            </div>
                        </div>

                        



                                ';
              }

              $mysqli->close();

              ?>




            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->

        <form method="post" action="script/ingresarfotomaterial.php" enctype="multipart/form-data">
          <div class="modal fade" id="nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    Id Material<input id="id_sub" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" required>
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control" name="tipo" aria-label="..." value="display">

                  </div>


                  <div class="form-group">
                    <input name="origen" type="hidden" value="<?php echo $_SESSION['base']; ?>" class="form-control" aria-label="...">
                  </div>

                  <div class="form-group">


                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input class="form-control" name="imagen" type="file" aria-label="..." />
                    </div>



                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </form>

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
          });

          $(".rotate").fancybox({
            width: 600,
            height: 300,
            type: 'iframe'
          });
        </script>
        <form method="post" action="script/ingresarfotomaterial.php" enctype="multipart/form-data">
          <div class="modal fade" id="nota2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input id="id_m" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" required>
                  </div>
                  <div align="center">
                    <h6>*ACTUALMENTE YA HAS SUBIDO UNA FOTO, PERO PUEDE SUBIR OTRA NUEVAMENTE*</h6>
                  </div>
                  <br>
                  <br>


                  <!--
             <div align="center">
               ver imagen <a href="#" onclick="top.window.location.href='../sistema/artes_esa17/'+document.getElementById('imagen').value ; return !1"  class="fancybox" rel="ligthbox">
              </div>-->

                  <div align="center"> <a id="img" onclick="myFunction6(document.getElementById('img').value)" href='#' role='button' class="rotate"><i></i> Click para ver <img align="center" src="../sistema/artes_esa17/IMGPDF/ver3.png" height="80px" class="zoom img-fluid " alt=""> </a></div>
                  <div class="form-group">
                    <input name="origen" type="hidden" value="<?php echo $_SESSION['base']; ?>" class="form-control" aria-label="...">
                  </div>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="tipo" aria-label="..." value="display">

                  </div>

                  <br>

                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input size="60" class="form-control" id="imagen2" name="imagen" type="file" aria-label="..." />
                  </div>


                  <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Subir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      </form>

      <form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data">
        <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
              </div>
              <div class="modal-body">
                <h5 class="modal-title" id="myModalLabel">Material:</h5>

                <div class="form-group">
                  <input id="id_modificar" type="text" class="form-control" name="id" readonly="readonly" aria-label="..." required>
                </div>
                <div class="form-group">
                  <input id="tipo2" type="text" class="form-control" name="tipo2" readonly="readonly" aria-label="..." required>
                </div>
                <br>


                <div class="form-group">
                  Descripcion <textarea id="nombre" type="text" class="form-control" name="descripcion" aria-label="..." required></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="tipo" aria-label="..." value="display">

                </div>




                <div class="modal-footer">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Modificar Descripcion</button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </form>


      <form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data">
        <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
              </div>
              <div class="modal-body">
                <h5 class="modal-title" id="myModalLabel">Material:</h5>
                <div class="form-group">
                  <input id="id_agregar" type="text" class="form-control" name="id" readonly="readonly" aria-label="..." required>
                </div>
                <div class="form-group">
                  <input id="tipo" type="text" class="form-control" name="tipo" readonly="readonly" aria-label="..." required>
                </div>
                <br>



                <div class="form-group">
                  Descripcion <textarea id="nombre" type="text" class="form-control" name="descripcion" aria-label="..." placeholder="Ingrese una descripcion de este material" required></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="tipo" aria-label="..." value="display">

                </div>




                <div class="modal-footer">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
              </div>
            </div>
          </div>
        </div>


      </form>
      <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->

      <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



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

-->














  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    jQuery(document).ready(function() {

      var TableManaged = function() {


        <?php



          if($base == "esa"){
            include("suministros/connect.php");
          }else{
            include("suministros/connect2.php");
          }


        $rs = $mysqli->query("SELECT DISTINCT material  FROM `material`  WHERE medicion='display'");
        $flag = 0;
        while ($fila = $rs->fetch_row()) {
          $material = $fila[0];
          $flag = $flag + 1;


        ?>



          var initTable<?= $flag ?> = function() {

            var table = $('#sample_<?= $flag ?>');

            // begin: third table
            table.dataTable({

              // Internationalisation. For more info refer to http://datatables.net/manual/i18n
              "language": {
                "aria": {
                  "sortAscending": ": activate to sort column ascending",
                  "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "(filtered1 from _MAX_ total registros)",
                "lengthMenu": "Mostrando _MENU_ registros",
                "search": "Busqueda:",
                "zeroRecords": "No se encontraron registros."
              },

              dom: 'Bfrtip',
              buttons: [{
                  extend: 'pdfHtml5',
                  messageTop: 'Lista de Existencias del Material : <?= $material ?>',
                  exportOptions: {
                    columns: '2, 3',
                  }
                },
                {
                  extend: 'excelHtml5',
                  messageTop: 'Lista de Existencias del Material : <?= $material ?>',
                  exportOptions: {
                    columns: '2, 3',
                  }

                }
              ],


              // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
              // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: ../reportes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
              // So when dropdowns used the scrollable div should be removed. 
              //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

              "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.

              "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "Todos"] // change per page values here
              ],
              // set the initial value
              "pageLength": 20,
              "columnDefs": [{ // set default column settings
                'orderable': false,
                'targets': [0]
              }, {
                "searchable": true,
                "targets": [0]
              }],
              "order": [
                [1, "asc"]
              ] // set first column as a default sort by asc
            });

            var tableWrapper = jQuery('#sample_<?= $flag ?>_wrapper');

            table.find('.group-checkable').change(function() {
              var set = jQuery(this).attr("data-set");
              var checked = jQuery(this).is(":checked");
              jQuery(set).each(function() {
                if (checked) {
                  $(this).attr("checked", true);
                } else {
                  $(this).attr("checked", false);
                }
              });
              jQuery.uniform.update(set);
            });

            tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
          }

        <?php
        }
        $mysqli->close();
        ?>

        return {

          //main function to initiate the module
          init: function() {
            if (!jQuery().dataTable) {
              return;
            }

            <?php
            if($base == "esa"){
              include("suministros/connect.php");
            }else{
              include("suministros/connect2.php");
            }
            $rs = $mysqli->query("SELECT DISTINCT material  FROM `material` WHERE 1");
            $flag = 0;
            while ($fila = $rs->fetch_row()) {
              $material = $fila[0];
              $flag = $flag + 1;
            ?>

              initTable<?= $flag ?>();

            <?php
            }
            $mysqli->close();
            ?>

          }

        };

      }();


      //*************************************************************************************************************************************


      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      TableManaged.init();


      jQuery(".buttons").on("click", function() {
        jQuery("#page-content").hide();
        jQuery("#page-content").load(jQuery(this).attr("page"));
        jQuery('#page-content').fadeIn(1000);
        return false;
      });

    });
  </script>
  <script type="text/javascript">
    function pasarDatos(id, med, tip) {








      document.getElementById('id_modificar').value = id;
      document.getElementById('nombre').value = med;
      document.getElementById('tipo2').value = tip;


      document.getElementById('tipo').value = tip;

      document.getElementById('id_agregar').value = id;
      document.getElementById('nombre2').value = med;






      // document.getElementById('idPrecio').value=id;



    }
  </script>
  <script type="text/javascript">
    function pasarDatos2(id, img) {
      document.getElementById('img').value = img;







      document.getElementById('id_sub').value = id;




      document.getElementById('id_m').value = id;



    }
  </script>





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
  <script src="indes/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="indes/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="indes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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





  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <?php include("12/html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("12/html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("12/html/modal_delete.php"); ?>
  <script src="script.js"></script>

  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
  <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
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



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>







</body>

</html>