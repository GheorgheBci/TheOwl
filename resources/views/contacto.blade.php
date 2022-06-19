@extends('layouts.app')

@section('titulo', 'Contacto')

@section('content')
    <div class="contacto__div">
        <h1 class="contacto__titulo contacto__titulo--padding">{{ __('Contact us') }}</h1>
    </div>


    <div class="formulario__div">
        <h2 class="formulario__subtitulo">{{ __('Tell us your problem') }}</h2>

        <form action="#" method="post">

            <label for="nombre" class="formulario__label">{{ __('Name') }}
                <span class="formulario__span--color">*</span>
            </label>
            <input type="text" class="formulario__input" name="nombre" id="nombre" required
                placeholder="{{ __('Write your name') }}">

            <label for="email" class="formulario__label">Email
                <span class="formulario__span--color">*</span>
            </label>
            <input type="email" class="formulario__input" name="email" id="email" required
                placeholder="{{ __('Write your Email') }}">

            <label for="asunto" class="formulario__label">{{ __('Subject') }}
                <span class="formulario__span--color">*</span>
            </label>
            <input type="text" class="formulario__input" name="asunto" id="assunto" required
                placeholder="{{ __('Write your subject') }}">

            <label for="mensaje" class="formulario__label">{{ __('Message') }}
                <span class="formulario__span--color">*</span>
            </label>

            <textarea name="mensaje" class="formulario__textarea" required placeholder="{{ __('Leave your comment here...') }}"></textarea>

            <button type="submit" class="formulario__button" name="enviar_formulario">{{ __('Send') }}</button>

            <p class="formulario__p formulario__p--color">* {{ __('The fields are compulsory') }}.</p>

        </form>
    </div>
@endsection
