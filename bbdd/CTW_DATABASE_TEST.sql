-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2017 a las 14:30:37
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
  `numero_de_serie` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(3) NOT NULL,
  `numero_factura` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_de_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ARTICULO`
--

INSERT INTO `ARTICULO` (`ID_ARTICULO`, `nombre`, `descripcion`, `codigo_de_barras`, `NIF_mayorista`, `codigo_producto_mayorista`, `numero_de_serie`, `precio`, `cantidad`, `numero_factura`, `ubicacion`, `fecha_de_alta`) VALUES
(1, 'Samsung galaxy A5', 'Smartphone', '12312324132132342312', '36340346F', NULL, '2132123', 295, 2, '87998', NULL, '2017-01-28 17:08:47'),
(2, 'Samsung galaxy A5', 'Smartphone', '12312324132132342312', '23815837G', NULL, '21321231', 290, 2, '879982', NULL, '2017-01-28 17:08:47'),
(3, 'Samsung galaxy A5', 'Smartphone', '12312324132132342312', '23815837G', NULL, '213212313', 270.5, 5, '8799823', NULL, '2017-01-28 17:08:47'),
(4, 'BQ aquaris M5.5', 'Smartphone', '12312324132132342333', '23815837G', NULL, '1223212222', 195.99, 2, '879982111', NULL, '2017-01-28 17:13:45'),
(5, 'dfg', NULL, '12312324132132342312', 'sfsdf', NULL, '345', 4, 5, '54353', NULL, '2017-02-01 15:35:45'),
(6, 'dfg', NULL, '12312324132132342312', 'sfsdf', NULL, '345', 4, 5, '54353', NULL, '2017-02-01 15:44:54'),
(7, 'aaaaaaaaaaaaaaaaaaaaa', NULL, '234', '23815837G', NULL, '22222', 2, 55, '123', NULL, '2017-02-01 16:05:31');

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
  `SEPA` tinyint(1) NOT NULL,
  `pais` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `prefijo` int(5) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `CLIENTE`
--

INSERT INTO `CLIENTE` (`NIF_EMPRESA`, `nombre_comercial`, `nombre_completo`, `telefono`, `email`, `ciudad_facturacion`, `codigo_postal_facturacion`, `calle_facturacion`, `numero_facturacion`, `ciudad_envio`, `codigo_postal_envio`, `calle_envio`, `numero_envio`, `IBAN`, `SEPA`, `pais`, `prefijo`, `activo`) VALUES
('1234K', 'cliente prueba', 'cliente prueba', 345345, 'rgdfg@sdfgdf', 'cliente prueba', '08054', 'cliente prueba', '23', 'cliente prueba', '45', 'cliente prueba', '12', '345345', 127, 'Bahamas', 1242, 0),
('23415624G', 'ARKHE', 'RIRLEY S.L', 933201263, 'rirley@gmail.com', 'Barcelona', '08008', 'calle hotel W', '101', 'Barcelona', '08008', 'calle hotel W', '101', 'ES242100322143454321', 1, 'Eslovenia', 386, 1),
('44512378G', 'BETARQ', 'BETARQ ARQUITECTOS S.L', 931804172, 'betarq@gmail.com', 'Barcelona', '08008', 'Balmes', '78', 'Barcelona', '08008', 'Balmes', '78', 'ES211000345576429841', 1, 'Alemania', 49, 1),
('45327163G', 'LIUJO', 'LIUJO S.L', 912804170, 'liujo@gmail.com', 'Milán', '12234', 'Plaza Italia', '33', 'Madrid', '08024', 'Calle mallorca', '33', 'ES333410234578922345', 1, 'Italia', 39, 1),
('bb', 'bbb', 'bebebe', 55555, 'bb@gggdd', 'aa', 'aa', 'aa', 'aa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaaa', 1, 'Angola', 244, 0),
('cc', 'cc', 'cc', 333, 'cc@ccc', 'cc', 'cc', 'cc', 'cc', 'cc', 'ccc', 'cc', 'cc', 'cc', 1, 'Armenia', 374, 0),
('dd', 'dd', 'dd', 222, 'dd@dd', 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', 'dd', 1, 'Francia', 33, 0);

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
(1, 'Andrés Palomares', 7, 'Informatico', 'apalomares@thearkhe.es', 912345712, 'Albania', 355, 107, 1),
(2, 'Marina', 8, 'Secretaria', 'marina@liujo.es', 609234526, 'España', 34, 77, 1);

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
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MAYORISTA`
--

INSERT INTO `MAYORISTA` (`NIF_MAYORISTA`, `nombre_empresa`, `nombre_comercial`, `telefono_empresa`, `telefono_comercial`, `extension_telefono_comercial`, `email_empresa`, `email_comercial`, `ubicacion`, `pais`, `prefijo`, `activo`) VALUES
('23815837G', 'Mediamarkt S.L', NULL, 936459238, 43535345, 23, 'mediamarkt@gmail.com', 'y', '', 'Eslovaquia', 421, 0),
('36340346F', 'Fnac', 'fnac glorias', 932107712, NULL, NULL, 'fnac@gmail.com', NULL, '', 'Egipto', 20, 1),
('dfghgfh', 'gggg', NULL, 2343, NULL, NULL, 'fdf@fd', NULL, 'tytr', 'Bahamas', 1242, 1),
('fffff', 'gggg', NULL, 2343, NULL, NULL, 'fdf@fd', NULL, NULL, 'Bahamas', 1242, 1),
('sfsdf', 'sdfds', NULL, 345, NULL, NULL, 'fdg@fdg', NULL, '', 'Azerbaiyán', 994, 0);

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
  `facturado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `MINUTAJE`
--

INSERT INTO `MINUTAJE` (`ID_MINUTAJE`, `fecha`, `hora_entrada`, `hora_salida`, `ID_servicio`, `ID_usuario`, `ID_sede`, `NIF_cliente`, `facturado`) VALUES
(1, '2017-02-16', '12:45:00', '01:01:00', 2, 13, 9, '44512378G', 0),
(2, '2017-02-15', '13:26:00', '13:29:00', NULL, 23, 9, '44512378G', 0),
(3, '2017-02-15', '13:29:00', '00:00:00', 3, 11, 10, '1234K', 0),
(5, '2017-02-15', '13:34:00', '13:34:00', NULL, 23, 9, '44512378G', 0),
(6, '2017-02-15', '13:35:00', '00:00:00', 3, 25, 7, '23415624G', 0),
(51, '2017-02-15', '17:19:00', '17:19:00', 3, 23, 9, '44512378G', 1),
(52, '2017-02-15', '17:19:00', '17:19:00', 3, 23, 9, '44512378G', 1),
(53, '2017-02-15', '17:21:00', '17:21:00', NULL, 23, 10, '1234K', 1),
(54, '2017-02-15', '17:21:00', '17:21:00', 3, 11, 1, 'bb', 1),
(55, '2017-02-15', '17:22:00', '17:22:00', 3, 13, 1, 'bb', 1),
(56, '2017-02-15', '17:24:00', '17:24:00', NULL, 23, 9, '44512378G', 1),
(57, '2017-02-15', '17:25:00', '17:25:00', NULL, 15, 9, '44512378G', 0),
(58, '2017-02-15', '17:27:00', '17:27:00', NULL, 22, 9, '44512378G', 0),
(60, '2017-02-15', '17:29:00', '17:29:00', NULL, NULL, 9, '44512378G', 0),
(71, '2017-02-15', '18:02:00', '18:02:00', NULL, 12, 8, '45327163G', 0),
(72, '2017-02-15', '18:06:00', '18:06:00', NULL, 12, 7, '23415624G', 0),
(73, '2017-02-15', '18:11:00', '00:00:00', 3, 12, 1, 'bb', 0),
(76, '2017-02-15', '18:44:00', '00:00:00', 3, 12, 7, '23415624G', 1),
(81, '2017-02-15', '19:01:00', '00:00:00', 3, 12, 10, '1234K', 1),
(82, '2017-02-15', '19:03:00', '00:00:00', NULL, 12, 9, '44512378G', 0),
(83, '2017-02-15', '19:04:00', '19:04:00', NULL, 12, 10, '1234K', 0),
(84, '2017-02-15', '19:05:00', '00:00:00', 3, 12, 8, '45327163G', 0),
(85, '2017-02-15', '19:06:00', '19:06:00', 3, 12, 5, 'dd', 0),
(86, '2017-02-16', '12:54:00', '12:54:00', NULL, 12, 9, '44512378G', 0),
(87, '2017-02-16', '12:56:00', '12:58:00', 3, 12, 8, '45327163G', 0);

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
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SEDE`
--

INSERT INTO `SEDE` (`ID_SEDE`, `NIF_cliente`, `nombre`, `ubicacion`, `ciudad`, `codigo_postal`, `calle`, `numero`, `telefono`, `pais`, `prefijo`, `activo`) VALUES
(1, 'bb', 'bbbbbbbb', '', 'bbb', 'bbb', 'A', 'bbb', 666, 'Andorra', 376, 0),
(2, 'bb', 'aaa', 'aaa', 'aaaaaa', 'aaa', 'aaaa', 'aaa', 777, 'Australia', 61, 1),
(4, 'bb', 'ddd', '', 'ddd', 'ddd', 'A', 'ddd', 999, 'Barbados', 1246, 0),
(5, 'dd', 'dd', 'ddddddd', 'sss', 'dd', 'BBBB', 'dd', 546345654, 'Alemania', 355, 1),
(6, 'dd', 'patata', 'asd', 'iiii', 'ads', 'asd', 'asd', 2147483647, 'Jordania', 962, 1),
(7, '23415624G', 'The Arkhe Madridd', '1a planta zona izquierda', 'Madrid', '09754', 'Gran Via', '33', 912356170, 'Bahamas', 1242, 1),
(8, '45327163G', 'LIUJO Corte Ingles Gran Via', 'Planta mujer fondo derecha', 'Madrid', '08345', 'Gran Via', ' 876', 911234761, 'España', 34, 1),
(9, '44512378G', 'Betarq Barcelona', 'Bajos', 'Barcelona', '08002', 'Mallorca', '145', 937841273, 'Argentina', 54, 1),
(10, '1234K', 'prueba sede 1', '', 'prueba sede 1', '4545', 'prueba sede 1', '43', 645645, 'Bahamas', 1242, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SERVICIO`
--

CREATE TABLE `SERVICIO` (
  `ID_SERVICIO` int(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `precio` float NOT NULL,
  `NIF_empresa` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `SERVICIO`
--

INSERT INTO `SERVICIO` (`ID_SERVICIO`, `nombre`, `descripcion`, `precio`, `NIF_empresa`) VALUES
(2, 'reparar', 'arreglar pc y otros', 44, NULL),
(3, 'Otro', 'servicio fuera de lo comun (Falta definir precio)', 2, NULL);

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
('12312324132132342312', 21),
('12312324132132342333', 2);

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
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`ID_USUARIO`, `nombre`, `apellido`, `correo`, `telefono`, `user`, `password`, `rol`, `activo`) VALUES
(10, 'usuario3', '', '', 0, 'usu3', 'usu3', 0, 0),
(11, 'usuario1', '', '', 0, 'usu1', '529113007b15005637b3dad6d9ba2f10', 5, 0),
(12, 'usuario2', '', '', 0, 'usu2', '9c60c45d8440e2ece3442fed8fe4c5c2', 1, 0),
(13, 'eee', '', '', 0, 'eee', 'd2f2297d6e829cd3493aa7de4416a18f', 0, 0),
(15, 'eee', '', '', 0, 'eee', 'd2f2297d6e829cd3493aa7de4416a18f', 0, 0),
(20, 'aaa', '', '', 0, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 0, 0),
(21, 'zzz', '', '', 0, 'zzz', '10b260458f0277c4481694ff06b8bb91', 0, 0),
(22, 'ssssssss', '', '', 0, 'sssssss', '16fcb1091f8a0cc70c96e2ff97fdd213', 0, 0),
(23, 'ergtrgr', '', '', 0, 'wret', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(24, 'trftry', '', '', 0, 'hggfh', '2d73ccacc33ebbc7deb7faa109fa95e9', 0, 0),
(25, 'gjgh', '', '', 0, 'hj', '55f341d654dcfa8900d86da35d3b2af0', 0, 0),
(26, 'Sergi', 'Capellera', 'scapellera@ctw.es', 608232626, 'sergi', 'cc18d123662375ec0ae275b50cebcc36', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  ADD PRIMARY KEY (`ID_ARTICULO`),
  ADD KEY `fk_NIF_mayorista_articulo` (`NIF_mayorista`),
  ADD KEY `fk_codigo_de_barras_articulo` (`codigo_de_barras`);

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
-- Indices de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`NIF_EMPRESA`),
  ADD KEY `fk_pais_clientes` (`pais`);

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
-- Indices de la tabla `SEDE`
--
ALTER TABLE `SEDE`
  ADD PRIMARY KEY (`ID_SEDE`),
  ADD KEY `fk_NIF_cliente_sede` (`NIF_cliente`),
  ADD KEY `fk_pais_sede` (`pais`);

--
-- Indices de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  ADD PRIMARY KEY (`ID_SERVICIO`),
  ADD KEY `NIF_empresa` (`NIF_empresa`);

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
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
  MODIFY `ID_ARTICULO` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT de la tabla `CONTACTO`
--
ALTER TABLE `CONTACTO`
  MODIFY `ID_CONTACTO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `FACTURA`
--
ALTER TABLE `FACTURA`
  MODIFY `ID_FACTURA` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `MINUTAJE`
--
ALTER TABLE `MINUTAJE`
  MODIFY `ID_MINUTAJE` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT de la tabla `PIE_FACTURA`
--
ALTER TABLE `PIE_FACTURA`
  MODIFY `ID_PIE_FACTURA` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `SEDE`
--
ALTER TABLE `SEDE`
  MODIFY `ID_SEDE` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `SERVICIO`
--
ALTER TABLE `SERVICIO`
  MODIFY `ID_SERVICIO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `ID_USUARIO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ARTICULO`
--
ALTER TABLE `ARTICULO`
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
  ADD CONSTRAINT `fk_pais_clientes` FOREIGN KEY (`pais`) REFERENCES `PAIS` (`PAIS`) ON DELETE SET NULL;

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
-- Filtros para la tabla `STOCK`
--
ALTER TABLE `STOCK`
  ADD CONSTRAINT `fk_codigo_de_barras_articulo` FOREIGN KEY (`CODIGO_DE_BARRAS`) REFERENCES `ARTICULO` (`codigo_de_barras`);

--
-- Filtros para la tabla `TRONCO_FACTURA_ARTICULO`
--
ALTER TABLE `TRONCO_FACTURA_ARTICULO`
  ADD CONSTRAINT `fk_ID_articulo_tronco_factura_articulos` FOREIGN KEY (`ID_articulo`) REFERENCES `ARTICULO` (`ID_ARTICULO`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ID_factura_tronco_factura_articulos` FOREIGN KEY (`ID_factura`) REFERENCES `FACTURA` (`ID_FACTURA`) ON DELETE SET NULL;

--
-- Filtros para la tabla `TRONCO_FACTURA_SERVICIO`
--
ALTER TABLE `TRONCO_FACTURA_SERVICIO`
  ADD CONSTRAINT `fk_ID_factura_tronco_factura_servicios` FOREIGN KEY (`ID_factura`) REFERENCES `FACTURA` (`ID_FACTURA`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ID_minutaje_tronco_factura_servicios` FOREIGN KEY (`ID_minutaje`) REFERENCES `MINUTAJE` (`ID_MINUTAJE`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
