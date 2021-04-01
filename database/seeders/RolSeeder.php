<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crearemos un Administrador.
        $rol=Rol::create([
            'name' => 'Administrador'
        ]);

        $rol=Rol::create([
            'name' => 'Persona Natural'
        ]);

        $rol=Rol::create([
            'name' => 'Representante Legal'
        ]);

        $rol=Rol::create([
            'name' => 'Operador'
        ]);
        
    }
}
