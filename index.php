<?php   

/*======================== CONTROLADORES DEL SISTEMA ================================*/

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";

/*=========================== MODELOS DEL SISTEMA ===================================*/

require_once "modelos/usuarios.modelo.php";

/* =====================   EJECUTA PLATILLA   ======================= */
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
