-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2020 a las 09:39:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicaCRUD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campoFabricante`
--

CREATE TABLE `campoFabricante` (
  `id_fabricante` int(3) NOT NULL,
  `nombre_fab` varchar(25) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `id_cat_fab` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `campoFabricante`
--

INSERT INTO `campoFabricante` (`id_fabricante`, `nombre_fab`, `direccion`, `correo`, `telefono`, `id_cat_fab`) VALUES
(2, 'aa', 'aa', 'clau@gmail.com', '452212', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaProducto`
--

CREATE TABLE `categoriaProducto` (
  `id_categoria` int(3) NOT NULL,
  `nombre_cat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriaProducto`
--

INSERT INTO `categoriaProducto` (`id_categoria`, `nombre_cat`) VALUES
(1, 'calienteee'),
(2, 'helado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catFabricante`
--

CREATE TABLE `catFabricante` (
  `id_cat_fab` int(3) NOT NULL,
  `nombre_cat_fab` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catFabricante`
--

INSERT INTO `catFabricante` (`id_cat_fab`, `nombre_cat_fab`) VALUES
(1, 'pro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Producto`
--

CREATE TABLE `Producto` (
  `id_producto` int(3) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `precio_venta` int(4) NOT NULL,
  `precio_compra` int(4) NOT NULL,
  `color` varchar(25) NOT NULL,
  `id_categoria` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Producto`
--

INSERT INTO `Producto` (`id_producto`, `nombre`, `descripcion`, `precio_venta`, `precio_compra`, `color`, `id_categoria`) VALUES
(1, 'pepsi', '600ml', 12, 8, 'azul', 1),
(3, 'sabritas', '45gr', 23, 10, 'azul', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campoFabricante`
--
ALTER TABLE `campoFabricante`
  ADD PRIMARY KEY (`id_fabricante`),
  ADD KEY `id_cat_fab` (`id_cat_fab`),
  ADD KEY `correo` (`correo`),
  ADD KEY `correo_2` (`correo`),
  ADD KEY `correo_3` (`correo`);
ALTER TABLE `campoFabricante` ADD FULLTEXT KEY `correo_4` (`correo`);

--
-- Indices de la tabla `categoriaProducto`
--
ALTER TABLE `categoriaProducto`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `catFabricante`
--
ALTER TABLE `catFabricante`
  ADD PRIMARY KEY (`id_cat_fab`);

--
-- Indices de la tabla `Producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campoFabricante`
--
ALTER TABLE `campoFabricante`
  MODIFY `id_fabricante` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoriaProducto`
--
ALTER TABLE `categoriaProducto`
  MODIFY `id_categoria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catFabricante`
--
ALTER TABLE `catFabricante`
  MODIFY `id_cat_fab` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Producto`
--
ALTER TABLE `Producto`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
