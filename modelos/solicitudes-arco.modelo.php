<?php

    require_once "conexion.php";

        class ModeloSolicitudesArco{

           static public function ctrMostrarTablaAR($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU){

            $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                   FROM $tabla 
                                                   INNER JOIN $tablaDSI ON $tablaDSI.idSAR = $tabla.idSAR
                                                   INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                   WHERE $tablaU.$item = :$item" );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


            

           }  // ctrMostraTablaAR


        } // Modelo Solicitudes Arco



?>