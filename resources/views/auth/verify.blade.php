<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Verifica tu cuenta</title>
</head>

<body>
    <div class="logo">
        <img src="{{ asset('img/buho.svg') }}" alt="buho" class="logo__imagen--width">
    </div>

    <div class="contenedor">
        <main>
            <div class="verify">
                <h1 class="verify__titulo">Bienvenido a The Owl</h1>

                <div>
                    <p>Para poder usar la cuenta tienes que activar con el link que le hemos enviado a su correo. Si no
                        le ha llegado ningún correo, pulsa en el siguiente enlace y le enviaremos otro enlace.
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="verify__div">
                            <button class="verify__boton"
                                type="submit">{{ __('Click para reenviar otro enlace') }}</button>
                        </div>
                    </form>
                    </p>

                </div>
            </div>

        </main>

    </div>

</body>

</html>
