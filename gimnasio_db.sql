-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2024 a las 17:58:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla cliente
--

INSERT INTO `cliente` (`id`, `nombre`, `email`, `contraseña`, `rol`) VALUES
(1, 'admin', 'webadmin@gmail.com', '$2y$10$/Q9UfoEoQafhi0r.mZ1MZ.CkeFQqUr/Dg1FT6MUnSM0kNZqlsMLCO', 'admin'),
(2, 'Patricio', 'patri@gmail.com', '$2y$10$4o/UXKIvFQjsX90oN08IeeO0DteWsd.2/Ayse18Vs9AUpN/aNYhue', 'cliente'),
(3, 'Marco', 'marco@gmail.com', '$2y$10$OMg1h19GwZ.NYkDwEj3ySO1IzsMS9r50zfCQwGLlwChcctHIsTMr2', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id` int(11) NOT NULL,
  `nombre_ejercicio` varchar(45) NOT NULL,
  `musculo_implicado` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `series` int(10) NOT NULL,
  `repeticiones` int(30) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

INSERT INTO `ejercicio` (`id`, `nombre_ejercicio`, `musculo_implicado`, `descripcion`, `series`, `repeticiones`, `cliente_id`) VALUES
(1, 'Sentadilla', 'Cuadriceps', 'Con la barra cargada en los hombros, realizar una flexión de rodillas donde los gluteos casi toquen los tobillos, luego volver a extensión.', 3, 8, 2),
(2, 'Remo acostado', 'Espalda', 'Recostado boca abajo sobre un banco elevado, llevar la barra al pecho flexionando los codos, intentando que el movimiento sea lo más recto posible.', 4, 6, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
