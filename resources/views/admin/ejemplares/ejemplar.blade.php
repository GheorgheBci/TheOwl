@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('ejemplar.admin-buscar') }}" method="post">
                @csrf
                <span class="buscador__icono"><i class="fa fa-search"></i></span>
                <input type="text" class="buscador__input" name="ejemplar"
                    placeholder="Buscar un ejemplar por su ISBN..." />
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--center">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mensaje__error--red mensaje__exito--center">
            {{ session('error') }}
        </div>
    @endif

    <table class="admin__table">
        <thead class="admin__thead">
            <th class="admin__th">#</th>
            <th class="admin__th">Nombre</th>
            <th class="admin__th">Fecha Publicación</th>
            <th class="admin__th">Tema</th>
            <th class="admin__th">Idioma</th>
            <th class="admin__th">Portada</th>
            <th class="admin__th">Puntuación</th>
            <th class="admin__th">Votos</th>
            <th class="admin__th">Contenido</th>
            <th class="admin__th">Editorial</th>
            <th class="admin__th">Autor</th>
            <th class="admin__th">Coleccion</th>
        </thead>
        <tbody>
            <tr class="admin__tbody-tr">
                <td class="admin__td">{{ $ejemplar->isbn }}</td>
                <td class="admin__td">{{ $ejemplar->nomEjemplar }}</td>
                <td class="admin__td">{{ $ejemplar->fecPublicacion }}</td>
                <td class="admin__td">{{ $ejemplar->tema }}</td>
                <td class="admin__td">{{ $ejemplar->idioma }}</td>
                <td class="admin__td">
                    <div class="pp"><img src="{{ asset('book/' . $ejemplar->image_book) }}" alt="portada"
                            class="admin__ejemplar-portada"></div>
                </td>
                <td class="admin__td">{{ $ejemplar->puntuacion }}</td>
                <td class="admin__td">{{ $ejemplar->votos }}</td>
                <td class="admin__td">
                    <div class="admin__contenido-ejemplar--ellipsis">
                        {{ $ejemplar->contenido }}</div>
                </td>

                @if ($ejemplar->codEditorial === null)
                    <td class="admin__td">NULL</td>
                @else
                    @foreach ($ejemplar->editorial() as $edit)
                        <td class="admin__td">{{ $edit->nomEditorial }}</td>
                    @endforeach
                @endif

                @if ($ejemplar->codAutor === null)
                    <td class="admin__td">Anónimo</td>
                @else
                    @foreach ($ejemplar->autor() as $aut)
                        <td class="admin__td">{{ $aut->nomAutor }} {{ $aut->ape1Autor }}
                            {{ $aut->ape2Autor }}</td>
                    @endforeach
                @endif

                @if ($ejemplar->codColeccion === null)
                    <td class="admin__td">NULL</td>
                @else
                    @foreach ($ejemplar->coleccion() as $colecc)
                        <td class="admin__td">{{ $colecc->nomColeccion }}</td>
                    @endforeach
                @endif

                <td><a href="{{ route('ejemplar.admin-editar', $ejemplar) }}"><i
                            class="fa-solid fa-pen-to-square admin__boton"></i></a></td>
                <td class="admin__td"><a href="{{ route('ejemplar.admin-eliminar', $ejemplar) }}"
                        class="btn btn-dark"><i class="fa-solid fa-trash admin__boton"></i></a></td>
            </tr>
        </tbody>
    </table>
@endsection
