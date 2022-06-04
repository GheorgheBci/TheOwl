<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_alquiler', function (Blueprint $table) {
            $table->unsignedBigInteger('codUsu');
            $table->unsignedBigInteger('isbn');
            $table->date('fecAlquiler');
            $table->date('fecDevolucion');
            $table->decimal('precioAlquiler', 6, 2);

            $table->primary(['codUsu', 'isbn']);
        });

        Schema::table('detalle_alquiler', function (Blueprint $table) {
            $table->foreign('codUsu')->references('codUsu')->on('usuario')->onDelete('cascade');
            $table->foreign('isbn')->references('isbn')->on('ejemplar')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_alquiler');
    }
}
