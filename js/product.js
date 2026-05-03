const productos = [ // me crea un array con todos los productos
  {
    id: 1,
    nombre: "Top Negro",
    precio: "$45.000",
    imagen: "top negro.avif",
    descripcion: "Tela fresca, perfecta para ocasiones casuales o formales."
  },
  {
    id: 2,
    nombre: "Jean Wide Leg",
    precio: "$75.000",
    imagen: "jean wide legs.avif",
    descripcion: "Estilo moderno, cómodo y versátil para cualquier ocasión."
  },
  {
    id: 3,
    nombre: "Body Negro",
    precio: "55.000",
    imagen: "body negro.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id: 4,
    nombre: "Corset Rojo",
    precio: "55.000",
    imagen: "gallery 1.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id:5 ,
    nombre: "Camisa beisbolera",
    precio: "65.000",
    imagen: "gallery 2.avif",
    descripcion: "Oversized y cómoda para un estilo casual"
  },
   {
    id: 6,
    nombre: "Body Negro manga larga",
    precio: "60.000",
    imagen: "gallery 3.avif",
    descripcion: "Ideal para resaltar tu figura"
  },
   {
    id: 7,
    nombre: "Conjunto deportivo rosa",
    precio: "110.000",
    imagen: "gallery 4.avif",
    descripcion: "Ideal para actividades físicas y estilo casual"
  },
   {
    id: 8,
    nombre: "Pantalon negro",
    precio: "80.000",
    imagen: "gallery 5.avif",
    descripcion: "estilo wide leg"
  },
   {
    id: 9,
    nombre: "Pantalon con estrellas relieve",
    precio: "100.000",
    imagen: "gallery 6.avif",
    descripcion: "Ideal para actividades físicas y estilo casual"
  },
   {
    id: 10,
    nombre: "Camiseta Negra Ajustada",
    precio: "40.000",
    imagen: "gallery 7.avif",
    descripcion: "Ideal para un estilo casual y comodidad"
  },
   {
    id: 11,
    nombre: "Blusa blanca",
    precio: "55.000",
    imagen: "gallery 8.avif",
    descripcion: "Ideal para verano y un estilo fresco"
  }

];

// obtener ID de la URL
const params = new URLSearchParams(window.location.search); //obtiene el id desde el url
const id = params.get("id");// extrae el valor del id

// buscar producto que tiene ese id
const producto = productos.find(p => p.id == id);

// mostrar datos 
document.getElementById("nombreProducto").innerText = producto.nombre;
document.getElementById("precioProducto").innerText = producto.precio;
document.getElementById("descripcionProducto").innerText = producto.descripcion;
document.getElementById("imagenProducto").src = "images/productos/" + producto.imagen;

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