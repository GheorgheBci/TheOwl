@extends('layouts.admin')

@section('titulo', 'Autores')

@section('content')
    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('autor.buscar') }}" method="post">
                @csrf
                <button type="submit" class="buscador__icono"><i class="fa fa-search"></i></button>
                <input type="text" class="buscador__input" name="autor"
                    placeholder="Buscar un autor por su nombre..." />
            </form>
        </div>
    </div>

    <div class="mensajes__error-autor">
        @error('nombre')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>Nombre: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('ape1')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>Primer apellido: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('ape2')
            <div>
                <span class="mensaje__error mensaje__error--fs">
                    <strong>Segundo apellido: {{ $message }}</strong>
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
                <th class="admin__th">Nombre</th>
                <th class="admin__th">Primer apellido</th>
                <th class="admin__th">Segundo apellido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $item)
                <tr class="admin__tbody-tr--autor">
                    <td class="admin__td--autor" data-datos="Código">{{ $item->codAutor }}</td>
                    <td class="admin__td--autor" data-datos="Nombre">
                        <form action="{{ route('autor.actualizar-nombre', $item) }}" method="post">
                            @csrf
                            <span class="admin-autor__nombre">{{ $item->nomAutor }}</span>
                            <input type="text" class="admin__autor-input" name="nombre" value="{{ $item->nomAutor }}">
                            <button type="submit" class="admin__autor-button"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__autor-button-cerrar"> <i class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td--autor" data-datos="Primer Apellido">
                        <form action="{{ route('autor.actualizar-ape1', $item) }}" method="post">
                            @csrf
                            <span class="admin-autor__ape1">{{ $item->ape1Autor }}</span>
                            <input type="text" class="admin__autor-ape1-input" name="ape1"
                                value="{{ $item->ape1Autor }}">
                            <button type="submit" class="admin__autor-ape1-button"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__autor-ape1-button-cerrar"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td--autor" data-datos="Segundo Apellido">
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
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__autor-ape2-button-cerrar"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td"><a href="{{ route('autor.eliminar', $item) }}" class="btn btn-dark"><i
                                class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__autor" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__autor-h3">Nuevo Autor/ra</h3>
            <form action="{{ route('autor.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="nombre" class="ventana-crear__label ventana-crear__autor-label">Nombre</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="nombre"
                            required>
                    </div>
                    <div>
                        <label for="ape1" class="ventana-crear__label ventana-crear__autor-label">Primer
                            apellido</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="ape1"
                            required>
                    </div>
                    <div>
                        <label for="ape2" class="ventana-crear__label ventana-crear__autor-label">Segundo
                            apellido</label>
                        <input type="text" class="ventana-crear__input ventana-crear__autor-input" name="ape2">
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">Crear</button>
                </div>
            </form>
        </div>
    </div>

    {{ $autores->links() }}
@endsection
