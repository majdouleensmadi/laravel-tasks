<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movie';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'genre', 'img','director_id'];
    
    protected $attributes = [
        'img' => 'default_image.jpg',
        'director_id' =>'0',
        'genre' =>'N/A'
    ];

    public function director(){
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
    }
    
}