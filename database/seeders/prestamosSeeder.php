<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class prestamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('prestamos')->insert([
        [
            'user_id' => 1,
            'libro_id' => 1,
            'fecha_prestamo' => now()->subDays(7),
            'fecha_devolucion' => null,
        ],
        [
            'user_id' => 2,
            'libro_id' => 2,
            'fecha_prestamo' => now()->subDays(10), // Se prestó hace 10 días
            'fecha_devolucion' => now()->addDays(5), // Se devuelve en 5 días (total 15 días de préstamo)
        ],
        [
            'user_id' => 3,
            'libro_id' => 3,
            'fecha_prestamo' => now()->subDays(5), // Se prestó hace 5 días
            'fecha_devolucion' => null,
        ],
        [
            'user_id' => 4,
            'libro_id' => 4,
            'fecha_prestamo' => now()->subDays(12), // Se prestó hace 12 días
            'fecha_devolucion' => now()->addDays(3), // Se devuelve en 3 días (total 15 días de préstamo),
        ],
        [
            'user_id' => 5,
            'libro_id' => 5,
            'fecha_prestamo' => now()->subDays(2), // Se prestó hace 2 días
            'fecha_devolucion' => null,
        ],
    ]);
}

}
