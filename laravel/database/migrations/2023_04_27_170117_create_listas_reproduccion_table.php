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
        Schema::create('listas__reproduccions', function (Blueprint $table) {
            $table->bigIncrements('id_lista');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('users');
            $table->string('nombre_lista');
            $table->unsignedBigInteger('id_contenido');
            $table->foreign('id_contenido')->references('id_contenido')->on('contenidos');
            $table->date('fecha_creacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas_reproduccion');
    }
};
