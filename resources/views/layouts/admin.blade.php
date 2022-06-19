<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('buho.ico')}}"> 
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3be00db212.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>

    <title>@yield('titulo')</title>
</head>

<body>
    <span class="admin__span-menu">
        <i class="fas fa-bars admin__span-icono" id="abrir_menu_admin" class="k"></i>
    </span>

    <div class="contenedor__admin">

        <div class="menu-admin" id="menu">
            <span class="menu-admin__span">
                <i class="fas fa-times menu-admin__icono-menu" id="cerrar_menu_admin"></i>
            </span>

            <ul>
                <li class="menu-admin__li"><a href="{{ route('admin') }}" class="menu-admin__a">{{ __('Home') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('usuario.usuarios') }}" class="menu-admin__a">{{ __('Manage Users') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('rol.roles') }}" class="menu-admin__a">{{ __('Manage Roles') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('ejemplar.admin-ejemplares') }}"
                        class="menu-admin__a">{{ __('Manage Books') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('editorial.editoriales') }}"
                        class="menu-admin__a">{{ __('Manage Publishers') }}</a>
                </li>
                <li class="menu-admin__li"><a href="{{ route('coleccion.colecciones') }}"
                        class="menu-admin__a">{{ __('Manage Collections') }}</a>
                </li>
                <li class="menu-admin__li"><a href="{{ route('autor.autores') }}" class="menu-admin__a">{{ __('Manage Authors') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('inicio') }}" class="menu-admin__a">{{ __('Back to the web') }}</a></li>
                <li class="menu-admin__li"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="menu-admin__a">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="contenido-admin">

            @yield('content')

        </div>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
