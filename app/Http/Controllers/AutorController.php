<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function autores(Request $request)
    {
        return view('admin.autores.index', ['autores' => Autor::paginate(20)]);
    }

    public function buscarAutor(Request $request)
    {
        $autor = Autor::where('nomAutor', 'LIKE', '%' . $request->autor . '%');

        if ($autor->count() !== 0) {
            return view('admin.autores.index', ['autores' => $autor->paginate(20)]);
        }

        return redirect()->route('autor.autores')->with(['error' => 'El autor ' . $request->autor . ' no existe']);
    }

    public function crearAutor(Request $request)
    {
        $request->validate([
            'nombre' => 'string|required|max:20',
            'ape1' => 'string|required|max:20',
            'ape2' => 'string|required|max:20',
        ]);

        Autor::create([
            'nomAutor' => $request->nombre,
            'ape1Autor' => $request->ape1,
            'ape2Autor' => $request->ape2,
        ]);

        return redirect()->route('autor.autores');
    }

    public function eliminarAutor(Request $request, Autor $autor)
    {
        Autor::where('codAutor', $autor->codAutor)->delete();

        return redirect()->route('autor.autores')->with(['success' => 'Se ha eliminado el autor ' . $autor->nomAutor . ' ' . $autor->ape1Autor . ' ' . $autor->ape2Autor]);
    }

    public function actualizarNombreAutor(Request $request,  Autor $autor)
    {
        $request->validate([
            'nombre' => 'string|required|max:20'
        ]);

        Autor::where('codAutor', $autor->codAutor)->update([
            'nomAutor' => $request->nombre,
        ]);

        return redirect()->route('autor.autores');
    }

    public function actualizarApe1Autor(Request $request,  Autor $autor)
    {
        $request->validate([
            'ape1' => 'string|required|max:20'
        ]);

        Autor::where('codAutor', $autor->codAutor)->update([
            'ape1Autor' => $request->ape1,
        ]);

        return redirect()->route('autor.autores');
    }

    public function actualizarApe2Autor(Request $request,  Autor $autor)
    {
        $request->validate([
            'ape2' => 'string|nullable|max:20'
        ]);

        Autor::where('codAutor', $autor->codAutor)->update([
            'ape2Autor' => $request->ape2,
        ]);

        return redirect()->route('autor.autores');
    }
}
