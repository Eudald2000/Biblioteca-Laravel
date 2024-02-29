<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class autorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('autors')->insert([
            ['nombre' => 'William Shakespeare', 'created_at' => now()],
            ['nombre' => 'Jane Austen', 'created_at' => now()],
            ['nombre' => 'Emily Brontë', 'created_at' => now()],
            ['nombre' => 'Geoffrey Chaucer', 'created_at' => now()],
            ['nombre' => 'Homer', 'created_at' => now()],
            ['nombre' => 'Joseph Conrad', 'created_at' => now()],
            ['nombre' => 'Charles Dickens', 'created_at' => now()],
            ['nombre' => 'Herman Melville', 'created_at' => now()],
            ['nombre' => 'William Faulkner', 'created_at' => now()],
            ['nombre' => 'Edgar Allan Poe', 'created_at' => now()]
        ]);
        
    }
}
