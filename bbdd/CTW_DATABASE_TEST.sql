-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2017 a las 20:03:36
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CTW_DATABASE_TEST`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ARTICULO`
--

CREATE TABLE `ARTICULO` (
  `ID_ARTICULO` int(5) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `codigo_de_barras` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `NIF_mayorista` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_producto_mayorista` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_de_serie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `cantidad` int(3) NOT NULL,
  `numero_factura` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_de_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NIF_cliente_articulo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ARTICULO`
--

INSERT INTO `ARTICULO` (`ID_ARTICULO`, `nombre`, `descripcion`, `codigo_de_barras`, `NIF_mayorista`, `codigo_producto_mayorista`, `numero_de_serie`, `precio`, `cantidad`, `numero_factura`, `ubicacion`, `fecha_de_alta`, `NIF_cliente_articulo`) VALUES
(2, 'Samsung galaxy A5', 'Smartphone', '12312324132132342312', '23456672J', NULL, '344', 300, 5, '1234', NULL, '2017-03-28 12:41:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ARTICULO_FACTURADO`
--

CREATE TABLE `ARTICULO_FACTURADO` (
  `ID_ARTICULO_FACTURADO` int(5) NOT NULL,
  `ID_ARTICULO` int(5) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `codigo_de_barras` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `NIF_mayorista` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_producto_mayorista` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_de_serie` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `cantidad` int(3) NOT NULL,
  `numero_factura` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_de_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cliente_facturado` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ARTICULO_FACTURADO`
--

INSERT INTO `ARTICULO_FACTURADO` (`ID_ARTICULO_FACTURADO`, `ID_ARTICULO`, `nombre`, `descripcion`, `codigo_de_barras`, `NIF_mayorista`, `codigo_producto_mayorista`, `numero_de_serie`, `precio`, `cantidad`, `numero_factura`, `ubicacion`, `fecha_de_alta`, `cliente_facturado`) VALUES
(1, 1, 'Samsung galaxy A5', 'Smartphone', 'WDUUT0BDD9PE5U', '23456672J', NULL, '123', 200, 4, '123', NULL, '2017-03-25 11:01:50', '23815820G'),
(2, 2, 'Samsung galaxy A5', 'Smartphone', 'WDUUT0BDD9PE5U', NULL, NULL, '456', 200, 3, '456', NULL, '2017-03-25 11:02:33', '23815820G'),
(3, 2, 'Samsung galaxy A5', 'Smartphone', 'WDUUT0BDD9PE5U', NULL, NULL, '456', 200, 1, '456', NULL, '2017-03-25 11:02:33', '23815820G'),
(4, 1, 'Samsung galaxy A5', 'Smartphone', 'WDUUT0BDD9PE5U', '23456672J', NULL, '2132123', 300, 1, '1234', NULL, '2017-03-26 12:52:20', '34562345L'),
(5, 1, 'Samsung galaxy A5', 'Smartphone', 'WDUUT0BDD9PE5U', '23456672J', NULL, '2132123', 300, 1, '1234', NULL, '2017-03-26 12:52:20', '34562345L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ASIGNAR_USUARIO_PROVEEDOR`
--

CREATE TABLE `ASIGNAR_USUARIO_PROVEEDOR` (
  `NUM_DETALLE_PROVEEDOR` int(4) NOT NULL,
  `ID_usuario` int(5) DEFAULT NULL,
  `NIF_mayorista` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CABECERA_FACTURA`
--

CREATE TABLE `CABECERA_FACTURA` (
  `ID_CABECERA_FACTURA` int(5) NOT NULL,
  `ID_factura` int(5) DEFAULT NULL,
  `NIF_cliente` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CABECERA_PRE_FACTURA`
--

CREATE TABLE `CABECERA_PRE_FACTURA` (
  `ID_CABECERA_PRE_FACTURA` int(5) NOT NULL,
  `ID_pre_factura` int(5) DEFAULT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_facturacion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_postal_facturacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `calle_facturacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero_facturacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_de_pre_factura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CABECERA_PRE_FACTURA`
--

INSERT INTO `CABECERA_PRE_FACTURA` (`ID_CABECERA_PRE_FACTURA`, `ID_pre_factura`, `nombre`, `ciudad_facturacion`, `codigo_postal_facturacion`, `calle_facturacion`, `numero_facturacion`, `fecha_de_pre_factura`) VALUES
(1, 1, 'betarq marzo articulos', 'barcelona', '', 'balmes', '145', '2017-03-13 16:19:04'),
(2, 2, 'soria global marzo', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-13 16:20:35'),
(3, 2, 'soria global marzo', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-13 16:21:03'),
(4, 4, 'soria global marzo', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-13 16:23:53'),
(5, 5, 'the arkhe marzo', 'Barcelona', '08025', 'Diagonal', '433', '2017-03-14 12:48:30'),
(6, 6, 'the arkhe abril', 'Barcelona', '08025', 'Diagonal', '433', '2017-03-14 12:51:20'),
(7, 7, 'soria abriiil', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-26 12:50:13'),
(8, 8, 'soria cerral', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-26 12:52:51'),
(9, 9, 'abrilll', 'Barcelona', '08025', 'Diagonal', '433 bis', '2017-03-26 18:13:15'),
(10, 10, 'LIU-JO articulos abril', 'Milan', '92351', 'provenza', '35', '2017-03-27 09:21:55'),
(11, 11, 'PPPP', 'Barcelona', '08025', 'Diagonal', '433', '2017-03-27 10:48:38'),
(12, 12, 'articulos abril', 'barcelona', '08013', 'balmes', '145', '2017-03-28 11:22:36'),
(13, 13, 'cerralllll', 'Barcelona', '08025', 'Diagonal', '433', '2017-03-28 11:23:43'),
(14, 14, 'patata', 'Barcelona', '08025', 'Diagonal', '433', '2017-03-30 09:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTE`
--

CREATE TABLE `CLIENTE` (
  `NIF_EMPRESA` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_comercial` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_facturacion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_postal_facturacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `calle_facturacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero_facturacion` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad_envio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_postal_envio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `calle_envio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero_envio` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `IBAN` varchar(34) COLLATE utf8_spanish_ci NOT NULL,
  `SEPA` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo` int(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CLIENTE`
--

INSERT INTO `CLIENTE` (`NIF_EMPRESA`, `nombre_comercial`, `nombre_completo`, `telefono`, `email`, `ciudad_facturacion`, `codigo_postal_facturacion`, `calle_facturacion`, `numero_facturacion`, `ciudad_envio`, `codigo_postal_envio`, `calle_envio`, `numero_envio`, `IBAN`, `SEPA`, `pais`, `prefijo`, `activo`) VALUES
('23456784y', 'LIU-JO S.A', 'LIU-JO', 933241231, 'cliente@liujo.es', 'Milan', '92351', 'provenza', '35', 'milan', '92351', 'provenza', '35', 'ES21003746355558', 'SI', 'Ecuador', 593, 1),
('23815820G', 'The Arkhe', 'Rirley Trade S.L', 931804150, 'empresa@thearkhe.es', 'Barcelona', '08025', 'Diagonal', '433', 'Barcelona', '08024', 'Passeig Joan de Borbo', '101', 'ES21003746352134', 'NO', 'Chile', 56, 1),
('34562345L', 'BETARQ S.L', 'Betarq arquitectos', 934536128, 'empresa@betarq.es', 'barcelona', '08013', 'balmes', '145', 'barcelona', '08013', 'balmes', '145', 'ES21003746359865', 'NO', 'cuba', 53, 1),
('45243523Z', 'Abogados Soria', 'J.Soria abogados S.L', 931643816, 'cliente@soria.es', 'Barcelona', '08025', 'Diagonal', '433 bis', 'Barcelona', '08025', 'diagonal', '433 bis', 'ES21003746366666', 'NO', 'Aruba', 297, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CONTACTO`
--

CREATE TABLE `CONTACTO` (
  `ID_CONTACTO` int(4) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ID_sede` int(4) DEFAULT NULL,
  `cargo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `pais` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo` int(5) DEFAULT NULL,
  `extension` int(10) DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CONTACTO`
--

INSERT INTO `CONTACTO` (`ID_CONTACTO`, `nombre`, `ID_sede`, `cargo`, `email`, `telefono`, `pais`, `prefijo`, `extension`, `activo`) VALUES
(1, 'Andrea Sanchez', 1, 'Directora', 'asanchez@thearkhe.es', 934562135, 'Andorra', 376, 0, 1),
(7, 'Ivan Alonso', 1, 'Jefe', 'ialonso@thearke.es', 934144192, 'Australia', 61, 109, 1),
(8, 'Alicia Lopez', 3, 'Encargada', 'alopez@liujo.es', 931256374, 'Australia', 61, NULL, 1),
(10, 'Marta Garcia', 3, 'dependienta', 'mgarcia@liujo.es', 931251635, 'Bahamas', 1242, NULL, 1),
(11, 'Maria Garcia', 3, 'dependienta', 'magarcia@liujo.es', 931251344, 'Bahamas', 1242, 123, 1),
(12, 'tttt', 2, 'ttt', 'tt@gg', 45345, 'Argentina', 54, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FACTURA`
--

CREATE TABLE `FACTURA` (
  `ID_FACTURA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `IVA`
--

CREATE TABLE `IVA` (
  `IVA` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MAYORISTA`
--

CREATE TABLE `MAYORISTA` (
  `NIF_MAYORISTA` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_comercial` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_empresa` int(9) NOT NULL,
  `telefono_comercial` int(9) DEFAULT NULL,
  `extension_telefono_comercial` int(8) DEFAULT NULL,
  `email_empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email_comercial` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pais` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo` int(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MAYORISTA`
--

INSERT INTO `MAYORISTA` (`NIF_MAYORISTA`, `nombre_empresa`, `nombre_comercial`, `telefono_empresa`, `telefono_comercial`, `extension_telefono_comercial`, `email_empresa`, `email_comercial`, `ubicacion`, `pais`, `prefijo`, `activo`) VALUES
('23456672J', 'Mediamarkt S.Ls', 'pepe', 931459345, 0, NULL, 'mayorista@mediamarkt.es', NULL, NULL, 'Bahamas', 1242, 1),
('34567836P', 'Fnac', 'Antonio', 931234512, 637482746, NULL, 'mayorista@fnac.es', 'alamela@fnac.es', NULL, 'Argentina', 54, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MINUTAJE`
--

CREATE TABLE `MINUTAJE` (
  `ID_MINUTAJE` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time DEFAULT NULL,
  `ID_servicio` int(4) DEFAULT NULL,
  `ID_usuario` int(4) DEFAULT NULL,
  `ID_sede` int(5) DEFAULT NULL,
  `NIF_cliente` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `facturado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MINUTAJE_FACTURADO`
--

CREATE TABLE `MINUTAJE_FACTURADO` (
  `ID_MINUTAJE_FACTURADO` int(4) NOT NULL,
  `ID_MINUTAJE` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `ID_SERVICIO` int(4) NOT NULL,
  `ID_USUARIO` int(4) NOT NULL,
  `ID_SEDE` int(5) NOT NULL,
  `NIF_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MINUTAJE_FACTURADO`
--

INSERT INTO `MINUTAJE_FACTURADO` (`ID_MINUTAJE_FACTURADO`, `ID_MINUTAJE`, `fecha`, `hora_entrada`, `hora_salida`, `ID_SERVICIO`, `ID_USUARIO`, `ID_SEDE`, `NIF_cliente`) VALUES
(1, 6, '2017-03-25', '18:23:10', '18:23:00', 1, 26, 2, '34562345L'),
(2, 7, '2017-03-25', '18:24:00', '18:24:00', 3, 26, 3, '23456784y'),
(3, 6, '2017-03-25', '18:23:10', '18:23:00', 1, 26, 2, '34562345L'),
(4, 2, '2017-03-24', '03:00:00', '04:15:00', 3, 26, 1, '23815820G'),
(5, 3, '2017-03-22', '10:00:00', '15:00:00', 3, 26, 1, '23815820G'),
(6, 4, '2017-03-25', '18:21:00', '18:21:00', 1, 26, 1, '23815820G'),
(7, 5, '2017-03-25', '18:23:00', '18:23:00', 1, 26, 1, '23815820G'),
(8, 8, '2017-03-25', '18:24:00', '18:24:00', 1, 26, 1, '23815820G'),
(9, 10, '2017-03-25', '18:24:00', '18:24:00', 1, 26, 1, '23815820G'),
(10, 11, '2017-03-25', '18:24:00', '18:24:00', 3, 26, 1, '23815820G'),
(11, 7, '2017-03-25', '16:24:00', '18:24:00', 3, 26, 3, '23456784y'),
(12, 9, '2017-03-25', '18:24:00', '18:24:00', 1, 26, 3, '23456784y'),
(13, 12, '2017-03-25', '18:30:00', '19:00:00', 1, 26, 3, '23456784y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PAIS`
--

CREATE TABLE `PAIS` (
  `PAIS` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `prefijo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PAIS`
--

INSERT INTO `PAIS` (`PAIS`, `prefijo`) VALUES
('Afganistán', 93),
('Albania', 355),
('Alemania', 49),
('Andorra', 376),
('Angola', 244),
('Anguila', 1264),
('Antártida', 672),
('Antigua y Barbuda', 1268),
('Antillas Holandesas', 599),
('Arabia Saudí', 966),
('Argelia', 213),
('Argentina', 54),
('Armenia', 374),
('Aruba', 297),
('Australia', 61),
('Austria', 43),
('Azerbaiyán', 994),
('Bahamas', 1242),
('Bahréin', 973),
('Bangladesh', 880),
('Barbados', 1246),
('Bélgica', 32),
('Belice', 501),
('Benín', 229),
('Bermudas', 1441),
('Bhután', 975),
('Bielorrusia', 375),
('Bolivia', 591),
('Bosnia y Herzegovina', 387),
('Botsuana', 267),
('Brasil', 55),
('Brunéi', 673),
('Bulgaria', 359),
('Burkina Faso', 226),
('Burundi', 257),
('Cabo Verde', 238),
('Camboya', 855),
('Camerún', 237),
('Canadá', 1),
('Chad', 235),
('Chile', 56),
('China', 86),
('Chipre', 357),
('Ciudad del Vaticano', 39),
('Colombia', 57),
('Comoras', 269),
('Congo', 242),
('Corea del Norte', 850),
('Corea del Sur', 82),
('Costa de Marfil', 225),
('Costa Rica', 506),
('Croacia', 385),
('Cuba', 53),
('Dinamarca', 45),
('Dominica', 1767),
('Ecuador', 593),
('Egipto', 20),
('El Salvador', 503),
('Emiratos Árabes Unidos', 971),
('Eritrea', 291),
('Eslovaquia', 421),
('Eslovenia', 386),
('España', 34),
('Estados Unidos', 1),
('Estonia', 372),
('Etiopía', 251),
('Filipinas', 63),
('Finlandia', 358),
('Fiyi', 679),
('Francia', 33),
('Gabón', 241),
('Gambia', 220),
('Georgia', 995),
('Ghana', 233),
('Gibraltar', 350),
('Granada', 1473),
('Grecia', 30),
('Groenlandia', 299),
('Guadalupe', 0),
('Guam', 1671),
('Guatemala', 502),
('Guayana Francesa', 0),
('Guinea', 224),
('Guinea Ecuatorial', 240),
('Guinea-Bissau', 245),
('Guyana', 592),
('Haití', 509),
('Honduras', 504),
('Hong Kong', 852),
('Hungría', 36),
('India', 91),
('Indonesia', 62),
('Irán', 98),
('Iraq', 964),
('Irlanda', 353),
('Isla Bouvet', 0),
('Isla de Navidad', 61),
('Isla Norfolk', 0),
('Islandia', 354),
('Islas Caimán', 1345),
('Islas Cocos', 61),
('Islas Cook', 682),
('Islas Feroe', 298),
('Islas Georgias del Sur y Sandw', 0),
('Islas Gland', 0),
('Islas Heard y McDonald', 0),
('Islas Malvinas', 500),
('Islas Marianas del Norte', 1670),
('Islas Marshall', 692),
('Islas Pitcairn', 870),
('Islas Salomón', 677),
('Islas Turcas y Caicos', 1649),
('Islas Ultramarinas de Estados ', 0),
('Islas Vírgenes Británicas', 1284),
('Islas Vírgenes de los Estados ', 1340),
('Israel', 972),
('Italia', 39),
('Jamaica', 1876),
('Japón', 81),
('Jordania', 962),
('Kazajstán', 7),
('Kenia', 254),
('Kirguistán', 996),
('Kiribati', 686),
('Kuwait', 965),
('Laos', 856),
('Lesotho', 266),
('Letonia', 371),
('Líbano', 961),
('Liberia', 231),
('Libia', 218),
('Liechtenstein', 423),
('Lituania', 370),
('Luxemburgo', 352),
('Macao', 853),
('Macedonia', 389),
('Madagascar', 261),
('Malasia', 60),
('Malaui', 265),
('Maldivas', 960),
('Malí', 223),
('Malta', 356),
('Marruecos', 212),
('Martinica', 0),
('Mauricio', 230),
('Mauritania', 222),
('Mayotte', 262),
('México', 52),
('Micronesia', 691),
('Moldavia', 373),
('Mónaco', 377),
('Mongolia', 976),
('Montenegro', 382),
('Montserrat', 1664),
('Mozambique', 258),
('Myanmar', 95),
('Namibia', 264),
('Nauru', 674),
('Nepal', 977),
('Nicaragua', 505),
('Níger', 227),
('Nigeria', 234),
('Niue', 683),
('Noruega', 47),
('Nueva Caledonia', 687),
('Nueva Zelanda', 64),
('Omán', 968),
('Países Bajos', 31),
('Pakistán', 92),
('Palaos', 680),
('Palestina', 0),
('Panamá', 507),
('Papúa Nueva Guinea', 675),
('Paraguay', 595),
('Perú', 51),
('Polinesia Francesa', 689),
('Polonia', 48),
('Portugal', 351),
('Puerto Rico', 1),
('Qatar', 974),
('Reino Unido', 44),
('República Centroafricana', 236),
('República Checa', 420),
('República Democrática del Cong', 243),
('República Dominicana', 1809),
('Reunión', 262),
('Ruanda', 250),
('Rumania', 40),
('Rusia', 7),
('Sahara Occidental', 0),
('Samoa', 685),
('Samoa Americana', 1684),
('San Cristóbal y Nieves', 1869),
('San Marino', 378),
('San Pedro y Miquelón', 508),
('San Vicente y las Granadinas', 1784),
('Santa Helena', 290),
('Santa Lucía', 1758),
('Santo Tomé y Príncipe', 239),
('Senegal', 221),
('Serbia', 381),
('Seychelles', 248),
('Sierra Leona', 232),
('Singapur', 65),
('Siria', 963),
('Somalia', 252),
('Sri Lanka', 94),
('Suazilandia', 268),
('Sudáfrica', 27),
('Sudán', 249),
('Suecia', 46),
('Suiza', 41),
('Surinam', 597),
('Svalbard y Jan Mayen', 0),
('Tailandia', 66),
('Taiwán', 886),
('Tanzania', 255),
('Tayikistán', 992),
('Territorio Británico del Océan', 0),
('Territorios Australes Francese', 0),
('Timor Oriental', 670),
('Togo', 228),
('Tokelau', 690),
('Tonga', 676),
('Trinidad y Tobago', 1868),
('Túnez', 216),
('Turkmenistán', 993),
('Turquía', 90),
('Tuvalu', 688),
('Ucrania', 380),
('Uganda', 256),
('Uruguay', 598),
('Uzbekistán', 998),
('Vanuatu', 678),
('Venezuela', 58),
('Vietnam', 84),
('Wallis y Futuna', 681),
('Yemen', 967),
('Yibuti', 253),
('Zambia', 260),
('Zimbabue', 263);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PIE_FACTURA`
--

CREATE TABLE `PIE_FACTURA` (
  `ID_PIE_FACTURA` int(5) NOT NULL,
  `ID_factura` int(5) DEFAULT NULL,
  `total_facturado` float NOT NULL,
  `IVA` int(5) DEFAULT NULL,
  `total_neto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PIE_PRE_FACTURA`
--

CREATE TABLE `PIE_PRE_FACTURA` (
  `ID_PIE_PER_FACTURA` int(5) NOT NULL,
  `ID_pre_factura` int(5) DEFAULT NULL,
  `total_facturado` float NOT NULL,
  `IVA` int(5) DEFAULT NULL,
  `total_neto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRE_FACTURA`
--

CREATE TABLE `PRE_FACTURA` (
  `ID_PRE_FACTURA` int(5) NOT NULL,
  `NIF_empresa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PRE_FACTURA`
--

INSERT INTO `PRE_FACTURA` (`ID_PRE_FACTURA`, `NIF_empresa`, `nombre`) VALUES
(1, '34562345L', 'betarq marzo articulos'),
(2, '45243523Z', 'soria global marzo'),
(3, '45243523Z', 'soria global marzo'),
(4, '45243523Z', 'soria global marzo'),
(5, '23815820G', 'the arkhe marzo'),
(6, '23815820G', 'the arkhe abril'),
(7, '45243523Z', 'soria abriiil'),
(8, '45243523Z', 'soria cerral'),
(9, '45243523Z', 'abrilll'),
(10, '23456784y', 'LIU-JO articulos abril'),
(11, '23815820G', 'PPPP'),
(12, '34562345L', 'articulos abril'),
(13, '23815820G', 'cerralllll'),
(14, '23815820G', 'patata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE `ROL` (
  `rol` int(2) NOT NULL DEFAULT '5',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario estandar'),
(3, 'Usuario estandar'),
(4, 'Usuario estandar'),
(5, 'Usuario estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SEDE`
--

CREATE TABLE `SEDE` (
  `ID_SEDE` int(5) NOT NULL,
  `NIF_cliente` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_postal` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `pais` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo` int(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SEDE`
--

INSERT INTO `SEDE` (`ID_SEDE`, `NIF_cliente`, `nombre`, `ubicacion`, `ciudad`, `codigo_postal`, `calle`, `numero`, `telefono`, `pais`, `prefijo`, `activo`) VALUES
(1, '23815820G', 'The Arkhe Barcelona', '', 'Barcelona', '08025', 'RosellÃ³', '449', 934144192, 'Argentina', 54, 1),
(2, '34562345L', 'Betarq Barcelona', '', 'Barcelona', '08013', 'balmes', '145', 932536123, 'Armenia', 374, 1),
(3, '23456784y', 'LIU-JO Marbella', 'primera planta corner derecho', 'Malaga', '14345', 'Gran via', '344', 934512351, 'Isla de Navidad', 61, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SEPA`
--

CREATE TABLE `SEPA` (
  `valor` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SEPA`
--

INSERT INTO `SEPA` (`valor`) VALUES
('NO'),
('SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SERVICIO`
--

CREATE TABLE `SERVICIO` (
  `ID_SERVICIO` int(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `precio` float NOT NULL DEFAULT '0',
  `NIF_empresa` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SERVICIO`
--

INSERT INTO `SERVICIO` (`ID_SERVICIO`, `nombre`, `descripcion`, `precio`, `NIF_empresa`, `activo`) VALUES
(1, 'Reparar', 'reparar hardware', 30, NULL, 1),
(2, 'Instalar', '', 0, NULL, 1),
(3, 'instalar LIU-JO', 'instalar maquinas pero solo a LIU-JO', 50, '23456784y', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SERVICIO_FACTURADO`
--

CREATE TABLE `SERVICIO_FACTURADO` (
  `ID_SERVICIO_FACTURADO` int(11) NOT NULL,
  `ID_servicio` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `NIF_cliente` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SERVICIO_FACTURADO`
--

INSERT INTO `SERVICIO_FACTURADO` (`ID_SERVICIO_FACTURADO`, `ID_servicio`, `nombre`, `descripcion`, `precio`, `NIF_cliente`) VALUES
(1, 1, '', 'reparar hardware', 30, '23815820G'),
(2, 1, '', 'reparar hardware', 30, '34562345L'),
(3, 1, '', 'reparar hardware', 30, '34562345L'),
(4, 3, 'instalar LIU-JO', 'instalar maquinas pero solo a LIU-JO', 50, '23456784y'),
(5, 1, 'Reparar', 'reparar hardware', 30, '23456784y');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `STOCK`
--

CREATE TABLE `STOCK` (
  `CODIGO_DE_BARRAS` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `STOCK`
--

INSERT INTO `STOCK` (`CODIGO_DE_BARRAS`, `cantidad_total`) VALUES
('12312324132132342312', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRONCO_FACTURA_ARTICULO`
--

CREATE TABLE `TRONCO_FACTURA_ARTICULO` (
  `ID_TRONCO_FACTURA_ARTICULO` int(5) NOT NULL,
  `ID_factura` int(5) DEFAULT NULL,
  `ID_articulo` int(5) DEFAULT NULL,
  `numero_de_serie` int(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `sumaprecio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRONCO_FACTURA_SERVICIO`
--

CREATE TABLE `TRONCO_FACTURA_SERVICIO` (
  `ID_TRONCO_FACTURA_SERVICIO` int(5) NOT NULL,
  `ID_factura` int(5) DEFAULT NULL,
  `ID_minutaje` int(4) DEFAULT NULL,
  `nombre_servicio` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `horas` float NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRONCO_PRE_FACTURA_ARTICULO`
--

CREATE TABLE `TRONCO_PRE_FACTURA_ARTICULO` (
  `ID_TRONCO_PRE_FACTURA_ARTICULO` int(5) NOT NULL,
  `ID_pre_factura` int(5) DEFAULT NULL,
  `ID_articulo` int(5) DEFAULT NULL,
  `numero_de_serie` int(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` float NOT NULL,
  `suma_precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TRONCO_PRE_FACTURA_ARTICULO`
--

INSERT INTO `TRONCO_PRE_FACTURA_ARTICULO` (`ID_TRONCO_PRE_FACTURA_ARTICULO`, `ID_pre_factura`, `ID_articulo`, `numero_de_serie`, `cantidad`, `precio`, `suma_precio`) VALUES
(1, 1, 1, 2132123, 1, 300, 300),
(2, 12, 1, 2132123, 1, 300, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRONCO_PRE_FACTURA_MINUTAJE`
--

CREATE TABLE `TRONCO_PRE_FACTURA_MINUTAJE` (
  `ID_TRONCO_PRE_FACTURA_MINUTAJE` int(4) NOT NULL,
  `ID_pre_factura` int(5) NOT NULL,
  `ID_minutaje` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `ID_servicio` int(4) NOT NULL,
  `horas` time NOT NULL,
  `precio_servicio` float NOT NULL,
  `precio_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TRONCO_PRE_FACTURA_MINUTAJE`
--

INSERT INTO `TRONCO_PRE_FACTURA_MINUTAJE` (`ID_TRONCO_PRE_FACTURA_MINUTAJE`, `ID_pre_factura`, `ID_minutaje`, `ID_servicio`, `horas`, `precio_servicio`, `precio_total`) VALUES
(1, 1, '7', 3, '02:00:00', 50, 100),
(2, 13, '9', 1, '00:00:00', 30, 0),
(3, 13, '12', 1, '00:30:00', 30, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TRONCO_PRE_FACTURA_SERVICIO`
--

CREATE TABLE `TRONCO_PRE_FACTURA_SERVICIO` (
  `ID_TRONCO_PRE_FACTURA_MINUTAJE` int(11) NOT NULL,
  `ID_pre_factura` int(11) NOT NULL,
  `ID_servicio` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TRONCO_PRE_FACTURA_SERVICIO`
--

INSERT INTO `TRONCO_PRE_FACTURA_SERVICIO` (`ID_TRONCO_PRE_FACTURA_MINUTAJE`, `ID_pre_factura`, `ID_servicio`, `precio`, `cantidad`, `precio_total`) VALUES
(1, 5, 1, 30, 2, 60),
(2, 1, 1, 30, 5, 150),
(3, 1, 1, 30, 2, 60),
(4, 10, 3, 50, 10, 500),
(5, 10, 1, 30, 10, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `ID_USUARIO` int(4) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `user` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`ID_USUARIO`, `nombre`, `apellido`, `correo`, `telefono`, `user`, `password`, `rol`, `activo`, `imagen`) VALUES
(11, 'usuario1', '', '', 0, 'usu1', '529113007b15005637b3dad6d9ba2f10', 5, 0, NULL),
(12, 'usuario2', '', '', 0, 'usu2', '25d55ad283aa400af464c76d713c07ad', 1, 1, NULL),
(26, 'Sergi', 'Capellera', 'scapellera@ctw.es', 608232626, 'sergi', 'cc18d123662375ec0ae275b50cebcc36', 1, 1, NULL),
(27, 'usuario4', 'test', 'usuario4@ctw.es', 674483645, 'usu4', '2a90084cdef89518c2b8b5ce3130266f', 3, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  ADD PRIMARY KEY (`ID_ARTICULO`),
  ADD KEY `fk_NIF_mayorista_articulo` (`NIF_mayorista`),
  ADD KEY `fk_codigo_de_barras_articulo` (`codigo_de_barras`),
  ADD KEY `NIF_cliente_articulo` (`NIF_cliente_articulo`);

--
-- Indices de la tabla `ARTICULO_FACTURADO`
--
ALTER TABLE `ARTICULO_FACTURADO`
  ADD PRIMARY KEY (`ID_ARTICULO_FACTURADO`);

--
-- Indices de la tabla `ASIGNAR_USUARIO_PROVEEDOR`
--
ALTER TABLE `ASIGNAR_USUARIO_PROVEEDOR`
  ADD PRIMARY KEY (`NUM_DETALLE_PROVEEDOR`),
  ADD KEY `fk_ID_usuario_detalle_proveedor` (`ID_usuario`),
  ADD KEY `fk_NIF_mayorista_detalle_proveedor` (`NIF_mayorista`);

--
-- Indices de la tabla `CABECERA_FACTURA`
--
ALTER TABLE `CABECERA_FACTURA`
  ADD PRIMARY KEY (`ID_CABECERA_FACTURA`),
  ADD KEY `fk_ID_factura_cabecera_factura` (`ID_factura`),
  ADD KEY `fk_NIF_cliente_cabecera_factura` (`NIF_cliente`);

--
-- Indices de la tabla `CABECERA_PRE_FACTURA`
--
ALTER TABLE `CABECERA_PRE_FACTURA`
  ADD PRIMARY KEY (`ID_CABECERA_PRE_FACTURA`),
  ADD KEY `ID_pre_factura` (`ID_pre_factura`);

--
-- Indices de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`NIF_EMPRESA`),
  ADD KEY `fk_pais_clientes` (`pais`),
  ADD KEY `SEPA` (`SEPA`);

--
-- Indices de la tabla `CONTACTO`
--
ALTER TABLE `CONTACTO`
  ADD PRIMARY KEY (`ID_CONTACTO`),
  ADD KEY `fk_ID_subsede_contacto` (`ID_sede`),
  ADD KEY `fk_pais_contacto` (`pais`);

--
-- Indices de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  ADD PRIMARY KEY (`ID_FACTURA`);

--
-- Indices de la tabla `IVA`
--
ALTER TABLE `IVA`
  ADD PRIMARY KEY (`IVA`);

--
-- Indices de la tabla `MAYORISTA`
--
ALTER TABLE `MAYORISTA`
  ADD PRIMARY KEY (`NIF_MAYORISTA`),
  ADD KEY `fk_pais_mayorista` (`pais`);

--
-- Indices de la tabla `MINUTAJE`
--
ALTER TABLE `MINUTAJE`
  ADD PRIMARY KEY (`ID_MINUTAJE`),
  ADD KEY `fk_ID_servicio_fecha` (`ID_servicio`),
  ADD KEY `fk_NIF_cliente_fecha` (`NIF_cliente`),
  ADD KEY `fk_ID_sede_fecha` (`ID_sede`),
  ADD KEY `fk_ID_usuario_fecha` (`ID_usuario`);

--
-- Indices de la tabla `MINUTAJE_FACTURADO`
--
ALTER TABLE `MINUTAJE_FACTURADO`
  ADD PRIMARY KEY (`ID_MINUTAJE_FACTURADO`);

--
-- Indices de la tabla `PAIS`
--
ALTER TABLE `PAIS`
  ADD PRIMARY KEY (`PAIS`);

--
-- Indices de la tabla `PIE_FACTURA`
--
ALTER TABLE `PIE_FACTURA`
  ADD PRIMARY KEY (`ID_PIE_FACTURA`),
  ADD KEY `fk_ID_factura_pie_factura` (`ID_factura`),
  ADD KEY `fk_ID_IVA` (`IVA`);

--
-- Indices de la tabla `PRE_FACTURA`
--
ALTER TABLE `PRE_FACTURA`
  ADD PRIMARY KEY (`ID_PRE_FACTURA`),
  ADD KEY `NIF_empresa` (`NIF_empresa`);

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
  ADD PRIMARY KEY (`rol`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indices de la tabla `SEDE`
--
ALTER TABLE `SEDE`
  ADD PRIMARY KEY (`ID_SEDE`),
  ADD KEY `fk_NIF_cliente_sede` (`NIF_cliente`),
  ADD KEY `fk_pais_sede` (`pais`);

--
-- Indices de la tabla `SEPA`
--
ALTER TABLE `SEPA`
  ADD PRIMARY KEY (`valor`),
  ADD UNIQUE KEY `valor` (`valor`);

--
-- Indices de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD PRIMARY KEY (`ID_SERVICIO`),
  ADD KEY `NIF_empresa` (`NIF_empresa`);

--
-- Indices de la tabla `SERVICIO_FACTURADO`
--
ALTER TABLE `SERVICIO_FACTURADO`
  ADD PRIMARY KEY (`ID_SERVICIO_FACTURADO`);

--
-- Indices de la tabla `STOCK`
--
ALTER TABLE `STOCK`
  ADD PRIMARY KEY (`CODIGO_DE_BARRAS`),
  ADD UNIQUE KEY `CODIGO_DE_BARRAS` (`CODIGO_DE_BARRAS`);

--
-- Indices de la tabla `TRONCO_FACTURA_ARTICULO`
--
ALTER TABLE `TRONCO_FACTURA_ARTICULO`
  ADD PRIMARY KEY (`ID_TRONCO_FACTURA_ARTICULO`),
  ADD KEY `fk_ID_factura_tronco_factura_articulos` (`ID_factura`),
  ADD KEY `fk_ID_articulo_tronco_factura_articulos` (`ID_articulo`);

--
-- Indices de la tabla `TRONCO_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_FACTURA_SERVICIO`
  ADD PRIMARY KEY (`ID_TRONCO_FACTURA_SERVICIO`),
  ADD UNIQUE KEY `ID_minutaje` (`ID_minutaje`),
  ADD KEY `fk_ID_factura_tronco_factura_servicios` (`ID_factura`);

--
-- Indices de la tabla `TRONCO_PRE_FACTURA_ARTICULO`
--
ALTER TABLE `TRONCO_PRE_FACTURA_ARTICULO`
  ADD PRIMARY KEY (`ID_TRONCO_PRE_FACTURA_ARTICULO`),
  ADD KEY `ID_pre_factura` (`ID_pre_factura`),
  ADD KEY `ID_articulo` (`ID_articulo`);

--
-- Indices de la tabla `TRONCO_PRE_FACTURA_MINUTAJE`
--
ALTER TABLE `TRONCO_PRE_FACTURA_MINUTAJE`
  ADD PRIMARY KEY (`ID_TRONCO_PRE_FACTURA_MINUTAJE`);

--
-- Indices de la tabla `TRONCO_PRE_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_PRE_FACTURA_SERVICIO`
  ADD PRIMARY KEY (`ID_TRONCO_PRE_FACTURA_MINUTAJE`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  MODIFY `ID_ARTICULO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ARTICULO_FACTURADO`
--
ALTER TABLE `ARTICULO_FACTURADO`
  MODIFY `ID_ARTICULO_FACTURADO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ASIGNAR_USUARIO_PROVEEDOR`
--
ALTER TABLE `ASIGNAR_USUARIO_PROVEEDOR`
  MODIFY `NUM_DETALLE_PROVEEDOR` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `CABECERA_FACTURA`
--
ALTER TABLE `CABECERA_FACTURA`
  MODIFY `ID_CABECERA_FACTURA` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `CABECERA_PRE_FACTURA`
--
ALTER TABLE `CABECERA_PRE_FACTURA`
  MODIFY `ID_CABECERA_PRE_FACTURA` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `CONTACTO`
--
ALTER TABLE `CONTACTO`
  MODIFY `ID_CONTACTO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID_FACTURA` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `MINUTAJE`
--
ALTER TABLE `MINUTAJE`
  MODIFY `ID_MINUTAJE` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `MINUTAJE_FACTURADO`
--
ALTER TABLE `MINUTAJE_FACTURADO`
  MODIFY `ID_MINUTAJE_FACTURADO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `PIE_FACTURA`
--
ALTER TABLE `PIE_FACTURA`
  MODIFY `ID_PIE_FACTURA` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PRE_FACTURA`
--
ALTER TABLE `PRE_FACTURA`
  MODIFY `ID_PRE_FACTURA` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `SEDE`
--
ALTER TABLE `SEDE`
  MODIFY `ID_SEDE` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  MODIFY `ID_SERVICIO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `SERVICIO_FACTURADO`
--
ALTER TABLE `SERVICIO_FACTURADO`
  MODIFY `ID_SERVICIO_FACTURADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `TRONCO_FACTURA_ARTICULO`
--
ALTER TABLE `TRONCO_FACTURA_ARTICULO`
  MODIFY `ID_TRONCO_FACTURA_ARTICULO` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TRONCO_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_FACTURA_SERVICIO`
  MODIFY `ID_TRONCO_FACTURA_SERVICIO` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TRONCO_PRE_FACTURA_ARTICULO`
--
ALTER TABLE `TRONCO_PRE_FACTURA_ARTICULO`
  MODIFY `ID_TRONCO_PRE_FACTURA_ARTICULO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `TRONCO_PRE_FACTURA_MINUTAJE`
--
ALTER TABLE `TRONCO_PRE_FACTURA_MINUTAJE`
  MODIFY `ID_TRONCO_PRE_FACTURA_MINUTAJE` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `TRONCO_PRE_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_PRE_FACTURA_SERVICIO`
  MODIFY `ID_TRONCO_PRE_FACTURA_MINUTAJE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `ID_USUARIO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  ADD CONSTRAINT `fk_NIF_cliente_articulo` FOREIGN KEY (`NIF_cliente_articulo`) REFERENCES `CLIENTE` (`NIF_EMPRESA`),
  ADD CONSTRAINT `fk_NIF_mayorista_articulo` FOREIGN KEY (`NIF_mayorista`) REFERENCES `MAYORISTA` (`NIF_MAYORISTA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `ASIGNAR_USUARIO_PROVEEDOR`
--
ALTER TABLE `ASIGNAR_USUARIO_PROVEEDOR`
  ADD CONSTRAINT `fk_ID_usuario_detalle_proveedor` FOREIGN KEY (`ID_usuario`) REFERENCES `USUARIO` (`ID_USUARIO`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_NIF_mayorista_detalle_proveedor` FOREIGN KEY (`NIF_mayorista`) REFERENCES `MAYORISTA` (`NIF_MAYORISTA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `CABECERA_FACTURA`
--
ALTER TABLE `CABECERA_FACTURA`
  ADD CONSTRAINT `fk_ID_factura_cabecera_factura` FOREIGN KEY (`ID_factura`) REFERENCES `FACTURA` (`ID_FACTURA`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_NIF_cliente_cabecera_factura` FOREIGN KEY (`NIF_cliente`) REFERENCES `CLIENTE` (`NIF_EMPRESA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD CONSTRAINT `fk_pais_clientes` FOREIGN KEY (`pais`) REFERENCES `PAIS` (`PAIS`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_sepa_clientes` FOREIGN KEY (`SEPA`) REFERENCES `SEPA` (`valor`);

--
-- Filtros para la tabla `CONTACTO`
--
ALTER TABLE `CONTACTO`
  ADD CONSTRAINT `fk_ID_subsede_contacto` FOREIGN KEY (`ID_sede`) REFERENCES `SEDE` (`ID_SEDE`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_pais_contacto` FOREIGN KEY (`pais`) REFERENCES `PAIS` (`PAIS`) ON DELETE SET NULL;

--
-- Filtros para la tabla `MAYORISTA`
--
ALTER TABLE `MAYORISTA`
  ADD CONSTRAINT `fk_pais_mayorista` FOREIGN KEY (`pais`) REFERENCES `PAIS` (`PAIS`) ON DELETE SET NULL;

--
-- Filtros para la tabla `MINUTAJE`
--
ALTER TABLE `MINUTAJE`
  ADD CONSTRAINT `fk_ID_sede_fecha` FOREIGN KEY (`ID_sede`) REFERENCES `SEDE` (`ID_SEDE`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ID_servicio_fecha` FOREIGN KEY (`ID_servicio`) REFERENCES `SERVICIO` (`ID_SERVICIO`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ID_usuario_fecha` FOREIGN KEY (`ID_usuario`) REFERENCES `USUARIO` (`ID_USUARIO`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_NIF_empresa_fecha` FOREIGN KEY (`NIF_cliente`) REFERENCES `CLIENTE` (`NIF_EMPRESA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `PIE_FACTURA`
--
ALTER TABLE `PIE_FACTURA`
  ADD CONSTRAINT `fk_ID_IVA` FOREIGN KEY (`IVA`) REFERENCES `IVA` (`IVA`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ID_factura_pie_factura` FOREIGN KEY (`ID_factura`) REFERENCES `FACTURA` (`ID_FACTURA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `SEDE`
--
ALTER TABLE `SEDE`
  ADD CONSTRAINT `fk_NIF_cliente_sede` FOREIGN KEY (`NIF_cliente`) REFERENCES `CLIENTE` (`NIF_EMPRESA`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_pais_sede` FOREIGN KEY (`pais`) REFERENCES `PAIS` (`PAIS`) ON DELETE SET NULL;

--
-- Filtros para la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD CONSTRAINT `FK_NIF_empresa_servicio` FOREIGN KEY (`NIF_empresa`) REFERENCES `CLIENTE` (`NIF_EMPRESA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `TRONCO_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_FACTURA_SERVICIO`
  ADD CONSTRAINT `fk_ID_factura_tronco_factura_servicios` FOREIGN KEY (`ID_factura`) REFERENCES `FACTURA` (`ID_FACTURA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD CONSTRAINT `fk_usuarios_rol_rol` FOREIGN KEY (`rol`) REFERENCES `ROL` (`rol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
