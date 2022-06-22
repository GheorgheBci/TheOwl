@extends('layouts.app')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="ejemplar">
        <h1 class="ejemplar__titulo">{{ $ejemplar->nomEjemplar }}</h1>

        <p class="ejemplar__iconos">
            @auth
                @if (DB::table('wishlist')->where('codUsu', Auth::user()->codUsu)->where('isbn', $ejemplar->isbn)->first())
                    <a href="#" title="{{ __('Book added to WishList') }}" class="ejemplar__corazon-rojo"><i
                            class="fas fa-heart"></i></a>
                    <a href="{{ route('carrito.añadir', $ejemplar) }}" id="carrito" title="{{ __('Add to Cart') }}"
                        class="ejemplar__carrito"><i class="fa-solid fa-cart-arrow-down"></i></a>
                @else
                    <a href="{{ route('usuario.add', $ejemplar) }}" id="corazon" title="{{ __('Add to WishList') }}"
                        class="ejemplar__corazon-negro"><i class="fas fa-heart"></i></a>
                    <a href="{{ route('carrito.añadir', $ejemplar) }}" id="carrito" title="{{ __('Add to Cart') }}"
                        class="ejemplar__carrito"><i class="fa-solid fa-cart-arrow-down"></i></a>
                @endif
            @endauth

            @guest
                <a href="{{ route('usuario.add', $ejemplar) }}" class="ejemplar__corazon-negro"><i
                        class="fas fa-heart"></i></a>
                <a href="{{ route('carrito.añadir', $ejemplar) }}" class="ejemplar__carrito"><i
                        class="fa-solid fa-cart-arrow-down"></i></a>

            @endguest
        </p>

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
                        <p class="puntuacion__p--precio">{{ $ejemplar->precio }}€</p>
                    @else
                        <p class="puntuacion__p">({{ $ejemplar->votos }})</p>
                        <p class="puntuacion__p--precio">{{ $ejemplar->precio }}€</p>
                        <span id="puntuacion"
                            class="puntuacion__media">{{ round($ejemplar->puntuacion / $ejemplar->votos) }}</span>
                    @endif

                    <audio id="sonido-puntuar" src="{{ asset('sound/511484__mlaudio__success-bell.wav') }}"></audio>
                </div>
                <div class="botones">
                    <a href="#" id="alquilar" class="botones__a">{{ __('Rent') }}</a>
                    <a href="{{ route('ejemplar.ejemplares') }}" class="botones__a">{{ __('Back') }}</a>
                </div>
            </div>

            <div class="detalles__separador"></div>

            <div class="detalles__texto">

                <h2 class="texto__subtitulo">{{ __('Book details') }}</h2>
                <table class="texto__table">

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Author') }}: </td>
                        <td class="texto__td">
                            @if ($ejemplar->codAutor === null)
                                <p>{{ __('Anonymous') }}</p>
                            @else
                                @foreach ($ejemplar->autor() as $item)
                                    {{ $item->nomAutor }} {{ $item->ape1Autor }} {{ $item->ape2Autor }}
                                @endforeach
                        </td>
                        @endif
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Publisher') }}: </td>
                        <td class="texto__td">
                            @if ($ejemplar->codEditorial === null)
                                <p>{{ __('No Publisher') }}</p>
                            @else
                                @foreach ($ejemplar->editorial() as $item)
                                    {{ $item->nomEditorial }}
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Collection') }}: </td>
                        <td class="texto__td">
                            @if ($ejemplar->codColeccion === null)
                                <p>{{ __('No Collection') }}</p>
                            @else
                                @foreach ($ejemplar->coleccion() as $item)
                                    {{ $item->nomColeccion }}
                                @endforeach
                            @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Topic:') }} </td>
                        <td class="texto__td">{{ $ejemplar->tema }}</td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Language:') }} </td>
                        <td class="texto__td">{{ $ejemplar->idioma }}</td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td texto__td--width">{{ __('Date:') }}</td>
                        <td class="texto__td">{{ $ejemplar->fecPublicacion }}</td>
                    </tr>
                </table>

                <h2 class="texto__subtitulo">{{ __('Epilogue') }}</h2>
                <p class="texto__epilogo">{{ $ejemplar->epilogo }}</p>


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

        @if (session('error'))
            <div class="mensaje">
                <div class="mensaje__div mensaje__div--error">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('error') }}</h2>
                </div>
            </div>
        @endif

        <div class="fondo" id="fondo">
            <div class="ventana-alquilar" id="ventana-alquilar">
                <a href="#" class="ventana-alquilar__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
                <h3 class="ventana-alquilar__h3">{{ $ejemplar->nomEjemplar }}</h3>
                <form action="{{ route('ejemplar.alquilar', $ejemplar) }}" method="post"
                    class="ventana-alquilar__form--width">
                    @csrf
                    <div>
                        @auth
                            @if (Auth::user()->idRol === 2)
                                <label for="precio" class="ventana-alquilar__label">{{ __('Price') }}</label>
                                <input type="number" class="ventana-alquilar__input" name="precio" id="precio"
                                    value="{{ $ejemplar->precio - $ejemplar->precio * 0.2 }}" readonly>
                                <label for="fecha_alquiler" class="ventana-alquilar__label">{{ __('Rental date') }}</label>
                                <input type="date" class="ventana-alquilar__input" name="fecha_alquiler"
                                    id="fecha_alquiler" value="{{ date('Y-m-d') }}" disabled>
                                <label for="fecha_devolucion"
                                    class="ventana-alquilar__label">{{ __('Return date') }}</label>
                                <input type="date" class="ventana-alquilar__input" name="fecha_devolucion"
                                    id="fecha_devolucion"
                                    min="{{ date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))) }}"
                                    max="{{ date('Y-m-d', strtotime('+60 day', strtotime(date('Y-m-d')))) }}"
                                    value="{{ date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))) }}">
                            @else
                                <label for="precio" class="ventana-alquilar__label">{{ __('Price') }}</label>
                                <input type="number" class="ventana-alquilar__input" name="precio" id="precio"
                                    value="{{ $ejemplar->precio }}" readonly>
                                <label for="fecha_alquiler" class="ventana-alquilar__label">{{ __('Rental date') }}</label>
                                <input type="date" class="ventana-alquilar__input" name="fecha_alquiler"
                                    id="fecha_alquiler" value="{{ date('Y-m-d') }}" disabled>
                                <label for="fecha_devolucion"
                                    class="ventana-alquilar__label">{{ __('Return date') }}</label>
                                <input type="date" class="ventana-alquilar__input" name="fecha_devolucion"
                                    id="fecha_devolucion"
                                    value="{{ date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))) }}" readonly>
                            @endif
                        @endauth
                    </div>

                    <div class="ventana-alquilar__div--flex">
                        <button type="submit" class="ventana-alquilar__button">{{ __('Rent') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
