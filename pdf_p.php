<?php
require('fpdf181/fpdf.php');
require_once('fpdi.php');
$pdf=new FPDF();
$pagecount = $pdf->setSourceFile('uploads/131642502600000039.pdf');
$tplidx = $pdf->importPage(1, '/MediaBox');
$pdf->addPage();
$pdf->useTemplate($tplidx, 10, 10, 90);
$pdf->Output('uploads/newpdf.pdf', 'D');
?>