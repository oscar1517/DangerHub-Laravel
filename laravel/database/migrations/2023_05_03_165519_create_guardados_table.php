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
            $table->unsignedBigInteger('id_perfil');
            $table->unsignedBigInteger('id_lista');
            $table->foreign('id_contenido')->references('id')->on('contenidos')->onDelete('cascade');
            $table->foreign('id_perfil')->references('id')->on('perfiles')->onDelete('cascade');
            $table->foreign('id_lista')->references('id')->on('listas__reproduccions')->onDelete('cascade');
            $table->primary(['id_contenido', 'id_perfil', 'id_lista']);
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
