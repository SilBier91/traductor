-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2022 a las 13:28:05
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diccionario`
--

CREATE TABLE IF NOT EXISTS `diccionario` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Espanol` varchar(30) NOT NULL,
  `Aleman` varchar(30) NOT NULL,
  `Frances` varchar(30) NOT NULL,
  `Ingles` varchar(30) NOT NULL,
  `Italiano` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `diccionario`
--

INSERT INTO `diccionario` (`Codigo`, `Espanol`, `Aleman`, `Frances`, `Ingles`, `Italiano`) VALUES
(1, 'Abad', 'Abt', 'Abbé', 'Abbot', 'Abate'),
(2, 'Abogado', 'Anwalt', 'Avocal', 'Lawyer', 'Avvocato'),
(3, 'Aparato', 'Apparat', 'Appareil', 'Appliance', 'Apparecchio'),
(4, 'Bosque', 'Wald', 'Bois', 'Wood', 'Bosco'),
(5, 'Caballo', 'Pferd', 'Cheval', 'Horse', 'Cavallo'),
(6, 'Casa', 'Haus', 'Maison', 'House', 'Casa'),
(7, 'Granja', 'Bauernhof', 'ferme', 'Farm', 'Fattoria'),
(8, 'Jabon', 'Seife', 'Savon', 'Soap', 'Sapone'),
(9, 'Pajaro', 'Vogel', 'Oiseau', 'Bird', 'Uccello'),
(10, 'Reposo', 'Ruhe', 'Repos', 'Rest', 'Riposo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
