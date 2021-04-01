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

    public $dni_front;

    public $dni_atras;

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'integer', 'min:9'],
            'domicilio' => ['required', 'string', 'max:255'],
            'nacionalidad' => ['required', 'string', 'max:255'],
            'ocupacion' => ['required', 'string', 'max:255'],
            'politico'=> ['required'],
            'dni' => ['required', 'integer', 'min:8'],
            'archivo_dni_front' => ['required'],
            'archivo_dni_atras' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terminos' => ['accepted']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function create(array $data)
    {



        if(request()->hasfile('archivo_dni_front')){
            $file=request()->file('archivo_dni_front');
            $destinationPath= 'images/dni/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= request()->file('archivo_dni_front')->move($destinationPath,$filename);
            $this->dni_front = $destinationPath . $filename;
        }

        if(request()->hasfile('archivo_dni_atras')){
            $file=request()->file('archivo_dni_atras');
            $destinationPath= 'images/dni/';
            $filename= time() . '-' . $file->getClientOriginalName();
            $uploadSuccess= request()->file('archivo_dni_atras')->move($destinationPath,$filename);
            $this->dni_atras = $destinationPath . $filename;
        }
        
        

        $politico = $data['politico'] === 'si' ? "1" : "0";
        $user = User::create([
            'name' => $data['name'],
            'apellidos' => $data['apellidos'],
            'celular' => $data['celular'],
            'domicilio' => $data['domicilio'],
            'nacionalidad' => $data['nacionalidad'],
            'ocupacion' => $data['ocupacion'],
            'politico' => $politico,
            'cargo' => $data['cargo'],
            'empresa' => $data['empresa'],
            'dni' => $data['dni'],
            'archivo_dni_front' => $this->dni_front,
            'archivo_dni_atras' => $this->dni_atras,
            'email' => $data['email'],
            'tipo_id' => "2",
            'status_bancario' => "0",
            'password' => Hash::make($data['password']),
            
        ]);

        return $user;
        
    
    }
 
    protected function redirectTo()
    {
            return '/email/verify';
       
    }
    
}
