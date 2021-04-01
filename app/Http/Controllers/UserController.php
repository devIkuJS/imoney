<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banco;
use App\Models\TipoCuenta;
use App\Models\CuentaBancaria;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');

    }


    public function index()
    {
        $bancos = Banco::all();
        $tipo_cuenta = TipoCuenta::all();
        $status_bancario = Auth::user()->status_bancario;
        return view('user' , [
            'bancos' => $bancos,
            'tipo_cuentas' => $tipo_cuenta,
            'status_bancario' => $status_bancario,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $newCuentaBancaria = new CuentaBancaria();

        $newCuentaBancaria->user_id = Auth::id();
    	$newCuentaBancaria->banco_id = $request->bancos;
        $newCuentaBancaria->tipo_cuenta_id = $request->tipo_cuentas;
        $newCuentaBancaria->cuenta_soles = $request->cuenta_soles;
        $newCuentaBancaria->cuenta_dolares = $request->cuenta_dolares;
       
    	$newCuentaBancaria->save();

    	return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
