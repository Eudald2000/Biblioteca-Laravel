<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(autorSeeder::class);
        $this->call(editorialSeeder::class);
        $this->call(generosSeeder::class);
        $this->call(librosSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(prestamosSeeder::class);
        $this->call(ResenasSeeder::class);
        $this->call(Libro_GeneroSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
