<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('estilosConBootstrap')
    @yield('estilosSinBootstrap')
    <title>@yield('titulo')</title>
</head>

<body>

    <div class="contenedor">

        <header>

            <div class="logo_login_registro">
                <a href="{{ route('inicio') }}"><img src="../buho.svg" alt="buho" class="imagenbuho"></a>
            </div>

        </header>

        <main>
            @yield('content')
        </main>

    </div>

</body>

</html>
