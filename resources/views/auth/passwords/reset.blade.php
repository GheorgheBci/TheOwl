<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Recuperar Contraseña</title>
</head>

<body>
    <div class="logo">
        <img src="../../../buho.svg" alt="buho" class="logo__imagen--width">
    </div>

    <div class="contenedor">

        <div class="reset__div reset--padding">
            <h1 class="reset__titulo">Nueva Contraseña</h1>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="reset__label">Correo Electrónico</label>

                    <div>
                        <input id="email" class="reset__input" type="email" @error('email') is-invalid @enderror
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="reset__label">Nueva Contraseña</label>

                    <div>
                        <input id="password" class="reset__input" type="password"
                            @error('password') is-invalid @enderror name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password-confirm" class="reset__label">Confirmar Contraseña</label>

                    <div>
                        <input id="password-confirm" class="reset__input" type="password" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit" class="reset__button">Actualizar Contraseña</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
