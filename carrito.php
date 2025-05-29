<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Carrito - Yessman</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <style>
    table {
      width: 90%;
      margin: 2rem auto;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }
    th, td {
      padding: 1rem;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }
    th {
      background-color: #0F1C2E;
      color: white;
    }
    td img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      border-radius: 6px;
    }
    .btn-remove {
      background: crimson;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
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

<div class="breadcrumb"><a href="index.php">Inicio</a> &gt; <span>Carrito</span></div>
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

  <main>
    <h2 style="text-align:center">Tu Carrito</h2>
    <table id="cart-table">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody id="cart-body">
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6" style="text-align:right; padding-right:2rem;"><strong>Total:</strong> <span id="cart-total"></span></td>
        </tr>
      </tfoot>
    </table>
  </main>

  <footer>
    <p>&copy; 2025 Yessman. Todos los derechos reservados.</p>
  </footer>

  <script src="main.js"></script>
  <script>
    const productosConImagen = {
      "Perfume Clásico": "img/perfume1.jpg",
      "Perfume Intenso": "img/perfume2.jpg",
      "Fragancia Cítrica": "img/perfume3.jpg",
      "Fragancia Oriental": "img/perfume4.jpg",
      "Fragancia Floral": "img/perfume5.jpg",
      "Fragancia Amaderada": "img/perfume6.jpg",
      "Vetiver Elegante": "img/perfume7.jpg",
      "Café Nocturno": "img/perfume8.jpg",
      "Brisa Marina": "img/perfume9.jpg",
      "Acorde de Cuero": "img/perfume10.jpg"
    };

    const cart = JSON.parse(localStorage.getItem("cartItems")) || [];
    const cartBody = document.getElementById("cart-body");
    let total = 0;

    cart.forEach((item, index) => {
      const subtotal = item.precio * item.cantidad;
      total += subtotal;

      const row = document.createElement("tr");
      row.innerHTML = `
        <td><img src="${productosConImagen[item.nombre] || 'img/default.jpg'}" alt="img"></td>
        <td>${item.nombre}</td>
        <td>$${item.precio.toLocaleString()}</td>
        <td>${item.cantidad}</td>
        <td>$${subtotal.toLocaleString()}</td>
        <td><button class="btn-remove" onclick="removeItem(${index})">Eliminar</button></td>
      `;
      cartBody.appendChild(row);
    });

    document.getElementById("cart-total").textContent = "$" + total.toLocaleString();

    function removeItem(index) {
      cart.splice(index, 1);
      localStorage.setItem("cartItems", JSON.stringify(cart));
      location.reload();
    }
  </script>
</body>
</html>
