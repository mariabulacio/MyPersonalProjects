const btnEnviarForm = document.querySelector("#btnEnviar");
const form = document.querySelector("form");

//Reiniciamos inputs al cargar nuevamente la pagina
window.onload = () => form.reset();

btnEnviarForm.addEventListener("click", (e) => {
    if (!validarFormulario())
        e.preventDefault();
});

function validarFormulario() {
    const nombre = document.getElementById("txtNombre").value;
    const apellido = document.getElementById("txtApellido").value;
    const email = document.getElementById("txtEmail").value;
    const dni = document.getElementById("txtDocumento").value;
    const turno = document.getElementById("ddlTurnos").value; 
    const expRegNumeros = /[0-9]/;
    const expRegLetras = /^[a-zA-ZÀ-ÿ\s]/;
    const expRegEmail = /^[-\w.%+]{1,64}@{1}(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i

    if (nombre.length == 0 || (!expRegLetras.test(nombre))) {
        alert("Debes completar tu nombre y solo se admiten letras");
        return false;
    }

    if (apellido.length == 0 || (expRegNumeros.test(apellido))) {
        alert("Debes completar tu apellido y solo se admiten letras");
        return false;
    }

    if (email.length == 0 || (!expRegEmail.test(email))) {
        alert("debes completar tu email de forma correcta")
        return false;
    }

    if (dni.length == 0 || (!expRegNumeros.test(dni))) {
        alert("debes ingresar tu DNI y solo se admiten números")
        return false;
    }

    if (turno === "Seleccione turno") {
        alert("Debes seleccionar un turno de preferencia");
        return false;
    }
    return true;
}

