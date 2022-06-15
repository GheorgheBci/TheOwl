@extends('layouts.app')

@section('titulo', 'Membresia')

@section('content')
    <h1 class="membresia__titulo">MEMBRESIAS</h1>

    <div class="membresia">
        <div class="membresia__div">
            <h2 class="membresia__precio">9.99€</h2>
            <h6 class="membresia__tiempo">cada mes</h6>
            <a href="{{ route('usuario.comprar', 1) }}" class="membresia__a">Comprar</a>
        </div>

        <div class="membresia__div">
            <h2 class="membresia__precio">59.94€</h2>
            <h6 class="membresia__tiempo">cada 6 meses</h6>
            <a href="{{ route('usuario.comprar', 6) }}" class="membresia__a">Comprar</a>
        </div>

        <div class="membresia__div">
            <h2 class="membresia__precio">119.88€</h2>
            <h6 class="membresia__tiempo">cada año</h6>
            <a href="{{ route('usuario.comprar', 12) }}" class="membresia__a">Comprar</a>
        </div>

        @if (session('success'))
            <div class="mensaje">
                <div class="mensaje__div mensaje__div--success">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('success') }}</h2>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mensaje">
                <div class="mensaje__div mensaje__div--error">
                    <span class="mensaje__cerrar" id="cerrar_mensaje"><i class="fas fa-times mensaje__icono"></i></span>
                    <h2 class="mensaje__h2">{{ session('error') }}</h2>
                </div>
            </div>
        @endif
    </div>
    </div>
@endsection
