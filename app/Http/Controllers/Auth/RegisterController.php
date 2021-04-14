<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\UserMail;

use App\Http\Controllers\MailController;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    public function register(Request $request)
    {
        $user = new User();

        $this->validate($request, [
            'name' => 'required',
            'apellidos' => 'required',
            'celular' => 'required|min:9',
            'domicilio' => 'required',
            'nacionalidad' => 'required',
            'ocupacion' => 'required',
            'politico' => 'required',
            'dni' => 'required|min:8',
            'archivo_dni_front' => 'required',
            'archivo_dni_atras' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'terminos' => 'accepted',
        ],
        [
            'name.required' => 'Ingrese nombres',
            'apellidos.required' => 'Ingrese apellidos',
            'celular.required' => 'Ingrese celular',
            'domicilio.required' => 'Ingrese su domicilio',
            'nacionalidad.required' => 'Ingrese su nacionalidad',
            'ocupacion.required' => 'Ingrese su ocupacion',
            'politico.required' => 'Seleccione si es politico',
            'dni.required' => 'Ingrese su dni',
            'archivo_dni_front.required' => 'Seleccione DNI Anverso',
            'archivo_dni_atras.required' => 'Seleccione DNI Reverso',
            'email.required' => 'El email es invalido',
            'password.required' => 'Ingrese una contraseña valida',
            'terminos.required' => 'Seleccione terminos y condiciones',
        ]);

        if($request->hasfile('archivo_dni_front')){
            $file=$request->file('archivo_dni_front');
            $destinationPath= 'images/dni/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('archivo_dni_front')->move($destinationPath,$filename);
            $user->archivo_dni_front = $destinationPath . $filename;
        }

        if($request->hasfile('archivo_dni_atras')){
            $file=$request->file('archivo_dni_atras');
            $destinationPath= 'images/dni/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= $request->file('archivo_dni_atras')->move($destinationPath,$filename);
            $user->archivo_dni_atras = $destinationPath . $filename;
        }


        $politico = $request['politico'] === 'si' ? "1" : "0";

        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->celular = $request->celular;
        $user->domicilio = $request->domicilio;
        $user->nacionalidad = $request->nacionalidad;
        $user->ocupacion = $request->ocupacion;
        $user->politico = $politico;
        $user->cargo = $request->cargo;
        $user->empresa = $request->empresa;
        $user->dni = $request->dni;
        $user->email = $request->email;
        $user->tipo_id = "2";
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();

        if($user != null){
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect('/email-verify');
        }

    }

    
}
