"use strict";

let activo = false;

var boton = document.getElementById("menu-barra");

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
