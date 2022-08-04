document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    function itemExists() {

        if (libroImagenItem) {
            imagenInputDiv.classList.add("hide");
        }
    }

    let libroImagenItem = document.querySelector(".libroImagenItem");
    let imagenInputDiv = document.querySelector(".imagenInputDiv");
    itemExists();
});