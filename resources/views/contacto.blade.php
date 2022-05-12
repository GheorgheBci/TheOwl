@extends('layouts.app')

@section('javascript')
    <script src="{{ asset('js/script.js') }}" async></script>
@endsection

@section('titulo', 'Contacto')

@section('content')
    <div class="contacto">
        <h1>Formulario de contacto</h1>
    </div>


    <div class="formulario">
        <h2 class="formulario_subtitulo">Comentanos tu problema</h2>

        <form action="#" method="post">

            <label for="nombre" class="colocar_nombre">Nombre
                <span class="obligatorio">*</span>
            </label>
            <input type="text" name="nombre" id="nombre" required placeholder="Escribe tu nombre">

            <label for="email" class="colocar_email">Email
                <span class="obligatorio">*</span>
            </label>
            <input type="email" name="email" id="email" required placeholder="Escribe tu Email">

            <label for="asunto" class="colocar_asunto">Asunto
                <span class="obligatorio">*</span>
            </label>
            <input type="text" name="asunto" id="assunto" required placeholder="Escribe un asunto">

            <label for="mensaje" class="colocar_mensaje">Mensaje
                <span class="obligatorio">*</span>
            </label>

            <textarea name="mensaje" class="texto_mensaje" required placeholder="Deja aquí tu comentario..."></textarea>

            <button type="submit" name="enviar_formulario">Enviar</button>

            <p class="aviso">* los campos son obligatorios.</p>

        </form>
    </div>
@endsection
