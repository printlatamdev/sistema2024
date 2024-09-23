<?php
require('WriteHTML.php');

$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->WriteHTML('<table align="center">
	                    <tr>
	                     <td>esto ses una prueba de texto</td> 
	                     <td>otra prueba de texto</td>
	                    </tr>
	                    <tr>
	                     <td>cotra prueba de texto</td>
	                     <td>dotra prueba de texto</td>
	                    </tr>
	                    <tr>
	                     <td>eotra prueba de texto</td>
	                     <td>fotra prueba de texto</td>
	                    </tr>
	             </table>');
$pdf->Output();
?>
