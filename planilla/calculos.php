<?php
while ($r = $query->fetch_array()):
    $id_empleado = $r["id_empleado"];
    $codigo = $r["codigo_marcacion"];
    $salario_dia = $r["sueldo"] / 30;

    // Fetching the number of days worked
    $sql21 = "SELECT * FROM min_tarde WHERE id_empleado = '$codigo'";
    $query21 = $con->query($sql21);

    $dias_trabajados = 0; // Initialize to avoid undefined variable issues
    while ($r96 = $query21->fetch_array()):
        $dias_trabajados = $r96["num_dias_trabajados"];
    endwhile;

    // Calculating the net payment
    $pago_neto = $dias_trabajados * $salario_dia;
    $isss = $pago_neto * 0.03;
    $afp = $pago_neto * 0.0725;

    // Fetching other discounts
    $otros = "SELECT SUM(monto_cuota) AS monto FROM descuentos WHERE id_empleado = '$id_empleado'";
    $otros_descuentos = $con->query($otros);

    $monto_otros_descuentos = 0; // Initialize to avoid undefined variable issues
    while ($r2 = $otros_descuentos->fetch_array()):
        $monto_otros_descuentos = $r2["monto"];
    endwhile;

    // Fetching bonuses
    $otros_b = "SELECT SUM(total_pagar) AS bono FROM bonificacion WHERE id_empleado = '$id_empleado'";
    $otros_bonificacion = $con->query($otros_b);

    $monto_bonificacion = 0; // Initialize to avoid undefined variable issues
    while ($r3 = $otros_bonificacion->fetch_array()):
        $monto_bonificacion = $r3["bono"];
    endwhile;

    // Calculating total deductions
    $total_descuentos = $isss + $afp + $monto_otros_descuentos;

    // Calculating payment after deductions
    $pago_sin_afp_iss = $pago_neto - $isss - $afp;
    $pago_con_descuentos = $pago_sin_afp_iss - $monto_otros_descuentos;
    $pago_total = $pago_con_descuentos + $monto_bonificacion;

    //**********************************CALCULO DE RENTA******************************************

    $salario_renta = $pago_total;

    if ($salario_renta <= 236.00) {
        $renta = 0;
    } elseif ($salario_renta <= 447.62) {
        $renta = (($salario_renta - 236.00) * 0.10) + 8.83;
    } elseif ($salario_renta <= 1019.05) {
        $renta = (($salario_renta - 447.62) * 0.20) + 30.00;
    } else {
        $renta = (($salario_renta - 1019.06) * 0.30) + 144.28;
    }

    $pago_total_total = $pago_total - $renta;

    // Update total deductions to include renta
    $total_descuentos += $renta;

    //*********************************FIN DEL CALCULO DE RENTA ************************************

endwhile;