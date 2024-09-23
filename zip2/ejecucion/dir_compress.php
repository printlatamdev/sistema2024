<?php
    /**
     * The name of the source and destination folders must be specified relative to 
     * the script wich includes this one.
     */


//include("../connectin.php");
//$id       = $_GET["idorden"];

    $host="localhost";

    $database='esa20';

    $username="admin";  

    $password="";

    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

 $consulta2 =$mysqli->query("SELECT a.id_orden, a.id_empresa,a.empresa, a.destino, a.id_proyecto, a.nombre_proyecto, b.id_proyecto, b.nombre, b.id_marca, b.marca from pop a INNER JOIN pop_proyecto b on a.id_proyecto=b.id_proyecto where id_orden=10");

 
     while ($row = mysqli_fetch_array($consulta2))
                                   {


                                    $empresa=$row['empresa'];
                                    $marca=$row['marca'];
                                    $nombre_proyecto=$row['nombre'];
                                    $destino=$row['destino'];
                                                           


                                   }




    /**
     * We create a DirCompress class object with the right source and destination directories.
     */
$ruta="../Artes/2020/DISPLAYS/".$empresa."/".$marca."/".$nombre_proyecto."/DISENO/CORTE/CR/";
       $objeto = new DirCompress("../Artes/2020/DISPLAYS/".$empresa."/".$marca."/".$nombre_proyecto."/DISENO/CORTE/".$destino."/", "prueba2/");
    //$objeto = new DirCompress("../Artes/2020/DISPLAYS/HH GLOBAL EL SALVADOR/DOVE/DOVE ANTICASPA/DISENO/CORTE/CR/", "prueba2/");
    /**
     * We establish the name of the compressed zip file, which is mandatory. 
     * If we don't include a .zip name extension, this will be added by the class, 
     * so this is optional. It will be .zip named anyway.
     */
    $objeto->setZipFileName("SA.zip");
    /**
     * We create the zip compressed file.
     */
    $objeto->createZip();
//echo $ruta;
    echo $objeto->makeLink("Descargar");
?>