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
            $table->unsignedBigInteger('idRol')->default(1);
            $table->foreign('idRol')->references('idRol')->on('rol')->onDelete('cascade');
            $table->date('fec_ini_socio')->nullable();
            $table->date('fec_fin_socio')->nullable();
            $table->boolean('baja')->default(0);
            $table->string('imagen_usuario')->nullable()->default('user.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
