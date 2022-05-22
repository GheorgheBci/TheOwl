@extends('layouts.app')

@section('javascript')
    <script src="{{ asset('js/script.js') }}" async></script>
@endsection

@section('titulo', 'Ejemplares')

@section('content')

    <div class="ejemplar">

        <h1 class="ejemplar__titulo">{{ $ejemplar->nomEjemplar }}</h1>

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
                        <p class="puntuacion__p">Puntuación: <span id="puntuacion">{{ $ejemplar->puntuacion }}</span>/5 |
                            {{ $ejemplar->votos }} Votos</p>
                    @else
                        <p class="puntuacion__p">Puntuación: <span
                                id="puntuacion">{{ round($ejemplar->puntuacion / $ejemplar->votos) }}</span>/5 |
                            {{ $ejemplar->votos }} {{ trans_choice('mensajes.votos', $ejemplar->votos) }}</p>
                    @endif
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
                        <td>{{ $ejemplar->codAutor }}</td>
                        @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Editorial: </td>
                        <td>
                            @if ($ejemplar->codEditorial === null)
                                <p>Sin editorial</p>
                            @else
                        <td>{{ $ejemplar->codEditorial }}</td>
                        @endif
                        </td>
                    </tr>

                    <tr class="texto__tr--height">
                        <td class="texto__td--width">Colección: </td>
                        <td>
                            @if ($ejemplar->codColeccion === null)
                                <p>Sin colección</p>
                            @else
                        <td>{{ $ejemplar->codColeccion }}</td>
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

                <div class="botones">
                    <a href="#" class="botones__a">Alquilar</a>
                    <a href="{{ route('ejemplar.ejemplares') }}" class="botones__a">Atrás</a>
                </div>
            </div>
        </div>
    </div>

@endsection
