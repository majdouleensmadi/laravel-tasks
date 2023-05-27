<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Director extends Model
{
    use HasFactory;
    function movies(){
        return $this->hasMany(Movie::class);
    }
}
