@extends('layouts.admin')

@section('titulo', 'Roles')

@section('content')

    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" title="{{ __('Create') }}" id="crear"></i>
    </div>

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

    @error('rol')
        <div class="mensaje__error--center">
            <span class="mensaje__error mensaje__error--fs">
                <strong>{{ $message }}</strong>
            </span>
        </div>
    @enderror

    <table class="admin__table">
        <thead class="admin__thead">
            <th class="admin__th">#</th>
            <th class="admin__th">{{ __('Role') }}</th>
        </thead>
        <tbody>
            @foreach ($roles as $item)
                <tr class="admin__tbody-tr">
                    <td class="admin__td">{{ $item->idRol }}</td>
                    <td class="admin__td">{{ $item->rol }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__rol" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3 ventana-crear__rol-h3">{{ __('New Role') }}</h3>
            <form action="{{ route('rol.crear') }}" method="post" class="ventana-crear__form--width">
                @csrf
                <div>
                    <label for="rol" class="ventana-crear__label ventana-crear__rol-label">{{ __('Role') }}</label>
                    <input type="text" class="ventana-crear__input ventana-crear__rol-input" name="rol" id="rol" required>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
