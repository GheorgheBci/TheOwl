@extends('layouts.admin')

@section('titulo', 'Usuarios')

@section('content')

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('usuario.buscar') }}" method="post">
                @csrf
                <span class="buscador__icono"><i class="fa fa-search"></i></span>
                <input type="email" class="buscador__input" name="email" placeholder="Buscar un usuario por su email..." />
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
            <th class="admin__th">Nombre Completo</th>
            <th class="admin__th">Fecha de Nacimiento</th>
            <th class="admin__th">Email</th>
            <th class="admin__th">Rol</th>
            <th class="admin__th">Fecha verificación</th>
            <th class="admin__th">Fecha Inicio Socio</th>
            <th class="admin__th">Fecha Fin Socio</th>
            <th class="admin__th">Baja</th>
        </thead>
        <tbody>
            <tr class="admin__tbody-tr">
                <td class="admin__td">{{ $usuario->codUsu }}</td>
                <td class="admin__td">{{ $usuario->nombre }} {{ $usuario->apellido1 }} {{ $usuario->apellido2 }}
                </td>
                <td class="admin__td">{{ $usuario->fecNacimiento }}</td>
                <td class="admin__td">{{ $usuario->email }}</td>
                @foreach ($usuario->rol() as $item)
                    <td class="admin__td">
                        <form action="{{ route('usuario.cambiar', $usuario) }}" method="post">
                            @csrf
                            <span class="admin-usuario__rol">{{ $item->rol }}</span>
                            <input type="text" class="admin__usuario-input" name="rol" value="{{ $item->rol }}">
                            <button type="submit" class="admin__usuario-button"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__usuario-button-cerrar"> <i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                @endforeach

                @if ($usuario->email_verified_at === null)
                    <td class="
                    admin__td">NULL</td>
                @else
                    <td class="admin__td">{{ $usuario->email_verified_at }}</td>
                @endif

                @if ($usuario->fec_ini_socio === null)
                    <td class="
                    admin__td">NULL</td>
                @else
                    <td class="admin__td">{{ $usuario->fec_ini_socio }}</td>
                @endif

                @if ($usuario->fec_fin_socio === null)
                    <td class="admin__td">NULL</td>
                @else
                    <td class="admin__td">{{ $usuario->fec_fin_socio }}</td>
                @endif

                @if ($usuario->baja == 0)
                    <td class="admin__td">No</td>
                @else
                    <td class="admin__td">Si</td>
                @endif
                <td class="admin__td"><a href="{{ route('usuario.eliminar', $usuario->codUsu) }}"
                        class="btn btn-dark"><i class="fa-solid fa-trash admin__boton"></i></a></td>
            </tr>
        </tbody>
    </table>
@endsection
