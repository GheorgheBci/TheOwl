@extends('layouts.loginRegisterPlantilla')

@section('titulo', 'Registro')

@section('content')
    <div class="main_registro">
        <div class="tex">
            <p><strong>Disfruta</strong> de millones de libros de todas las tematicas</p>
            <p><strong>Conviertete</strong> en socio y distruta de muchas ventajas</p>
        </div>

        <div class="palo"></div>

        <div class="registro">
            <h1>Crear Cuenta</h1>

            <form method="POST" action="{{ route('register') }}" class="form_registro">
                @csrf
                <div class="registro_nombre_apellidos">
                    <div class="grupoA">
                        <label for="nombre">Nombre</label>

                        <div>
                            <input id="nombre" type="text" @error('nombre') is-invalid @enderror name="nombre"
                                value="{{ old('nombre') }}" required autocomplete="nombre" 
                                placeholder="Indica tu nombre">

                            @error('nombre')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grupoA">
                        <label for="ape1">Primer apellido</label>

                        <div>
                            <input id="ape1" type="text" l @error('ape1') is-invalid @enderror name="ape1"
                                value="{{ old('ape1') }}" required autocomplete="ape1" 
                                placeholder="Indica tu primer apellido">

                            @error('ape1')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="grupoA">
                        <label for="ape2">Segundo apellido</label>

                        <div>
                            <input id="ape2" type="text" @error('ape2') is-invalid @enderror name="ape2"
                                value="{{ old('ape2') }}" autocomplete="ape2" 
                                placeholder="Indica tu segundo apellido">

                            @error('ape2')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="registro_email_feNacimiento">
                    <div class="ema">
                        <label for="email">Correo electrónico</label>

                        <div>
                            <input id="email" type="email" @error('email') is-invalid @enderror name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="Indica tu correo">

                            @error('email')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="ema">
                        <label for="fechaNac">Fecha de nacimiento</label>

                        <div>
                            <input id="fechaNac" type="date" @error('fechaNac') is-invalid @enderror name="fechaNac"
                                value="{{ old('fechaNac') }}" required autocomplete="fechaNac" >

                            @error('fechaNac')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="registro_contrasenia">
                    <div class="pass">
                        <label for="password">Contraseña</label>

                        <div>
                            <input id="password" type="password" @error('password') is-invalid @enderror name="password"
                                required autocomplete="new-password" placeholder="Indica tu contraseña">

                            @error('password')
                                <span>
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="pass">
                        <label for="password-confirm">Confirmar la contraseña</label>

                        <div>
                            <input id="password-confirm" type="password" name="password-confirm" required
                                autocomplete="new-password" placeholder="Repite la contraseña">
                        </div>
                    </div>
                </div>
                <button type="submit" class="registro_boton_crear_cuenta">Crear Cuenta</button>
                <a href="{{ route('login') }}" class="boton_cancelar">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
