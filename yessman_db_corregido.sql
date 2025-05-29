
CREATE DATABASE IF NOT EXISTS yessman_db;
USE yessman_db;

CREATE TABLE `mensajes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `mensaje`, `fecha_envio`) VALUES
(1, 'Juan Manuel', 'juan174@gmail.com', 'Los productos son de muy buena calidad', '2025-05-29 03:47:25');

CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen_url`, `categoria`, `stock`) VALUES
(1, 'Cítricas', 'Explosión de frescura con notas de limón, naranja y bergamota. Perfectas para el día.', 29.99, 'img/perfume1.jpg', 'General', 10),
(2, 'Florales', 'Dulces, románticas y femeninas. Basadas en rosas, jazmín, lirio y peonía.', 29.99, 'img/perfume3.jpg', 'General', 10),
(3, 'Orientales', 'Sensuales y exóticas, con notas cálidas como vainilla, ámbar y especias.', 29.99, 'img/perfume5.jpg', 'General', 10),
(4, 'Amaderadas', 'Rústicas y sofisticadas. Incluyen sándalo, vetiver, cedro y pachulí.', 29.99, 'img/perfume7.jpg', 'General', 10);

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `contrasena`, `fecha_registro`) VALUES
(1, 'Yessica', 'Yessica Triana', 'yessicatriana2004@gmail.com', '$2y$10$ITlpIaW8s.fmHSW..QPJe.wI1dJYGcjjYdjjdQ.SK.EXkCIzR6lwC', '2025-05-29 01:42:25'),
(2, 'daniel', 'Daniel Ardila', 'daniel12@gmail.com', '$2y$10$kmMqe3UMCr3mc8hlt62wveAUPa25f0K.SzP0fYo9CvWbRMSKoXwn.', '2025-05-29 03:44:26');
