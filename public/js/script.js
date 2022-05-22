"use strict";

let activo = false;

const boton = document.getElementById("menu-barra");
const menu_usuario = document.getElementById("menu_usuario");
const ordenar = document.getElementById('mostrar-ordenar');

let puntuacion = document.getElementById('puntuacion');

if (puntuacion) {
    const estrellas = document.getElementsByClassName('puntuacion__a');

    for (let i = 0; i < puntuacion.innerHTML; i++) {
        estrellas[i].style.color = "rgb(228, 228, 40)";
    }
}

if (ordenar) {
    ordenar.addEventListener('click', function () {

        if (!activo) {
            document.getElementById('opciones-ordenar').style.visibility = "visible";
            activo = true;
        } else {
            document.getElementById('opciones-ordenar').style.visibility = "hidden";
            activo = false;
        }
    });
}

if (boton) {
    boton.addEventListener("click", function () {

        if (!activo) {
            anime({
                targets: '#menu-barra',
                translateX: 150,
                duration: 200,
                easing: 'linear'
            });
            anime({
                targets: '#c',
                translateX: 150,
                duration: 200,
                easing: 'linear'
            });

            activo = true;

        } else {
            anime({
                targets: '#menu-barra',
                translateX: 0,
                duration: 200,
                easing: 'linear'
            });
            anime({
                targets: '#c',
                translateX: 0,
                duration: 200,
                easing: 'linear'
            });

            activo = false;
        }
    })
}

if (menu_usuario) {
    document.getElementById('menu_usuario').addEventListener("click", function () {
        if (!activo) {
            anime({
                targets: '.menu_user_account',
                translateX: 150,
                duration: 1000,
                easing: 'linear'
            });

            activo = true;

        } else {
            anime({
                targets: '.menu_user_account',
                translateX: 0,
                duration: 1000,
                easing: 'linear'
            });

            activo = false;
        }
    })

}
