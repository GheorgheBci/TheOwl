@extends('layouts.app')

@section('content')
    <div class="membresias">
        <div class="unMes">
            <h2 class="membresias_precio">9.99€</h2>
            <h6 class="membresias_tiempo">cada mes</h6>
            <a href="{{ route('usuario.comprar', 1) }}" class="btn btn-dark membresia_boton">Comprar</a>
        </div>

        <div class="seisMeses">
            <h2 class="membresias_precio">59.94€</h2>
            <h6 class="membresias_tiempo">cada 6 meses</h6>
            <a href="{{ route('usuario.comprar', 6) }}" class="btn btn-dark membresia_boton">Comprar</a>
        </div>

        <div class="unAnio">
            <h2 class="membresias_precio">119.88€</h2>
            <h6 class="membresias_tiempo">cada año</h6>
            <a href="{{ route('usuario.comprar', 12) }}" class="btn btn-dark membresia_boton">Comprar</a>
        </div>
    </div>
@endsection
