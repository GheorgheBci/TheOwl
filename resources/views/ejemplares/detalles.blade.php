@extends('layouts.app')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="ejemplar">
        <h1 class="ejemplar__titulo">{{ $ejemplar->nomEjemplar }}</h1>

        <p class="ejemplar__iconos">
            @auth
                @if (DB::table('wishlist')->where('codUsu', Auth::user()->codUsu)->where('isbn', $ejemplar->isbn)->first())
                    <a href="#" class="ejemplar__corazon-rojo"><i class="fas fa-heart"></i></a>
                    <a href="{{ route('carrito', $ejemplar) }}" class="ejemplar__carrito"><i
                            class="fa-solid fa-cart-arrow-down"></i></a>
                @else
                    <a href="{{ route('usuario.add', $ejemplar) }}" class="ejemplar__corazon-negro"><i
                            class="fas fa-heart"></i></a>
                    <a href="{{ route('carrito', $ejemplar) }}" class="ejemplar__carrito"><i
                            class="fa-solid fa-cart-arrow-down"></i></a>
                @endif
            @endauth

            @guest
                <a href="{{ route('usuario.add', $ejemplar) }}" class="ejemplar__corazon-negro"><i
                        class="fas fa-heart"></i></a>
                <a href="{{ route('carrito', $ejemplar) }}" class="ejemplar__carrito"><i
                        class="fa-solid fa-cart-arrow-down"></i></a>

            @endguest
        </p>

        @if (session('exito'))
            <div class="mensaje">
                <div class="mensaje__div">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('exito') }}</h2>
                </div>
            </div>
        @endif
        <div class="detalles">

            <div class="detalles__portada">
                <img class="detalles__img" src="{{ asset('book/' . $ejemplar->image_book) }}" alt="portada">

                <div class="puntuacion">

                    <a class="puntuacion__a"
                        href="{{ route('ejemplar.puntuar', ['ejemplar' => $ejemplar, 'puntuacion' => 1]) }}">&#9733;</a>
                    <a class="puntuacion__a"
                        href="{{ route('ejemplar.puntuar', ['ejemplar' => $ejemplar, 'puntuacion' => 2]) }}">&#9733;</a>
                    <a class="puntuacion__a"
                        href="{{ route('ejemplar.puntuar', ['ejemplar' => $ejemplar, 'puntuacion' => 3]) }}">&#9733;</a>
                    <a class="puntuacion__a"
                        href="{{ route('ejemplar.puntuar', ['ejemplar' => $ejemplar, 'puntuacion' => 4]) }}">&#9733;</a>
                    <a class="puntuacion__a"
                        href="{{ route('ejemplar.puntuar', ['ejemplar' => $ejemplar, 'puntuacion' => 5]) }}">&#9733;</a>

                    @if ($ejemplar->votos === 0)
                        <p class="puntuacion__p">({{ $ejemplar->votos }})</p>
                        <p class="puntuacion__p--precio">{{ $ejemplar->precio }}$</p>
                    @else
                        <p class="puntuacion__p">({{ $ejemplar->votos }})</p>
                        <p class="puntuacion__p--precio">{{ $ejemplar->precio }}$</p>
                        <span id="puntuacion"
                            class="puntuacion__media">{{ round($ejemplar->puntuacion / $ejemplar->votos) }}</span>
                    @endif

                    <audio id="sonido-puntuar" src="{{ asset('sound/511484__mlaudio__success-bell.wav') }}"></audio>
                </div>
                <div class="botones">
                    <a href="#" id="alquilar" class="botones__a">Alquilar</a>
                    <a href="{{ route('ejemplar.ejemplares') }}" class="botones__a">Atrás</a>
                </div>
            </div>

            <div class="detalles__separador"></div>

            <div class="detalles__texto">

                <h2 class="texto__subtitulo">Detalles del libro</h2>
                <table class="texto__table">

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Autor: </td>
                        <td>
                            @if ($ejemplar->codAutor === null)
                                <p>Anónimo</p>
                            @else
                                @foreach ($ejemplar->autor() as $item)
                                    {{ $item->nomAutor }} {{ $item->ape1Autor }} {{ $item->ape2Autor }}
                                @endforeach
                        </td>
                        @endif
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Editorial: </td>
                        <td>
                            @if ($ejemplar->codEditorial === null)
                                <p>Sin editorial</p>
                            @else
                                @foreach ($ejemplar->editorial() as $item)
                                    {{ $item->nomEditorial }}
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Colección: </td>
                        <td>
                            @if ($ejemplar->codColeccion === null)
                                <p>Sin colección</p>
                            @else
                                @foreach ($ejemplar->coleccion() as $item)
                                    {{ $item->nomColeccion }}
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Tema: </td>
                        <td>{{ $ejemplar->tema }}</td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Idioma: </td>
                        <td>{{ $ejemplar->idioma }}</td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Fecha: </td>
                        <td>{{ $ejemplar->fecPublicacion }}</td>
                    </tr>
                </table>

                <h2 class="texto__subtitulo">Epilogo</h2>
                <p class="texto__epilogo">{{ $ejemplar->epilogo }}</p>


            </div>
        </div>

        @if (session('success'))
            <div class="mensaje">
                <div class="mensaje__div">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('success') }}</h2>
                </div>
            </div>
        @endif

        <div class="fondo" id="fondo">
            <div class="ventana-alquilar" id="ventana-alquilar">
                <a href="#" class="ventana-alquilar__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
                <h3 class="ventana-alquilar__h3">Alquilar el ejemplar {{ $ejemplar->nomEjemplar }}</h3>
                <form action="{{ route('ejemplar.alquilar', $ejemplar) }}" method="post"
                    class="ventana-alquilar__form--width">
                    @csrf
                    <div>
                        <label for="precio" class="ventana-alquilar__label">Precio</label>
                        <input type="number" class="ventana-alquilar__input" name="precio" id="precio"
                            value="{{ $ejemplar->precio }}" readonly>
                        <label for="fecha_alquiler" class="ventana-alquilar__label">Fecha de alquiler</label>
                        <input type="date" class="ventana-alquilar__input" name="fecha_alquiler" id="fecha_alquiler"
                            value="{{ date('Y-m-d') }}" disabled>
                        <label for="fecha_devolucion" class="ventana-alquilar__label">Fecha de devolución</label>
                        <input type="date" class="ventana-alquilar__input" name="fecha_devolucion" id="fecha_devolucion"
                            value="{{ date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))) }}" disabled>
                    </div>

                    <div class="ventana-alquilar__div--flex">
                        <button type="submit" class="ventana-alquilar__button">Alquilar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
