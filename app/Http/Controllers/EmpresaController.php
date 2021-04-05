<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Empresa;
use App\Models\User;
use App\Models\RepresentanteLegal;
use App\Models\PersonaOperaciones;

use Illuminate\Auth\Events\Registered;



class EmpresaController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest');
    }

    public function index()
    {
        return view('empresa');
        
    }



    public function create(Request $request)
    {

        $newUserRepresentante = new User();

        $newUserOperaciones = new User();

        $newEmpresa = new Empresa(); 

        $newRepresentante = new RepresentanteLegal(); 

        $newPersonaOperaciones = new PersonaOperaciones(); 


        $this->validate($request, [
            'razon_social' => 'required',
            'numero_ruc' => 'required|min:11',
            'actividad_economica' => 'required',
            'grupo' => 'required',
            'telefono_fijo' => 'required|min:7',
            'direccion_fiscal' => 'required',
            'departamento' => 'required',
            'provincia' => 'required',
            'distrito' => 'required',
            'ruc_doc' => 'required',
            'name_repre_legal' => 'required',
            'apell_repre_legal' => 'required',
            'email_repre_legal' => 'required|unique:users,email',
            'dni_repre_legal' => 'required|min:8',
            'celular_repre_legal' => 'required|min:9',
            'domicilio_repre_legal' => 'required',
            'nacionalidad_repre_legal' => 'required',
            'ocupacion_repre_legal' => 'required',
            'politico_repre_legal' => 'required',
            'dni_doc' => 'required',
            'poderes_doc' => 'required',
            'name_per_operaciones' => 'required',
            'apell_per_operaciones' => 'required',
            'correo_per_operaciones' => 'required|unique:users,email',
            'dni_per_operaciones' => 'required|min:8',
            'celular_per_operaciones' => 'required|min:9',
            'domicilio_per_operaciones' => 'required',
            'nacionalidad_per_operaciones' => 'required',
            'ocupacion_per_operaciones' => 'required',
            'politico_per_operaciones' => 'required',
            'password' => 'required|min:8|confirmed',
            'terminos' => 'accepted',
        ],
        [
            'razon_social.required' => 'Ingrese razon social',
            'numero_ruc.required' => 'El numero de RUC es invalido',
            'actividad_economica.required' => 'Ingrese actividad economica',
            'grupo.required' => 'Seleccione si pertenece a un grupo economico',
            'telefono_fijo.required' => 'Ingrese telefono de la empresa',
            'direccion_fiscal.required' => 'Ingrese su direccion fiscal',
            'departamento.required' => 'Seleccione el departamento',
            'provincia.required' => 'Seleccione la provincia',
            'distrito.required' => 'Seleccione el distrito',
            'ruc_doc.required' => 'Debe adjuntar su ficha RUC',
            'name_repre_legal.required' => 'Ingrese el nombre de representante legal',
            'apell_repre_legal.required' => 'Ingrese el apellido de representante legal',
            'email_repre_legal.required' => 'Ingrese un correo valido',
            'dni_repre_legal.required' => 'Ingrese un dni valido',
            'celular_repre_legal.required' => 'Ingrese un celular valido',
            'domicilio_repre_legal.required' => 'Ingrese un domicilio valido',
            'nacionalidad_repre_legal.required' => 'Ingrese su nacionalidad',
            'ocupacion_repre_legal.required' => 'Ingrese su ocupacion',
            'politico_repre_legal.required' => 'Seleccione si es politico',
            'dni_doc.required' => 'Adjunte DNI de representante',
            'poderes_doc.required' => 'Adjunte Vigencia de poderes',
            'name_per_operaciones.required' => 'Ingrese el nombre de la persona de las operaciones',
            'apell_per_operaciones.required' => 'Ingrese el apellido de la persona de las operaciones',
            'correo_per_operaciones.required' => 'Ingrese un email valido para la persona de las operaciones',
            'dni_per_operaciones.required' => 'Ingrese dni valido de la personas de operaciones',
            'celular_per_operaciones.required' => 'Ingrese celular valido de la persona de operaciones',
            'domicilio_per_operaciones.required' => 'Ingrese domicilio de la personas de operaciones',
            'nacionalidad_per_operaciones.required' => 'Ingrese la nacionalidad de la persona de las operaciones',
            'ocupacion_per_operaciones.required' => 'Ingrese ocupacion de la persona de operaciones',
            'politico_per_operaciones.required' => 'Seleccione si es politico',
            'password.required' => 'Ingrese clave valida',
            'terminos.required' => 'Seleccione terminos y condiciones',
        ]);


         if($request->hasfile('ruc_doc')){
            $file=$request->file('ruc_doc');
            $destinationPath= 'images/ficha_ruc/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('ruc_doc')->move($destinationPath,$filename);
            $newEmpresa->ficha_ruc=$destinationPath . $filename;
        }

    
        $grupo = $request['grupo'] === 'si' ? "1" : "0";
        $newEmpresa->razon_social = $request->razon_social;
        $newEmpresa->numero_ruc = $request->numero_ruc;
        $newEmpresa->actividad_economica = $request->actividad_economica;
        $newEmpresa->grupo = $grupo;
        $newEmpresa->grupo_economico = $request->grupo_economico;
        $newEmpresa->telefono_fijo = $request->telefono_fijo;
        $newEmpresa->direccion_fiscal = $request->direccion_fiscal;
        $newEmpresa->departamento = $request->departamento;
        $newEmpresa->provincia = $request->provincia;
        $newEmpresa->distrito = $request->distrito;
        $newEmpresa->save();
        
      
        if($request->hasfile('dni_doc')){
            $file=$request->file('dni_doc');
            $destinationPath= 'images/representante_legal/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('dni_doc')->move($destinationPath,$filename);
            $newUserRepresentante->archivo_dni_front = $destinationPath . $filename;
        }

        if($request->hasfile('poderes_doc')){
            $file=$request->file('poderes_doc');
            $destinationPath= 'images/representante_legal/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('poderes_doc')->move($destinationPath,$filename);
            $newRepresentante->archivo_vigencia = $destinationPath . $filename;
        }
 
        $newUserRepresentantePolitico = $request['politico_repre_legal'] === 'si' ? "1" : "0";
        $newUserRepresentante->name = $request->name_repre_legal;
        $newUserRepresentante->apellidos = $request->apell_repre_legal;
        $newUserRepresentante->email = $request->email_repre_legal;
        $newUserRepresentante->dni = $request->dni_repre_legal;
        $newUserRepresentante->celular = $request->celular_repre_legal;
        $newUserRepresentante->domicilio = $request->domicilio_repre_legal;
        $newUserRepresentante->nacionalidad = $request->nacionalidad_repre_legal;
        $newUserRepresentante->ocupacion = $request->ocupacion_repre_legal;
        $newUserRepresentante->politico = $newUserRepresentantePolitico;
        $newUserRepresentante->cargo = $request->cargo_repre_legal;
        $newUserRepresentante->empresa = $request->empresa_repre_legal;
        $newUserRepresentante->password = " ";
        $newUserRepresentante->tipo_id = "3";
        $newUserRepresentante->archivo_dni_atras = "";
        $newUserRepresentante->save();
        $newRepresentante->user_id = $newUserRepresentante->id;
        $newRepresentante->empresa_id = $newEmpresa->id;
        $newRepresentante->save();
        


        if($request->hasfile('dni_ope_doc')){
            $file=$request->file('dni_ope_doc');
            $destinationPath= 'images/persona_operaciones/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('dni_ope_doc')->move($destinationPath,$filename);
            $newUserOperaciones->archivo_dni_front = $destinationPath . $filename;
        }
        
        $newUserPoliticoOperaciones = $request['politico_per_operaciones'] === 'si' ? "1" : "0";
        $newUserOperaciones->name = $request->name_per_operaciones;
        $newUserOperaciones->apellidos = $request->apell_per_operaciones;
        $newUserOperaciones->email = $request->correo_per_operaciones;
        $newUserOperaciones->dni = $request->dni_per_operaciones;
        $newUserOperaciones->celular = $request->celular_per_operaciones;
        $newUserOperaciones->domicilio = $request->domicilio_per_operaciones;
        $newUserOperaciones->nacionalidad = $request->nacionalidad_per_operaciones;
        $newUserOperaciones->ocupacion = $request->ocupacion_per_operaciones;
        $newUserOperaciones->politico = $newUserPoliticoOperaciones;
        $newUserOperaciones->cargo = $request->cargo_per_operaciones;
        $newUserOperaciones->empresa = $request->empresa_per_operaciones;
        $newUserOperaciones->password = Hash::make($request->password);
        $newUserOperaciones->tipo_id = "4";
        $newUserOperaciones->status_bancario = "0";
        $newUserOperaciones->archivo_dni_atras = "";
        $newUserOperaciones->save();
        $newPersonaOperaciones->user_id = $newUserOperaciones->id;
        $newPersonaOperaciones->empresa_id = $newEmpresa->id;
        $newPersonaOperaciones->save();
        


        //return Redirect::to('/email/verify');

        $newUserOperaciones->sendEmailVerificationNotification();

       /* return Route::get('/email/verify', function () {
            return view('auth.verify');
          })->middleware('auth')->name('verification.notice');
          */

         // event(new Registered($newUserOperaciones));


          return redirect()->intended('/email/verify');
          

    

        
        
        }
    
}
