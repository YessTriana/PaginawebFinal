<?php
include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, nombre, correo, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $usuario, $nombre, $correo, $contrasena);

    if ($stmt->execute()) {
        $mensaje = "✅ Usuario registrado correctamente.";
    } else {
        $mensaje = "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<style>
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}
.navbar {
  background-color: #0F1C2E;
  color: white;
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.logo {
  font-size: 1.5rem;
  color: #FFD700;
}
.nav-links a {
  color: white;
  margin: 0 10px;
  text-decoration: none;
}
.nav-links a:hover {
  color: #FFD700;
}
.container {
  max-width: 500px;
  margin: 5rem auto;
  padding: 2rem;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
h2 {
  text-align: center;
  color: #0F1C2E;
}
form input {
  width: 100%;
  padding: 0.75rem;
  margin: 0.5rem 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}
form button {
  width: 100%;
  padding: 0.75rem;
  background-color: #0F1C2E;
  color: #FFD700;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
}
form button:hover {
  background-color: #1a2f4d;
}
.mensaje {
  text-align: center;
  color: green;
  margin-top: 1rem;
}
footer {
  text-align: center;
  padding: 1rem;
  background-color: #0F1C2E;
  color: white;
  margin-top: 3rem;
}
</style>

<header class="navbar">
  <h1 class="logo">Yessman</h1>
  <nav class="nav-links">
    <a href="index.php">Inicio</a>
    <a href="catalogo.php">Catálogo</a>
    <a href="ofertas.php">Ofertas</a>
    <a href="fragancias.php">Fragancias</a>
    <a href="contacto.php">Contacto</a>
    <a href="registro.php">Registro</a>
  </nav>
</header>

<div class="container">
  <h2>Registro de Usuario</h2>
  <form method="POST" action="">
    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
  </form>

  <?php if (!empty($mensaje)): ?>
    <p class="mensaje"><?php echo $mensaje; ?></p>
  <?php endif; ?>
</div>

<footer>
  <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
</footer>

</body>
</html>
