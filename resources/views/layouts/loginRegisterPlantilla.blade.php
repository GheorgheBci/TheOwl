<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>@yield('titulo')</title>
</head>

<body>

    <div class="logo">
        <img src="../buho.svg" alt="buho" class="logo__imagen--width">
    </div>

    <div class="contenedor">

        <main>
            @yield('content')
        </main>

    </div>

</body>

</html>
