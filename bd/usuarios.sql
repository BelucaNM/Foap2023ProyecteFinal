-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2024 a las 23:17:59
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(4) NOT NULL,
  `usu_username` varchar(45) NOT NULL,
  `usu_password` longtext NOT NULL,
  `usu_email` varchar(45) NOT NULL,
  `usu_apellido` varchar(45) DEFAULT NULL,
  `usu_nombre` varchar(45) DEFAULT NULL,
  `usu_dni` char(9) DEFAULT NULL,
  `usu_direccion` varchar(50) DEFAULT NULL,
  `municipios_mun_id` int(11) DEFAULT NULL,
  `usu_token` varchar(45) DEFAULT NULL,
  `usu_deadLine` datetime NOT NULL DEFAULT current_timestamp(),
  `usu_cuentaActiva` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_username`, `usu_password`, `usu_email`, `usu_apellido`, `usu_nombre`, `usu_dni`, `usu_direccion`, `municipios_mun_id`, `usu_token`, `usu_deadLine`, `usu_cuentaActiva`) VALUES
(1, 'admin', '$2y$10$iGS71Kdrsjg/nBS1sIvfp.1RyfRKybqb7yyK0Qacmj.4.xR3swFaK', 'beluca.navarrina@gmail.com', '', '', '', '', 1468, NULL, '2024-07-24 00:26:19', 1),
(4, 'profe', '$2y$10$kifvgDT73mKHUENO3dGZCuvYHHd.7L/L3OqzH.z6S.c2RPDuH3Cvm', 'pepe@gmail.com', '', '', '', '', 1468, NULL, '2024-07-24 01:37:38', 1),
(5, 'isabel', '$2y$10$9n.TrqhLGKI5Ro7/OmHSh.c54WIK0BnCAUunb.2glhXwDuM/FFwB6', 'isabel.navarrina@gmail.com', '', '', '', '', 1468, NULL, '2024-07-24 01:46:11', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`),
  ADD UNIQUE KEY `usu_nombre_UNIQUE` (`usu_username`),
  ADD KEY `fk_usuarios_municipios1_idx` (`municipios_mun_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_municipios1` FOREIGN KEY (`municipios_mun_id`) REFERENCES `municipios` (`mun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
