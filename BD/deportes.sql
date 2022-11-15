-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 00:08:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre_equipo`) VALUES
(6, 'Real-madrid'),
(7, 'MANCHESTER-UNITED'),
(8, 'PSG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_futbol`
--

CREATE TABLE `jugadores_futbol` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(90) NOT NULL,
  `posicion` varchar(90) NOT NULL,
  `nacionalidad` varchar(90) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores_futbol`
--

INSERT INTO `jugadores_futbol` (`ID`, `nombre`, `posicion`, `nacionalidad`, `id_equipo`) VALUES
(1, 'TOMAS', 'd', 'ARG', 6),
(2, 'NEYMAR', 'ST', 'BRAZIL', 8),
(50, 'pepe', 'dc', 'brazilffff', 6),
(51, 'poett', 'DC', 'ARG', 8),
(53, 'juan', 'dc', 'brazil', 6),
(54, 'FAS', 'ma123cno', 'ar809g', 6),
(55, 'FAS', 'ma123cno', 'ar809g', 6),
(57, 'FAS', 'ma123cno', 'ar809g', 7),
(58, 'FAS', 'ma123cno', 'ar809g', 6),
(59, 'arg', 'ma123cno', 'ar809g', 7),
(60, 'MESSI', 'DC', 'ARG', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `email`, `password`) VALUES
(2, 'tpe1@gmail.com', '$2y$10$wGddz7Q4w7Fc3JJtjMJmIOIgSHgbzpVNRZhaEJmZ6vAHyYCHfZAim'),
(3, 'tomascabarcos2@gmail.com', '$2y$10$JWIZQwj7WFubdQq6pXrmJ.3ZQUp/zg2WQWfb8yjGd6C83xfSvoJNu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `jugadores_futbol`
--
ALTER TABLE `jugadores_futbol`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `jugadores_futbol`
--
ALTER TABLE `jugadores_futbol`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores_futbol`
--
ALTER TABLE `jugadores_futbol`
  ADD CONSTRAINT `jugadores_futbol_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
