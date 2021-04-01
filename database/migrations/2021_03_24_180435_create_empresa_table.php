<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('numero_ruc');
            $table->string('actividad_economica');
            $table->string('grupo');
            $table->string('grupo_economico')->nullable();
            $table->string('telefono_fijo');
            $table->string('direccion_fiscal');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('ficha_ruc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
