<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inversionista;

class InversionistaCaracteristicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inversionistaCaracteristica = Inversionista::all();
        return view('inversionistaCaracteristica');
        
    }
}
