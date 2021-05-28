<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusNroInversion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_nro_inversion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operacion_id')->constrained('inversion_operacion');
            $table->string('nro_operacion')->nullable();
            $table->string('voucher_operacion')->nullable();
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
        Schema::dropIfExists('status_nro_operacion');
    }
}
