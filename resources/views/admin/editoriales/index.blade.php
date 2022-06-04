@extends('layouts.admin')

@section('titulo', 'Editoriales')

@section('content')
    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('editorial.buscar') }}" method="post">
                @csrf
                <span class="buscador__icono"><i class="fa fa-search"></i></span>
                <input type="text" class="buscador__input" name="editorial" placeholder="Buscar una editorial..." />
            </form>
        </div>
    </div>

    @error('editorial')
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
            @foreach ($editoriales as $item)
                <tr class="admin__tbody-tr">
                    <td class="admin__td">{{ $item->codEditorial }}</td>
                    <td class="admin__td">
                        <form action="{{ route('editorial.actualizar', $item) }}" method="post">
                            @csrf
                            <span class="admin-editorial__nombre">{{ $item->nomEditorial }}</span>
                            <input type="text" class="admin__editorial-input" name="editorial"
                                value="{{ $item->nomEditorial }}">
                            <button type="submit" class="admin__editorial-button"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__editorial-button-cerrar"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                    <td class="admin__td"><a href="{{ route('editorial.eliminar', $item) }}"
                            class="btn btn-dark"><i class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__editorial" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__editorial-h3">Crear nueva Editorial</h3>
            <form action="{{ route('editorial.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="editorial" class="ventana-crear__label ventana-crear__editorial-label">Nombre</label>
                        <input type="text" class="ventana-crear__input ventana-crear__editorial-input" name="editorial" required>
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">Crear</button>
                </div>
            </form>
        </div>
    </div>

    {{ $editoriales->links() }}
@endsection
