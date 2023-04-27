<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listas_Reproduccion;

class ListasReproduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Listas_Reproduccion::create(['id_usuario' => 1, 'nombre_lista' => 'mipapa', 'id_contenido' => 1, 'fecha_creacion' => '2023-04-30']);
    }
}
