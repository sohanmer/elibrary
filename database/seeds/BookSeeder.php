<?php

use Illuminate\Database\Seeder;
use App\Books;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::create([
            'isbn' => '675672',
            'name' => 'The Motor Cycle Diaries',
            'author' => 'Ernesto Che Guevra',
            'edition' => 'First',
            'length' => '112',
            'thumbnail' => 'motorcycle.jpg'
        ]);

        Books::create([
            'isbn' => '675372',
            'name' => 'Da Vinci Code',
            'author' => 'Dan Brown',
            'edition' => 'First',
            'length' => '545',
            'thumbnail' => 'Da Vinci Code.jpg'
        ]);

        Books::create([
            'isbn' => '677652',
            'name' => 'Pride And Pre Judice',
            'author' => 'Jane Austin',
            'edition' => 'First',
            'length' => '400',
            'thumbnail' => 'Pride And Prejudice.jpg'
        ]);

        Books::create([
            'isbn' => '86972',
            'name' => 'The Alchemist',
            'author' => 'Paulo Cohelo',
            'edition' => 'First',
            'length' => '204',
            'thumbnail' => 'The Alchemist.jpg'
        ]);

        Books::create([
            'isbn' => '675872',
            'name' => 'War And Peace',
            'author' => 'Leo Tolstoy',
            'edition' => 'Second',
            'length' => '1220',
            'thumbnail' => 'War And Peace.jpg'
        ]);

        Books::create([
            'isbn' => '45372',
            'name' => 'To kill a moking bird',
            'author' => 'Ernesto Che Guevra',
            'edition' => 'First',
            'length' => '112',
            'thumbnail' => 'tokillamockingbird.jpg'
        ]);

        
    }
}
