<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\StatusOperacion;
use App\Models\Inversionista;

class InversionistaTransaccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $inversionistaTransaccion = Inversionista::all();
        return view('inversionistaTransaccion');
        
    }
    
}
