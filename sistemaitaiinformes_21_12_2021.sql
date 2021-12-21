-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2021 a las 23:12:16
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaitaiinformes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `idCA` int(11) NOT NULL,
  `Cantidad_Capacitacion` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_1` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_2` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_3` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_4` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_5` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_6` int(11) DEFAULT NULL,
  `Cantidad_Capacitacion_7` int(11) DEFAULT NULL,
  `Cantidad_Servidores_Publicos` int(11) DEFAULT NULL,
  `Cantidad_Capacitaciones_Recibidas` int(11) DEFAULT NULL,
  `Cantidad_Capacitaciones_Ortogadas` int(11) DEFAULT NULL,
  `Cantidad_Acciones_Realizadas_Transparencia` int(11) DEFAULT NULL,
  `Archivo` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuario_sa`
--

CREATE TABLE `detalle_usuario_sa` (
  `idUSA` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idSAR` int(11) DEFAULT NULL,
  `InformePresentado` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `Anio` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `detalle_usuario_sa`
--

INSERT INTO `detalle_usuario_sa` (`idUSA`, `idusuario`, `idSAR`, `InformePresentado`, `Anio`, `fecha`) VALUES
(2, 101, 7, '3er Informe Bimestral', '2021', '2021-07-13 20:58:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuario_si`
--

CREATE TABLE `detalle_usuario_si` (
  `idUSI` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idSI` int(11) DEFAULT NULL,
  `SI_Nombre_UT` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_usuario_si`
--

INSERT INTO `detalle_usuario_si` (`idUSI`, `idusuario`, `idSI`, `SI_Nombre_UT`) VALUES
(11, 101, 13, 'Nombre del Titular 88'),
(13, 102, 15, 'Nombre del Titular 89');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_arco`
--

CREATE TABLE `solicitudes_arco` (
  `idSAR` int(11) NOT NULL,
  `SA_Estatus` int(11) DEFAULT NULL,
  `SA_Codigo_SO` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SA_Codigo_Informe_Anios` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SA_Nombre_Sujeto_Obligado` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SA_Informe_Presentado` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SA_Anios` int(11) DEFAULT NULL,
  `SA_Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `SA_TOTAL_SOLICITUDES` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_Personal_Escrito` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_Correo_Electronico` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_Sistema_Infomex` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_PNT` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_No_disponible` int(11) DEFAULT NULL,
  `SA_Medio_Presentacion_Suma_Total` int(11) DEFAULT NULL,
  `SA_Tipo_Solicitante_Persona_Fisica` int(11) DEFAULT NULL,
  `SA_Tipo_Solicitante_Persona_Moral` int(11) DEFAULT NULL,
  `SA_Tipo_Solicitante_No_Disponible` int(11) DEFAULT NULL,
  `SA_Tipo_Solicitante_Suma_Total` int(11) DEFAULT NULL,
  `SA_Genero_Solicitante_Femenino` int(11) DEFAULT NULL,
  `SA_Genero_Solicitante_Masculino` int(11) DEFAULT NULL,
  `SA_Genero_Solicitante_Anonimo` int(11) DEFAULT NULL,
  `SA_Genero_Solicitante_No_Disponible` int(11) DEFAULT NULL,
  `SA_Genero_Solicitante_Suma_Total` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Acceso` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Rectificacion` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Oposicion` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Cancelacion` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Otro` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_No_Disponible` int(11) DEFAULT NULL,
  `SA_Informacion_Solicitada_Suma_Total` int(11) DEFAULT NULL,
  `SA_Tramites_Concluidas` int(11) DEFAULT NULL,
  `SA_Tramites_Pendientes` int(11) DEFAULT NULL,
  `SA_Tramites_No_Disponible` int(11) DEFAULT NULL,
  `SA_Tramites_Suma_Total` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Medios_Electronicos` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Copia_Simple` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Consulta_Directa` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Copia_Certificada` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Otro` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_No_Disponible` int(11) DEFAULT NULL,
  `SA_Modalidad_Respuesta_Suma_Total` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Informacion` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Informacion_Parcial` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Negada_Clasificacion` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Inexistencia_Informacion` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Mixta` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_No_Aclarada` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Orientada` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_En_Tramite` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Improcedente` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Otros` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_No_Disponible` int(11) DEFAULT NULL,
  `SA_Sentido_Respuesta_Suma_Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `solicitudes_arco`
--

INSERT INTO `solicitudes_arco` (`idSAR`, `SA_Estatus`, `SA_Codigo_SO`, `SA_Codigo_Informe_Anios`, `SA_Nombre_Sujeto_Obligado`, `SA_Informe_Presentado`, `SA_Anios`, `SA_Fecha`, `SA_TOTAL_SOLICITUDES`, `SA_Medio_Presentacion_Personal_Escrito`, `SA_Medio_Presentacion_Correo_Electronico`, `SA_Medio_Presentacion_Sistema_Infomex`, `SA_Medio_Presentacion_PNT`, `SA_Medio_Presentacion_No_disponible`, `SA_Medio_Presentacion_Suma_Total`, `SA_Tipo_Solicitante_Persona_Fisica`, `SA_Tipo_Solicitante_Persona_Moral`, `SA_Tipo_Solicitante_No_Disponible`, `SA_Tipo_Solicitante_Suma_Total`, `SA_Genero_Solicitante_Femenino`, `SA_Genero_Solicitante_Masculino`, `SA_Genero_Solicitante_Anonimo`, `SA_Genero_Solicitante_No_Disponible`, `SA_Genero_Solicitante_Suma_Total`, `SA_Informacion_Solicitada_Acceso`, `SA_Informacion_Solicitada_Rectificacion`, `SA_Informacion_Solicitada_Oposicion`, `SA_Informacion_Solicitada_Cancelacion`, `SA_Informacion_Solicitada_Otro`, `SA_Informacion_Solicitada_No_Disponible`, `SA_Informacion_Solicitada_Suma_Total`, `SA_Tramites_Concluidas`, `SA_Tramites_Pendientes`, `SA_Tramites_No_Disponible`, `SA_Tramites_Suma_Total`, `SA_Modalidad_Respuesta_Medios_Electronicos`, `SA_Modalidad_Respuesta_Copia_Simple`, `SA_Modalidad_Respuesta_Consulta_Directa`, `SA_Modalidad_Respuesta_Copia_Certificada`, `SA_Modalidad_Respuesta_Otro`, `SA_Modalidad_Respuesta_No_Disponible`, `SA_Modalidad_Respuesta_Suma_Total`, `SA_Sentido_Respuesta_Informacion`, `SA_Sentido_Respuesta_Informacion_Parcial`, `SA_Sentido_Respuesta_Negada_Clasificacion`, `SA_Sentido_Respuesta_Inexistencia_Informacion`, `SA_Sentido_Respuesta_Mixta`, `SA_Sentido_Respuesta_No_Aclarada`, `SA_Sentido_Respuesta_Orientada`, `SA_Sentido_Respuesta_En_Tramite`, `SA_Sentido_Respuesta_Improcedente`, `SA_Sentido_Respuesta_Otros`, `SA_Sentido_Respuesta_No_Disponible`, `SA_Sentido_Respuesta_Suma_Total`) VALUES
(7, 0, 'A.1', '3er Informe Bimestral 2021', 'H. Ayuntamiento de Acaponeta', '4to Informe Bimestral', 2021, '2021-08-23 19:43:42', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 0, 'A.1', '1er Informe Bimestral 2021', 'H. Ayuntamiento de Acaponeta', '1er Informe Bimestral', 2021, '2021-10-20 19:21:29', 12, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 1, 2, 3, 4, 5, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12),
(25, NULL, 'A.1', 'Informe Anual 2021', 'H. Ayuntamiento de Acaponeta', 'Informe Anual', 2021, '2021-12-21 18:32:44', 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_informacion`
--

CREATE TABLE `solicitudes_informacion` (
  `idSI` int(11) NOT NULL,
  `SI_Estatus` int(11) DEFAULT NULL,
  `Si_Codigo_SO` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `Si_Codigo_Informe_Anios` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SI_Nombre_Sujeto_Obligado` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SI_Informe_Presentado` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `SI_Anios` int(11) DEFAULT NULL,
  `SI_Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `SI_TOTAL_SOLICITUDES` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_Personal_Escrito` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_Correo_Electronico` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_Sistema_Infomex` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_PNT` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_No_disponible` int(11) DEFAULT NULL,
  `SI_Medio_Presentacion_Suma_Total` int(11) DEFAULT NULL,
  `SI_Tipo_Solicitud_Persona_Fisica` int(11) DEFAULT NULL,
  `SI_Tipo_Solicitud_Persona_Moral` int(11) DEFAULT NULL,
  `SI_Tipo_Solicitud_No_Disponible` int(11) DEFAULT NULL,
  `SI_Tipo_Solicitud_Suma_Total` int(11) DEFAULT NULL,
  `SI_Genero_Solicitante_Femenino` int(11) DEFAULT NULL,
  `SI_Genero_Solicitante_Masculino` int(11) DEFAULT NULL,
  `SI_Genero_Solicitante_Anonimo` int(11) DEFAULT NULL,
  `SI_Genero_Solicitante_No_Disponible` int(11) DEFAULT NULL,
  `SI_Genero_Solicitante_Suma_Total` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_Obligacion_Transparencia` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_Reservada` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_Confidencial` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_Otro` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_No_Disponible` int(11) DEFAULT NULL,
  `SI_Informacion_Solicitada_Suma_Total` int(11) DEFAULT NULL,
  `SI_Tramites_Concluidas` int(11) DEFAULT NULL,
  `SI_Tramites_Pendientes` int(11) DEFAULT NULL,
  `SI_Tramites_No_Disponible` int(11) DEFAULT NULL,
  `SI_Tramites_Suma_Total` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Medios_Electronicos` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Copia_Simple` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Consulta_Directa` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Copia_Certificada` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Otro` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_No_Disponible` int(11) DEFAULT NULL,
  `SI_Modalidad_Respuesta_Suma_Total` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Marco_Normativo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Estructura_Organica` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Funciones_Area` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Metas_Objetivos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Indicadores_Relacionados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Remuneraciones_Personal` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Contratacion_Servicios` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Versiones_Publicas` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Condiciones_Trabajos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Recursos_Publicos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Informacion_Curricular` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Servicios_Ofrecen` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Presupuesto_Asignado` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Informacion_Relativa` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Montos_Designados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Resultados_Dictaminacion` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Infomes_Generen_SO` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Avances_Programaticos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Padron_Proveedores` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Convenios_Coordinacion` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Resoluciones_Laudos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Programas_Ofrecidos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Mecanismo_Participacion` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Actas_Resoluciones` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Estudios_Financiados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Ingreso_Recibido` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Donaciones_Hechas` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Catalogos_Disposicion` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Gacetas_Municipales` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Programa_Ordenamiento` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Programa_Uso_Suelo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Licencias_Construccion` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Monto_Designados` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Actas_Cabildo` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Evaluaciones_LDF` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Subsidios` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Otros` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_No_Disponibles` int(11) DEFAULT NULL,
  `SI_Obligaciones_Solicitadas_Suma_Total` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Informacion` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Informacion_Parcial` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Negada_Clasificacion` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Inexistencia_Informacion` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Mixta` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_No_Aclarada` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Orientada` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_En_Tramite` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Improcedente` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Otro` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_No_Disponible` int(11) DEFAULT NULL,
  `SI_Sentido_Respuesta_Suma_Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `solicitudes_informacion`
--

INSERT INTO `solicitudes_informacion` (`idSI`, `SI_Estatus`, `Si_Codigo_SO`, `Si_Codigo_Informe_Anios`, `SI_Nombre_Sujeto_Obligado`, `SI_Informe_Presentado`, `SI_Anios`, `SI_Fecha`, `SI_TOTAL_SOLICITUDES`, `SI_Medio_Presentacion_Personal_Escrito`, `SI_Medio_Presentacion_Correo_Electronico`, `SI_Medio_Presentacion_Sistema_Infomex`, `SI_Medio_Presentacion_PNT`, `SI_Medio_Presentacion_No_disponible`, `SI_Medio_Presentacion_Suma_Total`, `SI_Tipo_Solicitud_Persona_Fisica`, `SI_Tipo_Solicitud_Persona_Moral`, `SI_Tipo_Solicitud_No_Disponible`, `SI_Tipo_Solicitud_Suma_Total`, `SI_Genero_Solicitante_Femenino`, `SI_Genero_Solicitante_Masculino`, `SI_Genero_Solicitante_Anonimo`, `SI_Genero_Solicitante_No_Disponible`, `SI_Genero_Solicitante_Suma_Total`, `SI_Informacion_Solicitada_Obligacion_Transparencia`, `SI_Informacion_Solicitada_Reservada`, `SI_Informacion_Solicitada_Confidencial`, `SI_Informacion_Solicitada_Otro`, `SI_Informacion_Solicitada_No_Disponible`, `SI_Informacion_Solicitada_Suma_Total`, `SI_Tramites_Concluidas`, `SI_Tramites_Pendientes`, `SI_Tramites_No_Disponible`, `SI_Tramites_Suma_Total`, `SI_Modalidad_Respuesta_Medios_Electronicos`, `SI_Modalidad_Respuesta_Copia_Simple`, `SI_Modalidad_Respuesta_Consulta_Directa`, `SI_Modalidad_Respuesta_Copia_Certificada`, `SI_Modalidad_Respuesta_Otro`, `SI_Modalidad_Respuesta_No_Disponible`, `SI_Modalidad_Respuesta_Suma_Total`, `SI_Obligaciones_Solicitadas_Marco_Normativo`, `SI_Obligaciones_Solicitadas_Estructura_Organica`, `SI_Obligaciones_Solicitadas_Funciones_Area`, `SI_Obligaciones_Solicitadas_Metas_Objetivos`, `SI_Obligaciones_Solicitadas_Indicadores_Relacionados`, `SI_Obligaciones_Solicitadas_Indicadores_Rendir_Cuentas`, `SI_Obligaciones_Solicitadas_Directorio_Servidor_Publico`, `SI_Obligaciones_Solicitadas_Remuneraciones_Personal`, `SI_Obligaciones_Solicitadas_Gasto_Representacion_Viaticos`, `SI_Obligaciones_Solicitadas_Plazas_Bases_Confianza_Vacantes`, `SI_Obligaciones_Solicitadas_Contratacion_Servicios`, `SI_Obligaciones_Solicitadas_Versiones_Publicas`, `SI_Obligaciones_Solicitadas_Domicilio_Direccion_UT`, `SI_Obligaciones_Solicitadas_Convocatoria_Concurso_Cargo`, `SI_Obligaciones_Solicitadas_Informacion_Programas_Subsidios`, `SI_Obligaciones_Solicitadas_Condiciones_Trabajos`, `SI_Obligaciones_Solicitadas_Recursos_Publicos`, `SI_Obligaciones_Solicitadas_Informacion_Curricular`, `SI_Obligaciones_Solicitadas_Servidores_Publicos_Sancionados`, `SI_Obligaciones_Solicitadas_Servicios_Ofrecen`, `SI_Obligaciones_Solicitadas_Tramites_Requisitos_Formatos`, `SI_Obligaciones_Solicitadas_Presupuesto_Asignado`, `SI_Obligaciones_Solicitadas_Informacion_Relativa`, `SI_Obligaciones_Solicitadas_Montos_Designados`, `SI_Obligaciones_Solicitadas_Informes_Resultados_Auditorias`, `SI_Obligaciones_Solicitadas_Resultados_Dictaminacion`, `SI_Obligaciones_Solicitadas_Montos_Criterios_Convocatorias`, `SI_Obligaciones_Solicitadas_Concesiones_Contratos_Convenios`, `SI_Obligaciones_Solicitadas_Resultados_Procesos_Adjudicaciones`, `SI_Obligaciones_Solicitadas_Infomes_Generen_SO`, `SI_Obligaciones_Solicitadas_Estadisticas_Generan_Cumplimiento`, `SI_Obligaciones_Solicitadas_Avances_Programaticos`, `SI_Obligaciones_Solicitadas_Padron_Proveedores`, `SI_Obligaciones_Solicitadas_Convenios_Coordinacion`, `SI_Obligaciones_Solicitadas_Inventario_Muebles_Inmuebles`, `SI_Obligaciones_Solicitadas_Recomendaciones_Emitidas`, `SI_Obligaciones_Solicitadas_Resoluciones_Laudos`, `SI_Obligaciones_Solicitadas_Programas_Ofrecidos`, `SI_Obligaciones_Solicitadas_Mecanismo_Participacion`, `SI_Obligaciones_Solicitadas_Actas_Resoluciones`, `SI_Obligaciones_Solicitadas_Evaluaciones_Encuestas`, `SI_Obligaciones_Solicitadas_Estudios_Financiados`, `SI_Obligaciones_Solicitadas_Listado_Jubilados_Pensionados`, `SI_Obligaciones_Solicitadas_Ingreso_Recibido`, `SI_Obligaciones_Solicitadas_Donaciones_Hechas`, `SI_Obligaciones_Solicitadas_Catalogos_Disposicion`, `SI_Obligaciones_Solicitadas_Actas_Sesiones_Ordinarias`, `SI_Obligaciones_Solicitadas_Listados_Solicitudes_Proveedores`, `SI_Obligaciones_Solicitadas_Gacetas_Municipales`, `SI_Obligaciones_Solicitadas_Plan_Desarrollo_Municipal`, `SI_Obligaciones_Solicitadas_Condiciones_Generales_Trabajo`, `SI_Obligaciones_Solicitadas_Recursos_Publicos_Economicos`, `SI_Obligaciones_Solicitadas_Plan_Desarrollo_Urbano`, `SI_Obligaciones_Solicitadas_Programa_Ordenamiento`, `SI_Obligaciones_Solicitadas_Programa_Uso_Suelo`, `SI_Obligaciones_Solicitadas_Tipos_Uso_Suelo`, `SI_Obligaciones_Solicitadas_Licencia_Uso_Suelo`, `SI_Obligaciones_Solicitadas_Licencias_Construccion`, `SI_Obligaciones_Solicitadas_Monto_Designados`, `SI_Obligaciones_Solicitadas_Actas_Cabildo`, `SI_Obligaciones_Solicitadas_Prosupuesto_Sostenible`, `SI_Obligaciones_Solicitadas_Evaluaciones_LDF`, `SI_Obligaciones_Solicitadas_Subsidios`, `SI_Obligaciones_Solicitadas_Otros`, `SI_Obligaciones_Solicitadas_No_Disponibles`, `SI_Obligaciones_Solicitadas_Suma_Total`, `SI_Sentido_Respuesta_Informacion`, `SI_Sentido_Respuesta_Informacion_Parcial`, `SI_Sentido_Respuesta_Negada_Clasificacion`, `SI_Sentido_Respuesta_Inexistencia_Informacion`, `SI_Sentido_Respuesta_Mixta`, `SI_Sentido_Respuesta_No_Aclarada`, `SI_Sentido_Respuesta_Orientada`, `SI_Sentido_Respuesta_En_Tramite`, `SI_Sentido_Respuesta_Improcedente`, `SI_Sentido_Respuesta_Otro`, `SI_Sentido_Respuesta_No_Disponible`, `SI_Sentido_Respuesta_Suma_Total`) VALUES
(13, 0, 'A.1', '3er Informe Bimestral 2021', 'H. Ayuntamiento de Acaponeta', '3er Informe Bimestral', 3, '2021-07-17 22:10:15', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 'A.2', '4to Informe Bimestral 2021', 'H. Ayuntamiento de Ahuacatlán', '4to Informe Bimestral', 2021, '2021-08-17 19:11:43', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, 'A.1', 'Informe Anual 2022', 'H. Ayuntamiento de Acaponeta', 'Informe Anual', 2021, '2021-12-10 18:59:30', 21, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 2, 1, 3, 4, 5, 1, 2, 3, 4, 5, 6, 1, 2, 3, 4, 1, 2, 3, 4, 5, 6, 7, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `codigo` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_so` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `titular_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_Informe` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_Informe` int(11) DEFAULT NULL,
  `ultimo_login_Informe` datetime DEFAULT NULL,
  `fecha_informe` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `tipo_so`, `nombre_Informe`, `titular_Informe`, `usuario_Informe`, `password_Informe`, `perfil_Informe`, `foto_Informe`, `archivo_Informe`, `estado_Informe`, `ultimo_login_Informe`, `fecha_informe`) VALUES
(14, 'ED.1', 'Poder Ejecutivo Dependencias', 'Despacho del Ejecutivo/ Coordinador', 'Nombre del Titular 1', 'Usuario 1', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'ED.2', 'Poder Ejecutivo Dependencias', 'Secretaría General de Gobierno', 'Nombre del Titular 2', 'Usuario 2', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'ED.3', 'Poder Ejecutivo Dependencias', 'Secretaría de Desarrollo Sustentable', 'Nombre del Titular 3', 'Usuario 3', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'ED.4', 'Poder Ejecutivo Dependencias', 'Secretaría de Educación', 'Nombre del Titular 4', 'Usuario 4', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'ED.5', 'Poder Ejecutivo Dependencias', 'Secretaría de la Contraloría General', 'Nombre del Titular 5', 'Usuario 5', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'ED.6', 'Poder Ejecutivo Dependencias', 'Secretaría de Turismo', 'Nombre del Titular 6', 'Usuario 6', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'ED.7', 'Poder Ejecutivo Dependencias', 'Secretaría de Infraestructura', 'Nombre del Titular 7', 'Usuario 7', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'ED.8', 'Poder Ejecutivo Dependencias', 'Secretaría de Administración y Finanzas', 'Nombre del Titular 8', 'Usuario 8', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'ED.9', 'Poder Ejecutivo Dependencias', 'Secretaría de Seguridad y Proteccion Ciudadana', 'Nombre del Titular 9', 'Usuario 9', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'ED.10', 'Poder Ejecutivo Dependencias', 'Servicios de Salud de Nayarit', 'Nombre del Titular 10', 'Usuario 10', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'ED.11', 'Poder Ejecutivo Dependencias', 'Secretaría de Economía', 'Nombre del Titular 11', 'Usuario 11', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'ED.12', 'Poder Ejecutivo Dependencias', ' Secretaría de Desarrollo Rural y Medio Ambiente', 'Nombre del Titular 12', 'Usuario 12', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'ED.13', 'Poder Ejecutivo Dependencias', ' Secretaría de Bienestar e Igualdad Sustantiva', 'Nombre del Titular 13', 'Usuario 13', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ED.14', 'Poder Ejecutivo Dependencias', ' Secretaría de Movilidad', 'Nombre del Titular 14', 'Usuario 14', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'EE.1', 'Poder Ejecutivo Entidades', 'Servicios de Educación Pública del Estado de Nayarit', 'Nombre del Titular 15', 'Usuario 15', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'EE.2', 'Poder Ejecutivo Entidades', ' Comisión Estatal de Agua Potable del Estado', 'Nombre del Titular 16', 'Usuario 16', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'EE.3', 'Poder Ejecutivo Entidades', ' Instituto Nayarita de Educación para Adultos', 'Nombre del Titular 17', 'Usuario 17', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'EE.4', 'Poder Ejecutivo Entidades', ' Instituto Marakame', 'Nombre del Titular 18', 'Usuario 18', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'EE.5', 'Poder Ejecutivo Entidades', ' Universidad Tecnológica de la Costa', 'Nombre del Titular 19', 'Usuario 19', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'EE.6', 'Poder Ejecutivo Entidades', ' Universidad Tecnológica de Bahía de Banderas', 'Nombre del Titular 20', 'Usuario 20', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'EE.7', 'Poder Ejecutivo Entidades', ' Universidad Tecnológica de la Sierra', 'Nombre del Titular 21', 'Usuario 21', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'EE.8', 'Poder Ejecutivo Entidades', ' Universidad Tecnológica de Nayarit', 'Nombre del Titular 22', 'Usuario 22', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'EE.9', 'Poder Ejecutivo Entidades', ' Colegio de Educación Profesional Técnica del Estado de Nayarit', 'Nombre del Titular 23', 'Usuario 23', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'EE.10', 'Poder Ejecutivo Entidades', ' Instituto De Planeación del Estado de Nayarit', 'Nombre del Titular 24', 'Usuario 24', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'EE.11', 'Poder Ejecutivo Entidades', ' Consejo de Ciencia y Tecnología del Estado de Nayarit', 'Nombre del Titular 25', 'Usuario 25', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'EE.12', 'Poder Ejecutivo Entidades', ' Consejo Estatal Contra las Adicciones', 'Nombre del Titular 26', 'Usuario 26', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'EE.13', 'Poder Ejecutivo Entidades', ' Fideicomiso de Bahía de Banderas', 'Nombre del Titular 27', 'Usuario 27', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'EE.14', 'Poder Ejecutivo Entidades', ' Instituto de Capacitación para el Trabajo en el Estado de Nayarit', 'Nombre del Titular 28', 'Usuario 28', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'EE.15', 'Poder Ejecutivo Entidades', ' Instituto Nayarita de la Juventud', 'Nombre del Titular 29', 'Usuario 29', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'EE.16', 'Poder Ejecutivo Entidades', ' Instituto para la Mujer Nayarita', 'Nombre del Titular 30', 'Usuario 30', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'EE.17', 'Poder Ejecutivo Entidades', ' Instituto Promotor de la Vivienda de Nayarit', 'Nombre del Titular 31', 'Usuario 31', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'EE.18', 'Poder Ejecutivo Entidades', ' Patronato del Teatro del Pueblo', 'Nombre del Titular 32', 'Usuario 32', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'EE.19', 'Poder Ejecutivo Entidades', ' Instituto Nayarita de Cultura Física y Deporte', 'Nombre del Titular 33', 'Usuario 33', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'EE.20', 'Poder Ejecutivo Entidades', ' Sistema Estatal de Seguridad Pública', 'Nombre del Titular 34', 'Usuario 34', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'EE.21', 'Poder Ejecutivo Entidades', ' Comisión Estatal de Conciliación y Arbitraje Médico', 'Nombre del Titular 35', 'Usuario 35', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'EE.22', 'Poder Ejecutivo Entidades', ' Colegio de Bachilleres del Estado de Nayarit', 'Nombre del Titular 36', 'Usuario 36', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'EE.23', 'Poder Ejecutivo Entidades', ' Patronato de la UAN', 'Nombre del Titular 37', 'Usuario 37', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'EE.24', 'Poder Ejecutivo Entidades', ' Sistema Estatal para el Desarrollo Integral de la Familia', 'Nombre del Titular 38', 'Usuario 38', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'EE.25', 'Poder Ejecutivo Entidades', ' Centro de Justicia Familiar', 'Nombre del Titular 39', 'Usuario 39', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'EE.26', 'Poder Ejecutivo Entidades', ' Colegio de Estudios Científicos y Tecnológicos del Estado de Nayarit', 'Nombre del Titular 40', 'Usuario 40', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'EE.27', 'Poder Ejecutivo Entidades', ' Fideicomiso de Promoción Turística del Estado de Nayarit', 'Nombre del Titular 41', 'Usuario 41', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'EE.28', 'Poder Ejecutivo Entidades', ' Instituto Nayarita de Infraestructura Física Educativa', 'Nombre del Titular 42', 'Usuario 42', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'EE.29', 'Poder Ejecutivo Entidades', ' Consejo Estatal para la Cultura y las Artes de Nayarit', 'Nombre del Titular 43', 'Usuario 43', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'EE.30', 'Poder Ejecutivo Entidades', ' Comisión Forestal de Nayarit', 'Nombre del Titular 44', 'Usuario 44', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'EE.31', 'Poder Ejecutivo Entidades', ' Centro de Desarrollo Económico Educativo de la Mesa Del Nayar', 'Nombre del Titular 45', 'Usuario 45', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'EE.32', 'Poder Ejecutivo Entidades', ' Régimen Estatal de Protección social en salud', 'Nombre del Titular 46', 'Usuario 46', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'EE.33', 'Poder Ejecutivo Entidades', ' Procuraduría Estatal de Protección al Ambiente', 'Nombre del Titular 47', 'Usuario 47', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'EE.34', 'Poder Ejecutivo Entidades', ' Fondos de Fomento Industrial del Estado de Nayarit', 'Nombre del Titular 48', 'Usuario 48', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'EE.35', 'Poder Ejecutivo Entidades', ' Universidad Politécnica de Nayarit', 'Nombre del Titular 49', 'Usuario 49', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'EE.36', 'Poder Ejecutivo Entidades', ' Fondo Mixto Conacyt', 'Nombre del Titular 50', 'Usuario 50', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'EE.37', 'Poder Ejecutivo Entidades', 'Fideicomiso Irrevocable de Inversión y Administración para el Programa Especial de Financiamiento a la Vivienda para el Magisterio del Estado de Nayarit', 'Nombre del Titular 51', 'Usuario 51', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'EE.38', 'Poder Ejecutivo Entidades', ' Sistema de Radio y Televisión de Nayarit', 'Nombre del Titular 52', 'Usuario 52', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'EE.39', 'Poder Ejecutivo Entidades', ' Comisión Estatal de Atención Integral a Victimas del Estado de Nayarit', 'Nombre del Titular 53', 'Usuario 53', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'EE.40', 'Poder Ejecutivo Entidades', 'Secretaría Ejecutiva del Sistema Local Anticorrupción de Nayarit', 'Nombre del Titular 54', 'Usuario 54', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'PL.1', 'Poder Legislativo', 'H. Congreso del Estado de Nayarit', 'Nombre del Titular 55', 'Usuario 55', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'PL.2', 'Poder Legislativo', 'Auditoría Superior del Estado de Nayarit', 'Nombre del Titular 56', 'Usuario 56', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'PJ.1', 'Poder Judicial', 'Poder Judicial del Estado de Nayarit', 'Nombre del Titular 57', 'Usuario 57', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'OA.1', 'Organismos Autónomos', 'Universidad Autónoma de Nayarit', 'Nombre del Titular 58', 'Usuario 58', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'OA.2', 'Organismos Autónomos', ' Instituto Estatal Electoral', 'Nombre del Titular 59', 'Usuario 59', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'OA.3', 'Organismos Autónomos', ' Instituto de Transparencia y Acceso a la Información Pública del Estado', 'Nombre del Titular 60', 'Usuario 60', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'OA.4', 'Organismos Autónomos', ' Comisión de Defensa de los Derechos Humanos para el Estado de Nayarit', 'Nombre del Titular 61', 'Usuario 61', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'OA.5', 'Organismos Autónomos', ' Tribunal Estatal Electoral', 'Nombre del Titular 62', 'Usuario 62', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'OA.6', 'Organismos Autónomos', ' Tribunal de Justicia Administrativa del Estado de Nayarit', 'Nombre del Titular 63', 'Usuario 63', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'OA.7', 'Organismos Autónomos', ' Fiscalía General', 'Nombre del Titular 64', 'Usuario 64', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'PP.1', 'Partidos Políticos', ' Partido Acción Nacional', 'Nombre del Titular 65', 'Usuario 65', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'PP.2', 'Partidos Políticos', ' Partido Revolucionario Institucional', 'Nombre del Titular 66', 'Usuario 66', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'PP.3', 'Partidos Políticos', ' Partido de la Revolución Democrática', 'Nombre del Titular 67', 'Usuario 67', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'PP.4', 'Partidos Políticos', ' Partido Verde Ecologista de México', 'Nombre del Titular 68', 'Usuario 68', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'PP.5', 'Partidos Políticos', ' Movimiento Ciudadano', 'Nombre del Titular 69', 'Usuario 69', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'PP.6', 'Partidos Políticos', ' Partido Nueva Alianza Nayarit', 'Nombre del Titular 70', 'Usuario 70', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'PP.7', 'Partidos Políticos', ' Movimiento Regeneración Nacional', 'Nombre del Titular 71', 'Usuario 71', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'PP.8', 'Partidos Políticos', ' Partido del Trabajo', 'Nombre del Titular 72', 'Usuario 72', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'PP.9', 'Partidos Políticos', ' Partido Encuentro Social', 'Nombre del Titular 73', 'Usuario 73', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'PP.10', 'Partidos Políticos', ' Partido Político Local Visión y Valores en Acción (VIVA)', 'Nombre del Titular 74', 'Usuario 74', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'PP.11', 'Partidos Políticos', ' Partido Movimiento Levantate para Nayarit', 'Nombre del Titular 75', 'Usuario 75', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'PM.1', 'Personas Morales', 'Federación de Estudiantes de la Universidad Autónoma de Nayarit', 'Nombre del Titular 76', 'Usuario 76', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'S.1', 'Sindicatos', 'SUTSEM. Sindicato Único de Trabajadores al Servicio de los Poderes del Estado, Municipios e Instituciones Descentralizadas de Carácter Estatal de Nayarit', 'Nombre del Titular 77', 'Usuario 77', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'S.2', 'Sindicatos', ' SITRAPEN. Sindicato de Trabajadores del Poder Ejecutivo de Nayarit', 'Nombre del Titular 78', 'Usuario 78', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'S.3', 'Sindicatos', ' SITEM. Sindicato de Trabajadores al Servicio de los Poderes del Estado, Municipios y Organismos Descentralizados en Nayarit', 'Nombre del Titular 79', 'Usuario 79', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'S.4', 'Sindicatos', ' SITRAyD. Sindicato de Trabajadores de Servicios Académicos y Docentes del Colegio de Educación Profesional Técnica del Estado de Nayarit', 'Nombre del Titular 80', 'Usuario 80', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'S.5', 'Sindicatos', ' SUNTUAN. Sindicato Unitario de Trabajadores de la Universidad Autónoma de Nayarit', 'Nombre del Titular 81', 'Usuario 81', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'S.6', 'Sindicatos', ' STCECyTEN. Sindicato de Trabajadores del Colegio de Estudios Científicos y Tecnológicos del Estado de Nayarit', 'Nombre del Titular 82', 'Usuario 82', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'S.7', 'Sindicatos', ' SETDIF. Sindicato Estatal de Trabajadores del Sistema para el Desarrollo Integral de la Familia', 'Nombre del Titular 83', 'Usuario 83', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'S.8', 'Sindicatos', ' SPAUAN. Sindicato de Personal Académico de la Universidad Autónoma de Nayarit', 'Nombre del Titular 84', 'Usuario 84', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'S.9', 'Sindicatos', ' SETUAN. Sindicato de Empleados y Trabajadores de la Universidad Autónoma de Nayarit', 'Nombre del Titular 85', 'Usuario 85', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'S.10', 'Sindicatos', ' SUTSEN. Sindicato de Unidad de Trabajadores al Servicio de los poderes del Estado, Municipios y Organismos Públicos Descentralizados del Estado de Nayarit', 'Nombre del Titular 86', 'Usuario 86', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'S.11', 'Sindicatos', ' SITTEP. Sindicato de Trabajadores del Teatro del Pueblo', 'Nombre del Titular 87', 'Usuario 87', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'A.1', 'Ayuntamientos', 'H. Ayuntamiento de Acaponeta', 'Nombre del Titular 88', 'PruebaAcaponeta', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Sujeto Obligado', 'vistas/img/usuarios/A.1 H. Ayuntamiento de Acaponeta/664.jpg', 'vistas/pdfs/usuarios/A.1 H. Ayuntamiento de Acaponeta/224.pdf', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'A.2', 'Ayuntamientos', 'H. Ayuntamiento de Ahuacatlán', 'Nombre del Titular 89', 'Usuario89', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', 'Sujeto Obligado', 'vistas/img/usuarios/A.2 H. Ayuntamiento de Ahuacatlán/804.jpg', 'vistas/pdfs/usuarios/A.2 H. Ayuntamiento de Ahuacatlán/208.pdf', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'A.3', 'Ayuntamientos', 'H. Ayuntamiento de Amatlán de Cañas', 'Nombre del Titular 90', 'Usuario 90', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Sujeto Obligado', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'A.4', 'Ayuntamientos', 'H. Ayuntamiento de Bahia de Banderas', 'Nombre del Titular 91', 'Usuario 91', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'A.5', 'Ayuntamientos', 'H. Ayuntamiento de Compostela', 'Nombre del Titular 92', 'Usuario 92', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'A.6', 'Ayuntamientos', 'H. Ayuntamiento de Del Nayar', 'Nombre del Titular 93', 'Usuario 93', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'A.7', 'Ayuntamientos', 'H. Ayuntamiento de Huajicori', 'Nombre del Titular 94', 'Usuario 94', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'A.8', 'Ayuntamientos', 'H. Ayuntamiento de Ixtlán del Río', 'Nombre del Titular 95', 'Usuario 95', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'A.9', 'Ayuntamientos', 'H. Ayuntamiento de Jala', 'Nombre del Titular 96', 'Usuario 96', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'A.10', 'Ayuntamientos', 'H. Ayuntamiento de La Yesca', 'Nombre del Titular 97', 'Usuario 97', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'A.11', 'Ayuntamientos', 'H. Ayuntamiento de Rosamorada', 'Nombre del Titular 98', 'Usuario 98', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'A.12', 'Ayuntamientos', 'H. Ayuntamiento de Ruiz', 'Nombre del Titular 99', 'Usuario 99', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'A.13', 'Ayuntamientos', 'H. Ayuntamiento de San Blas', 'Nombre del Titular 100', 'Usuario 100', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'A.14', 'Ayuntamientos', 'H. Ayuntamiento de San Pedro Laguinillas', 'Nombre del Titular 101', 'Usuario 101', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'A.15', 'Ayuntamientos', 'H. Ayuntamiento de Santa María del Oro', 'Nombre del Titular 102', 'Usuario 102', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'A.16', 'Ayuntamientos', 'H. Ayuntamiento de Santiago Ixcuintla', 'Nombre del Titular 103', 'Usuario 103', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'A.17', 'Ayuntamientos', 'H. Ayuntamiento de Tecuala', 'Nombre del Titular 104', 'Usuario 104', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'A.18', 'Ayuntamientos', 'H. Ayuntamiento de Tepic', 'Nombre del Titular 105', 'Usuario 105', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'A.19', 'Ayuntamientos', 'H. Ayuntamiento de Tuxpan', 'Nombre del Titular 106', 'Usuario 106', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'A.20', 'Ayuntamientos', 'H. Ayuntamiento de Xalisco', 'Nombre del Titular 107', 'Usuario 107', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'DIF.1', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Acaponeta', 'Nombre del Titular 108', 'Usuario 108', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'DIF.2', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Ahuacatlán', 'Nombre del Titular 109', 'Usuario 109', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'DIF.3', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Amatlán de Cañas', 'Nombre del Titular 110', 'Usuario 110', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'DIF.4', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Bahia de Banderas', 'Nombre del Titular 111', 'Usuario 111', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'DIF.5', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Compostela', 'Nombre del Titular 112', 'Usuario 112', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'DIF.6', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Del Nayar', 'Nombre del Titular 113', 'Usuario 113', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'DIF.7', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Huajicori', 'Nombre del Titular 114', 'Usuario 114', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'DIF.8', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Ixtlán del Río', 'Nombre del Titular 115', 'Usuario 115', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'DIF.9', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Jala', 'Nombre del Titular 116', 'Usuario 116', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'DIF.10', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de La Yesca', 'Nombre del Titular 117', 'Usuario 117', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'DIF.11', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Rosamorada', 'Nombre del Titular 118', 'Usuario 118', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'DIF.12', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Ruiz', 'Nombre del Titular 119', 'Usuario 119', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'DIF.13', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de San Blas', 'Nombre del Titular 120', 'Usuario 120', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'DIF.14', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de San Pedro Laguinillas', 'Nombre del Titular 121', 'Usuario 121', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'DIF.15', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Santa María del Oro', 'Nombre del Titular 122', 'Usuario 122', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'DIF.16', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Santiago Ixcuintla', 'Nombre del Titular 123', 'Usuario 123', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'DIF.17', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Tecuala', 'Nombre del Titular 124', 'Usuario 124', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'DIF.18', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Tepic', 'Nombre del Titular 125', 'Usuario 125', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'DIF.19', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Tuxpan', 'Nombre del Titular 126', 'Usuario 126', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'DIF.20', 'Sistema Municipal para el Desarrollo Integral de la Familia ', 'Sistema Municipal para el Desarrollo Integral de la Familia de Xalisco', 'Nombre del Titular 127', 'Usuario 127', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'OOA.1', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Acaponeta', 'Nombre del Titular 128', 'Usuario 128', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'OOA.2', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Ahuacatlán', 'Nombre del Titular 129', 'Usuario 129', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'OOA.3', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Amatlán de Cañas', 'Nombre del Titular 130', 'Usuario 130', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'OOA.4', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Bahia de Banderas', 'Nombre del Titular 131', 'Usuario 131', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'OOA.5', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Compostela', 'Nombre del Titular 132', 'Usuario 132', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'OOA.6', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Del Nayar', 'Nombre del Titular 133', 'Usuario 133', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'OOA.7', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Huajicori', 'Nombre del Titular 134', 'Usuario 134', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'OOA.8', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Ixtlán del Río', 'Nombre del Titular 135', 'Usuario 135', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'OOA.9', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Jala', 'Nombre del Titular 136', 'Usuario 136', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'OOA.10', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de La Yesca', 'Nombre del Titular 137', 'Usuario 137', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'OOA.11', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Rosamorada', 'Nombre del Titular 138', 'Usuario 138', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'OOA.12', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Ruiz', 'Nombre del Titular 139', 'Usuario 139', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'OOA.13', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de San Blas', 'Nombre del Titular 140', 'Usuario 140', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'OOA.14', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de San Pedro Laguinillas', 'Nombre del Titular 141', 'Usuario 141', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'OOA.15', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Santa María del Oro', 'Nombre del Titular 142', 'Usuario 142', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'OOA.16', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Santiago Ixcuintla', 'Nombre del Titular 143', 'Usuario 143', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'OOA.17', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Tecuala', 'Nombre del Titular 144', 'Usuario 144', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'OOA.18', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Tepic', 'Nombre del Titular 145', 'Usuario 145', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'OOA.19', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Tuxpan', 'Nombre del Titular 146', 'Usuario 146', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'OOA.20', 'Organismos Operadores de Agua Potable y Alcantarillado', 'Organismos Operadores de Agua Potable y Alcantarillado de Xalisco', 'Nombre del Titular 147', 'Usuario 147', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'OPD.1', 'Organismos Públicos Descentralizados', 'Instituto Municipal de Planeación de Bahía de Banderas (IMPLAN)', 'Nombre del Titular 148', 'Usuario 148', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'OPD.2', 'Organismos Públicos Descentralizados', 'Instituto Municipal de Planeación de Tepic (IMPLAN)', 'Nombre del Titular 149', 'Usuario 149', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'OPD.3', 'Organismos Públicos Descentralizados', 'Comision Municipal de Derechos Humanos de Tepic', 'Nombre del Titular 150', 'Usuario 150', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'OPD.4', 'Organismos Públicos Descentralizados', 'Comision Municipal de Derechos Humanos de Bahia de Banderas', 'Nombre del Titular 151', 'Usuario 151', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'OPD.5', 'Organismos Públicos Descentralizados', ' Instituto Municipal de Planeación de Tuxpan', 'Nombre del Titular 152', 'Usuario 152', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'OPD.6', 'Organismos Públicos Descentralizados', ' Instituto Municipal de Planeación de Santa María Del Oro', 'Nombre del Titular 153', 'Usuario 153', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'OPD.7', 'Organismos Públicos Descentralizados', ' Instituto Municipal de Planeación de La Yesca', 'Nombre del Titular 154', 'Usuario 154', '12345', 'Sujeto Obligado', NULL, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'ADM.1', 'Administrativo Interno ITAI', 'ITAI Administrativo', 'Stevens Javier Vera Enriquez', 'StevensVera', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Administrador', '', '', 1, NULL, '2021-07-28 02:07:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`idCA`) USING BTREE;

--
-- Indices de la tabla `detalle_usuario_sa`
--
ALTER TABLE `detalle_usuario_sa`
  ADD PRIMARY KEY (`idUSA`),
  ADD KEY `FK_detalle_usuario_sa_usuarios` (`idusuario`),
  ADD KEY `FK_detalle_usuario_sa_solicitudes_arco` (`idSAR`);

--
-- Indices de la tabla `detalle_usuario_si`
--
ALTER TABLE `detalle_usuario_si`
  ADD PRIMARY KEY (`idUSI`) USING BTREE,
  ADD KEY `FK_detalle_usuario_si_usuarios` (`idusuario`),
  ADD KEY `FK_detalle_usuario_si_solicitudes_informacion` (`idSI`);

--
-- Indices de la tabla `solicitudes_arco`
--
ALTER TABLE `solicitudes_arco`
  ADD PRIMARY KEY (`idSAR`) USING BTREE;

--
-- Indices de la tabla `solicitudes_informacion`
--
ALTER TABLE `solicitudes_informacion`
  ADD PRIMARY KEY (`idSI`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `idCA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_usuario_sa`
--
ALTER TABLE `detalle_usuario_sa`
  MODIFY `idUSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_usuario_si`
--
ALTER TABLE `detalle_usuario_si`
  MODIFY `idUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `solicitudes_arco`
--
ALTER TABLE `solicitudes_arco`
  MODIFY `idSAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `solicitudes_informacion`
--
ALTER TABLE `solicitudes_informacion`
  MODIFY `idSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_usuario_sa`
--
ALTER TABLE `detalle_usuario_sa`
  ADD CONSTRAINT `FK_detalle_usuario_sa_solicitudes_arco` FOREIGN KEY (`idSAR`) REFERENCES `solicitudes_arco` (`idSAR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_detalle_usuario_sa_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_usuario_si`
--
ALTER TABLE `detalle_usuario_si`
  ADD CONSTRAINT `FK_detalle_usuario_si_solicitudes_informacion` FOREIGN KEY (`idSI`) REFERENCES `solicitudes_informacion` (`idSI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_detalle_usuario_si_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
