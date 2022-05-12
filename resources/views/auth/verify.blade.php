<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Verifica tu cuenta</title>
</head>

<body>

    <div class="contenedor">

        <header>

            <div class="logo_login_registro">
                <img src="../../buho.svg" alt="buho" class="imagenbuho">
            </div>

        </header>

        <main>

            <div class="mensaje">
                <h1 class="mensaje_titulo">Bienvenido a The Owl</h1>

                <div class="mensaje_contenido">
                    <p>Para poder usar la cuenta tienes que activar con el link que le hemos enviado a su correo. Si no
                        le ha llegado ningún correo, pulsa en el siguiente enlace y le enviares otro enlace a su
                        cuenta.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('Click para reenviar otro enlace') }}</button>.
                    </form>
                    </p>

                </div>
            </div>

        </main>

    </div>

</body>

</html>
