<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(BooksTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BookAuthorTableSeeder::class);
    }
}