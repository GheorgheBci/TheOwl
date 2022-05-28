"use strict";

let activo = false;

const boton = document.getElementById("menu-barra"),
    menu_usuario = document.getElementById("menu_usuario"),
    ordenar = document.getElementById('mostrar-ordenar'),
    alquilar = document.getElementById('alquilar'),
    cerrar = document.getElementById('cerrar-ventana'),
    cerrarMensaje = document.getElementById('cerrar_mensaje'),
    cambiarFoto = document.getElementById('cambiar_foto');
let puntuacion = document.getElementById('puntuacion');

if (cambiarFoto) {
    cambiarFoto.addEventListener('click', function () {
        document.getElementById("formulario__cambiar-imagen").style.visibility = 'visible';
    });

    document.getElementById('cancelar').addEventListener('click', function () {
        document.getElementById("formulario__cambiar-imagen").style.visibility = 'hidden';
    });
}

if (cerrarMensaje) {
    cerrarMensaje.addEventListener('click', function () {
        document.querySelector('.mensaje__div').style.visibility = "hidden";
        document.querySelector('.mensaje').style.visibility = "hidden";
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
