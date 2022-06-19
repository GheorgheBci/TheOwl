@extends('layouts.app')

@section('titulo', 'WishList')

@section('content')

    <div class="wishlist">
        <i class="fas fa-heart wishlist__corazon"></i>
        <h1 class="wishlist__titulo">My WishList</h1>
        @if (session('success'))
            <div class="mensaje__exito mensaje__exito--center">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if (session('carrito'))
            <div class="mensaje__exito mensaje__exito--center">
                <strong>{{ session('carrito') }}</strong>
            </div>
        @endif

        @if (session('error'))
            <div class="mensaje__error mensaje__error--center">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif

        @if (count($milista) === 0)
            <p class="wishlist__nada">{{ __('Nothing on your WishList') }} </p>
            <a href="{{ route('ejemplar.ejemplares') }}" class="wishlist__enlace">{{ __('Add') }}</a>
        @else
            <table class="wishlist__tabla">
                <thead class="wishlist__tabla-thead">
                    <tr>
                        <th class="wishlist__tabla-th">{{ __('Cover') }}</th>
                        <th class="wishlist__tabla-th">{{ __('Book') }}</th>
                        <th class="wishlist__tabla-th">{{ __('Price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($milista as $item)
                        <tr class="wishlist__tabla-tr">

                            <td class="wishlist__tabla-td whishlist__tabla-td--block">
                                <div>
                                    <img src="{{ asset('book/' . $item->image_book) }}" alt="portada"
                                        class="wishlist__portada-libro">
                                </div>
                            </td>
                            <td class="wishlist__tabla-td whishlist__tabla-td--block">
                                {{ $item->nomEjemplar }}
                            </td>
                            <td class="wishlist__tabla-td whishlist__tabla-td--block">{{ $item->precio }}$</td>
                            <td class="wishlist__tabla-td wishlist__tabla-td--inline">
                                <a href="{{ route('usuario.remove', $item) }}" title="{{ __('Delete') }}"><i
                                        class="fa-solid fa-trash wishlist__iconos"></i></a>

                            </td>
                            <td class="wishlist__tabla-td wishlist__tabla-td--inline">
                                <a href="{{ route('carrito.añadir', $item) }}" title="{{ __('Add to Cart') }}"><i
                                        class="fa-solid fa-cart-arrow-down wishlist__iconos"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection
