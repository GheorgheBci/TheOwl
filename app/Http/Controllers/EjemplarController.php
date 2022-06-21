<?php

namespace App\Http\Controllers;

use App\Models\Ejemplar;
use App\Models\Editorial;
use App\Models\Autor;
use App\Models\Coleccion;
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

    public function ejemplaresAdmin(Request $request)
    {
        return view('admin.ejemplares.index', ['ejemplares' => Ejemplar::paginate(20), 'editorial' => Editorial::all(), 'autor' => Autor::all(), 'coleccion' => Coleccion::all()]);
    }

    public function buscarEjemplar(Request $request)
    {
        $ejemplar = Ejemplar::where('nomEjemplar', $request->ejemplar)->paginate(9);

        if ($ejemplar->count() !== 0) {
            $numero = $ejemplar->count();

            return view('ejemplares.ejemplar', ['ejemplares' => $ejemplar, "numero" => $numero, 'resultado' => $request->ejemplar]);
        }

        $numero = Ejemplar::count();

        return redirect()->route('ejemplar.ejemplares')->with(['error' => 'El ejemplar ' .  $request->ejemplar . ' no existe']);
    }

    public function buscarMiEjemplar(Request $request)
    {
        $ejemplar = Ejemplar::where('nomEjemplar', $request->ejemplar)->whereIn('isbn', DB::table('detalle_alquiler')->select('isbn'))->paginate(9);
        $total = DB::table('detalle_alquiler')->where('codUsu', Auth::user()->codUsu)->get();

        if (count($total) !== 0) {

            if (count($ejemplar) !== 0) {

                $numero = count($ejemplar);

                return view('ejemplares.misLibros', ['misLibros' => $ejemplar, "numero" => $numero, 'resultado' => $request->ejemplar]);
            }

            $numero = Ejemplar::count();

            return redirect()->route('usuario.libros')->with(['error' => 'El ejemplar ' .  $request->ejemplar . ' no existe']);
        }

        return redirect()->route('usuario.libros')->with(['error' => 'No tienes ejemplares alquilados']);
    }

    public function buscarEjemplarAdmin(Request $request)
    {
        $ejemplar = Ejemplar::where('isbn', $request->ejemplar)->first();

        if (!empty($ejemplar)) {
            return view('admin.ejemplares.ejemplar', ['ejemplar' => $ejemplar, 'editorial' => Editorial::all(), 'autor' => Autor::all(), 'coleccion' => Coleccion::all()]);
        }

        return back()->with(['error' => 'El ejemplar con ISBN ' . $request->ejemplar . ' no existe']);
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

    public function ordenarMisEjemplares(Request $request)
    {
        $misLibros = Auth::user()->ejemplar;
        $numero = $misLibros->count();

        switch ($request->tipo) {
            case 1:
                return view('ejemplares.misLibros', ['misLibros' => Auth::user()->ejemplar()->orderBy('nomEjemplar')->paginate(9), "numero" => $numero]);
                break;

            case 2:
                return view('ejemplares.misLibros', ['misLibros' => Auth::user()->ejemplar()->orderBy('nomEjemplar', 'DESC')->paginate(9), "numero" => $numero]);
                break;

            case 3:
                return view('ejemplares.misLibros', ['misLibros' => Auth::user()->ejemplar()->orderBy('fecPublicacion')->paginate(9), "numero" => $numero]);
                break;

            case 4:
                return view('ejemplares.misLibros', ['misLibros' => Auth::user()->ejemplar()->orderBy('fecPublicacion', 'DESC')->paginate(9), "numero" => $numero]);
                break;

            case 5:
                return view('ejemplares.misLibros', ['misLibros' => Auth::user()->ejemplar()->orderBy('puntuacion', 'DESC')->paginate(9), "numero" => $numero]);
                break;
        }
    }

    public function crear(Request $request)
    {
        $request->validate([
            'isbn' => 'digits_between:13,13|required|integer',
            'nombre' => 'string|max:50|required',
            'epilogo' => 'max:1000',
            'fecha' => 'date|required',
            'tema' => 'alpha|max:25|required',
            'idioma' => 'alpha|max:25|required',
            'precio' => 'required|regex:/^(\d{1,2})[.](\d{1,2})$/',
            'portada' => 'image',
            'contenido' => 'mimes:pdf',
        ]);

        $existe = Ejemplar::Where('isbn', $request->isbn)->first();

        if (!empty($existe)) {
            return redirect()->route('ejemplar.admin-ejemplares')->with(['error' => 'Este ejemplar ya existe']);
        }

        if ($request->hasFile('portada') && $request->hasFile('contenido')) {
            $imagen = $request->portada;
            $contenido = $request->contenido;

            $imagen->move(public_path() . '/book', $imagen->getClientOriginalName());
            $contenido->move(public_path() . '/pdf', $contenido->getClientOriginalName());

            $editorial =  Editorial::where('codEditorial', $request->editorial)->first();
            $autor =  Autor::where('codAutor', $request->autor)->first();
            $coleccion =  Coleccion::where('codColeccion', $request->coleccion)->first();


            Ejemplar::create([
                'isbn' => $request->isbn,
                'nomEjemplar' => $request->nombre,
                'epilogo' => $request->epilogo,
                'fecPublicacion' => $request->fecha,
                'tema' => $request->tema,
                'idioma' => $request->idioma,
                'precio' => $request->precio,
                'image_book' => $imagen->getClientOriginalName(),
                'contenido' => "../pdf/" . $contenido->getClientOriginalName(),
                'codEditorial' => $editorial->codEditorial ?? NULL,
                'codAutor' => $autor->codAutor ?? NULL,
                'codColeccion' => $coleccion->codColeccion ?? NULL,
            ]);

            return redirect()->route('ejemplar.admin-ejemplares')->with(['success' => 'Se ha añadido un nuevo ejemplar']);
        }

        return redirect()->route('ejemplar.admin-ejemplares');
    }

    public function eliminarEjemplar(Request $request, Ejemplar $ejemplar)
    {
        Ejemplar::where('isbn', $ejemplar->isbn)->delete();

        return redirect()->route('ejemplar.admin-ejemplares')->with(['success' => 'Se ha eliminado el ejemplar con ISBN ' . $ejemplar->isbn]);
    }

    public function showEditView(Request $request, Ejemplar $ejemplar)
    {
        return view('admin.ejemplares.updateEjemplar', ['ejemplar' => $ejemplar, 'editorial' => Editorial::all(), 'autor' => Autor::all(), 'coleccion' => Coleccion::all()]);
    }

    public function updateEjemplar(Request $request, Ejemplar $ejemplar)
    {
        $request->validate([
            'nombre' => 'string|max:50|required',
            'epilogo' => 'max:1000',
            'fecha' => 'date|required',
            'tema' => 'alpha|max:25|required',
            'idioma' => 'alpha|max:25|required',
            'precio' => 'required|regex:/^(\d{1,2})[.](\d{1,2})$/'
        ]);

        $editorial =  Editorial::where('codEditorial', $request->editorial)->first();
        $autor =  Autor::where('codAutor', $request->autor)->first();
        $coleccion =  Coleccion::where('codColeccion', $request->coleccion)->first();

        if ($request->hasFile('portada')) {

            $request->validate([
                'portada' => 'image|max:255',
            ]);

            $imagen = $request->portada;
            $imagen->move(public_path() . '/book', $imagen->getClientOriginalName());

            Ejemplar::where('isbn', $ejemplar->isbn)->update([
                'image_book' => $imagen->getClientOriginalName(),
            ]);
        }

        if ($request->hasFile('contenido')) {

            $request->validate([
                'contenido' => 'mimes:pdf',
            ]);

            $contenido = $request->contenido;
            $contenido->move(public_path() . '/pdf', $contenido->getClientOriginalName());

            Ejemplar::where('isbn', $ejemplar->isbn)->update([
                'contenido' => "../pdf/" . $contenido->getClientOriginalName(),
            ]);
        }

        $existe =  Ejemplar::where('isbn', $request->isbn)->first();

        if (!empty($existe)) {

            Ejemplar::where('isbn', $ejemplar->isbn)->update([
                'nomEjemplar' => $request->nombre,
                'epilogo' => $request->epilogo,
                'fecPublicacion' => $request->fecha,
                'tema' => $request->tema,
                'idioma' => $request->idioma,
                'precio' => $request->precio,
                'codEditorial' => $editorial->codEditorial ?? NULL,
                'codAutor' => $autor->codAutor ?? NULL,
                'codColeccion' => $coleccion->codColeccion ?? NULL,
            ]);
        } else {

            $request->validate([
                'isbn' => 'digits_between:13,13|required|integer|unique:ejemplar',
            ]);

            Ejemplar::where('isbn', $request->oldisbn)->update([
                'isbn' => $request->isbn,
                'nomEjemplar' => $request->nombre,
                'epilogo' => $request->epilogo,
                'fecPublicacion' => $request->fecha,
                'tema' => $request->tema,
                'idioma' => $request->idioma,
                'precio' => $request->precio,
                'codEditorial' => $editorial->codEditorial ?? NULL,
                'codAutor' => $autor->codAutor ?? NULL,
                'codColeccion' => $coleccion->codColeccion ?? NULL,
            ]);

            return redirect()->route('ejemplar.admin-ejemplares')->with(['success' => 'El ejemplar ha sido modificado correctamente']);
        }

        return back()->with(['success' => 'El ejemplar ha sido modificado correctamente']);
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
                'fecDevolucion' => $request->input('fecha_devolucion'),
                'precioAlquiler' => $request->input('precio'),
            ]);

            return redirect()->route('ejemplar.ejemplar', ['ejemplar' => $ejemplar])->with('success', "Has alquilado el ejemplar " . $ejemplar->nomEjemplar);
        }

        return redirect()->route('ejemplar.ejemplar', ['ejemplar' => $ejemplar])->with('error', "El ejemplar " . $ejemplar->nomEjemplar . " ya lo tienes alquilado");
    }
}
