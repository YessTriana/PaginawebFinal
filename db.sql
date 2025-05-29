
-- Crear base de datos
CREATE DATABASE IF NOT EXISTS yessman_db;
USE yessman_db;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    imagen_url VARCHAR(255),
    categoria VARCHAR(100),
    stock INT DEFAULT 0
);

-- Insertar productos extraídos
INSERT INTO productos (nombre, descripcion, precio, imagen_url, categoria, stock) VALUES ('Cítricas', 'Explosión de frescura con notas de limón, naranja y bergamota. Perfectas para el día.', 29.99, 'img/perfume1.jpg', 'General', 10);
INSERT INTO productos (nombre, descripcion, precio, imagen_url, categoria, stock) VALUES ('Florales', 'Dulces, románticas y femeninas. Basadas en rosas, jazmín, lirio y peonía.', 29.99, 'img/perfume3.jpg', 'General', 10);
INSERT INTO productos (nombre, descripcion, precio, imagen_url, categoria, stock) VALUES ('Orientales', 'Sensuales y exóticas, con notas cálidas como vainilla, ámbar y especias.', 29.99, 'img/perfume5.jpg', 'General', 10);
INSERT INTO productos (nombre, descripcion, precio, imagen_url, categoria, stock) VALUES ('Amaderadas', 'Rústicas y sofisticadas. Incluyen sándalo, vetiver, cedro y pachulí.', 29.99, 'img/perfume7.jpg', 'General', 10);
