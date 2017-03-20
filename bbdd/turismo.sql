-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2017 a las 15:05:10
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `resuelta` tinyint(1) NOT NULL,
  `resolucion` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_guia`
--

CREATE TABLE `informacion_guia` (
  `grupo` int(11) NOT NULL,
  `recursos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alojamiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `transporte` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ocio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `eventos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `servicios_publicos` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_tenerife`
--

CREATE TABLE `informacion_tenerife` (
  `grupo` int(11) NOT NULL,
  `info` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PASS` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `USUARIO`, `PASS`) VALUES
(1, 'admin', '$6$rounds=5000$usesomesillystri$CxCU5QvU0p1SaHRtRF19k069bVIno31x7tGvjWy7aAx2CTGqwzjLl.EG4BJiylHSQMVE5oTkyhDwIBPjdBhVP0'),
(9, 'Mary', '$6$rounds=5000$usesomesillystri$uqAnZ7Rf2wzpQWfxowVepbULFaVnuqTpnpOmz5dOEoIvygbbBOgo5uAc4lWNyJfi2b9m2c6qbZmRRv3YeEqwy1'),
(7, 'Ana', '$6$rounds=5000$usesomesillystri$PspS9mYjMNZeMvnfDMzIN6s/EgKDTCZoO1ztguN9PqKDP2G.yLY6HF9KWcY6wKZHLyApWfedCJNRx2ECrZyFO/'),
(8, 'Irma', '$6$rounds=5000$usesomesillystri$Rxh39fKjiVX9r3kCFNDIBZSuTxW0S35oEOwJ.ky.GvT8ySKqcCDust11o.gEeksASE/xGMPWPMXfKfEEz0I0r0'),
(10, 'Silvia', '$6$rounds=5000$usesomesillystri$RJRGCzD9z8e1ixDbkntuN9kbS3FnjNcO2EPwfO5brSqbnHs33625oIYem2yWtYheEgnHAoi.Om0ZgLTNKILHM1'),
(11, 'Concejal', '$6$rounds=5000$usesomesillystri$5x9JJYwDRafdTNiSpMsIN5HG8JOqhbf8W84KeVAF9E0suGPkg34Dv9J2KeJfjXCLhyuoxE5/Ff941x/MNQsoq/'),
(14, 'Invitado', '$6$rounds=5000$usesomesillystri$2FJ.4rKsXT5myesOAoJRVk8NX/T7eKjY0dNGyo5G/8o4mJ3tlo6xW1Tkthk/z2P8lbUPg/7BTrduIuG/Ck7YJ1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_municipio`
--

CREATE TABLE `materiales_municipio` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_otras_islas`
--

CREATE TABLE `materiales_otras_islas` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_otros_municipios`
--

CREATE TABLE `materiales_otros_municipios` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_promocional`
--

CREATE TABLE `material_promocional` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_turismo_tenerife`
--

CREATE TABLE `material_turismo_tenerife` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_alojamiento`
--

CREATE TABLE `perfil_alojamiento` (
  `grupo` int(11) NOT NULL,
  `conocer` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `repite` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alojamiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `motivo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_municipio`
--

CREATE TABLE `stock_municipio` (
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_municipio`
--

INSERT INTO `stock_municipio` (`material`, `cantidad`) VALUES
('callejero', 1),
('folleto_eventos_municipales', 100),
('folleto_ocio', 100),
('guias_turisticas', 100),
('mapa_senderos', 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_otras_islas`
--

CREATE TABLE `stock_otras_islas` (
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_otras_islas`
--

INSERT INTO `stock_otras_islas` (`material`, `cantidad`) VALUES
('mapas', 100),
('otros', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_otros_municipios`
--

CREATE TABLE `stock_otros_municipios` (
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_otros_municipios`
--

INSERT INTO `stock_otros_municipios` (`material`, `cantidad`) VALUES
('callejero', 96),
('folleto_ocio', 95),
('otros', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_promocional`
--

CREATE TABLE `stock_promocional` (
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_promocional`
--

INSERT INTO `stock_promocional` (`material`, `cantidad`) VALUES
('folleto_bus', 95),
('otros_promocional', 97),
('periodico_revista', 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_turismo_tenerife`
--

CREATE TABLE `stock_turismo_tenerife` (
  `material` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_turismo_tenerife`
--

INSERT INTO `stock_turismo_tenerife` (`material`, `cantidad`) VALUES
('gastronomia_tenerife', 100),
('guia_de_tenerife', 100),
('mapa_block_sur', 100),
('mapa_tenerife', 100),
('tenerife_cetaceos', 93),
('tenerife_coche', 96),
('tenerife_familia', 100),
('tenerife_natural_rural', 97),
('tenerife_pie', 97),
('tradiciones_tenerife', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `consulta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `residencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`,`USUARIO`);

--
-- Indices de la tabla `stock_municipio`
--
ALTER TABLE `stock_municipio`
  ADD PRIMARY KEY (`material`);

--
-- Indices de la tabla `stock_otras_islas`
--
ALTER TABLE `stock_otras_islas`
  ADD PRIMARY KEY (`material`);

--
-- Indices de la tabla `stock_otros_municipios`
--
ALTER TABLE `stock_otros_municipios`
  ADD PRIMARY KEY (`material`);

--
-- Indices de la tabla `stock_promocional`
--
ALTER TABLE `stock_promocional`
  ADD PRIMARY KEY (`material`);

--
-- Indices de la tabla `stock_turismo_tenerife`
--
ALTER TABLE `stock_turismo_tenerife`
  ADD PRIMARY KEY (`material`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
