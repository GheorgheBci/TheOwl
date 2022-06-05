"use strict";

const url = document.querySelector('#url').value,
    zoomRange = 0.25,
    canvas = document.querySelector('#pdf'),
    ctx = canvas.getContext('2d');

let pdfDoc = null,
    pageNum = 1,
    pageIsRendering = false,
    pageNumIsPending = null,
    scale = 0.99;

// Renderizar la página
function renderPage(num) {
    pageIsRendering = true;

    // Obtener página
    pdfDoc.getPage(num).then(page => {
        // Establecer el tamaño del pdf
        const viewport = page.getViewport({
            scale
        });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderCtx = {
            canvasContext: ctx,
            viewport
        };

        page.render(renderCtx).promise.then(() => {
            pageIsRendering = false;

            if (pageNumIsPending !== null) {
                renderPage(pageNumIsPending);
                pageNumIsPending = null;
            }
        });

        // Mostrar la página en la que estamos
        document.querySelector('#pagina').textContent = num;
    });
};

// Comprobación de las páginas que se están procesando
function queueRenderPage(num) {
    if (pageIsRendering) {
        pageNumIsPending = num;
    } else {
        renderPage(num);
    }
};

// Mostrar la página anterior
function mostrarPagAnterior() {
    if (pageNum <= 1) {
        return;
    }

    pageNum--;
    queueRenderPage(pageNum);
};

// Mostrar la siguiente página
function mostrarSigPagina() {
    if (pageNum >= pdfDoc.numPages) {
        return;
    }

    pageNum++;
    queueRenderPage(pageNum);
};

// Aumentar el zoom
function acercar() {
    scale += zoomRange;
    let num = pageNum;
    renderPage(num, scale);
}

// Disminuir el zoom
function alejar() {
    scale -= zoomRange;
    let num = pageNum;
    renderPage(num, scale);
}

// Establecer el tamaño default del pdf
function normal() {
    scale = 0.99;
    let num = pageNum;
    renderPage(num, scale);
}

// Cambiar el fondo de la página
function cambiarColorFondo() {
    if (document.querySelector('#ico').classList.contains('fa-moon')) {
        document.body.style.backgroundColor = 'black';
        document.querySelector('#cambiar-color-fondo').setAttribute('title', 'Modo Claro');
        document.querySelector('#ico').classList.remove('fa-moon')
        document.querySelector('#ico').classList.add('fa-sun');
        document.querySelector('.salir__icono').classList.add('color');
    } else {
        document.body.style.backgroundColor = '#F2E4CE';
        document.querySelector('#cambiar-color-fondo').setAttribute('title', 'Modo Oscuro');
        document.querySelector('#ico').classList.remove('fa-sun')
        document.querySelector('#ico').classList.add('fa-moon');
        document.querySelector('.salir__icono').classList.remove('color');
    }
}

// Obtener el documento pdf
pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;

    document.querySelector('#total-paginas').textContent = pdfDoc.numPages;

    renderPage(pageNum);
});

// Eventos
document.querySelector('#anterior-pagina').addEventListener('click', mostrarPagAnterior);
document.querySelector('#siguiente-pagina').addEventListener('click', mostrarSigPagina);
document.querySelector('#cambiar-color-fondo').addEventListener('click', cambiarColorFondo);
document.querySelector('#default').addEventListener('click', normal);
document.querySelector('#alejar').addEventListener('click', alejar);
document.querySelector('#acercar').addEventListener('click', acercar);
