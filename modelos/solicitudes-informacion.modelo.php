<?php

    require_once "conexion.php";

     class ModeloSolicitudesInformacion{ 

        static public function mdlSolicitudesInformacion($item, $valor,$tablaSI){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaSI WHERE $item = :$item ORDER BY idSI DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

            $stmt -> close();

            $stmt = null;

        } // End Funcion mdlSolicitudesInformacion

      static public function MdlMostrarTablaSI($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU){

					
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                   FROM $tabla 
                                                   INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                   INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                   WHERE $tablaU.$item = :$item" );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

        } // End Funcion MdlMostrarTablaSI


        static public function MdlAgregarSI($tablaSI, $datos){
            
          $stmt = Conexion::conectar()->prepare("INSERT INTO $tablaSI(Si_Codigo_SO, Si_Codigo_Informe_Anios, SI_Nombre_Sujeto_Obligado,SI_Informe_Presentado,SI_Anios,SI_TOTAL_SOLICITUDES) VALUES (:Si_Codigo_SO,:Si_Codigo_Informe_Anios, :SI_Nombre_Sujeto_Obligado,:SI_Informe_Presentado,:SI_Anios,:SI_TOTAL_SOLICITUDES)");
          
          $stmt -> bindParam(":Si_Codigo_SO", $datos["Si_Codigo_SO"], PDO::PARAM_STR);
          $stmt -> bindParam(":Si_Codigo_Informe_Anios", $datos["Si_Codigo_Informe_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Nombre_Sujeto_Obligado", $datos["SI_Nombre_Sujeto_Obligado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Informe_Presentado", $datos["SI_Informe_Presentado"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_Anios", $datos["SI_Anios"], PDO::PARAM_STR);
          $stmt -> bindParam(":SI_TOTAL_SOLICITUDES", $datos["SI_TOTAL_SOLICITUDES"], PDO::PARAM_STR);

          if ($stmt -> execute()) {
	 
            return "ok";
    
          }else {
    
            return "error";

          } // else

        } // End Funcion MdlAgregarSI

     } // End class ModeloSolicitudesInformacion