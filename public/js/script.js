"use strict";

let activo = false,
    puntuacion = document.querySelector('#puntuacion');

if ($('#mostrar-ordenar')) {

    $('#mostrar-ordenar').click(function () {

        if (!activo) {
            $('#opciones-ordenar').css('visibility', "visible");
            activo = true;
        } else {
            $('#opciones-ordenar').css('visibility', "hidden");
            activo = false;
        }
    });
}

if (puntuacion) {
    const estrellas = document.querySelectorAll('.puntuacion__a');
    let sonido = document.querySelector('#sonido-puntuar');

    for (let j = 0; j < estrellas.length; j++) {
        estrellas[j].addEventListener('click', function () {
            sonido.play();
        })
    }

    for (let i = 0; i < puntuacion.innerHTML; i++) {
        estrellas[i].style.color = "rgb(228, 228, 40)";
    }
}

if ($('#alquilar') && $('#cerrar-ventana')) {

    $('#alquilar').click(function () {
        document.querySelector('#fondo').classList.add('active');
        document.querySelector('#ventana-alquilar').classList.add('active');
    });

    $('#cerrar-ventana').click(function () {
        document.querySelector('#fondo').classList.remove('active');
        document.querySelector('#ventana-alquilar').classList.remove('active');
    });
}

if ($('#crear')) {

    $('#crear').click(function () {
        document.querySelector('#fondo').classList.add('active');
        document.querySelector('#ventana-crear').classList.add('active');
    });

    $('#cerrar-ventana').click(function () {
        document.querySelector('#fondo').classList.remove('active');
        document.querySelector('#ventana-crear').classList.remove('active');
    });
}

if ($('#cerrar_mensaje')) {

    $('#cerrar_mensaje').click(function () {
        $('.mensaje__div').css('visibility', 'hidden');
        $('.mensaje').css('visibility', 'hidden');
    });
}

if ($('#fichero_portada') || $('#fichero_contenido')) {

    $('#fichero_portada').click(function () {
        document.querySelector('#portada').type = 'file';
        document.querySelector('#portada').classList.remove('editar-ejemplar__input');
        $('#fichero_portada').css('visibility', 'hidden');
        $('#cerrar__fichero-portada').css('visibility', 'visible');
    });

    $('#cerrar__fichero-portada').click(function () {
        document.querySelector('#portada').type = 'text';
        document.querySelector('#portada').classList.add('editar-ejemplar__input');
        $('#fichero_portada').css('visibility', 'visible');
        $('#cerrar__fichero-portada').css('visibility', 'hidden');
    });

    $('#fichero_contenido').click(function () {
        document.querySelector('#contenido').type = 'file';
        document.querySelector('#contenido').classList.remove('editar-ejemplar__input');
        $('#fichero_contenido').css('visibility', 'hidden');
        $('#cerrar__fichero-contenido').css('visibility', 'visible');
    });

    $('#cerrar__fichero-contenido').click(function () {
        document.querySelector('#contenido').type = 'text';
        document.querySelector('#contenido').classList.add('editar-ejemplar__input');
        $('#fichero_contenido').css('visibility', 'visible');
        $('#cerrar__fichero-contenido').css('visibility', 'hidden');
    });
}

if ($('#abrir_menu_admin') && $('#cerrar_menu_admin')) {

    $('#abrir_menu_admin').click(function () {
        $('#menu').css('visibility', 'visible');
        $('.admin__span-menu').css('visibility', 'hidden');
    });

    $('#cerrar_menu_admin').click(function () {
        $('#menu').css('visibility', 'hidden');
        $('.admin__span-menu').css('visibility', 'visible');
    });
}

if ($('#imagen')) {

    $('#imagen').change(function () {
        $('#cargar-imagen').submit();
    });
}

let usuarioRol = document.querySelectorAll('.admin-usuario__rol');
let usuarioInput = document.querySelectorAll('.admin__usuario-input');
let usuarioButton = document.querySelectorAll('.admin__usuario-button');
let usuarioCerrar = document.querySelectorAll('.admin__usuario-button-cerrar');

modificarValores(usuarioRol, usuarioInput, usuarioButton, usuarioCerrar);

let editorialNombre = document.querySelectorAll('.admin-editorial__nombre');
let editorialInput = document.querySelectorAll('.admin__editorial-input');
let editorialButton = document.querySelectorAll('.admin__editorial-button');
let editorialCerrar = document.querySelectorAll('.admin__editorial-button-cerrar');

modificarValores(editorialNombre, editorialInput, editorialButton, editorialCerrar);

let coleccionNombre = document.querySelectorAll('.admin-coleccion__nombre');
let coleccionInput = document.querySelectorAll('.admin__coleccion-input');
let coleccionButton = document.querySelectorAll('.admin__coleccion-button');
let coleccionCerrar = document.querySelectorAll('.admin__coleccion-button-cerrar');

modificarValores(coleccionNombre, coleccionInput, coleccionButton, coleccionCerrar);

let autorNombre = document.querySelectorAll('.admin-autor__nombre');
let autorInput = document.querySelectorAll('.admin__autor-input');
let autorButton = document.querySelectorAll('.admin__autor-button');
let autorCerrar = document.querySelectorAll('.admin__autor-button-cerrar');

modificarValores(autorNombre, autorInput, autorButton, autorCerrar);

let autorApellido1 = document.querySelectorAll('.admin-autor__ape1');
let autorApe1Input = document.querySelectorAll('.admin__autor-ape1-input');
let autorApe1Button = document.querySelectorAll('.admin__autor-ape1-button');
let autorApe1Cerrar = document.querySelectorAll('.admin__autor-ape1-button-cerrar');

modificarValores(autorApellido1, autorApe1Input, autorApe1Button, autorApe1Cerrar);

let autorApellido2 = document.querySelectorAll('.admin-autor__ape2');
let autorApe2Input = document.querySelectorAll('.admin__autor-ape2-input');
let autorApe2Button = document.querySelectorAll('.admin__autor-ape2-button');
let autorApe2Cerrar = document.querySelectorAll('.admin__autor-ape2-button-cerrar');

modificarValores(autorApellido2, autorApe2Input, autorApe2Button, autorApe2Cerrar);

function modificarValores(span, input, button, buttonCerrar) {

    for (let i = 0; i < span.length; i++) {
        span[i].addEventListener('click', function () {
            span[i].style.visibility = 'hidden';
            span[i].style.position = 'absolute';

            input[i].style.visibility = 'visible';
            input[i].style.position = 'relative';

            button[i].style.visibility = 'visible';
            button[i].style.position = 'relative';

            buttonCerrar[i].style.visibility = 'visible';
            buttonCerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < buttonCerrar.length; j++) {
        buttonCerrar[j].addEventListener('click', function () {
            span[j].style.visibility = 'visible';
            span[j].style.position = 'relative';

            input[j].style.visibility = 'hidden';
            input[j].style.position = 'absolute';

            button[j].style.visibility = 'hidden';
            button[j].style.position = 'absolute';

            buttonCerrar[j].style.visibility = 'hidden';
            buttonCerrar[j].style.position = 'absolute';
        });
    }
}

if ($('#menu-barra')) {
    $('#menu-barra').click(function () {

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

if ($('#menu_usuario')) {
    $('#menu_usuario').click(function () {
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
