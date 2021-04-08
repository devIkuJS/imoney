<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CambioTipo;

class CambioTipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $cambioTipo = CambioTipo::all();
        return view('cambioTipo');
        
    }
}
