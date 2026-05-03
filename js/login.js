const form = document.getElementById("loginForm"); //busca el formulario por su id y lo guarda en la variable form
const mensaje = document.getElementById("mensaje");//busca el elemento donde se mostraran los mensajes de error o exito y lo guarda en la variable mensaje

form.addEventListener("submit", function(e) { //escucha el evento submit del formulario, cuando se envie el formulario ejecuta la funcion
    e.preventDefault();//evita que el formulario se envie y recargue la pagina, esto es necesario para poder validar los campos antes de enviar

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    //  Validar campos vacíos
    if (email === "" || password === "") {
        mensaje.style.color = "red";
        mensaje.innerText = "Todos los campos son obligatorios";
        return;
    }

    // Validar que sea gmail 
    if (!email.endsWith("@gmail.com")) {
        mensaje.style.color = "red";
        mensaje.innerText = "Debe ingresar un correo Gmail válido";
        return;
    }

    // mandamos mensaje de exito
    mensaje.style.color = "green";
    mensaje.innerText = "Inicio de sesión exitoso";

    // redireccionamos a la pagina principal despues de 800 milisegundos para que el usuario vea el mensaje de exito antes de ser redirigido
    setTimeout(() => {
        window.location.href = "index.html";
    }, 800);
});