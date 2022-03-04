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

   static public function MdlMostrarTablaAdministracionSO($tablaSI, $tablaSA, $TablaCA, $Obtener_SI_Codigo_Tipo_Informe_Anios, $Obtener_SI_Codigo_UnicoInforme_Anios, $Obtener_Si_Codigo_SO, $Obtener_SA_Codigo_Tipo_Informe_Anios,  $Obtener_SI_Estatus, $Obtener_SA_Estatus, $Obtener_CA_Codigo_Tipo_Informe_Anios,  $Obtener_CA_Estatus){

    $stmt = Conexion::conectar()->prepare(
     "SELECT DISTINCT * FROM $tablaSI
        INNER JOIN $tablaSA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $tablaSA.$Obtener_SA_Codigo_Tipo_Informe_Anios
        INNER JOIN $TablaCA
        ON $tablaSI.$Obtener_SI_Codigo_Tipo_Informe_Anios = $TablaCA.$Obtener_CA_Codigo_Tipo_Informe_Anios
        WHERE $tablaSI.$Obtener_SI_Estatus = 1 AND $tablaSA.$Obtener_SA_Estatus = 1 AND $TablaCA.$Obtener_CA_Estatus = 1
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



  }