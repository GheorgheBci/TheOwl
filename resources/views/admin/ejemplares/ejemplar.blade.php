@extends('layouts.admin')

@section('titulo', 'Ejemplares')

@section('content')

    <div class="boton-crear__div">
        <i class="fa-solid fa-circle-plus boton-crear__icono" title="{{ __('Create') }}" id="crear"></i>
    </div>

    <div class="buscador">
        <div class="buscador__div">
            <form action="{{ route('ejemplar.admin-buscar') }}" method="get">
                @csrf
                <button type="submit" class="buscador__icono" title="{{ __('Search') }}"><i
                        class="fa fa-search"></i></button>
                <input type="text" class="buscador__input" name="ejemplar"
                    placeholder="{{ __('Search for a book by ISBN...') }}" />
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="mensaje__exito mensaje__exito--fs mensaje__exito--center">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="mensaje__error mensaje__error--fs mensaje__exito--center">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <table class="admin__table--ejemplar">
        <thead class="admin__thead--ejemplar ">
            <tr class="admin__thead-tr--ejemplar">
                <th class="admin__th">#</th>
                <th class="admin__th">{{ __('Name') }}</th>
                <th class="admin__th">{{ __('Publication Date') }}</th>
                <th class="admin__th">{{ __('Topic') }}</th>
                <th class="admin__th">{{ __('Language') }}</th>
                <th class="admin__th">{{ __('Price') }}</th>
                <th class="admin__th">{{ __('Cover') }}</th>
                <th class="admin__th">{{ __('Score') }}</th>
                <th class="admin__th">{{ __('Votes') }}</th>
                <th class="admin__th">{{ __('Content') }}</th>
                <th class="admin__th">{{ __('Publisher') }}</th>
                <th class="admin__th">{{ __('Author') }}</th>
                <th class="admin__th">{{ __('Collection') }}</th>
            </tr>
        </thead>
        <tbody>
                <tr class="admin__tbody-tr--ejemplar">
                    <td class="admin__td--ejemplar" data-datos="ISBN">{{ $ejemplar->isbn }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Name') }}">{{ $ejemplar->nomEjemplar }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Publication Date') }}">{{ $ejemplar->fecPublicacion }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Topic') }}">{{ $ejemplar->tema }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Language') }}">{{ $ejemplar->idioma }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Price') }}">{{ $ejemplar->precio }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Cover') }}">
                        <div><img src="{{ asset('book/' . $ejemplar->image_book) }}" alt="portada"
                                class="admin__ejemplar-portada"></div>
                    </td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Score') }}">{{ $ejemplar->puntuacion }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Votes') }}">{{ $ejemplar->votos }}</td>
                    <td class="admin__td--ejemplar" data-datos="{{ __('Content') }}">
                        <div class="admin__contenido-ejemplar--ellipsis">
                            {{ $ejemplar->contenido }}</div>
                    </td>

                    @if ($ejemplar->codEditorial === null)
                        <td class="admin__td--ejemplar" data-datos="{{ __('Publisher') }}">NULL</td>
                    @else
                        @foreach ($ejemplar->editorial() as $edit)
                            <td class="admin__td--ejemplar" data-datos="{{ __('Publisher') }}">{{ $edit->nomEditorial }}</td>
                        @endforeach
                    @endif

                    @if ($ejemplar->codAutor === null)
                        <td class="admin__td--ejemplar" data-datos="{{ __('Author') }}">{{ __('Anonymous') }}</td>
                    @else
                        @foreach ($ejemplar->autor() as $aut)
                            <td class="admin__td--ejemplar" data-datos="{{ __('Author') }}">{{ $aut->nomAutor }}
                                {{ $aut->ape1Autor }}
                                {{ $aut->ape2Autor }}</td>
                        @endforeach
                    @endif

                    @if ($ejemplar->codColeccion === null)
                        <td class="admin__td--ejemplar" data-datos="{{ __('Collection') }}">NULL</td>
                    @else
                        @foreach ($ejemplar->coleccion() as $colecc)
                            <td class="admin__td--ejemplar" data-datos="{{ __('Collection') }}">{{ $colecc->nomColeccion }}</td>
                        @endforeach
                    @endif

                    <td class="admin__td"><a href="{{ route('ejemplar.admin-editar', $ejemplar) }}"
                            title="{{ __('Edit') }}"><i class="fa-solid fa-pen-to-square admin__boton"></i></a></td>
                    <td class="admin__td"><a href="{{ route('ejemplar.admin-eliminar', $ejemplar) }}" class="btn btn-dark"
                            title="{{ __('Delete') }}"><i class="fa-solid fa-trash admin__boton"></i></a></td>
                </tr>
        </tbody>
    </table>

    <div class="fondo" id="fondo">
        <div class="ventana-crear ventana-crear__ejemplar" id="ventana-crear">
            <a href="#" class="ventana-crear__icono" id="cerrar-ventana"><i class="fas fa-times"></i></a>
            <h3 class="ventana-crear__h3">{{ __('New Book') }}</h3>
            <form action="{{ route('ejemplar.crear') }}" method="post" class="ventana-crear__form--width"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="isbn" class="ventana-crear__label">ISBN</label>
                        <input type="number" class="ventana-crear__input ventana-crear__input-ejemplar" name="isbn"
                            required>
                    </div>

                    <div>
                        <label for="nombre" class="ventana-crear__label">{{ __('Name') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="nombre"
                            required>
                    </div>
                    <div>
                        <label for="epilogo" class="ventana-crear__label">{{ __('Epilogue') }}</label>
                        <textarea name="epilogo" class="ejemplar__textarea"></textarea>
                    </div>
                    <div>
                        <label for="fecha" class="ventana-crear__label">{{ __('Date') }}</label>
                        <input type="date" class="ventana-crear__input ventana-crear__input-ejemplar" name="fecha"
                            required>
                    </div>
                    <div>
                        <label for="tema" class="ventana-crear__label">{{ __('Topic') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="tema"
                            required>
                    </div>
                    <div>
                        <label for="idioma" class="ventana-crear__label">{{ __('Language') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="idioma"
                            required>
                    </div>
                    <div>
                        <label for="precio" class="ventana-crear__label">{{ __('Price') }}</label>
                        <input type="text" class="ventana-crear__input ventana-crear__input-ejemplar" name="precio"
                            required>
                    </div>
                    <div>
                        <label for="portada" class="ventana-crear__ejemplar-file"><i class="fa fa-cloud-upload"></i>
                            {{ __('Cover') }}</label>
                        <input type="file" name="portada" accept="image/*" id="portada" required>
                    </div>
                    <div>
                        <label for="contenido" class="ventana-crear__ejemplar-file"><i class="fa fa-cloud-upload"></i>
                            {{ __('Content') }}</label>
                        <input type="file" name="contenido" accept="application/pdf" id="contenido" required>
                    </div>

                    <div>
                        <label for="editorial" class="admin-crear__ejemplar-label-select">{{ __('Publisher') }}</label>
                        <select name="editorial" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($editorial as $ejemplar)
                                <option value="{{ $ejemplar->codEditorial }}">{{ $ejemplar->nomEditorial }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="autor" class="admin-crear__ejemplar-label-select">{{ __('Author') }}</label>
                        <select name="autor" id="" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($autor as $ejemplar)
                                <option value="{{ $ejemplar->codAutor }}">{{ $ejemplar->nomAutor }} {{ $ejemplar->ape1Autor }}
                                    {{ $ejemplar->ape2Autor }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="coleccion"
                            class="admin-crear__ejemplar-label-select">{{ __('Collection') }}</label>
                        <select name="coleccion" id="" class="admin-crear__ejemplar-select">
                            <option value="NULL"></option>
                            @foreach ($coleccion as $ejemplar)
                                <option value="{{ $ejemplar->codColeccion }}">{{ $ejemplar->nomColeccion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="ventana-crear__div--flex">
                    <button type="submit" class="ventana-crear__button">{{ __('Create') }}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
