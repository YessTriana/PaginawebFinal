
function updateCartButton() {
  const items = JSON.parse(localStorage.getItem("cartItems") || "[]");
  const count = items.reduce((s, i) => s + i.cantidad, 0);
  const cartContainer = document.getElementById("cart-count");
  if (cartContainer) {
    cartContainer.innerHTML = `<a href="carrito.html" class="cart-button">🛒 Carrito (${count})</a>`;
  }
}

function removeItem(index) {
  let cart = JSON.parse(localStorage.getItem("cartItems") || "[]");
  cart.splice(index, 1);
  localStorage.setItem("cartItems", JSON.stringify(cart));
  location.reload();
}

document.addEventListener("DOMContentLoaded", () => {
  updateCartButton();

  document.querySelectorAll(".add-cart").forEach(btn => {
    btn.addEventListener("click", e => {
      e.preventDefault();
      const card = btn.closest(".product-card");
      const nombre = card.querySelector("h4").innerText;
      const precioTexto = card.querySelector("p").innerText.replace(/[^\d]/g, '');
      const precio = parseInt(precioTexto) || 49000;

      let cart = JSON.parse(localStorage.getItem("cartItems")) || [];
      const index = cart.findIndex(p => p.nombre === nombre);
      if (index >= 0) {
        cart[index].cantidad += 1;
      } else {
        cart.push({ nombre, precio, cantidad: 1 });
      }
      localStorage.setItem("cartItems", JSON.stringify(cart));
      updateCartButton();
    });
  });

  if (window.location.pathname.includes("carrito.html")) {
    const cartBody = document.getElementById("cart-body");
    const cartTotal = document.getElementById("cart-total");
    let cart = JSON.parse(localStorage.getItem("cartItems")) || [];
    let total = 0;

    cartBody.innerHTML = "";
    cart.forEach((item, idx) => {
      const subtotal = item.precio * item.cantidad;
      total += subtotal;
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${item.nombre}</td>
        <td>$${item.precio.toLocaleString()}</td>
        <td>${item.cantidad}</td>
        <td>$${subtotal.toLocaleString()}</td>
        <td><button class="btn-delete" onclick="removeItem(${idx})">Eliminar</button></td>
      `;
      cartBody.appendChild(row);
    });

    cartTotal.innerHTML = `<span style="color: #FFD700;">Total: $${total.toLocaleString()}</span>`;
  }
});
