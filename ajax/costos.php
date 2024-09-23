<?

/* COSTOS GUATEMALA */

if ($pais_destino=='gt') {

	if ($tipo_camion==15) {
		$flete=250;
	}elseif ($tipo_camion==25) {
		$flete=285;
	}
	elseif ($tipo_camion==3) {
		$flete=300;
	}

	elseif ($tipo_camion==4) {
		$flete=325;
	}
    
    elseif ($tipo_camion==5) {
		$flete=350;
	}


	elseif ($tipo_camion==8) {
		$flete=375;
	}elseif ($tipo_camion==12) {
		$flete=500;
	}elseif ($tipo_camion==21) {
		$flete=600;
	}





/* COSTOS GUATEMALA */
}






if($pais_destino=='hn' && $cliente==3 ) {
/*COSTOS HN */


$pais_15=225;
$pais_4=450;
$pais_8=525;
$pais_12=700;
$pais_21=875;

if ($tipo_camion==15) {
		$flete=200;
	}

elseif ($tipo_camion==25) {
		$flete=275;
	}
	elseif ($tipo_camion==3) {
		$flete=350;
	}


	elseif ($tipo_camion==4) {
		$flete=425;
	}

	elseif ($tipo_camion==5) {
		$flete=450;
	}elseif ($tipo_camion==8) {
		$flete=500;
	}elseif ($tipo_camion==12) {
		$flete=675;
	}elseif ($tipo_camion==21) {
		$flete=850;
	}
/*COSTOS HN SULA */



}




if ($pais_destino=='hn' && $cliente!=3) {
/*COSTOS HN TEGU */
$pais_15=325;
$pais_4=425;
$hn_tegu_8=500;
$pais_12=675;
$pais_21=850;
/*COSTOS HN TEGU */

if ($tipo_camion==15) {
		$flete=285;
	}
elseif ($tipo_camion==25) {
		$flete=300;
	}
	elseif ($tipo_camion==3) {
		$flete=350;
	}

	elseif ($tipo_camion==4) {
		$flete=400;
	}
	elseif ($tipo_camion==5) {
		$flete=450;
	}


	elseif ($tipo_camion==8) {
		$flete=475;
	}elseif ($tipo_camion==12) {
		$flete=650;
	}elseif ($tipo_camion==21) {
		$flete=825;
	}
/*COSTOS HN SULA */
}




if ($pais_destino=='nica') {
	/*COSTOS NICA */
$pais_15=475;
$pais_4=600;
$pais_8=675;
$pais_12=825;
$pais_21=975;
/*COSTOS NICA */

if ($tipo_camion==15) {
		$flete=425;
	}

elseif ($tipo_camion==25) {
		$flete=475;
	}
	elseif ($tipo_camion==3) {
		$flete=525;
	}


	elseif ($tipo_camion==4) {
		$flete=575;
	}

	elseif ($tipo_camion==5) {
		$flete=625;
	}elseif ($tipo_camion==8) {
		$flete=650;
	}elseif ($tipo_camion==12) {
		$flete=800;
	}elseif ($tipo_camion==21) {
		$flete=950;
	}


}



if ($pais_destino=='cr') {
	/*COSTOS CR */
$pais_15=725;
$pais_4=875;
$pais_8=925;
$pais_12=1075;
$pais_21=1300;
/*COSTOS CR */

if ($tipo_camion==15) {
		$flete=700;
	}

    elseif ($tipo_camion==25) {
		$flete=725;
	}
	elseif ($tipo_camion==3) {
		$flete=800;
	}

	elseif ($tipo_camion==4) {
		$flete=850;
	}
elseif ($tipo_camion==5) {
		$flete=875;
	}

	elseif ($tipo_camion==8) {
		$flete=900;
	}elseif ($tipo_camion==12) {
		$flete=1050;
	}elseif ($tipo_camion==21) {
		$flete=1250;
	}




}





if ($pais_destino=='pn') {
/*COSTOS PN */
$pais_15=1450;
$pais_4=1750;
$pais_8=1900;
$pais_12=2150;
$pais_21=2450;
/*COSTOS PN */
if ($tipo_camion==15) {
		$flete=1400;
	}
    elseif ($tipo_camion==25) {
		$flete=1450;
	}
	elseif ($tipo_camion==3) {
		$flete=1600;
	}



	elseif ($tipo_camion==4) {
		$flete=1700;
	}

  elseif ($tipo_camion==5) {
		$flete=1750;
	}

	elseif ($tipo_camion==8) {
		$flete=1850;
	}elseif ($tipo_camion==12) {
		$flete=2100;
	}elseif ($tipo_camion==21) {
		$flete=2400;
	}






}


?>