-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2025 a las 06:15:17
-- Versión del servidor: 8.0.42
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yessman_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `mensaje`, `fecha_envio`) VALUES
(1, 'Juan Manuel', 'juan174@gmail.com', 'Los productos son de muy buena calidad', '2025-05-29 03:47:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen_url`, `categoria`, `stock`) VALUES
(1, 'C├¡tricas', 'Explosi├│n de frescura con notas de lim├│n, naranja y bergamota. Perfectas para el d├¡a.', 29.99, 'img/perfume1.jpg', 'General', 10),
(2, 'Florales', 'Dulces, rom├ínticas y femeninas. Basadas en rosas, jazm├¡n, lirio y peon├¡a.', 29.99, 'img/perfume3.jpg', 'General', 10),
(3, 'Orientales', 'Sensuales y ex├│ticas, con notas c├ílidas como vainilla, ├ímbar y especias.', 29.99, 'img/perfume5.jpg', 'General', 10),
(4, 'Amaderadas', 'R├║sticas y sofisticadas. Incluyen s├índalo, vetiver, cedro y pachul├¡.', 29.99, 'img/perfume7.jpg', 'General', 10),
(5, 'C├¡tricas', 'Explosi├│n de frescura con notas de lim├│n, naranja y bergamota. Perfectas para el d├¡a.', 29.99, 'img/perfume1.jpg', 'General', 10),
(6, 'Florales', 'Dulces, rom├ínticas y femeninas. Basadas en rosas, jazm├¡n, lirio y peon├¡a.', 29.99, 'img/perfume3.jpg', 'General', 10),
(7, 'Orientales', 'Sensuales y ex├│ticas, con notas c├ílidas como vainilla, ├ímbar y especias.', 29.99, 'img/perfume5.jpg', 'General', 10),
(8, 'Amaderadas', 'R├║sticas y sofisticadas. Incluyen s├índalo, vetiver, cedro y pachul├¡.', 29.99, 'img/perfume7.jpg', 'General', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `contrasena`, `fecha_registro`) VALUES
(1, 'Yessica ', 'Yessica Triana', 'yessicatriana2004@gmail.com', '$2y$10$ITlpIaW8s.fmHSW..QPJe.wI1dJYGcjjYdjjdQ.SK.EXkCIzR6lwC', '2025-05-29 01:42:25'),
(2, 'daniel', 'Daniel Ardila', 'daniel12@gmail.com', '$2y$10$kmMqe3UMCr3mc8hlt62wveAUPa25f0K.SzP0fYo9CvWbRMSKoXwn.', '2025-05-29 03:44:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
