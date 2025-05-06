-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2022 a las 06:28:52
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adminltmvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(50) NOT NULL,
  `nom_rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `nom_rol`) VALUES
(1, 'administrador'),
(2, 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(50) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `nombre` text NOT NULL,
  `foto` text NOT NULL,
  `rol` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `foto`, `rol`) VALUES
(1, 'alberto', '$2a$07$asxx54ahjppf45sd87a5auCB3.U479QLTzpsXYjH4wZ2mbEUSAQnK', 'alberto55', 'vistas/imagenes/usuarios/330.jpg', 2),
(5, 'orlando', '$2a$07$asxx54ahjppf45sd87a5aux5d0wHw1l61BG1nzYdVJZ08wQP22uLa', 'orlando1233', 'vistas/imagenes/usuarios/908.jpg', 1),
(6, 'orlando1233', '$2a$07$asxx54ahjppf45sd87a5auKiaAoJPnfoGc9FG/L5tjYJKdA.BKpwS', 'orlando', 'vistas/imagenes/usuarios/591.jpg', 2),
(7, 'orlando1233', '$2a$07$asxx54ahjppf45sd87a5auKiaAoJPnfoGc9FG/L5tjYJKdA.BKpwS', 'orlando', 'vistas/imagenes/usuarios/641.jpg', 2),
(8, 'orlando', '$2a$07$asxx54ahjppf45sd87a5aukBwT04adxIGEPZ437tdF5t14jiHV1H6', 'orlando1233', 'vistas/imagenes/usuarios/787.jpg', 2),
(9, 'luis', '$2a$07$asxx54ahjppf45sd87a5au0IqTdizNTjnNV.ozUYm76NeUiHagoiG', 'orlando', 'vistas/imagenes/usuarios/670.jpg', 2),
(10, 'luis', '$2a$07$asxx54ahjppf45sd87a5au0IqTdizNTjnNV.ozUYm76NeUiHagoiG', 'orlando', 'vistas/imagenes/usuarios/123.jpg', 2),
(11, 'dueño123', '$2a$07$asxx54ahjppf45sd87a5aumawKBqkKu/t5yVn5oVpbu8.I0unXqba', 'lus', 'vistas/imagenes/usuarios/326.jpg', 2),
(12, 'luis133', '$2a$07$asxx54ahjppf45sd87a5auPnqLKkSAek/Wlo55L7n0xXvKi7NbZTq', 'lus', 'vistas/imagenes/usuarios/756.jpg', 2),
(13, 'luis', '$2a$07$asxx54ahjppf45sd87a5auQweTka/8YDr/iG4aG9y9Sir.tlcSJ5a', 'lus', 'vistas/imagenes/usuarios/151.png', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
