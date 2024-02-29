<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('rols')->insert([
        ['rol' => 'cliente', 'created_at' => now()],
        ['rol' => 'bibliotecari@', 'created_at' => now()]
    ]);
}

}
    

