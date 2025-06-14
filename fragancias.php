<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Fragancias por Tipo - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    .tipo-fragancia {
      margin: 2rem;
    }
    .tipo-fragancia h3 {
      cursor: pointer;
      background: var(--blue-dark);
      color: white;
      padding: 1rem;
      border-radius: 6px;
    }
    .tipo-fragancia p.descripcion {
      margin: 1rem 0;
      font-style: italic;
      color: #444;
    }
    .fragancia-lista {
      display: none;
      margin-top: 1rem;
      gap: 1rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    }
    .product-card img {
      width: 100%;
      border-radius: 6px;
    }
    .product-card .add-cart {
      margin-top: 0.5rem;
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

<div class="breadcrumb"><a href="index.php">Inicio</a> &gt; <span>Fragancias</span></div>
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
      <a href="login.php">Ingresar</a>
    </nav>
    <div id="cart-count"></div>
  </header>

  <main class="products">
    <h2>Explora por tipo de fragancia</h2>

    <div class="tipo-fragancia">
      <h3 onclick="toggleSection('citrico')">Cítricas</h3>
      <p class="descripcion">Explosión de frescura con notas de limón, naranja y bergamota. Perfectas para el día.</p>
      <div id="citrico" class="fragancia-lista">
        <div class="product-card"><img src="img/perfume1.jpg"><h4>Brisa de Limón</h4><p>$49.000</p><button class="add-cart">Agregar al carrito</button></div>
        <div class="product-card"><img src="img/perfume2.jpg"><h4>Naranja Viva</h4><p>$52.000</p><button class="add-cart">Agregar al carrito</button></div>
      </div>
    </div>

    <div class="tipo-fragancia">
      <h3 onclick="toggleSection('floral')">Florales</h3>
      <p class="descripcion">Dulces, románticas y femeninas. Basadas en rosas, jazmín, lirio y peonía.</p>
      <div id="floral" class="fragancia-lista">
        <div class="product-card"><img src="img/perfume3.jpg"><h4>Rosa Sublime</h4><p>$55.000</p><button class="add-cart">Agregar al carrito</button></div>
        <div class="product-card"><img src="img/perfume4.jpg"><h4>Jazmín Nocturno</h4><p>$54.000</p><button class="add-cart">Agregar al carrito</button></div>
      </div>
    </div>

    <div class="tipo-fragancia">
      <h3 onclick="toggleSection('oriental')">Orientales</h3>
      <p class="descripcion">Sensuales y exóticas, con notas cálidas como vainilla, ámbar y especias.</p>
      <div id="oriental" class="fragancia-lista">
        <div class="product-card"><img src="img/perfume5.jpg"><h4>Ámbar Místico</h4><p>$59.000</p><button class="add-cart">Agregar al carrito</button></div>
        <div class="product-card"><img src="img/perfume6.jpg"><h4>Especias del Sur</h4><p>$60.000</p><button class="add-cart">Agregar al carrito</button></div>
      </div>
    </div>

    <div class="tipo-fragancia">
      <h3 onclick="toggleSection('amaderado')">Amaderadas</h3>
      <p class="descripcion">Rústicas y sofisticadas. Incluyen sándalo, vetiver, cedro y pachulí.</p>
      <div id="amaderado" class="fragancia-lista">
        <div class="product-card"><img src="img/perfume7.jpg"><h4>Sándalo Noble</h4><p>$62.000</p><button class="add-cart">Agregar al carrito</button></div>
        <div class="product-card"><img src="img/perfume8.jpg"><h4>Vetiver Clásico</h4><p>$64.000</p><button class="add-cart">Agregar al carrito</button></div>
      </div>
    </div>

  </main>

  <footer>
    <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
  </footer>

  <script>
    function toggleSection(id) {
      const el = document.getElementById(id);
      el.style.display = (el.style.display === "grid") ? "none" : "grid";
    }
  </script>
  <script src="main.js"></script>
</body>
</html>
