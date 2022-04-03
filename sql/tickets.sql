-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2022 a las 22:05:15
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asunto`
--

CREATE TABLE `asunto` (
  `ID_ASUNTO` int(11) NOT NULL,
  `ASUNTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asunto`
--

INSERT INTO `asunto` (`ID_ASUNTO`, `ASUNTO`) VALUES
(1, 'Distancia'),
(2, 'Registro'),
(3, 'Baja'),
(4, 'Cambio de institución'),
(5, 'Asunto adicional 4 the win');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `ID_MUNICIPIO` int(11) NOT NULL,
  `MUNICIPIO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`ID_MUNICIPIO`, `MUNICIPIO`) VALUES
(1, 'Abasolo'),
(2, 'Acuña'),
(3, 'Allende'),
(4, 'Arteaga'),
(5, 'Candela'),
(6, 'Castaños'),
(7, 'Cuatro Ciénegas'),
(8, 'Escobedo'),
(9, 'Francisco I. Madero'),
(10, 'Frontera'),
(11, 'General Cepeda'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jiménez'),
(15, 'Juárez'),
(16, 'Lamadrid'),
(17, 'Matamoros'),
(18, 'Monclova'),
(19, 'Morelos'),
(20, 'Múzquiz'),
(21, 'Nadadores'),
(22, 'Nava'),
(23, 'Ocampo'),
(24, 'Parras'),
(25, 'Piedras Negras'),
(26, 'Progreso'),
(27, 'Ramos Arizpe'),
(28, 'Sabinas'),
(29, 'Sacramento'),
(30, 'Saltillo'),
(31, 'San Buenaventura'),
(32, 'San Juan de Sabinas'),
(33, 'San Pedro'),
(34, 'Sierra Mojada'),
(35, 'Torreón'),
(36, 'Viesca'),
(37, 'Villa Unión'),
(38, 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_turno`
--

CREATE TABLE `ticket_turno` (
  `ID_TICKET` int(11) NOT NULL,
  `TRAMITANTE` varchar(150) NOT NULL,
  `CURP` varchar(18) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `PATERNO` varchar(100) NOT NULL,
  `MATERNO` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(11) NOT NULL,
  `CELULAR` varchar(11) NOT NULL,
  `CORREO` varchar(255) NOT NULL,
  `EDAD` int(3) NOT NULL,
  `ID_MUNICIPIO` int(11) NOT NULL,
  `ID_ASUNTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticket_turno`
--

INSERT INTO `ticket_turno` (`ID_TICKET`, `TRAMITANTE`, `CURP`, `NOMBRE`, `PATERNO`, `MATERNO`, `TELEFONO`, `CELULAR`, `CORREO`, `EDAD`, `ID_MUNICIPIO`, `ID_ASUNTO`) VALUES
(5, 'JUANITO', 'GOKD981006HCLLWV07', 'David Hiroshi', 'Gloria', 'Kawasaki', '8446003784', '8446003784', 'sephiMH@gmail.com', 23, 1, 1),
(6, 'benito', 'GOKD981006HCLLWV07', 'David Hiroshi', 'Gloria', 'Kawasaki', '8446003784', '8446003784', 'sephiMH@gmail.com', 23, 1, 1),
(7, 'benito', 'GOKD981006HCLLWV07', 'David Hiroshi', 'Gloria', 'Kawasaki', '8446003784', '8446003784', 'sephiMH@gmail.com', 23, 1, 1),
(9, 'benito', 'GOKD981006HCLLWV07', 'David Hiroshi', 'Gloria', 'Kawasaki', '8446003784', '8446003784', 'sephiMH@gmail.com', 23, 1, 1),
(10, 'benito', 'GOKD981006HCLLWV07', 'David Hiroshi', 'Gloria', 'Kawasaki', '8446003784', '8446003784', 'sephiMH@gmail.com', 23, 1, 1),
(11, 'JOHNCITO', 'GOKD991112HCLLWV11', 'JUAN', 'NAVAJAS', 'MACHETE', '8446003784', '1234123412', 'JNAVAJAS@GMAIL.COM', 12, 1, 1),
(12, 'JOHNCITO', 'GOKD991112HCLLWV11', 'JUAN', 'NAVAJAS', 'MACHETE', '8446003784', '1234123412', 'JNAVAJAS@GMAIL.COM', 12, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asunto`
--
ALTER TABLE `asunto`
  ADD PRIMARY KEY (`ID_ASUNTO`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`ID_MUNICIPIO`);

--
-- Indices de la tabla `ticket_turno`
--
ALTER TABLE `ticket_turno`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `fk_asunto_ticket` (`ID_ASUNTO`),
  ADD KEY `fk_municipio_ticket` (`ID_MUNICIPIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asunto`
--
ALTER TABLE `asunto`
  MODIFY `ID_ASUNTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `ID_MUNICIPIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `ticket_turno`
--
ALTER TABLE `ticket_turno`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket_turno`
--
ALTER TABLE `ticket_turno`
  ADD CONSTRAINT `fk_asunto_ticket` FOREIGN KEY (`ID_ASUNTO`) REFERENCES `asunto` (`ID_ASUNTO`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_municipio_ticket` FOREIGN KEY (`ID_MUNICIPIO`) REFERENCES `municipios` (`ID_MUNICIPIO`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios(
	ID INT AUTO_INCREMENT PRIMARY KEY,
    USER VARCHAR(100) NOT NULL,
    PASS VARCHAR(255) NOT NULL,
    is_admin INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;