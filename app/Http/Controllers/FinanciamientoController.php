<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Financiamiento;

class FinanciamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $financiamiento = Financiamiento::all();
        return view('financiamiento');
        
    }
}
    

