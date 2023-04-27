<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorias::create(['id_categoria' => 1, 'tipo_categoria' => 'Peliculas']);
        Categorias::create(['id_categoria' => 2, 'tipo_categoria' => 'Series']);
        Categorias::create(['id_categoria' => 3, 'tipo_categoria' => 'Documentales']);
    }
}
