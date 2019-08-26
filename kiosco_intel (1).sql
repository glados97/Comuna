-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 17, 2018 at 01:43 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `Anuncio`
--

CREATE TABLE `Anuncio` (
  `id` int(6) UNSIGNED NOT NULL,
  `contenido` varchar(65) NOT NULL,
  `propietarioID` int(6) NOT NULL,
  `fechaINI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asistencia` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Anuncio`
--

INSERT INTO `Anuncio` (`id`, `contenido`, `propietarioID`, `fechaINI`, `fechaFIN`, `asistencia`) VALUES
(1, 'Mañana hay junta de vecinos', 1, '2018-04-28 23:37:25', '2018-04-28 23:37:25', 'false'),
(2, 'El papa nos visita este domingo', 1, '2018-04-28 23:37:59', '2018-04-28 23:37:59', 'false'),
(3, 'Bienvenidas las comidas a la feria mexicana el 30 de abril', 1, '2018-04-28 23:38:49', '2018-04-28 23:38:49', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `Asistencia`
--

CREATE TABLE `Asistencia` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `usuarioID` int(6) UNSIGNED NOT NULL,
  `participacion` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Asistencia`
--

INSERT INTO `Asistencia` (`publicacionID`, `usuarioID`, `participacion`) VALUES
(19, 13, 'true'),
(26, 14, 'true'),
(26, 18, 'true'),
(26, 18, ''),
(26, 18, 'true'),
(27, 12, 'true'),
(27, 19, 'true'),
(27, 19, ''),
(27, 19, 'true'),
(29, 20, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `Favor`
--

CREATE TABLE `Favor` (
  `favorID` int(6) UNSIGNED NOT NULL,
  `propietarioID` int(6) UNSIGNED NOT NULL,
  `voluntarioID` int(6) UNSIGNED DEFAULT NULL,
  `titulo` varchar(25) NOT NULL,
  `contenido` varchar(65) NOT NULL,
  `contacto` varchar(65) NOT NULL,
  `categoria` enum('fisico','tecnologia','bienestar','hogar','otros') NOT NULL DEFAULT 'otros',
  `fechaINI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Favor`
--

INSERT INTO `Favor` (`favorID`, `propietarioID`, `voluntarioID`, `titulo`, `contenido`, `contacto`, `categoria`, `fechaINI`) VALUES
(1, 12, 18, 'Ayuda para mudar', 'Que me ayuden a mudarme esta semana', '959649562390', 'fisico', '2018-07-17 00:23:38'),
(2, 13, 14, 'Ayuda para la compu', 'se rompio y no se como arreglarla', '4253092653', 'tecnologia', '2018-07-17 02:06:06'),
(3, 18, 12, 'Clases de Ingles', 'Tengo un examen y requiero ayuda', 'Casa de la calle Roble 123', 'otros', '2018-08-02 17:00:29'),
(4, 20, NULL, 'Ayuda mudanza', 'Requiero mudarme esta semana y bajar cajas', 'Casa en la calle roble 123', 'fisico', '2018-08-02 17:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Mercado`
--

CREATE TABLE `Mercado` (
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
-- Dumping data for table `Mercado`
--

INSERT INTO `Mercado` (`ventaID`, `nombre`, `descripcion`, `usuarioID`, `telefono`, `precio`, `fecha_ini`, `fecha_fin`, `hora`) VALUES
(2, 'Tamales', 'vendo ricos tamales', 12, '83333333', 100, '2016-09-29', '2018-10-30', '22:54:00'),
(13, 'Cartas', 'cartas de yugioh en venta', 14, '123467890', 345, '2015-10-30', '2018-07-30', '00:58:00'),
(15, 'espiritu de faraon', 'esta en un antiguo rompecabezas atado a una cadena para que sea la cosa mas pesada del mundo', 14, '456789', 6, '2013-07-28', '2016-07-26', '23:59:00'),
(16, 'tacos', 'ricos tacos\r\n\r\n-carnitas\r\n-chicharron\r\n-queso\r\n-lengua\r\n-deshebrada\r\n-machacado', 15, '84753902', 100, '2016-09-30', '2016-09-29', '16:20:00'),
(17, 'Flautas', 'Orden de 5 flautas doradas con guacamole', 10, '83538510', 40, '2018-05-06', '2018-05-08', '14:00:00'),
(18, 'Tortas', 'ricas tortas', 12, '1234567890', 10, '2018-12-31', '2019-12-31', '10:10:00'),
(19, 'cafecito', 'rico cafeicot de olla', 0, '2547852627556', 20, '2012-04-23', '2014-10-05', '05:05:00'),
(20, 'cafecito', 'rico cafeicot de olla', 0, '2547852627556', 20, '2012-04-23', '2014-10-05', '05:05:00'),
(21, 'cafe de olla', 'rico cafe de olla', 0, '8472134798', 20, '2014-09-26', '2017-09-28', '06:09:00'),
(22, 'cafe de olla', 'rico cafe de olla', 0, '8472134798', 20, '2014-09-26', '2017-09-28', '06:09:00'),
(23, 'cafe de olla', 'prueba 3', 0, '4463900893', 20, '2012-10-29', '2015-09-27', '18:00:00'),
(24, 'cafe de olla', 'prueba 3', 0, '4463900893', 20, '2012-10-29', '2015-09-27', '18:00:00'),
(25, 'cafe de olla', 'prueba 4', 12, '1231455', 10, '2014-08-28', '2016-10-29', '09:57:00'),
(26, 'cafe de olla', 'prueba 4', 12, '1231455', 10, '2014-08-28', '2016-10-29', '09:57:00'),
(27, 'cafe de olla', 'prueba 4', 12, '1231455', 10, '2014-08-28', '2016-10-29', '09:57:00'),
(28, 'tacos', 'tino', 12, '1231455', 20, '2013-04-03', '2014-11-06', '17:02:00'),
(30, 'Tamales', 'ricos tamales', 13, '1234567', 10, '2016-10-29', '2017-10-28', '22:57:00'),
(31, 'Helados', 'Ricas Paletas de Helado sabor limon', 18, '83333333', 10, '2018-08-02', '2018-08-03', '17:00:00'),
(32, 'Masajes', 'Precio por hora. Masajes para aliviar estres', 20, '83333333', 150, '2018-08-10', '2019-08-10', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Pregunta`
--

CREATE TABLE `Pregunta` (
  `preguntaID` int(6) UNSIGNED NOT NULL,
  `pregunta` varchar(100) DEFAULT NULL,
  `propietarioID` int(6) NOT NULL,
  `fechaINI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFIN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pregunta`
--

INSERT INTO `Pregunta` (`preguntaID`, `pregunta`, `propietarioID`, `fechaINI`, `fechaFIN`) VALUES
(1, '¿Que color prefieres?', 1, '2018-04-24 20:28:46', '2018-04-24 20:28:46'),
(2, '¿Cuantos hijos tienes?', 1, '2018-04-24 20:29:07', '2018-04-24 20:29:07'),
(3, '¿Cual es tu nivel de estudios?', 1, '2018-04-24 20:29:26', '2018-04-24 20:29:26'),
(4, '¿Por quien vas a votar?', 1, '2018-04-24 20:29:52', '2018-04-24 20:29:52'),
(5, '¿Como te gusta el pan?', 1, '2018-04-25 16:00:48', '2018-04-25 16:00:48'),
(6, '¿Que dia de la semana seran las reuniones?', 1, '2018-04-25 17:26:26', '2018-04-25 17:26:26'),
(7, '¿Que dice el reloj?', 1, '2018-04-25 19:29:34', '2018-04-25 19:29:34'),
(8, '¿Tiene mascotas?', 1, '2018-04-25 20:32:11', '2018-04-25 20:32:11'),
(9, '¿Quien es el mejor superheore?', 1, '2018-04-28 20:07:58', '2018-04-28 20:07:58'),
(10, '¿Cuantos años tiene?', 1, '2018-04-28 23:04:53', '2018-04-28 23:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `Publicacion`
--

CREATE TABLE `Publicacion` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `tipo` enum('votacion','anuncio','evento','resultado') NOT NULL DEFAULT 'anuncio',
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
-- Dumping data for table `Publicacion`
--

INSERT INTO `Publicacion` (`publicacionID`, `tipo`, `contenido`, `propietarioID`, `fechaINI`, `fechaFIN`, `opc1`, `opc2`, `opc3`, `titulo`, `hora`, `minuto`) VALUES
(1, 'anuncio', 'El viernes próximo habrá venta de pasteles', 1, '2018-05-02 04:53:13', '2018-05-02 04:53:13', NULL, NULL, NULL, 'Venta en la Vecindad', 4, 15),
(2, 'anuncio', 'Mañana pizza para todos los niños mayores a tres años', 1, '2018-05-02 05:11:32', '2018-05-02 05:11:32', NULL, NULL, NULL, 'Pizza Gratis', 4, 15),
(3, 'anuncio', 'Habrá junta de maestros el ultimo viernes del mes', 1, '2018-05-04 23:15:06', '2018-05-04 23:15:06', NULL, NULL, NULL, 'Aviso Escolar', 4, 15),
(4, 'votacion', '¿Cuántas mascotas tienes?', 1, '2018-05-04 23:17:07', '2018-05-04 23:17:07', '1', 'entre 2 y 4', '5 o más', 'Pregunta Curiosa', NULL, NULL),
(5, 'votacion', '¿Quién te gustaría como representante de barrio?', 1, '2018-05-04 23:18:17', '2018-05-04 23:18:17', 'Doña Lupe', 'Mario Bautista', NULL, 'Nuevo Representante', NULL, NULL),
(6, 'evento', 'Este domingo se convoca una junta de vecinos', 1, '2018-05-04 23:19:47', '2018-05-04 23:19:47', NULL, NULL, NULL, 'Junta de Vecinos', 17, 30),
(7, 'anuncio', 'Habrá un nuevo sistema para anunciar ventas', 1, '2018-05-04 23:46:21', '2018-05-04 23:46:21', NULL, NULL, NULL, 'Mercadito', 4, 15),
(8, 'votacion', '¿Margarita salió de las elecciones?', 2, '2018-05-20 06:14:09', '2018-06-01 10:00:00', 'si', 'no', 'es rumor', 'Pregunta Presidencial', 12, 30),
(9, 'evento', 'Vamos todos al restaurante Wok', 1, '2018-05-20 06:42:50', '2018-05-20 10:00:00', NULL, NULL, NULL, 'Comida Coreana', 16, 0),
(10, 'anuncio', 'El Starnucks tiene promociones del 50% en frappes este mes', 1, '2018-05-20 06:48:20', '2018-05-31 10:00:00', NULL, NULL, NULL, 'Ofertas Starbucks', 16, 0),
(11, 'anuncio', 'Inicia temporada de disertaciones de alumnos próximos a graduarse', 1, '2018-05-22 22:02:35', '2018-05-31 10:00:00', NULL, NULL, NULL, 'Disertaciones UDEM', 10, 0),
(12, 'evento', 'Te invito a la disertación de Juan en el 4402 ... habrán dulces', 1, '2018-05-22 22:09:12', '2018-05-23 10:00:00', NULL, NULL, NULL, 'Disertación Juan Colinas', 4, 0),
(13, 'evento', '¿Irías a una competencia de natación UDEM? Comida incluida', 1, '2018-05-22 22:10:27', '2018-05-25 10:00:00', NULL, NULL, NULL, 'Evento de natación', 4, 0),
(14, 'votacion', '¿Cuál color prefieres?', 1, '2018-05-22 23:56:11', '2018-05-24 10:00:00', 'Azul', 'Magenta', 'Rosa', 'Color favorito', 0, 0),
(15, 'votacion', '¿Piensas votar este período electoral?', 1, '2018-05-23 00:02:13', '2018-05-23 10:00:00', 'Sí', 'No quiero', 'No puedo', 'Votaciones', 0, 0),
(16, 'votacion', '¿Margarita salió de las elecciones?', 2, '2018-05-31 22:04:44', '2018-06-01 10:00:00', 'si', 'no', 'es rumor', 'Pregunta Presidencial', 12, 30),
(17, 'votacion', '¿Cuál es tu comida preferida?', 1, '2018-06-01 01:06:59', '2018-05-18 10:00:00', 'Pizza', 'Apio', 'Pastel', 'Comida', 0, 0),
(19, 'evento', 'Habrá un convivio de comida sana, entrada abierta', 1, '2018-06-08 07:37:16', '2018-06-09 10:00:00', NULL, NULL, NULL, 'Avena y Galletas', 14, 0),
(20, 'votacion', '¿Qué color prefieres?', 1, '2018-06-08 07:41:22', '2018-06-08 10:00:00', 'Azul', 'Naranja', NULL, 'Colores', 0, 0),
(21, 'votacion', '¿Qué película verías el sábado?', 1, '2018-06-08 07:50:22', '2018-06-09 10:00:00', 'Niñera a prueba de balas', 'Mosters INC.', 'El rey león', 'Cine', 0, 0),
(24, 'votacion', 'Cual se les antoja', 13, '2018-07-26 19:34:46', '2018-07-26 05:00:00', 'Avatar', 'Bandido', 'Canario', 'Peliculas', 0, 0),
(25, 'votacion', 'Que quieren comer?', 13, '2018-07-26 19:40:58', '2018-08-02 05:00:00', 'Almejas', 'Bacalao', 'Cangrejo', 'La comida', 0, 0),
(26, 'evento', 'Party eah', 13, '2018-07-30 01:01:25', '2020-10-28 06:00:00', NULL, NULL, NULL, 'Party', 20, 0),
(27, 'evento', 'Junta para definir el presupuesto', 18, '2018-08-02 16:55:05', '2018-09-02 05:00:00', NULL, NULL, NULL, 'Junta Comunidad', 20, 0),
(28, 'votacion', '¿quién es el mejor equipo de mexico?', 18, '2018-08-02 17:08:01', '2018-08-09 05:00:00', 'Tigres', 'Rayados', 'Chivas', '¿A qué equipo le van? ', 0, 0),
(29, 'evento', 'Fiesta para festejarme', 19, '2018-08-02 17:33:56', '2018-08-03 05:00:00', NULL, NULL, NULL, 'Fiesta Cumpleaños', 20, 0),
(30, 'votacion', '¿Que sabor de pastel les gusta?', 19, '2018-08-02 17:35:13', '2018-08-03 05:00:00', 'Chocolate', 'Fresa', 'Vainilla', 'Pastel', 0, 0),
(31, 'evento', 'Junta con el municipio', 20, '2018-08-02 17:51:16', '2018-03-08 06:00:00', NULL, NULL, NULL, 'Junta', 19, 0),
(32, 'votacion', 'A donde se deberia invertir los fondos', 20, '2018-08-02 17:52:20', '2018-08-03 05:00:00', 'Iluminacion', 'Seguridad', '', 'Fondos de la comunidad', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
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
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `first_name`, `last_name`, `dob`, `sex`, `password`, `foto`, `puntaje`) VALUES
(1, 'aliciatorres', 'Alicia', 'Torres', '1989-06-01 06:00:00', 'f', '123456', 'profile6', 3),
(2, 'mariovelazquez', 'Mario', 'Velazquez', '1989-06-01 06:00:00', 'm', '123456', 'profile5', 3),
(3, 'AndreaPuente', 'Andrea', 'Puente', '1996-02-09 06:00:00', 'f', '$2y$10$hqninAbZYP9ppEpe/9/U8ugX7u2BQCeoLHXYLb0R0vBwLsYrjvh12', 'profile8', 3),
(4, 'AndyP', 'Andy', 'P', '1996-02-09 06:00:00', 'f', '$2y$10$J6Mq1tRbGjcw9Zb20fQQDOe4Uq1A3N9hRvcK/0UcLbFOjF.2JQ79u', 'profile8', 3),
(9, 'aliciatorres01', 'Alicia', 'Torres', '1998-02-05 06:00:00', 'f', '$2y$10$3SSS6CUVuDdelICjV2yo0uaO2tkYWphpjyhki4I5Ixc53K7DXoVm6', 'profile8', 3),
(10, 'TinoPearl', 'Tino', 'Pearl', '1996-05-04 05:00:00', 'm', '$2y$10$9GXtEPmSZxMhhZtqtqwpLunbshELh9ork4sz5XdoCBRF7WTpCM5kK', 'profile8', 3),
(11, 'tinopearl01', 'Tino', 'Pearl', '2012-08-29 05:00:00', 'm', '$2y$10$aN0/ygDoFZZXxmc119glF.tFfSAHQixwacr6IcCxJD.f/uRhSvgI6', 'profile8', 3),
(12, 'normanpearl', 'Norman', 'Pearl', '2018-10-31 06:00:00', 'f', '$2y$10$AL3NXEdkKMUyijU0oaFR0eFBL18pgPnay8aJtl2A/vw552jJwi9Xy', 'profile8', 5),
(13, 'tinopearl02', 'Constantino', 'Pearl', '1994-08-27 06:00:00', 'm', '$2y$10$OnAvtznhNf3off3N23NXjeDeBcp9.6ghx7R5hOG4h1Dfz7DMpchpS', 'profile1', 4),
(14, 'emmarivera', 'Emma', 'Rivera', '1999-04-22 05:00:00', 'f', '$2y$10$DghGbouD8IORG5HzN8SWpOprbCaufO2x66OJNJ5n/3UeOAqQX3Rg6', 'profile8', 4),
(15, 'gloriarivera', 'Gloria', 'Rivera', '2015-11-27 06:00:00', 'f', '$2y$10$/mWBYWmc3tSUjE5/GnjACeAh43QdB8M.PW4WN9fWb5xcH9xZYW/B.', 'profile8', 3),
(16, 'AlbertoTreviño', 'Alberto', 'Treviño', '2012-11-27 06:00:00', 'm', '$2y$10$P/CqJVsONF5uE4IdNqTug.gPdjTe5yDX86LL0xS/yo6bYoG5EXYN.', 'profile8', 3),
(17, 'TINOPEARL03', 'TINO', 'PEARL', '2012-06-05 05:00:00', 'm', '$2y$10$gZpLH49QLmQfFhrI75yCIu1DMJxOfNHNr7rIWW4WYcgLx9hmEi.wG', 'profile8', 3),
(18, 'JuanGomez', 'Chacho', 'Gomez', '1998-08-02 05:00:00', 'm', '$2y$10$I15fe7.j4wMlFJdTHSFkee8NKopEvXHqrwAf1TnvBnrXwv9.8LN1W', 'profile4', 4),
(19, 'AlanGomez', 'Alan', 'Gomez', '2000-08-02 05:00:00', 'm', '$2y$10$pQpbNvEnZzCypDAgU4krTurzWQFZEhMufSLUtiCms3caC5Q2x8OI6', 'profile8', 3),
(20, 'JoePerez', 'Joel', 'Perez', '1998-08-01 05:00:00', 'm', '$2y$10$jrVLr5b9eBxLWgCQhkP2J.4XU3bg8Xlno/cPUPISeTG7/ULCu9lO6', 'profile8', 2),
(21, 'anapearl', 'Ana', 'Pearl', '1994-10-26 06:00:00', 'f', '$2y$10$cSR0gncjtuDhfM2Og7zm4OPvDVhsTbE0ug2aRi0dpOfNdbRkq..JC', 'profile8', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `usuarioID` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fechaNac` datetime DEFAULT NULL,
  `genero` enum('M','F') NOT NULL,
  `foto` varchar(25) NOT NULL DEFAULT 'profile1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`usuarioID`, `nombre`, `apellido`, `fechaNac`, `genero`, `foto`) VALUES
(1, 'Alicia', 'Torres', '1996-05-04 00:00:00', 'F', 'profile4'),
(2, 'Juan', 'Escutia', '1987-03-04 00:00:00', 'M', 'profile1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `sexo` char(1) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Voluntario`
--

CREATE TABLE `Voluntario` (
  `favorID` int(6) UNSIGNED NOT NULL,
  `voluntarioID` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Voto`
--

CREATE TABLE `Voto` (
  `publicacionID` int(6) UNSIGNED NOT NULL,
  `usuarioID` int(6) UNSIGNED NOT NULL,
  `voto` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Voto`
--

INSERT INTO `Voto` (`publicacionID`, `usuarioID`, `voto`) VALUES
(16, 9, 1),
(25, 14, 2),
(28, 12, 4),
(28, 19, 4),
(30, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Asistencia`
--
ALTER TABLE `Asistencia`
  ADD KEY `publicacionID` (`publicacionID`),
  ADD KEY `usuarioID` (`usuarioID`);

--
-- Indexes for table `Favor`
--
ALTER TABLE `Favor`
  ADD KEY `favorID` (`favorID`),
  ADD KEY `favor_ibfk_1` (`propietarioID`),
  ADD KEY `favor_ibfk_2` (`voluntarioID`);

--
-- Indexes for table `Mercado`
--
ALTER TABLE `Mercado`
  ADD PRIMARY KEY (`ventaID`);

--
-- Indexes for table `Pregunta`
--
ALTER TABLE `Pregunta`
  ADD PRIMARY KEY (`preguntaID`);

--
-- Indexes for table `Publicacion`
--
ALTER TABLE `Publicacion`
  ADD PRIMARY KEY (`publicacionID`),
  ADD KEY `propietarioID` (`propietarioID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`usuarioID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Voluntario`
--
ALTER TABLE `Voluntario`
  ADD KEY `favorID` (`favorID`),
  ADD KEY `voluntarioID` (`voluntarioID`);

--
-- Indexes for table `Voto`
--
ALTER TABLE `Voto`
  ADD KEY `publicacionID` (`publicacionID`),
  ADD KEY `usuarioID` (`usuarioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Anuncio`
--
ALTER TABLE `Anuncio`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Favor`
--
ALTER TABLE `Favor`
  MODIFY `favorID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Mercado`
--
ALTER TABLE `Mercado`
  MODIFY `ventaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Pregunta`
--
ALTER TABLE `Pregunta`
  MODIFY `preguntaID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Publicacion`
--
ALTER TABLE `Publicacion`
  MODIFY `publicacionID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `usuarioID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Asistencia`
--
ALTER TABLE `Asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`publicacionID`) REFERENCES `Publicacion` (`publicacionID`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Favor`
--
ALTER TABLE `Favor`
  ADD CONSTRAINT `favor_ibfk_1` FOREIGN KEY (`propietarioID`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `favor_ibfk_2` FOREIGN KEY (`voluntarioID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Publicacion`
--
ALTER TABLE `Publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`propietarioID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Voluntario`
--
ALTER TABLE `Voluntario`
  ADD CONSTRAINT `voluntario_ibfk_1` FOREIGN KEY (`favorID`) REFERENCES `Favor` (`favorID`),
  ADD CONSTRAINT `voluntario_ibfk_2` FOREIGN KEY (`voluntarioID`) REFERENCES `Users` (`id`);

--
-- Constraints for table `Voto`
--
ALTER TABLE `Voto`
  ADD CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`publicacionID`) REFERENCES `Publicacion` (`publicacionID`),
  ADD CONSTRAINT `voto_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
