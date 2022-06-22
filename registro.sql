-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2022 a las 05:43:19
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(8) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` int(12) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `stock` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `descripcion`, `precio`, `foto`, `stock`) VALUES
(2, 'Aviador Ray Ban', 'Anteojos De Sol Ray Ban Aviator', 7000, '../imagenes/productos/Anteojos De Sol Ray Ban Aviator.webp', 1),
(3, 'Ray Ban 4187 Chris.', 'Lentes de sol Ray Ban 4187 Chris', 5000, '../imagenes/productos/Lentes de sol Ray Ban 4187 Chris.webp', 1),
(4, 'Vulk Ruga Espejado redondo', 'Lentes de sol Vulk Ruga Espejado Redondo', 2000, '../imagenes/productos/Vulk Ruga Espejado Redondo.webp', 7),
(5, 'Ray Ban Round Metal', 'Lentes de Sol Ray-Ban Round Metal', 15000, '../imagenes/productos/Lentes de Sol Ray-Ban Round Metal.webp', 5),
(6, 'Armani Exchange', 'Lentes Armani Exchange de Hombre Negro Matte y Verde', 15000, '../imagenes/productos/Lentes Armani Exchange.webp', 10),
(7, 'Lentes Infinit Wayak', 'Gafas De Sol Lentes Infinit Wayak', 10000, '../imagenes/productos/gafas Infinit Wayak.webp', 5),
(8, 'Lentes Infinit Chili', 'Gafas De Sol Lentes Infinit Chili', 9000, '../imagenes/productos/lentes infinit chill.webp', 7),
(9, 'Anteojos de sol palosanto', 'Anteojos de sol de madera de palo santo', 5000, '../imagenes/productos/Anteojos de sol de madera.webp', 5),
(10, 'Infinit Moscow', 'Anteojos Sol Infinit Moscow Negro Lente Negra Degrade', 15000, '../imagenes/productos/infinit Moscow.webp', 7),
(11, 'Charles Caramel', 'Lentes de sol charles caramel', 5000, '../imagenes/productos/charles caramel sol.webp', 12),
(12, 'Hawkers Hills HIL06', ' Lentes de sol Hawkers Hills HIL06', 7000, '../imagenes/productos/Hawkers Hills HIL06.webp', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `administrador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `contraseña`, `administrador`) VALUES
(1, 'Mateo', 'Rota', 'matocriadorota@gmail.com', 'mate', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'pedro', 'juarez', 'pedrojuarez@gmail.com', 'pedrito', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(3, 'juan', 'perez', 'crack@gmail.com', 'juancho', '47bce5c74f589f4867dbd57e9ca9f808', 0),
(4, 'lesi', 'hesamon', 'lesi@asd', 'e11even', '7815696ecbf1c96e6894b779456d330e', 0),
(5, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(6, 'pepe', 'ramirez', 'pepe@asd', 'pp', '49899bcf1fba898998a0cbf3f9dd6f39', 0),
(7, 'pepe2', 'ramirez', 'pepe@asd', 'pp', '49899bcf1fba898998a0cbf3f9dd6f39', 0),
(8, 'pepe2', 'ramirez', 'pepe@asd', 'pp', '49899bcf1fba898998a0cbf3f9dd6f39', 0),
(9, 'juana', 'perez', 'juana@asd', 'jua', 'b59c67bf196a4758191e42f76670ceba', 0),
(10, 'agustin', 'paiva', 'paiva@gmail', 'pai', 'bcbe3365e6ac95ea2c0343a2395834dd', 0),
(11, 'valentino', 'juarez', 'valeJua@gmail.com', 'tino', '4a7d1ed414474e4033ac29ccb8653d9b', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
