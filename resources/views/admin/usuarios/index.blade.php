@extends('layouts.admin')

@section('titulo', 'Usuarios')

@section('content')

    <div class="buscador">
        <form action="{{ route('usuario.buscar') }}" method="post">
            @csrf
            <label for="email">Buscar usuario por email</label>
            <input type="email" name="email" id="email">
            <button class="btn btn-dark">Buscar</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Fecha de Nacimiento</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha Inicio Socio</th>
            <th>Fecha Fin Socio</th>
            <th>Baja</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $item)
                <tr>
                    <td>{{ $item->codUsu }}</td>
                    <td>{{ $item->nombre }} {{ $item->apellido1 }} {{ $item->apellido2 }}</td>
                    <td>{{ $item->fecNacimiento }}</td>
                    <td>{{ $item->email }}</td>
                    @foreach ($item->rol() as $items)
                        <td>{{ $items->rol }}</td>
                    @endforeach
                    <td>{{ $item->fec_ini_socio }}</td>
                    <td>{{ $item->fec_fin_socio }}</td>
                    @if ($item->baja == 0)
                        <td>No</td>
                    @else
                        <td>Si</td>
                    @endif
                    <td><a href="#" class="btn btn-dark">Editar</a></td>
                    <td><a href="{{ route('usuario.eliminar', $item->codUsu) }}" class="btn btn-dark">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
@endsection
