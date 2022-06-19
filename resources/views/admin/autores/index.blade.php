@extends('layouts.admin')

@section('titulo', 'Autores')

@section('content')
    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" title="{{ __('Create') }}"  id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('autor.buscar') }}" method="post">
                @csrf
                <button type="submit" class="buscador__icono" title="{{ __('Search') }}"><i class="fa fa-search"></i></button>
                <input type="text" class="buscador__input" name="autor"
                    placeholder="{{ __('Search for an author by name...') }}" />
            </form>
        </div>
    </div>

    <div class="mensajes__error-autor">
        @error('nombre')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>{{ __('Name') }}: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('ape1')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>{{ __('First Surname') }}: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('ape2')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>{{ __('Second Surname') }}: {{ $message }}</strong>
                </span>
            </div>
        @enderror

    </div>
    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--fs mensaje__exito--center">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="mensaje__error mensaje__error--fs mensaje__error--center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <table class="admin__table--autor">
        <thead class="admin__thead--autor">
            <tr class="admin__thead-tr--autor">
                <th class="admin__th">#</th>
                <th class="admin__th">{{ __('Name') }}</th>
                <th class="admin__th">{{ __('First Surname') }}</th>
                <th class="admin__th">{{ __('Second Surname') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $item)
                <tr class="admin__tbody-tr--autor">
                    <td class="admin__td--autor" data-datos="{{ __('Code') }}">{{ $item->codAutor }}</td>
                    <td class="admin__td--autor" data-datos="{{ __('Name') }}">
                        <form action="{{ route('autor.actualizar-nombre', $item) }}" method="post">
                            @csrf
                            <span class="admin-autor__nombre">{{ $item->nomAutor }}</span>
                            <input type="text" class="admin__autor-input" name="nombre" value="{{ $item->nomAutor }}">
                            <button type="submit" class="admin__autor-button" title="{{ __('Edit') }}"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__autor-button-cerrar" title="{{ __('Close') }}"> <i class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td--autor" data-datos="{{ __('First Surname') }}">
                        <form action="{{ route('autor.actualizar-ape1', $item) }}" method="post">
                            @csrf
                            <span class="admin-autor__ape1">{{ $item->ape1Autor }}</span>
                            <input type="text" class="admin__autor-ape1-input" name="ape1"
                                value="{{ $item->ape1Autor }}">
                            <button type="submit" class="admin__autor-ape1-button"><i
                                    class="fa-solid fa-pen-to-square" title="{{ __('Edit') }}"></i></button>
                            <button type="button" class="admin__autor-ape1-button-cerrar" title="{{ __('Close') }}"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td--autor" data-datos="{{ __('Second Surname') }}">
                        <form action="{{ route('autor.actualizar-ape2', $item) }}" method="post">
                            @csrf
                            @if (empty($item->ape2Autor))
                            <span class="admin-autor__ape2">NULL</span>
                            @else
                                <span class="admin-autor__ape2">{{ $item->ape2Autor }}</span>
                            @endif
                            <input type="text" class="admin__autor-ape2-input" name="ape2"
                                value="{{ $item->ape2Autor }}">
                            <button type="submit" class="admin__autor-ape2-button"><i
                                    class="fa-solid fa-pen-to-square" title="{{ __('Edit') }}"></i></button>
                            <button type="button" class="admin__autor-ape2-button-cerrar" title="{{ __('Close') }}"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td"><a href="{{ route('autor.eliminar', $item) }}" title="{{ __('Delete') }}" class="btn btn-dark"><i
                                class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__autor" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__autor-h3">{{ __('New Author') }}</h3>
            <form action="{{ route('autor.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="nombre" class="ventana-crear__label ventana-crear__autor-label">{{ __('Name') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="nombre"
                            required>
                    </div>
                    <div>
                        <label for="ape1" class="ventana-crear__label ventana-crear__autor-label">{{ __('First Surname') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="ape1"
                            required>
                    </div>
                    <div>
                        <label for="ape2" class="ventana-crear__label ventana-crear__autor-label">{{ __('Second Surname') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="ape2">
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>

    {{ $autores->links() }}
@endsection
