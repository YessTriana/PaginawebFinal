<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ofertas - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    .product-card:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .modal {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0,0,0,0.7);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .modal-content {
      background-color: #0F1C2E;
      color: #FFD700;
      padding: 2rem;
      border-radius: 8px;
      max-width: 500px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    .modal-content h3, .modal-content p {
      text-shadow: 1px 1px 2px #000;
    }
    .modal-content .close-btn {
      margin-top: 1rem;
    }
  </style>
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

<div class="breadcrumb"><a href="index.php">Inicio</a> &gt; <span>Ofertas</span></div>
  <header class="navbar">
    <h1 class="logo">Yessman</h1>
    <nav class="nav-links">
      <a href="index.php">Inicio</a>
      <a href="catalogo.php">Catálogo</a>
      <a href="ofertas.php">Ofertas</a>
      <a href="fragancias.php">Fragancias</a>
      <a href="contacto.php">Contacto</a>
      <a href="registro.php">Registro</a>
      <a href="carrito.php">Carrito</a>
    </nav>
    <div id="cart-count"></div>
  </header>

  <main class="products">
    <h2>Ofertas Exclusivas</h2>
    <div class="product-grid">
      <div class="product-card" onclick="openOferta('Edición Limitada', '20% de descuento en esta fragancia premium solo por esta semana.')">
        <img src="img/perfume4.jpg" alt="Perfume Promo">
        <h4>Edición Limitada</h4>
        <p>20% de descuento solo por esta semana.</p>
      </div>
      <div class="product-card" onclick="openOferta('Combo 2x1', 'Llévate dos perfumes seleccionados por el precio de uno.')">
        <img src="img/perfume5.jpg" alt="Perfume Promo 2">
        <h4>Combo 2x1</h4>
        <p>Llévate dos por el precio de uno.</p>
      </div>
    </div>
  </main>

  <div class="modal" id="oferta-modal">
    <div class="modal-content">
      <h3 id="oferta-title">Título</h3>
      <p id="oferta-desc">Descripción</p>
      <button class="close-btn btn" onclick="document.getElementById('oferta-modal').style.display='none'">Cerrar</button>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
  </footer>

  <script src="main.js"></script>
  <script>
    function openOferta(titulo, descripcion) {
      document.getElementById("oferta-title").textContent = titulo;
      document.getElementById("oferta-desc").textContent = descripcion;
      document.getElementById("oferta-modal").style.display = "flex";
    }
  </script>
</body>
</html>
