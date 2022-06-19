@extends('layouts.admin')

@section('titulo', 'Usuarios')

@section('content')

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('usuario.buscar') }}" method="get">
                @csrf
                <button class="buscador__icono" title="{{ __('Search') }}"><i class="fa fa-search"></i></button>
                <input type="email" class="buscador__input" name="email"
                    placeholder="{{ __('Search for a user by email') }}..." />
            </form>
        </div>
    </div>

    @error('email')
        <div class="mensaje__error--center">
            <span class="mensaje__error mensaje__error--fs">
                <strong>{{ $message }}</strong>
            </span>
        </div>
    @enderror

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

    <table class="admin__table--usuario">
        <thead class="admin__thead--usuario">
            <tr class="admin__thead-tr--usuario">
                <th class="admin__th">#</th>
                <th class="admin__th">{{ __('Full Name') }}</th>
                <th class="admin__th">{{ __('Date of birth') }}</th>
                <th class="admin__th">Email</th>
                <th class="admin__th">{{ __('Role') }}</th>
                <th class="admin__th">{{ __('Verification date') }}</th>
                <th class="admin__th">{{ __('Start date Partner') }}</th>
                <th class="admin__th">{{ __('End date Partner') }}</th>
                <th class="admin__th">{{ __('Unsubscribe') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr class="admin__tbody-tr--usuario">
                <td class="admin__td--usuario" data-datos="{{ __('Code') }}">{{ $usuario->codUsu }}</td>
                <td class="admin__td--usuario" data-datos="{{ __('Name') }}">{{ $usuario->nombre }} {{ $usuario->apellido1 }}
                    {{ $usuario->apellido2 }}
                </td>
                <td class="admin__td--usuario" data-datos="{{ __('Date of birth') }}">{{ $usuario->fecNacimiento }}</td>
                <td class="admin__td--usuario" data-datos="Email">{{ $usuario->email }}</td>
                @foreach ($usuario->rol() as $usuarios)
                    <td class="admin__td--usuario" data-datos="{{ __('Role') }}">
                        <form action="{{ route('usuario.cambiar', $usuario) }}" method="post">
                            @csrf
                            <span class="admin-usuario__rol">{{ $usuarios->rol }}</span>
                            <input type="text" class="admin__usuario-input" name="rol"
                                value="{{ $usuarios->rol }}">
                            <button type="submit" class="admin__usuario-button" title="{{ __('Edit') }}"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="admin__usuario-button-cerrar" title="{{ __('Close') }}"><i
                                    class="fas fa-times"></i></button>
                        </form>
                    </td>
                @endforeach

                @if ($usuario->email_verified_at === null)
                    <td class="admin__td--usuario" data-datos="{{ __('Verification date') }}">NULL</td>
                @else
                    <td class="admin__td--usuario" data-datos="{{ __('Verification date') }}">{{ $usuario->email_verified_at }}</td>
                @endif

                @if ($usuario->fec_ini_socio === null)
                    <td class="admin__td--usuario" data-datos="{{ __('Start date Partner') }}">NULL</td>
                @else
                    <td class="admin__td--usuario" data-datos="{{ __('Start date Partner') }}">{{ $usuario->fec_ini_socio }}</td>
                @endif

                @if ($usuario->fec_fin_socio === null)
                    <td class="admin__td--usuario" data-datos="{{ __('End date Partner') }}">NULL</td>
                @else
                    <td class="admin__td--usuario" data-datos="{{ __('End date Partner') }}">{{ $usuario->fec_fin_socio }}</td>
                @endif

                @if ($usuario->baja == 0)
                    <td class="admin__td--usuario" data-datos="{{ __('Unsubscribe') }}">No</td>
                @else
                    <td class="admin__td--usuario" data-datos="{{ __('Unsubscribe') }}">{{ __('Yes') }}</td>
                @endif
                <td class="admin__td"><a href="{{ route('usuario.eliminar', $usuario->codUsu) }}" class="btn btn-dark"
                        title="{{ __('Delete') }}"><i class="fa-solid fa-trash admin__boton"></i></a></td>
            </tr>
        </tbody>
    </table>
@endsection
