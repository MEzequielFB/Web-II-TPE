document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    let url = "api/comentarios/";

    let comentariosDiv = document.querySelector(".comentariosDiv");
    let libroId = comentariosDiv.id.match(/(\d+)/); //Matchea si hay un número en el id del div y se guarda en un array
    console.log("ID libro: "+libroId[0]); //Se muestra el número en consola

    let app = new Vue({
        
        el: ".comentariosDiv",
        data: {
            comentarios: [], //Array de comentarios
            icono: "" //Src de las imágenes de los botones que ordenan los comentarios
        }
    });

    async function showComentarios(/*sortPuntuacion = null, sortAntiguedad = null*/) { //Parámetros para ordenar los comentarios del lado del cliente

        try {

            let response = await fetch(url+libroId[0]); //Se usa el número para obtener los comentarios de un libro en específico
            if (response.ok) {

                let comentarios = await response.json();

                /*if (sortPuntuacion == "desc") { Ordena desde el lado del cliente

                    comentarios.sort(function(a, b) {
                        return b.puntuacion - a.puntuacion;
                    });
                } else if (sortPuntuacion == "asc") {

                    comentarios.sort(function(a, b) {
                        return a.puntuacion - b.puntuacion;
                    });
                } else if (sortAntiguedad != null) {

                    comentarios.sort(function(a, b) {
                        return b.id - a.id;
                    });
                }*/
                
                console.log(comentarios);

                app.comentarios = comentarios;
                //Agrega comportamiento a los botones luego de un segundo (sin timeOut no da tiempo a cargar los comentarios)
                setTimeout(darComportamientoBtns, 1000);
            } else {
                console.log("No se pudo acceder a los comentarios");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    //Ordena comentarios desde el lado del servidor
    async function showComentariosSort(campo, orden) { //Campo: puntuación o id, orden: ASC o DESC

        try {

            let response = await fetch(url+libroId[0]+"/sort/"+campo+"/"+orden); // api/comentarios/sort/'puntuacion'/'DESC'
            if (response.ok) {

                let comentarios = await response.json();
                console.log(comentarios);

                app.comentarios = comentarios;
                setTimeout(darComportamientoBtns, 1000);
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
            let response = await fetch(url, {
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

    async function deleteComentario(id) {
        
        try {

            let response = await fetch(url+id, {
                "method": "DELETE"
            });
            if (response.ok) {

                let json = await response.json();
                console.log(json);

                showComentarios();
            } else {
                console.log("No se pudo eliminar el comentario");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    function darComportamientoBtns() {

        let comentarioDeleteBtns = document.querySelectorAll(".comentarioDeleteBtn");
        for (let btn of comentarioDeleteBtns) {

            if (!btn.classList.contains("comportamientoON")) {

                btn.classList.add("comportamientoON");
                btn.addEventListener("click", function(){
                    deleteComentario(btn.id);
                });
            }
            
        }
    }

    async function filterComentariosByPuntuacion() {

        //let puntuacion = puntuacionFilterBtn.previousElementSibling.value;
        let puntuacion = puntuacionFilterSelect.value;
        if (puntuacion == 0) {
            showComentarios();
            return;
        }

        try {

            let response = await fetch(url+libroId[0]+"/puntuacion/"+puntuacion);
            if (response.ok) {

                let comentarios = await response.json();
                console.log(comentarios);

                app.comentarios = comentarios;
                setTimeout(darComportamientoBtns, 1000);
            } else {
                console.log("Error al obtener comentarios");
            }
        }
        catch(error) {
            console.log(error);
        }
    }

    let comentarioBtn = document.querySelector("#comentarioBtn");
    comentarioBtn.addEventListener("click", addComentario);
    
    let puntuacionImg = document.querySelector(".puntuacionImg");
    let antiguedadImg = document.querySelector(".antiguedadImg");

    let sortPuntuacionBtn = document.querySelector(".sortPuntuacionBtn");
    sortPuntuacionBtn.addEventListener("click", function(){        

        if (app.icono == "" || app.icono == "img/up-arrow.png") {

            showComentariosSort("puntuacion", "DESC"); //De mayor puntaje a menor
            app.icono = "img/down-arrow.png";

            puntuacionImg.classList.remove("hide");
            antiguedadImg.classList.add("hide");
        } else {

            showComentariosSort("puntuacion", "ASC"); //De menor puntaje a mayor
            app.icono = "img/up-arrow.png";

            puntuacionImg.classList.remove("hide");
            antiguedadImg.classList.add("hide");
        }
    });

    let sortAntiguedadBtn = document.querySelector(".sortAntiguedadBtn");
    sortAntiguedadBtn.addEventListener("click", function(){

        if (app.icono == "" || app.icono == "img/up-arrow.png") {

            showComentariosSort("id", "DESC"); //De recientes a antiguos
            app.icono = "img/down-arrow.png";

            puntuacionImg.classList.add("hide");
            antiguedadImg.classList.remove("hide");
        } else {

            showComentarios(); //De más antiguos a recientes
            app.icono = "img/up-arrow.png";

            puntuacionImg.classList.add("hide");
            antiguedadImg.classList.remove("hide");
        }
    });

    let puntuacionFilterSelect = this.querySelector("#puntuacionFilterSelect");
    puntuacionFilterSelect.addEventListener("input", filterComentariosByPuntuacion);

    showComentarios();
});