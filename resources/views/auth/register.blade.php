@extends('layouts.loginRegisterPlantilla')

@section('titulo', 'Registro')

@section('content')
    <div class="main-registro main-registro--padding">
        <div class="main-registro__p">
            <p><strong>Disfruta</strong> de millones de libros de todas las tematicas</p>
            <p><strong>Conviertete</strong> en socio y distruta de muchas ventajas</p>
        </div>

        <div class="main-registro__separador"></div>

        <div class="main-registro__div--ml main-registro__div--ma">
            <h1>Crear Cuenta</h1>

            <form method="POST" action="{{ route('register') }}" class="main-registro__form main-registro__form--mt">
                @csrf
                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__div--width">
                        <label for="nombre">Nombre</label>

                        <div>
                            <input id="nombre" class="main-registro__input" type="text" @error('nombre') is-invalid @enderror
                                name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre"
                                placeholder="Indica tu nombre">

                            @error('nombre')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__div--width">
                        <label for="ape1">Primer apellido</label>

                        <div>
                            <input id="ape1" class="main-registro__input" type="text" l @error('ape1') is-invalid @enderror
                                name="ape1" value="{{ old('ape1') }}" required autocomplete="ape1"
                                placeholder="Indica tu primer apellido">

                            @error('ape1')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__div--width">
                        <label for="ape2">Segundo apellido</label>

                        <div>
                            <input id="ape2" class="main-registro__input" type="text" @error('ape2') is-invalid @enderror
                                name="ape2" value="{{ old('ape2') }}" autocomplete="ape2"
                                placeholder="Indica tu segundo apellido">

                            @error('ape2')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__email--width">
                        <label for="email">Correo electrónico</label>

                        <div>
                            <input id="email" class="main-registro__input" type="email" @error('email') is-invalid @enderror
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Indica tu correo">

                            @error('email')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__date--width">
                        <label for="fechaNac">Fecha de nacimiento</label>

                        <div>
                            <input id="fechaNac" class="main-registro__input" type="date"
                                @error('fechaNac') is-invalid @enderror name="fechaNac" value="{{ old('fechaNac') }}"
                                required autocomplete="fechaNac">

                            @error('fechaNac')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="main-registro__div main-registro__div--mb">
                    <div class="main-registro__password--width">
                        <label for="password">Contraseña</label>

                        <div>
                            <input id="password" class="main-registro__input" type="password"
                                @error('password') is-invalid @enderror name="password" required autocomplete="new-password"
                                placeholder="Indica tu contraseña">

                            @error('password')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="main-registro__password--width">
                        <label for="password-confirm">Confirmar la contraseña</label>

                        <div>
                            <input id="password-confirm" class="main-registro__input" type="password"
                                name="password-confirm" required autocomplete="new-password"
                                placeholder="Repite la contraseña">
                        </div>
                    </div>
                </div>
                <button type="submit" class="main-registro__button">Crear Cuenta</button>
                <a href="{{ route('login') }}" class="main-registro__a">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
