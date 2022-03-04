<?php
//====================== CONTROLADORES ================*/
// CONTROLADORES
require_once "../controladores/administracionGeneralSO.controlador.php";

//MODELOS
require_once "../modelos/administracionGeneralSO.modelo.php";


class AjaxAdministracionGeneralSO{

    /*======= EDITAR CAPACITACIONES - MOSTRAR ==========*/

    public $idAdminstracionSOSI;
    public $idAdminstracionSOSA;
    public $idAdminstracionSOCA;

    public function AjaxAdministracionGeneralSOMostrar(){

        // SOLICITUDES DE INFORMACIÓN
        $Obtener_SI_Codigo_Tipo_Informe_Anios = "SI_Codigo_Tipo_Informe_Anios";
        $Obtener_SI_Estatus = "SI_Estatus";
        $Obtener_SI_Codigo_UnicoInforme_Anios = "SI_Codigo_UnicoInforme_Anios";
        $Obtener_Si_Codigo_SO = "Si_Codigo_SO";
        // SOLICITUDES DE ARCO
        $Obtener_SA_Codigo_Tipo_Informe_Anios = "SA_Codigo_Tipo_Informe_Anios";
        $Obtener_SA_Estatus = "SA_Estatus";
        // SOLICITUDES DE CAPACITACIONES
        $Obtener_CA_Codigo_Tipo_Informe_Anios = "CA_Codigo_Tipo_Informe_Anios";
        $Obtener_CA_Estatus = "CA_Estatus";


        $itemSI   = "idSI";
        $valorSI = $this->idAdminstracionSOSI;

        /*
        $itemSA   = "idSAR";
        $valorSA = $this->idAdminstracionSOSA;

        $itemCA   = "idCA";
        $valorCA = $this->idAdminstracionSOCA;
        */

        $respuesta = ControladorAdministracionGeneralSO::ctrMostrarAdministracionGeneralSO($itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus);

        echo json_encode($respuesta);

    } // End AjaxCapacitaciones

}// End Capacitaciones

/*============ MOSTRAR - EDITAR REGISTROS - ============ */

if(isset($_POST["idAdminstracionSOSI"])  ){

    $adjuntos = new AjaxAdministracionGeneralSO();
    $adjuntos -> idAdminstracionSOSI = $_POST["idAdminstracionSOSI"];

    $adjuntos -> AjaxAdministracionGeneralSOMostrar();
  }
  