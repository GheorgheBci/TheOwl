<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function homeUser()
    {
        return view('auth.userAccount');
    }

    public function cargarImagenUsuario(Request $request)
    {

        if ($request->hasFile('file')) {
            $imagen = $request->file;

            $imagen->move(public_path() . '/img', $imagen->getClientOriginalName());

            Usuario::where('codUsu', Auth::user()->codUsu)->update([
                'imagen_usuario' => $imagen->getClientOriginalName()
            ]);
        }

        // if ($request->hasFile('file')) {
        //     Usuario::where('codUsu', Auth::user()->codUsu)->update([
        //         'imagen_usuario' =>  $request->file('file')->store('public')
        //     ]);
        // }

        return redirect()->route('usuario.userHome');
    }

    public function actualizarDatosPersonales(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:20',
            'ape1' => 'string|max:20',
            'ape2' => 'string|max:35|nullable',
            'fechaNac' => 'date',
            'email' => 'string|email|max:255|unique:usuario',
        ]);

        Usuario::where('codUsu', Auth::user()->codUsu)->update([
            'nombre' => $request->nombre,
            'apellido1' => $request->ape1,
            'apellido2' => $request->ape2,
            'email' => $request->email,
            'fecNacimiento' => $request->fecNac
        ]);

        return redirect()->route('usuario.userHome');
    }

    public function cambiarContraseña(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {

            $request->validate([
                'password' => 'required|string|min:8',
                'newPassword' => 'required|string|min:8',
                'password-confirm' => 'required|min:8|same:newPassword',
            ]);

            Usuario::where('codUsu', Auth::user()->codUsu)->update([
                'password' => Hash::make($request->newPassword),
            ]);
        }

        return redirect()->route('usuario.userHome');
    }

    public function socio(Request $request)
    {
        date_default_timezone_set('Europe/Madrid');

        switch ($request->tipo) {
            case "1":
                $date_future = date("Y-m-d", strtotime('+30 day', strtotime(date("Y-m-d"))));
                break;
            case "6":
                $date_future = date("Y-m-d", strtotime('+180 day', strtotime(date("Y-m-d"))));
                break;
            case "12":
                $date_future = date("Y-m-d", strtotime('+365 day', strtotime(date("Y-m-d"))));
                break;
        }

        Usuario::where('codUsu', Auth::user()->codUsu)->update([
            'idRol' => 2,
            'fec_ini_socio' => date("Y-m-d"),
            'fec_fin_socio' => $date_future,
        ]);

        return redirect()->route('membresia');
    }

    public function bajaSocio()
    {
        Usuario::where('codUsu', Auth::user()->codUsu)->update([
            'baja' => 1
        ]);

        return redirect()->route('usuario.userHome');
    }

    /*Parte Administrador*/

    public function usuarios(Request $request)
    {
        return view('admin.usuarios.index', ['usuarios' => Usuario::paginate(15)]);
    }

    public function eliminarCuenta(Request $request, Usuario $usuario)
    {
        Usuario::where('codUsu', $usuario->codUsu)->delete();

        return redirect()->route('usuario.usuarios');
    }

    public function buscarUsuario(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario != null) {
            return view('admin.usuarios.usuario', ['usuario' => $usuario]);
        }

        return redirect()->route('usuario.usuarios');
    }
}
