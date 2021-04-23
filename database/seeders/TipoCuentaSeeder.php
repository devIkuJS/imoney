<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoCuenta;
use Illuminate\Support\Facades\Hash;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crearemos un Administrador.
        $tipo_cuenta=TipoCuenta::create([
            'name' => 'Soles'
        ]);

        $tipo_cuenta=TipoCuenta::create([
            'name' => 'Dolares'
        ]);

                    

        
    }
}