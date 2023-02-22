-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2023 a las 16:00:52
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mecanica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_Cotizacion` int(11) NOT NULL,
  `id_reparacion` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_Cotizacion`, `id_reparacion`, `Fecha`, `Estado`) VALUES
(29, 15, '2023-02-20 14:50:16', 'Aprobado'),
(30, 10, '2023-02-20 15:25:47', 'Aprobado'),
(31, 11, '2023-02-20 19:27:45', 'Aprobado'),
(32, 16, '2023-02-20 21:32:02', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion`
--

CREATE TABLE `detalle_cotizacion` (
  `id_colmna_cotizacion` int(11) NOT NULL,
  `cotizacion` int(11) NOT NULL,
  `producto` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cotizacion`
--

INSERT INTO `detalle_cotizacion` (`id_colmna_cotizacion`, `cotizacion`, `producto`, `cantidad`, `precio`, `Estado`) VALUES
(13, 29, 'Costos por la reparacion hacia el equipo designado', 1, '4500.00', 'Pendiente De Envio'),
(14, 29, 'Sistema De Injeccion de gasolina Repuesto', 1, '5000.00', 'Pendiente De Envio'),
(15, 29, 'Refacciones ', 1, '0.00', 'Pendiente De Envio'),
(16, 30, 'Refacciones de la parte frontal del vehiculo', 1, '4500.00', 'Pendiente De Envio'),
(17, 30, 'Costo por cambio y mantenimiento de refacciones', 1, '3000.00', 'Pendiente De Envio'),
(18, 31, '123', 1, '123.00', 'Pendiente De Envio'),
(19, 31, 'Producto2', 1, '15000.00', 'Pendiente De Envio'),
(20, 32, 'Tapa de la cajuela ', 1, '2500.00', 'Pendiente De Envio'),
(21, 32, 'Faros Posteriores ', 2, '800.00', 'Pendiente De Envio'),
(22, 32, 'Costos por instalacion y mantenimiento', 1, '400.00', 'Pendiente De Envio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dettallereparacion`
--

CREATE TABLE `dettallereparacion` (
  `id_detalle` int(11) NOT NULL,
  `id_reparacion` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `Titulo` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ID_PROD_PRODUCTO` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dettallereparacion`
--

INSERT INTO `dettallereparacion` (`id_detalle`, `id_reparacion`, `descripcion`, `imagen`, `Titulo`, `precio`, `ID_PROD_PRODUCTO`, `Fecha`) VALUES
(7, 10, 'El Vehiculo Tiene Toda La Parte Frontal Dañada', '', 'Inspeccion', '0.00', 0, '2023-02-20 15:18:59'),
(8, 11, 'Se Encontro Partes Del Motor Dentro de los pistones', '', 'Inspección', '0.00', 0, '2023-02-20 19:27:40'),
(9, 16, 'Se Deetermino que necesita refacciones de la parte posterior tanto como la tapa de la cajuela y los faros', '', 'Inspeccion', '0.00', 0, '2023-02-20 21:31:56'),
(14, 16, 'El Cliente Dio Conformidad Para La Reparacion Y el Costo estimado de la reparacion', '', 'Aceptacion De Cotizacion', '0.00', 0, '2023-02-21 19:54:57'),
(15, 10, 'El Cliente Dio Conformidad Para La Reparacion Y el Costo estimado de la reparacion', '', 'Aceptacion De Cotizacion', '0.00', 0, '2023-02-21 20:20:30'),
(16, 11, 'El Cliente Dio Conformidad Para La Reparacion Y el Costo estimado de la reparacion', '', 'Aceptacion De Cotizacion', '0.00', 0, '2023-02-21 20:35:27'),
(17, 15, 'El Cliente Dio Conformidad Para La Reparacion Y el Costo estimado de la reparacion', '', 'Aceptacion De Cotizacion', '0.00', 0, '2023-02-21 20:35:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupomecanico`
--

CREATE TABLE `grupomecanico` (
  `id_grupo` int(11) NOT NULL,
  `Nombregrupo` varchar(50) NOT NULL,
  `Detallesgrupo` text NOT NULL,
  `Foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupomecanico`
--

INSERT INTO `grupomecanico` (`id_grupo`, `Nombregrupo`, `Detallesgrupo`, `Foto`) VALUES
(1, 'Servi Motos', 'Especialistas en motosicletas y todo tipo de motor de motos', '1.jpg'),
(2, 'Élite Del Auto', 'Especialistas en todo tipo de autos', '2.jpg'),
(3, 'Ingenieros Mecánico', 'Especialistas en defectos y desperfectos complejos', '3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombre`, `descripcion`, `precio`, `foto`) VALUES
(1, '[value-2]', '[value-3]', '0.00', ''),
(2, '[value-2]', '[value-3]', '0.00', ''),
(3, '[value-2]', '[value-3]', '0.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id_reparacion` int(11) NOT NULL,
  `id_vehiculo` varchar(50) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `ingreso` datetime NOT NULL,
  `salida` datetime NOT NULL,
  `des` text NOT NULL,
  `Equipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id_reparacion`, `id_vehiculo`, `estado`, `ingreso`, `salida`, `des`, `Equipo`) VALUES
(10, 'CPH-1234', 'En Reparacion', '2023-02-20 14:06:48', '0000-00-00 00:00:00', 'Ingreso con la parte fontral abollada', '3'),
(11, 'AHP-1234', 'En Reparacion', '2023-02-20 14:07:54', '0000-00-00 00:00:00', 'Ingreso por sonidos en el motor', '3'),
(12, 'WHC-123', 'Sin Asignacion', '2023-02-20 14:10:53', '0000-00-00 00:00:00', 'Infreso por defectos al momento de  el frenado', ''),
(15, 'CPQ-123', 'Cotizacion Aprobada', '2023-02-20 14:21:36', '0000-00-00 00:00:00', 'Ingreso por perdida de torque cuando esta en subidas', '3'),
(16, 'ALPQ-123', 'Cotizacion Aprobada', '2023-02-20 21:30:47', '0000-00-00 00:00:00', 'Ingreso por detalles el la parte posterior del vehiculo (Choque)', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `Dni` varchar(255) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `fecharegistro` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `Departamento` varchar(255) NOT NULL,
  `rango` varchar(45) NOT NULL,
  `Equipo` varchar(32) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `nombre`, `apellido`, `Dni`, `roll`, `fecharegistro`, `direccion`, `Departamento`, `rango`, `Equipo`, `foto`) VALUES
(12345, '123@gmail.com', 'a', 'a', '$2y$10$KHtIvL6CVfLwnv0RKfkQE.xTckJrUZp7R2b6BWHYEXFjYdvy5fsX.', 'Cliente', '0000-00-00', 'av ressurrecion s/n', '3', '', '', ''),
(12121213, '542154@gmail.com', 'hola', 'prueba', '$2y$10$q19aPZE0tkz8kQ0vPTJf4OmzxYQFULoktdUhnMSpyV4mTnxVBAFBG', 'Mecanico', '2023-03-08', 'Av ressurrecion s/n', '', '1', '2', '12121213.jpg'),
(12343211, 'prueba@gmail.com', 'pruebaimagen', 'Zuñiga', '$2y$10$4Ws.wUBKgaWDk0K.Q9V4TOBnvoNEdoDmWgzG8rDPD4LRbgzswXIGK', 'Mecanico', '2023-02-13', 'Av ressurrecion s/n', '', '1', '1', '12343211.jpg'),
(40097514, 'juliaz@gmail.com', 'Julia Zuñiga', 'Martinez', '$2y$10$oezVOf/PCOWrByfwsyoiQ.b0NLlEcRKv1FAwUp0MSiS163pSSiqB.', 'Cliente', '2013-01-23', 'Av Resurreccion s/n Andahuaylas', '3', '', '', ''),
(70419828, 'atonya67@gmail.com', 'Antony Edgar', 'Zuñiga', '$2y$10$/b5JLPAB5o4yE1xZhlEojuI51eR5zOJXoKG/CJl0FPTc5ZvaoQ1LW', 'administrador', '2023-01-13', 'Av ressurrecion s/n', '3', '', '', ''),
(70420559, 'adrielmarcelo558@gmail.com', 'Marcelo', 'Cardenas ILizarbe', '$2y$10$vcVa7xhFF5pIUdTAnCFIE.smT.RcOqUbsIaV.9dQeoHfrXlo3JBcy', 'Cliente', '2023-02-20', 'cuncataca', '', '', '', ''),
(73582751, 'estela@gmail.com', 'Esthefanny ', 'Ayma Delgado', '$2y$10$1mdiKDM5B189YfZuKk1H1O1z5ZxSwUtBt3kXbyLe20GmhRHCLSkaC', 'Mecanico', '2023-01-13', 'Av ressurrecion s/n', '', '1', '3', '12343211.jpg'),
(2147483647, 'fredthiago@ariosperu.com', 'ARIOS PERU SAC', '', '$2y$10$p4GQwUecCsgiJSh8M2i/9eMXz./2xF3wv7a9DV7gm6Ko2JT2ldLzG', 'Empresa', '2023-01-24', 'JR constitucion s/n', '3', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `Placa_vehiculo` varchar(40) NOT NULL,
  `Modelo` varchar(255) NOT NULL,
  `Detalles` text NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `dni`, `Placa_vehiculo`, `Modelo`, `Detalles`, `Tipo`, `Imagen`) VALUES
(55, 70419828, 'CPH-1234', 'Toyota Yaris 2018-2019', 'Ingreso con la parte fontral abollada', 4, 'CPH-1234.jpg'),
(56, 73582751, 'AHP-1234', 'Hyundai Accent 2018-2019', 'Ingreso por sonidos en el motor', 3, 'AHP-1234.jpg'),
(57, 40097514, 'WHC-123', 'TOYOTA HYLUX 2012-2013', 'Infreso por defectos al momento de  el frenado', 3, 'WHC-123.jpg'),
(60, 73582751, 'CPQ-123', 'Volvo  FH-440', 'Ingreso por perdida de torque cuando esta en subidas', 2, 'CPQ-123.jpg'),
(61, 70420559, 'ALPQ-123', 'Toyota Corolla 2018-2019', 'Ingreso por detalles el la parte posterior del vehiculo (Choque)', 4, 'ALPQ-123.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_Cotizacion`);

--
-- Indices de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD PRIMARY KEY (`id_colmna_cotizacion`);

--
-- Indices de la tabla `dettallereparacion`
--
ALTER TABLE `dettallereparacion`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `grupomecanico`
--
ALTER TABLE `grupomecanico`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id_reparacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD UNIQUE KEY `Placa_vehiculo` (`Placa_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_Cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  MODIFY `id_colmna_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `dettallereparacion`
--
ALTER TABLE `dettallereparacion`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `grupomecanico`
--
ALTER TABLE `grupomecanico`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id_reparacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
