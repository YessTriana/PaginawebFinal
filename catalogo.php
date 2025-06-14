<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Catálogo - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="style.css" />
  <style>
    .product-card {
      cursor: pointer;
    }
    .modal {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.7);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 999;
    }
    .modal-content {
      background: #0F1C2E;
      color: #FFD700;
      padding: 2rem;
      border-radius: 10px;
      max-width: 500px;
      text-align: center;
    }
    .modal-content img {
      width: 100%;
      border-radius: 8px;
      margin-bottom: 1rem;
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

<div class="breadcrumb"><a href="index.php">Inicio</a> &gt; <span>Catálogo</span></div>
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
    <h3>Catálogo completo</h3>
    <div class="product-grid">
      <div class="product-card" onclick="mostrarDetalle('Perfume Clásico', 'img/perfume1.jpg', 'Aroma elegante y duradero para el día a día.', 49000)">
        <img src="img/perfume1.jpg"><h4>Perfume Clásico</h4><p>$49.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Perfume Intenso', 'img/perfume2.jpg', 'Para momentos inolvidables y seductores.', 52000)">
        <img src="img/perfume2.jpg"><h4>Perfume Intenso</h4><p>$52.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Fragancia Cítrica', 'img/perfume3.jpg', 'Explosión de frescura con limón y bergamota.', 54000)">
        <img src="img/perfume3.jpg"><h4>Fragancia Cítrica</h4><p>$54.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Fragancia Oriental', 'img/perfume4.jpg', 'Sensualidad cálida con ámbar y vainilla.', 55000)">
        <img src="img/perfume4.jpg"><h4>Fragancia Oriental</h4><p>$55.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Fragancia Floral', 'img/perfume5.jpg', 'Dulce combinación de jazmín y rosa.', 58000)">
        <img src="img/perfume5.jpg"><h4>Fragancia Floral</h4><p>$58.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Fragancia Amaderada', 'img/perfume6.jpg', 'Notas sofisticadas de sándalo y cedro.', 60000)">
        <img src="img/perfume6.jpg"><h4>Fragancia Amaderada</h4><p>$60.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Vetiver Elegante', 'img/perfume7.jpg', 'Perfecto para noches formales y eventos.', 61000)">
        <img src="img/perfume7.jpg"><h4>Vetiver Elegante</h4><p>$61.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Café Nocturno', 'img/perfume8.jpg', 'Intenso, moderno, con notas tostadas y cacao.', 63000)">
        <img src="img/perfume8.jpg"><h4>Café Nocturno</h4><p>$63.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Brisa Marina', 'img/perfume9.jpg', 'Ligera, acuática y refrescante para climas cálidos.', 66000)">
        <img src="img/perfume9.jpg"><h4>Brisa Marina</h4><p>$66.000</p>
      </div>
      <div class="product-card" onclick="mostrarDetalle('Acorde de Cuero', 'img/perfume10.jpg', 'Profunda y masculina con toques de cuero y especias.', 69000)">
        <img src="img/perfume10.jpg"><h4>Acorde de Cuero</h4><p>$69.000</p>
      </div>
    </div>
  </main>

  <div class="modal" id="modal">
    <div class="modal-content">
      <img id="modal-img" src="">
      <h3 id="modal-title">Título</h3>
      <p id="modal-desc">Descripción</p>
      <p id="modal-price">Precio</p>
      <button class="add-cart" onclick="agregarDesdeModal()">Agregar al carrito</button>
      <br>
      <button class="close-btn btn" onclick="document.getElementById('modal').style.display='none'">Cerrar</button>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
  </footer>

  <script src="main.js"></script>
  <script>
    let productoActual = {};

    function mostrarDetalle(nombre, imagen, descripcion, precio) {
      productoActual = { nombre, imagen, descripcion, precio };
      document.getElementById('modal-title').textContent = nombre;
      document.getElementById('modal-img').src = imagen;
      document.getElementById('modal-desc').textContent = descripcion;
      document.getElementById('modal-price').textContent = "$" + precio.toLocaleString();
      document.getElementById('modal').style.display = "flex";
    }

    function agregarDesdeModal() {
      let cart = JSON.parse(localStorage.getItem("cartItems")) || [];
      const index = cart.findIndex(p => p.nombre === productoActual.nombre);
      if (index >= 0) {
        cart[index].cantidad += 1;
      } else {
        cart.push({ nombre: productoActual.nombre, precio: productoActual.precio, cantidad: 1 });
      }
      localStorage.setItem("cartItems", JSON.stringify(cart));
      location.reload();
    }
  </script>
</body>
</html>
