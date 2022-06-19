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
        <a href="{{ route('inicio') }}"><img src="{{ asset('img/buho.svg') }}" alt="buho"
                class="logo__imagen--width"></a>
    </div>

    <div class="contenedor">
        <main>
            <div class="verify">
                <h1 class="verify__titulo">{{ __('Welcome to The Owl') }}</h1>

                <div>
                    <p class="verify__p">{{ __('To be able to use your account you have to activate it with the link that we have sent to your email. If you have not received any email, click on the following link and we will send you another link.') }}
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <div class="verify__div">
                            <button class="verify__boton"
                                type="submit">{{ __('Click to resend another link') }}</button>

                            @if (session('succes'))
                                <div class="mensaje__exito">
                                    {{ session('succes') }}
                                </div>
                            @endif
                        </div>
                    </form>
                    </p>

                </div>
            </div>

        </main>

    </div>

</body>

</html>
