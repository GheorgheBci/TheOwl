<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $imagen->move(public_path() . '/imagenes', $imagen->getClientOriginalName());

            Usuario::where('codUsu', Auth::user()->codUsu)->update([
                'imagen_usuario' => $imagen->getClientOriginalName()
            ]);
        }
    }
}
