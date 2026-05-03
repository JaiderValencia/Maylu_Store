const productsGrid = document.getElementById("productsGrid");
const categoryLinks = document.querySelectorAll(".category-link");

const allProducts = Array.isArray(window.productos) ? window.productos : [];

const getCategoryFromUrl = () => {
  const params = new URLSearchParams(window.location.search);
  return params.get("cat") || "todos";
};

const setActiveCategory = (category) => {
  categoryLinks.forEach((link) => {
    const linkCategory = link.dataset.category;
    if (linkCategory === category) {
      link.classList.add("active");
    } else {
      link.classList.remove("active");
    }
  });
};

const createProductCard = (product) => {
  const link = document.createElement("a");
  link.href = `producto.html?id=${product.id}`;
  link.className = "product-link";

  const card = document.createElement("div");
  card.className = "feature-item";

  const imgContainer = document.createElement("div");
  imgContainer.className = "img-container";

  const image = document.createElement("img");
  image.src = `images/productos/${product.imagen}`;
  image.alt = product.nombre;

  const title = document.createElement("h3");
  title.textContent = product.nombre;

  const description = document.createElement("p");
  description.textContent = product.descripcion;

  const price = document.createElement("span");
  price.textContent = product.precio;

  imgContainer.appendChild(image);
  card.appendChild(imgContainer);
  card.appendChild(title);
  card.appendChild(description);
  card.appendChild(price);
  link.appendChild(card);

  return link;
};

const renderProducts = (category) => {
  if (!productsGrid) {
    return;
  }

  const selectedCategory = category === "todos" ? "todos" : category;
  const filteredProducts = selectedCategory === "todos"
    ? allProducts
    : allProducts.filter((product) => product.categoria === selectedCategory);

  productsGrid.innerHTML = "";
  filteredProducts.forEach((product) => {
    productsGrid.appendChild(createProductCard(product));
  });

  setActiveCategory(selectedCategory);
};

categoryLinks.forEach((link) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();
    const category = link.dataset.category || "todos";
    const url = new URL(window.location.href);
    url.searchParams.set("cat", category);
    window.history.replaceState({}, "", url.toString());
    renderProducts(category);
  });
});

renderProducts(getCategoryFromUrl());
