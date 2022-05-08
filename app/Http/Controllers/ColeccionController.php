<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    public function colecciones(Request $request)
    {
        return view('admin.colecciones.index', ['colecciones' => Coleccion::all()]);
    }
}
