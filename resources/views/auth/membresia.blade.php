@extends('layouts.app')

@section('titulo', 'Membresia')

@section('content')
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
    </div>
@endsection
