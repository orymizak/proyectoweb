-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 17:19:28
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
  `user.ID` int(11) NOT NULL,
  `products.ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL,
  `products.ID` int(11) NOT NULL,
  `data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `description` varchar(2000) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `stock` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ID`, `price`, `description`, `date`, `stock`, `name`) VALUES
(1, '19999.99', 'descripcion', '2021-06-13', 99, 'Apple iPhone 8 64GB Space Gray'),
(2, '339.10', 'descripcion2', '2021-06-13', 300, 'Sarten Tefal B5760282 20 CM de Titanium'),
(3, '999.00', 'descripcion3', '2021-06-13', 55, 'Droga, mota de la buena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone` varchar(10) COLLATE utf8_bin NOT NULL,
  `restricted` tinyint(1) NOT NULL,
  `hashkey` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `type`, `username`, `password`, `phone`, `restricted`, `hashkey`) VALUES
(135, 0, 'user', 'asd', 'qweasdq', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username.ID` (`user.ID`),
  ADD KEY `products.ID` (`products.ID`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `products.ID` (`products.ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bag`
--
ALTER TABLE `bag`
  ADD CONSTRAINT `bag_ibfk_1` FOREIGN KEY (`products.ID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `bag_ibfk_2` FOREIGN KEY (`user.ID`) REFERENCES `users` (`ID`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`products.ID`) REFERENCES `products` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
