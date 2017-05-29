-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2017 a las 01:29:01
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `melomaniac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `ID` int(10) NOT NULL,
  `Asunto` varchar(50) NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Emisor` varchar(50) NOT NULL,
  `Receptor` varchar(50) NOT NULL,
  `Grupo` enum('Rock Junior','Rock Senior','Rap Junior','Rap Senior','Pop Junior','Pop Senior','Electronica Junior','Electronica Senior','Jazz Junior','Jazz Senior','Heavy Junior','Heavy Senior','Punk Junior','Punk Senior','Techno Junior','Techno Senior','Trap Junior','Trap Senior','Indie Junior','Indie Senior','Dubstep Junior','Dubstep Senior') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `Asunto`, `Mensaje`, `Fecha`, `Emisor`, `Receptor`, `Grupo`) VALUES
(1, 'Primero', 'El primer mensajeee!!!', '2017-05-24', 'pepitogrillo@gmail.com', 'pablo@gmail.com', ''),
(2, 'Segundo', 'Segundo mensajeeee!!!', '2017-05-25', 'pablo@gmail.com', 'pepitogrillo@gmail.com', ''),
(3, 'Automail', 'Me mando un mensaje a mí mismo.', '2017-05-24', 'pepitogrillo@gmail.com', 'pepitogrillo@gmail.com', ''),
(4, 'Mensaje para todos! ', 'Hola!', '2017-05-24', 'pepitogrillo@gmail.com', 'TODOS', ''),
(5, 'Mensaje grupal', 'Este mensaje debería poder leerse en mi grupo', '2017-05-26', 'pepitogrillo@gmail.com', 'GRUPO', ''),
(6, 'Hola', 'Que tal?', '2017-05-27', 'pablo.verdu@hotmail.com', 'pepitogrillo@gmail.com', ''),
(7, 'Presentación', 'Hola soy Pablo', '2017-05-27', 'pablo.verdu@hotmail.com', 'TODOS', ''),
(8, 'Hey', 'Soy nuevo en este grupo', '2017-05-27', 'pablo.verdu@hotmail.com', 'GRUPO', ''),
(9, 'Me gusta mucho la música', 'Holaaaa', '2017-05-27', 'musicultramix@gmail.com', 'GRUPO', ''),
(10, 'Rap de viejos', 'Holaaaaaaaaaa', '2017-05-29', 'pepitogrillo@gmail.com', 'GRUPO', 'Rap Senior'),
(11, 'Hola', 'Hey', '2017-05-29', 'pablo.verdu@hotmail.com', 'GRUPO', 'Dubstep Junior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `genero_musical` enum('Rock','Rap','Pop','Electronica','Jazz','Heavy','Punk','Techno','Trap','Indie','Dubstep') DEFAULT NULL,
  `grupo` enum('Rock Junior','Rock Senior','Rap Junior','Rap Senior','Pop Junior','Pop Senior','Electronica Junior','Electronica Senior','Jazz Junior','Jazz Senior','Heavy Junior','Heavy Senior','Punk Junior','Punk Senior','Techno Junior','Techno Senior','Trap Junior','Trap Senior','Indie Junior','Indie Senior','Dubstep Junior','Dubstep Senior') DEFAULT NULL,
  `tipo` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `contraseña`, `nombre`, `fecha_de_nacimiento`, `foto`, `descripcion`, `genero_musical`, `grupo`, `tipo`) VALUES
('', '', NULL, NULL, NULL, NULL, '', '', 'user'),
('admin@gmail.com', 'admin', 'Admin', '2017-05-02', NULL, 'Soy el administrador', NULL, '', 'admin'),
('diego@gmail.com', 'diego', 'Diego Verdugo Garrido', '2017-05-03', 'foto1.jpg', 'Soy el hermano de Pablo', NULL, '', 'user'),
('ejemplo1@gmail.com', 'ejemplo1', NULL, NULL, NULL, NULL, NULL, '', 'user'),
('gonzalo@gmail.com', 'gonzalo', NULL, NULL, NULL, NULL, NULL, '', 'user'),
('musicultramix@gmail.com', 'music', NULL, '2017-05-09', NULL, 'qwedfgh', '', '', 'user'),
('pablo.verdu@hotmail.com', 'pablo', NULL, '1949-01-01', 'EstebanAjustado.jpg', 'gfdz', 'Rock', 'Rock Senior', 'user'),
('pablo@gmail.com', 'pablo', 'Pablo Verdugo Garrido', '2017-05-01', 'foto1.jpg', 'Estudiante de Ingeniería Informática en la UCM.', '', '', 'user'),
('pape@gmail.com', 'pape', 'Pape', '2017-05-18', 'EstebanAjustado.jpg', 'JEJEJE', '', '', 'user'),
('papo@gmail.com', 'papo', NULL, NULL, NULL, NULL, NULL, '', 'user'),
('pepitogrillo@gmail.com', 'pepito', 'Pepito', '1979-01-01', 'EstebanAjustado.jpg', 'Holaaa', 'Electronica', 'Electronica Senior', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD UNIQUE KEY `correo` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
