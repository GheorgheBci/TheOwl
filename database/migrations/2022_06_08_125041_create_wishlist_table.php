<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatewishlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->unsignedBigInteger('codUsu');
            $table->unsignedBigInteger('isbn');

            $table->primary(['codUsu', 'isbn']);
        });

        Schema::table('wishlist', function (Blueprint $table) {
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
        Schema::dropIfExists('wishlist');
    }
}
