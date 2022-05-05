<!doctype html>
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
    @yield('estilosConBootstrap')
    @yield('estilosSinBootstrap')
    @yield('javascript')
    <title>@yield('titulo')</title>
</head>

<body>

    <div class="contenedor">

        <header class="header_home">

            <div class="logo">
                <img src="../buho.svg" alt="buho" class="imagenbuho">
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
                    <li>
                        {{-- @if (Auth::user())
                            <a href="#">
                                <div class="bbb">
                                    @if (Auth::user()->imagen_usuario != null)
                                        <img src="{{ asset('imagenes/' . Auth::user()->imagen_usuario) }}"
                                            alt="imagen_usuario" class="usufoto">
                                    @else
                                        <img src="../user.png" alt="" class="usufoto">
                                    @endif

                                </div>
                            </a>
                        @else --}}
                        <a href="#"><span class="material-icons-outlined user" id="u">
                                perm_identity
                            </span></a>
                        {{-- @endif --}}
                    </li>

                    <span class="material-icons-outlined" id="flecha">
                        arrow_drop_up
                    </span>
                    <div id="menu_desplegable_usuario">
                        <p><a href="{{ route('usuario.userHome') }}">Mis Datos</a></p>
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
            @yield('content')
        </main>

    </div>

    <footer></footer>
</body>

</html>
