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
        <a href="{{ route('inicio') }}"><img src="{{ asset('img/buho.svg') }}" alt="buho"
                class="logo__imagen--width"></a>
    </div>

    <div class="contenedor">

        <div class="reset__div reset--padding">
            <h1 class="reset__titulo">{{ __('Reset Password') }}</h1>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <input type="hidden" value="{{ $email ?? old('email') }}" name="email" required>

                <div>
                    <label for="password" class="reset__label">{{ __('New Password') }}</label>

                    <div class="reset__div--mb">
                        <input id="password" class="reset__input" type="password"
                            @error('password') is-invalid @enderror name="password" required autocomplete="new-password"
                            placeholder="{{ __('Enter the new password') }}">

                        @error('password')
                            <span class="mensaje__error mensaje__error-reset-password-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="reset__label">{{ __('Confirm Password') }}</label>

                    <div class="reset__div--mb">
                        <input id="password_confirmation" class="reset__input" type="password"
                            name="password_confirmation" requireutocomplete="new-password"
                            placeholder="{{ __('Confirm the new password') }}">

                        @error('password_confirmation')
                            <span class="mensaje__error mensaje__error-reset-password-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('email')
                            <span class="mensaje__error mensaje__error-reset-password-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit" class="reset__button">{{ __('Update Password') }}</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
