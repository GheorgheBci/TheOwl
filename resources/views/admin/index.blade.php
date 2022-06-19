@extends('layouts.admin')

@section('titulo', 'Inicio')

@section('content')
    <div class="admin-inicio">
        <div class="admin-inicio__grafica">
            <h2 class="admin-inicio__h2">{{ __('Total registered users per month') }}</h2>
            <canvas id="total-usuarios"></canvas>
        </div>

        <div class="admin-inicio__alquileres">
            <h2 class="admin-inicio__h2">{{ __('Latest rentals') }}</h2>
            <table class="admin__table">
                <thead class="admin__thead">
                    <th class="admin__th">{{ __('User') }}</th>
                    <th class="admin__th">ISBN</th>
                    <th class="admin__th">{{ __('Rental date') }}</th>
                    <th class="admin__th">{{ __('Return date') }}</th>
                    <th class="admin__th">{{ __('Price') }}</th>
                </thead>
                <tbody>
                    @foreach ($alquileres as $item)
                        <tr class="admin__tbody-tr">
                            <td class="admin__td">{{ $item->codUsu }}</td>
                            <td class="admin__td">{{ $item->isbn }}</td>
                            <td class="admin__td">{{ $item->fecAlquiler }}</td>
                            <td class="admin__td">{{ $item->fecDevolucion }}</td>
                            <td class="admin__td">{{ $item->precioAlquiler }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $alquileres->links() }}
        </div>
    </div>

    <script>
        const datos = JSON.parse(`<?= $data ?>`);
    </script>
@endsection
