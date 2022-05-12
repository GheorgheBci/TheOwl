@extends('layouts.app')

{{-- @section('estilosConBootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection --}}

@section('estilosSinBootstrap')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('javascript')
    <script src="{{ asset('js/script2.js') }}" async></script>
    <script src="{{ asset('js/script.js') }}" async></script>
@endsection

@section('titulo', 'Perfil')

@section('content')
    <div class="main_user_account">
        <div class="menu_user_account">
            <ul>
                <li>
                    <p> <a class="dropdown-item" href="{{ route('logout') }}"
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

            <div class="foto_usuario">
                <a href="#"> <span id="cambiar_foto">Cambiar
                        imagen</span></a>

                <img src="{{ asset('imagenes/' . Auth::user()->imagen_usuario) }}" alt="imagen_usuario"
                    class="usufoto">
            </div>

            <div class="menus">
                <i class="fas fa-ellipsis-v" id="menu_usuario"></i>
            </div>

            <div id="form">
                <form action="{{ route('usuario.cargarImagen') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit">Cambiar imagen</button>
                    <a href="#" id="cancelar">Cancelar</a>
                </form>
            </div>

            <div class="userr">
                <form action="{{ route('usuario.actualizarDatosPersonales') }}" method="POST">
                    @csrf
                    <div class="usuario_nombre_apellidos">
                        <div>
                            <label for="nombre">Nombre: </label>
                            <div>
                                <input type="text" name="nombre" id="nombre" value="{{ Auth::user()->nombre }}">
                            </div>
                        </div>
                        <div>
                            <label for="ape1">Primer apellido: </label>
                            <div>
                                <input type="text" name="ape1" id="ape1" value="{{ Auth::user()->apellido1 }}">
                            </div>
                        </div>
                        <div>
                            <label for="ape2">Segundo apellido: </label>
                            <div>
                                <input type="text" name="ape2" id="ape2" value="{{ Auth::user()->apellido2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="usuario_email_password">
                        <div>
                            <label for="email">Email: </label>
                            <div>
                                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div>
                            <label for="fecNac">Fecha de nacimiento: </label>
                            <div>
                                <input type="date" name="fecNac" id="fecNac" value="{{ Auth::user()->fecNacimiento }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="perfil_boton">Actualizar</button>
                </form>
            </div>

            <div class="user2">
                <form action="{{ route('usuario.actualizarContraseña') }}" method="POST">
                    @csrf
                    <div class="usuario_contrasenias">
                        <div>
                            <label for="password">Contraseña Actual: </label>
                            <div>
                                <input type="password" name="password" id="password">
                            </div>
                        </div>
                        <div>
                            <label for="newPassword">Nueva Contraseña: </label>
                            <div>
                                <input type="password" name="newPassword" id="newPassword">
                            </div>
                        </div>
                        <div>
                            <label for="password-confirm">Confirmar Contraseña: </label>
                            <div>
                                <input type="password" name="password-confirm" id="password-confirm">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="perfil_boton">Actualizar</button>
                </form>
            </div>

            <div class="user3">
                @if (Auth::user()->idRol === 2 && !Auth::user()->baja)
                    <p>Su membresia como socio es hasta {{ Auth::user()->fec_fin_socio }}</p>

                    @if ( ((strtotime(date("Y-m-d", strtotime(Auth::user()->fec_fin_socio))) - strtotime(date("Y-m-d"))) /
                    60
                    /60 / 24) === 1)
                    <p class="aviso_renovacion">Atención su membresia se renovara mañana</p>
                @endif

                <a href="{{ route('usuario.baja') }}" class="btn btn-dark">Darse de baja</a>
            @elseif(Auth::user()->baja)
                <p>Te has dado de baja, tu membresia es hasta {{ Auth::user()->fec_fin_socio }}</p>
            @else
                <p>Actualmente no eres socio</p>
                <a href="{{ route('membresia') }}" class="btn btn-dark">Hacerte socio</a>
                @endif
            </div>

        </div>
    </div>
@endsection
