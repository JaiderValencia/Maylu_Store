const CART_KEY = "maylu_cart";

const cartBody = document.getElementById("cartBody");
const cartTotal = document.getElementById("cartTotal");
const cartEmpty = document.getElementById("cartEmpty");
const cartTableWrapper = document.getElementById("cartTableWrapper");

const formatter = new Intl.NumberFormat("es-CO", {
  style: "currency",
  currency: "COP",
  minimumFractionDigits: 0
});

const readCart = () => {
  try {
    const raw = localStorage.getItem(CART_KEY);
    return raw ? JSON.parse(raw) : [];
  } catch (error) {
    return [];
  }
};

const writeCart = (items) => {
  localStorage.setItem(CART_KEY, JSON.stringify(items));
};

const renderCart = () => {
  if (!cartBody || !cartTotal || !cartEmpty || !cartTableWrapper) {
    return;
  }

  const items = readCart();
  cartBody.innerHTML = "";

  if (!items.length) {
    cartEmpty.style.display = "block";
    cartTableWrapper.style.display = "none";
    cartTotal.textContent = formatter.format(0);
    return;
  }

  cartEmpty.style.display = "none";
  cartTableWrapper.style.display = "block";

  let total = 0;

  items.forEach((item, index) => {
    const row = document.createElement("tr");

    const nameCell = document.createElement("td");
    nameCell.textContent = item.nombre;
    nameCell.setAttribute("data-label", "Producto");

    const sizeCell = document.createElement("td");
    sizeCell.textContent = item.talla;
    sizeCell.setAttribute("data-label", "Talla");

    const qtyCell = document.createElement("td");
    qtyCell.textContent = item.cantidad;
    qtyCell.setAttribute("data-label", "Cantidad");

    const priceCell = document.createElement("td");
    priceCell.textContent = formatter.format(item.precioUnitario || 0);
    priceCell.setAttribute("data-label", "Precio unitario");

    const removeCell = document.createElement("td");
    removeCell.setAttribute("data-label", "Eliminar");

    const removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.className = "cart-remove";
    removeButton.setAttribute("aria-label", `Eliminar ${item.nombre}`);
    removeButton.textContent = "X";
    removeButton.addEventListener("click", () => {
      const updatedItems = readCart();
      updatedItems.splice(index, 1);
      writeCart(updatedItems);
      renderCart();
    });

    removeCell.appendChild(removeButton);

    row.appendChild(nameCell);
    row.appendChild(sizeCell);
    row.appendChild(qtyCell);
    row.appendChild(priceCell);
    row.appendChild(removeCell);
    cartBody.appendChild(row);

    total += (item.precioUnitario || 0) * item.cantidad;
  });

  cartTotal.textContent = formatter.format(total);
};

renderCart();
