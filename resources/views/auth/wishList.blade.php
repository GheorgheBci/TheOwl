@extends('layouts.app')

@section('titulo', 'WishList')

@section('content')

    <div class="wishlist">
        <i class="fas fa-heart wishlist__corazon"></i>
        <h1 class="wishlist__titulo">My WishList</h1>

        @if (count($milista) === 0)
            <p class="wishlist__nada">No tienes nada en tu WishList </p>
            <a href="{{ route('ejemplar.ejemplares') }}" class="wishlist__enlace">Añadir</a>
        @else
            <table class="wishlist__tabla">
                <thead class="wishlist__tabla-thead">
                    <tr>
                        <th class="wishlist__tabla-th"></th>
                        <th class="wishlist__tabla-th">Portada</th>
                        <th class="wishlist__tabla-th">Producto</th>
                        <th class="wishlist__tabla-th">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($milista as $item)
                        <tr class="wishlist__tabla-tr">
                            <td class="wishlist__tabla-td"><a href="{{ route('usuario.remove', $item) }}"><i
                                        class="fa-solid fa-trash wishlist__quitar"></i></a></td>
                            <td class="wishlist__tabla-td">
                                <div>
                                    <img src="{{ asset('book/' . $item->image_book) }}" alt="portada"
                                        class="wishlist__portada-libro">
                                </div>
                            </td>
                            <td class="wishlist__tabla-td">
                                {{ $item->nomEjemplar }}
                            </td>
                            <td class="wishlist__tabla-td">{{ $item->precio }}$</td>
                            <td class="wishlist__tabla-td">Añadir al carro</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
