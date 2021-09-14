SELECT SAR.SA_Nombre_Sujeto_Obligado, SAR.SA_Informe_Presentado, SAR.SA_Anios, SAR.SA_Fecha ,SAR.SA_TOTAL_SOLICITUDES FROM solicitudes_arco SAR
INNER JOIN detalle_usuario_sa DSA
ON  DSA.idSAR = SAR.idSAR
INNER JOIN usuarios U
ON U.id  = DSA.idusuario
WHERE U.codigo = "A.1"
