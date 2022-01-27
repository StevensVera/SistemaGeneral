SELECT * 
FROM solicitudes_informacion SI
INNER JOIN solicitudes_arco SAR
ON  SI.Si_Codigo_SO = SAR.Sa_Codigo_SO
WHERE SI.Si_Codigo_SO = "A.1" AND SAR.SA_Codigo_SO = "A.1" AND SI.Si_Codigo_Informe_Anios = "1er Informe Bimestral 2022"
AND SAR.SA_Codigo_Informe_Anios = "2do Informe Bimestral 2022"
