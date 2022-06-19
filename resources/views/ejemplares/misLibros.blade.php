@extends('layouts.app')

@section('titulo', 'Mis libros')

@section('content')

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('ejemplar.buscar-mis-libros') }}" method="post">
                @csrf
                <button class="buscador__icono"><i class="fa fa-search"></i></button>
                <input type="search" class="buscador__input" name="ejemplar" placeholder="{{ __('Find a book...') }}" />
            </form>
        </div>
    </div>

    @if (session('error'))
        <div class="mensaje__error mensaje__error--center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="filtro">

        <p class="filtro__p">{{ $numero }} {{ trans_choice('messages.ejemplar', $numero) }}</p>

        <div id="mostrar-ordenar" class="ordenar">
            <p class="ordenar__p">{{ __('Sort by...') }}</p>
            <ul id="opciones-ordenar" class="ordenar__ul">
                <li class="ordenar__li"><a href="{{ route('ejemplar.ordenar-mis-libros', 1) }}"
                        class="ordenar__a">{{ __('Name') }}
                        [a-z]</a>
                </li>
                <li class="ordenar__li"><a href="{{ route('ejemplar.ordenar-mis-libros', 2) }}"
                        class="ordenar__a">{{ __('Name') }}
                        [z-a]</a>
                </li>
                <li class="ordenar__li"><a href="{{ route('ejemplar.ordenar-mis-libros', 3) }}"
                        class="ordenar__a">{{ __('Older') }}</a></li>
                <li class="ordenar__li"><a href="{{ route('ejemplar.ordenar-mis-libros', 4) }}"
                        class="ordenar__a">{{ __('Newer') }}</a></li>
                <li class="ordenar__li"><a href="{{ route('ejemplar.ordenar-mis-libros', 5) }}"
                        class="ordenar__a">{{ __('Best Rated') }}</a>
                </li>
            </ul>
        </div>

    </div>

    @isset($resultado)
        <h2 class="ejemplar__resultado">{{ __('Result') }}: {{ $resultado }}</h2>
    @endisset

    <div class="ejemplares">
        @if (count($misLibros) !== 0)
            @foreach ($misLibros as $item)
                <div class="libro">
                    <ul class="libro__paginas">
                        <li class="libro__portada libro__li">
                            <img src="{{ asset('book/' . $item->image_book) }}" alt="portada" class="libro__img">
                        </li>
                        <li class="libro__contratapa libro__li"></li>
                        <li class="libro__pagina libro__li">
                        </li>
                        <li class="libro__pagina libro__li">
                        </li>
                        <li class="libro__pagina libro__li">
                        </li>
                        <li class="libro__pagina libro__enlace libro__li">
                            <a href="{{ route('usuario.libro', $item) }}" class="libro__a">{{ __('Read') }}</a>
                        </li>
                        <li class="libro__pagina libro__li">
                        </li>
                        <li class="libro__contraportada"></li>
                    </ul>
                </div>
            @endforeach
        @else
            <div class="ejemplares__alquileres-nada">
                <p>{{ __('You have not rented any books') }}</p>
                <a href="{{ route('ejemplar.ejemplares') }}" class="ejemplares__alquileres-enlace">{{ __('Add') }}</a>
            </div>
        @endif

    </div>

    {{ $misLibros->links() }}

@endsection
