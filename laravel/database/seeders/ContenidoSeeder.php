<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contenido;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contenido::create(['titulo' => 'smile1', 'descripcion' => 'pelicula1', 'url_imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2022/09/smile-2821407.jpg?itok=WpL1m9Vi', 'url_video' => 'https://www.youtube.com/embed/u7h4v79F0L4', 'duracion' => '00:02:18', 'fecha_lanzamiento' => '2023-04-30', 'id_categoria' => 1, 'id_usuario' => 2]);
        Contenido::create(['titulo' => 'smile2', 'descripcion' => 'pelicula2', 'url_imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2022/09/smile-2821407.jpg?itok=WpL1m9Vi', 'url_video' => 'https://www.youtube.com/embed/u7h4v79F0L4', 'duracion' => '00:02:18', 'fecha_lanzamiento' => '2023-04-30', 'id_categoria' => 1, 'id_usuario' => 2]);
        Contenido::create(['titulo' => 'smile3', 'descripcion' => 'pelicula3', 'url_imagen' => 'https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2022/09/smile-2821407.jpg?itok=WpL1m9Vi', 'url_video' => 'https://www.youtube.com/embed/u7h4v79F0L4', 'duracion' => '00:02:18', 'fecha_lanzamiento' => '2023-04-30', 'id_categoria' => 1, 'id_usuario' => 2]);

    }
}
