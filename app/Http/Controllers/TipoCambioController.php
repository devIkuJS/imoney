<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TipoCambio;

class TipoCambioController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index() { 
        $tipoCambio = TipoCambio::all();       
        return view('tipoCambio');
      }
}
