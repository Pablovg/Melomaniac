-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2017 a las 11:08:39
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
  `Grupo` enum('Rock Junior','Rock Senior','Rap Junior','Rap Senior','Pop Junior','Pop Senior','Electronica Junior','Electronica Senior','Jazz Junior','Jazz Senior','Heavy Junior','Heavy Senior','Punk Junior','Punk Senior','Techno Junior','Techno Senior','Trap Junior','Trap Senior','Indie Junior','Indie Senior') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `Asunto`, `Mensaje`, `Fecha`, `Emisor`, `Receptor`, `Grupo`) VALUES
(1, 'Hola amigos rockeros', ':D', '2017-05-30', 'usuario1@gmail.com', 'GRUPO', 'Rock Junior'),
(2, 'Viva el Rock', 'El Rock es el  mejor género musical', '2017-05-30', 'usuario1@gmail.com', 'TODOS', ''),
(3, 'Hola amigo', 'Cúando te vas a pasar al Rock?', '2017-05-30', 'usuario1@gmail.com', 'usuario2@gmail.com', ''),
(4, 'El Jazz mola más', 'JAJAJAJAJA', '2017-05-30', 'usuario2@gmail.com', 'TODOS', ''),
(5, 'Vamos arriba el Jazz', 'Para mi grupo de Jazz', '2017-05-30', 'usuario2@gmail.com', 'GRUPO', 'Jazz Senior'),
(6, 'Pásate al Jazz amigo', 'El Jazz es mejor', '2017-05-30', 'usuario2@gmail.com', 'usuario1@gmail.com', ''),
(7, 'Mola más el Indie', 'Viva el Indie', '2017-05-30', 'usuario3@gmail.com', 'usuario2@gmail.com', ''),
(8, 'Grupo de Indie', ':DDDDDDDD', '2017-05-30', 'usuario3@gmail.com', 'GRUPO', 'Indie Junior'),
(9, 'Hola', 'Te gusta el Techno? :)', '2017-05-30', 'usuario4@gmail.com', 'usuario3@gmail.com', ''),
(10, 'Holaaaa soy el usuario4', 'Me gusta mucho el Techno', '2017-05-30', 'usuario4@gmail.com', 'TODOS', ''),
(11, 'Hola grupo', 'Grupo de techno', '2017-05-30', 'usuario4@gmail.com', 'GRUPO', 'Techno Junior'),
(12, 'Hola guapa', 'Te gusta el rap?', '2017-05-30', 'usuario5@gmail.com', 'usuario4@gmail.com', ''),
(13, 'Raperos del mundo', 'Os gusta el rap?', '2017-05-30', 'usuario5@gmail.com', 'TODOS', ''),
(14, 'Holaaa grupo de rap', 'Para mi grupo de rap', '2017-05-30', 'usuario5@gmail.com', 'GRUPO', 'Rap Senior'),
(15, 'Opinión', 'Qué os parece el Indie?', '2017-05-30', 'usuario3@gmail.com', 'TODOS', '');

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
  `genero_musical` enum('Rock','Rap','Pop','Electronica','Jazz','Heavy','Punk','Techno','Trap','Indie') DEFAULT NULL,
  `grupo` enum('Rock Junior','Rock Senior','Rap Junior','Rap Senior','Pop Junior','Pop Senior','Electronica Junior','Electronica Senior','Jazz Junior','Jazz Senior','Heavy Junior','Heavy Senior','Punk Junior','Punk Senior','Techno Junior','Techno Senior','Trap Junior','Trap Senior','Indie Junior','Indie Senior','Dubstep Junior','Dubstep Senior','Por Junior','Por Senior') DEFAULT NULL,
  `tipo` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `contraseña`, `nombre`, `fecha_de_nacimiento`, `foto`, `descripcion`, `genero_musical`, `grupo`, `tipo`) VALUES
('admin@gmail.com', 'admin', 'Admin', '2017-05-02', NULL, 'Soy el administrador', NULL, '', 'admin'),
('usuario1@gmail.com', 'usuario1', 'Usuario1', '2017-05-04', 'usuario1.jpeg', 'Me gusta el Rock', 'Rock', 'Rock Junior', 'user'),
('usuario2@gmail.com', 'usuario2', 'Usuario2', '1970-01-01', 'usuario2.jpeg', 'Me gusta el Jazz', 'Jazz', 'Jazz Senior', 'user'),
('usuario3@gmail.com', 'usuario3', 'Usuario3', '2017-05-04', 'usuario3.jpeg', 'Me gusta el Indie', 'Indie', 'Indie Junior', 'user'),
('usuario4@gmail.com', 'usuario4', 'Usuario4', '2017-05-02', 'usuario4.jpeg', 'Me gusta el Techno', 'Techno', 'Techno Junior', 'user'),
('usuario5@gmail.com', 'usuario5', 'Usuario5', '1980-01-01', 'usuario5.jpeg', 'Soy rapero', 'Rap', 'Rap Senior', 'user');

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
