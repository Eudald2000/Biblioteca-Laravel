<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class editorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $editoriales = [
            'Penguin Random House',
            'HarperCollins',
            'Simon & Schuster',
            'Macmillan Publishers',
            'Hachette Book Group',
            'Oxford University Press',
            'Cambridge University Press',
            'Vintage Books',
            'Random House',
            'Pantheon Books'
        ];

        foreach ($editoriales as $editorial) {
            DB::table('editorials')->insert(['editorial' => $editorial,'created_at' => now()]);
        }
    }

}
