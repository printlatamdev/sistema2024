<?php
require("db/session.php");
if (!isset($_SESSION['vsClave'])) {
  header("location:login22.php");
  exit;
}

if ($nivel == 5) {
  $cargo = "IMPRESION";

  // Query for active print orders
  $pop_impresion_activa = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $pop_imp_on = mysqli_num_rows($pop_impresion_activa);

  // Query for completed print orders
  $pop_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $pop_imp_of = mysqli_num_rows($pop_impresion_terminada);

  // Query for active print orders in the 'orden' table
  $po_impresion_activa = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_imp_on = mysqli_num_rows($po_impresion_activa);

  // Query for completed print orders in the 'orden' table
  $po_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_imp_of = mysqli_num_rows($po_impresion_terminada);

  // Query for active print orders in the 'campos' table
  $po_campos_impresion_activa = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_on = mysqli_num_rows($po_campos_impresion_activa);

  // Query for completed print orders in the 'campos' table
  $po_campos_impresion_terminada = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_of = mysqli_num_rows($po_campos_impresion_terminada);

} elseif ($nivel == 15) {
  $cargo = "CORTE";

  // Add similar queries for level 15 here, with appropriate conditions
  // Example queries for active and completed orders for level 15

  // Active print orders for level 15
  $pop_impresion_activa = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $pop_imp_on = mysqli_num_rows($pop_impresion_activa);

  // Completed print orders for level 15
  $pop_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $pop_imp_of = mysqli_num_rows($pop_impresion_terminada);

  // Active print orders in the 'orden' table for level 15
  $po_impresion_activa = $mysqli->query(query: "SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_imp_on = mysqli_num_rows($po_impresion_activa);

  // Completed print orders in the 'orden' table for level 15
  $po_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_imp_of = mysqli_num_rows($po_impresion_terminada);

  // Active print orders in the 'campos' table for level 15
  $po_campos_impresion_activa = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_on = mysqli_num_rows($po_campos_impresion_activa);

  // Completed print orders in the 'campos' table for level 15
  $po_campos_impresion_terminada = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_of = mysqli_num_rows($po_campos_impresion_terminada);

} elseif ($nivel == 4) {
  $cargo = "COMPUTO";

  // Active print orders for level 4
  $pop_impresion_activa = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $pop_imp_on = mysqli_num_rows($pop_impresion_activa);

  // Completed print orders for level 4
  $pop_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
    FROM logitica b 
    INNER JOIN pop a ON b.id_orden = a.id_orden 
    INNER JOIN pop_proyecto c ON a.id_proyecto=c.id_proyecto 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $pop_imp_of = mysqli_num_rows($pop_impresion_terminada);

  // Active print orders in the 'orden' table for level 4
  $po_impresion_activa = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_imp_on = mysqli_num_rows($po_impresion_activa);

  // Completed print orders in the 'orden' table for level 4
  $po_impresion_terminada = $mysqli->query("SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden 
    FROM orden a 
    INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_imp_of = mysqli_num_rows($po_impresion_terminada);

  // Active print orders in the 'campos' table for level 4
  $po_campos_impresion_activa = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='1' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_on = mysqli_num_rows($po_campos_impresion_activa);

  // Completed print orders in the 'campos' table for level 4
  $po_campos_impresion_terminada = $mysqli->query("SELECT DISTINCT a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot 
    FROM campos a 
    INNER JOIN campos_detalle b ON a.id_orden=b.id_orden 
    WHERE a.impresion='0' 
    ORDER BY a.id_orden DESC");
  $po_campos_imp_of = mysqli_num_rows($po_campos_impresion_terminada);

} else {
  $cargo = "UNKNOWN";
  $pop_imp_on = $pop_imp_of = $po_imp_on = $po_imp_of = $po_campos_imp_on = $po_campos_imp_of = 0;
}

$totals2 = 0; // Replace with appropriate query if needed
$ordenes_activas = 0; // Replace with appropriate query if needed

?>
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
        <? if ($nivel != 50) { ?><img src="images/logo_color.png" alt="COLOR DIGITAL" style="opacity: .8" width="150"><? } ?>
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
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid ">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
include("conteo_metros.php");
$nivel = $_SESSION['nivel'];
$base = $_SESSION['base'];

if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 20 || $nivel == 50) { ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $ordenes_activas ?></h3>
              <p>Ordenes PO Activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="lista_po_nueva.php" class="small-box-footer">VER ORDENES <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <p>Ordenes PO Finalizadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-double"></i>
            </div>
            <a href="lista_po_nueva_fin.php" class="small-box-footer">VER ORDENES<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php if ($nivel != 3 && $nivel != 20 && $nivel != 50) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= number_format($totals ?? 0, 2) ?> Mts²</h3>
                <p>Metros Impresos</p>
              </div>
              <div class="icon">
                <i class="fas fa-print"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
        <?php if ($nivel != 20 && $nivel != 50) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $cotissv ?></h3>
                <p>Cotizaciones Color Digital</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-alt"></i>
              </div>
              <a href="cotizaciones2.php" class="small-box-footer">VER COTIZACIONES<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $ordenes_activas_pop ?></h3>
              <p>Ordenes POP Activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="lista_pop_nueva.php" class="small-box-footer">VER ORDENES <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <p>Ordenes POP Finalizadas</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-double"></i>
            </div>
            <a href="lista_pop_nueva_fin.php" class="small-box-footer">VER ORDENES<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php if ($nivel != 3 && $nivel != 20 && $nivel != 50) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= number_format($totals_pop ?? 0, 2) ?> Mts²</h3>
                <p>Metros Impresos</p>
              </div>
              <div class="icon">
                <i class="fas fa-print"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

<?php } elseif ($nivel == 5 || $nivel == 15 || $nivel == 4 || $nivel == 21) { ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $pop_imp_on ?></h3>
              <p>POP ACTIVAS DE <?= $cargo; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="lista_pop_nueva.php" class="small-box-footer">VER <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $pop_imp_of ?><sup style="font-size: 20px"></sup></h3>
              <p>POP FINALIZADAS DE <?= $cargo; ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-check-double"></i>
            </div>
            <a href="lista_pop_nueva_fin.php" class="small-box-footer">VER <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $po_imp_on ?></h3>
              <p>OP ACTIVAS DE <?= $cargo; ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-print"></i>
            </div>
            <a href="lista_po_nueva.php" class="small-box-footer">VER<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $po_imp_of ?></h3>
              <p>PO FINALIZADAS DE <?= $cargo; ?></p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="lista_po_nueva_fin.php" class="small-box-footer">VER<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <?php if ($base != "nica") { ?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $po_campos_imp_on ?></h3>
                <p>CAMPOS ACTIVAS DE <?= $cargo; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="lista_campos_nueva.php" class="small-box-footer">VER <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $po_campos_imp_of ?><sup style="font-size: 20px"></sup></h3>
                <p>CAMPOS FINALIZADAS DE <?= $cargo; ?></p>
              </div>
              <div class="icon">
                <i class="fas fa-check-double"></i>
              </div>
              <a href="lista_campos_nueva_fin.php" class="small-box-footer">VER<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

<?php } elseif ($nivel == 9) { ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $ordenes_activas ?></h3>
              <h1><p>FACTURACION POP</p></h1>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="lista_pop_nueva.php" class="small-box-footer">VER <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h1><p> FACTURACION PO </p></h1>
            </div>
            <div class="icon">
              <i class="fas fa-check-double"></i>
            </div>
            <a href="lista_po_nueva.php" class="small-box-footer">VER <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $po_imp_on ?></h3>
              <h1><p> ORDENES CAMPOS</p></h1>
            </div>
            <div class="icon">
              <i class="fas fa-print"></i>
            </div>
            <a href="lista_campos_nueva.php" class="small-box-footer">VER<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $po_imp_of ?></h1>
              <p>COTIZACIONES</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="cotizaciones2.php" class="small-box-footer">VER<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

    <!-- /.row -->
    <!-- Main row -->


  
    <div class="row">
      <!-- Left col -->

      <!-- Custom tabs (Charts with tabs)-->



      <!-- /.card -->

      <!-- DIRECT CHAT -->

      <!-- /.card-header -->
      <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages">
          <!-- Message. Default to the left -->

          <!-- /.direct-chat-msg -->

          <!-- Message to the right -->

          <!-- /.card-body -->

          <!-- /.card-body-->


          <!-- /.card -->

          <!-- solid sales graph -->

          <!-- /.card -->

          <!-- Calendar -->
          <div class="card bg-gradient-success">

          </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <? include("pie.php"); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->



      <script src="indes/dist/js/adminlte.js"></script>
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

      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="indes/dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="indes/dist/js/demo.js"></script>


      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

      </script>


      <?

      $nivel = $_SESSION['nivel'];

      if ($nivel == $nivel && $leido == 1) {
      ?>

        <script type="text/javascript">
          $(function() {
            $("#anuncio").modal();
          });
        </script>
      <? } ?>
      <script>
        if('<?php echo $nombre;?>' == 'Rita Palacios' ){
          setTimeout(() => {
            alert("Por medida de seguridad el sistema se cerrara cada hora, quedan 5 minutos");
          }, 3300000);
          setTimeout(()=> {
          $("html").load('salir.php');
        },3600000);  
        }
    </script>
  </body>

</html>