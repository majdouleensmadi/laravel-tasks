<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;
use Faker\Generator as Faker;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('en_US');

        return [
            'name' => $faker->name,
            // Define additional fields as needed
        ];
    }
}

