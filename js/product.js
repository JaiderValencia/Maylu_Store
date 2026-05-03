const productos = [ // me crea un array con todos los productos
  {
    id: 1,
    nombre: "Top Negro",
    precio: "$45.000",
    categoria: "blusas",
    imagen: "top negro.avif",
    descripcion: "Tela fresca, perfecta para ocasiones casuales o formales."
  },
  {
    id: 2,
    nombre: "Jean Wide Leg",
    precio: "$75.000",
    categoria: "pantalones",
    imagen: "jean wide legs.avif",
    descripcion: "Estilo moderno, cómodo y versátil para cualquier ocasión."
  },
  {
    id: 3,
    nombre: "Body Negro",
    precio: "55.000",
    categoria: "bodys",
    imagen: "body negro.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id: 4,
    nombre: "Corset Rojo",
    precio: "55.000",
    categoria: "blusas",
    imagen: "gallery 1.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id:5 ,
    nombre: "Camisa beisbolera",
    precio: "65.000",
    categoria: "blusas",
    imagen: "gallery 2.avif",
    descripcion: "Oversized y cómoda para un estilo casual"
  },
   {
    id: 6,
    nombre: "Body Negro manga larga",
    precio: "60.000",
    categoria: "bodys",
    imagen: "gallery 3.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id: 7,
    nombre: "Conjunto deportivo rosa",
    precio: "110.000",
    categoria: "deportivos",
    imagen: "gallery 4.avif",
    descripcion: "Ideal para actividades físicas y estilo casual"
  },
   {
    id: 8,
    nombre: "Pantalon negro",
    precio: "80.000",
    categoria: "pantalones",
    imagen: "gallery 5.avif",
    descripcion: "estilo wide leg"
  },
   {
    id: 9,
    nombre: "Pantalon con estrellas relieve",
    precio: "100.000",
    categoria: "pantalones",
    imagen: "gallery 6.avif",
    descripcion: "Ideal para actividades físicas y estilo casual"
  },
   {
    id: 10,
    nombre: "Camiseta Negra Ajustada",
    precio: "40.000",
    categoria: "blusas",
    imagen: "gallery 7.avif",
    descripcion: "Ideal para un estilo casual y comodidad"
  },
   {
    id: 11,
    nombre: "Blusa blanca",
    precio: "55.000",
    categoria: "blusas",
    imagen: "gallery 8.avif",
    descripcion: "Ideal para verano y un estilo fresco"
  }

];

window.productos = productos;

// obtener ID de la URL
const params = new URLSearchParams(window.location.search); //obtiene el id desde el url
const id = params.get("id");// extrae el valor del id

// buscar producto que tiene ese id
const producto = productos.find(p => p.id == id);

const nombreEl = document.getElementById("nombreProducto");
const precioEl = document.getElementById("precioProducto");
const descripcionEl = document.getElementById("descripcionProducto");
const imagenEl = document.getElementById("imagenProducto");

if (!producto) {
  if (nombreEl) {
    nombreEl.innerText = "Producto no encontrado";
  }
} else {
  // mostrar datos
  nombreEl.innerText = producto.nombre;
  precioEl.innerText = producto.precio;
  descripcionEl.innerText = producto.descripcion;
  imagenEl.src = "images/productos/" + producto.imagen;
}

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

const parsePrice = (priceText) => {
  const digits = String(priceText || "").replace(/[^\d]/g, "");
  return digits ? Number(digits) : 0;
};

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

    const priceNumber = parsePrice(producto.precio);
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