-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-05-2017 a las 21:53:30
-- Versión del servidor: 5.5.54-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `melomaniac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `ID` int(10) NOT NULL,
  `Mensaje` text NOT NULL,
  `N_usuarios` int(2) NOT NULL,
  `Emisor` varchar(50) NOT NULL,
  `Receptor` varchar(50) NOT NULL,
  `Grupo` enum('Rock_Junior','Rock_Senior','Rap_Junior','Rap_Senior','Pop_Junior','Pop_Senior','Electronica_Junior','Electronica_Senior','Jazz_Junior','Jazz_Senior','Heavy_Junior','Heavy_Senior','Punk_Junior','Punk_Senior','Techno_Junior','Techno_Senior','Trap_Junior','Trap_Senior','Indie_Junior','Indie_Senior') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `genero_musical` enum('Rock','Rap','Pop','Electronica','Jazz','Heavy','Punk','Techno','Trap','Indie') DEFAULT NULL,
  `tipo` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `contraseña`, `nombre`, `fecha_de_nacimiento`, `foto`, `descripcion`, `genero_musical`, `tipo`) VALUES
('diego@gmail.com', 'diego', 'Diego Verdugo Garrido', '2017-05-03', 'foto1.jpg', 'Soy el hermano de Pablo', NULL, 'admin'),
('gonzalo@gmail.com', 'gonzalo', NULL, NULL, NULL, NULL, NULL, 'user'),
('pablo@gmail.com', 'pablo', 'Pablo Verdugo Garrido', '2017-05-01', 'foto1.jpg', 'Estudiante de Ingeniería Informática en la UCM.', 'Trap', 'admin'),
('pepita@gmail.com', 'pepita', NULL, NULL, NULL, NULL, NULL, 'admin'),
('pepitogrillo@gmail.com', 'pepito', 'Pepito Grillo', '2017-05-04', 'foto1.jpg', 'Soy amigo de Pinocho', NULL, 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`correo`), ADD UNIQUE KEY `correo` (`correo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
