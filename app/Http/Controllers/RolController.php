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
}
