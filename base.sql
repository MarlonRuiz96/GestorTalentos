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

-- Volcando estructura para tabla rh.candidato
CREATE TABLE IF NOT EXISTS `candidato` (
  `idCandidato` int(11) NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(45) DEFAULT NULL,
  `Puesto` varchar(45) DEFAULT NULL,
  `DPI` varchar(13) DEFAULT NULL,
  `temperamento` int(1) DEFAULT NULL,
  `Contacto` varchar(45) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `fecha_crear` date DEFAULT NULL,
  `Temporal` int(11) DEFAULT NULL,
  `melancolico` int(11) DEFAULT NULL,
  `colerico` int(11) DEFAULT NULL,
  `flematico` int(11) DEFAULT NULL,
  `sanguineo` int(11) DEFAULT NULL,
  `notas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCandidato`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.candidato: ~10 rows (aproximadamente)
DELETE FROM `candidato`;
INSERT INTO `candidato` (`idCandidato`, `Nombres`, `Puesto`, `DPI`, `temperamento`, `Contacto`, `Correo`, `fecha_crear`, `Temporal`, `melancolico`, `colerico`, `flematico`, `sanguineo`, `notas`) VALUES
	(1, 'Stefany ', 'Secretaria', '2474218042217', 0, '40405050', '2174218045454', NULL, 1, NULL, NULL, NULL, NULL, NULL),
	(3, 'Jose Fernando Suhul Gonzalez', 'Cocinero', '2474218042216', 0, '41115228', 'mruiz996@outlook.com', '2023-09-03', 1, NULL, NULL, NULL, NULL, NULL),
	(4, 'Estefania Maria Ochoa esquivel', 'Secretaria', '2474218042215', 0, '45454874', 'maria@prueba.com', '2023-09-03', 1, NULL, NULL, NULL, NULL, NULL),
	(5, 'Jenner Pertzi Ocit Gamez', 'Mecanico', '2474218042211', 0, '50507070', 'Jennerpt@gmail.com', '2023-09-03', 1, NULL, NULL, NULL, NULL, NULL),
	(6, 'Junior Morales Estrada', 'Maestro', '2474218042212', 1, '12312312', 'jmoralese@gmail.com', '2023-09-03', 41, 13, 6, 11, 10, NULL),
	(7, 'Sofia Ochoa', 'Secretaria', '2474218042213', 0, '50504174', 'mruiz996@outlook.com', '2023-09-07', 1, NULL, NULL, NULL, NULL, NULL),
	(8, 'Marlon Ivan Ruiz Gonzalez ', 'Gerencial', '2474218042214', 1, '50517989', 'mruiz996@outlook.com', '2023-09-07', 41, 11, 10, 14, 6, 'Este candidato es apto\r\n'),
	(9, 'Karina de leon', 'Doctora', '2318218042214', 0, '50517898', 'mruiz996@outlook.com', '2023-09-10', 1, NULL, NULL, NULL, NULL, NULL),
	(10, 'Carlos Antonio Gonzalez', 'DIGITADOR', '2474308042214', 0, '50517389', 'mruiz996@outlook.com', '2023-09-10', 1, NULL, NULL, NULL, NULL, NULL),
	(11, '', '', '2035800790605', 0, '', '', '2023-10-01', NULL, NULL, NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla rh.debilidad
CREATE TABLE IF NOT EXISTS `debilidad` (
  `idPersonalidad` int(11) NOT NULL AUTO_INCREMENT,
  `Personalidad` varchar(50) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `idCandidato` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersonalidad`) USING BTREE,
  KEY `FK_personalidad_candidatso` (`idCandidato`) USING BTREE,
  CONSTRAINT `FK_personalidad_candidatso` FOREIGN KEY (`idCandidato`) REFERENCES `candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.debilidad: ~0 rows (aproximadamente)
DELETE FROM `debilidad`;
INSERT INTO `debilidad` (`idPersonalidad`, `Personalidad`, `Tipo`, `idCandidato`) VALUES
	(1, 'Desanimado', 'C', 8),
	(2, 'Implacable', 'D', 8),
	(3, 'Resistente', 'B', 8),
	(4, 'Olvidadizo', 'A', 8),
	(5, 'Interrumpe', 'A', 8),
	(6, 'Imprevisible', 'A', 8),
	(7, 'Descuidado', 'A', 8),
	(8, 'Orgulloso', 'B', 8),
	(9, 'Sin motivación', 'C', 8),
	(10, 'Desprendido', 'D', 8),
	(11, 'Adicto al trabajo', 'B', 8),
	(12, 'Indiscreto', 'B', 8),
	(13, 'Desorganizado', 'A', 8),
	(14, 'Introvertido', 'C', 8),
	(15, 'Quejumbroso', 'D', 8),
	(16, 'Lento', 'D', 8),
	(17, 'Solitario', 'C', 8),
	(18, 'Suspicaz', 'C', 8),
	(19, 'Precipitado', 'B', 8),
	(20, 'Variable', 'A', 8),
	(21, 'Variable', 'A', 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.fortaleza: ~2 rows (aproximadamente)
DELETE FROM `fortaleza`;
INSERT INTO `fortaleza` (`idPersonalidad`, `Personalidad`, `Tipo`, `idCandidato`) VALUES
	(41, 'Animado', 'A', 8),
	(42, 'Persuasivo', 'B', 8),
	(43, 'Abnegado', 'C', 8),
	(44, 'Competitivo', 'B', 8),
	(45, 'Entusiasta', 'A', 8),
	(46, 'Autosuficiente', 'B', 8),
	(47, 'Planificador', 'C', 8),
	(48, 'Tímido', 'D', 8),
	(49, 'Ordenado', 'C', 8),
	(50, 'Humorístico', 'A', 8),
	(51, 'Osado', 'B', 8),
	(52, 'Culto', 'C', 8),
	(53, 'Idealista', 'C', 8),
	(54, 'Introspectivo', 'C', 8),
	(55, 'Cordial', 'A', 8),
	(56, 'Tenaz', 'B', 8),
	(57, 'Leal', 'C', 8),
	(58, 'Contento', 'D', 8),
	(59, 'Perfeccionista', 'C', 8),
	(60, 'Se comporta bien', 'C', 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.sesiones: ~28 rows (aproximadamente)
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
	(29, 1, '4142fecc20163b64ca32b042605e625097259945c99b5dd7aec80b58657d0733', '2023-10-03 21:59:09', '2023-10-04 08:02:00');

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

-- Volcando datos para la tabla rh.sesionestoken: ~21 rows (aproximadamente)
DELETE FROM `sesionestoken`;
INSERT INTO `sesionestoken` (`id_sesion`, `idCandidato`, `token`, `fecha_creacion`, `fecha_actualizacion`) VALUES
	(11, 8, 'b422d99ac7a12618257fcfa75a7a761c2456882b700fcf1ecad95ca0840396c9', '2023-09-08 21:15:13', '2023-09-08 21:15:13'),
	(12, 8, '15c29894e95312d425334cb726011005cd3f386d3616d44fc6b7642f4b2b36f7', '2023-09-08 21:20:36', '2023-09-08 21:22:54'),
	(13, 8, 'd19647b5d54d4381bf1846e0e55240b8f00c43580d73d5d6c6955ce135680e48', '2023-09-08 21:22:58', '2023-09-08 21:22:58'),
	(14, 8, '043bda5cd68c8d102e2ad55948744686cdae51643ee08d4a4913266954ef99d3', '2023-09-08 21:37:39', '2023-09-08 21:37:39'),
	(15, 8, '784df5edd9f3039987b6d6540baeab4b2f69fa885e303ad926bec09d39c22bab', '2023-09-08 21:37:45', '2023-09-08 21:45:31'),
	(16, 8, 'ff421c27306427405beda7c9a02f0ec2764186c21e5fc63ffaa455ddfe5f63bd', '2023-09-08 21:45:35', '2023-09-08 21:45:55'),
	(17, 8, '0a8e76468ed5554036c74933f108d456dfc7d304e3679d4f4210e22b8f9f5a5c', '2023-09-08 21:45:58', '2023-09-08 21:45:58'),
	(18, 8, '5f46e7cc74c52034b97b6ed5e87b6d89c6e55404c354af23d3d938c9dcb15226', '2023-09-08 21:46:04', '2023-09-08 22:21:29'),
	(19, 8, '1cf625a0609e9330d8a6e855b21815028580dced3a43f1a961e283b75e351826', '2023-09-08 22:21:10', '2023-09-08 23:14:59'),
	(20, 8, 'db79fde81f8183d857020fd01e82dd6e6e0d4b8dabfd51446b030c71cea7e78b', '2023-09-08 23:15:21', '2023-09-09 00:37:27'),
	(21, 8, 'c3d77970499dffeaf8f7d98d9bbcdc1748d01c43270bde3c98d5137257fc28e2', '2023-09-09 00:39:51', '2023-09-09 16:51:42'),
	(22, 1, '15ca5684d24b5f10330d471b6be417857f4c1d4100784ab5a420688e61c43d13', '2023-09-09 16:48:53', '2023-09-09 16:48:53'),
	(23, 1, '31dd070b6a5b6bbb147872814142ba95773a9c1755ddfdba4c9622efdf573586', '2023-09-09 16:49:00', '2023-09-09 16:49:00'),
	(24, 1, '35dfdbc4ecd7c4c8541dcb1f861b62b30e9b292dfb33ebf7d2da7524230c6e29', '2023-09-09 16:49:09', '2023-09-09 16:49:09'),
	(25, 1, '1b01e894ccdc6e92bd54a7629b1dcfb070bd5d1cabfbb5a8987fc4edcfc10d15', '2023-09-09 16:49:28', '2023-09-09 16:49:28'),
	(26, 1, '04a8d070664b466b764bbe7ea71a8a5f076e818c5b54fb09476474993eeb1bfd', '2023-09-09 16:49:47', '2023-09-09 16:49:47'),
	(27, 1, 'c40fad7c6d55855fd401d8b823e8ab2958bf8411a89177880e915f788aa5b72c', '2023-09-09 16:52:41', '2023-09-09 16:52:41'),
	(28, 1, '2b322ab68662f1b4293db3cfcfeb15825dbcf6e8c52f1d9c1d6a6ebcb13f8883', '2023-09-09 16:55:05', '2023-09-09 16:55:05'),
	(29, 8, 'b98f2765ba4cb4c8b206c70c8d7d7f0d4ddce010da0282defb45445847074166', '2023-09-09 17:25:38', '2023-09-09 17:25:38'),
	(30, 1, 'fee870f8d57af02a6a2c04c22a99539e51eee88b4269cc62a685c1da0e2850f3', '2023-09-09 17:48:12', '2023-09-09 17:48:12'),
	(31, 1, '8858cb3a6ae4893b102b9b83eafb8d1855d2dd68eab1e5b86a667a80820b9c12', '2023-09-09 17:49:58', '2023-09-09 17:49:58'),
	(32, 1, '5bc8c206993f4ed67d59316a0f704a15835880bffe470a973f77e875d70c068b', '2023-09-09 17:50:31', '2023-09-09 17:50:31'),
	(33, 1, '6b9b47e68ac986a255df2a2ada8f3f992f17ec4c76c5e6066a09d188a9e34efb', '2023-09-09 17:51:23', '2023-09-09 17:51:23');

-- Volcando estructura para tabla rh.temperamento
CREATE TABLE IF NOT EXISTS `temperamento` (
  `idTemperamento` int(11) NOT NULL AUTO_INCREMENT,
  `melancolico` int(11) NOT NULL,
  `colerico` int(11) NOT NULL,
  `flematico` int(11) NOT NULL,
  `sanguineo` int(11) NOT NULL,
  `idCandidatofk` int(11) NOT NULL,
  PRIMARY KEY (`idTemperamento`),
  KEY `fkCandidato` (`idCandidatofk`),
  CONSTRAINT `fkCandidato` FOREIGN KEY (`idCandidatofk`) REFERENCES `candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.temperamento: ~5 rows (aproximadamente)
DELETE FROM `temperamento`;
INSERT INTO `temperamento` (`idTemperamento`, `melancolico`, `colerico`, `flematico`, `sanguineo`, `idCandidatofk`) VALUES
	(1, 5, 7, 5, 1, 1),
	(3, 10, 10, 10, 1, 4),
	(4, 1, 1, 1, 5, 8),
	(5, 7, 8, 4, 5, 9),
	(6, 8, 8, 8, 4, 10),
	(7, 0, 0, 0, 0, 11);

-- Volcando estructura para tabla rh.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Volcando datos para la tabla rh.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`) VALUES
	(1, 'admin', '123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
