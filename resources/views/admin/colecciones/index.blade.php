@extends('layouts.admin')

@section('titulo', 'Colecciones')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach ($colecciones as $item)
                <tr>
                    <td>{{ $item->codColeccion }}</td>
                    <td>{{ $item->nomColeccion }}</td>
                    <td><a href="#" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
