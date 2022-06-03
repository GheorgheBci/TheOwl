<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    public function colecciones(Request $request)
    {
        return view('admin.colecciones.index', ['colecciones' => Coleccion::paginate(20)]);
    }

    public function buscarColeccion(Request $request)
    {
        $coleccion = Coleccion::where('nomColeccion', $request->coleccion);


        if ($coleccion->count() !== 0) {
            return view('admin.colecciones.index', ['colecciones' => $coleccion->paginate(20)]);
        }

        return redirect()->route('coleccion.colecciones')->with(['error' => 'La colección ' . $request->coleccion . ' no existe']);
    }

    public function crearColeccion(Request $request)
    {
        $request->validate([
            'coleccion' => 'string|required|max:50'
        ]);

        Coleccion::create([
            'nomColeccion' => $request->coleccion
        ]);

        return redirect()->route('coleccion.colecciones')->with(['success' => 'Se ha creado una nueva colección']);
    }

    public function eliminarColeccion(Request $request, Coleccion $coleccion)
    {
        Coleccion::where('codColeccion', $coleccion->codColeccion)->delete();

        return redirect()->route('coleccion.colecciones')->with(['success' => 'Se ha eliminado la colección ' . $coleccion->nomColeccion]);
    }

    public function actualizarColeccion(Request $request, Coleccion $coleccion)
    {
        $request->validate([
            'coleccion' => 'string|required|max:50'
        ]);

        Coleccion::where('codColeccion', $coleccion->codColeccion)->update([
            'nomColeccion' => $request->coleccion
        ]);

        return redirect()->route('coleccion.colecciones')->with(['success' => 'Se ha modificado correctamente el nombre de la colección']);
    }
}
