-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2016 a las 03:38:13
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicalsocial_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `dui` varchar(10) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`dui`, `nombre`, `apellido`, `nickname`, `password`, `nivel`) VALUES
('051678092', 'Dimas', 'GarcÃ­a', 'richard', '1c7a92ae351d4e21ebdfb897508f59d6', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `fecha` date NOT NULL,
  `hora` varchar(11) NOT NULL,
  `paciente_dui` varchar(11) NOT NULL,
  `doctor_id` varchar(11) NOT NULL,
  `id_consultorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `id` int(11) NOT NULL,
  `planta` int(11) NOT NULL,
  `numero_local` varchar(11) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`id`, `planta`, `numero_local`, `direccion`, `telefono`) VALUES
(1, 8, '2B', 'Barrio San Antonio, Conchagua.', '26885516'),
(2, 8, '56', 'Barrio El Calvario, San Miguel.', '24545785'),
(3, 3, '2B', 'Barrio San Antonio, Conchagua.', '65135465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `registro` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `apellido`, `nit`, `direccion`, `telefono`, `especialidad`, `registro`, `email`, `password`, `nivel`) VALUES
(2, 'Dimas', 'Rovira', '65135132323213', 'Conchagua', '98468468', 'Veterinario', 'vasda5', 'ricardoooo', '1c7a92ae351d4e21ebdfb897508f59d6', 'doctor'),
(3, 'Keiry', 'HernÃ¡ndez', '34829349204244', 'Conchagua', '25425132', 'Obstetra', 'Voaisdaisjda', 'kh@hotmail.com', '1c7a92ae351d4e21ebdfb897508f59d6', 'doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `dui` varchar(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `nit` varchar(14) NOT NULL,
  `direccion` varchar(1000) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`dui`, `nombre`, `apellido`, `nit`, `direccion`, `telefono`, `email`, `nickname`, `password`, `genero`, `estado_civil`, `nivel`) VALUES
('651651651', 'Kiara', 'Rovira', '65135132323213', 'Conchagua', '32135135', 'kiararvira@als.com', 'lisbeth', '1c7a92ae351d4e21ebdfb897508f59d6', 'Femenino', 'soltera', 'paciente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`dui`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD KEY `paciente_dui` (`paciente_dui`),
  ADD KEY `id_consultorio` (`id_consultorio`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`dui`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`paciente_dui`) REFERENCES `pacientes` (`dui`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorio` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
