<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\User;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'user_id',
        'like',
        'dislike',
    ];
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }
}
