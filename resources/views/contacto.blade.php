<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}" async></script>
    <title>Contacto</title>
</head>

<body>

    <div class="contenedor">

        <header class="header_home">

            <div class="logo">
                LOGO
            </div>

            <nav class="nave">
                <ul>
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="#">Ejemplares</a></li>
                    <li><a href="{{ route('conocenos') }}">Conocenos</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </nav>

            <div class="iconos">
                <ul>
                    <li><a href="#"><span class="material-icons-outlined">
                                search
                            </span></a></li>
                    <li><a href="#"><span class="material-icons-outlined">
                                favorite_border
                            </span></a></li>
                    <li><a href="#"><span class="material-icons-outlined">
                                add_shopping_cart
                            </span></a></li>
                    <li><a href="#"><span class="material-icons-outlined user" id="u">
                                perm_identity
                            </span></a></li>

                    <span class="material-icons-outlined" id="flecha">
                        arrow_drop_up
                    </span>
                    <div id="menu_desplegable_usuario">
                        <p><a href="{{ route('userHome') }}">Mis Datos</a></p>
                        @if (Auth::user())
                            <p> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                            </p>
                        @else
                            <p><a href="{{ route('login') }}">Iniciar Sesión</a></p>
                        @endif
                    </div>
                </ul>
            </div>

        </header>

        <main>

            <div class="contacto">
                <h1>Formulario de contacto</h1>
            </div>


            <div class="formulario">
                <h2 class="formulario_subtitulo">Comentanos tu problema</h2>

                <form action="#" method="post">

                    <label for="nombre" class="colocar_nombre">Nombre
                        <span class="obligatorio">*</span>
                    </label>
                    <input type="text" name="nombre" id="nombre" required placeholder="Escribe tu nombre">

                    <label for="email" class="colocar_email">Email
                        <span class="obligatorio">*</span>
                    </label>
                    <input type="email" name="email" id="email" required placeholder="Escribe tu Email">

                    <label for="asunto" class="colocar_asunto">Asunto
                        <span class="obligatorio">*</span>
                    </label>
                    <input type="text" name="asunto" id="assunto" required placeholder="Escribe un asunto">

                    <label for="mensaje" class="colocar_mensaje">Mensaje
                        <span class="obligatorio">*</span>
                    </label>

                    <textarea name="mensaje" class="texto_mensaje" required placeholder="Deja aquí tu comentario..."></textarea>

                    <button type="submit" name="enviar_formulario">Enviar</button>

                    <p class="aviso">* los campos son obligatorios.</p>

                </form>
            </div>

        </main>

    </div>

    <footer></footer>

</body>

</html>
