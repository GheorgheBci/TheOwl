@extends('layouts.app')

@section('titulo', 'Carrito')

@section('content')

    <h1 class="carrito__titulo">Mi Carrito ({{ $cantidad }})</h1>

    @if (count($ejemplar) === 0)
        <div class="carrito__nada">
            <p>No tienes nada en el carrito</p>
            <a href="{{ route('ejemplar.ejemplares') }}" class="carrito__enlace">Añadir</a>
        </div>
    @else
        <div class="carrito">
            <table class="carrito__tabla">
                <thead class="carrito__thead">
                    <tr>
                        <th class="carrito__mi-carrito carrito__th"></th>
                        <th class="carrito__th">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ejemplar as $item)
                        <tr class="carrito__tbody-tr">
                            <td class="carrito__ejemplar">
                                <div class="carrito__portada">
                                    <img src="{{ asset('book/' . $item->attributes->portada) }}" alt="portada"
                                        class="carrito__img">
                                </div>

                                <div class="texto">
                                    <p class="carrito__nombre-ejemplar"> {{ $item->name }}</p>
                                    <a href="{{ route('borrar', $item->id) }}" class="carrito__a">Eliminar</a>
                                </div>
                            </td>
                            <td class="carrito__td">
                                <div class="carrito__precio-ejemplar"><span class="precio">Precio:
                                    </span>{{ $item->price }}$ </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="carrito__alquilar">
                <p><strong>Total:</strong> {{ $total }}$</p>
                <a href="{{ route('alquilar') }}" class="carrito__boton">Alquilar</a>
            </div>
        </div>
    @endif
@endsection
