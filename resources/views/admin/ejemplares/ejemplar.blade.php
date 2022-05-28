@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="buscador">
        <form action="{{ route('ejemplar.buscar') }}" method="post">
            @csrf
            <label for="nombre">Buscar ejemplar por nombre</label>
            <input type="text" name="nombre" id="nombre">
            <button class="btn btn-dark">Buscar</button>
            <a href="{{ route('ejemplar.ejemplares') }}" class="btn btn-danger">Atras</a>

        </form>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Epilogo</th>
            <th>Fecha Publicación</th>
            <th>Tema</th>
            <th>Editorial</th>
            <th>Autor</th>
            <th>Coleccion</th>
        </thead>
        <tbody>
            @foreach ($ejemplares as $item)
                <tr>
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->nomEjemplar }}</td>
                    <td>{{ $item->epilogo }}</td>
                    <td>{{ $item->fecPublicacion }}</td>
                    <td>{{ $item->tema }}</td>
                    @foreach ($item->editorial() as $editorial)
                        <td>{{ $editorial->nomEditorial }}</td>
                    @endforeach
                    @foreach ($item->autor() as $autor)
                        <td>{{ $autor->nomAutor }} {{ $autor->ape1Autor }} {{ $autor->ape2Autor }}</td>
                    @endforeach
                    @foreach ($item->coleccion() as $coleccion)
                        <td>{{ $coleccion->nomColeccion }}</td>
                    @endforeach
                    <td><a href="#" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
