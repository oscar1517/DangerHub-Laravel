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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_perfil');
            $table->foreign('id_perfil')->references('id')->on('perfiles');
            $table->string('nombre_lista');
            $table->nullableTimestamps();
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
