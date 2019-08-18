-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-07-2019 a las 16:33:57
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbfaktor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradora`
--

DROP TABLE IF EXISTS `aseguradora`;
CREATE TABLE IF NOT EXISTS `aseguradora` (
  `idAseguradora` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAseguradra` varchar(50) NOT NULL,
  `direccionAseguradora` varchar(45) NOT NULL,
  `pagina` varchar(400) NOT NULL,
  PRIMARY KEY (`idAseguradora`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aseguradora`
--

INSERT INTO `aseguradora` (`idAseguradora`, `nombreAseguradra`, `direccionAseguradora`, `pagina`) VALUES
(1, 'aseguradora monterrey', 'calle francisco villa numero 8f', 'www.aseguradoramonterrerey.com'),
(2, 'gnp seguros', 'av. paseo de la  reforma', 'www.gnpseguros.com'),
(3, 'Seguros MAPFRE', 'carretera transismica numero 2', 'www.seguromapfre.com'),
(4, 'aseguradora monte', 'calle ejercito mexicano', 'www.segurosmexico.com'),
(5, 'GNP seguros', 'Tecoyotitla 412 Col. Ex Hacienda de Guadalupe', 'www.gnpseguros.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casomedico`
--

DROP TABLE IF EXISTS `casomedico`;
CREATE TABLE IF NOT EXISTS `casomedico` (
  `idCasoMedico` int(11) NOT NULL AUTO_INCREMENT,
  `siniestro` varchar(45) DEFAULT NULL,
  `fechaCasoMedico` datetime DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `rolMedicoEnCaso` varchar(45) DEFAULT NULL,
  `honorariosMedico` double DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `documentosCasoMedico_iddocumentosCasoMedico` int(11) NOT NULL,
  `Paciente_idPaciente` int(11) NOT NULL,
  `Aseguradora_idAseguradora` int(11) NOT NULL,
  PRIMARY KEY (`idCasoMedico`,`documentosCasoMedico_iddocumentosCasoMedico`),
  KEY `fk_CasoMedico_Usuario_idx` (`Usuario_idUsuario`),
  KEY `fk_CasoMedico_documentosCasoMedico1_idx` (`documentosCasoMedico_iddocumentosCasoMedico`),
  KEY `fk_CasoMedico_Paciente1_idx` (`Paciente_idPaciente`),
  KEY `fk_CasoMedico_Aseguradora1_idx` (`Aseguradora_idAseguradora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoscasomedico`
--

DROP TABLE IF EXISTS `documentoscasomedico`;
CREATE TABLE IF NOT EXISTS `documentoscasomedico` (
  `iddocumentosCasoMedico` int(11) NOT NULL AUTO_INCREMENT,
  `pdfCartaAprobacion` varchar(45) DEFAULT NULL,
  `pdfFacturaHonorarios` varchar(45) DEFAULT NULL,
  `xmlFacturaHonorarios` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddocumentosCasoMedico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentospersonal`
--

DROP TABLE IF EXISTS `documentospersonal`;
CREATE TABLE IF NOT EXISTS `documentospersonal` (
  `idDocumentosPersonal` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(200) DEFAULT NULL,
  `cedulaBancaria` varchar(200) DEFAULT NULL,
  `cedulaFiscal` varchar(200) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`idDocumentosPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documentospersonal`
--

INSERT INTO `documentospersonal` (`idDocumentosPersonal`, `identificacion`, `cedulaBancaria`, `cedulaFiscal`, `fechaCreacion`, `fechaFinal`) VALUES
(1, 'aaaaaaasaaa', 'aaaaaaaaasdsfdgdfgdfdf', 'sfsgfhfgfsdfsadfsdfsdfsdf', '2019-07-19 00:00:00', '2019-07-19 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(45) NOT NULL,
  `apellidoPatPaciente` varchar(45) NOT NULL,
  `apellidoMatPaciente` varchar(45) NOT NULL,
  `hospital` varchar(45) NOT NULL,
  `cuartoHospital` varchar(45) NOT NULL,
  `numTelefonoPaciente` varchar(45) NOT NULL,
  `emailPaciente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nombrePaciente`, `apellidoPatPaciente`, `apellidoMatPaciente`, `hospital`, `cuartoHospital`, `numTelefonoPaciente`, `emailPaciente`) VALUES
(1, 'bernardo', 'regalado', 'cabrera ', 'issste', 'cuarto 18', '9941061745', 'brc@gmail.com'),
(2, 'luis guillermo', 'escobar', 'barrera', '', '', '9941106145', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `passwordUsuario` varchar(45) DEFAULT NULL,
  `nombreUsuario` varchar(45) DEFAULT NULL,
  `apellidoPatUsuario` varchar(45) DEFAULT NULL,
  `apellidoMatUsuario` varchar(45) DEFAULT NULL,
  `direccionUsuario` varchar(45) DEFAULT NULL,
  `numTelefonoUsuario` varchar(45) DEFAULT NULL,
  `numCuenta` varchar(45) DEFAULT NULL,
  `bancoAfiliado` varchar(45) DEFAULT NULL,
  `folioFiscal` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `infoCompleta` int(1) DEFAULT NULL,
  `fechaCreacionUser` datetime DEFAULT NULL,
  `rolUsuario` varchar(45) DEFAULT NULL,
  `DocumentosPersonal_idDocumentosPersonal` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`DocumentosPersonal_idDocumentosPersonal`),
  KEY `fk_Usuario_DocumentosPersonal1_idx` (`DocumentosPersonal_idDocumentosPersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `passwordUsuario`, `nombreUsuario`, `apellidoPatUsuario`, `apellidoMatUsuario`, `direccionUsuario`, `numTelefonoUsuario`, `numCuenta`, `bancoAfiliado`, `folioFiscal`, `rfc`, `isDeleted`, `status`, `infoCompleta`, `fechaCreacionUser`, `rolUsuario`, `DocumentosPersonal_idDocumentosPersonal`) VALUES
(1, 'm@m.m', '202cb962ac59075b964b07152d234b70', 'Master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '1', 1),
(2, 'b@b.b', '81dc9bdb52d04dc20036dbd8313ed055', 'bernardo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_aseguradora`
--

DROP TABLE IF EXISTS `usuario_has_aseguradora`;
CREATE TABLE IF NOT EXISTS `usuario_has_aseguradora` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Aseguradora_idAseguradora` int(11) NOT NULL,
  `usuarioAseguradora` varchar(45) NOT NULL,
  `passwordAseguradora` varchar(45) NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`,`Aseguradora_idAseguradora`),
  KEY `fk_Usuario_has_Aseguradora_Aseguradora1_idx` (`Aseguradora_idAseguradora`),
  KEY `fk_Usuario_has_Aseguradora_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casomedico`
--
ALTER TABLE `casomedico`
  ADD CONSTRAINT `fk_CasoMedico_Aseguradora1` FOREIGN KEY (`Aseguradora_idAseguradora`) REFERENCES `aseguradora` (`idAseguradora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_Paciente1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CasoMedico_documentosCasoMedico1` FOREIGN KEY (`documentosCasoMedico_iddocumentosCasoMedico`) REFERENCES `documentoscasomedico` (`iddocumentosCasoMedico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_DocumentosPersonal1` FOREIGN KEY (`DocumentosPersonal_idDocumentosPersonal`) REFERENCES `documentospersonal` (`idDocumentosPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_aseguradora`
--
ALTER TABLE `usuario_has_aseguradora`
  ADD CONSTRAINT `fk_Usuario_has_Aseguradora_Aseguradora1` FOREIGN KEY (`Aseguradora_idAseguradora`) REFERENCES `aseguradora` (`idAseguradora`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Aseguradora_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
