-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2017 a las 02:30:09
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `md_roldy_five`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ancho_manga`
--

CREATE TABLE `ancho_manga` (
  `id` int(11) NOT NULL,
  `vestido_id` int(11) NOT NULL,
  `corto` varchar(5) COLLATE utf8_bin NOT NULL,
  `3_4` varchar(5) COLLATE utf8_bin NOT NULL,
  `largo` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ancho_manga`
--

INSERT INTO `ancho_manga` (`id`, `vestido_id`, `corto`, `3_4`, `largo`) VALUES
(1, 1, '8', '7', '4'),
(2, 8, '122', '123', '23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexo_id` int(11) NOT NULL,
  `direccion` varchar(60) COLLATE utf8_bin NOT NULL,
  `telefono_1` varchar(10) COLLATE utf8_bin NOT NULL,
  `telefono_2` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='en esta tabla se guardan los clientes';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `identificacion`, `nombre`, `apellidos`, `sexo_id`, `direccion`, `telefono_1`, `telefono_2`) VALUES
(208, '26260656', 'Rosa ', 'Renteria Palacios', 2, 'B/ Margaritas', '3127068685', '6719133'),
(231, '1077467487', 'Yovanny', 'Raga Renteria', 1, 'B/ Margaritas', '3056427832', '3215648974'),
(233, '322545', 'jkghkjh', 'ghkkjh', 1, 'iojh', 'kjhl', 'kjh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Se guarda el estado de las ordenes realizadas';

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `descripcion`) VALUES
(2, 'Por realizar'),
(3, 'Realizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pago`
--

CREATE TABLE `estado_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='se guarda el estado pago de las ordenes';

--
-- Volcado de datos para la tabla `estado_pago`
--

INSERT INTO `estado_pago` (`id`, `descripcion`) VALUES
(1, 'En deuda'),
(2, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `largo_manga`
--

CREATE TABLE `largo_manga` (
  `id` int(11) NOT NULL,
  `vestido_id` int(11) NOT NULL,
  `corto` varchar(5) COLLATE utf8_bin NOT NULL,
  `3_4` varchar(5) COLLATE utf8_bin NOT NULL,
  `largo` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `largo_manga`
--

INSERT INTO `largo_manga` (`id`, `vestido_id`, `corto`, `3_4`, `largo`) VALUES
(1, 1, '10', '5', '6'),
(8, 8, '12', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `cintura` varchar(5) COLLATE utf8_bin NOT NULL,
  `cadera` varchar(5) COLLATE utf8_bin NOT NULL,
  `largo_mocho` varchar(5) COLLATE utf8_bin NOT NULL,
  `largo_falda` varchar(5) COLLATE utf8_bin NOT NULL,
  `largo_blusa` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `cliente_id`, `cintura`, `cadera`, `largo_mocho`, `largo_falda`, `largo_blusa`) VALUES
(1, 208, '20', '40', '30', '10', '15'),
(64, 231, '1200', '12', '12', '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `responsable` varchar(30) COLLATE utf8_bin NOT NULL,
  `total` double NOT NULL,
  `estado_id` int(11) NOT NULL,
  `estado_pago_id` int(11) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_entrega` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='se guaradan las ordenes realizadas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_cliente`
--

CREATE TABLE `orden_cliente` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `tipo_prenda_id` int(11) NOT NULL,
  `precio` double NOT NULL,
  `estado_id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='se guarad el detalle de cada orden';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalon`
--

CREATE TABLE `pantalon` (
  `id` int(11) NOT NULL,
  `medidas_id` int(11) NOT NULL,
  `largo` varchar(5) COLLATE utf8_bin NOT NULL,
  `ancho_muslo` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pantalon`
--

INSERT INTO `pantalon` (`id`, `medidas_id`, `largo`, `ancho_muslo`) VALUES
(1, 1, '50', '30'),
(5, 64, '12', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `descripcion`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_prenda`
--

CREATE TABLE `tipo_prenda` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_prenda`
--

INSERT INTO `tipo_prenda` (`id`, `descripcion`) VALUES
(1, 'Vestido'),
(2, 'Blusa'),
(3, 'Pantalon'),
(4, 'Short'),
(5, 'Falda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vestido`
--

CREATE TABLE `vestido` (
  `id` int(11) NOT NULL,
  `medidas_id` int(11) NOT NULL,
  `largo` varchar(5) COLLATE utf8_bin NOT NULL,
  `talle` varchar(5) COLLATE utf8_bin NOT NULL,
  `espalda` varchar(5) COLLATE utf8_bin NOT NULL,
  `busto` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `vestido`
--

INSERT INTO `vestido` (`id`, `medidas_id`, `largo`, `talle`, `espalda`, `busto`) VALUES
(1, 1, '30', '50', '25', '10'),
(8, 64, '12', '12', '12', '12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ancho_manga`
--
ALTER TABLE `ancho_manga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vestido_id_2` (`vestido_id`),
  ADD KEY `vestido_id` (`vestido_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD KEY `sexo_id` (`sexo_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `largo_manga`
--
ALTER TABLE `largo_manga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vestido_id_2` (`vestido_id`),
  ADD KEY `vestido_id` (`vestido_id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cliente_id_2` (`cliente_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`,`estado_pago_id`),
  ADD KEY `estado_pago_id` (`estado_pago_id`);

--
-- Indices de la tabla `orden_cliente`
--
ALTER TABLE `orden_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`,`orden_id`,`tipo_prenda_id`,`estado_id`),
  ADD KEY `orden_id` (`orden_id`),
  ADD KEY `tipo_prenda_id` (`tipo_prenda_id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `pantalon`
--
ALTER TABLE `pantalon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medidas_id_2` (`medidas_id`),
  ADD KEY `medidas_id` (`medidas_id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_prenda`
--
ALTER TABLE `tipo_prenda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vestido`
--
ALTER TABLE `vestido`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medidas_id_2` (`medidas_id`),
  ADD KEY `medidas_id` (`medidas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ancho_manga`
--
ALTER TABLE `ancho_manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `largo_manga`
--
ALTER TABLE `largo_manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orden_cliente`
--
ALTER TABLE `orden_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pantalon`
--
ALTER TABLE `pantalon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_prenda`
--
ALTER TABLE `tipo_prenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `vestido`
--
ALTER TABLE `vestido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ancho_manga`
--
ALTER TABLE `ancho_manga`
  ADD CONSTRAINT `ancho_manga_ibfk_1` FOREIGN KEY (`vestido_id`) REFERENCES `vestido` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`);

--
-- Filtros para la tabla `largo_manga`
--
ALTER TABLE `largo_manga`
  ADD CONSTRAINT `largo_manga_ibfk_1` FOREIGN KEY (`vestido_id`) REFERENCES `vestido` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`estado_pago_id`) REFERENCES `estado_pago` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orden_cliente`
--
ALTER TABLE `orden_cliente`
  ADD CONSTRAINT `orden_cliente_ibfk_2` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`),
  ADD CONSTRAINT `orden_cliente_ibfk_3` FOREIGN KEY (`tipo_prenda_id`) REFERENCES `tipo_prenda` (`id`),
  ADD CONSTRAINT `orden_cliente_ibfk_4` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `orden_cliente_ibfk_5` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pantalon`
--
ALTER TABLE `pantalon`
  ADD CONSTRAINT `pantalon_ibfk_1` FOREIGN KEY (`medidas_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vestido`
--
ALTER TABLE `vestido`
  ADD CONSTRAINT `vestido_ibfk_1` FOREIGN KEY (`medidas_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
