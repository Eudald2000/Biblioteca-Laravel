<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class generosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $generos = [
            'Ficción contemporánea',
            'Ciencia ficción',
            'Fantasía',
            'Misterio',
            'Thriller',
            'Romance',
            'Literatura clásica',
            'Poesía',
            'Biografía',
            'Autobiografía',
            'Historia',
            'Viajes',
            'Ciencia y tecnología',
            'Autoayuda',
            'Arte y fotografía'
        ];

        foreach ($generos as $genero) {
            DB::table('generos')->insert(['genero' => $genero,'created_at' => now()]);
        }
    }
}
