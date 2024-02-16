<?php

use App\Models\Film;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year');
            $table->string('genre');
            $table->string('country');
            $table->integer('duration');
            $table->string('img_url');
            $table->timestamps();
        });

        $films_json = json_decode(Storage::get('/public/films.json'), true);
        foreach ($films_json as $film) {
            Film::create([
                'name' => $film['name'],
                'year' => $film['year'],
                'genre' => $film['genre'],
                'country' => $film['country'],
                'duration' => $film['duration'],
                'img_url' => $film['img_url']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
