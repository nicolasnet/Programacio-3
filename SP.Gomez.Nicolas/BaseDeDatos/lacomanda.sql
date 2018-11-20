-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 00:31:48
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lacomanda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `kilometros` bigint(20) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `marca`, `modelo`, `kilometros`, `user`, `fecha`) VALUES
(001, 'BMW', '328i', 20000, 'Mario', '0000-00-00 00:00:00'),
(002, 'BMW', '328i', 20000, 'Mario', '2018-10-20 00:00:00'),
(003, 'BMW', '328i', 20000, 'Mario', '2018-10-20 00:00:00'),
(004, 'BMW', '328i', 20000, 'Mario', '0000-00-00 00:00:00'),
(005, 'BMW', '328i', 20000, 'Mario', '2018-11-20 19:35:48'),
(006, 'BMW', '328i', 20000, 'Mario', '2018-11-20 19:37:51'),
(007, 'BMW', '328i', 20000, 'Mario', '2018-11-20 19:41:50'),
(008, 'BMW', '328i', 20000, 'Mario', '2018-11-20 19:42:16'),
(009, 'BMW', '328i', 20000, 'Admin', '2018-11-20 19:42:48'),
(010, 'BMW', '328i', 20000, 'Mario', '2018-11-20 19:43:13'),
(011, 'AUDI', 'S4', 20000, 'Admin', '2018-11-20 19:45:06'),
(012, 'Peugeot', '207', 50000, 'Admin', '2018-11-20 20:20:59'),
(013, 'Citroen', 'C3', 50000, 'Admin', '2018-11-20 20:25:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ingresos`
--

CREATE TABLE `datos_ingresos` (
  `id` bigint(20) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ruta` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `metodo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `datos_ingresos`
--

INSERT INTO `datos_ingresos` (`id`, `usuario`, `ruta`, `metodo`, `fecha`) VALUES
(1, 'nicolas', '/usuario', 'post', '2018-11-19 12:59:37'),
(2, 'prueba', 'prueba', 'prueba', '2018-11-19 15:01:09'),
(3, 'Admin', 'usuario/', 'post', '2018-11-19 15:51:20'),
(4, 'Admin', 'usuario/', 'post', '2018-11-19 15:56:11'),
(5, 'Admin', 'usuario/', 'post', '2018-11-19 16:01:29'),
(6, 'Admin', 'usuario/', 'post', '2018-11-19 16:09:39'),
(7, 'Admin', 'usuario/', 'get', '2018-11-19 16:11:13'),
(8, 'MOZ_PEREZ.PEPE', 'usuario/', 'get', '2018-11-19 16:15:12'),
(9, 'MOZ_PEREZ.PEPE', 'usuario/', 'post', '2018-11-19 16:15:23'),
(10, 'Admin', 'usuario/', 'get', '2018-11-20 18:37:05'),
(11, 'Admin', 'usuario/', 'post', '2018-11-20 18:50:52'),
(12, 'Admin', 'usuario/', 'post', '2018-11-20 18:51:11'),
(13, 'Admin', 'usuario/', 'post', '2018-11-20 18:51:58'),
(14, 'Admin', 'usuario/', 'post', '2018-11-20 18:52:49'),
(15, 'Usuario no logueado', 'usuario/', 'post', '2018-11-20 19:08:52'),
(16, 'Admin', 'usuario/', 'post', '2018-11-20 19:09:11'),
(17, 'Admin', 'usuario/', 'post', '2018-11-20 19:09:39'),
(18, 'Admin', 'usuario/', 'post', '2018-11-20 19:10:06'),
(19, 'Admin', 'usuario/', 'post', '2018-11-20 19:10:30'),
(20, 'Admin', 'usuario/', 'post', '2018-11-20 19:10:54'),
(21, 'Admin', 'usuario/', 'post', '2018-11-20 19:11:04'),
(22, 'Admin', 'usuario/', 'post', '2018-11-20 19:15:52'),
(23, 'Admin', 'usuario/', 'post', '2018-11-20 19:15:54'),
(24, 'Admin', 'usuario/', 'get', '2018-11-20 19:19:01'),
(25, 'Admin', 'usuario/', 'get', '2018-11-20 19:20:25'),
(26, 'Mario', 'usuario/', 'get', '2018-11-20 19:20:55'),
(27, 'Mario', 'Compra/', 'post', '2018-11-20 19:32:59'),
(28, 'Mario', 'Compra/', 'post', '2018-11-20 19:33:31'),
(29, 'Mario', 'Compra/', 'post', '2018-11-20 19:33:49'),
(30, 'Mario', 'Compra/', 'post', '2018-11-20 19:33:59'),
(31, 'Mario', 'Compra/', 'post', '2018-11-20 19:34:52'),
(32, 'Mario', 'Compra/', 'post', '2018-11-20 19:35:06'),
(33, 'Mario', 'Compra/', 'post', '2018-11-20 19:35:23'),
(34, 'Mario', 'Compra/', 'post', '2018-11-20 19:35:48'),
(35, 'Mario', 'Compra/', 'post', '2018-11-20 19:37:51'),
(36, 'Usuario no logueado', 'Compra/', 'post', '2018-11-20 19:37:58'),
(37, 'Usuario no logueado', 'Compra/', 'post', '2018-11-20 19:38:04'),
(38, 'Usuario no logueado', 'Compra/', 'post', '2018-11-20 19:38:09'),
(39, 'Mario', 'usuario/', 'get', '2018-11-20 19:38:53'),
(40, 'Admin', 'usuario/', 'get', '2018-11-20 19:39:11'),
(41, 'Mario', 'usuario/', 'get', '2018-11-20 19:39:15'),
(42, 'Mario', 'Compra/', 'post', '2018-11-20 19:41:50'),
(43, 'Mario', 'Compra/', 'post', '2018-11-20 19:42:16'),
(44, 'Admin', 'Compra/', 'post', '2018-11-20 19:42:48'),
(45, 'Mario', 'Compra/', 'post', '2018-11-20 19:43:13'),
(46, 'Mario', 'usuario/', 'get', '2018-11-20 19:44:48'),
(47, 'Admin', 'usuario/', 'get', '2018-11-20 19:44:52'),
(48, 'Usuario no logueado', 'usuario/', 'get', '2018-11-20 19:44:57'),
(49, 'Admin', 'Compra/', 'post', '2018-11-20 19:45:06'),
(50, 'Admin', 'Compra/', 'get', '2018-11-20 19:49:20'),
(51, 'Mario', 'Compra/', 'get', '2018-11-20 19:49:49'),
(52, 'Mario', 'Compra/', 'get', '2018-11-20 19:50:31'),
(53, 'Mario', 'Compra/', 'get', '2018-11-20 19:50:58'),
(54, 'Admin', 'Compra/', 'get', '2018-11-20 19:51:12'),
(55, 'Usuario no logueado', 'Compra/marca', 'get', '2018-11-20 19:53:05'),
(56, 'Admin', 'Compra/marca', 'get', '2018-11-20 19:53:29'),
(57, 'Admin', 'Compra/marca', 'get', '2018-11-20 19:53:46'),
(58, 'Mario', 'Compra/marca', 'get', '2018-11-20 19:54:02'),
(59, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:01:36'),
(60, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:01:59'),
(61, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:02:05'),
(62, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:02:41'),
(63, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:02:45'),
(64, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:06:11'),
(65, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:06:23'),
(66, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:06:25'),
(67, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:06:26'),
(68, 'Usuario no logueado', 'hora/', 'get', '2018-11-20 20:12:08'),
(69, 'Mario', 'hora/', 'get', '2018-11-20 20:12:31'),
(70, 'Mario', 'hora/', 'get', '2018-11-20 20:12:33'),
(71, 'Mario', 'hora/', 'get', '2018-11-20 20:12:34'),
(72, 'Mario', 'hora/', 'get', '2018-11-20 20:12:37'),
(73, 'Mario', 'hora/', 'get', '2018-11-20 20:12:38'),
(74, 'Mario', 'hora/', 'get', '2018-11-20 20:12:39'),
(75, 'Mario', 'hora/', 'get', '2018-11-20 20:12:40'),
(76, 'Mario', 'hora/', 'get', '2018-11-20 20:12:40'),
(77, 'Mario', 'hora/', 'get', '2018-11-20 20:12:41'),
(78, 'Admin', 'Compra/', 'get', '2018-11-20 20:14:24'),
(79, 'Mario', 'Compra/', 'get', '2018-11-20 20:14:32'),
(80, 'Admin', 'Compra/', 'get', '2018-11-20 20:14:42'),
(81, 'Mario', 'Compra/marca', 'get', '2018-11-20 20:14:58'),
(82, 'Admin', 'Compra/marca', 'get', '2018-11-20 20:15:04'),
(83, 'Admin', 'Compra/marca', 'get', '2018-11-20 20:15:20'),
(84, 'Mario', 'hora/', 'get', '2018-11-20 20:15:53'),
(85, 'Mario', 'hora/', 'get', '2018-11-20 20:15:55'),
(86, 'Mario', 'hora/', 'get', '2018-11-20 20:15:56'),
(87, 'Mario', 'hora/', 'get', '2018-11-20 20:15:57'),
(88, 'Mario', 'hora/', 'get', '2018-11-20 20:15:59'),
(89, 'Mario', 'hora/', 'get', '2018-11-20 20:15:59'),
(90, 'Admin', 'Compra/', 'post', '2018-11-20 20:20:59'),
(91, 'Usuario no logueado', 'productos/', 'get', '2018-11-20 20:23:25'),
(92, 'Admin', 'Compra/', 'post', '2018-11-20 20:25:33'),
(93, 'Usuario no logueado', 'productos/', 'get', '2018-11-20 20:25:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `producto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sector` enum('cocina','barra','cerveza','candy') COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `prefijo` varchar(2) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'ME',
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `estado` enum('cerrada','con clientes esperando pedido','con clientes comiendo','con clientes pagando') COLLATE utf8_spanish2_ci NOT NULL,
  `limpia` enum('true','false') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`prefijo`, `id`, `estado`, `limpia`) VALUES
('ME', 001, 'cerrada', 'true'),
('ME', 002, 'cerrada', 'true'),
('ME', 003, 'cerrada', 'true'),
('ME', 004, 'cerrada', 'true'),
('ME', 005, 'cerrada', 'true'),
('ME', 006, 'cerrada', 'true'),
('ME', 007, 'cerrada', 'true'),
('ME', 008, 'cerrada', 'true'),
('ME', 009, 'cerrada', 'true'),
('ME', 010, 'cerrada', 'true');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` enum('empleado','admin','','') COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `tipo`, `clave`) VALUES
(001, 'Admin', 'admin', '123'),
(002, 'MOZ_PEREZ.PEPE', 'empleado', '123'),
(003, 'COC_DOMINGUEZ.JOSE', 'empleado', '456'),
(004, 'BAR_COMELLI.MICA', 'empleado', '456'),
(005, 'CER_MENDEZ.AGUS', 'empleado', '456'),
(006, 'Nuevo', 'empleado', '789'),
(007, 'otro', 'admin', '789'),
(008, 'elotronuevo', 'empleado', '789'),
(009, 'Elotronuevo23', 'empleado', '789'),
(010, 'Oootro', '', '123'),
(012, 'Pepeiiye', 'empleado', '123'),
(013, 'Mario', 'empleado', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_ingresos`
--
ALTER TABLE `datos_ingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `datos_ingresos`
--
ALTER TABLE `datos_ingresos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
