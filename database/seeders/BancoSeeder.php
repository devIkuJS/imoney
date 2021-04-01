<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banco;
use Illuminate\Support\Facades\Hash;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crearemos un Administrador.
        $banco=Banco::create([
            'name' => 'BCP'
        ]);

        $banco=Banco::create([
            'name' => 'Interbank'
        ]);

        $banco=Banco::create([
            'name' => 'Pichincha'
        ]);

        $banco=Banco::create([
            'name' => 'BIF'
        ]);

        $banco=Banco::create([
            'name' => 'BBVA'
        ]);

        $banco=Banco::create([
            'name' => 'Scotiabank'
        ]);

        $banco=Banco::create([
            'name' => 'MiBanco'
        ]);

        $banco=Banco::create([
            'name' => 'GNB'
        ]);

        $banco=Banco::create([
            'name' => 'Banco de la nacion'
        ]);

        $banco=Banco::create([
            'name' => 'Caja Cusco'
        ]);

        $banco=Banco::create([
            'name' => 'Caja Tacna'
        ]);

        $banco=Banco::create([
            'name' => 'Caja Arequipa'
        ]);
                    

        
    }
}
