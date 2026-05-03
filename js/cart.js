const CART_KEY = "maylu_cart";

const cartBody = document.getElementById("cartBody");
const cartTotal = document.getElementById("cartTotal");
const cartEmpty = document.getElementById("cartEmpty");
const cartTableWrapper = document.getElementById("cartTableWrapper");
const checkoutButton = document.getElementById("checkoutButton");
const checkoutSection = document.getElementById("checkoutSection");
const checkoutForm = document.getElementById("checkoutForm");
const checkoutMessage = document.getElementById("checkoutMessage");

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
        if (checkoutButton) {
            checkoutButton.style.display = "none";
        }
        if (checkoutSection) {
            checkoutSection.classList.add("is-hidden");
        }
        return;
    }

    cartEmpty.style.display = "none";
    cartTableWrapper.style.display = "block";
    if (checkoutButton) {
        checkoutButton.style.display = "inline-flex";
    }

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

const clearFieldErrors = () => {
    if (!checkoutForm) {
        return;
    }

    checkoutForm.querySelectorAll(".field-error").forEach((errorEl) => {
        errorEl.textContent = "";
    });

    checkoutForm.querySelectorAll(".input-error").forEach((inputEl) => {
        inputEl.classList.remove("input-error");
    });
};

const setFieldError = (fieldId, message) => {
    if (!checkoutForm) {
        return;
    }

    const errorEl = checkoutForm.querySelector(`[data-error-for="${fieldId}"]`);
    if (errorEl) {
        errorEl.textContent = message;
    }

    const inputEl = checkoutForm.querySelector(`#${fieldId}`);
    if (inputEl) {
        inputEl.classList.add("input-error");
    }
};

const setInlineError = (fieldKey, message) => {
    if (!checkoutForm) {
        return;
    }

    const errorEl = checkoutForm.querySelector(`[data-error-for="${fieldKey}"]`);
    if (errorEl) {
        errorEl.textContent = message;
    }
};

const validateAddress = (value) => /^[\p{L}\s]{2,}$/u.test(value);
const isValidAddress = (value) => /^[A-Za-z0-9\s#.-]{5,}$/.test(value);

const validateCheckoutForm = () => {
    if (!checkoutForm) {
        return false;
    }

    clearFieldErrors();
    if (checkoutMessage) {
        checkoutMessage.textContent = "";
    }

    let isValid = true;

    const firstName = checkoutForm.querySelector("#firstName");
    const lastName = checkoutForm.querySelector("#lastName");
    const documentType = checkoutForm.querySelector("#documentType");
    const barrio = checkoutForm.querySelector("#barrio");
    const address = checkoutForm.querySelector("#address");
    const terms = checkoutForm.querySelector("#terms");
    const paymentMethod = checkoutForm.querySelector("input[name=paymentMethod]:checked");

    if (!firstName || !firstName.value.trim()) {
        setFieldError("firstName", "Ingresa tu nombre.");
        isValid = false;
    } else if (!validateAddress(firstName.value.trim())) {
        setFieldError("firstName", "Usa solo letras y minimo 2 caracteres.");
        isValid = false;
    }

    if (!lastName || !lastName.value.trim()) {
        setFieldError("lastName", "Ingresa tu apellido.");
        isValid = false;
    } else if (!validateAddress(lastName.value.trim())) {
        setFieldError("lastName", "Usa solo letras y minimo 2 caracteres.");
        isValid = false;
    }

    if (!documentType || !documentType.value) {
        setFieldError("documentType", "Selecciona un tipo de documento.");
        isValid = false;
    }

    if (!barrio || !barrio.value.trim()) {
        setFieldError("barrio", "Ingresa tu barrio.");
        isValid = false;
    } else if (!validateAddress(barrio.value.trim())) {
        setFieldError("barrio", "Usa solo letras y minimo 2 caracteres.");
        isValid = false;
    }

    if (!address || !address.value.trim()) {
        setFieldError("address", "Ingresa tu direccion.");
        isValid = false;
    } else if (!isValidAddress(address.value.trim())) {
        setFieldError("address", "Ingresa una direccion valida.");
        isValid = false;
    }

    if (!paymentMethod) {
        setInlineError("paymentMethod", "Selecciona un metodo de pago.");
        isValid = false;
    }

    if (!terms || !terms.checked) {
        setInlineError("terms", "Debes aceptar los terminos.");
        isValid = false;
    }

    return isValid;
};

if (checkoutButton && checkoutSection) {
    checkoutButton.addEventListener("click", () => {
        checkoutSection.classList.remove("is-hidden");
        checkoutSection.scrollIntoView({ behavior: "smooth", block: "start" });
    });
}

if (checkoutForm) {
    checkoutForm.addEventListener("submit", (event) => {
        event.preventDefault();

        if (!validateCheckoutForm()) {
            return;
        }

        if (checkoutMessage) {
            checkoutMessage.textContent = "Pedido craedo";
        }

        writeCart([]);
        renderCart();

        window.alert("Pedido registrado correctamente.");

        window.location.href = "/index.html";
    });
}

renderCart();
