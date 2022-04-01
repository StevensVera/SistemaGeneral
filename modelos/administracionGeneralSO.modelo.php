<?php

require_once "conexion.php";  

    class ModeloAdministracionGeneralSO{ 

    /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

    static public function MdlMostrarTablaAdministracionGeneralSO($tablaSI, $tablaSA, $TablaCA,$valor, $valor2, $ObtenerCodigoInformeSI, $ObtenerCodigoInformeSA,$ObtenerCodigoInformeCA, $ObtenerCodigoSI, $ObtenerCodigoSA, $ObtenerCodigoCA, $ObtenerEstatusSI, $ObtenerEstatusSA, $ObtenerEstatusCA){

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT *
                                                FROM $tablaSI SI
                                                INNER JOIN $tablaSA SA
                                                ON SI.$ObtenerCodigoInformeSI = SA.$ObtenerCodigoInformeSA
                                                INNER JOIN $TablaCA CA
                                                ON SI.$ObtenerCodigoInformeSI = CA.$ObtenerCodigoInformeCA
                                                WHERE SI.$ObtenerCodigoSI = :$ObtenerCodigoSI AND SI.$ObtenerEstatusSI = :$ObtenerEstatusSI AND SA.$ObtenerCodigoSA = :$ObtenerCodigoSA AND SA.$ObtenerEstatusSA = :$ObtenerEstatusSA AND CA.$ObtenerCodigoCA = :$ObtenerCodigoCA AND CA.$ObtenerEstatusCA = :$ObtenerEstatusCA" );

         $stmt -> bindParam(":".$ObtenerCodigoSI, $valor, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerCodigoSA, $valor, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerCodigoCA, $valor, PDO::PARAM_STR);

         $stmt -> bindParam(":".$ObtenerEstatusSI, $valor2, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerEstatusSA, $valor2, PDO::PARAM_STR);
         $stmt -> bindParam(":".$ObtenerEstatusCA, $valor2, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetchAll();

       /*
       $stmt = Conexion::conectar()->prepare("SELECT $tabla.$so, $tabla.$ip, $tabla.$ipa, $tabla.$tsi, $tabla.$fe 
                                                FROM $tabla 
                                                INNER JOIN $tablaDSI ON $tablaDSI.idSI = $tabla.idSI 
                                                INNER JOIN $tablaU ON $tablaU.id = $tablaDSI.idusuario 
                                                WHERE $tablaU.$item = :$item" );

         $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

         $stmt -> execute();

         return $stmt -> fetchAll();

       */

   } // End Funcion MdlMostrarTablaSI


    /*=============================================
    EDITAR ADMINISTRACION MODAL SO
    =============================================*/

    static public function mdlAdministracionGeneralSOModal($TablaSI, $TablaSA, $TablaCA , $datos, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SA_Codigo_Tipo_Informe_Anios, $Obtener_CA_Codigo_Tipo_Informe_Anios){

      $stmt = Conexion::conectar()->prepare("UPDATE $TablaSI
                                             INNER JOIN $TablaSA
                                             ON $TablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $TablaSA.$Obtener_SA_Codigo_Tipo_Informe_Anios
                                             INNER JOIN $TablaCA
                                             ON $TablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $TablaCA.$Obtener_CA_Codigo_Tipo_Informe_Anios
                                             SET 
                                             SI_Recepcion = :SI_Recepcion, 
                                             SI_Observaciones_General = :SI_Observaciones_General, 
                                             SI_Observaciones = :SI_Observaciones, 
                                             SI_Observaciones_Publica = :SI_Observaciones_Publica, 
                                             SA_Recepcion = :SA_Recepcion, 
                                             SA_Observaciones_General = :SA_Observaciones_General,
                                             SA_Observaciones = :SA_Observaciones, 
                                             SA_Observaciones_Publica = :SA_Observaciones_Publica, 
                                             CA_Recepcion = :CA_Recepcion, 
                                             CA_Observaciones_General = :CA_Observaciones_General,
                                             CA_Observaciones = :CA_Observaciones,
                                             CA_Observaciones_Publica = :CA_Observaciones_Publica,
                                             SI_Observaciones_Generales = :SI_Observaciones_Generales, 
                                             SI_Requerimiento_Amonestacion_Privada = :SI_Requerimiento_Amonestacion_Privada, 
                                             SI_Requerimiento_Amonestacion_Publica = :SI_Requerimiento_Amonestacion_Publica,
                                             SA_Observaciones_Generales = :SA_Observaciones_Generales, 
                                             SA_Requerimiento_Amonestacion_Privada = :SA_Requerimiento_Amonestacion_Privada,
                                             SA_Requerimiento_Amonestacion_Publica = :SA_Requerimiento_Amonestacion_Publica,
                                             CA_Observaciones_Generales = :CA_Observaciones_Generales,
                                             CA_Requerimiento_Amonestacion_Privada = :CA_Requerimiento_Amonestacion_Privada,
                                             CA_Requerimiento_Amonestacion_Publica = :CA_Requerimiento_Amonestacion_Publica
                                              WHERE idSI = :idSI AND idSAR = :idSAR AND idCA = :idCA");

      $stmt->bindParam(":idSI", $datos["idSI"], PDO::PARAM_INT);
      $stmt->bindParam(":SI_Recepcion", $datos["SI_Recepcion"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Observaciones_General", $datos["SI_Observaciones_General"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Observaciones", $datos["SI_Observaciones"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Observaciones_Publica", $datos["SI_Observaciones_Publica"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Observaciones_Generales", $datos["SI_Observaciones_Generales"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Requerimiento_Amonestacion_Privada", $datos["SI_Requerimiento_Amonestacion_Privada"], PDO::PARAM_STR);
      $stmt->bindParam(":SI_Requerimiento_Amonestacion_Publica", $datos["SI_Requerimiento_Amonestacion_Publica"], PDO::PARAM_STR);

      $stmt->bindParam(":idSAR", $datos["idSAR"], PDO::PARAM_INT);
      $stmt->bindParam(":SA_Recepcion", $datos["SA_Recepcion"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Observaciones_General", $datos["SA_Observaciones_General"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Observaciones", $datos["SA_Observaciones"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Observaciones_Publica", $datos["SA_Observaciones_Publica"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Observaciones_Generales", $datos["SA_Observaciones_Generales"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Requerimiento_Amonestacion_Privada", $datos["SA_Requerimiento_Amonestacion_Privada"], PDO::PARAM_STR);
      $stmt->bindParam(":SA_Requerimiento_Amonestacion_Publica", $datos["SA_Requerimiento_Amonestacion_Publica"], PDO::PARAM_STR);

      $stmt->bindParam(":idCA", $datos["idCA"], PDO::PARAM_INT);
      $stmt->bindParam(":CA_Recepcion", $datos["CA_Recepcion"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Observaciones_General", $datos["CA_Observaciones_General"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Observaciones", $datos["CA_Observaciones"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Observaciones_Publica", $datos["CA_Observaciones_Publica"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Observaciones_Generales", $datos["CA_Observaciones_Generales"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Requerimiento_Amonestacion_Privada", $datos["CA_Requerimiento_Amonestacion_Privada"], PDO::PARAM_STR);
      $stmt->bindParam(":CA_Requerimiento_Amonestacion_Publica", $datos["CA_Requerimiento_Amonestacion_Publica"], PDO::PARAM_STR);
     
      if($stmt->execute()){

        return "ok";

      }else{

        return "error";
      
      }

      $stmt->close();
      $stmt = null;

    }




   /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

   static public function MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

    $stmt = Conexion::conectar()->prepare(
     "SELECT DISTINCT * FROM $tablaSI
        INNER JOIN $tablaSA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $tablaSA.$Obtener_SA_Codigo_Tipo_Informe_Anios
        INNER JOIN $TablaCA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $TablaCA.$Obtener_CA_Codigo_Tipo_Informe_Anios
        WHERE $tablaSI.$Obtener_SI_Estatus = 1 AND $tablaSA.$Obtener_SA_Estatus = 1 AND $TablaCA.$Obtener_CA_Estatus = 1 OR $tablaSI.$Obtener_SI_Estatus = 0 OR $tablaSA.$Obtener_SA_Estatus = 0 OR $TablaCA.$Obtener_CA_Estatus = 0
        GROUP BY $Obtener_Si_Codigo_SO , $Obtener_SI_Codigo_UnicoInforme_Anios " );

     $stmt -> execute();

     return $stmt -> fetchAll();


} // End Funcion MdlMostrarTablaSI

 /* =========== MOSTRAR DATOS ____ 3 REGISTROS ____  TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA  ________ VERSION 1 ________ ================ */

   static public function MdlMostrarAdministracionGeneralSO($tablaSI, $tablaSA, $TablaCA, $itemSI, $valorSI, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

    $stmt = Conexion::conectar()->prepare(
     "SELECT DISTINCT * FROM $tablaSI
        INNER JOIN $tablaSA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $tablaSA.$Obtener_SA_Codigo_Tipo_Informe_Anios
        INNER JOIN $TablaCA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $TablaCA.$Obtener_CA_Codigo_Tipo_Informe_Anios
        WHERE $tablaSI.$Obtener_SI_Estatus = 1 AND $itemSI = :$itemSI AND $tablaSA.$Obtener_SA_Estatus = 1  AND $TablaCA.$Obtener_CA_Estatus = 1 
        GROUP BY $Obtener_Si_Codigo_SO , $Obtener_SI_Codigo_UnicoInforme_Anios " );

     $stmt -> bindParam(":".$itemSI, $valorSI, PDO::PARAM_STR);


     $stmt -> execute();

     return $stmt -> fetchAll();


} // End Funcion MdlMostrarTablaSI

  /*=============================================
	MOSTRAR ESTADO DE LOS BOTONES
	=============================================*/

	static public function mdlMostrarAdministracionBSOSI($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}


   /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

   static public function MdlMostrarTablaAdministracionxSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha, $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha, $Obtener_CA_Nombre_Sujeto_Obligado,
   $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha, $IdSI, $valorSI, $IdSA, $valorSA, $IdCA, $valorCA){

    $stmt = Conexion::conectar()->prepare(
     "SELECT $Obtener_SI_Nombre_Sujeto_Obligado, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_TOTAL_SOLICITUDES, $Obtener_SI_Fecha 
      FROM $tablaSI
      WHERE $tablaSI.$IdSI = :$IdSI
      UNION
      SELECT $Obtener_SA_Nombre_Sujeto_Obligado, $Obtener_SA_Codigo_UnicoInforme_Anios, $Obtener_SA_TOTAL_SOLICITUDES, $Obtener_SA_Fecha 
      FROM $tablaSA
      WHERE $tablaSA.$IdSA = :$IdSA
      UNION  
      SELECT $Obtener_CA_Nombre_Sujeto_Obligado, $Obtener_CA_Codigo_UnicoInforme_Anios, $Obtener_CA_Total_Capacitacion, $Obtener_CA_Fecha 
      FROM $TablaCA
      WHERE $TablaCA.$IdCA = :$IdCA " );

     $stmt -> bindParam(":".$IdSI, $valorSI, PDO::PARAM_STR);
     $stmt -> bindParam(":".$IdSA, $valorSA, PDO::PARAM_STR);
     $stmt -> bindParam(":".$IdCA, $valorCA, PDO::PARAM_STR);

     $stmt -> execute();

     return $stmt -> fetchAll();


} // End Funcion MdlMostrarTablaSI


/* ===========================  ACTIVAR EL ESTADO DEL USUARIO  ================================== */

static public function mdlActualizarEstadoAdministradorxSO($tabla,$item1,$valor1,$item2,$valor2){
            
   $statement = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2" );

   $statement -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);

   $statement ->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

   if ($statement ->execute()) {
       
       return "ok";

   }else {

       return "error";

   }

   $statement -> close();
   $statement = null;


} // End function mdlActualizarEstadoUsuario



  }