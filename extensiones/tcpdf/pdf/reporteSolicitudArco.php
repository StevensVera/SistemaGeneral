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
require_once "../../../controladores/solicitudes-arco.controlador.php";

/* ===============================  MODELO USUARIOS  ================================================*/
/* === Modelo USUARIO === */
require_once "../../../modelos/solicitudes-arco.modelo.php";

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

public $idSAR;

public function traerImpresionReporte(){

//TRAEMOS LA INFORMACION DE LA REVISION


$itemSolicitudArco = "idSAR";
$valorSolicitudArco = $this->idSAR;

$respuestaSolicitudesArco = ControladorSolicitudesArco::ctrMostrarPDFSolicitudesArco($itemSolicitudArco,$valorSolicitudArco);

/* =============================== PARTE SUPERIOR ==================================== */
$sujetoObligado = substr($respuestaSolicitudesArco["SA_Nombre_Sujeto_Obligado"],0,150);
$InformeEntrega = substr($respuestaSolicitudesArco["SA_Informe_Presentado"],0,50);
$Año = substr($respuestaSolicitudesArco["SA_Anios"],0,50);
/* ==================  Solicitudes de Acceso a la Información  ====================== */
               // ----------- Medio de Presentación -----------//
$PersonalEscrito = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_Personal_Escrito"],0,50);
$CorreoElectrónico = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_Correo_Electronico"],0,50);
$SistemaInfomex = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_Sistema_Infomex"],0,50);
$PlataformaTransparencia = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_PNT"],0,50);
$NodisponibleMP = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_No_disponible"],0,50);
$TotalMP = substr($respuestaSolicitudesArco["SA_Medio_Presentacion_Suma_Total"],0,50);
               // ----------- Tipo de Solicitante ----------//
$PersonaFisica = substr($respuestaSolicitudesArco["SA_Tipo_Solicitante_Persona_Fisica"],0,50);
$Personamoral = substr($respuestaSolicitudesArco["SA_Tipo_Solicitante_Persona_Moral"],0,50);
$NodisponibleTS = substr($respuestaSolicitudesArco["SA_Tipo_Solicitante_No_Disponible"],0,50);             
$TotalTS = substr($respuestaSolicitudesArco["SA_Tipo_Solicitante_Suma_Total"],0,50);
               // ----------- Género del Solicitante ----------//
$Femenino = substr($respuestaSolicitudesArco["SA_Genero_Solicitante_Femenino"],0,50);  
$Masculino = substr($respuestaSolicitudesArco["SA_Genero_Solicitante_Masculino"],0,50);
$Anonimo = substr($respuestaSolicitudesArco["SA_Genero_Solicitante_Anonimo"],0,50); 
$NoDisponibleGS = substr($respuestaSolicitudesArco["SA_Genero_Solicitante_No_Disponible"],0,50); 
$TotalGS = substr($respuestaSolicitudesArco["SA_Genero_Solicitante_Suma_Total"],0,50);
               // ----------- Información Solicitada ----------//
$Acceso = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Acceso"],0,50);
$Rectificacion = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Rectificacion"],0,50);
$Oposición = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Oposicion"],0,50);                
$Cancelación = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Cancelacion"],0,50);
$OtroIS = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Otro"],0,50);
$NoDisponibleIS = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_No_Disponible"],0,50);
$TotalIS = substr($respuestaSolicitudesArco["SA_Informacion_Solicitada_Suma_Total"],0,50);
                   // ----------- Tramites ----------//
$SolicitudesConcluidas = substr($respuestaSolicitudesArco["SA_Tramites_Concluidas"],0,50);
$SolicitudesPendientes = substr($respuestaSolicitudesArco["SA_Tramites_Pendientes"],0,50);
$NodisponiblesT = substr($respuestaSolicitudesArco["SA_Tramites_No_Disponible"],0,50);
$SumaTotalTramites = substr($respuestaSolicitudesArco["SA_Tramites_Suma_Total"],0,50);
               // ----------- Modalidad de Respuesta ----------//
$MediosElectrónicos = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Medios_Electronicos"],0,50);
$CopiaSimple = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Copia_Simple"],0,50); 
$ConsultaDirecta = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Consulta_Directa"],0,50); 
$CopiaCertificada = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Copia_Certificada"],0,50);
$OtroMR = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Otro"],0,50);                 
$NodisponiblesMR = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_No_Disponible"],0,50);
$SumaTotalMR = substr($respuestaSolicitudesArco["SA_Modalidad_Respuesta_Suma_Total"],0,50);
              // ----------Sentido en que se emite la Respuesta ----------//
$Informaciontotal = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Informacion"],0,50);
$Informacionparcial = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Informacion_Parcial"],0,50);
$NegadaClasificación = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Negada_Clasificacion"],0,50);
$InexistenciaInformacion = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Inexistencia_Informacion"],0,50);
$Mixta = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Mixta"],0,50);
$NoAclarada = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_No_Aclarada"],0,50);
$Orientada = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Orientada"],0,50);
$EnTramite = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_En_Tramite"],0,50);
$Improcedente = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Improcedente"],0,50);
$OtrosSR = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Otros"],0,50);
$NodisponiblesSR = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_No_Disponible"],0,50);
$SumaTotalSR = substr($respuestaSolicitudesArco["SA_Sentido_Respuesta_Suma_Total"],0,50);


/*

$fecha = substr($respuestaUsuario['fecha_informe'],0,20);
$codigo = substr($respuestaUsuario['codigo'],0,14);
$tipoSujetoObligado = substr($respuestaUsuario['tipo_so'],0,80);
$sujetoObligado = substr($respuestaUsuario['nombre_Informe'],0,150);
$titularSO = substr($respuestaUsuario['titular_Informe'],0,50);
$UsuarioUT = substr($respuestaUsuario['usuario_Informe'],0,30);

*/

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
  </table>

  EOD;
  
  $pdf->writeHTML($tbl, true, false, false, false, '');

  $tbl = <<<EOD
  <table cellspacing="0" cellpadding="1" border="1">
    <tr>
      <td style="background-color:#787878;color:#000000;" WIDTH="60%" HEIGHT="50" align="center"> <span style="font: size 8px;pt;font-weight:bold;"><br />Solicitudes ARCO</span> </td>
      <td style="background-color:#787878;color:#000000;" WIDTH="40%" HEIGHT="50" align="center"> <span style="font: size 8px;pt;font-weight:bold;"><br />Solicitudes</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Medio de Presentación</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
        <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalMP</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Personal / Escrito</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PersonalEscrito</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Correo Electrónico</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CorreoElectrónico</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Sistema Infomex</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$SistemaInfomex</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Plataforma Nacional de Transparencia</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PlataformaTransparencia</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponibleMP</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Tipo de Solicitante</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalTS</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Persona Fisica</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PersonaFisica</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Persona Moral</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Personamoral</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponibleTS</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Género del Solicitante</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalGS</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Femenino</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Femenino</span></td>
    </tr>
    <tr>
    <td rowspan="1"> <span style="font: size 8px;pt;">Masculino</span> </td>
    <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Masculino</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Anonimo</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Anonimo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NoDisponibleGS</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Información Solicitada</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
       <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalIS</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Acceso</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Acceso</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Rectificación</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Rectificacion</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Oposición</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Oposición</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Cancelación</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Cancelación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Otro</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$OtroIS</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NoDisponibleIS</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Tramites</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$SumaTotalTramites</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Tramite Concluidas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$SolicitudesConcluidas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Tramites Pendientes</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$SolicitudesPendientes</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponibles</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponiblesT</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Modalidad de Respuesta</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$SumaTotalMR</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Medios electrónicos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$MediosElectrónicos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Copia simple</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CopiaSimple</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Consulta Directa</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ConsultaDirecta</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Copia certificada</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CopiaCertificada</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Otro</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$OtroMR</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponiblesMR</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Sentido en que se emite la Respuesta</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$SumaTotalSR</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informacion total</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Informaciontotal</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informacion parcial</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Informacionparcial</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Negada por Clasificación</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NegadaClasificación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Inexistencia de la Informacion</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InexistenciaInformacion</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Mixta</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Mixta</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No Aclarada</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NoAclarada</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Orientada</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Orientada</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">En Tramite</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EnTramite</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Improcedente</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Improcedente</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Otros</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$OtrosSR</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponiblesSR</span></td>
    </tr>
  </table>

  EOD;
  
  $pdf->writeHTML($tbl, true, false, false, false, '');


// SALIDA DEL ARCHIVO 

$pdf->Output('reporteUsuario.pdf', 'I');

}
}

$factura = new imprimirReporte();
$factura -> idSAR = $_GET["idSAR"];
$factura -> traerImpresionReporte();