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

   /* =========== MOSTRAR DATOS TABLA - ADMINISTRACION SO - DESDE LA UNIDAD DE TRANSPARENCIA ================ */

   static public function MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_SI_Estatus, $Obtener_SA_Estatus,  $Obtener_CA_Estatus){

    $stmt = Conexion::conectar()->prepare(
     "SELECT DISTINCT * FROM $tablaSI
        INNER JOIN $tablaSA
        ON $tablaSI.$Obtener_SI_Estatus = $tablaSA.$Obtener_SA_Estatus
        INNER JOIN $TablaCA
        ON $tablaSI.$Obtener_SI_Estatus = $TablaCA.$Obtener_CA_Estatus
        WHERE $tablaSI.$Obtener_SI_Estatus = 1 AND $tablaSA.$Obtener_SA_Estatus = 1 AND $TablaCA.$Obtener_CA_Estatus = 1
        GROUP BY $Obtener_SI_Codigo_UnicoInforme_Anios " );

     $stmt -> execute();

     return $stmt -> fetchAll();


} // End Funcion MdlMostrarTablaSI


  }