<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('ventas')->insert([

        [
            'user_id' => '1',
            'libro_id' => '9',
            'created_at' => now()
        ],
        [
            'user_id' => '2',
            'libro_id' => '10',
            'created_at' => now()
        ]

       ]);
    }
}
