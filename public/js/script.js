"use strict";

let activo = false;

const boton = document.getElementById("menu-barra");
const menu_usuario = document.getElementById("menu_usuario");
const ordenar = document.getElementById('mostrar-ordenar');
const alquilar = document.getElementById('alquilar');
const cerrar = document.getElementById('cerrar-ventana');
const cerrarMensaje = document.getElementById('cerrar_mensaje');
let puntuacion = document.getElementById('puntuacion');

if (cerrarMensaje) {
    cerrarMensaje.addEventListener('click', function () {
        document.getElementById('mensaje').style.visibility = "hidden";
        document.getElementById('fon').style.visibility = "hidden";
    });
}

if (alquilar && cerrar) {
    alquilar.addEventListener('click', function () {
        document.getElementById('fondo').classList.add('active');
        document.getElementById('ventana-alquilar').classList.add('active');
    });

    cerrar.addEventListener('click', function () {
        document.getElementById('fondo').classList.remove('active');
        document.getElementById('ventana-alquilar').classList.remove('active');
    });
}

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
