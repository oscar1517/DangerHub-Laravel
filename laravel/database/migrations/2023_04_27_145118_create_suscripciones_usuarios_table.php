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
        Schema::create('suscripciones_usuarios', function (Blueprint $table) {
            $table->increments('id_suscripcion_usuarios');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->unsignedBigInteger('id_suscripcion');
            $table->foreign('id_suscripcion')->references('id_suscripcion')->on('suscripciones');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suscripciones_usuarios');
    }
};
