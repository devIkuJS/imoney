<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inversionista;
use App\Models\EmpresaInversiones;


class InversionistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $inversiones = EmpresaInversiones::all();
        $inversionista = Inversionista::all();
        return view('inversionista');     
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
