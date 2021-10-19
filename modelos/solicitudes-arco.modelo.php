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

                $stmt = Conexion::conectar()->prepare(
                   "INSERT INTO $tablaSA (
                      
                      SA_Codigo_SO, SA_Codigo_Informe_Anios,
                      SA_Nombre_Sujeto_Obligado,
                      SA_Informe_Presentado,
                      SA_Anios,
                      SA_TOTAL_SOLICITUDES,

                      SA_Medio_Presentacion_Personal_Escrito,
                      SA_Medio_Presentacion_Correo_Electronico,
                      SA_Medio_Presentacion_Sistema_Infomex,
                      SA_Medio_Presentacion_PNT,
                      SA_Medio_Presentacion_No_disponible,
                      SA_Medio_Presentacion_Suma_Total

                      
                      )VALUES (
                         
                     :SA_Codigo_SO,
                     :SA_Codigo_Informe_Anios,
                     :SA_Nombre_Sujeto_Obligado,
                     :SA_Informe_Presentado,
                     :SA_Anios,
                     :SA_TOTAL_SOLICITUDES,

                     :SA_Medio_Presentacion_Personal_Escrito,
                     :SA_Medio_Presentacion_Correo_Electronico,
                     :SA_Medio_Presentacion_Sistema_Infomex,
                     :SA_Medio_Presentacion_PNT,
                     :SA_Medio_Presentacion_No_disponible,
                     :SA_Medio_Presentacion_Suma_Total

                     
                     )");

                $stmt -> bindParam(":SA_Codigo_SO", $datos["SA_Codigo_SO"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Codigo_Informe_Anios", $datos["SA_Codigo_Informe_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Nombre_Sujeto_Obligado", $datos["SA_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Informe_Presentado", $datos["SA_Informe_Presentado"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Anios", $datos["SA_Anios"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_TOTAL_SOLICITUDES", $datos["SA_TOTAL_SOLICITUDES"], PDO::PARAM_STR);
                //"** Medio de Presentación **",
                $stmt -> bindParam(":SA_Medio_Presentacion_Personal_Escrito", $datos["SA_Medio_Presentacion_Personal_Escrito"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Correo_Electronico", $datos["SA_Medio_Presentacion_Correo_Electronico"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Sistema_Infomex", $datos["SA_Medio_Presentacion_Sistema_Infomex"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_PNT", $datos["SA_Medio_Presentacion_PNT"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_No_disponible", $datos["SA_Medio_Presentacion_No_disponible"], PDO::PARAM_STR);
                $stmt -> bindParam(":SA_Medio_Presentacion_Suma_Total", $datos["SA_Medio_Presentacion_Suma_Total"], PDO::PARAM_STR);

                if ($stmt -> execute()) {
	 
                    return "ok";
            
                 }else {
            
                    return "error";
        
                 } // else


           }// End Funciom Agregar SA


        } // Modelo Solicitudes Arco



?>