<?php
//====================== CONTROLADORES ================*/
// CONTROLADOR - CAPACITACIONES
require_once "../controladores/capacitaciones.controlador.php";

//MODELO - CAPACITACIONES
require_once "../modelos/capacitaciones.modelo.php";


class AjaxCapacitaciones{

    /*======= EDITAR CAPACITACIONES - MOSTRAR ==========*/

    public $idCapacitaciones;

    public function AjaxCapacitacionesMostrar(){

        $item   = "idCA";

        $valor = $this->idCapacitaciones;

        $respuesta = ControladorCapacitaciones::ctrMostrarCapacitacionesEditar($item, $valor);

        echo json_encode($respuesta);

    } // End AjaxCapacitaciones

}// End Capacitaciones

/*============ MOSTRAR - EDITAR REGISTROS - ============ */

if(isset($_POST["idCapacitaciones"])){

    $adjuntos = new AjaxCapacitaciones();
    $adjuntos -> idCapacitaciones = $_POST["idCapacitaciones"];
    $adjuntos -> AjaxCapacitacionesMostrar();
  }