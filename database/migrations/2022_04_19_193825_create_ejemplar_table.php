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
            $table->id('isbn', 13);
            $table->string('nomEjemplar', 50)->required();
            $table->string('epilogo')->nullable();
            $table->date('fecPublicacion')->required();
            $table->string('tema')->required();
            $table->string('idioma')->required();
            $table->string('image_book')->required();
            $table->double('puntuacion')->nullable()->default(0);
            $table->integer('votos')->nullable()->default(0);
            $table->string('contenido')->required();
            // Editorial
            $table->unsignedBigInteger('codEditorial')->nullable();
            $table->foreign('codEditorial')->references('codEditorial')->on('editorial')->onDelete('cascade');
            // Autor
            $table->unsignedBigInteger('codAutor')->nullable();
            $table->foreign('codAutor')->references('codAutor')->on('autor')->onDelete('cascade');
            // Coleccion
            $table->unsignedBigInteger('codColeccion')->nullable();
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
