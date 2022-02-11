<?php 

/* ==============================  CONTROLADOR INFORMACIÓN DE SOLICITUD  ============================================*/
/* == controlador INFORMACIÓN DE SOLICITUD == */
require_once "../../../controladores/solicitudes-informacion.controlador.php";
require_once "../../../controladores/solicitudes-arco.controlador.php";
require_once "../../../controladores/capacitaciones.controlador.php";
//require_once "../../../controladores/administracionSO.controlador.php";

/* ===============================  MODELO INFORMACIÓN DE SOLICITUD  ================================================*/
/* === Modelo INFORMACIÓN DE SOLICITUD === */
require_once "../../../modelos/solicitudes-informacion.modelo.php";
require_once "../../../modelos/solicitudes-arco.modelo.php";
require_once "../../../modelos/capacitaciones.modelo.php";
//require_once "../../../modelos/administracionSO.modelo.php";

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        /*=============================================
        =            LOGOTIPO DE NAYARIT            =
        =============================================*/
        $image_file = K_PATH_IMAGES.'nayarit2.jpg';
        $this->Image($image_file, 10, 8, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        /*=============================================
        =            TEXTO ITAI            =
        =============================================*/
        // Position at 15 mm from bottom
        $this->SetY(-283);
        // Set font
        $this->SetFont('helvetica', '', 12);
        // Title
        $this->Cell(0, 15, 'Instituto de Transparencia y Acceso a la Información Pública del Estado de Nayarit', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        /*=============================================
        =        TEXTO ADMINISTRACION DE RECURSO DE REVISION           =
        =============================================*/
        // Position at 15 mm from bottom
        $this->SetY(-277);
        // Set font
        $this->SetFont('helvetica', '', 12);
        // Title
        $this->Cell(0, 15, 'Administración Sujetos Obligados', 0, false, 'C', 0, '', 0, false, 'M', 'M');
         /*=============================================
        =            LOGOTIPO DE NAYARIT            =
        =============================================*/
        $image_file = K_PATH_IMAGES.'ITAI_nuevo.jpg';
        $this->Image($image_file, 185, 8, 12, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

class imprimirReporte{

public $idSI;

public function traerImpresionReporte(){

//TRAEMOS LA INFORMACION DE LA REVISION

$itemSolicitudInformacion = "idSI";
$valorSolicitudInformacion = $this->idSI;

$itemSolicitudArco = "idSAR";
$valorSolicitudArco = $this->idSAR;

$itemCapacitaciones = "idCA";
$valorCapacitaciones = $this->idCA;





/* =============================== PARTE SUPERIOR ==================================== */

        // ---------- Sentido en que se emite la respuesta ----------//

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Reporte Sujetos Obligados');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->setPrintHeader(true);
// set default font subsetting mode
$pdf->startPageGroup(true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

 /*=============================================
    =            LUGAR Y FECHA            =
  =============================================*/
  $datos = <<<EOF

	<table style="font-family: Arial;font-size:12px;padding-top: 5px;">
		<tr>
      		<td style="width:425px;"></td>
      		<td style="width:280px;"><span style="font-weight:bold">TEPIC NAYARIT, MÉXICO</span></td>
       </tr>
		<tr>
      		<td style="width:425px;"></td>
      		<td style="width:280px;"><span style="font-weight:bold">FECHA:</span> $fecha</td>
	   </tr>
       <tr>
      		<td style="width:425px;"></td>
      		<td style="width:280px;"><span style="font-weight:bold">ASUNTO:</span> CONSTANCIA DE ENTREGA </td>
       </tr>
	</table>


EOF;

$pdf->writeHTML($datos,false, false, false, false, '');

$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>
      <td ><span style="Arial;font-size:14px;font-weight:bold">$sujetoObligado1</span>  </td>
    </tr>
    <tr>
      <td ><span style="Arial;font-size:14px;font-weight:bold">$sujetoObligado2</span>  </td>
    </tr>

	</table>

  

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

// SALIDA DEL ARCHIVO 
ob_end_clean();
$pdf->Output('reporteAdministracionSO.pdf', 'I');

}
}

$factura = new imprimirReporte();
$factura -> idSI = $_GET["idSI"];
$factura -> idSAR = $_GET["idSAR"];
$factura -> idCA = $_GET["idCA"];
$factura -> traerImpresionReporte();