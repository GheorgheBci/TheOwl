"use strict";

document.getElementById('cambiar_foto').addEventListener('click', function () {
    document.getElementById("formulario__cambiar-imagen").style.visibility = 'visible';
});

document.getElementById('cancelar').addEventListener('click', function () {
    document.getElementById("formulario__cambiar-imagen").style.visibility = 'hidden';
});
