-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 22:22:20
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seyda_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bag`
--

CREATE TABLE `bag` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `products_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ID`, `price`, `description`, `date`, `stock`, `name`, `rate`) VALUES
(1, '69.90', 'Personaliza tu colgante para lentes eligiendo las cuentas, colores y dijes favoritos', '2021-06-29 07:48:54', 14, 'Colgante personalizado para lentes', 4.5),
(2, '59.90', 'Collar con terminaciones en chapa de oro, chaquirones en tonos brillosos y una combinaci&oacute;n de cuarzos electrificados en diferentes colores', '2021-06-29 07:03:12', 66, 'Collar chaquir&oacute;n con cuarzo electrificado', 4),
(3, '49.90', 'Collar con terminaciones en chapa de oro, chaquirones en tono transparente y cherries colocadas en distintos puntos', '2021-06-29 07:48:58', 27, 'Collar Cherry', 3.9),
(4, '59.90', 'Ch&oacute;ker con terminaciones y separadores en chapa de oro, chaquiras en tonos fuertes y letras en acr&iacute;lico de colores', '2021-06-29 16:38:25', 45, 'Ch&oacute;ker de colores personalizable', 4.4),
(5, '69.90', 'Collar sencillo con terminaciones, cadena y separadores en chapa de oro con dije transversal de coraz&oacute;n', '2021-06-29 16:39:28', 96, 'Collar en chapa de oro sencillo con coraz&oacute;n', 4.1),
(6, '119.90', 'Collar artesanal hecho de acero inoxidable con mariposas en oro laminado', '2021-06-29 16:40:48', 6, 'Cadena de acero inoxidable con mariposas', 4.8),
(7, '79.90', 'Collar de acero inoxidable con dije de girasol en chapa de oro', '2021-06-29 18:54:22', 0, 'Collar girasol', 4),
(8, '39.90', 'Tobillera artesanal hecha con pucca en tonos fuertes y cuarzo electrificado en cada extremo', '2021-06-29 16:47:11', 22, 'Tobillera pucca con cuarzo', 3.6),
(9, '69.90', 'Pulsera de acero inoxidable con ba&ntilde;o en color dorado, hecha a la medida', '2021-06-29 16:47:11', 44, 'Pulsera de acero inoxidable para hombre', 3.8),
(10, '39.90', 'Pulsera artesanal de piedras de jade, agatha y ojo de tigre, adornada con estrellas y piedra volc&aacute;nica', '2021-06-29 16:50:44', 22, 'Pulsera de piedras naturales', 4.8),
(11, '29.90', 'Par de pulseras artesanales con cristal checo, separadores en chapa de oro y dijes transversales de coraz&oacute;n', '2021-06-29 16:50:44', 129, 'Juego pulseras de cristal', 4.5),
(12, '49.90', 'Paquete de tres pulseras en distintos colores con piedra de jade y separadores en chapa de oro; ideal para las mejores amigas', '2021-06-29 19:10:01', 147, 'Pulseras de la amistad', 4.9),
(13, '69.90', 'Par de pulseras artesanales con hilo nylon, inicial a escoger, separadores en chapa de oro, dije transversal de corazón e im&aacute;n en acero inoxidable dorado', '2021-06-29 16:53:11', 75, 'Pulseras para pareja con im&aacute;n e inicial', 4.7),
(14, '64.90', 'Par de pulseras artesanales con hilo nylon, chaquir&oacute;n azul, dije de estrella transveral en acero y piedra luminosa', '2021-06-29 19:04:09', 61, 'Par de pulseras con estrella y piedra luminosa', 4.2),
(15, '59.90', 'Par de pulseras artesanales con piedra agatha, separadores en chapa de oro e hilo nylon de diferentes grosores', '2021-06-29 16:56:26', 166, 'Pulseras para pareja con piedra natural', 3.9),
(16, '129.90', 'Par de pulseras para pareja en combinaci&oacute;n de negro con dorado (para hombre y mujer)', '2021-06-29 18:54:22', 262, 'Pulseras para pareja de acero inoxidable negro/dorado', 4.7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `restricted` tinyint(1) NOT NULL,
  `hashkey` varchar(256) COLLATE utf8_bin NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `type`, `username`, `password`, `phone`, `restricted`, `hashkey`, `profile_image`) VALUES
(1, 1, 'admin', '$2y$10$HdD5R67XK5/iY6LeNAZpkOjAMCRys1qgmWXhzkJTWSIXo1LMHVRTi', '6671184674', 0, '0da1e0e77920', '1624994029_EtVOM6-WgAE805U.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `products.ID` (`products_ID`),
  ADD KEY `username_ID` (`user_ID`) USING BTREE;

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bag`
--
ALTER TABLE `bag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bag`
--
ALTER TABLE `bag`
  ADD CONSTRAINT `bag_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bag_ibfk_2` FOREIGN KEY (`products_ID`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
