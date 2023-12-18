<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UtilisateurFactory extends Factory
{
    protected static ?string $password;

    protected int $nbAdmin = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if($this->nbAdmin == 3){
            $admin = fake()->boolean();
        }else{
            $admin = fake()->boolean(0);
        }
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'admin' => $admin,
            'avatar'=> fake()->url()
        ];
    }
}
