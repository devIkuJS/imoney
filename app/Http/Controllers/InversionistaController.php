<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inversionista;
use App\Models\EmpresaInversiones;
use DateTime;


class InversionistaController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empresas = EmpresaInversiones::all();

       // $newEmpresas = []; 
        //dd($this->dateDiff($empresas[1]["fecha_esperada"], now()));

       /* foreach($empresas as $key=>$value) {
            $obj->fecha_esperada = $this->dateDiff($empresas["fecha_esperada"], now());
        }
        */

        for ($i = 0; $i < count($empresas); $i++) {
            $empresas[$i]["fecha_esperada"] = $this->dateDiff($empresas[$i]["fecha_esperada"], now());
           //echo $empresas[$i]["fecha_esperada"]."\n";
           //$empresas->fecha_esperada = $this->dateDiff($empresas["fecha_esperada"], now());
        }
        //dd($empresas[0]);

        $inversionista = Inversionista::all();
        return view('inversionista', ['empresas' => $empresas]);     
    }

    function dateDiff ($d1, $d2) {
        // Return the number of days between the two dates:    
        return round(abs(strtotime($d1) - strtotime($d2))/86400);
    }
    
    protected function downloadFile($src){
        if(is_file($src)){
            $finfo=finfo_open(FILEINFO_MIME_TYPE);
            $content_type=finfo_file($finfo,$src);
            finfo_close($finfo);
            $file_name=basename($src).PHP_EOL;
            $size=filesize($src);
            header("Content-Type: $content_type");
            header("Content-Disposition: attachment; filename=$file_name");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: $size");
            readfile($src);
            return true;
        }else{
            return false;
        }
    }
    
    public function download(){
        if(!$this->downloadFile(app_path()."/empresas/backus.pdf")){
            return redirect()->back();
        }
    }
}
