<?php
    require_once "../controladores/solicitudes-informacion.controlador.php";

    require_once "../modelos/solicitudes-informacion.modelo.php";


    class AjaxSolicitudesInformacion{

        /* ===================== ACTIVAR SOLICITUD DE INFORMACION  ========================= */

        public $activaroSolicitudesInformacion;
        public $activarId;

        public function AjaxActivarSolicitudesInformacion(){

            $tabla = "solicitudes_informacion";

            $item1 = "SI_Estatus";
            $valor1 = $this->activaroSolicitudesInformacion;

            $item2 = "idSI";
            $valor2 = $this->activarId;

            $respuesta = ModeloSolicitudesInformacion::mdlActualizarEstadoSolicitudesInformacion($tabla, $item1, $valor1, $item2, $valor2);

        }
         /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

        public $validarAnios;

        public $validarInforme;

        //public $validarinformeanios;

        public function ajaxValidarIP(){

        $item1 = "SI_Anios";

        $valor1 = $this -> validarAnios;

        $item2 = "SI_Informe_Presentado";
        
        $valor2 = $this -> validarInforme;

        $item3 = "Si_Codigo_Informe_Anios";

        $valor3 = $this -> validarinformeanios;

        $respuesta = ControladorSolicitudesInformes::ctrValidarSolicitudInformacionExitente($item1, $valor1, $item2, $valor2, $item3, $valor3);

        echo json_encode($respuesta);

        }
    

    }


    /* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

    if(isset( $_POST["validarinformeanios"])){

	    $valida = new AjaxSolicitudesInformacion();
	    $valida -> validarinformeanios = $_POST["validarinformeanios"];
	    $valida -> ajaxValidarIP();

    }

    /* ============================ ACTIVAR SOLICITUD DE INFORMACION ============================ */

    if (isset($_POST["activaroSolicitudesInformacion"])) {
    
        $activaroSolicitudesInformacion = new AjaxSolicitudesInformacion();
        $activaroSolicitudesInformacion -> activaroSolicitudesInformacion = $_POST["activaroSolicitudesInformacion"];
        $activaroSolicitudesInformacion -> activarId = $_POST["activarId"];
        $activaroSolicitudesInformacion -> AjaxActivarSolicitudesInformacion();
    }    


