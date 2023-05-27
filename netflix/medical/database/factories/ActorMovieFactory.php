<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;
use App\Models\Movie;

class ActorMovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActorMovie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $actorIds = Actor::pluck('id')->toArray();
        $movieIds = Movie::pluck('id')->toArray();

        return [
            'actor_id' => $this->faker->randomElement($actorIds),
            'movie_id' => $this->faker->randomElement($movieIds),
        ];
    }
}
