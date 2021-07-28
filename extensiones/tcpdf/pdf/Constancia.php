<?php

require_once "../../../controladores/adjunto.controlador.php";
require_once "../../../modelos/adjuntos.modelos.php";
//============================================================+
// File name   : example_028.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 028 for TCPDF class
//               Changing page formats
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: changing page formats
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


class imprimirFactura{

	public $id;
	
	public function traerImpresionFactura(){

$itemConstanciaArchivos = "id";
$valorConstanciaArchivos = $this->id;
		
$respuestaConstancia = ControladorAdjuntos::ctrMostrarAdjuntosPDF($itemConstanciaArchivos,$valorConstanciaArchivos);

$NombreConstancia = substr($respuestaConstancia['nombre'],0,150);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP, 10);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

// set font
$pdf->AddPage('L', 'A4');

// --- test backward editing ---

$pdf->setPage(1, true);
$pdf->SetY(50);


// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'OrganizacionArchivos.jpeg';
$pdf->Image($img_file, 0, 0, 300, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();



$bloque11 = <<<EOF

	<table align="center" style="font-family: Arial;font-size:20px; padding-top: 100px; padding-left: 50px;">

		<tr>
      		<td><span style="text-align=center;font-weight:bold;font-size:40pt;">$NombreConstancia</span></td>
       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque11,false, false, false, false, '');
/*
// Print a text
$html = '<span style="color:black;text-align:center;font-weight:bold;font-size:50pt;">Stevens Javier Vera Enriquez</span>';
$pdf->writeHTML($html, true, false, true, false, '');
*/

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Constancia.pdf', 'I');

}
}

$factura = new imprimirFactura();
$factura -> id = $_GET["id"];
$factura -> traerImpresionFactura();


//============================================================+
// END OF FILE
//============================================================+