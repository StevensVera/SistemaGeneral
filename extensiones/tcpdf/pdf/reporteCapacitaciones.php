<?php 

/*
require_once "../../../controladores/revisionrecursos.controlador.php";
require_once "../../../controladores/tipoexpediente.controlador.php";
require_once "../../../controladores/comisionado.controlador.php";
require_once "../../../controladores/estadoprocesal.controlador.php";
require_once "../../../controladores/causaterminacion.controlador.php";

require_once "../../../modelos/revision.modelo.php";
require_once "../../../modelos/tipoexpediente.modelo.php";
require_once "../../../modelos/comisionado.modelos.php";
require_once "../../../modelos/estadoprocesal.modelo.php";
require_once "../../../modelos/causaterminacion.modelo.php";
*/

/* ==============================  CONTROLADOR USUARIOS  ============================================*/
/* == controlador USUARIO == */
require_once "../../../controladores/capacitaciones.controlador.php";

/* ===============================  MODELO USUARIOS  ================================================*/
/* === Modelo USUARIO === */
require_once "../../../modelos/capacitaciones.modelo.php";

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

public $idCA;

public function traerImpresionReporte(){

//TRAEMOS LA INFORMACION DE LA REVISION


$itemCapacitaciones = "idCA";
$valorCapacitaciones = $this->idCA;

$respuestaCapacitaciones = ControladorCapacitaciones::ctrMostrarPDFCapacitaciones($itemCapacitaciones,$valorCapacitaciones);

/* =============================== PARTE SUPERIOR ==================================== */
$sujetoObligado = substr($respuestaCapacitaciones["CA_Nombre_Sujeto_Obligado"],0,150);
$InformeEntrega = substr($respuestaCapacitaciones["CA_Informe_Presentado"],0,50);
$Año = substr($respuestaCapacitaciones["CA_Anios"],0,50);
$Capacitaciones = substr($respuestaCapacitaciones["CA_Total_Capacitacion"],0,50);
/* ==================  Solicitudes de Acceso a la Información  ======================= */
$CapacitacionesRecibidas = substr($respuestaCapacitaciones["CA_Capacitaciones_Recibidas"],0,50);
$CapacitacionesOrtogadas = substr($respuestaCapacitaciones["CA_Capacitaciones_Ortogadas"],0,50);
$CapacitacionesServidoresPublicos = substr($respuestaCapacitaciones["CA_Total_Servidores_Publicos"],0,50);


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

  $tbl = <<<EOD
  <table cellspacing="0" cellpadding="1" border="1">
    <tr>
      <td style="background-color:#DADADA;color:#000000;" WIDTH="30%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">Sujeto Obligados</span> </td>
      <td WIDTH="70%" align="center"> <span style="font: size 8px;pt;">$sujetoObligado</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" WIDTH="30%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">Entrega</span> </td>
      <td WIDTH="70%" align="center"> <span style="font: size 8px;pt;">$InformeEntrega</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" WIDTH="30%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">Año</span> </td>
      <td WIDTH="70%" align="center"> <span style="font: size 8px;pt;">$Año</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" WIDTH="30%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">Total de Capacitaciones</span> </td>
      <td WIDTH="70%" align="center"> <span style="font: size 8px;pt;">$Capacitaciones</span></td>
   </tr>
  </table>  

  EOD;

  $pdf->writeHTML($tbl, true, false, false, false, '');

  $tbl = <<<EOD
  <table cellspacing="0" cellpadding="1" border="1">
    <tr>
      <td colspan="2" style="background-color:#787878;color:#000000;"  HEIGHT="50" align="center"> <span style="font: size 8px;pt;font-weight:bold;"><br />CAPACITACIONES</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Capacitaciones Recibidas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CapacitacionesRecibidas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Capacitaciones Ortogadas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CapacitacionesOrtogadas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Total Servidores Publicos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CapacitacionesServidoresPublicos</span></td>
    </tr>
  </table>  

  EOD;
  
  $pdf->writeHTML($tbl, true, false, false, false, '');


// SALIDA DEL ARCHIVO 

ob_end_clean();
$pdf->Output('reporteUsuario.pdf', 'I');

}
}

$factura = new imprimirReporte();
$factura -> idCA = $_GET["idCA"];
$factura -> traerImpresionReporte();