@extends('layouts.admin')

@section('titulo', 'Colecciones')

@section('content')
    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('coleccion.buscar') }}" method="post">
                @csrf
                <span class="buscador__icono"><i class="fa fa-search"></i></span>
                <input type="text" class="buscador__input" name="coleccion" placeholder="Buscar una colección..." />
            </form>
        </div>
    </div>

    @error('coleccion')
        <div class="mensaje__error--center">
            <span class="mensaje__error">
                <strong>{{ $message }}</strong>
            </span>
        </div>
    @enderror

    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--center">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="mensaje__error mensaje__error--center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <table class="admin__table">
        <thead class="admin__thead">
            <th class="admin__th">#</th>
            <th class="admin__th">Nombre</th>
        </thead>
        <tbody>
            @foreach ($colecciones as $item)
                <tr class="admin__tbody-tr">
                    <td class="admin__td">{{ $item->codColeccion }}</td>
                    <td class="admin__td">
                        <form action="{{ route('coleccion.actualizar', $item) }}" method="post">
                            @csrf
                            <span class="admin-coleccion__nombre">{{ $item->nomColeccion }}</span>
                            <input type="text" class="admin__coleccion-input" name="coleccion"
                                value="{{ $item->nomColeccion }}">
                            <button type="submit" class="admin__coleccion-button"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__coleccion-button-cerrar"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td"><a href="{{ route('coleccion.eliminar', $item) }}"
                            class="btn btn-dark"><i class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__coleccion" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__coleccion-h3">Crear nueva Colección</h3>
            <form action="{{ route('coleccion.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="coleccion" class="ventana-crear__label ventana-crear__colecciom-label">Nombre</label>
                        <input type="text" class="ventana-crear__input ventana-crear__coleccion-input" name="coleccion" required>
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">Crear</button>
                </div>
            </form>
        </div>
    </div>

    {{ $colecciones->links() }}

@endsection
