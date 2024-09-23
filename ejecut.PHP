<? 

   include("connectin.php");
   $carpeta_artes_orden = "SUCURSALES/";
	 if (!file_exists($carpeta_artes_orden)) {
	 mkdir($carpeta_artes_orden, 0777, true);}
                                          
   $rs=$mysqli->query("select * from sucursales");

       while ($fila = $rs->fetch_row()) {
       	$carpet = "SUCURSALES/".$fila[0];
		 if (!file_exists($carpet)) {
		 mkdir($carpet, 0777, true);}
       }

                                             //$value=$fila[0];



                                          $mysqli->close();

?>