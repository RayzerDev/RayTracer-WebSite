<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory
 */
class SceneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersId = User::all()->pluck('id');

        return [
            'idUser' => $this->faker->randomElement($usersId),
            'nom' => $this->faker->word(),
            'equipe' => fake()->randomDigit(),
            'description' => fake()->paragraph
        ];
    }
}
