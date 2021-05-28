<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionOperacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversion_operacion', function (Blueprint $table) {
            $table->id();
            $table->string('nro_orden', 80);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('empresa_id', 1)->constrained('empresa_inversiones');
            $table->foreignId('banco_origen_id')->constrained('bancos');
            $table->decimal('monto_inversion', $precision = 8, $scale = 2);
            $table->foreignId('moneda_id')->constrained('tipo_cuentas');
            $table->foreignId('banco_destino_id')->constrained('cuenta_bancarias');
            $table->foreignId('estado_id', 1)->constrained('estado_operacion');
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
        Schema::dropIfExists('inversion_operacion');
    }
}
