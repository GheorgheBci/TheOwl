@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')
    <div class="editar-ejemplar">
        <h1 class="editar-ejemplar__h1">{{ $ejemplar->nomEjemplar }}</h1>
        @if (session('success'))
            <div class="mensaje__exito mensaje__exito--fs mensaje__exito--center">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <form action="{{ route('ejemplar.admin-actualizar', $ejemplar) }}" class="editar-ejemplar__form" method="post"
            enctype="multipart/form-data">
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
                    <label for="nombre" class="editar-ejemplar__label">{{ __('Name') }}</label>
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
                    <label for="epilogo" class="editar-ejemplar__label">{{ __('Epilogue') }}</label>
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
                    <label for="fecha" class="editar-ejemplar__label">{{ __('Date') }}</label>
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
                    <label for="tema" class="editar-ejemplar__label">{{ __('Topic') }}</label>
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
                    <label for="idioma" class="editar-ejemplar__label">{{ __('Language') }}</label>
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
                    <label for="precio" class="editar-ejemplar__label">{{ __('Price') }}</label>
                    <input type="text" class="editar-ejemplar__input" name="precio" value="{{ $ejemplar->precio }}">
                    @error('precio')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="portada" class="editar-ejemplar__label">   {{ __('Cover') }}</label>
                    <input type="text" class="editar-ejemplar__input" name="portada" accept="image/*" id="portada"
                        value="{{ $ejemplar->image_book }}">

                    <i class="fa-solid fa-pen-to-square admin__boton" title="{{ __('Edit') }}" id="fichero_portada"></i>
                    <i class="fas fa-times admin__boton admin__boton--hidden" title="{{ __('Close') }}" id="cerrar__fichero-portada"></i>

                    @error('portada')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="contenido" class="editar-ejemplar__label">  {{ __('Content') }}</label>
                    <input type="text" class="editar-ejemplar__input" name="contenido" accept="application/pdf"
                        id="contenido" value="{{ $ejemplar->contenido }}">
                    <i class="fa-solid fa-pen-to-square admin__boton" title="{{ __('Edit') }}" id="fichero_contenido"></i>
                    <i class="fas fa-times admin__boton admin__boton--hidden" title="{{ __('Close') }}" id="cerrar__fichero-contenido"></i>
                    @error('contenido')
                        <div>
                            <span class="mensaje__error mensaje__error-updateEjemplar-fs">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="editorial" class="editar-ejemplar__label">{{ __('Publisher') }}</label>
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
                    <label for="autor" class="editar-ejemplar__label">{{ __('Author') }}</label>
                    <select name="autor" class="editar-ejemplar__select">
                        @foreach ($ejemplar->autor() as $item)
                            <option selected value="{{ $ejemplar->codAutor }}">{{ $item->nomAutor }}
                                {{ $item->ape1Autor }}
                                {{ $item->ape2Autor }}</option>
                        @endforeach

                        <option value="NULL">{{ __('Anonymous') }}</option>

                        @foreach ($autor as $item)
                            <option value="{{ $item->codAutor }}">{{ $item->nomAutor }} {{ $item->ape1Autor }}
                                {{ $item->ape2Autor }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="coleccion" class="editar-ejemplar__label">{{ __('Collection') }}</label>
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
                <button type="submit" class="editar-ejemplar__button">{{ __('Update') }}</button>
                <a href="{{ route('ejemplar.admin-ejemplares') }}" class="editar-ejemplar__a">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
@endsection
