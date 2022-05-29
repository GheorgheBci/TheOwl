<?php

namespace App\Http\Controllers;

use App\Models\Ejemplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EjemplarController extends Controller
{
    public function ejemplares(Request $request)
    {
        $numero = Ejemplar::count();

        return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::paginate(9), "numero" => $numero]);
    }

    public function buscarEjemplar(Request $request)
    {
        $ejemplar = Ejemplar::where('nomEjemplar', $request->ejemplar)->paginate(9);

        if ($ejemplar->count() !== 0) {
            $numero = $ejemplar->count();

            return view('ejemplares.ejemplar', ['ejemplares' => $ejemplar, "numero" => $numero]);
        }

        $numero = Ejemplar::count();

        return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::paginate(9), "numero" => $numero]);
    }

    public function ordenarEjemplares(Request $request)
    {
        $numero = Ejemplar::count();

        switch ($request->tipo) {
            case 1:
                return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::orderBy('nomEjemplar')->paginate(9), "numero" => $numero]);
                break;

            case 2:
                return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::orderBy('nomEjemplar', 'DESC')->paginate(9), "numero" => $numero]);
                break;

            case 3:
                return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::orderBy('fecPublicacion')->paginate(9), "numero" => $numero]);
                break;

            case 4:
                return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::orderBy('fecPublicacion', 'DESC')->paginate(9), "numero" => $numero]);
                break;

            case 5:
                return view('ejemplares.ejemplar', ['ejemplares' => Ejemplar::orderBy('puntuacion', 'DESC')->paginate(9), "numero" => $numero]);
                break;
        }
    }

    public function crear(Request $request)
    {
        if ($request->hasFile('file') && $request->hasFile('contenido')) {
            $imagen = $request->file;
            $contenido = $request->contenido;

            $imagen->move(public_path() . '/book', $imagen->getClientOriginalName());
            $contenido->move(public_path() . '/pdf', $contenido->getClientOriginalName());

            Ejemplar::create([
                'nomEjemplar' => $request->nombre,
                'epilogo' => $request->epilogo,
                'fecPublicacion' => $request->fecha,
                'tema' => $request->tema,
                'idioma' => $request->idioma,
                'image_book' => $imagen->getClientOriginalName(),
                'contenido' => "../pdf/" . $contenido->getClientOriginalName()
            ]);
        }
    }

    public function showDetallesEjemplar(Ejemplar $ejemplar)
    {
        return view('ejemplares.detalles', ['ejemplar' => $ejemplar]);
    }

    public function puntuar(Request $request, Ejemplar $ejemplar)
    {
        Ejemplar::where('isbn', $ejemplar->isbn)->update([
            'puntuacion' => $request->puntuacion + $ejemplar->puntuacion,
            'votos' => $ejemplar->votos + 1
        ]);

        return redirect()->route('ejemplar.ejemplar', ['ejemplar' => $ejemplar]);
    }

    public function alquilarEjemplar(Request $request, Ejemplar $ejemplar)
    {
        $array = array();

        foreach (Auth::user()->ejemplar as $key) {
            array_push($array, $key->pivot->isbn);
        }

        if (!in_array($ejemplar->isbn, $array)) {
            DB::table('detalle_alquiler')->insert([
                'codUsu' => Auth::user()->codUsu,
                'isbn' => $ejemplar->isbn,
                'fecAlquiler' => date('Y-m-d'),
                'fecDevolucion' => date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d')))),
                'precioAlquiler' => $request->input('precio'),
            ]);

            return redirect()->route('ejemplar.ejemplar', ['ejemplar' => $ejemplar])->with('success', "Has alquilado el ejemplar " . $ejemplar->nomEjemplar);
        }

        return redirect()->route('ejemplar.ejemplar', ['ejemplar' => $ejemplar])->with('success', "El ejemplar " . $ejemplar->nomEjemplar . " ya lo tienes alquilado");
    }
}
