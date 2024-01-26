-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.2.0-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para rh
CREATE DATABASE IF NOT EXISTS `rh` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `rh`;

-- Volcando estructura para tabla rh.briggs
CREATE TABLE IF NOT EXISTS `briggs` (
  `idBriggs` int(11) NOT NULL AUTO_INCREMENT,
  `extrovertido` int(10) DEFAULT NULL,
  `introvertido` int(10) DEFAULT NULL,
  `sensorial` int(10) DEFAULT NULL,
  `intuitivo` int(10) DEFAULT NULL,
  `racional` int(10) DEFAULT NULL,
  `emocional` int(10) DEFAULT NULL,
  `calificador` int(10) DEFAULT NULL,
  `perceptivo` int(10) DEFAULT NULL,
  `idCandidato` int(11) NOT NULL,
  PRIMARY KEY (`idBriggs`),
  KEY `FK_Candidato_Briggs` (`idCandidato`),
  CONSTRAINT `FK_Candidato_Briggs` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rh.briggs: ~9 rows (aproximadamente)
DELETE FROM `briggs`;
INSERT INTO `briggs` (`idBriggs`, `extrovertido`, `introvertido`, `sensorial`, `intuitivo`, `racional`, `emocional`, `calificador`, `perceptivo`, `idCandidato`) VALUES
	(1, 0, 0, 0, 0, 0, 0, 0, 0, 15),
	(2, 0, 0, 0, 0, 0, 0, 0, 0, 14),
	(3, 3, 2, 0, 1, 3, 3, 1, 2, 13),
	(4, 0, 0, 0, 0, 0, 0, 0, 0, 13),
	(5, 0, 0, 0, 0, 0, 0, 0, 0, 13),
	(6, 0, 0, 0, 0, 0, 0, 0, 0, 13),
	(7, 0, 0, 0, 0, 0, 0, 0, 0, 13),
	(8, 0, 0, 0, 0, 0, 0, 0, 0, 13),
	(9, 0, 0, 0, 0, 0, 0, 0, 0, 13);

-- Volcando estructura para tabla rh.candidato
CREATE TABLE IF NOT EXISTS `candidato` (
  `idCandidato` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) DEFAULT NULL,
  `Puesto` varchar(45) DEFAULT NULL,
  `DPI` varchar(13) DEFAULT NULL,
  `temperamento` int(10) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `fecha_crear` date DEFAULT NULL,
  `Temporal` int(11) DEFAULT NULL,
  `melancolico` int(11) DEFAULT NULL,
  `colerico` int(11) DEFAULT NULL,
  `flematico` int(11) DEFAULT NULL,
  `sanguineo` int(11) DEFAULT NULL,
  `notas` varchar(50) DEFAULT NULL,
  `Briggs` int(10) DEFAULT NULL,
  `Valanti` int(10) DEFAULT NULL,
  PRIMARY KEY (`idCandidato`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.candidato: ~3 rows (aproximadamente)
DELETE FROM `candidato`;
INSERT INTO `candidato` (`idCandidato`, `Nombres`, `Puesto`, `DPI`, `temperamento`, `Contacto`, `Correo`, `fecha_crear`, `Temporal`, `melancolico`, `colerico`, `flematico`, `sanguineo`, `notas`, `Briggs`, `Valanti`) VALUES
	(13, 'Marlon Ruiz Gonzalez', 'Desarrollador Junior', '2474218042214', 0, '50517389', 'mruiz996@outlook.com', '2023-11-19', 0, 44, 95, 55, 21, '', 1, 0),
	(14, '', '', '2474218042213', 0, '', '', '2023-11-25', 2, 37, 42, 16, 6, NULL, 0, 1),
	(15, '', '', '1111111111111', 0, '', '', '2023-11-25', 1, 0, 0, 0, 0, NULL, 0, 1);

-- Volcando estructura para tabla rh.debilidad
CREATE TABLE IF NOT EXISTS `debilidad` (
  `idPersonalidad` int(11) NOT NULL AUTO_INCREMENT,
  `Personalidad` varchar(50) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `idCandidato` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonalidad`) USING BTREE,
  KEY `FK_personalidad_candidatso` (`idCandidato`) USING BTREE,
  CONSTRAINT `FK_personalidad_candidatso` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.debilidad: ~142 rows (aproximadamente)
DELETE FROM `debilidad`;
INSERT INTO `debilidad` (`idPersonalidad`, `Personalidad`, `Tipo`, `idCandidato`) VALUES
	(62, 'Mandón', 'B', 13),
	(63, 'Antipático', 'B', 13),
	(64, 'Repetidor', 'A', 13),
	(65, 'Olvidadizo', 'A', 13),
	(66, 'Interrumpe', 'A', 13),
	(67, 'Imprevisible', 'A', 13),
	(68, 'Descuidado', 'A', 13),
	(69, 'Orgulloso', 'B', 13),
	(70, 'Iracundo', 'A', 13),
	(71, 'Ingénuo', 'A', 13),
	(72, 'Egocéntrico', 'A', 13),
	(73, 'Hablador', 'A', 13),
	(74, 'Desorganizado', 'A', 13),
	(75, 'Estridente', 'A', 13),
	(76, 'Estridente', 'A', 13),
	(77, 'Indisciplinado', 'A', 13),
	(78, 'Repetidor', 'A', 13),
	(79, 'Olvidadizo', 'A', 13),
	(80, 'Interrumpe', 'A', 13),
	(81, 'Imprevisible', 'A', 13),
	(82, 'Descuidado', 'A', 13),
	(83, 'Tolerante', 'A', 13),
	(84, 'Iracundo', 'A', 13),
	(85, 'Ingénuo', 'A', 13),
	(86, 'Egocéntrico', 'A', 13),
	(87, 'Hablador', 'A', 13),
	(88, 'Desorganizado', 'A', 13),
	(89, 'Inconsistente', 'A', 13),
	(90, 'Desordenado', 'A', 13),
	(91, 'Ostentoso', 'A', 13),
	(92, 'Emocional', 'A', 13),
	(93, 'Atolondrado', 'A', 13),
	(94, 'Inquieto', 'A', 13),
	(95, 'Variable', 'A', 13),
	(96, 'Variable', 'A', 13),
	(97, 'Mandón', 'B', 13),
	(98, 'Antipático', 'B', 13),
	(99, 'Resistente', 'B', 13),
	(100, 'Olvidadizo', 'A', 13),
	(101, 'Impaciente', 'B', 13),
	(102, 'Frío', 'B', 13),
	(103, 'Descuidado', 'A', 13),
	(104, 'Orgulloso', 'B', 13),
	(105, 'Iracundo', 'A', 13),
	(106, 'Nervioso', 'B', 13),
	(107, 'Distraído', 'C', 13),
	(108, 'Tímido', 'D', 13),
	(109, 'Dudoso', 'D', 13),
	(110, 'Intolerante', 'B', 13),
	(111, 'Desordenado', 'A', 13),
	(112, 'Lento', 'D', 13),
	(113, 'Solitario', 'C', 13),
	(114, 'Suspicaz', 'C', 13),
	(115, 'Vengativo', 'C', 13),
	(116, 'Crítico', 'D', 13),
	(117, 'Soso', 'D', 13),
	(118, 'Sin entusiasmo', 'C', 13),
	(119, 'Reticente', 'D', 13),
	(120, 'Exigente', 'C', 13),
	(121, 'Inseguro', 'C', 13),
	(122, 'Frío', 'B', 13),
	(123, 'Terco', 'B', 13),
	(124, 'Pesimista', 'C', 13),
	(125, 'Taciturno', 'D', 13),
	(126, 'Negativo', 'C', 13),
	(127, 'Ansioso', 'D', 13),
	(128, 'Susceptible', 'C', 13),
	(129, 'Dudoso', 'D', 13),
	(130, 'Introvertido', 'C', 13),
	(131, 'Moroso', 'C', 13),
	(132, 'Testarudo', 'B', 13),
	(133, 'Prepotente', 'B', 13),
	(134, 'Malgeniado', 'B', 13),
	(135, 'Precipitado', 'B', 13),
	(136, 'Astuto', 'B', 13),
	(137, 'Astuto', 'B', 13),
	(138, 'Astuto', 'B', 13),
	(139, 'Comprometedor', 'C', 13),
	(140, 'Astuto', 'B', 13),
	(141, 'Comprometedor', 'C', 13),
	(142, 'Crítico', 'D', 13),
	(143, 'Comprometedor', 'C', 13),
	(144, 'Crítico', 'D', 13),
	(145, 'Comprometedor', 'C', 13),
	(146, 'Crítico', 'D', 13),
	(147, 'Comprometedor', 'C', 13),
	(148, 'Astuto', 'B', 13),
	(149, 'Comprometedor', 'C', 13),
	(150, 'Crítico', 'D', 13),
	(151, 'Comprometedor', 'C', 13),
	(152, 'Crítico', 'D', 13),
	(153, 'Comprometedor', 'C', 13),
	(154, 'Astuto', 'B', 13),
	(155, 'Comprometedor', 'C', 13),
	(156, 'Astuto', 'B', 13),
	(157, 'Comprometedor', 'C', 13),
	(158, 'Astuto', 'B', 13),
	(159, 'Comprometedor', 'C', 13),
	(160, 'Astuto', 'B', 13),
	(161, 'Precipitado', 'B', 13),
	(162, 'Precipitado', 'B', 13),
	(163, 'Precipitado', 'B', 13),
	(164, 'Vengativo', 'C', 13),
	(165, 'Precipitado', 'B', 13),
	(166, 'Vengativo', 'C', 13),
	(167, 'Precipitado', 'B', 13),
	(168, 'Vengativo', 'C', 13),
	(169, 'Precipitado', 'B', 13),
	(170, 'Vengativo', 'C', 13),
	(171, 'Poca voluntad', 'D', 13),
	(172, 'Vengativo', 'C', 13),
	(173, 'Poca voluntad', 'D', 13),
	(174, 'Vengativo', 'C', 13),
	(175, 'Precipitado', 'B', 13),
	(176, 'Vengativo', 'C', 13),
	(177, 'Poca voluntad', 'D', 13),
	(178, 'Vengativo', 'C', 13),
	(179, 'Poca voluntad', 'D', 13),
	(180, 'Vengativo', 'C', 13),
	(181, 'Poca voluntad', 'D', 13),
	(182, 'Vengativo', 'C', 13),
	(183, 'Precipitado', 'B', 13),
	(184, 'Precipitado', 'B', 13),
	(185, 'Precipitado', 'B', 13),
	(186, 'Astuto', 'B', 13),
	(187, 'Astuto', 'B', 13),
	(188, 'Comprometedor', 'C', 13),
	(189, 'Astuto', 'B', 13),
	(190, 'Astuto', 'B', 13),
	(191, 'Astuto', 'B', 13),
	(192, 'Astuto', 'B', 13),
	(193, 'Astuto', 'B', 13),
	(194, 'Astuto', 'B', 13),
	(195, 'Astuto', 'B', 13),
	(196, 'Astuto', 'B', 13),
	(197, 'Astuto', 'B', 13),
	(198, 'Astuto', 'B', 13),
	(199, 'Astuto', 'B', 13),
	(200, 'Astuto', 'B', 13),
	(201, 'Astuto', 'B', 13),
	(202, 'Astuto', 'B', 13),
	(203, 'Astuto', 'B', 13),
	(204, 'Astuto', 'B', 13),
	(205, 'Variable', 'A', 13),
	(206, 'Variable', 'A', 13),
	(207, 'Variable', 'A', 13),
	(208, 'Variable', 'A', 13);

-- Volcando estructura para tabla rh.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.empresa: ~0 rows (aproximadamente)
DELETE FROM `empresa`;
INSERT INTO `empresa` (`idEmpresa`, `Nombre`, `Direccion`, `Contacto`, `Numero`) VALUES
	(1, 'Megapolizas', '7 av 18-78 zona 13', 'Humberto\r\n', '23184444');

-- Volcando estructura para tabla rh.fortaleza
CREATE TABLE IF NOT EXISTS `fortaleza` (
  `idPersonalidad` int(11) NOT NULL AUTO_INCREMENT,
  `Personalidad` varchar(50) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `idCandidato` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonalidad`),
  KEY `FK_personalidad_candidato` (`idCandidato`),
  CONSTRAINT `FK_personalidad_candidato` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.fortaleza: ~119 rows (aproximadamente)
DELETE FROM `fortaleza`;
INSERT INTO `fortaleza` (`idPersonalidad`, `Personalidad`, `Tipo`, `idCandidato`) VALUES
	(101, 'Animado', 'A', 13),
	(102, 'Jugueton', 'A', 13),
	(103, NULL, 'A', 13),
	(104, 'Animado', 'A', 13),
	(105, 'Persuasivo', 'B', 13),
	(106, 'Abnegado', 'C', 13),
	(107, 'Convincente', 'A', 13),
	(108, 'Respetuoso', 'C', 13),
	(109, 'Autosuficiente', 'B', 13),
	(110, 'Activista', 'A', 13),
	(111, 'Atento', 'D', 13),
	(112, 'Fiel', 'C', 13),
	(113, 'Diplomático', 'D', 13),
	(114, 'Culto', 'C', 13),
	(115, 'Independiente', 'B', 13),
	(116, 'Introspectivo', 'C', 13),
	(117, 'Instigador', 'B', 13),
	(118, 'Considerado', 'C', 13),
	(119, 'Escucha', 'D', 13),
	(120, 'Listo', 'A', 13),
	(121, 'Productivo', 'B', 13),
	(122, 'Atrevido', 'B', 13),
	(123, NULL, 'A', 13),
	(124, 'Aventurero', 'B', 13),
	(125, NULL, 'B', 13),
	(126, NULL, 'A', 13),
	(127, 'Aventurero', 'B', 13),
	(128, 'Jugueton', 'A', 13),
	(129, 'Decidido', 'B', 13),
	(130, 'Convincente', 'A', 13),
	(131, 'Reservado', 'D', 13),
	(132, 'Sensible', 'C', 13),
	(133, 'Paciente', 'D', 13),
	(134, 'Seguro', 'B', 13),
	(135, 'Optimista', 'A', 13),
	(136, 'Dominante', 'B', 13),
	(137, 'Detallista', 'C', 13),
	(138, 'Alegre', 'A', 13),
	(139, 'Independiente', 'B', 13),
	(140, 'Cálido', 'A', 13),
	(141, 'Instigador', 'B', 13),
	(142, 'Tolerante', 'D', 13),
	(143, 'Leal', 'C', 13),
	(144, 'Jefe', 'B', 13),
	(145, 'Popular', 'A', 13),
	(146, 'Atrevido', 'B', 13),
	(147, 'Animado', 'A', 13),
	(148, 'Animado', 'A', 13),
	(149, 'Jugueton', 'A', 13),
	(150, 'Sociable', 'A', 13),
	(151, 'Convincente', 'A', 13),
	(152, 'Entusiasta', 'A', 13),
	(153, 'Enérgico', 'A', 13),
	(154, 'Activista', 'A', 13),
	(155, 'Espontáneo', 'A', 13),
	(156, 'Optimista', 'A', 13),
	(157, 'Humorístico', 'A', 13),
	(158, 'Encantador', 'A', 13),
	(159, 'Alegre', 'A', 13),
	(160, 'Animado', 'A', 13),
	(161, 'Jugueton', 'A', 13),
	(162, 'Sociable', 'A', 13),
	(163, 'Convincente', 'A', 13),
	(164, 'Entusiasta', 'A', 13),
	(165, 'Enérgico', 'A', 13),
	(166, 'Activista', 'A', 13),
	(167, 'Espontáneo', 'A', 13),
	(168, 'Optimista', 'A', 13),
	(169, 'Humorístico', 'A', 13),
	(170, 'Encantador', 'A', 13),
	(171, 'Alegre', 'A', 13),
	(172, 'Inspirador', 'A', 13),
	(173, 'Cálido', 'A', 13),
	(174, 'Cordial', 'A', 13),
	(175, 'Conversador', 'A', 13),
	(176, 'Vivaz', 'A', 13),
	(177, 'Listo', 'A', 13),
	(178, 'Popular', 'A', 13),
	(179, 'Jovial', 'A', 13),
	(180, 'Animado', 'A', 13),
	(181, 'Persuasivo', 'B', 13),
	(182, 'Abnegado', 'C', 13),
	(183, 'Competitivo', 'B', 13),
	(184, 'Inventivo', 'B', 13),
	(185, 'Autosuficiente', 'B', 13),
	(186, 'Positivo', 'B', 13),
	(187, 'Seguro', 'B', 13),
	(188, 'Optimista', 'A', 13),
	(189, 'Dominante', 'B', 13),
	(190, 'Detallista', 'C', 13),
	(191, 'Confiado', 'B', 13),
	(192, 'Independiente', 'B', 13),
	(193, 'Decisivo', 'B', 13),
	(194, 'Conciliador', 'D', 13),
	(195, 'Conversador', 'A', 13),
	(196, 'Líder', 'B', 13),
	(197, 'Jefe', 'B', 13),
	(198, 'Productivo', 'B', 13),
	(199, 'Atrevido', 'B', 13),
	(200, 'Animado', 'A', 13),
	(201, 'Jugueton', 'A', 13),
	(202, 'Sociable', 'A', 13),
	(203, 'Competitivo', 'B', 13),
	(204, 'Respetuoso', 'C', 13),
	(205, 'Autosuficiente', 'B', 13),
	(206, 'Planificador', 'C', 13),
	(207, 'Seguro', 'B', 13),
	(208, 'Ordenado', 'C', 13),
	(209, 'Dominante', 'B', 13),
	(210, 'Detallista', 'C', 13),
	(211, 'Confiado', 'B', 13),
	(212, 'Idealista', 'C', 13),
	(213, 'Introspectivo', 'C', 13),
	(214, 'Instigador', 'B', 13),
	(215, 'Considerado', 'C', 13),
	(216, 'Líder', 'B', 13),
	(217, 'Organizado', 'C', 13),
	(218, 'Productivo', 'B', 13),
	(219, 'Se comporta bien', 'C', 13),
	(220, NULL, 'B', 13),
	(221, NULL, 'B', 13);

-- Volcando estructura para tabla rh.prueba
CREATE TABLE IF NOT EXISTS `prueba` (
  `idPrueba` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Duracion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.prueba: ~0 rows (aproximadamente)
DELETE FROM `prueba`;
INSERT INTO `prueba` (`idPrueba`, `Nombre`, `Descripcion`, `Duracion`) VALUES
	(1, 'Temperamentos', 'Temperamento del candidato', '30 Minutos');

-- Volcando estructura para tabla rh.respuesta
CREATE TABLE IF NOT EXISTS `respuesta` (
  `idRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `P1` varchar(45) DEFAULT NULL,
  `P2` varchar(45) DEFAULT NULL,
  `P3` varchar(45) DEFAULT NULL,
  `P4` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRespuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.respuesta: ~40 rows (aproximadamente)
DELETE FROM `respuesta`;
INSERT INTO `respuesta` (`idRespuesta`, `P1`, `P2`, `P3`, `P4`) VALUES
	(1, 'Animado', 'Aventurero', 'Analítico', 'Adaptable'),
	(2, 'Jugueton', 'Persuasivo', 'Persistente', 'Placido'),
	(3, 'Sociable', 'Decidido', 'Abnegado', 'Sumiso'),
	(4, 'Convincente', 'Competitivo', 'Considerado', 'Controlado'),
	(5, 'Entusiasta', 'Inventivo', 'Respetuoso', 'Reservado'),
	(6, 'Enérgico', 'Autosuficiente', 'Sensible', 'Contento'),
	(7, 'Activista', 'Positivo', 'Planificador', 'Paciente'),
	(8, 'Espontáneo', 'Seguro', 'Puntual', 'Tímido'),
	(9, 'Optimista', 'Abierto', 'Ordenado', 'Atento'),
	(10, 'Humorístico', 'Dominante', 'Fiel', 'Amigable'),
	(11, 'Encantador', 'Osado', 'Detallista', 'Diplomático'),
	(12, 'Alegre', 'Confiado', 'Culto', 'Constante'),
	(13, 'Inspirador', 'Independiente', 'Idealista', 'Inofensivo'),
	(14, 'Cálido', 'Decisivo', 'Introspectivo', 'Humor seco'),
	(15, 'Cordial', 'Instigador', 'Músico', 'Conciliador'),
	(16, 'Conversador', 'Tenaz', 'Considerado', 'Tolerante'),
	(17, 'Vivaz', 'Líder', 'Leal', 'Escucha'),
	(18, 'Listo', 'Jefe', 'Organizado', 'Contento'),
	(19, 'Popular', 'Productivo', 'Perfeccionista', 'Permisivo'),
	(20, 'Jovial', 'Atrevido', 'Se comporta bien', 'Equilibrado'),
	(21, 'Estridente', 'Mandón', 'Desanimado', 'Soso'),
	(22, 'Indisciplinado', 'Antipático', 'Sin entusiasmo', 'Implacable'),
	(23, 'Repetidor', 'Resistente', 'Resentido', 'Reticente'),
	(24, 'Olvidadizo', 'Franco', 'Exigente', 'Temeroso'),
	(25, 'Interrumpe', 'Impaciente', 'Inseguro', 'Indeciso'),
	(26, 'Imprevisible', 'Frío', 'No comprometido', 'Impopular'),
	(27, 'Descuidado', 'Terco', 'Difícil contentar', 'Vacilante'),
	(28, 'Tolerante', 'Orgulloso', 'Pesimista', 'Insípido'),
	(29, 'Iracundo', 'Argumentador', 'Sin motivación', 'Taciturno'),
	(30, 'Ingénuo', 'Nervioso', 'Negativo', 'Desprendido'),
	(31, 'Egocéntrico', 'Adicto al trabajo', 'Distraído', 'Ansioso'),
	(32, 'Hablador', 'Indiscreto', 'Susceptible', 'Tímido'),
	(33, 'Desorganizado', 'Dominante', 'Deprimido', 'Dudoso'),
	(34, 'Inconsistente', 'Intolerante', 'Introvertido', 'Indiferente'),
	(35, 'Desordenado', 'Manipulador', 'Moroso', 'Quejumbroso'),
	(36, 'Ostentoso', 'Testarudo', 'Escéptico', 'Lento'),
	(37, 'Emocional', 'Prepotente', 'Solitario', 'Perezoso'),
	(38, 'Atolondrado', 'Malgeniado', 'Suspicaz', 'Sin ambición'),
	(39, 'Inquieto', 'Precipitado', 'Vengativo', 'Poca voluntad'),
	(40, 'Variable', 'Astuto', 'Comprometedor', 'Crítico');

-- Volcando estructura para tabla rh.sesiones
CREATE TABLE IF NOT EXISTS `sesiones` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_sesion`),
  KEY `fk_sesiones_usuario` (`id_usuario`),
  CONSTRAINT `fk_sesiones_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.sesiones: ~46 rows (aproximadamente)
DELETE FROM `sesiones`;
INSERT INTO `sesiones` (`id_sesion`, `id_usuario`, `token`, `fecha_creacion`, `fecha_actualizacion`) VALUES
	(1, 1, '9b45d9cc197465d84ab4d8eaa7b5f77c6008c0ea365ff14c10711d0f3f94abe3', '2023-08-27 22:39:04', '2023-08-28 07:06:24'),
	(2, 1, '9c059fd9e3a1832ab6b40870127754db5e24368ef3583f3422f992a0a289063f', '2023-08-27 22:44:24', '2023-08-28 07:18:42'),
	(3, 1, '407753ff9e41620ce2dca5717ce35c8d1aeb7778ffd06baf5ab2e09627a7075b', '2023-08-30 23:30:19', '2023-08-31 07:33:32'),
	(4, 1, '8e8a10b20003c81c1b7a1c6cb3f7a993541f4e376877603164977f82b9fd9f84', '2023-08-30 23:33:38', '2023-08-31 07:46:00'),
	(5, 1, 'a524df0143c3485abcd5e92700713a29f8bcbbb5402814373189e50fa340eba1', '2023-09-02 21:25:46', '2023-09-03 07:41:41'),
	(6, 1, '6d9cf8f0cda4bfc83d6bc91dc3d6d51dc886e53867f678bf5fb7776785ff8d46', '2023-09-04 21:19:37', '2023-09-05 05:42:22'),
	(7, 1, 'bd8b648b2738aac80864927db85570144012c1e629512173e42c7587123ee58e', '2023-09-04 21:40:19', '2023-09-05 06:42:37'),
	(8, 1, 'e1ba3158888d295d62a0681e65eb0893ff4978d93196681c4ab7a6ce41b0dd17', '2023-09-04 23:33:19', '2023-09-05 08:10:55'),
	(9, 1, '7f20a13d4bb4b2ecb85d531aa576f2ebcfcb02c35fb376b64bc407b54fcf992d', '2023-09-06 19:43:33', '2023-09-07 08:00:50'),
	(10, 1, '5af540630f9a99196b456da1c317f24295aa5ca75ceed4910f14921ff3d8d02c', '2023-09-07 20:04:50', '2023-09-08 07:31:18'),
	(11, 1, '2ed36653ffd5d9a3823c91494c5bf78845797dcedbe11e4537ddd85cea8f0ce9', '2023-09-09 16:57:17', '2023-09-10 01:25:23'),
	(12, 1, '933cd6e6a8d88067d5c6124f18d70094da241f0cf9fbc4e800e5ee1c998d8e00', '2023-09-09 17:25:33', '2023-09-10 01:40:10'),
	(13, 1, '8b2ce4d727012dd7d3a2b29f232fd1adfdf8407d4a50ac3f584108abe2f167ec', '2023-09-09 17:40:17', '2023-09-10 01:40:17'),
	(14, 1, '29b1900beb3f1851eb4fb22b3a8d5c414a6dd7070543f8420ef9781d00ed7157', '2023-09-09 17:40:31', '2023-09-10 01:40:33'),
	(15, 1, '290e6b39a3fb1f71729ba52381d7245c570877d15de425e92d6ba9dfe78fd9e4', '2023-09-09 17:45:57', '2023-09-10 01:45:57'),
	(16, 1, 'c5e6e7ba1068bfea677aa8a79e2165ee2ed1b3f2d81102e9fc8b556f12660841', '2023-09-09 17:47:15', '2023-09-10 01:47:15'),
	(17, 1, '92a01e68048f529fcca94af927bd8eb25664f4b5b9b8222cf52fe5f2706e390a', '2023-09-09 17:47:57', '2023-09-10 01:47:57'),
	(18, 1, '32bad2a805ba3904440847690a0db3d37cd8479cc06b84e36805848b500b8faa', '2023-09-09 17:51:41', '2023-09-10 01:53:49'),
	(19, 1, 'a54af0315dcb978852df2b5bc3d8b83662c7604a77bf48403a6b3bb78763fdbb', '2023-09-09 17:54:01', '2023-09-10 01:54:01'),
	(20, 1, '5a8bf9b54d7755aaadd763f59702650e30f3c91f5e25910a5a929084e6eb4218', '2023-09-09 17:56:42', '2023-09-10 01:59:45'),
	(21, 1, '07752eb2feb1a00dbca2c310d1ac9cbf416e54b7b97cba1b557cd440259cf626', '2023-09-09 18:00:06', '2023-09-10 02:13:50'),
	(22, 1, '13b7cc069bc116eb48081f869acc345f552d19a7a2e41279a3c209c265b07e0a', '2023-09-09 22:50:52', '2023-09-10 06:59:07'),
	(23, 1, '0b0fda132367a110c76562f3c659bbd2bf801a09a825ba60ad3377432b896dbf', '2023-09-29 23:21:47', '2023-09-30 07:28:22'),
	(24, 1, '880c48cb710524c7141b1e4daddbf90f704c9c28b71b8db79d17701df88d4c8f', '2023-09-29 23:58:47', '2023-09-30 07:58:51'),
	(25, 1, '7f3ba6fc6f93418d6f854946fa65928042aeedcbf7811774cbd71ce5ae8c82ee', '2023-09-30 21:49:30', '2023-10-01 05:49:45'),
	(26, 1, 'e0ab948039fc46404b21da5acd69399cbbe0e9da479bae20708374aa266cf19c', '2023-09-30 22:08:41', '2023-10-01 06:11:14'),
	(27, 1, '3341cf13d027c268d6db83659608173a4a95b8e33e0f03efa3aacd9746f467f3', '2023-10-01 11:40:58', '2023-10-01 19:40:58'),
	(28, 1, '42210598640028bee06a1fbeee8786e4a19e61656b53cbcd39ff46a4febe5038', '2023-10-01 11:41:23', '2023-10-02 07:42:11'),
	(29, 1, '4142fecc20163b64ca32b042605e625097259945c99b5dd7aec80b58657d0733', '2023-10-03 21:59:09', '2023-10-04 08:02:00'),
	(30, 1, '490ffc84ef2d9032680d5e0ed284319b012cfc9ff2fd0638cc63ec06c602f2fe', '2023-10-04 23:26:13', '2023-10-05 07:53:35'),
	(31, 1, '03ac957e24116527080f58833b944bea975a36443b40a4a1cddfa56e4d731613', '2023-11-17 20:42:21', '2023-11-19 00:47:55'),
	(32, 1, '013ac9018bf4af0b1458e8f15a12771c1f16b3fff60a8a2228f894684bea3239', '2023-11-18 17:55:35', '2023-11-19 06:14:14'),
	(33, 1, '12e7741b4d245da1ee58bef995b2fc7ea2d0813b03bb6f528653c64b2bedf37f', '2023-11-21 23:46:01', '2023-11-23 04:09:21'),
	(34, 1, '5e4dd114f89c60cdd1150dd4f75f2d16c2fc2973e27cd6e95ccfee63c1908f85', '2023-11-23 22:55:52', '2023-11-25 05:55:29'),
	(35, 1, '840e65006d5982f8c39ff0db0687e40a2075ffcaec67b81995066f8e18bde3c7', '2023-11-24 23:00:02', '2023-11-26 02:36:47'),
	(36, 1, 'edd421f6bea975cd6651490bbf37a24e4f4d08449bb47d2bd23cef21cf38636a', '2023-11-25 23:04:20', '2023-11-26 06:04:23'),
	(37, 1, 'fb43718322b1b5e7723faef15fd94d996bd3880725c056b79903d0aefd0a79d0', '2023-11-26 23:21:05', '2023-11-27 07:22:02'),
	(38, 1, '9b35ee7def980e765c1d472bb04c8447e1d2708ced1016bc13bfcc59070beb73', '2023-12-11 21:43:29', '2023-12-12 05:17:07'),
	(39, 1, '1009be6143cc772e8ec3eaf7f0b617a1379e2f979687241e502d4511d90fa68d', '2023-12-17 13:16:58', '2023-12-17 20:56:03'),
	(40, 1, '496408b5d9df84d8b773631b0a644f61349bd19be6064976ace8ddb09ec913e4', '2023-12-27 21:43:44', '2023-12-28 04:43:46'),
	(41, 1, '7fd7e5cc31f868e6d47569e4d3bc8651f580690bc37adb643261748b2af871a1', '2023-12-31 14:45:46', '2024-01-01 05:52:01'),
	(42, 1, '0ccc8d414f9b27ca81e928a563064f8efc89eb366653d1f217d0824c24ae5add', '2024-01-01 17:49:41', '2024-01-01 17:49:41'),
	(43, 1, '7b986b11b0dbf0e736055137345c5ca101670bc3f7ab6d55d6a3b4ed87fbe135', '2024-01-01 17:49:41', '2024-01-02 00:49:43'),
	(44, 1, '8ccf3ca4a7ad96024e41dd934d959dea8b1b063b3bdeb27ef7dfbb44b734ed8b', '2024-01-16 21:01:30', '2024-01-17 04:02:16'),
	(45, 1, 'ceb766dc73de33ed80cf63ca6ce019e8d71d79a4d92e3e0df80c1c321fee84cd', '2024-01-19 19:51:08', '2024-01-20 03:23:29'),
	(46, 1, 'c34356a2de94c6d4aa9387c972f8ba4aed55a10ff186c81bf889e056e4e1b5c5', '2024-01-25 22:12:05', '2024-01-26 05:36:29');

-- Volcando estructura para tabla rh.sesionestoken
CREATE TABLE IF NOT EXISTS `sesionestoken` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `idCandidato` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id_sesion`) USING BTREE,
  KEY `fk_sesiones_candidato` (`idCandidato`) USING BTREE,
  CONSTRAINT `fk_sesiones_candidato` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.sesionestoken: ~0 rows (aproximadamente)
DELETE FROM `sesionestoken`;

-- Volcando estructura para tabla rh.temperamento
CREATE TABLE IF NOT EXISTS `temperamento` (
  `idTemperamento` int(11) NOT NULL AUTO_INCREMENT,
  `melancolico` int(11) NOT NULL,
  `colerico` int(11) NOT NULL,
  `flematico` int(11) NOT NULL,
  `sanguineo` int(11) NOT NULL,
  `realizado` int(10) NOT NULL,
  `idCandidatofk` int(11) NOT NULL,
  PRIMARY KEY (`idTemperamento`),
  KEY `fkCandidato` (`idCandidatofk`),
  CONSTRAINT `fkCandidato` FOREIGN KEY (`idCandidatofk`) REFERENCES `candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.temperamento: ~2 rows (aproximadamente)
DELETE FROM `temperamento`;
INSERT INTO `temperamento` (`idTemperamento`, `melancolico`, `colerico`, `flematico`, `sanguineo`, `realizado`, `idCandidatofk`) VALUES
	(9, 0, 0, 0, 0, 1, 13),
	(10, 0, 0, 0, 0, 0, 14);

-- Volcando estructura para tabla rh.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `estado`) VALUES
	(1, 'admin', '123', 'activo'),
	(2, 'william', '1234562', 'activo');

-- Volcando estructura para tabla rh.valanti
CREATE TABLE IF NOT EXISTS `valanti` (
  `idValanti` int(11) NOT NULL AUTO_INCREMENT,
  `Verdad` float DEFAULT NULL,
  `Rectitud` int(10) DEFAULT NULL,
  `Paz` int(10) DEFAULT NULL,
  `Amor` int(10) DEFAULT NULL,
  `No_violencia` int(10) DEFAULT NULL,
  `verdadEmpresa` int(10) DEFAULT NULL,
  `rectitudEmpresa` int(10) DEFAULT NULL,
  `pazEmpresa` int(10) DEFAULT NULL,
  `amorEmpresa` int(10) DEFAULT NULL,
  `noViolenciaEmpresa` int(10) DEFAULT NULL,
  `idCandidato` int(11) NOT NULL,
  PRIMARY KEY (`idValanti`) USING BTREE,
  KEY `FK_Usuario_Valanti` (`idCandidato`) USING BTREE,
  CONSTRAINT `fkvalanti` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.valanti: ~3 rows (aproximadamente)
DELETE FROM `valanti`;
INSERT INTO `valanti` (`idValanti`, `Verdad`, `Rectitud`, `Paz`, `Amor`, `No_violencia`, `verdadEmpresa`, `rectitudEmpresa`, `pazEmpresa`, `amorEmpresa`, `noViolenciaEmpresa`, `idCandidato`) VALUES
	(1, 53, 50, 48, 47, 50, 55, 50, 65, 55, 55, 13),
	(2, 0, 0, 0, 0, 0, 50, 50, 50, 50, 50, 15),
	(3, 0, 0, 0, 0, 0, 50, 50, 50, 50, 50, 14);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
