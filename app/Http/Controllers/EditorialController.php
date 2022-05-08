<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function editoriales(Request $request)
    {
        return view('admin.editoriales.index', ['editoriales' => Editorial::all()]);
    }
}
