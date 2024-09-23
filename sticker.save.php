<?php
include("session.php");
include("suministros/connect.php");

 
$bandera=$_POST['bandera'];


if ($bandera==1) {
	
            
				      
		      //$ext=$_POST['fileExtension'];
              
              $carpeta=$_POST['carpeta'];
              $path = $_FILES['Filedata']['name'];
              $ext = pathinfo($path, PATHINFO_EXTENSION);
              $num=rand(0000,9999);
              
              $link="Archivo Subido.";

            if ($ext=='pdf' || $ext=='PDF' ) {




              //$carpeta_pdf = "documentos/stickers/";

            //if (!file_exists($carpeta_pdf)) {
                //  mkdir($carpeta_pdf, 0777, true);
            //} 
             

              $nombre= strtoupper($criterio)."_".$orden."_".$num.".".$ext."";

              $destination_img = "documentos/".$carpeta.'/'.$nombre;

              move_uploaded_file($_FILES['Filedata']['tmp_name'], $destination_img); 

              $rs=$mysqli->query("INSERT INTO ".$tabla."( id_orden, ".$criterio.") VALUES ('$orden', '$destination_img')");


            } else {


             
                 //------------------------------Para reducir foto

            function compress($source, $destination, $quality) {

                $info = getimagesize($source);

                if ($info['mime'] == 'image/jpeg') 
                    $image = imagecreatefromjpeg($source);

                elseif ($info['mime'] == 'image/gif') 
                    $image = imagecreatefromgif($source);

                elseif ($info['mime'] == 'image/png') 
                    $image = imagecreatefrompng($source);

                imagejpeg($image, $destination, $quality);

                return $destination;
            }
            
            $carpeta_empleado = "images/stickers/";

            if (!file_exists($carpeta_empleado)) {
                  mkdir($carpeta_empleado, 0777, true);
            } 
         
            $nombre= $_FILES['Filedata']['name'];
            $source_img = $_FILES['Filedata']['tmp_name'];
            
            $destination_img = "images/stickers/".$nombre;
            $d = compress($source_img, $destination_img, 75);
            //------------------------------------Fin Para reducir foto






            $maxDim = 210;
            $path = $_FILES['Filedata']['name'];
            $destinationFilePath= 'images/stickers/'.$path;
            $file_name = $_FILES['Filedata']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize( $file_name );
            if ( $width > $maxDim || $height > $maxDim ) {
                $target_filename = $file_name;
                $ratio = $width/$height;
                if( $ratio > 1) {
                    $new_width = $maxDim;
                    $new_height = $maxDim/$ratio;
                } else {
                    $new_width = $maxDim*$ratio;
                    $new_height = $maxDim;
                }
                $src = imagecreatefromstring( file_get_contents( $file_name ) );
                $dst = imagecreatetruecolor( $new_width, $new_height );
                imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
                imagedestroy( $src );
                imagepng( $dst, $target_filename ); // adjust format as needed
              imagedestroy( $dst );
              move_uploaded_file($_FILES['Filedata']['tmp_name'], $destinationFilePath);
            }



             






            }
            
          echo $link;


}




$mysqli->close();
