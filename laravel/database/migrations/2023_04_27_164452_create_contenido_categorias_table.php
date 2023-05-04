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
        Schema::create('contenido_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_contenido');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_contenido')->references('id')->on('contenidos')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->primary(['id_contenido', 'id_categoria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenido_categorias');
    }
};
