<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaInversionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_inversiones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('informe');
            $table->string('logo');
            $table->decimal('monto_disponible', $precision = 8, $scale = 2)->nullable();
            $table->date('fecha_esperada')->nullable();
            $table->string('moneda_inversion', 50)->nullable();
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
        Schema::dropIfExists('empresa_inversiones');
    }
}
