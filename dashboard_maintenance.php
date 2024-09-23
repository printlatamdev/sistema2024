<?php
include('./conect2.php');
/***Consulta de Impresoras */
// $get_data = mysqli_query($mysqli, "SELECT * FROM tinta_tipo WHERE estado=1");
/* while ($info = mysqli_fetch_array($get_data)) {
} */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="./css/styles_maintenance.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php include('./navbar_maint/navbar_maintenance.php'); ?>
    </nav>
    <div id="layoutSidenav">
        <?php include('./sidebar_maintenance/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Mantenimientos al dia</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Proximas a mantenimiento</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Mantenimientos retrasados</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <!-- <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div> -->
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <!--  <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Lista de equipos
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Nombre de Equipo</th>
                                        <th>Codigo</th>
                                        <th>Ultimo Mantenimiento</th>
                                        <th>Proximo Mantenimiento</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $inner = mysqli_query($mysqli,'SELECT tinta_tipo.tipo FROM tinta_tipo INNER JOIN printers_maintenance');
                                    $inner = mysqli_query($mysqli, 'SELECT * FROM tinta_tipo INNER JOIN printers_maintenance ON tinta_tipo.id = esa22.printers_maintenance.id_prt_tinta WHERE tinta_tipo.estado = 1');

                                    while ($filas = mysqli_fetch_array($inner)) {
                                        $printers = $filas['tipo'];
                                        $codigo = $filas['codigo'];
                                        $last_maintenance = $filas['ultimo_mantenimiento'];
                                        $next_maintenance = $filas['siguiente_mantenimiento'];
                                        $obs = $filas['observaciones'];
                                        echo "
                                        <tr>
                                        <td>$printers</td>
                                        <td>$codigo</td>
                                        <td>$last_maintenance</td>
                                        <td>$next_maintenance</td>
                                        <td>$obs</td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Color Digital 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>