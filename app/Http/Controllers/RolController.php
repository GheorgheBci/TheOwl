<?php

namespace App\Http\Controllers;

use App\Models\Rol;

use Illuminate\Http\Request;

class RolController extends Controller
{
    public function roles(Request $request)
    {
        return view('admin.roles.index', ['roles' => Rol::all()]);
    }

    public function crearRol(Request $request)
    {
        $request->validate([
            'rol' => 'required|in:usuario,socio,administrador|unique:rol',
        ]);

        Rol::create([
            'rol' => $request->rol
        ]);

        return redirect()->route('rol.roles')->with(['success' => 'Se ha creado el rol ' . $request->rol]);
    }
}
