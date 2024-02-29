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
                'sinopsis' => 'Una de las obras más famosas de William Shakespeare.',
                'ano_publicacion' => '1597-01-01',
                'ISBN' => '9780140623275',
                'disponible' => true,
                'precio' => 10.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'Orgullo y prejuicio',
                'autor_id' => 2,
                'editorial_id' => 2,
                'sinopsis' => 'Una de las novelas más conocidas de Jane Austen.',
                'ano_publicacion' => '1813-01-28',
                'ISBN' => '9788499086401',
                'disponible' => true,
                'precio' => 12.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'Cumbres Borrascosas',
                'autor_id' => 3,
                'editorial_id' => 3,
                'sinopsis' => 'Una novela de Emily Brontë, publicada por primera vez en 1847.',
                'ano_publicacion' => '1847-12-20',
                'ISBN' => '9788491814082',
                'disponible' => true,
                'precio' => 11.50,
                'created_at' => now()
            ],
            [
                'titulo' => 'Los cuentos de Canterbury',
                'autor_id' => 4,
                'editorial_id' => 4,
                'sinopsis' => 'Una colección de cuentos escrita por Geoffrey Chaucer.',
                'ano_publicacion' => '1400-01-01',
                'ISBN' => '9788420649247',
                'disponible' => true,
                'precio' => 9.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'El corazón de las tinieblas',
                'autor_id' => 6,
                'editorial_id' => 6,
                'sinopsis' => 'Una novela de Joseph Conrad que narra un viaje por el río Congo.',
                'ano_publicacion' => '1899-02-13',
                'ISBN' => '9788491050527',
                'disponible' => true,
                'precio' => 13.75,
                'created_at' => now()
            ],
            [
                'titulo' => 'Cuento de Navidad',
                'autor_id' => 7,
                'editorial_id' => 7,
                'sinopsis' => 'Una historia clásica de Charles Dickens sobre la Navidad y el espíritu de la generosidad.',
                'ano_publicacion' => '1843-12-19',
                'ISBN' => '9788491050527',
                'disponible' => true,
                'precio' => 11.25,
                'created_at' => now()
            ],
            [
                'titulo' => 'Romeo y Julieta',
                'autor_id' => 1,
                'editorial_id' => 1,
                'sinopsis' => 'Una de las obras más famosas de William Shakespeare.',
                'ano_publicacion' => '1597-01-01',
                'ISBN' => '9780140623275',
                'disponible' => true,
                'precio' => 10.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'Moby Dick',
                'autor_id' => 8,
                'editorial_id' => 8,
                'sinopsis' => 'Una novela épica de aventuras marinas escrita por Herman Melville.',
                'ano_publicacion' => '1851-10-18',
                'ISBN' => '9788497646942',
                'disponible' => true,
                'precio' => 15.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'Mientras agonizo',
                'autor_id' => 9,
                'editorial_id' => 9,
                'sinopsis' => 'Una novela de William Faulkner que narra el viaje de una familia para enterrar a su madre.',
                'ano_publicacion' => '1930-04-06',
                'ISBN' => '9788420674379',
                'disponible' => true,
                'precio' => 12.99,
                'created_at' => now()
            ],
            [
                'titulo' => 'Narraciones extraordinarias',
                'autor_id' => 10,
                'editorial_id' => 10,
                'sinopsis' => 'Una colección de cuentos de Edgar Allan Poe que incluye algunos de sus relatos más famosos.',
                'ano_publicacion' => '1856-01-01',
                'ISBN' => '9788483465693',
                'disponible' => true,
                'precio' => 11.99,
                'created_at' => now()
            ]
        ]);
    }
    // public function run()
    // {
    //     $faker = Faker::create();

    //     // Generar libros aleatorios
    //     for ($i = 0; $i < 10; $i++) {
    //         DB::table('libros')->insert([
    //             'titulo' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    //             'autor_id' => $faker->numberBetween(1, 10), // Ajusta el rango según el número de autores
    //             'editorial_id' => $faker->numberBetween(1, 10), // Ajusta el rango según el número de editoriales
    //             'sinopsis' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
    //             'ano_publicacion' => $faker->date($format = 'Y-m-d', $max = 'now'),
    //             'ISBN' => $faker->isbn13,
    //             'disponible' => $faker->boolean($chanceOfGettingTrue = 90), // 90% de probabilidad de estar disponible
    //             'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 50),
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }
    // }
}
