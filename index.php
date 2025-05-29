<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Yessman Perfumes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="carrito.php">Carrito</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li>
                <?php if (isset($_SESSION['nombre'])): ?>
                    <span>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
                    <a href="logout.php">Cerrar sesión</a>
                <?php else: ?>
                    <a href="login.php">Ingreso</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header>


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

<div class="breadcrumb"><a href="index.php">Inicio</a> &gt; <span>Inicio</span></div>
  <header class="navbar">
    <h1 class="logo">Yessman</h1>
    <nav class="nav-links">
      <a href="index.php">Inicio</a>
      <a href="catalogo.php">Catálogo</a>
      <a href="ofertas.php">Ofertas</a>
      <a href="fragancias.php">Fragancias</a>
      <a href="contacto.php">Contacto</a>
       <a href="login.php">Ingreso</a>
      <a href="registro.php">Registro</a>
    </nav>
    <div class="cart-icon" id="cart-count">0</div>
  </header>

  <section class="hero" style="padding-top:6rem;">
    <div class="hero-text">
      <h2>Tu esencia, tu marca</h2>
      <p>Explora las mejores fragancias con estilo y personalidad.</p>
      <a href="catalogo.html" class="btn">Ver Catálogo</a>
    </div>
  </section>

  <section class="products">
    <h3>Destacados</h3>
    <div class="product-grid">
      <div class="product-card">
        <img src="img/perfume1.jpg" alt="Perfume 1">
        <h4>Perfume Clásico</h4>
        <p>Aroma elegante y duradero.</p>
        <button class="add-cart">Agregar al carrito</button>
      </div>
      <div class="product-card">
        <img src="img/perfume2.jpg" alt="Perfume 2">
        <h4>Perfume Intenso</h4>
        <p>Para momentos inolvidables.</p>
        <button class="add-cart">Agregar al carrito</button>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
  </footer>

  <script src="main.js"></script>
</body>
</html>
