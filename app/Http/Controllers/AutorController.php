<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function autores(Request $request)
    {
        return view('admin.autores.index', ['autores' => Autor::all()]);
    }
}
