<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nom' => 'Mangas',
        ]);
        DB::table('categories')->insert([
            'nom' => 'Animes',
        ]);
        DB::table('categories')->insert([
            'nom' => 'Films',
        ]);
        DB::table('categories')->insert([
            'nom' => 'Jeux Videos',
        ]);
        DB::table('categories')->insert([
            'nom' => 'Autres',
        ]);
    }
}
