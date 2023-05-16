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
        Contenido::create(['titulo' => 'Terrifier (2016))', 'descripcion' => 'El payaso psicópata Art aterroriza a dos chicas durante la noche de Halloween, matando a todos aquellos que se interponen en su camino.', 
        'descripcionLarga' => 'Un hombre está mirando en un pequeño televisor a Monica Brown​, una presentadora de un programa de entrevistas, que entrevista a una mujer terriblemente desfigurada, quien es la única superviviente de una masacre que tuvo lugar en el Halloween anterior.', 'url_imagen' => 'https://decine21.com/img/upload/obras/terrifier-46634/terrifier-46634-c.jpg', 'url_video' => 'https://www.youtube.com/embed/DotHFemS-kg', 'duracion' => '00:02:18', 'fecha_lanzamiento' => '2023-04-30', 'id_categoria' => 1, 'id_usuario' => 1]);
        Contenido::create(['titulo' => 'Starry Eyes (2014)', 'descripcion' => 'Sarah firma su pacto con el diablo en plena posesión de sus facultades, asciende al estrellato, y participa de la resplandeciente luz negra que la verdad del mundo arroja y arrojará eternamente sobre todos nosotros.', 
        'descripcionLarga' => 'Sarah Walker persigue el sueño de Hollywood: convertirse en una estrella; pero de momento lo hace desde un trabajo insatisfactorio y sin mucho éxito en las diferentes audiciones a las que acude. Hasta que va a dar con un misterioso anuncio, el cual le llevará paso a paso a través de una serie de extrañas entrevistas y pruebas que la catapultarán a la fama como protagonista de una nueva cinta de culto, nunca mejor dicho. Aunque todos sabemos que la gloria tiene un precio, y el cuerpo y la mente de Sarah serán los encargados de pagarlo.', 
        'url_imagen' => 'https://pics.filmaffinity.com/Starry_Eyes-680855867-large.jpg', 'url_video' => 'https://www.youtube.com/embed/2JbO0eIc3jM', 'duracion' => '00:02:18', 'fecha_lanzamiento' => '2023-04-30', 'id_categoria' => 1, 'id_usuario' => 1]);

    }
}
