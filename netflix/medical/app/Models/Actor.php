<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';
    protected $primaryKey = 'id';
    protected $fillable = ['name',  'img'];
    
    protected $attributes = [
        'img' => 'default_image.jpg',
    ];
    use HasFactory;
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id');
    }
    

}
