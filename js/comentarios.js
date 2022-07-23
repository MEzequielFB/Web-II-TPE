document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    let comentariosDiv = document.querySelector(".comentariosDiv");
    let libroId = comentariosDiv.id.match(/(\d+)/); //Matchea si hay un número en el id del div y se guarda en un array
    console.log("ID libro: "+libroId[0]); //Se muestra el número en consola

    async function showComentarios() {

        try {

            let response = await fetch("api/comentarios/"+libroId[0]); //Se usa el número para obtener los comentarios de un libro en específico
            if (response.ok) {

                let json = await response.json();

                comentariosDiv.innerHTML = "";
                for (let comentario of json) {

                    comentariosDiv.innerHTML +=
                    `<div class="comentarioDiv">
                        <h4>${comentario.usuario}</h4>
                        <p>${comentario.contenido}</p>
                        <p>Puntuación: ${comentario.puntuacion}</p>
                        <img src="img/delete.png">
                    </div>`;
                }
            } else {
                console.log("No se pudo acceder a los comentarios");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    showComentarios();
});