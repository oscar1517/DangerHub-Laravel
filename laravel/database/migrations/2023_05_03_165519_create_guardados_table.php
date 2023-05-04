<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_contenido');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_lista');
            $table->foreign('id_contenido')->references('id')->on('contenidos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_lista')->references('id')->on('listas__reproduccions')->onDelete('cascade');
            $table->primary(['id_contenido', 'id_usuario', 'id_lista']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardados');
    }
};
