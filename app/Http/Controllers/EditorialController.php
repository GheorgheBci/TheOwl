<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function editoriales(Request $request)
    {
        return view('admin.editoriales.index', ['editoriales' => Editorial::paginate(20)]);
    }

    public function buscarEditorial(Request $request)
    {
        $editorial = Editorial::where('nomEditorial', $request->editorial);

        if ($editorial->count() !== 0) {
            return view('admin.editoriales.index', ['editoriales' => $editorial->paginate(20)]);
        }

        return redirect()->route('editorial.editoriales')->with(['error' => 'La editorial ' . $request->editorial . ' no existe']);
    }

    public function crearEditorial(Request $request)
    {
        $request->validate([
            'editorial' => 'string|required|max:40'
        ]);

        Editorial::create([
            'nomEditorial' => $request->editorial
        ]);

        return redirect()->route('editorial.editoriales')->with(['success' => 'Se ha creado una nueva editorial']);
    }

    public function eliminarEditorial(Request $request, Editorial $editorial)
    {
        Editorial::where('codEditorial', $editorial->codEditorial)->delete();

        return redirect()->route('editorial.editoriales')->with(['success' => 'Se ha eliminado la editorial ' . $editorial->nomEditorial]);
    }

    public function actualizarEditorial(Request $request, Editorial $editorial)
    {
        $request->validate([
            'editorial' => 'string|required|max:40'
        ]);

        Editorial::where('codEditorial', $editorial->codEditorial)->update([
            'nomEditorial' => $request->editorial
        ]);

        return redirect()->route('editorial.editoriales')->with(['success' => 'Se ha modificado correctamente el nombre de la editorial']);
    }
}
