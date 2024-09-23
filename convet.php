<?


//The PDF version that you want to convert
//the file into.
$pdfVersion = "1.4";
 
//The path that you want to save the new
//file to
$newFile = 'new9.pdf';
 
//The path of the file that you want
//to convert
$currentFile = 'ORDENES_POP/EL_S/FACTURA_1608044313.pdf';
 
//Create the GhostScript command
$gsCmd = "gs -sDEVICE=pdfwrite -dCompatibilityLevel=$pdfVersion -dNOPAUSE -dBATCH -sOutputFile=$newFile $currentFile";
 
//Run it using PHP's exec function.
exec($gsCmd);

?>