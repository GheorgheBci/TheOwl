"use strict";

document.getElementById('cambiar_foto').addEventListener('click', function () {
    document.getElementById("form").style.visibility = 'visible';
});

document.getElementById('cancelar').addEventListener('click', function () {
    document.getElementById("form").style.visibility = 'hidden';
});
