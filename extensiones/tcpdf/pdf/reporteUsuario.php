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
require_once "../../../controladores/usuarios.controlador.php";

/* ===============================  MODELO USUARIOS  ================================================*/
/* === Modelo USUARIO === */
require_once "../../../modelos/usuarios.modelo.php";

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

public $id;

public function traerImpresionReporte(){

//TRAEMOS LA INFORMACION DE LA REVISION


$itemUsuario = "id";
$valorUsuario = $this->id;

$respuestaUsuario = ControladorUsuariosInformes::ctrMostrarPDFUsuario($itemUsuario,$valorUsuario);

$fecha = substr($respuestaUsuario['fecha_informe'],0,20);
$codigo = substr($respuestaUsuario['codigo'],0,14);
$tipoSujetoObligado = substr($respuestaUsuario['tipo_so'],0,80);
$sujetoObligado = substr($respuestaUsuario['nombre_Informe'],0,150);
$titularSO = substr($respuestaUsuario['titular_Informe'],0,50);
$UsuarioUT = substr($respuestaUsuario['usuario_Informe'],0,30);



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
      		<td style="width:280px;"><span style="font-weight:bold">ASUNTO:</span> Reporte Sujeto Obligado </td>
       </tr>
	</table>


EOF;

$pdf->writeHTML($datos,false, false, false, false, '');


/*================================  CODIGO DEL SUJETO OBLIGADO ==============================*/

$bloque1 = <<<EOF

	<table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>
      		<td style="width:650px;"><span style="font-weight:bold">CODIGO DEL SUJETO OBLIGADO:</span> $codigo </td>

       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');

/*============================== TIPO DE SUJETO OBLIGADO  =================================*/

$bloque1 = <<<EOF

<table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>
      	
      		<td style="width:650px;"><span style="font-weight:bold">TIPO DE SUJETO OBLIGADO:</span> $tipoSujetoObligado </td>

       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque1,false, false, false, false, '');


/*===============================   SUJETO OBLIGADO   ======================================*/

$bloque2 = <<<EOF

	<table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>
      		<td style="width:650px;"><span style="font-weight:bold">SUJETO OBLIGADO:</span> $sujetoObligado </td>
      		

       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque2,false, false, false, false, '');

/*=============================  TITULAR DE TRANSPARENCIA  =================================*/

$bloque3 = <<<EOF

	<table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>

      		<td style="width:650px;"><span style="font-weight:bold">TITULAR DE TRANSPARENCIA:</span> $titularSO  </td>

       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque3,false, false, false, false, '');


/*=========================== USUARIO DE TITULAR DE TRANSPARENCIA  ==============================*/

$bloque3 = <<<EOF

	<table style="font-family: Arial;font-size:12px; padding-top: 25px; padding-left: 30px;">

		<tr>

      		<td style="width:650px;"><span style="font-weight:bold">USUARIO U.T:</span> $UsuarioUT	</td>

       </tr>
	</table>

EOF;

$pdf->writeHTML($bloque3,false, false, false, false, '');



// SALIDA DEL ARCHIVO 

$pdf->Output('reporteUsuario.pdf', 'I');

}
}

$factura = new imprimirReporte();
$factura -> id = $_GET["id"];
$factura -> traerImpresionReporte();


