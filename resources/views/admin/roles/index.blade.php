@extends('layouts.admin')

@section('titulo', 'Roles')

@section('content')
    <table class="table">
        <thead>
            <th>#</th>
            <th>Rol</th>
        </thead>
        <tbody>
            @foreach ($roles as $item)
                <tr>
                    <td>{{ $item->idRol }}</td>
                    <td>{{ $item->rol }}</td>
                    <td><a href="#" class="btn btn-dark">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
