-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2024 a las 15:43:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `suyachiy2.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_conductores`
--

CREATE TABLE `calificaciones_conductores` (
  `id_calificacion_conductor` int(11) NOT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  `pasajero_id` int(11) DEFAULT NULL,
  `calificacion_conductor` int(11) DEFAULT NULL,
  `comentario_conductor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones_conductores`
--

INSERT INTO `calificaciones_conductores` (`id_calificacion_conductor`, `conductor_id`, `pasajero_id`, `calificacion_conductor`, `comentario_conductor`) VALUES
(1, 7, 4, 5, 'Buen viaje'),
(2, 7, 4, 3, 'Conductor amable'),
(3, 6, 4, 5, 'Excelente servicio'),
(4, 6, 4, 2, 'Un buen servicio, Recomendado.'),
(5, 8, 1, 3, 'Excelente'),
(6, 9, 3, 5, 'Bienn'),
(7, 10, 2, 2, 'Arreglar el auto..'),
(8, 6, 1, 5, 'Gran conductor!!'),
(9, 6, 2, 4, 'Viaje seguro!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `error_3` bit(1) NOT NULL DEFAULT b'0',
  `confirmacion_viaje` bit(1) NOT NULL DEFAULT b'0',
  `confirmacion_pago` bit(1) NOT NULL DEFAULT b'0',
  `tendencia` bit(1) NOT NULL DEFAULT b'0',
  `oferta` bit(1) NOT NULL DEFAULT b'0',
  `novedades` bit(1) NOT NULL DEFAULT b'0',
  `eventos` bit(1) NOT NULL DEFAULT b'0',
  `actualizacion` bit(1) NOT NULL DEFAULT b'0',
  `noticias` bit(1) NOT NULL DEFAULT b'0',
  `dusuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `reserva_id` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `estado_pago` varchar(20) DEFAULT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `reserva_id`, `monto`, `metodo_pago`, `estado_pago`, `fecha_pago`) VALUES
(1, 1, 50.00, 'Tarjeta de crédito', 'Completado', '2024-02-20 14:00:00'),
(2, 2, 70.00, 'PayPal', 'Pendiente', '2024-02-21 15:00:00'),
(3, 3, 60.00, 'Efectivo', 'Completado', '2024-02-22 16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencias_usuarios`
--

CREATE TABLE `preferencias_usuarios` (
  `id_preferencia` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `preferencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preferencias_usuarios`
--

INSERT INTO `preferencias_usuarios` (`id_preferencia`, `usuario_id`, `preferencia`) VALUES
(1, 4, 'Asientos preferenciales'),
(2, 4, 'Viajes largos'),
(3, 4, 'Servicio de música');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `pasajero_id` int(11) DEFAULT NULL,
  `viaje_id` int(11) DEFAULT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado_reserva` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `pasajero_id`, `viaje_id`, `fecha_reserva`, `estado_reserva`) VALUES
(1, 3, 1, '2024-02-22 14:55:12', 'Confirmada'),
(2, 4, 1, '2024-02-22 14:55:12', 'Pendiente'),
(3, 5, 1, '2024-02-22 14:55:12', 'Confirmada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Cliente'),
(2, 'Conductor'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id_ubicacion`, `ubicacion`, `foto`) VALUES
(1, 'Todos', NULL),
(2, 'Amazonas - Chachapoyas', NULL),
(3, 'Amazonas - Bagua', NULL),
(4, 'Amazonas - Bongara', NULL),
(5, 'Amazonas - Condorcanqui', NULL),
(6, 'Amazonas - Luya', NULL),
(7, 'Amazonas - Rodríguez de Mendoza', NULL),
(8, 'Amazonas - Utcubamba', NULL),
(9, 'Áncash - Huaraz', NULL),
(10, 'Áncash - Aija', NULL),
(11, 'Áncash - Antonio Raimondi', NULL),
(12, 'Áncash - Asunción', NULL),
(13, 'Áncash - Bolognesi', NULL),
(14, 'Áncash - Carhuaz', NULL),
(15, 'Áncash - Carlos Fermín Fitzcarrald', NULL),
(16, 'Áncash - Casma', NULL),
(17, 'Áncash - Corongo', NULL),
(18, 'Áncash - Huari', NULL),
(19, 'Áncash - Huarmey', NULL),
(20, 'Áncash - Huaylas', NULL),
(21, 'Áncash - Mariscal Luzuriaga', NULL),
(22, 'Áncash - Ocros', NULL),
(23, 'Áncash - Pallasca', NULL),
(24, 'Áncash - Pomabamba', NULL),
(25, 'Áncash - Recuay', NULL),
(26, 'Áncash - Santa', NULL),
(27, 'Áncash - Sihuas', NULL),
(28, 'Áncash - Yungay', NULL),
(29, 'Apurímac - Abancay', NULL),
(30, 'Apurímac - Andahuaylas', NULL),
(31, 'Apurímac - Antabamba', NULL),
(32, 'Apurímac - Aymaraes', NULL),
(33, 'Apurímac - Cotabambas', NULL),
(34, 'Apurímac - Chincheros', NULL),
(35, 'Apurímac - Grau', NULL),
(36, 'Arequipa - Arequipa', NULL),
(37, 'Arequipa - Camaná', NULL),
(38, 'Arequipa - Caravelí', NULL),
(39, 'Arequipa - Castilla', NULL),
(40, 'Arequipa - Caylloma', NULL),
(41, 'Arequipa - Condesuyos', NULL),
(42, 'Arequipa - Islay', NULL),
(43, 'Arequipa - La Unión', NULL),
(44, 'Ayacucho - Huamanga', NULL),
(45, 'Ayacucho - Cangallo', NULL),
(46, 'Ayacucho - Huanca Sancos', NULL),
(47, 'Ayacucho - Huanta', NULL),
(48, 'Ayacucho - La Mar', NULL),
(49, 'Ayacucho - Lucanas', NULL),
(50, 'Ayacucho - Parinacochas', NULL),
(51, 'Ayacucho - Páucar del Sara Sara', NULL),
(52, 'Ayacucho - Sucre', NULL),
(53, 'Ayacucho - Víctor Fajardo', NULL),
(54, 'Ayacucho - Vilcashuamán', NULL),
(55, 'Cajamarca - Cajamarca', NULL),
(56, 'Cajamarca - Cajabamba', NULL),
(57, 'Cajamarca - Celendín', NULL),
(58, 'Cajamarca - Chota', NULL),
(59, 'Cajamarca - Contumazá', NULL),
(60, 'Cajamarca - Cutervo', NULL),
(61, 'Cajamarca - Hualgayoc', NULL),
(62, 'Cajamarca - Jaén', NULL),
(63, 'Cajamarca - San Ignacio', NULL),
(64, 'Cajamarca - San Marcos', NULL),
(65, 'Cajamarca - San Miguel', NULL),
(66, 'Cajamarca - San Pablo', NULL),
(67, 'Cajamarca - Santa Cruz', NULL),
(68, 'Callao - Callao', NULL),
(69, 'Cusco - Cuzco', NULL),
(70, 'Cusco - Acomayo', NULL),
(71, 'Cusco - Anta', NULL),
(72, 'Cusco - Calca', NULL),
(73, 'Cusco - Canas', NULL),
(74, 'Cusco - Canchis', NULL),
(75, 'Cusco - Chumbivilcas', NULL),
(76, 'Cusco - Espinar', NULL),
(77, 'Cusco - La Convención', NULL),
(78, 'Cusco - Paruro', NULL),
(79, 'Cusco - Paucartambo', NULL),
(80, 'Cusco - Quispicanchi', NULL),
(81, 'Cusco - Urubamba', NULL),
(82, 'Huancavelica - Huancavelica', NULL),
(83, 'Huancavelica - Acobamba', NULL),
(84, 'Huancavelica - Angaraes', NULL),
(85, 'Huancavelica - Castrovirreyna', NULL),
(86, 'Huancavelica - Churcampa', NULL),
(87, 'Huancavelica - Huaytará', NULL),
(88, 'Huancavelica - Tayacaja', NULL),
(89, 'Huanuco - Huánuco', NULL),
(90, 'Huanuco - Ambo', NULL),
(91, 'Huanuco - Dos de Mayo', NULL),
(92, 'Huanuco - Huacaybamba', NULL),
(93, 'Huanuco - Huamalíes', NULL),
(94, 'Huanuco - Leoncio Prado', NULL),
(95, 'Huanuco - Marañón', NULL),
(96, 'Huanuco - Pachitea', NULL),
(97, 'Huanuco - Puerto Inca', NULL),
(98, 'Huanuco - Lauricocha', NULL),
(99, 'Huanuco - Yarowilca', NULL),
(100, 'Ica - Ica', NULL),
(101, 'Ica - Chincha', NULL),
(102, 'ca - Nazca', NULL),
(103, 'Ica - Palpa', NULL),
(104, 'Ica - Pisco', NULL),
(105, 'Junín - Huancayo', NULL),
(106, 'Junín - Chanchamayo', NULL),
(107, 'Junín - Chupaca', NULL),
(108, 'Junín - Concepción', NULL),
(109, 'Junín - Jauja', NULL),
(110, 'Junín - Junín', NULL),
(111, 'Junín - Satipo', NULL),
(112, 'Junín - Tarma', NULL),
(113, 'Junín - Yauli', NULL),
(114, 'La Libertad - Trujillo', NULL),
(115, 'La Libertad - Ascope', NULL),
(116, 'La Libertad - Bolívar', NULL),
(117, 'La Libertad - Chepén', NULL),
(118, 'La Libertad - Gran Chimú', NULL),
(119, 'La Libertad - Julcán', NULL),
(120, 'La Libertad - Otuzco', NULL),
(121, 'La Libertad - Pacasmayo', NULL),
(122, 'La Libertad - Pataz', NULL),
(123, 'La Libertad - Sánchez Carrión', NULL),
(124, 'La Libertad - Santiago de Chuco', NULL),
(125, 'La Libertad - Virú', NULL),
(126, 'Lambayeque - Chiclayo', NULL),
(127, 'Lambayeque - Ferreñafe', NULL),
(128, 'Lambayeque - Lambayeque', NULL),
(129, 'Lima Metropolitana - Lima', NULL),
(130, 'Lima - Huaura', NULL),
(131, 'Lima - Barranca', NULL),
(132, 'Lima - Cajatambo', NULL),
(133, 'Lima - Canta', NULL),
(134, 'Lima - Cañete', NULL),
(135, 'Lima - Huaral', NULL),
(136, 'Lima - Huarochirí', NULL),
(137, 'Lima - Oyón', NULL),
(138, 'Lima - Yauyos', NULL),
(139, 'Loreto - Maynas', NULL),
(140, 'Loreto - Alto Amazonas', NULL),
(141, 'Loreto - Datem del Marañón', NULL),
(142, 'Loreto - Loreto', NULL),
(143, 'Loreto - Mariscal Ramón Castilla', NULL),
(144, 'Loreto - Putumayo', NULL),
(145, 'Loreto - Requena', NULL),
(146, 'Loreto - Ucayali', NULL),
(147, 'Madre de Dios - Tambopata', NULL),
(148, 'Madre de Dios - Manu', NULL),
(149, 'Madre de Dios - Tahuamanu', NULL),
(150, 'Moquegua - Mariscal Nieto', NULL),
(151, 'Moquegua - General Sánchez Cerro', NULL),
(152, 'Moquegua - Ilo', NULL),
(153, 'Pasco - Pasco', NULL),
(154, 'Pasco - Daniel Alcides Carrión', NULL),
(155, 'Pasco - Oxapampa', NULL),
(156, 'Piura - Piura', NULL),
(157, 'Piura - Ayabaca', NULL),
(158, 'Piura - Huancabamba', NULL),
(159, 'Piura - Morropón', NULL),
(160, 'Piura - Paita', NULL),
(161, 'Piura - Sechura', NULL),
(162, 'Piura - Sullana', NULL),
(163, 'Piura - Talara', NULL),
(164, 'Puno - Puno', NULL),
(165, 'Puno - Azángaro', NULL),
(166, 'Puno - Carabaya', NULL),
(167, 'Puno - Chucuito', NULL),
(168, 'Puno - El Collao', NULL),
(169, 'Puno - Huancané', NULL),
(170, 'Puno - Lampa', NULL),
(171, 'Puno - Melgar', NULL),
(172, 'Puno - Moho', NULL),
(173, 'Puno - San Antonio de Putina', NULL),
(174, 'Puno - San Román', NULL),
(175, 'Puno - Sandia', NULL),
(176, 'Puno - Yunguyo', NULL),
(177, 'San Martín - Moyobambav', NULL),
(178, 'San Martín - Bellavista', NULL),
(179, 'San Martín - El Dorado', NULL),
(180, 'San Martín - Huallaga', NULL),
(181, 'San Martín - Lamas', NULL),
(182, 'San Martín - Mariscal Cáceres', NULL),
(183, 'San Martín - Picota', NULL),
(184, 'San Martín - Rioja', NULL),
(185, 'San Martín - San Martín', NULL),
(186, 'San Martín - Tocache', NULL),
(187, 'Tacna - Tacna', NULL),
(188, 'Tacna - Candarave', NULL),
(189, 'Tacna - Jorge Basadre', NULL),
(190, 'Tacna - Tarata', NULL),
(191, 'Tumbes - Tumbes', NULL),
(192, 'Tumbes - Contralmirante Villar', NULL),
(193, 'Tumbes - Zarumilla', NULL),
(194, 'Ucayali - Coronel Portillo', NULL),
(195, 'Ucayali - Atalaya', NULL),
(196, 'Ucayali - Padre Abad', NULL),
(197, 'Ucayali - Purús', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `tipo_usuario_id` int(11) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `ubicacion_id` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `contraseña`, `tipo_usuario_id`, `foto_perfil`, `ubicacion_id`, `fecha_registro`) VALUES
(1, 'Antonio', 'Garcia', 'antonio@gmail.com', '$2y$10$DECaGCget0801TsnJ.bcR.Pnh/ZNRyp9b/SRL.wvXvRNlSSm3nSne', 1, 'img/clientes/antonio@gmail.com/perfil.jpg', 1, '2024-02-23 16:34:45'),
(2, 'Juan', 'Sanches', 'juan@hotmail.com', '$2y$10$51eQ4oR6F9hLxoGSMFh1S.AVEbU1V8JyG9n.zqFcN22qvjMugrBve', 1, 'img/clientes/juan@hotmail.com/perfil.jpg', 1, '2024-02-23 16:40:10'),
(3, 'Jesus', 'Fernandez', 'jesus@hotmail.com', '$2y$10$vDI5x258sR99qg.qiLtGEuoEjtsFnOFdiG5z7l8cvCUgppxdCsEE2', 1, 'img/clientes/jesus@hotmail.com/perfil.jpg', 1, '2024-02-23 16:51:50'),
(4, 'Jose', 'Martines', 'jose@hotmail.com', '$2y$10$W5H4VRN4qOj4qG3wb3nmv.T/Hb.NBo.nV0FL6ybH3PBd1EclIoQQC', 1, 'img/clientes/jose@hotmail.com/perfil.jpg', 1, '2024-02-23 16:37:18'),
(5, 'Diego', 'Chipana', 'diegochipana@gmail.com', '$2y$10$Vj5lRKRYt6MazapGpuBN0.knd6xgEVFtf96YevjN9epaCrIB0sNT2', 1, 'img/clientes/diegochipana@gmail.com/perfil.jpg', 1, '2024-02-22 16:15:16'),
(6, 'Edwin', 'Jayo', 'edwin@gmail.com', '$2y$10$jy6zTESCWJH6YaKxRHyB3.WviFu5hBRxH3KUkhyn0QGrekbpF2Nk.', 2, 'img/conductores/edwin@gmail.com/perfil.jpg', 1, '2024-02-22 16:33:38'),
(7, 'Pepito', 'Perez', 'pepito1@gmail.com', '$2y$10$VUIWmxoY1I/FY40kCRp7m.KMO3gZ/QLO0OJtfbCtinjALeolmsfFS', 2, 'img/conductores/pepito1@gmail.com/perfil.jpg', 1, '2024-02-23 06:30:57'),
(8, 'Alvaro', 'Ortis', 'alvaro@gmail.com', '$2y$10$UJzU0rlk/.QqqZpSGexBQ.2Koa5XBT0RLpxaFYaAmBaULzEsqgTvS', 2, 'img/conductores/alvaro@gmail.com/perfil.jpg', 1, '2024-02-23 16:56:34'),
(9, 'Andres', 'Cano', 'andres@gmail.com', '$2y$10$3yAxfBLWRsF7B7ROYIvw2OH./E0Q1blwsdw/iPhGW7Jc6Lb379zlG', 2, 'img/conductores/andres@gmail.com/perfil.jpg', 1, '2024-02-23 16:56:03'),
(10, 'Juan Jose', 'Rubio', 'juanjose@gmail.com', '$2y$10$FOyUpcellFmg8DX1y0c8Cu/bkFejxH0zeude4Rc9GKIHhlECRmPDi', 2, 'img/conductores/juanjose@gmail.com/perfil.jpg', 1, '2024-02-23 16:55:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `capacidad_pasajeros` int(11) DEFAULT NULL,
  `foto_vehiculo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `conductor_id`, `marca`, `modelo`, `año`, `capacidad_pasajeros`, `foto_vehiculo`) VALUES
(1, 6, 'Toyota', 'Corolla', 2018, 4, 'img/conductores/edwin@gmail.com/micoche.jpg'),
(2, 8, 'Hyundai', 'Tucson', 2019, 6, 'img/conductores/alvaro@gmail.com/micoche.jpg'),
(3, 7, 'Kia', 'Sportage', 2020, 5, 'img/conductores/pepito1@gmail.com/micoche.jpg'),
(4, 9, 'Toyota', 'Hilux', 2020, 6, 'img/conductores/andres@gmail.com/micoche.jpg'),
(5, 10, 'Toyota', 'Hilux', 2018, 5, 'img/conductores/juanjose@gmail.com/micoche.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id_viaje` int(11) NOT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  `origen_id` int(11) DEFAULT NULL,
  `destino_id` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `plazas_disponibles` int(11) DEFAULT NULL,
  `fecha_salida` varchar(15) NOT NULL,
  `hora` time NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id_viaje`, `conductor_id`, `origen_id`, `destino_id`, `precio`, `plazas_disponibles`, `fecha_salida`, `hora`, `estado`) VALUES
(1, 6, 44, 47, 50.00, 10, '19/02/2024', '15:00:00', 0),
(2, 6, 47, 44, 70.00, 8, '08/03/2024', '20:00:00', 0),
(3, 7, 3, 2, 60.00, 12, '19/03/2024', '11:00:00', 0),
(4, 8, 30, 31, 80.00, 3, '23/03/2024', '05:00:00', 0),
(5, 9, 66, 67, 60.00, 3, '22/03/2024', '08:00:00', 0),
(6, 10, 70, 71, 100.00, 2, '16/03/2024', '17:00:00', 0),
(7, 6, 47, 68, 100.00, 3, '09/03/2024', '04:00:00', 0),
(8, 8, 45, 46, 15.00, 4, '21/03/2024', '09:00:00', 1),
(9, 9, 50, 47, 12.00, 5, '21/03/2024', '13:00:00', 1),
(10, 10, 44, 49, 15.00, 5, '21/03/2024', '11:00:00', 1),
(11, 6, 44, 47, 10.00, 5, '20/03/2024', '10:00:00', 1),
(12, 6, 53, 47, 50.00, 6, '20/03/2024', '12:00:00', 1),
(13, 6, 48, 44, 60.00, 5, '26/03/2024', '14:00:00', 1),
(14, 7, 48, 53, 60.00, 3, '21/03/2024', '13:00:00', 1),
(15, 7, 54, 53, 15.00, 4, '19/03/2024', '20:00:00', 1),
(16, 7, 52, 51, 12.00, 3, '21/03/2024', '14:00:00', 1),
(17, 9, 45, 46, 20.00, 2, '23/03/2024', '05:00:00', 1),
(18, 8, 48, 53, 12.00, 5, '21/03/2024', '14:00:00', 1),
(19, 6, 47, 48, 16.00, 4, '23/03/2024', '05:00:00', 1),
(20, 7, 48, 44, 12.00, 5, '21/03/2024', '10:00:00', 1),
(21, 9, 50, 48, 20.00, 3, '23/03/2024', '20:00:00', 1),
(22, 7, 48, 44, 20.00, 5, '30/03/2024', '10:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones_conductores`
--
ALTER TABLE `calificaciones_conductores`
  ADD PRIMARY KEY (`id_calificacion_conductor`),
  ADD KEY `conductor_id` (`conductor_id`),
  ADD KEY `pasajero_id` (`pasajero_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dusuario_id` (`dusuario_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `reserva_id` (`reserva_id`);

--
-- Indices de la tabla `preferencias_usuarios`
--
ALTER TABLE `preferencias_usuarios`
  ADD PRIMARY KEY (`id_preferencia`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `pasajero_id` (`pasajero_id`),
  ADD KEY `viaje_id` (`viaje_id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipo_usuario_id` (`tipo_usuario_id`),
  ADD KEY `ubicacion_id` (`ubicacion_id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `conductor_id` (`conductor_id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `conductor_id` (`conductor_id`),
  ADD KEY `origen_id` (`origen_id`),
  ADD KEY `destino_id` (`destino_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones_conductores`
--
ALTER TABLE `calificaciones_conductores`
  MODIFY `id_calificacion_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `preferencias_usuarios`
--
ALTER TABLE `preferencias_usuarios`
  MODIFY `id_preferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones_conductores`
--
ALTER TABLE `calificaciones_conductores`
  ADD CONSTRAINT `calificaciones_conductores_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `calificaciones_conductores_ibfk_2` FOREIGN KEY (`pasajero_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`dusuario_id`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id_reserva`);

--
-- Filtros para la tabla `preferencias_usuarios`
--
ALTER TABLE `preferencias_usuarios`
  ADD CONSTRAINT `preferencias_usuarios_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`pasajero_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`viaje_id`) REFERENCES `viajes` (`id_viaje`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipos_usuario` (`id_tipo_usuario`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id_ubicacion`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`conductor_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `viajes_ibfk_2` FOREIGN KEY (`origen_id`) REFERENCES `ubicaciones` (`id_ubicacion`),
  ADD CONSTRAINT `viajes_ibfk_3` FOREIGN KEY (`destino_id`) REFERENCES `ubicaciones` (`id_ubicacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
