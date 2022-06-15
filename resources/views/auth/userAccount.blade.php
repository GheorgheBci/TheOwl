@extends('layouts.app')

@section('titulo', 'Perfil')

@section('content')
    <div class="perfil">

        <div class="menu-usuario" id="menu">

            <ul>
                <li class="menu-usuario__li"><a href="{{ route('usuario.libros') }}" class="menu-usuario__a">Mis libros</a>
                </li>
                <li class="menu-usuario__li"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="menu-usuario__a">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div class="usuario">

            <div class="usuario__perfil">
                <form action="{{ route('usuario.cargarImagen') }}" method="post" class="usuario__form-imagen"
                    id="cargar-imagen" enctype="multipart/form-data">
                    @csrf
                    <label for="imagen" class="usuario__imagen-label"><span class="usuario__imagen-span">Cambiar
                            Imagen</span></label>
                    <div class="usuario__change">
                        <label for="imagen"> <i class="fa-solid fa-camera"></i></label>
                    </div>
                    <input type="file" name="imagen" accept="image/*" id="imagen" required>

                </form>

                <img src="{{ asset('img/' . Auth::user()->imagen_usuario) }}" alt="imagen_usuario" class="usuario__img">
            </div>

            @error('imagen')
                <span class="mensaje__error mensaje__error-perfil-fs">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @if (session('success-imagen'))
                <span class="mensaje__exito-perfil">
                    {{ session('success-imagen') }}
                </span>
            @endif

            <div class="usuario__datos-personales">
                <form action="{{ route('usuario.actualizarDatosPersonales', Auth::user()) }}" id="fo" method="POST">
                    @csrf
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="nombre">Nombre: </label>
                            <div class="usuario__div--mb">
                                <input type="text" class="usuario__input" name="nombre" id="nombre"
                                    value="{{ Auth::user()->nombre }}">

                                @error('nombre')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="ape1">Primer apellido: </label>
                            <div class="usuario__div--mb">
                                <input type="text" class="usuario__input" name="ape1" id="ape1"
                                    value="{{ Auth::user()->apellido1 }}">

                                @error('ape1')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="ape2">Segundo apellido: </label>
                            <div class="usuario__div--mb">
                                <input type="text" class="usuario__input" name="ape2" id="ape2"
                                    value="{{ Auth::user()->apellido2 }}">

                                @error('ape2')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="email">Email: </label>
                            <div class="usuario__div--mb">
                                <input type="email" class="usuario__input" name="email" id="email"
                                    value="{{ Auth::user()->email }}">
                                <input type="hidden" name="oldemail" value="{{ Auth::user()->email }}">

                                @error('email')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="fechaNac">Fecha de nacimiento: </label>
                            <div class="usuario__div--mb">
                                <input type="date" class="usuario__input" name="fechaNac" id="fechaNac"
                                    value="{{ Auth::user()->fecNacimiento }}">

                                @error('fechaNac')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @if (session('success-datos-personales'))
                        <div class="mensaje__exito" id="msg">
                            {{ session('success-datos-personales') }}
                        </div>
                    @endif

                    @if (session('error-datos-personales'))
                        <div class="mensaje__error">
                            {{ session('error-datos-personales') }}
                        </div>
                    @endif
                    <button type="submit" id="actu" class="usuario__boton">Actualizar</button>
                </form>
            </div>

            <div class="usuario__password">
                <form action="{{ route('usuario.actualizarContraseña') }}" method="POST">
                    @csrf
                    <div class="usuario__div">
                        <div class="usuario__div--width">
                            <label for="password">Contraseña Actual: </label>
                            <div class="usuario__div--mb">
                                <input type="password" class="usuario__input" name="password" autocomplete="password"
                                    id="password" placeholder="Contraseña actual">

                                @if (session('error'))
                                    <div class="mensaje__error">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @error('password')
                                    <span class="mensaje__error">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="newPassword">Nueva Contraseña: </label>
                            <div class="usuario__div--mb">
                                <input type="password" class="usuario__input" name="newPassword" autocomplete="new-password"
                                    id="newPassword" placeholder="Nueva contraseña">

                                @error('newPassword')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="usuario__div--width">
                            <label for="password-confirm">Confirmar Contraseña: </label>
                            <div class="usuario__div--mb">
                                <input type="password" class="usuario__input" name="password-confirm"
                                    autocomplete="current-password" id="password-confirm"
                                    placeholder="Confirmar contraseña ">

                                @error('password-confirm')
                                    <span class="mensaje__error mensaje__error-perfil-fs">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if (session('success-contraseña'))
                        <div class="mensaje__exito">
                            {{ session('success-contraseña') }}
                        </div>
                    @endif
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

            <div class="usuario__alquileres">
                <h3 class="usuario__h3">MIS ALQUILERES</h3>
                @if (count($alquileres) !== 0)
                    <table class="usuario__table">
                        <thead class="usuario__thead">
                            <tr class="usuario__thead-tr">
                                <th class="usuario__th">Ejemplar</th>
                                <th class="usuario__th">Fecha de Alquiler</th>
                                <th class="usuario__th">Fecha de Devolución</th>
                                <th class="usuario__th">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alquileres as $item)
                                <tr class="usuario__tbody-tr">
                                    <td class="usuario__td" data-datos="Ejemplar">
                                        @foreach (Auth::user()->ejemplar as $items)
                                            @if ($item->isbn === $items->isbn)
                                                {{ $items->nomEjemplar }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="usuario__td" data-datos="F. Alquiler">{{ $item->fecAlquiler }}</td>
                                    <td class="usuario__td" data-datos="F. Devolución">{{ $item->fecDevolucion }}</td>
                                    <td class="usuario__td" data-datos="Precio">{{ $item->precioAlquiler }}€</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="usuario__alquileres-nada">
                        <p>No tienes alquilado ningún ejemplar</p>
                        <a href="{{ route('ejemplar.ejemplares') }}" class="usuario__alquileres-enlace">Añadir</a>
                    </div>
                @endif
            </div>

        </div>
    </div>

    @if (session('success'))
        <div class="mensaje">
            <div class="mensaje__div mensaje__div--success">
                <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                <h2 class="mensaje__h2">{{ session('success') }}</h2>
            </div>
        </div>
    @endif
@endsection
