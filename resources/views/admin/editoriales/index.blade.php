@extends('layouts.admin')

@section('titulo', 'Editoriales')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach ($editoriales as $item)
                <tr>
                    <td>{{ $item->codEditorial }}</td>
                    <td>{{ $item->nomEditorial }}</td>
                    <td><a href="#" class="btn btn-primary">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
