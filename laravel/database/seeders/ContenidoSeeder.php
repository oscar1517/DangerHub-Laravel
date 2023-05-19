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
        Contenido::create([
            'titulo' => 'El Exorcista',
            'descripcion' => 'Una niña es poseída por una entidad demoníaca y un sacerdote debe exorcizarla.',
            'descripcionLarga' => '"El Exorcista" es un clásico del cine de terror que cuenta la aterradora historia de una niña poseída por un demonio y los esfuerzos de un sacerdote para liberarla de su posesión.',
            'url_imagen' => 'https://www.dodmagazine.es/wp-content/uploads/2020/03/el-exorcista-banda-sonora.jpg    ',
            'url_video' => 'https://www.youtube.com/embed/xTNJKhhWWP4',
            'duracion' => '2:02:00',
            'fecha_lanzamiento' => '1973-12-26',
            'id_categoria' => 1,
            'id_usuario' => 1
        ]);

        Contenido::create([
            'titulo' => 'El Conjuro',
            'descripcion' => 'Una pareja de investigadores paranormales ayuda a una familia a enfrentarse a una presencia maligna en su casa.',
            'descripcionLarga' => '"El Conjuro" sigue los escalofriantes eventos vividos por una familia que se muda a una casa embrujada y la pareja de investigadores paranormales que acude en su ayuda para enfrentarse a la presencia maligna que habita en ella.',
            'url_imagen' => 'https://pics.filmaffinity.com/the_conjuring_the_warren_files-153245956-mmed.jpg',
            'url_video' => 'https://www.youtube.com/embed/_zU1gLWGnpg',
            'duracion' => '1:52:00',
            'fecha_lanzamiento' => '2013-07-19',
            'id_categoria' => 1,
            'id_usuario' => 1
        ]);
        Contenido::create([
            'titulo' => 'El Aro',
            'descripcion' => 'Una cinta de vídeo maldita causa la muerte de quien la vea en una semana.',
            'descripcionLarga' => '"El Aro" es un thriller de terror que gira en torno a una cinta de vídeo maldita que trae una maldición: quien la vea, morirá en una semana a menos que encuentre una manera de romper la maldición.',
            'url_imagen' => 'https://www.ecartelera.com/carteles/16300/16312/001_m.jpg',
            'url_video' => 'https://www.youtube.com/embed/rqUzaHJ28Zg',
            'duracion' => '1:55:00',
            'fecha_lanzamiento' => '2002-10-18',
            'id_categoria' => 1,
            'id_usuario' => 1
        ]);
        Contenido::create([
            'titulo' => 'Saw',
            'descripcion' => 'Un asesino en serie secuestra a personas y las somete a juegos mortales para probar su voluntad de vivir.',
            'descripcionLarga' => '"Saw" es una película de terror que sigue los macabros juegos de un asesino en serie conocido como Jigsaw. Las víctimas son secuestradas y sometidas a pruebas mortales para poner a prueba su voluntad de vivir y enfrentar sus pecados.',
            'url_imagen' => 'https://pics.filmaffinity.com/Saw-696880101-large.jpg',
            'url_video' => 'https://www.youtube.com/embed/oiKjzFfX44Q',
            'duracion' => '1:43:00',
            'fecha_lanzamiento' => '2004-10-29',
            'id_categoria' => 1,
            'id_usuario' => 1
        ]);

    }
}
