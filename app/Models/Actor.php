<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'birthdate', 'country', 'img_url',
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'films_actors', 'actor_id', 'film_id');
    }
}
