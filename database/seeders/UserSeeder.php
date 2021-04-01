<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crearemos un Administrador.
        $useradmin=User::create([
            'name' => 'admin',
            'apellidos' => 'admin',
            'email' => 'admin@gmail.com',
            'dni' => '74208144',
            'celular' => '940979490',
            'domicilio' => 'Av. Urubamba 378',
            'nacionalidad' => 'Peruano',
            'ocupacion' => 'Administrador',
            'politico' => '0',
            'password' => Hash::make('iMoney5$'),
            'tipo_id' => '1'
            ]);
    }
}
