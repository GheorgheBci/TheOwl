<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlquilerController extends Controller
{
    public function alquileres()
    {
        $alquileres = DB::table('detalle_alquiler')->get();

        return view('admin.index', ['alquileres' => $alquileres]);
    }
}
