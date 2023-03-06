<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Books::create([
                'name' => $faker->sentence(3),
                'isbn' => $faker->isbn13,
                'authors' => $faker->name,
                'country' => $faker->country,
                'numberOfPages' => $faker->randomDigitNotNull,
                'publisher' => $faker->company,
                'released' => $faker->dateTime
            ]);
        }
    }
}