<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Movie;
use App\Models\View;
use App\Models\Comment;


class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'genre',
        'user_id',
    ];
    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');

    }
    public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function view()
    {
        return $this->hasMany(View::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
