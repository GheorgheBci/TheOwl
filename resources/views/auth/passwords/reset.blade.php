<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Recuperar Contraseña</title>
</head>

<body>

    <div class="contenedor">

        <div class="logo_login_registro">
            <a href="{{ route('inicio') }}"><img src="../../../buho.svg" alt="buho" class="imagenbuho"></a>
        </div>

        <h1 class="titulo_cambiar_contrasenia">Nueva Contraseña</h1>

        <form method="POST" action="{{ route('password.update') }}" class="formulario_recuperar_contrasenia">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Correo Electrónico</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Nueva Contraseña</label>

                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Contraseña</label>

                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn_actualizar_contrasenia">Actualizar Contraseña</button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>
