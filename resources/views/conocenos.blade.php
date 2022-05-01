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
    <title>Conocenos</title>
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
            <div class="contenedor_conocenos">
                <h1>Quienes somos</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus voluptates provident ad quis
                    maiores neque officia beatae sapiente doloribus. Fugit maiores iusto expedita, placeat aut sit
                    alias? Libero, illum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, soluta!
                    Est voluptatum rerum mollitia totam temporibus consequatur nisi ab nihil, recusandae consequuntur
                    maiores molestias facere earum cupiditate officiis beatae perferendis?</p>
            </div>

            <div class="contenedor_conocenos_2">
                <div>
                    <h2 class="titulo">RELAX</h2>
                    <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                        tenetur iusto harum!
                        Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                        dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
                </div>
                <div>
                    <h2 class="titulo">ENJOY</h2>
                    <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                        tenetur iusto harum!
                        Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                        dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
                </div>
                <div>
                    <h2 class="titulo">LEARN</h2>
                    <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                        tenetur iusto harum!
                        Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                        dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
                </div>
            </div>


        </main>

    </div>

    <footer></footer>

</body>

</html>
