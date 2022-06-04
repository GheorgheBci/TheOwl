<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function chartUsuario(Request $request)
    {
        $users = DB::table('usuario')->selectRaw('DISTINCT MONTHNAME(email_verified_at) as mes, COUNT(codUsu) as total_usuarios')
            ->groupByRaw('MONTHNAME(email_verified_at)')
            ->get();

        for ($i = 0; $i < count($users); $i++) {
            $data['label'][] = $users[$i]->mes;
            $data['data'][] = $users[$i]->total_usuarios;
        }

        $data['data'] = json_encode(($data));

        $alquileres = DB::table('detalle_alquiler')->paginate(10);

        return view('admin.index', $data, ['alquileres' => $alquileres]);
    }
}
