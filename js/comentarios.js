document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    let comentariosDiv = document.querySelector(".comentariosDiv");
    let libroId = comentariosDiv.id.match(/(\d+)/); //Matchea si hay un número en el id del div y se guarda en un array
    console.log("ID libro: "+libroId[0]); //Se muestra el número en consola

    let app = new Vue({
        
        el: ".comentariosDiv",
        data: {
            comentarios: []
        }
    });

    async function showComentarios() {

        try {

            let response = await fetch("api/comentarios/"+libroId[0]); //Se usa el número para obtener los comentarios de un libro en específico
            if (response.ok) {

                let comentarios = await response.json();
                app.comentarios = comentarios;

                /*comentariosDiv.innerHTML = "";
                for (let comentario of json) {

                    comentariosDiv.innerHTML +=
                    `<div class="comentarioDiv">
                        <h4>${comentario.usuario}</h4>
                        <p>${comentario.contenido}</p>
                        <p>Puntuación: ${comentario.puntuacion}</p>
                        <img src="img/delete.png">
                    </div>`;
                }*/
            } else {
                console.log("No se pudo acceder a los comentarios");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    async function addComentario() {

        let comentario =
        {
            "contenido": document.querySelector("#comentarioInput").value,
            "puntuacion": document.querySelector("#comentarioSelect").value,
            "id_usuario": document.querySelector(".usuarioIdInput").value,
            "id_libro": libroId[0]
        }

        try {
            let response = await fetch("api/comentarios", {
                "method": "POST",
                "headers": {
                    "Content-Type": "application/json"
                },
                "body": JSON.stringify(comentario)
            });
            if (response.ok) {

                let json = await response.json();
                console.log(json);
                
                showComentarios();
            } else {
                console.log("No se pudo insertar el comentario");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    let comentarioBtn = document.querySelector("#comentarioBtn");
    comentarioBtn.addEventListener("click", addComentario);

    showComentarios();
});