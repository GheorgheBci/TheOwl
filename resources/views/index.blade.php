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

    <div class="inicio__div" style="background-image: url({{ asset('img/book-g80cc94351_1920.jpg') }})">


        <div class="inicio__bienvenido">
            <span>¡ B I E N V E N I D @ !</span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">Unete y disfruta de millones de ejemplares de todas las tematicas</p>
    </div>

    <div class="inicio__div" style="background-image: url({{ asset('img/books-g777c04f23_1920.jpg') }})">
        <div>
            <span><a href="{{ route('register') }}" data-aos="zoom-in" class="inicio__a inicio__registro">R e g i s t r a
                    t
                    e</a></span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">Hazte socio y disfruta de las ventajas</p>
    </div>

    <div class="inicio__div inicio__div--relative">
        <video src="{{ asset('video/Student - 73007.mp4') }}" class="inicio__video" autoplay muted loop></video>
        <div>
            <span><a href="{{ route('membresia') }}" data-aos="fade-left" class="inicio__a inicio__membresia">M e m b r e
                    s i
                    a</a></span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">¡Lee!</p>
    </div>

    <div class="inicio__div" style="background-image: url({{ asset('img/fairy-tale-gf5d0c6a7e_1280.jpg') }})">

    </div>

@endsection
