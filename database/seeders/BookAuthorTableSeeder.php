<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Books;
use App\Models\Author;
use Faker\Factory as Faker;



class BookAuthorTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $books = Books::all();
        $authors = Author::all();
        foreach ($books as $book) {
            $book->authors()->attach(
                $authors->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}