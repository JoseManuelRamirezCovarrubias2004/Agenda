-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2025 a las 10:03:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agendac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idUsuarioP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `direccion`, `telefono`, `email`, `idUsuarioP`) VALUES
(1, 'Victor', 'Orizaba', '123456789', 'victor@gmail.com', '2'),
(2, 'Maria', 'Orizaba', '234567891', 'maria@gmail.com', '3'),
(3, 'Pedro', 'Orizaba', '345678912', 'pedro@gmail.com', '3'),
(4, 'Samantha', 'Orizaba', '456789123', 'samantha@gmail.com', '2'),
(5, 'Diana', 'Cordoba', '6789123456', 'diana@gmail.com', '2'),
(6, 'Beto', 'Rio Blanco', '789123456', 'beto@gmail.com', '3'),
(7, 'Emmanuel', 'Orizaba', '891234567', 'emmanuel@gmail.com', '3'),
(20, 'Leticia', 'Cordoba', '321654987', 'lety@gmail.com', '1'),
(21, 'Odilon', 'Cordoba', '789456123', 'odi@gmail.com', '1'),
(22, 'Fernanda', 'Cordoba', '4567891230', 'fernanda@gmail.com', '1'),
(23, 'Lalo', 'Puebla', '569874123', 'lalo@gmail.com', '1'),
(24, 'Salamanca', 'Orizaba', '456987231', 'salamanca@gmail.com', '1'),
(26, 'Hugooo', 'Cordobaa', '4875989521', 'hugo@gmail.com', '2'),
(28, 'lalo', 'ori', '45698711230', 'lalo@gmail.com', '1'),
(30, 'irvinnn', 'orizaba', '75165848469', 'irvin@gmail.com', '1'),
(33, 'victorrr', 'yanga', '12589764831', 'victorrr@gmail.com', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL COMMENT '1 = Administrador, 2 = Visualizador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'Manolo', 'manolo123', 1),
(2, 'Mafer ', 'mafer123', 2),
(3, 'Kevin', 'kevin123', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
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
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
