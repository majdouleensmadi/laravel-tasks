<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\ActorMovie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Actor::factory(10)->create();

        $directors = Director::factory(5)->create();

        $directors->each(function ($director) {
            $movies = Movie::factory(15)->create(['director_id' => $director->id]);
            $movies->random(3)->each(function ($movie) {
                $actors = Actor::all()->random(2);
                $actors->each(function ($actor) use ($movie) {
                    ActorMovie::create(['actor_id' => $actor->id, 'movie_id' => $movie->id]);
                });
            });
        });
    }
}
