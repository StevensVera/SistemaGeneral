SELECT I.idSO, U.nombre_Informe, 
       I.InformePresentado, I.Anio , 
		 SI.SI_TOTAL_SOLICITUDES, SA.SA_TOTAL_SOLICITUDES, 
		 CA.Cantidad_Capacitacion,  I.fecha  FROM informesso I
INNER JOIN usuarios U
ON U.id = I.idusuario
INNER JOIN solicitudes_informacion SI
ON SI.idSI = I.idSI
INNER JOIN solicitudes_arco SA
ON SA.idSAR = I.idSAr
INNER JOIN capacitaciones CA
ON CA.idCA = I.idCA
WHERE  U.usuario_Informe = "AyunAcaponeta"

