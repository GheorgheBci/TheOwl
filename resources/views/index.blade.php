@extends('layouts.app')

@section('titulo', 'Home')

@section('content')
    @if (session('login'))
        <div class="mensaje">
            <div class="mensaje__div">
                <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                <h2 class="mensaje__h2">{{ session('login') }}</h2>
            </div>
        </div>
    @endif
    {{-- En proceso aún de hacer --}}

@endsection
