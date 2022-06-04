@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('ejemplar.admin-buscar') }}" method="post">
                @csrf
                <span class="buscador__icono"><i class="fa fa-search"></i></span>
                <input type="text" class="buscador__input" name="ejemplar" placeholder="Buscar un ejemplar por su ISBN..." />
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--center">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="mensaje__error mensaje__error--center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <div class="mensajes__error-ejemplar">
        @error('isbn')
            <div>
                <span class="mensaje__error">
                    <strong>ISBN: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('nombre')
            <div>
                <span class="mensaje__error">
                    <strong>Nombre del ejemplar: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('epilogo')
            <div>
                <span class="mensaje__error">
                    <strong>Epilogo: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('fecha')
            <div>
                <span class="mensaje__error">
                    <strong>Fecha de publicación: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('tema')
            <div>
                <span class="mensaje__error">
                    <strong>Tema: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('idioma')
            <div>
                <span class="mensaje__error">
                    <strong>Idioma: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('portada')
            <div>
                <span class="mensaje__error">
                    <strong>Portada: {{ $message }}</strong>
                </span>
            </div>
        @enderror

        @error('contenido')
            <div>
                <span class="mensaje__error">
                    <strong>Contenido: {{ $message }}</strong>
                </span>
            </div>
        @enderror
    </div>

    <table class="admin__table">
        <thead class="admin__thead">
            <th class="admin__th">#</th>
            <th class="admin__th">Nombre</th>
            <th class="admin__th">Fecha Publicación</th>
            <th class="admin__th">Tema</th>
            <th class="admin__th">Idioma</th>
            <th class="admin__th">Portada</th>
            <th class="admin__th">Puntuación</th>
            <th class="admin__th">Votos</th>
            <th class="admin__th">Contenido</th>
            <th class="admin__th">Editorial</th>
            <th class="admin__th">Autor</th>
            <th class="admin__th">Coleccion</th>
        </thead>
        <tbody>
            @foreach ($ejemplares as $item)
                <tr class="admin__tbody-tr">
                    <td class="admin__td">{{ $item->isbn }}</td>
                    <td class="admin__td">{{ $item->nomEjemplar }}</td>
                    <td class="admin__td">{{ $item->fecPublicacion }}</td>
                    <td class="admin__td">{{ $item->tema }}</td>
                    <td class="admin__td">{{ $item->idioma }}</td>
                    <td class="admin__td">
                        <div class="pp"><img src="{{ asset('book/' . $item->image_book) }}" alt="portada"
                                class="admin__ejemplar-portada"></div>
                    </td>
                    <td class="admin__td">{{ $item->puntuacion }}</td>
                    <td class="admin__td">{{ $item->votos }}</td>
                    <td class="admin__td">
                        <div class="admin__contenido-ejemplar--ellipsis">
                            {{ $item->contenido }}</div>
                    </td>

                    @if ($item->codEditorial === null)
                        <td class="admin__td">NULL</td>
                    @else
                        @foreach ($item->editorial() as $edit)
                            <td class="admin__td">{{ $edit->nomEditorial }}</td>
                        @endforeach
                    @endif

                    @if ($item->codAutor === null)
                        <td class="admin__td">Anónimo</td>
                    @else
                        @foreach ($item->autor() as $aut)
                            <td class="admin__td">{{ $aut->nomAutor }} {{ $aut->ape1Autor }}
                                {{ $aut->ape2Autor }}</td>
                        @endforeach
                    @endif

                    @if ($item->codColeccion === null)
                        <td class="admin__td">NULL</td>
                    @else
                        @foreach ($item->coleccion() as $colecc)
                            <td class="admin__td">{{ $colecc->nomColeccion }}</td>
                        @endforeach
                    @endif

                    <td><a href="{{ route('ejemplar.admin-editar', $item) }}"><i
                                class="fa-solid fa-pen-to-square admin__boton"></i></a></td>
                    <td class="admin__td"><a href="{{ route('ejemplar.admin-eliminar', $item) }}"
                            class="btn btn-dark"><i class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__ejemplar" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3">Crear nuevo Ejemplar</h3>
            <form action="{{ route('gu') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="isbn" class="ventana-crear__label">ISBN</label>
                        <input type="number" class="ventana-crear__input ventana-crear__input-ejemplar" name="isbn"
                            required>
                    </div>

                    <div>
                        <label for="nombre" class="ventana-crear__label">Nombre</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="nombre"
                            required>
                    </div>
                    <div>
                        <label for="epilogo">Epilogo</label>
                        <textarea name="epilogo" class="ejemplar__textarea"></textarea>
                    </div>
                    <div>
                        <label for="fecha" class="ventana-crear__label">Fecha</label>
                        <input type="date" class="ventana-crear__input ventana-crear__input-ejemplar" name="fecha" required>
                    </div>
                    <div>
                        <label for="tema" class="ventana-crear__label">Tema</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="tema" required>
                    </div>
                    <div>
                        <label for="idioma" class="ventana-crear__label">Idioma</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="idioma"
                            required>
                    </div>
                    <div>
                        <label for="portada" class="ventana-crear__ejemplar-file"><i class="fa fa-cloud-upload"></i>
                            Portada</label>
                        <input type="file" name="portada" accept="image/*" id="portada" required>
                    </div>
                    <div>
                        <label for="contenido" class="ventana-crear__ejemplar-file"><i class="fa fa-cloud-upload"></i>
                            Contenido</label>
                        <input type="file" name="contenido" accept="application/pdf" id="contenido" required>
                    </div>

                    <div>
                        <label for="editorial" class="admin-crear__ejemplar-label-select">Editorial</label>
                        <select name="editorial" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($editorial as $item)
                                <option value="{{ $item->codEditorial }}">{{ $item->nomEditorial }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="autor" class="admin-crear__ejemplar-label-select">Autor</label>
                        <select name="autor" id="" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($autor as $item)
                                <option value="{{ $item->codAutor }}">{{ $item->nomAutor }} {{ $item->ape1Autor }}
                                    {{ $item->ape2Autor }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="coleccion" class="admin-crear__ejemplar-label-select">Colección</label>
                        <select name="coleccion" id="" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($coleccion as $item)
                                <option value="{{ $item->codColeccion }}">{{ $item->nomColeccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">Crear</button>
                </div>
            </form>
        </div>
    </div>

    {{ $ejemplares->links() }}

@endsection
