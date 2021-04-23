<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $nroTransaccion) {  

        $transaccion = DB::table('operacion')
            ->join('bancos', 'operacion.banco_origen_id', '=', 'bancos.id')
            ->select('operacion.*', 'bancos.name AS banco')
            ->where('operacion.nro_orden', $nroTransaccion)
            ->where('operacion.user_id', Auth::id())
            ->get();

        return view('transaccion' , [
            'transaccion' => $transaccion[0],

        ]);
    }
}
