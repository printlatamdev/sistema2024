-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-07-2020 a las 13:46:35
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nica20`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinta_tipo`
--

CREATE TABLE `tinta_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `medida` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tinta_tipo`
--

INSERT INTO `tinta_tipo` (`id`, `tipo`, `medida`, `codigo`, `estado`) VALUES
(1, 'MIMAKI JV33', '1 Litro', NULL, 1),
(2, 'FLORA SOLVENTE', '1 Litro', NULL, 1),
(3, 'FLORA LED', '1 Litro', NULL, 1),
(4, 'UV', '1 Litro', NULL, 1),
(5, 'XENON UV', '1 LITRO', NULL, 1),
(6, 'ECO SOLVENTE HS', '1 Litro', NULL, 1),
(7, 'NUTEC', '2 litro', NULL, 1),
(8, 'NUTEC1', '1 Litro', NULL, 1),
(9, 'NUTEC3 ', '3 litro', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tinta_tipo`
--
ALTER TABLE `tinta_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tinta_tipo`
--
ALTER TABLE `tinta_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
