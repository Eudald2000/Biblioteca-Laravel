<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class librosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('libros')->insert([
            [
                'titulo' => 'Romeo y Julieta',
                'autor_id' => 1,
                'editorial_id' => 1,
                'sinopsis' => 'Ambientada en la ciudad italiana de Verona, "Romeo y Julieta" cuenta la historia de dos jóvenes amantes cuyas familias, los Montesco y los Capuleto, están enemistadas. Romeo, de los Montesco, y Julieta, de los Capuleto, se encuentran y se enamoran profundamente en un baile, pero su amor se ve obstaculizado por el odio entre sus familias. Con la ayuda de Fray Lorenzo, un fraile franciscano, planean fugarse juntos, pero una serie de malentendidos y eventos trágicos conducen a un final desgarrador y fatal.',
                'ano_publicacion' => '1597-01-01',
                'isbn' => '9780140623275',
                'disponible' => true,
                'precio' => 10.99,
                'imagen' => 'storage/romeoJulieta.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Orgullo y prejuicio',
                'autor_id' => 2,
                'editorial_id' => 2,
                'sinopsis' => 'En la Inglaterra rural del siglo XIX, la historia sigue a Elizabeth Bennet, una mujer inteligente y de mente propia, y su relación con el rico y arrogante Sr. Darcy. A medida que luchan contra sus prejuicios y malentendidos, ambos deben superar los obstáculos sociales y personales para encontrar el amor verdadero y la aceptación en una sociedad dominada por la clase y las expectativas sociales.',
                'ano_publicacion' => '1813-01-28',
                'isbn' => '9788499086401',
                'disponible' => true,
                'precio' => 12.99,
                'imagen' => 'storage/orgulloPrejuicio.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Cumbres Borrascosas',
                'autor_id' => 3,
                'editorial_id' => 3,
                'sinopsis' => 'Ubicada en los páramos ventosos de Yorkshire, esta novela cuenta la historia de Catherine Earnshaw y su relación tumultuosa con el niño desamparado Heathcliff, a quien su padre adopta en su hogar. La pasión y el odio entre Catherine y Heathcliff desencadenan una serie de eventos violentos que afectan a las generaciones posteriores de sus familias y culminan en una historia de amor y venganza que trasciende la muerte.',
                'ano_publicacion' => '1847-12-20',
                'isbn' => '9788491814082',
                'disponible' => true,
                'precio' => 11.50,
                'imagen' => 'storage/cumbres.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Los cuentos de Canterbury',
                'autor_id' => 4,
                'editorial_id' => 4,
                'sinopsis' => 'Durante un viaje de peregrinación a Canterbury, un grupo de personas de diversas clases sociales se reúnen y deciden contarse cuentos para pasar el tiempo. Cada peregrino cuenta una historia diferente, que varía en tema y tono, desde lo cómico hasta lo moralizante. A través de estas historias, se exploran temas universales como el amor, la traición, la codicia y la redención.',
                'ano_publicacion' => '1400-01-01',
                'isbn' => '9788420649247',
                'disponible' => true,
                'precio' => 9.99,
                'imagen' => 'storage/cuentos.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'El corazón de las tinieblas',
                'autor_id' => 6,
                'editorial_id' => 6,
                'sinopsis' => 'Ambientada en el contexto del imperialismo europeo en África, la novela sigue el viaje del narrador, Charles Marlow, por el río Congo en busca de un comerciante llamado Kurtz. A medida que se adentra en la selva, Marlow se enfrenta a los horrores del colonialismo, la locura y la depravación humana, todo lo cual lo lleva a cuestionar la naturaleza de la civilización y la humanidad misma.',
                'ano_publicacion' => '1899-02-13',
                'isbn' => '9788491050527',
                'disponible' => true,
                'precio' => 13.75,
                'imagen' => 'storage/corazon.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Cuento de Navidad',
                'autor_id' => 7,
                'editorial_id' => 7,
                'sinopsis' => 'Ebenezer Scrooge, un anciano avaro y amargado, recibe la visita de tres espíritus navideños que lo llevan en un viaje emocional a través de su pasado, presente y futuro. A través de estas experiencias, Scrooge se enfrenta a sus propios errores y se transforma de un individuo egoísta y frío a uno compasivo y generoso, redescubriendo el verdadero significado de la Navidad y el poder de la redención.',
                'ano_publicacion' => '1843-12-19',
                'isbn' => '9788492050527',
                'disponible' => true,
                'precio' => 11.25,
                'imagen' => 'storage/navidad.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Romeo y Julieta',
                'autor_id' => 1,
                'editorial_id' => 1,
                'sinopsis' => 'Ambientada en la ciudad italiana de Verona, "Romeo y Julieta" cuenta la historia de dos jóvenes amantes cuyas familias, los Montesco y los Capuleto, están enemistadas. Romeo, de los Montesco, y Julieta, de los Capuleto, se encuentran y se enamoran profundamente en un baile, pero su amor se ve obstaculizado por el odio entre sus familias. Con la ayuda de Fray Lorenzo, un fraile franciscano, planean fugarse juntos, pero una serie de malentendidos y eventos trágicos conducen a un final desgarrador y fatal.',
                'ano_publicacion' => '1597-01-01',
                'isbn' => '9780140623275',
                'disponible' => true,
                'precio' => 10.99,
                'imagen' => 'storage/romeoJulieta.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Moby Dick',
                'autor_id' => 8,
                'editorial_id' => 8,
                'sinopsis' => 'Esta épica novela sigue al narrador Ishmael mientras se une a la tripulación del barco ballenero Pequod, dirigido por el obsesionado capitán Ahab. A medida que la nave se adentra en los peligrosos mares en busca de la legendaria ballena blanca, Moby Dick, la historia explora temas de obsesión, venganza, la lucha entre el hombre y la naturaleza, y la búsqueda del significado en un mundo vasto y hostil.',
                'ano_publicacion' => '1851-10-18',
                'isbn' => '9788497646942',
                'disponible' => true,
                'precio' => 15.99,
                'imagen' => 'storage/mobyDick.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Mientras agonizo',
                'autor_id' => 9,
                'editorial_id' => 9,
                'sinopsis' => ' La novela sigue a la familia Bundren mientras emprenden un peligroso viaje para enterrar a su matriarca, Addie, según su último deseo. A medida que el grupo se enfrenta a una serie de obstáculos físicos y emocionales en su camino hacia el cementerio, cada miembro de la familia revela sus propias luchas internas y secretos, explorando temas de vida, muerte, sacrificio y redención.',
                'ano_publicacion' => '1930-04-06',
                'isbn' => '9788420674379',
                'disponible' => false,
                'precio' => 12.99,
                'imagen' => 'storage/agonizo.jpg',
                'created_at' => now()
            ],
            [
                'titulo' => 'Narraciones extraordinarias',
                'autor_id' => 10,
                'editorial_id' => 10,
                'sinopsis' => 'Esta colección de cuentos del maestro del terror Edgar Allan Poe incluye algunas de sus obras más célebres, como "El corazón delator", "El cuervo" y "La caída de la Casa Usher". A través de sus historias de horror, misterio y macabro, Poe explora los límites de la psique humana y las oscuras fuerzas que acechan en los rincones más profundos de la mente y el alma.',
                'ano_publicacion' => '1856-01-01',
                'isbn' => '9788483465693',
                'disponible' => false,
                'precio' => 11.99,
                'imagen' => 'storage/narraciones.jpg',
                'created_at' => now()
            ]
        ]);
    }
}
