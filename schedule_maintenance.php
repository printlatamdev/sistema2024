<?php
include('./conect2.php');?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Schedule - Maintenance</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link href="./css/styles_maintenance.css" rel="stylesheet" />
</head>
<style>
    .schedule {
        margin-bottom: 10px;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <?php include('./navbar_maint/navbar_maintenance.php'); ?>
    </nav>
    <div id="layoutSidenav">
        <?php include('./sidebar_maintenance/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Agenda de Mantenimientos</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Mantenimientos</li>
                    </ol>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary schedule" data-bs-toggle="modal" data-bs-target="#scheduleEquipo">
                        Agendar Mantenimiento
                    </button>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Historial de Mantenimientos
                            </div>
                            <div class="card-body">
                               <?include('table_schedule.php')?>
                                <!-- Confirmation modal -->
                                <div class="modal" tabindex="-1" role="dialog" id="confirmationModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Estas seguro que quieres eliminar este registro?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" id="confirmBtn">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelBtn">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
    <!----Modal-------->
    <div class="modal fade" id="scheduleEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar Mantenimiento de Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id='newSchedule' method="post" action='./maintenance_eq_form/addEquipoForm.php'>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de equipo</label>
                            <select class="select2_category form-control" tabindex="1" required name='equipo'>
                                <option selected></option>
                                <?php
                                $equipo_name = mysqli_query($mysqli, 'SELECT * FROM equipos_produccion');
                                while ($equipo = mysqli_fetch_array($equipo_name)) {
                                    $nombre = $equipo['nombre'];
                                    $codigo = $equipo['codigo'];

                                    echo "<option value='$codigo'>$nombre</option>";
                                };
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recurso" class="form-label">Recurso</label>
                            <select id="recursos" class="select2_category form-control" tabindex="1" required name='recursos'>
                                <option selected></option>
                                <?php
                                $resource = mysqli_query($mysqli, 'SELECT * FROM material WHERE medicion = "repuestos" OR medicion = "accesorios"');
                                while ($item = mysqli_fetch_array($resource)) {
                                    $item_ = $item['tipo'];
                                    $id = $item['id'];
                                    echo "<option value='$id'>$item_</option>";
                                };
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="current_date" class="form-label">Fecha Inicial de Mantenimiento</label>
                            <input type="date" class="form-control" id="current_date" name='current_date' value="<?= date("Y-m-d") ?>">
                        </div>
                        <div class="mb-3">
                            <label for="maint_range" class="form-label">Periodo de Mantenimiento</label>
                            <input type="number" class="form-control" id="maint_range" name='maint_range' placeholder="dia, mese o años">
                            <small class="form-text text-muted" style="font-size: 12px;">Cada cuanto tiempo se dara este mantenimiento al equipo</small>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="date_type" id="date1" value="days" checked>
                                <label class="form-check-label" for="dia">
                                    Dias
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="date_type" id="date2" value="month">
                                <label class="form-check-label" for="mes">
                                    Meses
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="date_type" id="date3" value="year">
                                <label class="form-check-label" for="anio">
                                    Años
                                </label>
                            </div>
                        </div>
                        <div style="display:none;">
                            <input type="text" class="form-control" name='flag' value="scheduleMaint">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id='saveSchedule'>Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
<script>
   $('#saveSchedule').click(function() {
    $('#newSchedule').submit();
    // Add code to send email here
    // $.ajax({
    //     type: 'POST',
    //     url: 'send_email.php', // replace with the URL of your email script
    //     data: $('#newSchedule').serialize(), // serialize the form data
    //     success: function(response) {
    //         // handle success
    //     },
    //     error: function(response) {
    //         // handle error
    //     }
    // });

    // Add code to add event to Microsoft Calendar here
    // $.ajax({
    //     type: 'POST',
    //     url: 'add_event.php', // replace with the URL of your add event script
    //     data: $('#newSchedule').serialize(), // serialize the form data
    //     success: function(response) {
    //         // handle success
    //     },
    //     error: function(response) {
    //         // handle error
    //     }
    // });
});

</script>
<script>
    // Function to handle the confirmation modal
    function handleConfirmationModal(id) {
        const modal = document.getElementById('confirmationModal');
        const confirmBtn = document.getElementById('confirmBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        // Show the modal
        modal.style.display = 'block';

        // Handle modal interactions
        confirmBtn.onclick = function() {
            // Remove the record from the table
        $.ajax({
            url: 'delete.php', // change this to the name of your PHP script to handle the deletion
            type: 'POST',
            data: { id: id , mode : 'schedule' },
            success: function(response) {
                location.reload(); // change this to the name of the PHP script that generates the table
            }
        });

            // Remove the record from the database (add your code here)

            // Hide the modal
            modal.style.display = 'none';
        }
        cancelBtn.onclick = function() {
            // Hide the modal
            modal.style.display = 'none';
        }
    }

    // Add event listeners to the delete buttons
    const deleteBtns = document.getElementsByClassName('delete-btn');
    for (let i = 0; i < deleteBtns.length; i++) {
        deleteBtns[i].onclick = function() {
            const rowId = this.parentNode.parentNode.id;
            handleConfirmationModal(rowId);
        }
    }
</script>