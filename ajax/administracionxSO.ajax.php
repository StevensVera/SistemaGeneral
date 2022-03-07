<?php

require_once "../controladores/administracionGeneralSO.controlador.php";

require_once "../modelos/administracionGeneralSO.modelo.php";

class AjaxAdministracionxSO{


    /* ==================== ACTIVAR USUARIO ========================= */

    public $activarAdministracionxSOSI;
    public $activarIdSI;

    public function AjaxActivarAdministracionxSO(){

        $tabla = "solicitudes_informacion";

        $item1 = "SI_Calificacion";
        $valor1 = $this->activarAdministracionxSOSI;

        $item2 = "idSI";
        $valor2 = $this->activarIdSI;

        $respuesta = ModeloAdministracionGeneralSO::mdlActualizarEstadoAdministradorxSO($tabla, $item1, $valor1, $item2, $valor2);


    } // End function AjaxActivarUsuario

    

} // End class AjaxUsuario

/* ==================== ACTIVAR USUARIO ========================= */

if (isset($_POST["activarAdministracionxSOSI"])) {
    
    $activarAdministracionxSOSI = new AjaxAdministracionxSO();
    $activarAdministracionxSOSI -> activarAdministracionxSOSI = $_POST["activarAdministracionxSOSI"];
    $activarAdministracionxSOSI -> activarIdSI = $_POST["activarIdSI"];
    $activarAdministracionxSOSI -> AjaxActivarAdministracionxSO();
}
