@extends('layouts.app')

@section('javascript')
    <script src="{{ asset('js/script2.js') }}" async></script>
    <script src="{{ asset('js/script.js') }}" async></script>
@endsection

@section('titulo', 'Perfil')

@section('content')
    <div class="perfil">
        <div class="menu">
            <ul class="menu__ul">
                <li>
                    <p> <a class="menu__a" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    </p>
                </li>
            </ul>
        </div>

        <div class="usuario">

            <div class="usuario__perfil">
                <a href="#"> <span id="cambiar_foto">Cambiar
                        imagen</span></a>

                <img src="{{ asset('imagenes/' . Auth::user()->imagen_usuario) }}" alt="imagen_usuario"
                    class="usuario__img">
            </div>

            {{-- <div class="menus">
                <i class="fas fa-ellipsis-v usuario__i" id="menu_usuario"></i>
            </div> --}}

            <div id="formulario__cambiar-imagen">
                <form action="{{ route('usuario.cargarImagen') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit">Cambiar imagen</button>
                    <a href="#" id="cancelar">Cancelar</a>
                </form>
            </div>

            <div class="usuario__datos-personales">
                <form action="{{ route('usuario.actualizarDatosPersonales') }}" method="POST">
                    @csrf
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="nombre">Nombre: </label>
                            <div>
                                <input type="text" class="usuario__input" name="nombre" id="nombre"
                                    value="{{ Auth::user()->nombre }}">
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="ape1">Primer apellido: </label>
                            <div>
                                <input type="text" class="usuario__input" name="ape1" id="ape1"
                                    value="{{ Auth::user()->apellido1 }}">
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="ape2">Segundo apellido: </label>
                            <div>
                                <input type="text" class="usuario__input" name="ape2" id="ape2"
                                    value="{{ Auth::user()->apellido2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="email">Email: </label>
                            <div>
                                <input type="email" class="usuario__input" name="email" id="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="fecNac">Fecha de nacimiento: </label>
                            <div>
                                <input type="date" class="usuario__input" name="fecNac" id="fecNac"
                                    value="{{ Auth::user()->fecNacimiento }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="usuario__boton">Actualizar</button>
                </form>
            </div>

            <div class="usuario__password">
                <form action="{{ route('usuario.actualizarContraseña') }}" method="POST">
                    @csrf
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="password">Contraseña Actual: </label>
                            <div>
                                <input type="password" class="usuario__input" name="password" id="password">
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="newPassword">Nueva Contraseña: </label>
                            <div>
                                <input type="password" class="usuario__input" name="newPassword" id="newPassword">
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="password-confirm">Confirmar Contraseña: </label>
                            <div>
                                <input type="password" class="usuario__input" name="password-confirm" id="password-confirm">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="usuario__boton">Actualizar</button>
                </form>
            </div>

            <div class="usuario__socio">
                @if (Auth::user()->idRol === 2 && !Auth::user()->baja)
                    <p>Su membresia como socio es hasta {{ Auth::user()->fec_fin_socio }}</p>

                    @if ( ((strtotime(date("Y-m-d", strtotime(Auth::user()->fec_fin_socio))) - strtotime(date("Y-m-d"))) /
                    60
                    /60 / 24) === 1)
                    <p class="usuario__aviso-renovacion">Atención su membresia se renovara mañana</p>
                @endif

                <a href="{{ route('usuario.baja') }}" class="usuario__a">Darse de baja</a>
            @elseif(Auth::user()->baja)
                <p>Te has dado de baja, tu membresia es hasta {{ Auth::user()->fec_fin_socio }}</p>
            @else
                <p>Actualmente no eres socio</p>
                <a href="{{ route('membresia') }}" class="usuario__a">Hacerte socio</a>
                @endif
            </div>

        </div>
    </div>
@endsection
