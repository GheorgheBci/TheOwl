@extends('layouts.app')

@section('titulo', 'Carrito')

@section('content')

    <h1 class="carrito__titulo">{{ __('My Cart') }} ({{ $cantidad }})</h1>

    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--center">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (count($ejemplar) === 0)
        <div class="carrito__nada">
            <p>{{ __('Nothing in your shopping cart') }}</p>
            <a href="{{ route('ejemplar.ejemplares') }}" class="carrito__enlace">{{ __('Add') }}</a>
        </div>
    @else
        <div class="carrito">
            <table class="carrito__tabla">
                <thead class="carrito__thead">
                    <tr>
                        <th class="carrito__mi-carrito carrito__th"></th>
                        <th class="carrito__th">{{ __('Price') }}</th>
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
                                    <a href="{{ route('carrito.eliminar', $item->id) }}" class="carrito__a">{{ __('Delete') }}</a>
                                </div>
                            </td>
                            <td class="carrito__td">
                                <div class="carrito__precio-ejemplar"><span class="precio">{{ __('Price') }}:
                                    </span>{{ $item->price }}€ </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="carrito__alquilar">
                <p><strong>Total:</strong> {{ $total }}€</p>
                <a href="{{ route('carrito.alquilar') }}" class="carrito__boton">{{ __('Rent') }}</a>
            </div>

        </div>
    @endif
    @if (session('alquilado'))
        <div class="mensaje">
            <div class="mensaje__div mensaje__div--success">
                <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                <h2 class="mensaje__h2">{{ session('alquilado') }}</h2>
            </div>
        </div>
    @endif
@endsection
