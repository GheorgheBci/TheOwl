<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function homeUser()
    {
        return view('auth.userAccount');
    }
}
