@extends('layouts.app')

@section('estilosSinBootstrap')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('javascript')
    <script src="{{ asset('js/script.js') }}" async></script>
@endsection

@section('titulo', 'Conocenos')

@section('content')
    <div class="contenedor_conocenos">
        <h1>Quienes somos</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis possimus voluptates provident ad quis
            maiores neque officia beatae sapiente doloribus. Fugit maiores iusto expedita, placeat aut sit
            alias? Libero, illum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, soluta!
            Est voluptatum rerum mollitia totam temporibus consequatur nisi ab nihil, recusandae consequuntur
            maiores molestias facere earum cupiditate officiis beatae perferendis?</p>
    </div>

    <div class="contenedor_conocenos_2">
        <div>
            <h2 class="titulo">RELAX</h2>
            <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                tenetur iusto harum!
                Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
        </div>
        <div>
            <h2 class="titulo">ENJOY</h2>
            <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                tenetur iusto harum!
                Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
        </div>
        <div>
            <h2 class="titulo">LEARN</h2>
            <p class="texto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores
                tenetur iusto harum!
                Perspiciatis maxime consectetur quo soluta minus, praesentium accusamus nam hic laboriosam
                dolorem doloribus aperiam possimus quisquam, perferendis repudiandae.</p>
        </div>
    </div>
@endsection
