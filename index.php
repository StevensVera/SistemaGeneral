<?php   


session_start();

/*======================== CONTROLADORES DEL SISTEMA ================================*/

require_once "controladores/plantilla.controlador.php";

require_once "controladores/usuarios.controlador.php";

require_once "controladores/solicitudes-informacion.controlador.php";

require_once "controladores/solicitudes-arco.controlador.php";

/*=========================== MODELOS DEL SISTEMA ===================================*/

require_once "modelos/usuarios.modelo.php";

require_once "modelos/solicitudes-informacion.modelo.php";

require_once "modelos/solicitudes-arco.modelo.php";

/* =====================   EJECUTA PLATILLA   ======================= */
$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
