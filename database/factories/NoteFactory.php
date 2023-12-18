<?php

namespace Database\Factories;

use App\Models\Scene;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersId = User::all()->pluck('id');
        $scenesId = Scene::all()->pluck('id');
        return [
            'idUser' => fake()->randomElement($usersId),
            'idScene' => fake()->randomElement($scenesId),
            'note' => fake()->numberBetween(0,5)
        ];
    }
}
