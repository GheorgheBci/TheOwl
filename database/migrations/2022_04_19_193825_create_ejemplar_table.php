<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjemplarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplar', function (Blueprint $table) {
            $table->string('isbn', 13)->primary();
            $table->string('nomEjemplar', 50)->required();
            $table->string('epilogo', 150)->nullable();
            $table->date('fecPublicacion')->required();
            $table->string('tema')->required();
            // Editorial
            $table->unsignedBigInteger('codEditorial');
            $table->foreign('codEditorial')->references('codEditorial')->on('editorial')->onDelete('cascade');
            // Autor
            $table->unsignedBigInteger('codAutor');
            $table->foreign('codAutor')->references('codAutor')->on('autor')->onDelete('cascade');
            // Coleccion
            $table->unsignedBigInteger('codColeccion');
            $table->foreign('codColeccion')->references('codColeccion')->on('coleccion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejemplar');
    }
}
