@extends('layouts.app')

@section('titulo', 'Home')

@section('content')

    <div class="inicio__div" style="background-image: url({{ asset('img/book-g80cc94351_1920.jpg') }})">


        <div class="inicio__bienvenido">
            <span>{{ __('¡ W E L C O M E !') }}</span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">{{ __('Join us and enjoy millions of books on all subjects') }}</p>
    </div>

    <div class="inicio__div" style="background-image: url({{ asset('img/books-g777c04f23_1920.jpg') }})">
        <div data-aos="zoom-in" data-aos-offset="300" data-aos-easing="ease-in-sine" class="inicio__registro">
            <span><a href="{{ route('register') }}" class="inicio__a ">{{ __('R E G I S T E R') }}</a></span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">{{ __('Become a member and enjoy the benefits') }}</p>
    </div>

    <div class="inicio__div inicio__div--relative">
        <video src="{{ asset('video/Student - 73007.mp4') }}" class="inicio__video" autoplay muted loop></video>
        <div data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" class="inicio__membresia">
            <span><a href="{{ route('membresia') }}"
                    class="inicio__a inicio__a--shadow">{{ __('M E M B E R S H I P') }}</a></span>
        </div>
    </div>

    <div class="inicio__texto">
        <p class="inicio__p">{{ __('¡Read!') }}</p>
    </div>

    <div class="inicio__div" style="background-image: url({{ asset('img/fairy-tale-gf5d0c6a7e_1280.jpg') }})">

    </div>

@endsection
