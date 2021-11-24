<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editorials')->insert(['nombre' => 'Planeta']);
        DB::table('editorials')->insert(['nombre' => 'Lectorum']);
        DB::table('editorials')->insert(['nombre' => 'Grijalbo']);
        DB::table('editorials')->insert(['nombre' => 'Ediciones B']);
        DB::table('editorials')->insert(['nombre' => 'Nube de tinta']);
    }
}
