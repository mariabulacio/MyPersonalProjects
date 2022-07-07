const btnComentario = document.querySelector("#btnEnviarComentario");

btnComentario.addEventListener("click", (e) => {
    const comentario = document.getElementById("txtComentario").value;

    if (comentario === "" || comentario === null) {
        e.preventDefault();
        alert("Debes agregar un comentario para el alumno.")
    }
});