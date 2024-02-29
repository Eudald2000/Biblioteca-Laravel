<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resena;

class ResenasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resena::factory()->count(10)->create();
    }
}

