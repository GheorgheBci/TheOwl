<?php

namespace App\Http\Controllers;

use App\Models\Ejemplar;

use Illuminate\Http\Request;

class EjemplarController extends Controller
{
    public function ejemplares(Request $request)
    {
        return view('admin.ejemplares.index', ['ejemplares' => Ejemplar::all()]);
    }

    public function buscarEjemplar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $ejemplar = Ejemplar::where('nomEjemplar', $request->nombre)->get();

        if ($ejemplar != null) {
            return view('admin.ejemplares.ejemplar', ['ejemplares' => $ejemplar]);
        }

        return redirect()->route('ejemplar.ejemplares');
    }
}
