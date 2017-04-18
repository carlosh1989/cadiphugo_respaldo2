-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-03-2017 a las 15:50:14
-- Versión del servidor: 5.5.49-0+deb8u1
-- Versión de PHP: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CADIP2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claps`
--

CREATE TABLE IF NOT EXISTS `claps` (
`id` int(255) NOT NULL,
  `estado_id` int(255) NOT NULL,
  `municipio_id` int(255) NOT NULL,
  `parroquia_id` int(255) NOT NULL,
  `clap_codigo` varchar(50) NOT NULL,
  `clap_nombre` varchar(200) NOT NULL,
  `comunidad` varchar(100) NOT NULL,
  `cargo_id` int(255) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nombre_apellido` varchar(100) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `registrado` varchar(100) NOT NULL,
  `ubicado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `claps`
--
ALTER TABLE `claps`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `claps`
--
ALTER TABLE `claps`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
