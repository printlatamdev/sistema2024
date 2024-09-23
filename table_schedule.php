<table id="datatablesSimple" style="width: 100%;">
    <thead>
        <tr>
            <th>Equipo</th>
            <th>Recurso</th>
            <th>Periodo de Mantenimiento</th>
            <th>Ultimo Mantenimiento</th>
            <th>Proximo Mantenimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $log_information = mysqli_query($mysqli, 'SELECT * FROM printers_maintenance INNER JOIN equipos_produccion ON printers_maintenance.codigo_printer = equipos_produccion.codigo');
        while ($equipo_log = mysqli_fetch_array($log_information)) {
            $equipo = $equipo_log['nombre'];
            $recurso = $equipo_log['recurso'];
            $data =  mysqli_query($mysqli, "SELECT tipo FROM material WHERE id= $recurso");
            while ($recurso_ = mysqli_fetch_array($data)) {
                $recurso =  $recurso_[0];
            }
            $periodo = $equipo_log['maint_period'];
            $last_maint = $equipo_log['ultimo_mantenimiento'];
            $incoming_maint = $equipo_log['siguiente_mantenimiento'];
            $id = $equipo_log['id_printer']; // added ID field
           // Calculate progress percentage (in descending order)
            $next_maint_time = strtotime($last_maint);
            $last_maint_time = strtotime($incoming_maint);
            $maintenance_duration = $last_maint_time - $next_maint_time;
            $remaining_time = $last_maint_time - time();
            $progress_percentage = round($remaining_time / $maintenance_duration * 100, 2);
            //SEMAFORO DE MANTENIMIENTO
            if ($progress_percentage <= 50) {
                $color = '#FFFF00';
            } elseif ($progress_percentage <= 10) {
                $color = '#FF0000';
            } elseif ($progress_percentage > 50) {
                $color = '#008000';
            } else {
                $color = '#808080';
            }
            echo "<tr id='$id'>
            <td>
            $equipo
            <br>
            <div style='margin:5px'>
            <div class='progress' style='height: 10px;'>
            <div class='progress-bar' role='progressbar' style='width: $progress_percentage%; background-color: $color' aria-valuenow='$progress_percentage' aria-valuemin='0' aria-valuemax='100'>
            </div>
            </div>
            </td>
            <td>$recurso</td>
            <td>$periodo</td>
            <td>$last_maint </td>
            <td>$incoming_maint</td>
            <td>
            <button class='edit-btn' data-id='$id' style='background:none;border:none;cursor:pointer'><i class='fa-regular fa-pen-to-square' style='color:  #06409d;margin-right:10%'></i></button>
            <button class='delete-btn' data-id='$id' style='background:none;border:none;cursor:pointer'><i class='fa-solid fa-trash' style='color: #e50606;margin-left:10%'>
            </i></button>
            </td>
            </tr>
            ";
        };
        ?>
    </tbody>
</table>