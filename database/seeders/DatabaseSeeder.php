<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'Basico']);

        $this->call(autorSeeder::class);
        $this->call(editorialSeeder::class);
        $this->call(generosSeeder::class);
        $this->call(librosSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(ResenasSeeder::class);
        $this->call(Libro_GeneroSeeder::class);
        $this->call(VentasSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
