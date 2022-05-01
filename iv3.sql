-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2022 a las 15:39:36
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
-- Base de datos: `iv3`
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
(1, 'admin', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `01_proyectos`
--

CREATE TABLE `01_proyectos` (
  `ID_proyecto` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `direccion` text NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `area_interna` varchar(255) DEFAULT NULL,
  `area_balcon` varchar(255) DEFAULT NULL,
  `banos` varchar(255) DEFAULT NULL,
  `duchas` varchar(255) DEFAULT NULL,
  `alcobas` varchar(255) DEFAULT NULL,
  `presentacion_htm` longtext DEFAULT NULL,
  `ubicacion_htm` longtext DEFAULT NULL,
  `urbanismo_htm` longtext DEFAULT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `especificaciones` varchar(255) DEFAULT NULL,
  `waze` varchar(255) DEFAULT NULL,
  `googlemaps` varchar(255) DEFAULT NULL,
  `mini` text NOT NULL,
  `grande` text NOT NULL,
  `foto_presentacion` text NOT NULL,
  `foto_ubicacion` text NOT NULL,
  `contacto_foto` varchar(255) NOT NULL,
  `contacto_msg` text NOT NULL,
  `contacto_wap` int(255) NOT NULL,
  `contacto_tel` varchar(500) NOT NULL,
  `contacto_ventas` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `02_proyecto_galeria`
--

CREATE TABLE `02_proyecto_galeria` (
  `ID_foto` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `foto_grande` varchar(255) DEFAULT NULL,
  `foto_mini` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `02_proyecto_galeria`
--

INSERT INTO `02_proyecto_galeria` (`ID_foto`, `ID_proyecto`, `foto_grande`, `foto_mini`, `caption`) VALUES
(13, NULL, '1646861615_gettyimages-752022985-2048x2048.jpg', '1646861616_mini_gettyimages-752022985-2048x2048.jpg', 'teste'),
(14, NULL, '1646861616_depositphotos_170669472-stock-photo-sensual-attractive-lady-posing-in--2-.jpg', '1646861616_mini_depositphotos_170669472-stock-photo-sensual-attractive-lady-posing-in--2-.jpg', 'aagdad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `03_proyecto_videos`
--

CREATE TABLE `03_proyecto_videos` (
  `ID_video` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `04_proyecto_planos`
--

CREATE TABLE `04_proyecto_planos` (
  `ID_planta` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `balcon` varchar(255) NOT NULL,
  `privada` varchar(255) NOT NULL,
  `alcobas` int(11) NOT NULL,
  `banos` int(11) NOT NULL,
  `duchas` int(11) NOT NULL,
  `grande_planta` varchar(255) NOT NULL,
  `mini_planta` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `05_proyecto_recorridos`
--

CREATE TABLE `05_proyecto_recorridos` (
  `ID_recorrido` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `recorrido_link` text DEFAULT NULL,
  `recorrido_nombre` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `06_proyecto_avances`
--

CREATE TABLE `06_proyecto_avances` (
  `ID_avance` int(11) NOT NULL,
  `ID_proyecto` int(11) DEFAULT NULL,
  `grande` varchar(255) DEFAULT NULL,
  `mini` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `07_trayectoria`
--

CREATE TABLE `07_trayectoria` (
  `ID_trayectoria` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) NOT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `mini` varchar(255) DEFAULT NULL,
  `grande` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `08_trayectoria_fotos`
--

CREATE TABLE `08_trayectoria_fotos` (
  `ID_foto` int(11) NOT NULL,
  `ID_trayectoria` varchar(255) DEFAULT NULL,
  `mini` varchar(255) DEFAULT NULL,
  `grande` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `08_trayectoria_fotos`
--

INSERT INTO `08_trayectoria_fotos` (`ID_foto`, `ID_trayectoria`, `mini`, `grande`, `caption`) VALUES
(3, '3', '1646862757_mini_jesus-christ-smile-150x150.jpg', '1646862757_jesus-christ-smile-150x150.jpg', 'test'),
(4, '3', '1646862757_mini_image-of-jesus-smiling-300x225.jpg', '1646862757_image-of-jesus-smiling-300x225.jpg', 'dsgdsg');

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
-- Indices de la tabla `03_proyecto_videos`
--
ALTER TABLE `03_proyecto_videos`
  ADD PRIMARY KEY (`ID_video`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `04_proyecto_planos`
--
ALTER TABLE `04_proyecto_planos`
  ADD PRIMARY KEY (`ID_planta`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `05_proyecto_recorridos`
--
ALTER TABLE `05_proyecto_recorridos`
  ADD PRIMARY KEY (`ID_recorrido`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `06_proyecto_avances`
--
ALTER TABLE `06_proyecto_avances`
  ADD PRIMARY KEY (`ID_avance`),
  ADD KEY `ID_proyecto` (`ID_proyecto`);

--
-- Indices de la tabla `07_trayectoria`
--
ALTER TABLE `07_trayectoria`
  ADD PRIMARY KEY (`ID_trayectoria`);

--
-- Indices de la tabla `08_trayectoria_fotos`
--
ALTER TABLE `08_trayectoria_fotos`
  ADD PRIMARY KEY (`ID_foto`),
  ADD KEY `ID_proyecto` (`ID_trayectoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `00_admin`
--
ALTER TABLE `00_admin`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `01_proyectos`
--
ALTER TABLE `01_proyectos`
  MODIFY `ID_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `02_proyecto_galeria`
--
ALTER TABLE `02_proyecto_galeria`
  MODIFY `ID_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `03_proyecto_videos`
--
ALTER TABLE `03_proyecto_videos`
  MODIFY `ID_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `04_proyecto_planos`
--
ALTER TABLE `04_proyecto_planos`
  MODIFY `ID_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `05_proyecto_recorridos`
--
ALTER TABLE `05_proyecto_recorridos`
  MODIFY `ID_recorrido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `06_proyecto_avances`
--
ALTER TABLE `06_proyecto_avances`
  MODIFY `ID_avance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `07_trayectoria`
--
ALTER TABLE `07_trayectoria`
  MODIFY `ID_trayectoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `08_trayectoria_fotos`
--
ALTER TABLE `08_trayectoria_fotos`
  MODIFY `ID_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
