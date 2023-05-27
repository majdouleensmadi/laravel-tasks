<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Director;

class MovieFactory extends Factory
{
    // protected $model = Movie::class;
    public function definition()
    {
        $director = Director::inRandomOrder()->first() ;

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(200),
            'genre' => $this->faker->name,
            'img' => $this->faker->name,
            'director_id' => $director->id
        ];
    }
}
