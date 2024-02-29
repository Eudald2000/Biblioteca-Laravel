<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro_Genero;
use App\Models\Libro;
use App\Models\Genero;

class Libro_GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtenemos todos los libros y géneros disponibles
        $libros = Libro::all();
        $generos = Genero::all();

        // Iteramos sobre cada libro
        foreach ($libros as $libro) {
            // Generamos un número aleatorio entre 2 y 4 para la cantidad de géneros
            $cantidadGeneros = rand(2, 4);

            // Elegimos aleatoriamente los IDs de los géneros
            $generosAleatorios = $generos->random($cantidadGeneros);

            // Creamos una entrada en la tabla libro_generos para cada combinación de libro y género
            foreach ($generosAleatorios as $genero) {
                Libro_Genero::create([
                    'libro_id' => $libro->id,
                    'genero_id' => $genero->id,
                ]);
            }
        }
    }
}
