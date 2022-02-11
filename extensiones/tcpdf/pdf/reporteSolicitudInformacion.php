<?php 

/* ==============================  CONTROLADOR INFORMACIÓN DE SOLICITUD  ============================================*/
/* == controlador INFORMACIÓN DE SOLICITUD == */
require_once "../../../controladores/solicitudes-informacion.controlador.php";

/* ===============================  MODELO INFORMACIÓN DE SOLICITUD  ================================================*/
/* === Modelo INFORMACIÓN DE SOLICITUD === */
require_once "../../../modelos/solicitudes-informacion.modelo.php";

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

$respuestaSolicitudInformacion = ControladorSolicitudesInformes::ctrMostrarPDFSolicitudInformacion($itemSolicitudInformacion,$valorSolicitudInformacion);

/* =============================== PARTE SUPERIOR ==================================== */

$InformeEntrega = substr($respuestaSolicitudInformacion["SI_Informe_Presentado"],0,50);
$Año = substr($respuestaSolicitudInformacion["SI_Anios"],0,50);
/* ==================  Solicitudes de Acceso a la Información  ====================== */
               // ----------- Medio de Presentación -----------//
$PersonalEscrito = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_Personal_Escrito"],0,50);
$CorreoElectrónico = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_Correo_Electronico"],0,50);
$SistemaInfomex = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_Sistema_Infomex"],0,50);
$PlataformaTransparencia = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_PNT"],0,50);
$NodisponibleMP = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_No_disponible"],0,50);
$TotalMP = substr($respuestaSolicitudInformacion["SI_Medio_Presentacion_Suma_Total"],0,50);
               // ----------- Tipo de Solicitante ----------//
$PersonaFisica = substr($respuestaSolicitudInformacion["SI_Tipo_Solicitud_Persona_Fisica"],0,50);
$Personamoral = substr($respuestaSolicitudInformacion["SI_Tipo_Solicitud_Persona_Moral"],0,50);
$NodisponibleTS = substr($respuestaSolicitudInformacion["SI_Tipo_Solicitud_No_Disponible"],0,50);             
$TotalTS = substr($respuestaSolicitudInformacion["SI_Tipo_Solicitud_Suma_Total"],0,50);
               // ----------- Género del Solicitante ----------//
$Femenino = substr($respuestaSolicitudInformacion["SI_Genero_Solicitante_Femenino"],0,50);  
$Masculino = substr($respuestaSolicitudInformacion["SI_Genero_Solicitante_Masculino"],0,50);
$Anonimo = substr($respuestaSolicitudInformacion["SI_Genero_Solicitante_Anonimo"],0,50); 
$NoDisponibleGS = substr($respuestaSolicitudInformacion["SI_Genero_Solicitante_No_Disponible"],0,50); 
$TotalGS = substr($respuestaSolicitudInformacion["SI_Genero_Solicitante_Suma_Total"],0,50);  
               // ----------- Información Solicitada ----------//
$ObligacionesTransparencia = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_Obligacion_Transparencia"],0,50);
$Reservada = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_Reservada"],0,50);
$Confidencial = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_Confidencial"],0,50);                
$OtroIS = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_Otro"],0,50);
$NoDisponibleIS = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_No_Disponible"],0,50);
$TotalIS = substr($respuestaSolicitudInformacion["SI_Informacion_Solicitada_Suma_Total"],0,50);
                     // ----------- Tramites ----------//
$SolicitudesConcluidas = substr($respuestaSolicitudInformacion["SI_Tramites_Concluidas"],0,50);
$SolicitudesPendientes = substr($respuestaSolicitudInformacion["SI_Tramites_Pendientes"],0,50);
$NodisponiblesT = substr($respuestaSolicitudInformacion["SI_Tramites_No_Disponible"],0,50);
$SumaTotalTramites = substr($respuestaSolicitudInformacion["SI_Tramites_Suma_Total"],0,50);
               // ----------- Modalidad de Respuesta ----------//
$MediosElectrónicos = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Medios_Electronicos"],0,50);
$CopiaSimple = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Copia_Simple"],0,50); 
$ConsultaDirecta = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Consulta_Directa"],0,50); 
$CopiaCertificada = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Copia_Certificada"],0,50);
$OtroMR = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Otro"],0,50);                 
$NodisponiblesMR = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_No_Disponible"],0,50);
$SumaTotalMR = substr($respuestaSolicitudInformacion["SI_Modalidad_Respuesta_Suma_Total"],0,50); 
               // ---------- Obligaciones Solicitadas ----------//
$Marconormativo = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Marco_Normativo"],0,50);
$EstructuraOrgánica = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Estructura_Organica"],0,50); 
$FuncionesCadaArea = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Funciones_Area"],0,50);
$MetasObjetivos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Metas_Objetivos"],0,50);
$IndicadoresRelacionados = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Indicadores_Relacionados"],0,50);
$IndicadoresPermitan = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas"],0,50);
$DirectorioServidoresPublicos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico"],0,50);
$Remuneracionespersonal = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Remuneraciones_Personal"],0,50);
$GastosRepresentación = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos"],0,50);
$PlazasBase = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes"],0,50);
$ContratacionServicios = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Contratacion_Servicios"],0,50);
$VersionesPublicas = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Versiones_Publicas"],0,50);
$DomicilioDirección = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT"],0,50);
$ConvocatoriaConcursos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo"],0,50);
$InformacionProgramasSubsidios = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios"],0,50);
$CondicionesGeneralesTrabajo = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Condiciones_Trabajos"],0,50);
$RecursosPublicos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Recursos_Publicos"],0,50);
$InformacionCurricular = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Informacion_Curricular"],0,50);
$ServidoresPublicos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados"],0,50);
$ServiciosOfrecen = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Servicios_Ofrecen"],0,50);
$TramitesRequisitos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos"],0,50);
$PresupuestoAsignado = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Presupuesto_Asignado"],0,50);
$InformacionRelativa = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Informacion_Relativa"],0,50);
$MontosDesignadosComunicacion = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Montos_Designados"],0,50);
$Informesresultados = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias"],0,50);
$ResultadosDictaminación = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Resultados_Dictaminacion"],0,50);
$MontosCriteriosConvocatorias = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias"],0,50);
$ConcesionesContratosConvenios = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios"],0,50);
$ResultadosProcesos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones"],0,50);
$InformesGeneren = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Infomes_Generen_SO"],0,50);
$EstadisticasGeneren = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento"],0,50);
$AvancesProgramaticos  = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Avances_Programaticos"],0,50);
$PadrónProveedores = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Padron_Proveedores"],0,50);
$Convenioscoordinación = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Convenios_Coordinacion"],0,50);
$InventarioBienesMuebles = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles"],0,50);
$RecomendacionesEmitidas = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas"],0,50);
$ResolucionesLaudos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Resoluciones_Laudos"],0,50);
$MecanismosParticipación = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Mecanismo_Participacion"],0,50);
$ProgramasOfrecidos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Programas_Ofrecidos"],0,50);
$Actasresoluciones = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Actas_Resoluciones"],0,50);
$EvaluacionesEncuentas = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas"],0,50);
$EstudiosFinanciados = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Estudios_Financiados"],0,50);
$ListadoJubilados = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados"],0,50);
$IngresosRecibidos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Ingreso_Recibido"],0,50);
$DonacionesHechas = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Donaciones_Hechas"],0,50);
$CatalogosDisposicion = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Catalogos_Disposicion"],0,50);
$ActasSesiones = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias"],0,50);
$ListadoSolicitudes = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores"],0,50);
$GacetasMunicipales = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Gacetas_Municipales"],0,50);
$PlanDesarrollo = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal"],0,50);
$CondicionesGenerales = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo"],0,50);
$RecursosPublicosEconómicos = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos"],0,50);
$PlanDesarrollo = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano"],0,50);
$ProgramaOrdenamiento = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Programa_Ordenamiento"],0,50);
$ProgramaUso = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Programa_Uso_Suelo"],0,50);
$TiposUso = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo"],0,50);
$LicenciaUso = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo"],0,50);
$LicenciasConstrucción = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Licencias_Construccion"],0,50);
$Montosdesignados = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Monto_Designados"],0,50);
$ActasCabildo = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Actas_Cabildo"],0,50);
$PresupuestoSostenible = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible"],0,50);
$EvaluacionesLDF = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Evaluaciones_LDF"],0,50);
$Subsidios = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Subsidios"],0,50);
$OtroOS = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Otros"],0,50);
$NodisponiblesOS = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_No_Disponibles"],0,50);
$SumaTotalOS = substr($respuestaSolicitudInformacion["SI_Obligaciones_Solicitadas_Suma_Total"],0,50);
              // ----------Sentido en que se emite la Respuesta ----------//
$Informaciontotal = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Informacion"],0,50);
$Informacionparcial = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Informacion_Parcial"],0,50);
$NegadaClasificación = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Negada_Clasificacion"],0,50);
$InexistenciaInformacion = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Inexistencia_Informacion"],0,50);
$Mixta = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Mixta"],0,50);
$NoAclarada = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_No_Aclarada"],0,50);
$Orientada = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Orientada"],0,50);
$EnTramite = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_En_Tramite"],0,50);
$Improcedente = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Improcedente"],0,50);
$OtrosSR = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Otro"],0,50);
$NodisponiblesSR = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_No_Disponible"],0,50);
$SumaTotalSR = substr($respuestaSolicitudInformacion["SI_Sentido_Respuesta_Suma_Total"],0,50);


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
      <td style="background-color:#787878;color:#000000;" WIDTH="60%" HEIGHT="50" align="center"> <span style="font: size 8px;pt;font-weight:bold;"><br />Solicitudes de Acceso a la Informacion</span> </td>
      <td style="background-color:#787878;color:#000000;" WIDTH="40%" HEIGHT="50" align="center"> <span style="font: size 8px;pt;font-weight:bold;"><br />Solicitudes</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Medio de Presentación</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalMP</span></td>
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
      <td rowspan="1"> <span style="font: size 8px;pt;">Sistema Infomex</span></td>
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
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalTS</span></td>
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
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$TotalIS</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Obligaciones de Transparencia</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ObligacionesTransparencia</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Reservada</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Reservada</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Confidencial</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Confidencial</span></td>
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
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$SumaTotalTramites</span></td>
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
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span> </td>
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
      <td rowspan="1"> <span style="font: size 8px;pt;">No Disponible</span></td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponiblesMR</span></td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="2"> <span style="font: size 8px;pt;font-weight:bold;"><br />Obligaciones Solicitadas</span> </td>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">Total</span> </td>
    </tr>
    <tr>
      <td style="background-color:#DADADA;color:#000000;" align="center" rowspan="1"> <span style="font: size 8px;pt;font-weight:bold;">$SumaTotalOS</span> </td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Marco Normativo</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Marconormativo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Estructura Orgánica</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EstructuraOrgánica</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Sistema Infomex / PNT</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$FuncionesCadaArea</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Funciones de Cada Área</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$MetasObjetivos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Metas y Objetivos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$IndicadoresRelacionados</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Indicadores Relacionados con Temas de Interés Público o Trascendencia Social</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$IndicadoresPermitan</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Indicadores que Permitan Rendir Cuentas de sus Objetivos y Resultados</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$DirectorioServidoresPublicos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Directorio de Servidores Públicos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Remuneracionespersonal</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Remuneraciones del personal</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$GastosRepresentación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Gastos de Representación y Víaticos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PlazasBase</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Plazas de Base, Confianza y/o Plazas Vacantes</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ContratacionServicios</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Contratacion de Servicios Profesionales por Honorarios</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$VersionesPublicas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Domicilio y Dirección Electronica de la Unidad de Transparencia</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$DomicilioDirección</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Convocatoria a Concursos para Ocupar Cargos Públicos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ConvocatoriaConcursos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informacion de los Programas de Subsidios, Estimulos y Apoyos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InformacionProgramasSubsidios</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Condiciones Generales de Trabajo, Contratos o Convenios que Regules las Relaciones Laborales del Personal de Base y/o Confianza</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CondicionesGeneralesTrabajo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Recursos Públicos Económicos en Especie o Donativos que sean Entregados a los Sindicatos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$RecursosPublicos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Información curricular de los servidores públicos	</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InformacionCurricular</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Servidores Públicos Sancionados	</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ServidoresPublicos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Servicios que se Ofrecen</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ServiciosOfrecen</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Tramites, Requisitos y Formatos que se Ofrecen</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$TramitesRequisitos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Presupuesto Asignado e Informes del Ejercicio Trimestral del Gasto</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PresupuestoAsignado</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informacion Relativa a la Deuda Pública</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InformacionRelativa</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Montos designados a comunicación social y publicidad</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$MontosDesignadosComunicacion</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informes de resultados de auditorias</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Informesresultados</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Resultados de Dictaminación de Estados Financieros</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ResultadosDictaminación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Montos, Criterios, Convocatorias del Listado de Personas Fisicas o Morales que Tengan Asignado Recursos Públicos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$MontosCriteriosConvocatorias</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Concesiones, Contratos, Convenios, Permisos, Licencias o Autorizaciones Otorgados</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ConcesionesContratosConvenios</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Resultados de los Procesos de Adjudicaciones Directas, Invitaciones Restringidad y Licitaciones</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ResultadosProcesos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Informes que Generen los Sujetos Obligados</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InformesGeneren</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Estadisticas que Generen en Cumplimiento de sus Facultades, Competencias o Funciones</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EstadisticasGeneren</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Avances Prográmaticos o Presupuestales, Balances Generales y su Estado Financiero</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$AvancesProgramaticos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Padrón de Proveedores y Contratistas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PadrónProveedores</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Convenios de coordinación de concertación con los sectores social y privado</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Convenioscoordinación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Inventario de Bienes Muebles e Inmuebles en Posesión y Propiedad - Obligaciones Solicitadas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$InventarioBienesMuebles</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Recomendaciones Emitidas por Organismos de Derechos Humanos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$RecomendacionesEmitidas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Resoluciones y Laudos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ResolucionesLaudos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Mecanismos de Participación Ciudadana</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$MecanismosParticipación</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Programas Ofrecidos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ProgramasOfrecidos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Actas y resoluciones del Comité de Transparencia</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Actasresoluciones</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Evaluaciones y Encuentas Realizadas por los Sujetos Obligados a Programas Financiados con Recurso Público</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EvaluacionesEncuentas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Estudios Financiados con Recurso Público</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EstudiosFinanciados</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Listado de Jubilados y Pensionados y los Montos que Reciben</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ListadoJubilados</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Ingresos Recibidos por Cualquier Concepto Señalando el Nombre de Quines lo Reciben, Administran y Ejercen</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$IngresosRecibidos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Donaciones Hechas a Terceros en Dinero o en Especie</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$DonacionesHechas</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Catálogos de Disposición y Guía de Archivo Documental</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CatalogosDisposicion</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Actas de Sesiones Ordinarias y Estraordinarias de los Conejos Consultivos, así como Opiniones y Recomendaciones que Emitan</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ActasSesiones</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Listado de Solicitudes y Proveedores de Servicios o Aplicaciones de Internet para la Intervención de Comunicaciones Privadas</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ListadoSolicitudes</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Gacetas Municipales</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$GacetasMunicipales</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Plan de Desarrollo Municipal</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PlanDesarrollo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Condiciones Generales de Trabajo, Contratos o Convenios que Regules las Relaciones Laborales del Personal de Base y/o Confianza</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$CondicionesGenerales</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Recursos Públicos Económicos en Especie o Donativos que sean Entregados a los Sindicatos</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$RecursosPublicosEconómicos</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Plan de Desarrollo Urbano</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PlanDesarrollo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Programa de Ordenamiento Territorial</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ProgramaOrdenamiento</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Programa de Uso de Suelo</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ProgramaUso</span></td>
    </tr>
    <tr>
       <td rowspan="1"> <span style="font: size 8px;pt;">Tipos de Uso de Suelo</span> </td>
       <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$TiposUso</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Licencia de Uso de Suelo</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$LicenciaUso</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Licencias de Construcción</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$LicenciasConstrucción</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Montos designados a comunicación social y publicidad</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Montosdesignados</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Actas de Cabildo</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$ActasCabildo</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Presupuesto Sostenible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$PresupuestoSostenible</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Evaluaciones LDF</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$EvaluacionesLDF</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Subsidios</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$Subsidios</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">Otro</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$OtroOS</span></td>
    </tr>
    <tr>
      <td rowspan="1"> <span style="font: size 8px;pt;">No disponible</span> </td>
      <td rowspan="1" align="center"> <span style="font: size 8px;pt;">$NodisponiblesOS</span></td>
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
ob_end_clean();
$pdf->Output('reporteUsuario.pdf', 'I');

}
}

$factura = new imprimirReporte();
$factura -> idSI = $_GET["idSI"];
$factura -> traerImpresionReporte();