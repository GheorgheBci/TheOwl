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
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @yield('javascript')
    <script src="{{ asset('anime.min.js') }}" async></script>
    <title>@yield('titulo')</title>
</head>

<body>
    <div class="logo">
        <img src="../buho.svg" alt="buho" class="imagenbuho">
    </div>

    <header class="header">
        <nav>
            <span id="menu_barra">
                <i class="fas fa-bars"></i>Menu
            </span>
            <ul id="c">

                <li><a href="{{ route('inicio') }}">Inicio</a></li>
                <li><a href="#">Ejemplares</a></li>
                <li><a href="{{ route('conocenos') }}">Conocenos</a></li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
                {{-- @auth
                    @if (Auth::user()->idRol == 3)
                        <li><a href="{{ route('admin') }}">Administrador</a></li>
                    @endif
                @endauth --}}
                <li><a href="#"><i class="fas fa-heart"></i>WishList</a></li>
                <li><a href="#"><i class="fas fa-cart-plus"></i>Carrito</a></li>
                <li>
                    @if (Auth::user())
                        <a href="{{ route('usuario.userHome') }}"><i class="fas fa-user"></i>Mi Cuenta</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-user"></i>Mi Cuenta</a>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <div class="contenedor">

        <main>
            @yield('content')
        </main>

    </div>

    <footer></footer>
</body>

</html>
