-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2016 a las 17:11:34
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `servycom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `clave` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dni`, `nombre`, `clave`) VALUES
('36148368', 'MARA BUSNARDO', 'mb8368'),
('34440239', 'JEREMIAS OLIVA', 'jo0239'),
('37851547', 'SAMUEL OLIVA', 'so1547'),
('37475315', 'MARA MAIDANA', 'mm5315'),
('33414623', 'EZEQUIEL OLIVA', 'eo4623');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `latitud` varchar(15) NOT NULL,
  `longitud` varchar(15) NOT NULL,
  `cellid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`dni`, `nombre`, `fecha`, `latitud`, `longitud`, `cellid`) VALUES
('33414623', '', '5/12/2016 - 11:26', '-31.4600398', '-64.13397259999', 'servycom'),
('33414623', '', '5/12/2016 - 11:26', '-31.4600398', '-64.13397259999', 'servycom'),
('33414623', '33414623', '5/12/2016 - 11:26', '-31.4600398', '-64.13397259999', 'servycom'),
('33414623', 'EZEQUIEL OLIVA', '5/12/2016 - 11:35', '-31.4600789', '-64.1340325', 'Eser01'),
('31086455', 'LAGOS RICARDO A', '6/12/2016 - 12:19', '-31.46010390000', '-64.1340298', 'E rn127'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 12:24', '-31.4601038', '-64.13401979999', 'E co009'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 12:24', '-31.4601038', '-64.13401979999', 'E co009'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 12:24', '-31.4601038', '-64.13401979999', 'E co009'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 12:30', '-31.460105', '-64.1340333', 'e er345'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 12:30', '-31.460105', '-64.1340333', 'e er345'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 15:11', '-31.460088', '-64.1340278', 'eco004sd'),
('33414623', 'EZEQUIEL OLIVA', '6/12/2016 - 23:1', '-31.35836729999', '-64.1899565', 'ee123'),
('33414623', 'EZEQUIEL OLIVA', '8/12/2016 - 17:5', '-31.3583659', '-64.18995319999', 'E CO084D'),
('', 'CALDERON FRANCO', '20/12/2016 - 11:59', '-31.4395538', '-64.1764658', ''),
('34797053', 'CALDERON FRANCO', '20/12/2016 - 12:10', '-31.43955539999', '-64.1764876', 'eco002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`) VALUES
('34797053', 'CALDERON FRANCO DARIAN '),
('33695934', 'CORTEZ JUAN MANUEL '),
('34468602', 'PIRONA RODRIGUEZ GONZALO '),
('33133269', 'FATTORI GASTON OSCAR '),
('34064407', 'NIRLSEN NATANAEL '),
('35965425', 'VEGA FABIAN EDUARDO'),
('31086455', 'LAGOS RICARDO ALEXIS '),
('33414623', 'EZEQUIEL OLIVA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
