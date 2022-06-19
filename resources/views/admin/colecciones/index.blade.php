@extends('layouts.admin')

@section('titulo', 'Colecciones')

@section('content')
    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" title="{{ __('Create') }}"  id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('coleccion.buscar') }}" method="post">
                @csrf
                <button type="submit" class="buscador__icono" title="{{ __('Search') }}"><i class="fa fa-search"></i></button>
                <input type="text" class="buscador__input" name="coleccion" placeholder="{{ __('Search for a collection...') }}" />
            </form>
        </div>
    </div>

    @error('coleccion')
        <div class="mensaje__error--center">
            <span class="mensaje__error mensaje__error--fs">
                <strong>{{ $message }}</strong>
            </span>
        </div>
    @enderror

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

    <table class="admin__table--coleccion">
        <thead class="admin__thead--coleccion">
            <tr class="admin__thead-tr--coleccion">
                <th class="admin__th">#</th>
                <th class="admin__th">{{ __('Name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colecciones as $item)
                <tr class="admin__tbody-tr--coleccion">
                    <td class="admin__td--coleccion" data-datos="{{ __('Code') }}">{{ $item->codColeccion }}</td>
                    <td class="admin__td--coleccion" data-datos="{{ __('Name') }}">
                        <form action="{{ route('coleccion.actualizar', $item) }}" method="post">
                            @csrf
                            <span class="admin-coleccion__nombre">{{ $item->nomColeccion }}</span>
                            <input type="text" class="admin__coleccion-input" name="coleccion"
                                value="{{ $item->nomColeccion }}">
                            <button type="submit" class="admin__coleccion-button"><i
                                    class="fa-solid fa-pen-to-square" title="{{ __('Edit') }}"></i></button>
                            <button type="button" class="admin__coleccion-button-cerrar" title="{{ __('Close') }}"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td"><a href="{{ route('coleccion.eliminar', $item) }}"
                            class="btn btn-dark" title="{{ __('Delete') }}" ><i class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__coleccion" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__coleccion-h3">{{ __('New Collection') }}</h3>
            <form action="{{ route('coleccion.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="coleccion" class="ventana-crear__label ventana-crear__colecciom-label">{{ __('Name') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__coleccion-input" name="coleccion"
                            required>
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>

    {{ $colecciones->links() }}

@endsection
