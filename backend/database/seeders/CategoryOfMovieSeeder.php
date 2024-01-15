<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryOfMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories_of_movies')->insert([
            'movie_id' => 1,
            'category_id' => 3
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 1,
            'category_id' => 5
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 1,
            'category_id' => 8
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 2,
            'category_id' => 6
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 2,
            'category_id' => 7
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 2,
            'category_id' => 8
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 3,
            'category_id' => 3
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 3,
            'category_id' => 5
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 3,
            'category_id' => 8
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 4,
            'category_id' => 4
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 4,
            'category_id' => 6
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 5,
            'category_id' => 1
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 5,
            'category_id' => 2
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 6,
            'category_id' => 3
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 6,
            'category_id' => 5
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 6,
            'category_id' => 9
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 6,
            'category_id' => 10
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 7,
            'category_id' => 4
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 7,
            'category_id' => 7
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 8,
            'category_id' => 8
        ]);
        
        DB::table('categories_of_movies')->insert([
            'movie_id' => 9,
            'category_id' => 4
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 10,
            'category_id' => 6
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 10,
            'category_id' => 8
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 10,
            'category_id' => 9
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 10,
            'category_id' => 10
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 11,
            'category_id' => 3
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 11,
            'category_id' => 5
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 11,
            'category_id' => 9
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 11,
            'category_id' => 10
        ]);

        DB::table('categories_of_movies')->insert([
            'movie_id' => 11,
            'category_id' => 11
        ]);
    }
}
