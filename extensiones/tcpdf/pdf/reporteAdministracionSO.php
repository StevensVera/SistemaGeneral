<?php 

session_start();

/* ==============================  CONTROLADOR INFORMACIÓN DE SOLICITUD  ============================================*/
/* == controlador INFORMACIÓN DE SOLICITUD == */
require_once "../../../controladores/solicitudes-informacion.controlador.php";
require_once "../../../controladores/solicitudes-arco.controlador.php";
require_once "../../../controladores/capacitaciones.controlador.php";
require_once "../../../controladores/administracionSO.controlador.php";

/* ===============================  MODELO INFORMACIÓN DE SOLICITUD  ================================================*/
/* === Modelo INFORMACIÓN DE SOLICITUD === */
require_once "../../../modelos/solicitudes-informacion.modelo.php";
require_once "../../../modelos/solicitudes-arco.modelo.php";
require_once "../../../modelos/capacitaciones.modelo.php";
require_once "../../../modelos/administracionSO.modelo.php";

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
public $idSAR;
public $idCA;

public function traerImpresionReporte(){
  
$SujetoObligado = $_SESSION["nombre_Informe"];
$UnidadTransparencia = $_SESSION["titular_Informe"];

//======================= INFORMACION PARA SOLICITUDES DE INFORMACIÓN ===============================

$itemSolicitudInformacion = "idSI";
$valorSolicitudInformacion = $this->idSI;

$respuestaSolicitudInformacion = ControladorSolicitudesInformes::ctrMostrarPDFSolicitudInformacion($itemSolicitudInformacion,$valorSolicitudInformacion);

$fecha = substr($respuestaSolicitudInformacion["SI_Fecha"],0,50);
$SI_Codigo_UnicoInforme_Anios = substr($respuestaSolicitudInformacion["SI_Codigo_UnicoInforme_Anios"],0,80);
$Si_Codigo_Informe_Anios = substr($respuestaSolicitudInformacion["Si_Codigo_Informe_Anios"],0,80);
$SI_TOTAL_SOLICITUDES = substr($respuestaSolicitudInformacion["SI_TOTAL_SOLICITUDES"],0,80);

//============================ INFORMACIÓN DE SOLICITUDES ARCO =======================================

$itemSolicitudArco = "idSAR";
$valorSolicitudArco = $this->idSAR;

$respuestaSolicitudesArco = ControladorSolicitudesArco::ctrMostrarPDFSolicitudesArco($itemSolicitudArco,$valorSolicitudArco);

$SA_Codigo_UnicoInforme_Anios = substr($respuestaSolicitudesArco["SA_Codigo_UnicoInforme_Anios"],0,50);
$SA_TOTAL_SOLICITUDES = substr($respuestaSolicitudesArco["SA_TOTAL_SOLICITUDES"],0,50);

//============================== INFORMACIÓN DE CAPACITACIÓN ========================================

$itemCapacitaciones = "idCA";
$valorCapacitaciones = $this->idCA;

$respuestaCapacitaciones = ControladorCapacitaciones::ctrMostrarPDFCapacitaciones($itemCapacitaciones,$valorCapacitaciones);

$CA_Codigo_UnicoInforme_Anios = substr($respuestaCapacitaciones["CA_Codigo_UnicoInforme_Anios"],0,50);
$CA_Total_Capacitacion = substr($respuestaCapacitaciones["CA_Total_Capacitacion"],0,50);

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
      		<td style="width:280px;"><span style="font-weight:bold">FECHA:</span> $fecha</td>
	   </tr>
       <tr>
      		<td style="width:425px;"></td>
      		<td style="width:280px;"><span style="font-weight:bold">ASUNTO:</span> CONSTANCIA DE ENTREGA </td>
       </tr>
	</table>


EOF;

$pdf->writeHTML($datos,false, false, false, false, '');

//NOMBRE DEL COMISIONADO EN TURNO

$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 25px; ">

		<tr>

      <td ><span style="Arial;font-size:14px;font-weight:bold">LIC. RAMÓN ALEJANDRO MARTINEZ ÁLVAREZ</span>  </td>
    </tr>

	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');


$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 5px; ">

		<tr>

      <td ><span style="Arial;font-size:14px;font-weight:bold">COMISIONADO PRESIDENTE DEL ITAI NAYARIT </span>  </td>
    </tr>

	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 5px; ">

		<tr>

      <td ><span style="Arial;font-size:14px;font-weight:bold">P R E S E N T E </span>  </td>
    </tr>

	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');


$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:14px; padding-top: 35px;" >

		<tr>

      <td style="line-height:20pt; text-align: justify;" >     El Sujeto Obligado <span style="Arial;font-size:14px;font-weight:bold">$SujetoObligado</span> hace entrega del <span style="Arial;font-size:14px;font-weight:bold">$Si_Codigo_Informe_Anios</span> al Instituto de Transparencia y Acceso a la Información Pública del Estado de Nayarit. Dando constancia su participacion y llenado de la Información respectiva, en el portal web <span style="Arial;font-size:14px;font-weight:bold">http://www.itainayarit.gob/SistemaGeneral</span>. Asi cumpliendo con las Obligaciónes de Transparencia ante el Organismo Garante de la entidad.     </td>

    </tr>

	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');


$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 10px;">

		<tr>

      <td ><span style="Arial;font-size:14px;">En la siguiente tabla se muestra los datos de entrega: </span>  </td>
      
    </tr>
    
	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

$bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:12px; padding-top: 5px;">

		<tr>

      <td ><span style="Arial;font-size:14px;"></span>  </td>
      
    </tr>
    
	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');


  $bloque1 = <<<EOD
  <table cellspacing="0" cellpadding="1" border="1">
        <tr>
        <td style="background-color:#787878;color:#000000;" WIDTH="70%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">INFORME</span> </td>
        <td style="background-color:#787878;color:#000000;" WIDTH="30%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">CANTIDAD</span></td>
      </tr>
      <tr>
        <td style="background-color:#DADADA;color:#000000;" WIDTH="70%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">$SI_Codigo_UnicoInforme_Anios</span> </td>
        <td WIDTH="30%" align="center"> <span style="font: size 8px;pt;">$SI_TOTAL_SOLICITUDES</span></td>
      </tr>
      <tr>
        <td style="background-color:#DADADA;color:#000000;" WIDTH="70%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">$SA_Codigo_UnicoInforme_Anios</span></td>
        <td WIDTH="30%" align="center"> <span style="font: size 8px;pt;">$SA_TOTAL_SOLICITUDES</span></td>
      </tr>
      <tr>
      <td style="background-color:#DADADA;color:#000000;" WIDTH="70%" align="center"> <span style="font: size 8px;pt;font-weight:bold;">$CA_Codigo_UnicoInforme_Anios</span> </td>
       <td WIDTH="30%" align="center"> <span style="font: size 8px;pt;">$CA_Total_Capacitacion</span></td>
    </tr>
  </table>
  EOD;
  
  $pdf->writeHTML($bloque1, true, false, false, false, '');

  $bloque1 = <<<EOF

  <table style="font-family: Arial;font-size:14px; padding-top: 90px;" >

		<tr>

      <td style="line-height:20pt; text-align: centrer;" ></td>

    </tr>

	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

$bloque1 = <<<EOF

<table style="font-family: Arial;font-size:14px; padding-top: 100px;" >

  <tr>

    <td style="line-height:20pt; text-align: centrer;" >_______________________________________</td>

  </tr>

</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

$bloque1 = <<<EOF

<table style="font-family: Arial;font-size:14px;" >

  <tr>

    <td style="line-height:20pt; text-align: centrer;" >$UnidadTransparencia</td>

  </tr>

</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

$bloque1 = <<<EOF

<table style="font-family: Arial;font-size:14px;" >

  <tr>

    <td style="line-height:20pt; text-align: centrer;" >Unidad de Transparencia $SujetoObligado </td>

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