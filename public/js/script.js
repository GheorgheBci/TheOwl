"use strict";

let activo = false;

document.getElementById('u').addEventListener('click', function () {

    if (!activo) {
        document.getElementById("menu_desplegable_usuario").style.visibility = 'visible';
        document.getElementById("flecha").style.visibility = 'visible';
        activo = true;
    } else {
        document.getElementById("menu_desplegable_usuario").style.visibility = 'hidden';
        document.getElementById("flecha").style.visibility = 'hidden';
        activo = false;
    }

});
