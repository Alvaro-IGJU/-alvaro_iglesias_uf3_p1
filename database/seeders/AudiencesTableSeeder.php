<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Film;

class AudiencesTableSeeder extends Seeder
{
    public function run()
    {

        $films = Film::all();
        // Insert initial data into the audiences table
        foreach ($films as $film) {
            DB::table('audiences')->insert([
                'movie_id' => $film->id, 
                'number_of_people' => random_int(200,100000),
                'created_at' => now(),
                'updated_at' => now(),
                ],
            );
        }
    }
}
