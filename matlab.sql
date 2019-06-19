-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2019 at 04:43 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

CREATE TABLE `consultas` (
  `idConsulta` int(6) NOT NULL,
  `idProyecto` int(6) NOT NULL,
  `lat1` varchar(6) NOT NULL,
  `lat2` varchar(6) NOT NULL,
  `lon1` varchar(6) NOT NULL,
  `lon2` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(5) NOT NULL,
  `idUsuarios` int(5) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `PATH` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `idUsuarios`, `nombre`, `descripcion`, `PATH`) VALUES
(18, 1, 'xxx', '      1', 'proyectos/admin/xxx'),
(17, 1, 'Santa Rosalía', 'Causas de huracanes      ', 'proyectos/admin/Santa Rosalía'),
(16, 1, 'La Paz', 'Datos de temperatura      ', 'proyectos/admin/La Paz'),
(15, 1, 'GC', 'Datos de temperatura      ', 'proyectos/admin/GC');

-- --------------------------------------------------------

--
-- Table structure for table `regiones`
--

CREATE TABLE `regiones` (
  `idRegiones` int(5) NOT NULL,
  `idUsuarios` int(5) NOT NULL,
  `idProyectos` int(11) NOT NULL,
  `lat1` varchar(10) NOT NULL,
  `lat2` varchar(10) NOT NULL,
  `lon1` varchar(10) NOT NULL,
  `lon2` varchar(10) NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL,
  `pais` varchar(50) NOT NULL,
  `continente` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regiones`
--

INSERT INTO `regiones` (`idRegiones`, `idUsuarios`, `idProyectos`, `lat1`, `lat2`, `lon1`, `lon2`, `fechaI`, `fechaF`, `pais`, `continente`) VALUES
(34, 1, 18, '20', '23', '-110', '-107', '2019-01-01', '2019-01-03', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `institucion` varchar(100) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `correo`, `nombre`, `institucion`, `pais`, `ciudad`, `profesion`) VALUES
(1, 'admin', 'kshana', 'cmorenoc@ipn.mx', 'Cristian Horacio Moreno Chávez', 'CICIMAR', 'México', 'La Paz', 'Docente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`idConsulta`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`idRegiones`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `idConsulta` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `regiones`
--
ALTER TABLE `regiones`
  MODIFY `idRegiones` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
