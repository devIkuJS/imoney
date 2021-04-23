<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaCuenta;
use Illuminate\Support\Facades\Hash;

class CategoriaCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_cuenta=CategoriaCuenta::create([
            'name' => 'Cuenta Ahorros'
        ]);

        $tipo_cuenta=CategoriaCuenta::create([
            'name' => 'Cuenta Corriente'
        ]);

                    

        
    }
}