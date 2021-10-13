<?php

    require_once "conexion.php";

        class ModeloSolicitudesArco{

           static public function ctrMostrarTablaAR($itemCodigo,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe){

                $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                    FROM $tabla 
                                                    WHERE $tabla.$itemCodigo = :$itemCodigo" );

                $stmt -> bindParam(":".$itemCodigo, $valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetchAll();

           }  // ctrMostraTablaAR

           static public function MdlAgregarSA($tablaSA, $datos){

                $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaSA (SA_Codigo_SO, SA_Codigo_Informe_Anios,    SA_Nombre_Sujeto_Obligado,SA_Informe_Presentado,SA_Anios,SA_TOTAL_SOLICITUDES) VALUES (:SA_Codigo_SO,:SA_Codigo_Informe_Anios, :SA_Nombre_Sujeto_Obligado,:SA_Informe_Presentado,:SA_Anios,:SA_TOTAL_SOLICITUDES)");

                $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);

                if ($stmt -> execute()) {
	 
                    return "ok";
            
                 }else {
            
                    return "error";
        
                 } // else


           }// End Funciom Agregar SA


        } // Modelo Solicitudes Arco



?>