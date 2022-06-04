"use strict";

let activo = false;

const boton = document.getElementById("menu-barra"),
    menu_usuario = document.getElementById("menu_usuario"),
    ordenar = document.getElementById('mostrar-ordenar'),
    alquilar = document.getElementById('alquilar'),
    crear = document.getElementById('crear'),
    cerrar = document.getElementById('cerrar-ventana'),
    cerrarMensaje = document.getElementById('cerrar_mensaje'),
    cambiarFoto = document.getElementById('cambiar_foto'),
    fichero_portada = document.getElementById('fichero_portada'),
    fichero_contenido = document.getElementById('fichero_contenido');
let puntuacion = document.getElementById('puntuacion');

document.querySelector('#cerrar_menu_admin').addEventListener('click', function () {
    document.querySelector('#menu').style.visibility = 'hidden';
    document.querySelector('.admin__span-menu').style.visibility = 'visible';
});

document.querySelector('#abrir_menu_admin').addEventListener('click', function () {
    document.querySelector('#menu').style.visibility = 'visible';
    document.querySelector('.admin__span-menu').style.visibility = 'hidden';

});

let usuarioRol = document.querySelectorAll('.admin-usuario__rol');
let usuarioInput = document.querySelectorAll('.admin__usuario-input');
let usuarioButton = document.querySelectorAll('.admin__usuario-button');
let usuarioCerrar = document.querySelectorAll('.admin__usuario-button-cerrar');

let editorialNombre = document.querySelectorAll('.admin-editorial__nombre');
let editorialInput = document.querySelectorAll('.admin__editorial-input');
let editorialButton = document.querySelectorAll('.admin__editorial-button');
let editorialCerrar = document.querySelectorAll('.admin__editorial-button-cerrar');

let coleccionNombre = document.querySelectorAll('.admin-coleccion__nombre');
let coleccionInput = document.querySelectorAll('.admin__coleccion-input');
let coleccionButton = document.querySelectorAll('.admin__coleccion-button');
let coleccionCerrar = document.querySelectorAll('.admin__coleccion-button-cerrar');

let autorNombre = document.querySelectorAll('.admin-autor__nombre');
let autorInput = document.querySelectorAll('.admin__autor-input');
let autorButton = document.querySelectorAll('.admin__autor-button');
let autorCerrar = document.querySelectorAll('.admin__autor-button-cerrar');

let autorApellido1 = document.querySelectorAll('.admin-autor__ape1');
let autorApe1Input = document.querySelectorAll('.admin__autor-ape1-input');
let autorApe1Button = document.querySelectorAll('.admin__autor-ape1-button');
let autorApe1Cerrar = document.querySelectorAll('.admin__autor-ape1-button-cerrar');

let autorApellido2 = document.querySelectorAll('.admin-autor__ape2');
let autorApe2Input = document.querySelectorAll('.admin__autor-ape2-input');
let autorApe2Button = document.querySelectorAll('.admin__autor-ape2-button');
let autorApe2Cerrar = document.querySelectorAll('.admin__autor-ape2-button-cerrar');

if (autorApellido2) {

    for (let i = 0; i < autorApellido2.length; i++) {
        autorApellido2[i].addEventListener('click', function () {
            autorApellido2[i].style.visibility = 'hidden';
            autorApellido2[i].style.position = 'absolute';

            autorApe2Input[i].style.visibility = 'visible';
            autorApe2Input[i].style.position = 'relative';

            autorApe2Button[i].style.visibility = 'visible';
            autorApe2Button[i].style.position = 'relative';

            autorApe2Cerrar[i].style.visibility = 'visible';
            autorApe2Cerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < autorApe2Cerrar.length; j++) {
        autorApe2Cerrar[j].addEventListener('click', function () {
            autorApellido2[j].style.visibility = 'visible';
            autorApellido2[j].style.position = 'relative';

            autorApe2Input[j].style.visibility = 'hidden';
            autorApe2Input[j].style.position = 'absolute';

            autorApe2Button[j].style.visibility = 'hidden';
            autorApe2Button[j].style.position = 'absolute';

            autorApe2Cerrar[j].style.visibility = 'hidden';
            autorApe2Cerrar[j].style.position = 'absolute';
        });
    }
}

if (autorApellido1) {

    for (let i = 0; i < autorApellido1.length; i++) {
        autorApellido1[i].addEventListener('click', function () {
            autorApellido1[i].style.visibility = 'hidden';
            autorApellido1[i].style.position = 'absolute';

            autorApe1Input[i].style.visibility = 'visible';
            autorApe1Input[i].style.position = 'relative';

            autorApe1Button[i].style.visibility = 'visible';
            autorApe1Button[i].style.position = 'relative';

            autorApe1Cerrar[i].style.visibility = 'visible';
            autorApe1Cerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < autorApe1Cerrar.length; j++) {
        autorApe1Cerrar[j].addEventListener('click', function () {
            autorApellido1[j].style.visibility = 'visible';
            autorApellido1[j].style.position = 'relative';

            autorApe1Input[j].style.visibility = 'hidden';
            autorApe1Input[j].style.position = 'absolute';

            autorApe1Button[j].style.visibility = 'hidden';
            autorApe1Button[j].style.position = 'absolute';

            autorApe1Cerrar[j].style.visibility = 'hidden';
            autorApe1Cerrar[j].style.position = 'absolute';
        });
    }
}


if (autorNombre) {

    for (let i = 0; i < autorNombre.length; i++) {
        autorNombre[i].addEventListener('click', function () {
            autorNombre[i].style.visibility = 'hidden';
            autorNombre[i].style.position = 'absolute';

            autorInput[i].style.visibility = 'visible';
            autorInput[i].style.position = 'relative';

            autorButton[i].style.visibility = 'visible';
            autorButton[i].style.position = 'relative';

            autorCerrar[i].style.visibility = 'visible';
            autorCerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < autorCerrar.length; j++) {
        autorCerrar[j].addEventListener('click', function () {
            autorNombre[j].style.visibility = 'visible';
            autorNombre[j].style.position = 'relative';

            autorInput[j].style.visibility = 'hidden';
            autorInput[j].style.position = 'absolute';

            autorButton[j].style.visibility = 'hidden';
            autorButton[j].style.position = 'absolute';

            autorCerrar[j].style.visibility = 'hidden';
            autorCerrar[j].style.position = 'absolute';
        });
    }
}

if (coleccionNombre) {

    for (let i = 0; i < coleccionNombre.length; i++) {
        coleccionNombre[i].addEventListener('click', function () {
            coleccionNombre[i].style.visibility = 'hidden';
            coleccionNombre[i].style.position = 'absolute';

            coleccionInput[i].style.visibility = 'visible';
            coleccionInput[i].style.position = 'relative';

            coleccionButton[i].style.visibility = 'visible';
            coleccionButton[i].style.position = 'relative';

            coleccionCerrar[i].style.visibility = 'visible';
            coleccionCerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < coleccionCerrar.length; j++) {
        coleccionCerrar[j].addEventListener('click', function () {
            coleccionNombre[j].style.visibility = 'visible';
            coleccionNombre[j].style.position = 'relative';

            coleccionInput[j].style.visibility = 'hidden';
            coleccionInput[j].style.position = 'absolute';

            coleccionButton[j].style.visibility = 'hidden';
            coleccionButton[j].style.position = 'absolute';

            coleccionCerrar[j].style.visibility = 'hidden';
            coleccionCerrar[j].style.position = 'absolute';
        });
    }
}

if (editorialNombre) {

    for (let i = 0; i < editorialNombre.length; i++) {
        editorialNombre[i].addEventListener('click', function () {
            editorialNombre[i].style.visibility = 'hidden';
            editorialNombre[i].style.position = 'absolute';

            editorialInput[i].style.visibility = 'visible';
            editorialInput[i].style.position = 'relative';

            editorialButton[i].style.visibility = 'visible';
            editorialButton[i].style.position = 'relative';

            editorialCerrar[i].style.visibility = 'visible';
            editorialCerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < editorialCerrar.length; j++) {
        editorialCerrar[j].addEventListener('click', function () {
            editorialNombre[j].style.visibility = 'visible';
            editorialNombre[j].style.position = 'relative';

            editorialInput[j].style.visibility = 'hidden';
            editorialInput[j].style.position = 'absolute';

            editorialButton[j].style.visibility = 'hidden';
            editorialButton[j].style.position = 'absolute';

            editorialCerrar[j].style.visibility = 'hidden';
            editorialCerrar[j].style.position = 'absolute';
        });
    }
}

if (usuarioRol) {

    for (let i = 0; i < usuarioRol.length; i++) {
        usuarioRol[i].addEventListener('click', function () {
            usuarioRol[i].style.visibility = 'hidden';
            usuarioRol[i].style.position = 'absolute';

            usuarioInput[i].style.visibility = 'visible';
            usuarioInput[i].style.position = 'relative';

            usuarioButton[i].style.visibility = 'visible';
            usuarioButton[i].style.position = 'relative';

            usuarioCerrar[i].style.visibility = 'visible';
            usuarioCerrar[i].style.position = 'relative';
        });
    }

    for (let j = 0; j < usuarioCerrar.length; j++) {
        usuarioCerrar[j].addEventListener('click', function () {
            usuarioRol[j].style.visibility = 'visible';
            usuarioRol[j].style.position = 'relative';

            usuarioInput[j].style.visibility = 'hidden';
            usuarioInput[j].style.position = 'absolute';

            usuarioButton[j].style.visibility = 'hidden';
            usuarioButton[j].style.position = 'absolute';

            usuarioCerrar[j].style.visibility = 'hidden';
            usuarioCerrar[j].style.position = 'absolute';
        });
    }
}



if (fichero_portada || fichero_contenido) {
    fichero_portada.addEventListener('click', function () {
        document.getElementById('portada').type = 'file';
        document.querySelector('#portada').classList.remove('editar-ejemplar__input');
        fichero_portada.style.visibility = 'hidden';
        document.querySelector('#cerrar__fichero-portada').style.visibility = 'visible';
    });

    document.querySelector('#cerrar__fichero-portada').addEventListener('click', function () {
        document.getElementById('portada').type = 'text';
        document.querySelector('#portada').classList.add('editar-ejemplar__input');
        fichero_portada.style.visibility = 'visible';
        document.querySelector('#cerrar__fichero-portada').style.visibility = 'hidden';
    });

    fichero_contenido.addEventListener('click', function () {
        document.getElementById('contenido').type = 'file';
        document.querySelector('#contenido').classList.remove('editar-ejemplar__input');
        fichero_contenido.style.visibility = 'hidden';
        document.querySelector('#cerrar__fichero-contenido').style.visibility = 'visible';
    });

    document.querySelector('#cerrar__fichero-contenido').addEventListener('click', function () {
        document.getElementById('contenido').type = 'text';
        document.querySelector('#contenido').classList.add('editar-ejemplar__input');
        fichero_contenido.style.visibility = 'visible';
        document.querySelector('#cerrar__fichero-contenido').style.visibility = 'hidden';
    });
}

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

if (crear) {
    crear.addEventListener('click', function () {
        document.getElementById('fondo').classList.add('active');
        document.getElementById('ventana-crear').classList.add('active');
    });

    cerrar.addEventListener('click', function () {
        document.getElementById('fondo').classList.remove('active');
        document.getElementById('ventana-crear').classList.remove('active');
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
