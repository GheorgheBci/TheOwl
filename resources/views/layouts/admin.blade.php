<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesAdmin.css') }}" rel="stylesheet">
    <title>@yield('titulo')</title>
</head>

<body>

    <div class="contenedor">

        <div class="menu">
            <ul class="menu_navegacion">
                <li><a href="{{ route('admin') }}">Inicio</a></li>
                <li><a href="{{ route('usuario.usuarios') }}">Gestionar Usuarios</a></li>
                <li><a href="{{ route('rol.roles') }}">Gestionar Roles</a></li>
                <li><a href="{{ route('ejemplar.ejemplares') }}">Gestionar Ejemplares</a></li>
                <li><a href="{{ route('editorial.editoriales') }}">Gestionar Editoriales</a></li>
                <li><a href="{{ route('coleccion.colecciones') }}">Gestionar Colecciones</a></li>
                <li><a href="{{ route('autor.autores') }}">Gestionar Autores</a></li>
                <li><a href="{{ route('alquiler.alquileres') }}">Gestionar Alquileres</a></li>
                <li><a href="{{ route('inicio') }}">Volver a la página web</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="contenido">

            @yield('content')

        </div>
    </div>

</body>

</html>
