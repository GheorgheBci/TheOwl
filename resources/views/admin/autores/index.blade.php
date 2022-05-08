@extends('layouts.admin')

@section('titulo', 'Autores')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach ($autores as $item)
                <tr>
                    <td>{{ $item->codAutor }}</td>
                    <td>{{ $item->nomAutor }} {{ $item->ape1Autor }} {{ $item->ape2Autor }}</td>
                    <td><a href="#" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
