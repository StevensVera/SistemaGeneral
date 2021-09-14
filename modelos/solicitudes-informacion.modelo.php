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

        }

        static public function MdlMostrarTablaSI($item,$valor,$tabla,$so, $ip, $ipa, $tsi, $fe, $tablaDSI, $tablaU){

					
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                   FROM $tabla 
                                                   INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                   INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                   WHERE $tablaU.$item = :$item" );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


      }

     }