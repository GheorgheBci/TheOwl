<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('codUsu');
            $table->string('nombre', 20)->required();
            $table->string('apellido1', 20)->required();
            $table->string('apellido2', 35)->nullable();
            $table->date('fecNacimiento')->required();
            $table->string('email')->unique();
            $table->string('password')->required();
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('idRol')->on('rol')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}