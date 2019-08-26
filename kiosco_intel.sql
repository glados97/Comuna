-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 08:05 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiosco_intel`
--

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `usuarioID` int(6) UNSIGNED NOT NULL,
  `participacion` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`publicacionID`, `usuarioID`, `participacion`) VALUES
(12, 9, 'true'),
(13, 9, 'true'),
(6, 11, 'true'),
(19, 4, 'true'),
(12, 4, 'true'),
(19, 3, 'true'),
(23, 3, 'true'),
(22, 11, 'true'),
(22, 9, 'true'),
(19, 9, 'true'),
(12, 3, 'true'),
(13, 3, 'true'),
(22, 3, 'true'),
(23, 11, 'true'),
(19, 11, 'true'),
(23, 4, 'true'),
(23, 12, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `favor`
--

CREATE TABLE `favor` (
  `favorID` int(6) UNSIGNED NOT NULL,
  `propietarioID` int(6) UNSIGNED NOT NULL,
  `voluntarioID` int(6) UNSIGNED DEFAULT NULL,
  `titulo` varchar(25) NOT NULL,
  `contenido` varchar(65) NOT NULL,
  `contacto` varchar(65) NOT NULL,
  `categoria` enum('fisico','tecnologia','bienestar','hogar','otros') DEFAULT NULL,
  `fechaINI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favor`
--

INSERT INTO `favor` (`favorID`, `propietarioID`, `voluntarioID`, `titulo`, `contenido`, `contacto`, `categoria`, `fechaINI`) VALUES
(1, 3, NULL, 'Tutor Matemáticas', 'ayudame a estudiar fracciones', 'email: andrea.puente@mail.com', 'otros', '2018-07-10 02:23:32'),
(2, 3, 4, 'Mover Muebles', 'Necesito ayuda moviendo mi sillón de habitación', 'cel: 8116838766', 'fisico', '2018-07-10 02:30:48'),
(3, 4, 3, 'Instalación Televisor', 'Necesito ayuda instalando el cable en la TV.', 'Mi casa (la roja)', 'tecnologia', '2018-07-15 02:00:27'),
(4, 9, NULL, 'Planchar camisas', 'Mi plancha no funciona y quisiera pedir prestada una', 'Casa roja', 'hogar', '2018-07-16 02:28:02'),
(5, 3, 4, 'Comida', 'Necesito ayuda preparando tamales. ¡Les voy a pagar 200 pesos!', 'Estoy en la escuela 7 ', 'hogar', '2018-07-23 01:41:48'),
(6, 4, NULL, 'Hacer tamales ', 'Necesito ayuda preparando 200 tamales para la liga de la colonia', 'La casa de la esquina, después de las 4:00 PM', 'hogar', '2018-07-23 01:49:17'),
(7, 14, NULL, 'Ayuda con estufa', 'Mi estufa se descompuso ¿alguien me podria prestar la suya?', 'Teléfono: 8117651005', 'hogar', '2018-10-05 23:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `mercado`
--

CREATE TABLE `mercado` (
  `ventaID` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `usuarioID` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mercado`
--

INSERT INTO `mercado` (`ventaID`, `nombre`, `descripcion`, `usuarioID`, `telefono`, `precio`, `fecha_ini`, `fecha_fin`, `hora`) VALUES
(2, 'Tamales', 'vendo ricos tamales', 12, '83333333', 100, '2016-09-29', '2018-10-30', '22:54:00'),
(13, 'Cartas', 'cartas de yugioh en venta', 14, '123467890', 345, '2015-10-30', '2018-07-30', '00:58:00'),
(15, 'espiritu de faraon', 'esta en un antiguo rompecabezas atado a una cadena para que sea la cosa mas pesada del mundo', 14, '456789', 6, '2013-07-28', '2016-07-26', '23:59:00'),
(17, 'Flautas', 'Orden de 5 flautas doradas con guacamole', 10, '83538510', 40, '2018-05-06', '2018-05-08', '14:00:00'),
(18, 'Masajes', 'Masajes terapéuticos con música relajante.', 3, '83538510', 300, '2018-03-07', '2018-03-07', '16:00:00'),
(19, 'Tortas', 'ricas tortas', 3, '12332344', 10, '2018-12-31', '2019-12-31', '10:01:00'),
(20, 'Pizza', 'Pizza horneada al sol de Mty', 3, '83538510', 100, '2017-03-01', '2019-03-01', '16:00:00'),
(21, 'Café', 'Café de fresa con fruta', 3, '83538510', 80, '2018-07-07', '2018-07-30', '10:00:00'),
(22, 'Ropa Usada', 'Ropa en buenas condiciones a partir de 50 pesos', 11, '8110448787', 50, '2018-07-08', '2018-07-31', '14:00:00'),
(23, 'Masajes', 'Masajes de 15 minutos. Soy quiropráctico.', 12, '8116848484', 200, '2018-08-02', '2018-08-05', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE `publicacion` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `tipo` enum('votacion','anuncio','evento') NOT NULL DEFAULT 'anuncio',
  `contenido` varchar(65) NOT NULL,
  `propietarioID` int(6) UNSIGNED NOT NULL,
  `fechaINI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opc1` varchar(25) DEFAULT NULL,
  `opc2` varchar(25) DEFAULT NULL,
  `opc3` varchar(25) DEFAULT NULL,
  `titulo` varchar(25) DEFAULT NULL,
  `hora` int(2) DEFAULT NULL,
  `minuto` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`publicacionID`, `tipo`, `contenido`, `propietarioID`, `fechaINI`, `fechaFIN`, `opc1`, `opc2`, `opc3`, `titulo`, `hora`, `minuto`) VALUES
(1, 'anuncio', 'El viernes próximo habrá venta de pasteles', 1, '2018-05-02 04:53:13', '2018-07-11 04:53:13', NULL, NULL, NULL, 'Venta en la Vecindad', 4, 15),
(2, 'anuncio', 'Mañana pizza para todos los niños mayores a tres años', 1, '2018-05-02 05:11:32', '2018-07-11 05:11:32', NULL, NULL, NULL, 'Pizza Gratis', 4, 15),
(3, 'anuncio', 'Habrá junta de maestros el ultimo viernes del mes', 1, '2018-05-04 23:15:06', '2018-07-13 23:15:06', NULL, NULL, NULL, 'Aviso Escolar', 4, 15),
(4, 'votacion', '¿Cuántas mascotas tienes?', 1, '2018-05-04 23:17:07', '2018-07-13 23:17:07', '1', 'entre 2 y 4', '5 o más', 'Pregunta Curiosa', NULL, NULL),
(5, 'votacion', '¿Quién te gustaría como representante de barrio?', 1, '2018-05-04 23:18:17', '2018-07-13 23:18:17', 'Doña Lupe', 'Mario Bautista', NULL, 'Nuevo Representante', NULL, NULL),
(6, 'evento', 'Este domingo se convoca una junta de vecinos', 1, '2018-05-04 23:19:47', '2018-07-13 23:19:47', NULL, NULL, NULL, 'Junta de Vecinos', 17, 30),
(7, 'anuncio', 'Habrá un nuevo sistema para anunciar ventas', 1, '2018-05-04 23:46:21', '2018-07-13 23:46:21', NULL, NULL, NULL, 'Mercadito', 4, 15),
(8, 'votacion', '¿Margarita salió de las elecciones?', 2, '2018-05-20 06:14:09', '2018-08-10 10:00:00', 'si', 'no', 'es rumor', 'Pregunta Presidencial', 12, 30),
(9, 'evento', 'Vamos todos al restaurante Wok', 1, '2018-05-20 06:42:50', '2018-07-29 10:00:00', NULL, NULL, NULL, 'Comida Coreana', 16, 0),
(10, 'anuncio', 'El Starnucks tiene promociones del 50% en frappes este mes', 1, '2018-05-20 06:48:20', '2018-08-09 10:00:00', NULL, NULL, NULL, 'Ofertas Starbucks', 16, 0),
(11, 'anuncio', 'Inicia temporada de disertaciones de alumnos próximos a graduarse', 1, '2018-05-22 22:02:35', '2018-08-09 10:00:00', NULL, NULL, NULL, 'Disertaciones UDEM', 10, 0),
(12, 'evento', 'Te invito a la disertación de Juan en el 4402 ... habrán dulces', 1, '2018-05-22 22:09:12', '2018-08-01 10:00:00', NULL, NULL, NULL, 'Disertación Juan Colinas', 4, 0),
(13, 'evento', '¿Irías a una competencia de natación UDEM? Comida incluida', 1, '2018-05-22 22:10:27', '2018-08-03 10:00:00', NULL, NULL, NULL, 'Evento de natación', 4, 0),
(14, 'votacion', '¿Cuál color prefieres?', 1, '2018-05-22 23:56:11', '2018-08-02 10:00:00', 'Azul', 'Magenta', 'Rosa', 'Color favorito', 0, 0),
(15, 'votacion', '¿Piensas votar este período electoral?', 1, '2018-05-23 00:02:13', '2018-08-01 10:00:00', 'Sí', 'No quiero', 'No puedo', 'Votaciones', 0, 0),
(16, 'votacion', '¿Margarita salió de las elecciones?', 2, '2018-05-31 22:04:44', '2018-08-10 10:00:00', 'si', 'no', 'es rumor', 'Pregunta Presidencial', 12, 30),
(17, 'votacion', '¿Cuál es tu comida preferida?', 1, '2018-06-01 01:06:59', '2018-07-27 10:00:00', 'Pizza', 'Apio', 'Pastel', 'Comida', 0, 0),
(18, 'anuncio', 'comida', 1, '2018-06-01 06:00:12', '2018-07-31 10:00:00', NULL, NULL, NULL, 'Que haremos hoy', 14, 30),
(19, 'evento', 'Habrá un convivio de comida sana, entrada abierta', 1, '2018-06-08 07:37:16', '2018-08-18 10:00:00', NULL, NULL, NULL, 'Avena y Galletas', 14, 0),
(20, 'votacion', '¿Qué color prefieres?', 1, '2018-06-08 07:41:22', '2018-08-17 10:00:00', 'Azul', 'Naranja', '', 'Colores', 0, 0),
(21, 'votacion', '¿Qué película verías el sábado?', 1, '2018-06-08 07:50:22', '2018-08-18 10:00:00', 'Niñera a prueba de balas', 'Mosters INC.', 'El rey león', 'Cine', 0, 0),
(22, 'evento', 'Vamos a realizar un certamen de belleza donde todos puedan ir', 4, '2018-07-22 00:52:44', '2018-09-19 05:00:00', NULL, NULL, NULL, 'Concurso de belleza', 16, 0),
(23, 'evento', 'Se va a exponer la plataforma COMUNA', 3, '2018-07-23 19:48:55', '2018-10-03 05:00:00', NULL, NULL, NULL, 'Presentacion de plataform', 16, 0),
(24, 'votacion', '¿Cuál es tu color favorito?', 3, '2018-07-25 17:17:42', '2018-10-09 05:00:00', 'Azul', 'Verde', 'Rojo', 'Color Favorito', 0, 0),
(25, 'anuncio', 'Se van a renovar los parques de la colonia', 3, '2018-07-25 17:18:59', '2018-10-08 05:00:00', NULL, NULL, NULL, 'Renovación de parques', 16, 0),
(27, 'evento', 'Habrá un convivio por el dia de muertos !los espero!', 16, '2018-10-06 01:19:37', '2018-11-02 06:00:00', NULL, NULL, NULL, 'Convivio día de muertos', 17, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(65) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sex` enum('m','f') NOT NULL DEFAULT 'm',
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `puntaje` int(6) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `dob`, `sex`, `password`, `foto`, `puntaje`) VALUES
(1, 'aliciatorres', 'Alicia', 'Torres', '1989-06-01 06:00:00', 'f', '123456', 'profile6', 3),
(2, 'mariovelazquez', 'Mario', 'Velazquez', '1989-06-01 06:00:00', 'm', '123456', 'profile5', 3),
(3, 'AndreaPuente', 'Andrea', 'Puente', '1996-02-09 06:00:00', 'f', '$2y$10$hqninAbZYP9ppEpe/9/U8ugX7u2BQCeoLHXYLb0R0vBwLsYrjvh12', 'profile6', 4),
(4, 'AndyP', 'Andy', 'P', '1996-02-09 06:00:00', 'f', '$2y$10$J6Mq1tRbGjcw9Zb20fQQDOe4Uq1A3N9hRvcK/0UcLbFOjF.2JQ79u', 'profile2', 5),
(9, 'aliciatorres01', 'Alicia', 'Torres', '1998-02-05 06:00:00', 'f', '$2y$10$3SSS6CUVuDdelICjV2yo0uaO2tkYWphpjyhki4I5Ixc53K7DXoVm6', 'profile7', 3),
(10, 'TinoPearl', 'Tino', 'Pearl', '1996-05-04 05:00:00', 'm', '$2y$10$9GXtEPmSZxMhhZtqtqwpLunbshELh9ork4sz5XdoCBRF7WTpCM5kK', 'profile8', 3),
(11, 'DiegoReyna', 'Diego', 'Reyna', '1998-04-20 05:00:00', 'm', '$2y$10$guFT9aB0LjELGbtJSUJ5I.GWtsw8WTJdsBt0AUxijPpvepkT/laVa', 'profile3', 3),
(12, 'ConstantinoPearl', 'Constantino', 'Pearl', '1993-07-07 06:00:00', 'm', '$2y$10$2SMOlS10xqMjTuV3LZjbiO7gIgP/Y8tWVmpzujDqa2idqpyNQLZ9u', 'profile8', 3),
(13, 'DavidViesca', 'David', 'Viescas', '1996-06-26 05:00:00', 'm', '$2y$10$vBtpN5Z7NXqrtzCn9KyjjuXYxVu8Vg8CMpnlhdgN/P4/oNIr/fK0u', 'profile8', 3),
(14, 'KarlaPerez', 'Karla', 'Perez', '1980-01-06 06:00:00', 'f', '$2y$10$.sIsHMdo8vQV5jR0LUiC1.BZYGsg3.1ijJcoVTFbPDopeyk19XQDy', 'profile8', 2),
(16, 'MarianaLozano', 'Mariana', 'Lozano', '1978-04-03 05:00:00', 'f', '$2y$10$My44bAL1l8ut3VBWxQLrVurf35z7VRanSMnPWgVKVSHJDjSIJ8ppi', 'profile8', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voluntario`
--

CREATE TABLE `voluntario` (
  `favorID` int(6) UNSIGNED NOT NULL,
  `voluntarioID` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voluntario`
--

INSERT INTO `voluntario` (`favorID`, `voluntarioID`) VALUES
(1, 9),
(4, 3),
(1, 12),
(6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `voto`
--

CREATE TABLE `voto` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `usuarioID` int(6) UNSIGNED NOT NULL,
  `voto` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voto`
--

INSERT INTO `voto` (`publicacionID`, `usuarioID`, `voto`) VALUES
(16, 9, 1),
(17, 4, 1),
(8, 4, 2),
(4, 4, 2),
(16, 4, 2),
(14, 4, 3),
(20, 4, 4),
(4, 3, 2),
(8, 3, 1),
(5, 3, 2),
(24, 4, 3),
(24, 11, 4),
(21, 3, 3),
(20, 3, 1),
(21, 11, 2),
(16, 11, 1),
(21, 4, 2),
(24, 12, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD KEY `publicacionID` (`publicacionID`),
  ADD KEY `usuarioID` (`usuarioID`);

--
-- Indexes for table `favor`
--
ALTER TABLE `favor`
  ADD KEY `favorID` (`favorID`),
  ADD KEY `favor_ibfk_1` (`propietarioID`),
  ADD KEY `favor_ibfk_2` (`voluntarioID`);

--
-- Indexes for table `mercado`
--
ALTER TABLE `mercado`
  ADD PRIMARY KEY (`ventaID`);

--
-- Indexes for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`publicacionID`),
  ADD KEY `propietarioID` (`propietarioID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voluntario`
--
ALTER TABLE `voluntario`
  ADD KEY `favorID` (`favorID`),
  ADD KEY `voluntarioID` (`voluntarioID`);

--
-- Indexes for table `voto`
--
ALTER TABLE `voto`
  ADD KEY `publicacionID` (`publicacionID`),
  ADD KEY `usuarioID` (`usuarioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favor`
--
ALTER TABLE `favor`
  MODIFY `favorID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mercado`
--
ALTER TABLE `mercado`
  MODIFY `ventaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `publicacionID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`publicacionID`) REFERENCES `publicacion` (`publicacionID`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `users` (`id`);

--
-- Constraints for table `favor`
--
ALTER TABLE `favor`
  ADD CONSTRAINT `favor_ibfk_1` FOREIGN KEY (`propietarioID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favor_ibfk_2` FOREIGN KEY (`voluntarioID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`propietarioID`) REFERENCES `users` (`id`);

--
-- Constraints for table `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`favorID`) REFERENCES `favor` (`favorID`),
  ADD CONSTRAINT `voluntario_ibfk_2` FOREIGN KEY (`voluntarioID`) REFERENCES `users` (`id`);

--
-- Constraints for table `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`publicacionID`) REFERENCES `publicacion` (`publicacionID`),
  ADD CONSTRAINT `voto_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
