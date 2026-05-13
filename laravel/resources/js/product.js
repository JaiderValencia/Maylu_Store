const productSection = document.querySelector(".producto-detalle");
const producto = productSection
  ? {
      id: Number.parseInt(productSection.dataset.productId || "", 10),
      nombre: productSection.dataset.productName || "",
      precio: Number.parseFloat(productSection.dataset.productPrice || "0")
    }
  : null;

//botones de tallas
const botonesTalla = document.querySelectorAll(".tallas button"); // selecciona todos los botones de tallas

botonesTalla.forEach(boton => {// para cada botón, agregamos un evento de click
  boton.addEventListener("click", () => { // cuando se clickea un botón

    // quitar selección previa
    botonesTalla.forEach(b => b.classList.remove("active"));// quita la clase "active" de todos los botones

    // activar el que se clickeó
    boton.classList.add("active");// agrega la clase "active" al botón clickeado

  });
});

const CART_KEY = "maylu_cart";
const qtyInput = document.getElementById("cantidadProducto");
const addButton = document.getElementById("agregarCarrito");
const feedback = document.getElementById("cartFeedback");

const formatter = new Intl.NumberFormat("es-CO", {
  style: "currency",
  currency: "COP",
  minimumFractionDigits: 0
});

const getSelectedSize = () => {
  const active = document.querySelector(".tallas button.active");
  return active ? active.textContent.trim() : "";
};

const setFeedback = (message, isError) => {
  if (!feedback) {
    return;
  }

  feedback.textContent = message;
  feedback.classList.toggle("error", Boolean(isError));
  feedback.classList.toggle("success", !isError && message);
};

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

if (qtyInput) {
  qtyInput.addEventListener("input", () => {
    if (qtyInput.validity && !qtyInput.validity.valid) {
      setFeedback("Ingresa una cantidad valida.", true);
      return;
    }

    setFeedback("", false);
  });
}

if (addButton) {
  addButton.addEventListener("click", () => {
    if (!producto) {
      setFeedback("Producto no disponible.", true);
      return;
    }

    const talla = getSelectedSize();
    if (!talla) {
      setFeedback("Selecciona una talla.", true);
      return;
    }

    if (!qtyInput || (qtyInput.validity && !qtyInput.validity.valid)) {
      setFeedback("Ingresa una cantidad valida.", true);
      return;
    }

    const cantidad = Number.parseInt(qtyInput.value, 10);
    if (!cantidad || cantidad <= 0) {
      setFeedback("Ingresa una cantidad valida.", true);
      return;
    }

    const priceNumber = Number.isFinite(producto.precio) ? producto.precio : 0;
    const cartItems = readCart();
    const existingIndex = cartItems.findIndex(
      (item) => item.id === producto.id && item.talla === talla
    );

    if (existingIndex >= 0) {
      cartItems[existingIndex].cantidad += cantidad;
    } else {
      cartItems.push({
        id: producto.id,
        nombre: producto.nombre,
        talla,
        cantidad,
        precioUnitario: priceNumber,
        precioTexto: formatter.format(priceNumber)
      });
    }

    writeCart(cartItems);
    setFeedback("Producto agregado al carrito.", false);
  });
}