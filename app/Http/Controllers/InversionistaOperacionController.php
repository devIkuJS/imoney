<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Inversionista;
use App\Models\Banco;
use App\Models\CuentaBancaria;
use App\Models\CategoriaCuenta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class InversionistaOperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bancos = Banco::all();
        $categoria_cuenta = categoriaCuenta::all();
        $inversionistaOperacion = Inversionista::all();
        return view('inversionistaOperacion',[
            'bancos'=>$bancos,
            'categoria_cuenta'=>$categoria_cuenta]);
    }
}
