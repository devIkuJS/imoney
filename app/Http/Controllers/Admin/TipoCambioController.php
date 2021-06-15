<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoCambio;
use App\Models\User;
use Kreait\Firebase\Factory;


class TipoCambioController extends Controller
{
    public $firebase;
    public $db;

    public function _construct()
    {
    	$this->middleware('auth');
        
    }

    public function index()
    {   
        $tipocambio = TipoCambio::all();
    	return view('admin.tipocambio.index' , ['tipocambio' => $tipocambio]);
    }

    public function registro(Request $request)
    {
    	$newTipoCambio = new TipoCambio();
    	$newTipoCambio->compra = $request->compra;
        $newTipoCambio->venta = $request->venta;
        $newTipoCambio->estado = "1";
    	$newTipoCambio->save();

    	return redirect()->back();
    }

    public function actualizar(Request $request, $tipocambioId)
    {
        $path =  storage_path();
        $this->firebase = (new Factory)->withServiceAccount($path. '/imoney-127a8-firebase-adminsdk-sf8fs-8ae070b88c.json');
        $this->db = $this->firebase->createDatabase();
      
        $this->db->getReference('/tipoCambio')
        ->set([
            'compra' => $request->compra,
            'id' => 1,
            'venta' => $request->venta,
            ]);
        


    	$tipocambio = TipoCambio::find($tipocambioId);
    	$tipocambio->compra = $request->compra;
        $tipocambio->venta = $request->venta;
        $tipocambio->updated_at = now();
    	$tipocambio->save();

        return response(json_encode($tipocambio),200)->header('Content-type','application/json');

    	//return redirect()->back();
    }

}
