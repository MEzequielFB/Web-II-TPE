document.addEventListener("DOMContentLoaded", function(){
    "use strict";

    let alerta = document.querySelector(".alertaSelect");
    document.querySelector("form").addEventListener("submit", function(e){

        if (document.querySelector("#autorSelect").value == "noAutor") {
            e.preventDefault();

            alerta.classList.remove("hide");
            alerta.innerHTML = "Ingrese un autor";
        } else {
            alerta.classList.add("hide");
        }
    });
});