<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;


class View extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'view',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
