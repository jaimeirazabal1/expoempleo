-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2016 a las 03:25:49
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `expoempleo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id`, `url`, `usuarios_id`, `creado`, `nombre`) VALUES
(6, '/files/uploads/archivos/2016_05_06_15_08_59_Transferencias_pedidos.zip', 1, '2016-05-06 19:08:59', 'transferencia pedidos'),
(12, '/files/uploads/archivos/2016_05_06_15_34_38_patitas.xlsx', 3, '2016-05-06 19:34:38', 'patitas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `rol` enum('A','U') NOT NULL,
  `terminos` tinyint(1) DEFAULT NULL,
  `fecha_terminos` timestamp NULL DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `username`, `rol`, `terminos`, `fecha_terminos`, `ip`) VALUES
(1, '7d3ff5e583a1727c07bd911d427b514b', 'tayme', 'A', NULL, NULL, NULL),
(2, 'fa83478f3b0ddee54e978e5e4b52e00b', 'luisgarza', 'A', NULL, NULL, NULL),
(3, 'c6cc8094c2dc07b700ffcc36d64e2138', 'pedro', 'U', 1, '2016-05-10 01:54:52', '::1'),
(4, '9810ac9357107848fdc86b7232c7eec1', 'adalloya', 'A', NULL, NULL, NULL),
(5, '1ae9bd679a2e94a9f90f42bc8c30266d', 'manpower', 'U', NULL, NULL, NULL),
(6, '55338ab60c85cc292010fe8270c8e76e', 'adelao', 'U', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
