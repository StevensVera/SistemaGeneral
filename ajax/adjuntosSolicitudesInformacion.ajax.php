<?php 
//================== CONTROLADORES =============================

// CONTROLADOR - INFORMACION DE SOLICITUDES
require_once "../controladores/solicitudes-informacion.controlador.php";

// MODELO - INFORMACION DE SOLICITUDES
require_once "../modelos/solicitudes-informacion.modelo.php";

class AjaxSolicitudesInformacion{

   /*=========  EDITAR ADJUNTOS - MOSTRAR - ==========*/ 

   public $idSolicitudesInformacion;

   public function AjaxSolicitudesInformacionMostrar(){

    $item = "idSI";
      
    $valor = $this->idSolicitudesInformacion;

    $respuesta = ControladorSolicitudesInformes::ctrMostrarSolicitudInformaticaEditar($item, $valor);
  
    echo json_encode($respuesta);


   }

}

/*=============================================
EDITAR ADJUNTOS
=============================================*/ 
if(isset($_POST["idSolicitudesInformacion"])){

   $adjuntos = new AjaxSolicitudesInformacion();
   $adjuntos -> idSolicitudesInformacion = $_POST["idSolicitudesInformacion"];
   $adjuntos -> AjaxSolicitudesInformacionMostrar();
 }
 