<?php

 error_reporting(E_ALL);
 ini_set('display_errors', 1);

//************* CREACION Y REGISTRO DE CODIGOS *******************************************************************************

//----------------------------------------------------------------------------------

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
   die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/excel/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Sistema Color Digital")
                      ->setLastModifiedBy("Sistema Color Digital")
                      ->setTitle("Office 2007 XLSX Test Document")
                      ->setSubject("Office 2007 XLSX Test Document")
                      ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                      ->setKeywords("office 2007 openxml php")
                      ->setCategory("Test result file");



$sharedStyle1 = new PHPExcel_Style();
$sharedStyle1->applyFromArray(
  array('fill'  => array(
                'type'    => PHPExcel_Style_Fill::FILL_SOLID,
                'color'   => array('argb' => 'FFFFFF00')
              ),
      'borders' => array(
                'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'top'   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
              )
     ));



$sharedStyle3 = new PHPExcel_Style();
$sharedStyle3->applyFromArray(
  array('borders' => array(
                'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'top'   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
              )
     ));





$sharedStyle2 = new PHPExcel_Style();
$sharedStyle2->applyFromArray(
  array('fill'  => array(
                'type'    => PHPExcel_Style_Fill::FILL_SOLID,
                'color'   => array('argb' => 'FFCCFFCC')
              ),
      'borders' => array(
                'bottom'  => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left'   => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'top'   => array('style' => PHPExcel_Style_Border::BORDER_THIN)
              )
     ));

//*********************************************************************************************************************************************************

include("suministros/connect.php"); 

//$fecha= date('Y-m-d', strtotime($_REQUEST['fecha']));

           $rs=$mysqli->query("SELECT * FROM `orden` ");  


          
           $a=3;
           while ($fila = $rs->fetch_array()) { 
            $b=$a + 1;
            $c=$b + 1;
            $d=$c + 1;
            $e=$d + 1;
            $f=$e + 1;
            $g=$f + 2;

            $id_orden=$fila['id_orden'];
            $empresa=$fila['empresa']; 
            $contacto=$fila['contacto']; 
            $fecha_orden=$fila['fecha_orden']; 
            $fecha_entrega=$fila['fecha_entrega']; 
            $vendedor=$fila['vendedor']; 
            

            $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A".$a.":B".$a."");
            $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle3, "A".$b.":B".$f."");
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$a, 'Orden:')
            ->setCellValue('B'.$a, $id_orden)
            ->setCellValue('A'.$b, 'Empresa:')
            ->setCellValue('B'.$b, $empresa)
            ->setCellValue('A'.$c, 'Contacto:')
            ->setCellValue('B'.$c, $contacto)
            ->setCellValue('A'.$d, 'Vendedor:')
            ->setCellValue('B'.$d, $vendedor)
            ->setCellValue('A'.$e, 'F. Orden:')
            ->setCellValue('B'.$e, $fecha_orden)
            ->setCellValue('A'.$f, 'F. Entrega:')
            ->setCellValue('B'.$f, $fecha_entrega)
            ->setCellValue('A'.$g, 'DETALLES');
                           
                      
                               $rs2=$mysqli->query("SELECT * FROM `orden_detalle` WHERE `id_orden`='".$id_orden."' ");

                               $itt=1;
                               while ($fila2 = $rs2->fetch_array()) { 

                                $h=$g + 1;
                                $i=$h + 1;
                                $j=$i + 1;
                                $k=$j + 1;
                                $l=$k + 1;
                                $m=$l + 1;
                                
                                $n=$m + 1;
                                $o=$n + 1;
                                $p=$o + 1;
                                $q=$p + 1;
                             
                              $trabajo=$fila2['trabajo'];
                              $cantidad=$fila2['cantidad'];
                              $base=$fila2['base'];
                              $altura=$fila2['altura'];
                              $equipo=$fila2['equipo'];
                              $material=$fila2['material'];
                              $detalle=$fila2['detalle'];
                              $laminado=$fila2['laminado'];
                              $rigido=$fila2['rigido'];
                              $acabado=$fila2['acabado'];
                              $size= $base." (Base) X ". $altura." (Altura)";
                               
                              
                              $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "A".$h.":B".$h."");
                              $objPHPExcel->setActiveSheetIndex(0)
                              ->setCellValue('A'.$h, 'Item:')
                              ->setCellValue('B'.$h, $itt)
                              ->setCellValue('A'.$i, 'Tipo:')
                              ->setCellValue('B'.$i, $trabajo)
                              ->setCellValue('A'.$j, 'Cantidad:')
                              ->setCellValue('B'.$j, $cantidad)
                              ->setCellValue('A'.$k, 'Tamaño:')
                              ->setCellValue('B'.$k, $size)
                              ->setCellValue('A'.$l, 'Equipo:')
                              ->setCellValue('B'.$l, $equipo)
                              ->setCellValue('A'.$m, 'Material:')
                              ->setCellValue('B'.$m, $material)
                              ->setCellValue('A'.$n, 'Laminado:')
                              ->setCellValue('B'.$n, $laminado)
                              ->setCellValue('A'.$o, 'Rigido:')
                              ->setCellValue('B'.$o, $rigido)
                              ->setCellValue('A'.$p, 'Acabado:')
                              ->setCellValue('B'.$p, $acabado)
                              ->setCellValue('A'.$q, 'Detalle:')
                              ->setCellValue('B'.$q, $detalle);

                              $g=$q+1;
                              $itt= $itt + 1;
                         
                            }
                     

          
            $a=$g+3;
          }




//*********************************************************************************************************************************************************



  $mysqli->close();

?>
<?php







// Rename worksheet
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Ordenes.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
