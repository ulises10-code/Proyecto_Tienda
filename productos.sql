-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2021 a las 22:49:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--
CREATE DATABASE productos;

USE PRODUCTOS;

CREATE TABLE `inventario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Categoria` varchar(20) NOT NULL,
  `Proveedor` varchar(30) NOT NULL,
  `existencia` decimal(5,2) NOT NULL,
  `Valor_pieza` float NOT NULL,
  `Valor_venta` float NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Fecha_alta` datetime NOT NULL,
  `codigo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `Nombre`, `Categoria`, `Proveedor`, `existencia`, `Valor_pieza`, `Valor_venta`, `Estado`, `Fecha_alta`, `codigo`) VALUES
(1, 'Papas', 'Frituras', 'Sabritas', '0.00', 9, 12, 'Activo', '2021-11-08 17:48:17', '1'),
(2, 'Coca-cola', 'Refrescos', 'Coca-cola', '98.00', 8.5, 11.98, 'Activo', '2021-11-08 17:48:17', '2'),
(3, 'Chicles de menta', 'Basicos', 'Clorets', '99.00', 10.2, 12.5, 'Activo', '2021-11-08 17:50:35', '3'),
(4, 'Agua ', 'Refrescos', 'Bonafont', '100.00', 8, 10, 'Activo', '2021-11-08 17:50:35', '4'),
(5, 'chocolate ferrero', 'dulceria', 'Nestle', '98.00', 16.98, 19.5, 'activo', '2021-11-08 17:56:24', '5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
