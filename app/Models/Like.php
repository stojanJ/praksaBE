<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'like',
        'dislike',
    ];
    public function movie()
    {
        return $this->hasMany(Movie::class, 'movie_id');
    }
}
