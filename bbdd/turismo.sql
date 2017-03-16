-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2017 a las 18:53:40
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
  `resuelta` tinyint(1) NOT NULL
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `USUARIO`, `PASS`) VALUES
(7, 'admin', '$6$rounds=5000$usesomesillystri$CxCU5QvU0p1SaHRtRF19k069bVIno31x7tGvjWy7aAx2CTGqwzjLl.EG4BJiylHSQMVE5oTkyhDwIBPjdBhVP0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_municipio`
--

CREATE TABLE `materiales_municipio` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_otras_islas`
--

CREATE TABLE `materiales_otras_islas` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_otros_municipios`
--

CREATE TABLE `materiales_otros_municipios` (
  `grupo` int(11) NOT NULL,
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_alojamiento`
--

CREATE TABLE `perfil_alojamiento` (
  `grupo` int(11) NOT NULL,
  `conocer` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `repite` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `alojamiento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `motivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tiempo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_municipio`
--

CREATE TABLE `stock_municipio` (
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `stock_municipio`
--

INSERT INTO `stock_municipio` (`material`, `cantidad`) VALUES
('callejero', 100),
('folleto_eventos_municipales', 100),
('folleto_ocio', 100),
('guias_turisticas', 100),
('mapa_senderos', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_otras_islas`
--

CREATE TABLE `stock_otras_islas` (
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

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
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `stock_otros_municipios`
--

INSERT INTO `stock_otros_municipios` (`material`, `cantidad`) VALUES
('callejero', 100),
('folleto_ocio', 100),
('otros', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_promocional`
--

CREATE TABLE `stock_promocional` (
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `stock_promocional`
--

INSERT INTO `stock_promocional` (`material`, `cantidad`) VALUES
('folleto_bus', 100),
('otros_promocional', 100),
('periodico_revista', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_turismo_tenerife`
--

CREATE TABLE `stock_turismo_tenerife` (
  `material` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `stock_turismo_tenerife`
--

INSERT INTO `stock_turismo_tenerife` (`material`, `cantidad`) VALUES
('gastronomia_tenerife', 100),
('guia_de_tenerife', 100),
('mapa_block_sur', 100),
('mapa_tenerife', 100),
('tenerife_cetaceos', 100),
('tenerife_coche', 100),
('tenerife_familia', 100),
('tenerife_natural_rural', 100),
('tenerife_pie', 100),
('tradiciones_tenerife', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `consulta` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nacionalidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `residencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci ROW_FORMAT=COMPACT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
