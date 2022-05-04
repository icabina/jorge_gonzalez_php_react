-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2022 a las 15:58:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jorge_gonzalez_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `00_admin`
--

CREATE TABLE `00_admin` (
  `ID_admin` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `00_admin`
--

INSERT INTO `00_admin` (`ID_admin`, `usuario`, `contrasena`) VALUES
(1, 'admin', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `01_proyectos`
--

CREATE TABLE `01_proyectos` (
  `ID_proyecto` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` text NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `mini` text NOT NULL,
  `grande` text NOT NULL,
  `obra_inicio` varchar(255) NOT NULL,
  `obra_fin` varchar(255) NOT NULL,
  `contratante` text NOT NULL,
  `web` varchar(255) NOT NULL,
  `foto_banner` text NOT NULL,
  `destacado` tinyint(1) NOT NULL,
  `fecha` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `01_proyectos`
--

INSERT INTO `01_proyectos` (`ID_proyecto`, `nombre`, `ciudad`, `direccion`, `descripcion`, `categoria`, `area`, `mini`, `grande`, `obra_inicio`, `obra_fin`, `contratante`, `web`, `foto_banner`, `destacado`, `fecha`) VALUES
(28, 'Landmark Hotel', 'Barrio Manila, Medellín', 'Calle 14 43D-85', '<p>Torre de 14 pisos con 45 suites hoteleras</p>\r\n', 'ejecutados', '4.640 mt2', '1651499297_mini_img-4960.jpg', '1651499296_img-4960.jpg', 'abril de 2019', 'marzo de 2022', '<p>Lleras Holdings SAS,</p>\r\n\r\n<p>Trazos Urbanos SAS</p>\r\n', '', '1651509141_img-4917.jpg', 1, 2022),
(29, 'Marquee Hotel', 'Parque Lleras, Medellín', 'Carrera 38 9A-13', '<p>Torre de 8 pisos con 83 suites hoteleras.</p>\r\n', 'ejecutados', '2.331 mt2', '1651353801_mini_photo-2021-01-29-16-36-08-3.jpg', '1651353800_photo-2021-01-29-16-36-08-3.jpg', 'marzo de 2020', 'febrero de 2021', '<p>Lleras Holdings SAS,</p>\r\n\r\n<p>Trazos Urbanos SAS</p>\r\n', 'test', '1651517798_img-1941.jpg', 1, 2021),
(30, 'Factory Lofts', 'Barrio Laureles, Medellín', 'Carrera 69 C1-14', '<p>Torre de 7 pisos con 25 suites hoteleras,</p>\r\n\r\n<p>co-working y locales comerciales</p>\r\n', 'ejecutados', '1.722 m2', '1651499255_mini_3-img_868.jpg', '1651499255_3-img_868.jpg', 'septiembre de 2018', 'octubre de 2019', '<p>Laureles Holdings SAS<br />\r\nTrazos Urbanos SAS</p>\r\n', '', '1651530374_7-file8-8.jpg', 0, 2019),
(31, 'Edificio O\'clock', 'Zuñiga, Envigado', 'Calle 23 Sur 42B-60', '<p>Torre de 22 pisos con 100 aptos, 10 oficinas,</p>\r\n\r\n<p>2 locales comerciales</p>\r\n', 'ejecutados', '22.855 mt2', '1651520885_mini_oclock_foto_45.jpg', '1651520885_oclock_foto_45.jpg', 'marzo de 2016', 'agosto de 2018', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651530157_oclock_20092018-dsc01368.jpg', 0, 2018),
(32, ' Urbanización Bosque Verde', 'Medellín', 'Carrera 6A 47A-40', '<p>6 torres, cada una con 17 pisos. 198 apartamentos &nbsp;</p>\r\n\r\n<p>(Vivienda Interes Prioritario, VIP)</p>\r\n', 'ejecutados', '69.171 m2', '1651520929_mini_img_20190404_110653.jpg', '1651520929_img_20190404_110653.jpg', 'enero de 2015', 'diciembre de 2017', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651521012_avance1.jpg', 0, 2017),
(33, 'Urbanización Sendero de Bosque Verde', 'Medellín', 'Calle 47A 6AB-30', '<p>4 torres, cada una con 18 pisos. 210 apartamentos de 41 mt2</p>\r\n\r\n<p>(Vivienda Interes Prioritario, VIP)</p>\r\n', 'ejecutados', '46,114 m2', '1651521608_mini_avance-mayo-2019--29-.jpg', '1651521607_avance-mayo-2019--29-.jpg', 'agosto de 2017', 'octubre de 2019', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651521608_avance-febrero-2019--17-.jpg', 0, 2018),
(34, 'Soul Lifestyle Hotel', 'Medellín', 'Carrera 35 2Sur-120', '<p>Torre de 14 pisos,</p>\r\n\r\n<p>80 suites residenciales</p>\r\n', 'ejecutados', '2,900 m2', '1651522705_mini_fachada.jpg', '1651522705_fachada.jpg', 'diciembre de 2013', 'febrero de 2015', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Fundación Familia Nazareth</p>\r\n', '', '1651522705_20092018-dsc01414.jpg', 0, 2015),
(35, 'Residencia de retiros Juan Pablo II', 'Zuñiga, Envigado', 'Carrera 42B 23A sur- 85', '<p>Torre de 14 pisos, 80 suites residenciales</p>\r\n', 'ejecutados', '2,900 m2', '1651522912_mini_4.-juan-pablo-ii_mg_0052-ejecutado.jpg', '1651522912_4.-juan-pablo-ii_mg_0052-ejecutado.jpg', 'diciembre de 2013', 'febrero de 2015', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Fundación Familia Nazareth</p>\r\n', '', '1651522912_4.4.-juan-pablo-ii_mg_0060.jpg', 0, 2015),
(36, 'Edificio Opera', 'Zuñiga, Envigado', 'Carrera 42B 23A sur- 84', '<p>Torre de 16 pisos,</p>\r\n\r\n<p>52 apartamentos&nbsp;&nbsp;</p>\r\n', 'ejecutados', '11,193 m2', '1651523341_mini_opera_mg_0014.jpg', '1651523341_opera_mg_0014.jpg', 'agosto de 2013', 'febrero de 2015', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651523341_opera_mg_0031.jpg', 0, 2015),
(37, 'Edificio Moka', 'Zuñiga, Envigado', 'Carrera 42B 23A sur- 60', '<p>Torre de 12 pisos, 17 apartamentos</p>\r\n', 'ejecutados', '3.065 m2', '1651523413_mini_moka_mg_0044.jpg', '1651523412_moka_mg_0044.jpg', 'abril de 2010', 'julio de 2011', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651523413_moka_mg_0043.jpg', 0, 2011),
(38, 'Quarzzo', 'Via La Fe - El Retiro', '', '<p>3 torres, cada una de 4 pisos, 90 suites hoteleras</p>\r\n\r\n<p>90 suites hoteleras</p>\r\n', 'preventa', '12.099 mt2', '1651525670_mini_quarzzo-render-5.jpg', '1651525670_quarzzo-render-5.jpg', '', '', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651524239_alcoba-suite-58-m2-quarzzo---feb-28-2022.jpg', 0, 0),
(39, 'Edificio Monte Rio', 'Suramerica, Itagüi', 'Calle 75 AA Sur 53-50', '<p>Torre de 25 pisos, 126 apartamentos</p>\r\n', 'curso', '18.090 mt2', '1651524560_mini_1521663707_fachada__-junio_02_2017__act..jpg', '1651524560_1521663707_fachada__-junio_02_2017__act..jpg', 'enero de 2021', 'octubre de 2022', '<p>Ingenieria Inmobiliaria SA</p>\r\n\r\n<p>Sociedad Proyecto Moka SAS</p>\r\n', '', '1651524560_monte-rio--preventa.jpg', 0, 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `02_proyecto_galeria`
--

CREATE TABLE `02_proyecto_galeria` (
  `ID_foto` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `foto_grande` varchar(255) DEFAULT NULL,
  `foto_mini` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `02_proyecto_galeria`
--

INSERT INTO `02_proyecto_galeria` (`ID_foto`, `ID_proyecto`, `foto_grande`, `foto_mini`, `caption`, `orden`) VALUES
(13, NULL, '1646861615_gettyimages-752022985-2048x2048.jpg', '1646861616_mini_gettyimages-752022985-2048x2048.jpg', 'teste', 0),
(14, NULL, '1646861616_depositphotos_170669472-stock-photo-sensual-attractive-lady-posing-in--2-.jpg', '1646861616_mini_depositphotos_170669472-stock-photo-sensual-attractive-lady-posing-in--2-.jpg', 'aagdad', 0),
(74, 28, '1651348102_img-4955.jpg', '1651348102_mini_img-4955.jpg', '', 0),
(72, 28, '1651348084_img-4952.jpg', '1651348084_mini_img-4952.jpg', '', 0),
(73, 28, '1651348084_img-4954.jpg', '1651348084_mini_img-4954.jpg', '', 0),
(71, 28, '1651348083_img-4949.jpg', '1651348084_mini_img-4949.jpg', '', 0),
(70, 28, '1651348083_img-4938.jpg', '1651348083_mini_img-4938.jpg', '', 0),
(69, 28, '1651348083_img-4933.jpg', '1651348083_mini_img-4933.jpg', '', 0),
(68, 28, '1651348082_img-4931.jpg', '1651348082_mini_img-4931.jpg', '', 0),
(67, 28, '1651348082_img-4930.jpg', '1651348082_mini_img-4930.jpg', '', 0),
(65, 28, '1651348039_img-4928.jpg', '1651348039_mini_img-4928.jpg', '', 0),
(66, 28, '1651348082_img-4929.jpg', '1651348082_mini_img-4929.jpg', '', 0),
(64, 28, '1651348038_img-4924.jpg', '1651348039_mini_img-4924.jpg', '', 0),
(63, 28, '1651348038_img-4923.jpg', '1651348038_mini_img-4923.jpg', '', 0),
(62, 28, '1651348038_img-4922.jpg', '1651348038_mini_img-4922.jpg', '', 0),
(60, 28, '1651348037_img-4918.jpg', '1651348037_mini_img-4918.jpg', '', 0),
(61, 28, '1651348037_img-4921.jpg', '1651348038_mini_img-4921.jpg', '', 0),
(59, 28, '1651348037_img-4917.jpg', '1651348037_mini_img-4917.jpg', '', 0),
(75, 28, '1651348103_img-4958.jpg', '1651348103_mini_img-4958.jpg', '', 0),
(76, 28, '1651348103_img-4960.jpg', '1651348103_mini_img-4960.jpg', '', 0),
(77, 29, '1651508867_img-0462.jpg', '1651508867_mini_img-0462.jpg', 'Habitación', 0),
(78, 29, '1651508886_img-0464.jpg', '1651508886_mini_img-0464.jpg', '', 0),
(79, 29, '1651508898_img-1931.jpg', '1651508898_mini_img-1931.jpg', '', 0),
(80, 29, '1651508905_img-1937.jpg', '1651508905_mini_img-1937.jpg', '', 0),
(81, 29, '1651508912_img-1940.jpg', '1651508913_mini_img-1940.jpg', '', 0),
(82, 29, '1651508927_img-1941.jpg', '1651508927_mini_img-1941.jpg', '', 0),
(83, 29, '1651508937_img-1942.jpg', '1651508938_mini_img-1942.jpg', '', 0),
(84, 29, '1651353859_photo-2021-01-29-15-37-24-8.jpg', '1651353859_mini_photo-2021-01-29-15-37-24-8.jpg', '', 0),
(85, 29, '1651353859_photo-2021-01-29-16-36-07-2.jpg', '1651353859_mini_photo-2021-01-29-16-36-07-2.jpg', '', 0),
(86, 29, '1651353860_photo-2021-01-29-16-36-07.jpg', '1651353860_mini_photo-2021-01-29-16-36-07.jpg', '', 0),
(87, 29, '1651353860_photo-2021-01-29-16-36-08-3.jpg', '1651353860_mini_photo-2021-01-29-16-36-08-3.jpg', '', 0),
(95, 30, '1651499437_1-img_4234.jpg', '1651499437_mini_1-img_4234.jpg', '', 0),
(90, 30, '1651499353_3-img_868.jpg', '1651499353_mini_3-img_868.jpg', '', 0),
(98, 30, '1651499524_4-img_8690.jpg', '1651499524_mini_4-img_8690.jpg', '', 0),
(92, 30, '1651499353_5-img_4300.jpg', '1651499354_mini_5-img_4300.jpg', '', 5),
(93, 30, '1651499354_6-file3-34.jpg', '1651499354_mini_6-file3-34.jpg', '', 6),
(94, 30, '1651499354_7-file8-8.jpg', '1651499354_mini_7-file8-8.jpg', '', 6),
(97, 30, '1651499477_2-img_8689.jpg', '1651499477_mini_2-img_8689.jpg', '', 1),
(99, 30, '1651499598_8-file1-45.jpg', '1651499598_mini_8-file1-45.jpg', '', 0),
(100, 30, '1651499598_9-file-51.jpg', '1651499598_mini_9-file-51.jpg', '', 0),
(101, 30, '1651499598_10-file3-35.jpg', '1651499599_mini_10-file3-35.jpg', '', 0),
(102, 30, '1651499599_11-file3-36.jpg', '1651499599_mini_11-file3-36.jpg', '', 0),
(103, 30, '1651499599_file1-40.jpg', '1651499599_mini_file1-40.jpg', '', 0),
(104, 30, '1651499599_file2-34.jpg', '1651499599_mini_file2-34.jpg', '', 0),
(105, 30, '1651499600_file3-32.jpg', '1651499600_mini_file3-32.jpg', '', 0),
(106, 30, '1651499600_img_4235.jpg', '1651499600_mini_img_4235.jpg', '', 0),
(107, 30, '1651499600_img_4240.jpg', '1651499600_mini_img_4240.jpg', '', 0),
(108, 31, '1651518239_oclock_20092018-dsc01364.jpg', '1651518239_mini_oclock_20092018-dsc01364.jpg', '', 0),
(109, 31, '1651518239_oclock_20092018-dsc01367.jpg', '1651518239_mini_oclock_20092018-dsc01367.jpg', '', 0),
(110, 31, '1651518239_oclock_20092018-dsc01368.jpg', '1651518240_mini_oclock_20092018-dsc01368.jpg', '', 0),
(111, 31, '1651518240_oclock_20092018-dsc01374.jpg', '1651518240_mini_oclock_20092018-dsc01374.jpg', '', 0),
(112, 31, '1651518240_oclock_20092018-dsc01375.jpg', '1651518240_mini_oclock_20092018-dsc01375.jpg', '', 0),
(113, 31, '1651518240_oclock_20092018-dsc01376.jpg', '1651518240_mini_oclock_20092018-dsc01376.jpg', '', 0),
(114, 31, '1651518240_oclock_20092018-dsc01382.jpg', '1651518241_mini_oclock_20092018-dsc01382.jpg', '', 0),
(115, 31, '1651518241_oclock_20092018-dsc01383.jpg', '1651518241_mini_oclock_20092018-dsc01383.jpg', '', 0),
(116, 31, '1651518241_oclock_20092018-dsc01384.jpg', '1651518241_mini_oclock_20092018-dsc01384.jpg', '', 0),
(117, 31, '1651518241_oclock_20092018-dsc01386.jpg', '1651518241_mini_oclock_20092018-dsc01386.jpg', '', 0),
(118, 31, '1651518241_oclock_20092018-dsc01388.jpg', '1651518241_mini_oclock_20092018-dsc01388.jpg', '', 0),
(119, 31, '1651518241_oclock_foto_45.jpg', '1651518242_mini_oclock_foto_45.jpg', '', 0),
(120, 31, '1651518242_oclock_foto_48.jpg', '1651518242_mini_oclock_foto_48.jpg', '', 0),
(121, 32, '1651518535_20180524_142554.jpg', '1651518535_mini_20180524_142554.jpg', '', 0),
(122, 32, '1651518536_20180524_142632.jpg', '1651518536_mini_20180524_142632.jpg', '', 0),
(123, 32, '1651518536_20180524_143642.jpg', '1651518536_mini_20180524_143642.jpg', '', 0),
(124, 32, '1651518536_avance--1-.jpg', '1651518536_mini_avance--1-.jpg', '', 0),
(137, 32, '1651518567_avance--2-.jpg', '1651518567_mini_avance--2-.jpg', '', 0),
(138, 33, '1651523546_avance-febrero-2019--17-.jpg', '1651523546_mini_avance-febrero-2019--17-.jpg', '', 0),
(127, 32, '1651518536_bosque-verde-img_9334.jpg', '1651518536_mini_bosque-verde-img_9334.jpg', '', 0),
(128, 32, '1651518536_img_20190307_114648.jpg', '1651518537_mini_img_20190307_114648.jpg', '', 0),
(129, 32, '1651518537_img_20190307_114737.jpg', '1651518537_mini_img_20190307_114737.jpg', '', 0),
(130, 32, '1651518537_img_20190307_115349.jpg', '1651518537_mini_img_20190307_115349.jpg', '', 0),
(131, 32, '1651518537_img_20190307_120147.jpg', '1651518537_mini_img_20190307_120147.jpg', '', 0),
(132, 32, '1651518537_img_20190404_105650.jpg', '1651518538_mini_img_20190404_105650.jpg', '', 0),
(133, 32, '1651518538_img_20190404_110653.jpg', '1651518538_mini_img_20190404_110653.jpg', '', 0),
(134, 32, '1651518538_img_20190404_115408.jpg', '1651518538_mini_img_20190404_115408.jpg', '', 0),
(135, 32, '1651518538_img_20190404_120019.jpg', '1651518539_mini_img_20190404_120019.jpg', '', 0),
(136, 32, '1651518539_img_20190516_172253.jpg', '1651518539_mini_img_20190516_172253.jpg', '', 0),
(139, 33, '1651523546_avance-febrero-2019--25-.jpg', '1651523546_mini_avance-febrero-2019--25-.jpg', '', 0),
(140, 33, '1651523546_avance-mayo-2019--29-.jpg', '1651523546_mini_avance-mayo-2019--29-.jpg', '', 0),
(141, 34, '1651523624_20092018-dsc01404.jpg', '1651523624_mini_20092018-dsc01404.jpg', '', 0),
(142, 34, '1651523624_20092018-dsc01407.jpg', '1651523625_mini_20092018-dsc01407.jpg', '', 0),
(143, 34, '1651523625_20092018-dsc01408.jpg', '1651523625_mini_20092018-dsc01408.jpg', '', 0),
(144, 34, '1651523625_20092018-dsc01409.jpg', '1651523625_mini_20092018-dsc01409.jpg', '', 0),
(145, 34, '1651523625_20092018-dsc01411.jpg', '1651523625_mini_20092018-dsc01411.jpg', '', 0),
(146, 34, '1651523625_20092018-dsc01412.jpg', '1651523625_mini_20092018-dsc01412.jpg', '', 0),
(147, 34, '1651523625_20092018-dsc01413.jpg', '1651523625_mini_20092018-dsc01413.jpg', '', 0),
(148, 34, '1651523665_20092018-dsc01414.jpg', '1651523665_mini_20092018-dsc01414.jpg', '', 0),
(149, 34, '1651523665_20092018-dsc01415.jpg', '1651523665_mini_20092018-dsc01415.jpg', '', 0),
(150, 34, '1651523665_20092018-dsc01416.jpg', '1651523665_mini_20092018-dsc01416.jpg', '', 0),
(151, 34, '1651523665_20092018-dsc01418.jpg', '1651523666_mini_20092018-dsc01418.jpg', '', 0),
(152, 34, '1651523666_20092018-dsc01420.jpg', '1651523666_mini_20092018-dsc01420.jpg', '', 0),
(153, 34, '1651523666_20092018-dsc01421.jpg', '1651523666_mini_20092018-dsc01421.jpg', '', 0),
(154, 34, '1651523666_20092018-dsc01423.jpg', '1651523666_mini_20092018-dsc01423.jpg', '', 0),
(155, 34, '1651523666_20092018-dsc01424.jpg', '1651523666_mini_20092018-dsc01424.jpg', '', 0),
(156, 34, '1651523706_20092018-dsc01425.jpg', '1651523706_mini_20092018-dsc01425.jpg', '', 0),
(157, 34, '1651523706_20092018-dsc01426.jpg', '1651523706_mini_20092018-dsc01426.jpg', '', 0),
(158, 34, '1651523706_20092018-dsc01427.jpg', '1651523706_mini_20092018-dsc01427.jpg', '', 0),
(159, 34, '1651523707_20092018-dsc01432.jpg', '1651523707_mini_20092018-dsc01432.jpg', '', 0),
(160, 34, '1651523707_20092018-dsc01433.jpg', '1651523707_mini_20092018-dsc01433.jpg', '', 0),
(161, 34, '1651523707_20092018-dsc01434.jpg', '1651523707_mini_20092018-dsc01434.jpg', '', 0),
(162, 34, '1651523707_fachada.jpg', '1651523707_mini_fachada.jpg', '', 0),
(163, 35, '1651523959_4.-juan-pablo-ii_mg_0052-ejecutado.jpg', '1651523959_mini_4.-juan-pablo-ii_mg_0052-ejecutado.jpg', '', 0),
(164, 35, '1651523959_4.1.-juan-pablo-ii_mg_0054.jpg', '1651523960_mini_4.1.-juan-pablo-ii_mg_0054.jpg', '', 0),
(165, 35, '1651523960_4.2.-juan-pablo-ii_mg_0057.jpg', '1651523960_mini_4.2.-juan-pablo-ii_mg_0057.jpg', '', 0),
(166, 35, '1651523960_4.3.-juan-pablo-ii_mg_0059.jpg', '1651523960_mini_4.3.-juan-pablo-ii_mg_0059.jpg', '', 0),
(167, 35, '1651523960_4.4.-juan-pablo-ii_mg_0060.jpg', '1651523960_mini_4.4.-juan-pablo-ii_mg_0060.jpg', '', 0),
(168, 35, '1651523960_4.5.-juan-pablo-ii_mg_0062.jpg', '1651523960_mini_4.5.-juan-pablo-ii_mg_0062.jpg', '', 0),
(169, 36, '1651524001_opera_mg_0014.jpg', '1651524001_mini_opera_mg_0014.jpg', '', 0),
(170, 36, '1651524001_opera_mg_0026.jpg', '1651524001_mini_opera_mg_0026.jpg', '', 0),
(171, 36, '1651524001_opera_mg_0031.jpg', '1651524001_mini_opera_mg_0031.jpg', '', 0),
(172, 36, '1651524001_opera_mg_0033.jpg', '1651524001_mini_opera_mg_0033.jpg', '', 0),
(173, 36, '1651524002_opera_mg_0034.jpg', '1651524002_mini_opera_mg_0034.jpg', '', 0),
(174, 37, '1651524046_moka_mg_0040ej.jpg', '1651524046_mini_moka_mg_0040ej.jpg', '', 0),
(175, 37, '1651524047_moka_mg_0043.jpg', '1651524047_mini_moka_mg_0043.jpg', '', 0),
(176, 37, '1651524047_moka_mg_0044.jpg', '1651524047_mini_moka_mg_0044.jpg', '', 0),
(177, 38, '1651524319_alcoba-suite-58-m2-quarzzo---feb-28-2022.jpg', '1651524319_mini_alcoba-suite-58-m2-quarzzo---feb-28-2022.jpg', '', 0),
(178, 38, '1651524319_planta-urbana-quarzzo.jpg', '1651524319_mini_planta-urbana-quarzzo.jpg', '', 10),
(179, 38, '1651524319_quarzzo-render-5.jpg', '1651524319_mini_quarzzo-render-5.jpg', '', 3),
(180, 38, '1651524319_quarzzo-render-24.jpg', '1651524319_mini_quarzzo-render-24.jpg', '', 0),
(181, 38, '1651524320_quarzzo-salon-social--render-26.jpg', '1651524320_mini_quarzzo-salon-social--render-26.jpg', '', 0),
(182, 38, '1651524320_quarzzo.jpg', '1651524320_mini_quarzzo.jpg', '', 11),
(183, 38, '1651524320_suite-quarzzo-58-m2---marzo-2022.jpg', '1651524320_mini_suite-quarzzo-58-m2---marzo-2022.jpg', '', 9),
(184, 38, '1651524320_suite-quarzzo-80-m2---marzo-2022.jpg', '1651524320_mini_suite-quarzzo-80-m2---marzo-2022.jpg', '', 9),
(185, 38, '1651524320_suite-quarzzo-98-m2---marzo-2022.jpg', '1651524320_mini_suite-quarzzo-98-m2---marzo-2022.jpg', '', 9),
(186, 38, '1651524321_zona-gastronomica-parrilla--salon-social-recreativo-render-33.jpg', '1651524321_mini_zona-gastronomica-parrilla--salon-social-recreativo-render-33.jpg', '', 0),
(187, 38, '1651524321_zona-gastronomica-salon-social-recreativo-render-34.jpg', '1651524321_mini_zona-gastronomica-salon-social-recreativo-render-34.jpg', '', 0),
(188, 38, '1651524321_zona-social-suite-58-m2-quarzzo---feb-28-2022.jpg', '1651524321_mini_zona-social-suite-58-m2-quarzzo---feb-28-2022.jpg', '', 0),
(189, 38, '1651524321_zona-social-suite-98-m2-quarzzo---feb-28-2022.jpg', '1651524321_mini_zona-social-suite-98-m2-quarzzo---feb-28-2022.jpg', '', 0),
(190, 39, '1651524688__rio3691.jpg', '1651524688_mini__rio3691.jpg', '', 0),
(191, 39, '1651524688__rio3716.jpg', '1651524688_mini__rio3716.jpg', '', 0),
(192, 39, '1651524688__rio3726.jpg', '1651524688_mini__rio3726.jpg', '', 0),
(193, 39, '1651524688__rio3736.jpg', '1651524688_mini__rio3736.jpg', '', 0),
(194, 39, '1651524689__rio3756.jpg', '1651524689_mini__rio3756.jpg', '', 0),
(195, 39, '1651524689__rio3766.jpg', '1651524689_mini__rio3766.jpg', '', 0),
(196, 39, '1651524689__rio3801.jpg', '1651524689_mini__rio3801.jpg', '', 0),
(197, 39, '1651524689__rio3941.jpg', '1651524689_mini__rio3941.jpg', '', 0),
(198, 39, '1651524689__rio3971.jpg', '1651524689_mini__rio3971.jpg', '', 0),
(199, 39, '1651524689__rio3981.jpg', '1651524689_mini__rio3981.jpg', '', 0),
(200, 39, '1651524689_1521663707_fachada__-junio_02_2017__act..jpg', '1651524690_mini_1521663707_fachada__-junio_02_2017__act..jpg', '', 0),
(201, 39, '1651524690_monte-rio-fachada-acceso.jpg', '1651524690_mini_monte-rio-fachada-acceso.jpg', '', 0),
(202, 39, '1651524690_monte-rio-lobby-2.jpg', '1651524690_mini_monte-rio-lobby-2.jpg', '', 0),
(204, 39, '1651524743_monte-rio--preventa.jpg', '1651524743_mini_monte-rio--preventa.jpg', '', 11),
(207, 39, '1651524775_monte-rio-sede-bbq-3.jpg', '1651524775_mini_monte-rio-sede-bbq-3.jpg', '', 0),
(208, 39, '1651524775_monte-rio-sede-jacuzzi.jpg', '1651524775_mini_monte-rio-sede-jacuzzi.jpg', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `09_banners`
--

CREATE TABLE `09_banners` (
  `ID_banner` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `link` text NOT NULL,
  `orden` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `target` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `09_banners`
--

INSERT INTO `09_banners` (`ID_banner`, `banner`, `nombre`, `descripcion`, `link`, `orden`, `activo`, `target`) VALUES
(13, '1651352534_banner_1.jpg', 'Landmark Hotel', 'Manila, Medellín, Colombia', 'https://www.emoticaweb.com/', 0, 1, '_self'),
(14, '1651530109_oclock_foto_45.jpg', 'Edificio O’clock', 'Zúñiga, Envigado', 'proyecto/31', 2, 1, '_self'),
(15, '1651530277_7-file8-8.jpg', 'Factory Lofts', 'Barrio Laureles, Medellín', 'proyecto/30', 3, 1, '_self');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `00_admin`
--
ALTER TABLE `00_admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indices de la tabla `01_proyectos`
--
ALTER TABLE `01_proyectos`
  ADD PRIMARY KEY (`ID_proyecto`);

--
-- Indices de la tabla `02_proyecto_galeria`
--
ALTER TABLE `02_proyecto_galeria`
  ADD PRIMARY KEY (`ID_foto`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `09_banners`
--
ALTER TABLE `09_banners`
  ADD PRIMARY KEY (`ID_banner`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `00_admin`
--
ALTER TABLE `00_admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `01_proyectos`
--
ALTER TABLE `01_proyectos`
  MODIFY `ID_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `02_proyecto_galeria`
--
ALTER TABLE `02_proyecto_galeria`
  MODIFY `ID_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `09_banners`
--
ALTER TABLE `09_banners`
  MODIFY `ID_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
