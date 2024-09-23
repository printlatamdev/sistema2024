<?php
session_start();

$id = $_SESSION['vsIdempresa'] ?? null;
$base = $_SESSION['base'] ?? null;
$anio = $_SESSION['year'] ?? null;
$bd = isset($base, $anio) ? $base . $anio : 'default_db';
$nombre = $_SESSION['vsNombre'] ?? 'Usuario';
$nivel = $_SESSION['nivel'] ?? 0;

function conexion(): mysqli
{
    $server = 'localhost';
    $usuario = 'admin';
    $clave = 'AG784512';
    global $bd;

    $con = new mysqli($server, $usuario, $clave, $bd);

    if ($con->connect_error) {
        die('No conecta: ' . $con->connect_error);
    }

    return $con;
}

$conexion = conexion();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Color Digital | <?php echo date('Y')?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Links -->
    <link rel="stylesheet" href="indes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="indes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="indes/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="indes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="indes/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="indes/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- JavaScript Links -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>

    <script>
$(document).ready(function() {
            // Initialize DataTables with Export Buttons
            var table = $('#dataTable').DataTable({
                "searching": true,   // Enable search filter
                "paging": true,      // Enable pagination
                "ordering": true,    // Enable sorting
                "info": true,        // Enable info display
                "dom": 'Bfrtip',     // Define where the buttons are placed
                "buttons": [
                    {
                        extend: 'excelHtml5',
                        title: 'Log Bodega Data',
                        text: 'Export to Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'Log Bodega Data',
                        text: 'Export to CSV'
                    },
                    {
                        extend: 'print',
                        text: 'Print Table'
                    }
                ]
            });

function asegurar() {
    return confirm("¿Seguro que desea anular la solicitud?");
}
</script>


    <style>
        .content {
            margin-top: 80px;
        }
        input[type="number"] {
            width: 100px;
        }
        .table-bordered {
            border: 1px solid #000;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #000;
        }
        #fms {
            border-style: solid;
            border-width: 1px;
            padding: 20px;
        }
        body {
            background-color: #ffffff;
        }
    </style>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%" width="150">
                <span class="brand-text font-weight-light"></span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($base == "esa") { ?>
                            <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
                        <?php } elseif ($base == "nica") { ?>
                            <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
                        <?php } ?>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo htmlspecialchars($nombre); ?></a>
                        <a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php include("menu4.php"); ?>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">
                <div class="table-responsive" align="center">
                    <div align="Left">
                        <h3 class="page-header">
                            SOLICITUDES DE DESPACHO EL SALVADOR
                            <img src="imagenes/aereo.png" width="40">
                            <img src="imagenes/aereoo.png" width="40">
                        </h3>
                    </div>
                    <!-- <form class="form-inline" method="get">
                        <div class="form-group">
                            <select name="filter" class="form-control" onchange="form.submit()">
                                <option value="0">Filtro por estado de orden</option>
                                <option value="1" <?php echo isset($_GET['filter']) && $_GET['filter'] == '1' ? 'selected' : ''; ?>>En espera</option>
                                <option value="2" <?php echo isset($_GET['filter']) && $_GET['filter'] == '2' ? 'selected' : ''; ?>>Impresion</option>
                                <option value="3" <?php echo isset($_GET['filter']) && $_GET['filter'] == '3' ? 'selected' : ''; ?>>Corte</option>
                            </select>
                        </div>
                    </form> -->
                    <br />
                    <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-striped">
    <thead class="bg-primary text-white">
        <tr>
            <th># Solicitud</th>
            <th>Proveedor</th>
            <th>Transporte</th>
            <th>Destino</th>
            <th>Origen</th>
            <th>Fecha</th>
            <th>Documento</th>
            <th>Anular</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = mysqli_query($conexion, "SELECT DISTINCT n_orden, proveedor, origen, transporte, destino, fecha, solicitud_pdf FROM solicitud_despacho ORDER BY n_orden DESC");

        if (!$sql) {
            echo '<tr><td colspan="8">Error en la consulta: ' . mysqli_error($conexion) . '</td></tr>';
        } else {
            while ($row = mysqli_fetch_assoc($sql)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['n_orden']) . '</td>';
                echo '<td>' . htmlspecialchars($row['proveedor']) . '</td>';
                echo '<td>' . htmlspecialchars($row['transporte']) . '</td>';
                echo '<td>' . htmlspecialchars($row['destino']) . '</td>';
                echo '<td>' . htmlspecialchars($row['origen']) . '</td>';
                echo '<td>' . htmlspecialchars($row['fecha']) . '</td>';
                echo '<td style="text-align: center;"><a class="btn bg-success" href="logistica/SOLICITUDES DE DESPACHO/' . htmlspecialchars($row['solicitud_pdf']) . '" data-fancybox="preview"><i class="fas fa-file-alt"></i></a></td>';
                echo '<td><a href="cancelar.php?n_orden=' . htmlspecialchars($row['n_orden']) . '" onclick="return asegurar()">Anular</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>

    </div>
    <!-- JavaScript Files -->
    <script src="indes/plugins/jquery/jquery.min.js"></script>
    <script src="indes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="indes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="indes/dist/js/adminlte.js"></script>
    <script src="indes/plugins/daterangepicker/moment.min.js"></script>
    <script src="indes/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="indes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="indes/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="indes/plugins/bs4-popover.min.js"></script>
    
</body>

</html>
