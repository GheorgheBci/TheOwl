@extends('layouts.loginRegisterPlantilla')

@section('titulo', 'Login')

@section('content')
    <div class="main-login">
        <div class="main-login__img">
            <img src="{{ asset('img/fairy-tale-gf5d0c6a7e_1280.jpg') }}" alt="imagen" class="main-login__portada">
        </div>

        <div class="main-login__separador"></div>

        <div class="main-login__login--padding">
            <h1 class="main-login__titulo">{{ __('Log in with your account') }}</h1>

            <form form method="POST" action="{{ route('login') }}" class="main-login__form main-login__form--mt">
                @csrf
                <div class="main-login__form--mb">
                    <label for="email" class="main-login__label">{{ __('Email Address') }}</label>

                    <div>
                        <input id="email" class="main-login__input" type="email" @error('email') is-invalid @enderror
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="{{ __('Enter your email address') }}">
                    </div>
                </div>
                <div class="main-login__form--mb">
                    <label for="password" class="main-login__label">{{ __('Password') }}</label>

                    <div>
                        <input id="password" class="main-login__input" type="password"
                            @error('password') is-invalid @enderror name="password" required autocomplete="current-password"
                            placeholder="{{ __('Enter your password') }}">

                        @error('email')
                            <span class="mensaje__error mensaje__error-login-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div
                    class="main-login__recuperar-contrasenia main-login__form--mb main-login__recuperar-contrasenia--float">
                    <a href="{{ route('password.request') }}" class="main-login__a main-login__a--color">{{ __('Forgot Your Password?') }}</a>
                </div>
                <button type="submit" class="main-login__button">{{ __('Login') }}</button>
                <div class="main-login__form--mb main-login__p">
                    <p class="main-login__p--font">{{ __("Don't have an account?") }} <a href="{{ route('register') }}"
                            class="main-login__a main-login__a--color">{{ __('Create one here') }}</a></p>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="mensaje">
                <div class="mensaje__div mensaje__div--success">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('success') }}</h2>
                </div>
            </div>
        @endif
    </div>
@endsection
