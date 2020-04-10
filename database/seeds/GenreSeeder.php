<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name'=> 'Fiction',
        ]);
         DB::table('genres')->insert([
            'name'=> 'Biography',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Autobiography',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Philosophical',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Adventure',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Educational',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Comedy',
        ]);
        DB::table('genres')->insert([
            'name'=> 'Others',
        ]);
    }
}
