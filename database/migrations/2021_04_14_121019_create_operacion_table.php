<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacion', function (Blueprint $table) {
            $table->id();
            $table->string('nro_orden', 80);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('banco_origen_id')->constrained('bancos');
            $table->string('descripcionMontoA', 30);
            $table->decimal('montoA', $precision = 8, $scale = 2);
            $table->string('descripcionMontoB', 30);
            $table->decimal('montoB', $precision = 8, $scale = 2);
            $table->foreignId('banco_destino_id')->constrained('cuenta_bancarias');
            $table->char('tipo_cuenta', 1);
            $table->char('estado', 1);
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
        Schema::dropIfExists('operacion');
    }
}
