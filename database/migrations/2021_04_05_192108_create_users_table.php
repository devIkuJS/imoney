<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('dni');
            $table->string('celular');
            $table->string('domicilio');
            $table->string('nacionalidad');
            $table->string('ocupacion');
            $table->string('politico');
            $table->string('cargo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('tipo_id')->constrained('roles');
            $table->string('status_bancario')->nullable();
            $table->string('archivo_dni_front')->nullable();
            $table->string('archivo_dni_atras')->nullable();
            $table->string('verification_code')->nullable();
            $table->integer('is_verified')->default(0);
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
        Schema::dropIfExists('users');
    }
}
