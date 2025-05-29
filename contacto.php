<?php
// conexión a la base de datos
$host = "localhost";
$db = "yessman_db";
$user = "root";
$pass = "Jaztri20."; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// procesamiento del formulario
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $texto = $_POST["mensaje"];

    $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $texto);

    if ($stmt->execute()) {
        $mensaje = "✅ Mensaje enviado correctamente.";
    } else {
        $mensaje = "❌ Error al enviar mensaje: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Contacto - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css" />
  <style>
    form {
      background: white;
      max-width: 500px;
      margin: 2rem auto;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    form input, form textarea {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    form button {
      background: #D4AF37;
      color: #0F1C2E;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }
    .mensaje-alerta {
      text-align: center;
      font-weight: bold;
      margin: 1rem auto;
      color: green;
    }
  </style>
</head>
<body>

<style>
.breadcrumb {
  background-color: #0F1C2E;
  color: #FFD700;
  padding: 0.75rem 1.5rem;
  font-size: 0.9rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.breadcrumb a {
  color: #FFD700;
  text-decoration: none;
}
.breadcrumb a:hover {
  text-decoration: underline;
}
</style>

<div class="breadcrumb"><a href="index.html">Inicio</a> &gt; <span>Contacto</span></div>

<header class="navbar">
  <h1 class="logo">Yessman</h1>
  <nav class="nav-links">
    <a href="index.html">Inicio</a>
    <a href="catalogo.html">Catálogo</a>
    <a href="ofertas.html">Ofertas</a>
    <a href="fragancias.html">Fragancias</a>
    <a href="contacto.php">Contacto</a>
    <a href="registro.php">Registro</a>
    <a href="carrito.html">Carrito</a>
  </nav>
  <div id="cart-count"></div>
</header>

<main class="products">
  <h2>Contáctanos</h2>
  <?php if ($mensaje): ?>
    <div class="mensaje-alerta"><?php echo $mensaje; ?></div>
  <?php endif; ?>
  <form method="POST">
    <input name="nombre" type="text" placeholder="Nombre completo" required />
    <input name="correo" type="email" placeholder="Correo electrónico" required />
    <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="5" required></textarea>
    <button type="submit">Enviar</button>
  </form>
</main>

<footer>
  <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
</footer>

<script src="main.js"></script>
</body>
</html>
