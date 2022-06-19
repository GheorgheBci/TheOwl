@extends('layouts.app')

@section('titulo', 'Conocenos')

@section('content')
    <div class="conocenos__div">
        <h1 class="conocenos__titulo">{{ __('ABOUT US?') }}</h1>
        <p class="conocenos__p">{{ __('The Owl is a digital library where you can find millions of books on many subjects at the click of a button. On our website you can find stories, history books, programming language manuals and much more. The prices we offer for renting a book are affordable for everyone and, if you become a member, you will enjoy a discount on your rentals.') }}</p>
    </div>

    <div class="conocenos__div-dos">
        <div>
            <h2 class="conocenos__subtitulo conocenos__subtitulo--color">RELAX</h2>
            <p class="conocenos__p conocenos__p--padding conocenos__p--color">{{ __('Relax in your free time with one of our books.') }}</p>
        </div>
        <div>
            <h2 class="conocenos__subtitulo conocenos__subtitulo--color">ENJOY</h2>
            <p class="conocenos__p conocenos__p--padding conocenos__p--color">{{ __('Enjoys many books on all subjects.') }}</p>
        </div>
        <div>
            <h2 class="conocenos__subtitulo conocenos__subtitulo--color">LEARN</h2>
            <p class="conocenos__p conocenos__p--padding conocenos__p--color">{{ __('Learn new things with us.') }}</p>
        </div>
    </div>
@endsection
