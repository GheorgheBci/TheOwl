@extends('layouts.app')

@section('estilosConBootstrap')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('estilosSinBootstrap')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('javascript')
    <script src="{{ asset('js/script2.js') }}" async></script>
@endsection

@section('titulo', 'Perfil')

@section('content')
    <div class="main_user_account">
        <div class="menu_user_account">

        </div>

        <div class="usuario">

            <div class="foto_usuario">
                <a href="#"> <span id="cambiar_foto">Cambiar
                        imagen</span></a>



                @if (Auth::user()->imagen_usuario != null)
                    <img src="{{ asset('imagenes/' . Auth::user()->imagen_usuario) }}" alt="imagen_usuario"
                        class="usufoto">
                @else
                    <img src="../user.png" alt="" class="usufoto">
                @endif

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
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre: </label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ Auth::user()->nombre }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ape1">Primer apellido: </label>
                            <input type="text" class="form-control" name="ape1" id="ape1"
                                value="{{ Auth::user()->apellido1 }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ape2">Segundo apellido: </label>
                            <input type="text" class="form-control" name="ape2" id="ape2"
                                value="{{ Auth::user()->apellido2 }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-md-9">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecNac">Fecha de nacimiento: </label>
                            <input type="date" class="form-control" name="fecNac" id="fecNac"
                                value="{{ Auth::user()->fecNacimiento }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>

            <div class="user2">
                <form action="{{ route('usuario.actualizarContraseña') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label for="password">Contraseña Actual: </label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="newPassword">Nueva Contraseña: </label>
                            <input type="password" class="form-control" name="newPassword" id="newPassword">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password-confirm">Confirmar Contraseña: </label>
                            <input type="password" class="form-control" name="password-confirm" id="password-confirm">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
