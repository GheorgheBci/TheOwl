@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')
    <div class="editar-ejemplar">
        <h1 class="editar-ejemplar__h1">Actualizar el ejemplar {{ $ejemplar->nomEjemplar }}</h1>
        <form action="{{ route('ejemplar.admin-actualizar', $ejemplar) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <input type="hidden" name="oldisbn" value="{{ $ejemplar->isbn }}">
                    <label for="isbn" class="editar-ejemplar__label">ISBN</label>
                    <input type="number" class="editar-ejemplar__input" name="isbn" value="{{ $ejemplar->isbn }}">
                    @error('isbn')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="nombre" class="editar-ejemplar__label">Nombre</label>
                    <input type="text" class="editar-ejemplar__input" name="nombre" value="{{ $ejemplar->nomEjemplar }}">
                    @error('nombre')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="epilogo">Epilogo</label>
                    <textarea name="epilogo" class="editar-ejemplar__textarea">{{ $ejemplar->epilogo }}</textarea>
                    @error('epilogo')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="fecha" class="editar-ejemplar__label">Fecha</label>
                    <input type="date" class="editar-ejemplar__input" name="fecha"
                        value="{{ $ejemplar->fecPublicacion }}">
                    @error('fecha')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="tema" class="editar-ejemplar__label">Tema</label>
                    <input type="text" class="editar-ejemplar__input" name="tema" value="{{ $ejemplar->tema }}">
                    @error('tema')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="idioma" class="editar-ejemplar__label">Idioma</label>
                    <input type="text" class="editar-ejemplar__input" name="idioma" value="{{ $ejemplar->idioma }}">
                    @error('idioma')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="portada" class="editar-ejemplar__label">Portada</label>
                    <input type="text" class="editar-ejemplar__input" name="portada" accept="image/*" id="portada"
                        value="{{ $ejemplar->image_book }}">

                    <i class="fa-solid fa-pen-to-square admin__boton" id="fichero_portada"></i>
                    <i class="fas fa-times admin__boton admin__boton--hidden" id="cerrar__fichero-portada"></i>

                    @error('portada')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="contenido" class="editar-ejemplar__label">Contenido</label>
                    <input type="text" class="editar-ejemplar__input" name="contenido" accept="application/pdf"
                        id="contenido" value="{{ $ejemplar->contenido }}">
                    <i class="fa-solid fa-pen-to-square admin__boton" id="fichero_contenido"></i>
                    <i class="fas fa-times admin__boton admin__boton--hidden" id="cerrar__fichero-contenido"></i>
                    @error('contenido')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="editorial" class="editar-ejemplar__label">Editorial</label>
                    <select name="editorial" class="editar-ejemplar__select">
                        @foreach ($ejemplar->editorial() as $item)
                            <option selected value="{{ $ejemplar->codEditorial }}">{{ $item->nomEditorial }}</option>
                        @endforeach

                        <option value="NULL">NULL</option>

                        @foreach ($editorial as $item)
                            <option value="{{ $item->codEditorial }}">{{ $item->nomEditorial }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="autor" class="editar-ejemplar__label">Autor</label>
                    <select name="autor" class="editar-ejemplar__select">
                        @foreach ($ejemplar->autor() as $item)
                            <option selected value="{{ $ejemplar->codAutor }}">{{ $item->nomAutor }}
                                {{ $item->ape1Autor }}
                                {{ $item->ape2Autor }}</option>
                        @endforeach

                        <option value="NULL">Anónimo</option>

                        @foreach ($autor as $item)
                            <option value="{{ $item->codAutor }}">{{ $item->nomAutor }} {{ $item->ape1Autor }}
                                {{ $item->ape2Autor }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="coleccion" class="editar-ejemplar__label">Colección</label>
                    <select name="coleccion" class="editar-ejemplar__select">
                        @foreach ($ejemplar->coleccion() as $item)
                            <option selected value="{{ $ejemplar->codColeccion }}">{{ $item->nomColeccion }}</option>
                        @endforeach

                        <option value="NULL">NULL</option>

                        @foreach ($coleccion as $item)
                            <option value="{{ $item->codColeccion }}">{{ $item->nomColeccion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="editar-ejemplar__div--flex">
                <button type="submit" class="editar-ejemplar__button">Actualizar</button>
                <a href="{{ route('ejemplar.admin-ejemplares') }}" class="editar-ejemplar__a">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
