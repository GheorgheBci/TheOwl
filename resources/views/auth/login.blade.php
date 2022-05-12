@extends('layouts.loginRegisterPlantilla')

@section('titulo', 'Login')

@section('content')
    <div class="main_login">
        <div class="img">
            <img src="../fairy-tale-gf5d0c6a7e_1280.jpg" alt="imagen" class="portada_login">
        </div>

        <div class="palo"></div>

        <div class="login">
            <h1>Inicia sesión con tu cuenta</h1>

            <form form method="POST" action="{{ route('login') }}" class="form_login">
                @csrf
                <div class="login_form_group">
                    <label for="email">Dirección de correo electrónico</label>

                    <div>
                        <input id="email" type="email" @error('email') is-invalid @enderror name="email"
                            value="{{ old('email') }}" required autocomplete="email" 
                            placeholder="Indica tu correo">

                        @error('email')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="login_form_group">
                    <label for="password">Contraseña</label>

                    <div>
                        <input id="password" type="password" @error('password') is-invalid @enderror name="password"
                            required autocomplete="current-password" placeholder="Indica tu contraseña">

                        @error('password')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="login_form_group login_right">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn_login">Iniciar Sesión</button>
                <div class="login_form_group login_enlace_crear_cuenta">
                    <p>¿No tienes una cuenta? <a href="{{ route('register') }}" class="enlace_registro">Crea una
                            aquí</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
